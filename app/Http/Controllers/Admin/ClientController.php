<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Validator;
use Input;
use Auth;
use Redirect;
use Illuminate\Http\Request;
use App\Client;
use App\User as User;
use Hash;

class ClientController extends CommonController
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addclient(Request $request)
    {
        $rules = [
            'first_name'   => 'required|string|min:2|max:20',
            'last_name'    => 'required|string|min:2|max:8',
            'email'        => 'required|email',
            'phone_no'     => 'required|string',
            'password'     => 'required|string',
            'company_name' => 'required|string|min:2|max:30',
            'address'      => 'required|string|min:2|max:30',
            'state'        => 'required|string|min:2|max:30',
            'country'      => 'required|string|min:2|max:30',
            'zip_code'      => 'required|string|min:2|max:5',
            'gender'       => 'required|in:male,female',
            'date_of_joining' => 'required',
            'client_designation'    => 'required|string'
        ];
        $validator = Validator::make($request->all(),$rules);
        if (!$validator->fails()) 
        {
            $requestData = $request->all();
            $data['email'] = trim(strtolower($requestData['email']));
            $is_client_exists = User::where(['type' => 'client','email' => $requestData['email'],"deleted" => '0'])->first();  
            if(empty($is_client_exists))
            {
                $add_user_data = array(
                    'name'  => trim($requestData['first_name'])." ".trim($requestData['last_name']),
                    'email' => $data['email'],
                    'password' => Hash::make(trim($requestData['password'])),
                    'phone_no' => trim($requestData['phone_no']),
                    'address'  => trim($requestData['address']),
                    'state'    => trim($requestData['state']),
                    'country'  => trim($requestData['country']),
                    'zip_code' => trim($requestData['zip_code']),
                    'gender'   => trim($requestData['gender']),
                    'date_of_joining' => date('Y-m-d',strtotime(str_replace('/', '-', $requestData['date_of_joining']))),
                    'dob'      => '',
                    'status'   => '1',
                    'deleted'  => '0',
                    'profile_image' => '',
                    'type'    => 'client'
                );
                $add_client_user = User::create($add_user_data);
                if($add_client_user)
                {
                    $client_add = array(
                        'status'   => '1',
                        'deleted'  => '0',
                        'company_name'  => trim($requestData['company_name']),
                        'client_designation'  => trim($requestData['client_designation']),
                        'user_id' => $add_client_user['id'],
                    );
                    Client::create($client_add);
                    $status   = 200;
                    $response = array(
                        'status'  => 'SUCCESS',
                        'message' => trans('messages.client_add_success'),
                        'ref'     => 'client_add_success',
                    );
                }
                else
                {
                    $status = 400;
                    $response = array(
                        'status'  => 'FAILED',
                        'message' => trans('messages.server_error'),
                        'ref'     => 'server_error'
                    );
                }
            }
            else
            {
                $status = 400;
                $response = array(
                    'status'  => 'FAILED',
                    'message' => trans('messages.error_client_email_exists'),
                    'ref'     => 'error_client_email_exists'
                );  
            }
        } else {
            $status = 400;
            $response = array(
                'status'  => 'FAILED',
                'message' => $validator->messages()->first(),
                'ref'     => 'missing_parameters',
            );
        }
        $data = array_merge(
            [
                "code" => $status,
                "message" =>$response['message']
            ],
            $response
        );
        array_walk_recursive($data, function(&$item){if(is_numeric($item) || is_float($item) || is_double($item)){$item=(string)$item;}});
        return \Response::json($data,200);
    }

    public function clients_list(Request $request)
    {
        $data['clients_list'] = User::select('users.*','clients.company_name','clients.client_designation')->where(['type' => 'client','users.deleted' => '0'])->Join('clients', 'clients.user_id' , '=', 'users.id')->get()->toArray();
        return view('admin.clients.clients-list',$data);
    }

    public function clients(Request $request)
    {
        return view('admin.clients.index');
    }
}

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
use App\Roles;
use Hash;
use Mail;
use Storage;

class RolesController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $roles = Roles::where('deleted', '0')->get()->all();
        
         return view('admin.settings.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addRole(Request $request)
    {
        $rules = [
            'role_name'      => 'required|string|min:2|max:20',
           
        ];
        $validator = Validator::make($request->all(),$rules);
        if (!$validator->fails()) 
        {
            $requestData = $request->all();
            $is_role_exists = Roles::where(['role_name' => strtolower($requestData['role_name']), "deleted" => '0'])->first();
           
            
            if(empty($is_role_exists))
            {    
                $data['role_name'] = trim(strtolower($requestData['role_name']));
                $data['deleted'] = '0';
                $data['status']   = '1';
              
                $add_role = Roles::create($data);
                if($add_role)
                {
                    $status   = 200;
                    $response = array(
                        'status'  => 'SUCCESS',
                        'message' => trans('messages.role_add_success'),
                        'ref'     => 'role_add_success',
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
                    'message' => trans('messages.error_role_exists'),
                    'ref'     => 'error_role_exists'
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


    public function editRole(Request $request)
    {
        
       
      
         $rules = [
            'role_name' => 'required'
        ];

          $validator = Validator::make($request->all(),$rules);
          if (!$validator->fails()) 
        {
            $name = $request->all();

           // dd($name['role_id']);
           // dd($name['role_name']);

       $is_role_exists = Roles::where(['id' => (int) $name['role_id'], "deleted" => '0'])->first();
       
        //dd($is_role_exists);

           if(!empty($is_role_exists))
            { 
                
                 $edit_role = array(
                 'role_name' => $name['role_name'],
             );

            $update_role = Roles::where('id' , (int) $name['role_id'])->update($edit_role);
            $status   = 200;
                $response = array(
                        'status'  => 'SUCCESS',
                        'message' => trans('messages.role_update_success'),
                        'ref'     => 'role_update_success',
                );
         
            }
            

        }else {
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
        return \Response::json($data,200);

        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function deleteRole(Request $request)
    {
         
            $id = $request['role_id'];

            $is_role_exists = Roles::find($id);

            // dd($is_role_exists);

             if(!empty($is_role_exists))
            {

              $delete_role = array(
                    "deleted" => "1"
                );

                $delete_role = Roles::where('id', $id)->update($delete_role);
                $status   = 200;
                $response = array(
                        'status'  => 'SUCCESS',
                        'message' => trans('messages.role_delete_success'),
                        'ref'     => 'role_delete_success',
                );
            }

            $data = array_merge(
            [
                "code" => $status,
                "message" =>$response['message']
            ],
            $response
        );
        return \Response::json($data,200);
    }
}

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
use Mail;
use Storage;
use App\Department;
use App\Designation;
use App\Employees;
use App\Roles;
use App\Projects;
use App\Project_members;
use App\Tasks;
use App\Task_members;

class FilemanagerController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
         $path = 'public/FileManager/';

         $projects = Projects::where('deleted', '0')->get();
         $tasks = Tasks::where('deleted','0')->get();
         $directories = Storage::directories($path);
        // dd($directories);
         $files = Storage::files($path);
         //$task_folders = Storage::directories('public/FileManager/aws fargate deploymenet');
         
         //dd($task_folders);

         return view('admin.apps.filemanager.index', compact('projects','directories','files','tasks','path'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gettaskfolders(Request $request)

    {
        $folder = $request->all();
        //dd($folder['folder_name']);
        $directories = Storage::directories('public/FileManager/'. strtolower($folder['folder_name']));
        
        $path = "public/FileManager/". strtolower(rtrim($folder['folder_name'])) . "/";
        //dd($path);

        $directories = str_replace( $path , "" , $directories);
        
         $files = Storage::files('public/FileManager/'.strtolower($folder['folder_name']));

        $data['gettaskfoldershtml'] = view('admin.apps.filemanager.taskfolders', compact('directories','files','path'))->render();
        $status   = 200;
        $response = array(
            'status'  => 'SUCCESS',
            'message' => trans('messages.getfolders_add_success'),
            'ref'     => 'getfolders_add_success',
            'data'    => $data
        );
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

     public function gettaskfiles(Request $request)

    {
        $folder = $request->all();
        $folder_name = $folder['folder_name'];

       // dd($folder_name);

        $directories = Storage::directories('public/FileManager/'. rtrim($folder['path']) .strtolower($folder['folder_name']).'/');
        
       // dd($directories);

        //$path = "public/FileManager/". strtolower($folder['folder_name']) . "/";
       // dd($path);

        //$directories = str_replace( $path , "" , $directories);
            
            $file_path = 'public/FileManager/'. rtrim($folder['path']) . rtrim(strtolower($folder['folder_name'])) ;

          //  dd($file_path);

         $files = Storage::files($file_path );
         
         // $files = Storage::files('public/FileManager/aws fargate deploymenet/create docker container');
         
        //   dd($files);

        $data['gettaskfileshtml'] = view('admin.apps.filemanager.taskfiles', compact('directories','files','file_path','folder_name'))->render();
        $status   = 200;
        $response = array(
            'status'  => 'SUCCESS',
            'message' => trans('messages.getfolders_add_success'),
            'ref'     => 'getfolders_add_success',
            'data'    => $data
        );
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createFolder(Request $request)
    {
       $data = $request->all();
       //dd($data);
        $rules = [

            'folder_name'   => 'required|string|min:2|max:20',

        ];

         $validator = Validator::make($request->all(),$rules);

         if (!$validator->fails()) 
        {

            $folder_path = $data['path'] . $data['folder_name'];

            //   dd($folder_path);

               if(!Storage::exists($folder_path)) {

                $create_folder = Storage::makeDirectory($folder_path , 0775, true); //creates directory

                $status   = 200;
               $response = array(
               'status'  => 'SUCCESS',
               'message' => trans('messages.folder_created_success'),
               'ref'     => 'folder_created_success',
               );
               
             }else
                {
                    $status = 400;
                    $response = array(
                        'status'  => 'FAILED',
                        'message' => trans('messages.error_folder_exists'),
                        'ref'     => 'error_folder_exists'
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
        array_walk_recursive($data, function(&$item){if(is_numeric($item) || is_float($item) || is_double($item)){$item=(string)$item;}});
        return \Response::json($data,200);
       

      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

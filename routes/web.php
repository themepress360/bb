<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
        return redirect('/login');
    });

Route::middleware(['is-user-login'])->group(function () 
{
    Route::get('login', 'Auth\LoginController@show_login');
    Route::post('/login','Auth\LoginController@doLogin');
});

Route::get('logout', array('uses' => 'Auth\LoginController@doLogout'));
//Route::middleware(['auth:web'])->group(function () {
// {
    Route::group(
            ['middleware' => ['profile-status'],'namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin'], function () {
        Route::get('dashboard', array('uses' => 'DashboardController@index'));
        Route::get('profile', array('uses' => 'ProfileController@index'));
        Route::post('editprofile',array('as' => 'admin.editprofile','uses' => 'ProfileController@editprofile'));
        Route::post('adddepartment', array('uses' => 'DepartmentController@adddepartment'));
        Route::post('editdepartment', array('uses' => 'DepartmentController@editdepartment'));
        Route::post('deletedepartment', array('uses' => 'DepartmentController@deletedepartment'));
        Route::post('adddesignation', array('uses' => 'DesignationController@adddesignation'));
        Route::post('editdesignation', array('uses' => 'DesignationController@editdesignation'));
        Route::post('deletedesignation', array('uses' => 'DesignationController@deletedesignation'));
        Route::get('departments', array('uses' => 'DepartmentController@index'));
        Route::get('designations', array('uses' => 'DesignationController@index'));
        Route::post('saveeducationinformation', array('uses' => 'EducationInformationController@save'));
        Route::post('saveexperiences', array('uses' => 'ExperienceController@save'));
        Route::post('addclient', array('uses' => 'ClientController@addclient'));
        Route::post('editclient', array('uses' => 'ClientController@editclient'));
        Route::post('deleteclient', array('uses' => 'ClientController@deleteclient'));
        Route::post('statuschange', array('uses' => 'ClientController@statuschange'));
        Route::get('clients-list', array('uses' => 'ClientController@clients_list'));
        Route::get('clients', array('uses' => 'ClientController@clients'));
        Route::get('email-settings', array('uses' => 'EmailSettingController@index'));
        Route::post('emailconfigure', array('uses' => 'EmailSettingController@emailconfigure'));
        Route::get('theme-settings', array('uses' => 'ThemeSettingController@index'));
        Route::post('addthemesetting', array('uses' => 'ThemeSettingController@addthemesetting'));
        Route::get('client-profile/{id}', array('uses' => 'ClientController@getprofile'));
        


        Route::get('roles-permissions',  array('uses' => 'RolesController@index'));
        Route::post('addrole',  array('uses' => 'RolesController@addRole'));
        Route::post('editrole',  array('uses' => 'RolesController@editRole'));
        Route::post('deleterole',  array('uses' => 'RolesController@deleteRole'));

        Route::get('employees', array('uses' => 'EmployeeController@index'));
        Route::post('addemployees', array('uses' => 'EmployeeController@addEmployee'));
        Route::get('employee-profile/{id}', array('uses' => 'EmployeeController@getprofile'));
        Route::post('editemployee', array('uses' => 'EmployeeController@editEmployee'));
        Route::get('employees-list', array('uses' => 'EmployeeController@employeelist'));

        Route::post('saveEmpEducation', array('uses' => 'EducationInformationController@saveEmpEducation'));
        Route::post('saveEmpExperience', array('uses' => 'ExperienceController@saveEmpExperience'));


        Route::get('projects',  array('uses' => 'ProjectsController@index'));
        Route::get('project-list',  array('uses' => 'ProjectsController@projectlist'));
        Route::post('addprojects',  array('uses' => 'ProjectsController@addprojects'));

        Route::get('tasks', array('uses' => 'TasksController@index'));
        Route::post('addtasks', array('uses' => 'TasksController@addTask'));
        Route::post('gettask', array('uses' => 'TasksController@getTask'));
        Route::post('updatetaskstatus', array('uses' => 'TasksController@updateTaskStatus'));
        Route::post('gettaskwindow', array('uses' => 'TasksController@gettaskwindow'));
        Route::post('addtaskhistory', array('uses' => 'TaskHistoryController@addtaskhistory'));
        Route::post('addfollowers', array('uses' => 'TasksController@addfollowers'));
         Route::post('updatetaskduedate', array('uses' => 'TasksController@updateDueDate'));

         Route::post('completetask', array('uses' => 'TasksController@completeTask'));

        Route::get('task-board', array('uses' => 'TaskBoardController@getTaskboard'));
        Route::post('getprojecttaskboard', array('uses' => 'TaskBoardController@getprojecttaskboard'));
        
        Route::post('addtaskboard', array('uses' => 'TaskBoardController@addTaskboard'));

        Route::get('task-settings', array('uses' => 'TaskBoardController@defaultSettings'));
        Route::post('updatecolor', array('uses' => 'TaskBoardController@updateColor'));

        Route::get('inbox', array('uses' => 'EmailController@index'));
        Route::get('mail-view/{id}', array('uses' => 'EmailController@showMessage'));
         Route::post('nextmessages', array('uses' => 'EmailController@listmessages'));
       
                        
    });

    Route::group(
            ['middleware' => ['profile-status'],'namespace' => 'Client', 'prefix' => 'client', 'as' => 'client'], function () {
        Route::get('dashboard', array('uses' => 'DashboardController@index'));
        Route::get('profile', array('uses' => 'ProfileController@index'));
        Route::post('editprofile',array('as' => 'client.editprofile','uses' => 'ProfileController@editprofile'));
    });

    Route::group(
            ['middleware' => ['profile-status'],'namespace' => 'Employee', 'prefix' => 'employee', 'as' => 'employee'], function () {
        Route::get('dashboard', array('uses' => 'DashboardController@index'));
        Route::get('profile', array('uses' => 'ProfileController@index'));
        Route::post('updateprofile', array('uses' => 'ProfileController@updateprofile'));


        Route::get('tasks', array('uses' => 'TasksController@gettasks'));
        Route::post('updatetaskstatus', array('uses' => 'TasksController@updateTaskStatus'));
        Route::post('gettaskwindow', array('uses' => 'TasksController@gettaskwindow'));
        Route::post('addtaskhistory', array('uses' => 'TaskHistoryController@addtaskhistory'));
        Route::post('completetask', array('uses' => 'TasksController@completeTask'));

       });
//});

Route::get('/admin/addtask', function () {
        return view('admin.emails.AddTaskEmail');
    });
Route::get('/admin/taskadminreview', function () {
        return view('admin.emails.TaskAdminReviewEmail');
    });
Route::get('/admin/taskadminreview', function () {
        return view('admin.emails.TaskAdminReviewEmail');
    });

Route::get('/admin/addtaskfollowers', function () {
        return view('admin.emails.AddTaskFollowersEmail');
    });


Route::get('/admin/taskcomplete', function () {
        return view('admin.emails.TaskCompleteEmail');
    });

Route::get('/admin/taskcompletefollowers', function () {
        return view('admin.emails.TaskCompleteFollowersEmail');
    });

Route::get('/admin/passwordreset', function () {
        return view('admin.emails.ResetPasswordEmail');
    });




Route::get('/admin/chat', function () {
        return view('admin.apps.chat.index');
    });



Route::get('/admin/voice-call', function () {
        return view('admin.apps.calls.voice-call');
    });

Route::get('/admin/video-call', function () {
        return view('admin.apps.calls.video-call');
    });
Route::get('/admin/outgoing-call', function () {
        return view('admin.apps.calls.outgoing-call');
    });

Route::get('/admin/incoming-call', function () {
        return view('admin.apps.calls.incoming-call');
    });

Route::get('/admin/leads', function () {
        return view('admin.leads.index');
    });




Route::get('/admin/projects-list', function () {
        return view('admin.projects.projects-list');
    });
Route::get('/admin/project-view', function () {
        return view('admin.projects.project-view');
    });


Route::get('/admin/tickets', function () {
        return view('admin.tickets.index');
    });
Route::get('/admin/ticket-view', function () {
        return view('admin.tickets.ticket-view');
    });

Route::get('/admin/settings', function () {
        return view('admin.settings.index');
    });
Route::get('/admin/users', function () {
        return view('admin.users.index');
    });
Route::get('/admin/contacts', function () {
        return view('admin.apps.contacts.index');
    });
Route::get('/admin/events', function () {
        return view('admin.apps.calender.index');
    });
Route::get('/admin/file-manager', function () {
        return view('admin.apps.filemanager.index');
    });






//Route::get('/employee/profile', function () {
  //      return view('employees.profile.index');
    //});
Route::get('/employee/chat', function () {
        return view('employees.apps.chat.index');
    });

Route::get('/employee/voice-call', function () {
        return view('employees.apps.calls.voice-call');
    });

Route::get('/employee/video-call', function () {
        return view('employees.apps.calls.video-call');
    });
Route::get('/employee/outgoing-call', function () {
        return view('employees.apps.calls.outgoing-call');
    });

Route::get('/employee/incoming-call', function () {
        return view('employees.apps.calls.incoming-call');
    });

Route::get('/employee/projects', function () {
        return view('employees.projects.index');
    });

Route::get('/employee/projects-list', function () {
        return view('employees.projects.projects-list');
    });
Route::get('/employee/projects-list', function () {
        return view('employees.projects.projects-list');
    });
Route::get('/employee/project-view', function () {
        return view('employees.projects.project-view');
    });

Route::get('/employee/task-board', function () {
        return view('employees.projects.task-board');
    });
Route::get('/employee/tickets', function () {
        return view('employees.tickets.index');
    });
Route::get('/employee/ticket-view', function () {
        return view('employee.tickets.ticket-view');
    });
Route::get('/employee/tickets', function () {
        return view('employees.tickets.index');
    });
Route::get('/employee/ticket-view', function () {
        return view('employees.tickets.ticket-view');

 });

Route::get('/employee/inbox', function () {
        return view('employees.apps.email.index');
    });

Route::get('/employee/contacts', function () {
        return view('employees.apps.contacts.index');
    });
Route::get('/employee/events', function () {
        return view('employees.apps.calender.index');
    });
Route::get('/employee/file-manager', function () {
        return view('employees.apps.filemanager.index');
    });






Route::get('/client/chat', function () {
        return view('clients.apps.chat.index');
    });

Route::get('/client/voice-call', function () {
        return view('clients.apps.calls.voice-call');
    });

Route::get('/client/video-call', function () {
        return view('clients.apps.calls.video-call');
    });
Route::get('/client/outgoing-call', function () {
        return view('clients.apps.calls.outgoing-call');
    });

Route::get('/client/incoming-call', function () {
        return view('clients.apps.calls.incoming-call');
    });

Route::get('/client/projects', function () {
        return view('clients.projects.index');
    });

Route::get('/client/projects-list', function () {
        return view('clients.projects.projects-list');
    });
Route::get('/client/projects-list', function () {
        return view('clients.projects.projects-list');
    });
Route::get('/client/project-view', function () {
        return view('clients.projects.project-view');
    });
Route::get('/client/tasks', function () {
        return view('clients.projects.tasks');
    });
Route::get('/client/task-board', function () {
        return view('clients.projects.task-board');
    });
Route::get('/client/tickets', function () {
        return view('clients.tickets.index');
    });
Route::get('/client/ticket-view', function () {
        return view('client.tickets.ticket-view');
    });
Route::get('/client/tickets', function () {
        return view('clients.tickets.index');
    });
Route::get('/client/ticket-view', function () {
        return view('clients.tickets.ticket-view');

 });

Route::get('/client/inbox', function () {
        return view('clients.apps.email.index');
    });
Route::get('/client/contacts', function () {
        return view('clients.apps.contacts.index');
    });
Route::get('/client/events', function () {
        return view('clients.apps.calender.index');
    });
Route::get('/client/file-manager', function () {
        return view('clients.apps.filemanager.index');
    });
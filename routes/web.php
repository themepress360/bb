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
    });

    Route::group(
            ['middleware' => ['profile-status'],'namespace' => 'Client', 'prefix' => 'client', 'as' => 'client'], function () {
        Route::get('dashboard', array('uses' => 'DashboardController@index'));
    });

    Route::group(
            ['middleware' => ['profile-status'],'namespace' => 'Employee', 'prefix' => 'employee', 'as' => 'employee'], function () {
        Route::get('dashboard', array('uses' => 'DashboardController@index'));
       });
//});






Route::get('/admin/employees', function () {
        return view('admin.employees.index');
    });
Route::get('/admin/employees-list', function () {
        return view('admin.employees.employees-list');
    });


 

Route::get('/admin/clients', function () {
        return view('admin.clients.index');
    });
Route::get('/admin/clients-list', function () {
        return view('admin.clients.clients-list');
    });

Route::get('/admin/chat', function () {
        return view('admin.apps.chat.index');
    });

Route::get('/admin/inbox', function () {
        return view('admin.apps.email.index');
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


Route::get('/admin/projects', function () {
        return view('admin.projects.index');
    });
Route::get('/admin/project-list', function () {
        return view('admin.projects.projects-list');
    });
Route::get('/admin/projects-list', function () {
        return view('admin.projects.projects-list');
    });
Route::get('/admin/project-view', function () {
        return view('admin.projects.project-view');
    });
Route::get('/admin/tasks', function () {
        return view('admin.projects.tasks');
    });
Route::get('/admin/task-board', function () {
        return view('admin.projects.task-board');
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
Route::get('/admin/roles-permissions', function () {
        return view('admin.roles.index');
    });





Route::get('/employee/profile', function () {
        return view('employees.profile.index');
    });
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
Route::get('/employee/tasks', function () {
        return view('employees.projects.tasks');
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



Route::get('/client/dashboard', function () {
        return view('clients.dashboard.index');
    });
Route::get('/client/profile', function () {
        return view('clients.profile.index');
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
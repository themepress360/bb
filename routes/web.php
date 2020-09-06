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

Route::get('/admin/departments', function () {
        return view('admin.employees.departments');
      });  
Route::get('/admin/designations', function () {
        return view('admin.employees.designations');
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

Route::get('/admin/email', function () {
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
Route::get('/admin/profile', function () {
        return view('admin.profile.index');
    });

Route::get('/admin/projects', function () {
        return view('admin.projects.index');
    });
Route::get('/admin/projects-list', function () {
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




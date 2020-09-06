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

Route::get('/login', function () {
        return view('auth.login');
    });


Route::get('/admin/dashboard', function () {
        return view('admin.dashboard.index');
    });

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


Route::get('/employee/dashboard', function () {
        return view('employees.dashboard.index');
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




Route::get('/', function () {
        return view('index');
    });
    
    Route::get('/home', function () {
        return view('index');
    });

Route::get('/index', function () {
    return view('index');
})->name('page');

Route::get('/employee-dashboard', function () {
    return view('employee-dashboard');
});
Route::get('/chat', function () {
    return view('chat');
});
Route::get('/voice-call', function () {
    return view('voice-call');
});
Route::get('/video-call', function () {
    return view('video-call');
});
Route::get('/outgoing-call', function () {
    return view('outgoing-call');
});
Route::get('/incoming-call', function () {
    return view('incoming-call');
});
Route::get('/events', function () {
    return view('events');
});
Route::get('/contacts', function () {
    return view('contacts');
});
Route::get('/inbox', function () {
    return view('inbox');
});
Route::get('/file-manager', function () {
    return view('file-manager');
});
Route::get('/employees', function () {
    return view('employees');
});
Route::get('/holidays', function () {
    return view('holidays');
});
Route::get('/leaves', function () {
    return view('leaves');
});
Route::get('/leaves-employee', function () {
    return view('leaves-employee');
});
Route::get('/leave-settings', function () {
    return view('leave-settings');
});
Route::get('/attendance', function () {
    return view('attendance');
});
Route::get('/attendance-employee', function () {
    return view('attendance-employee');
});
Route::get('/departments', function () {
    return view('departments');
});
Route::get('/designations', function () {
    return view('designations');
});
Route::get('/timesheet', function () {
    return view('timesheet');
});
Route::get('/overtime', function () {
    return view('overtime');
});
Route::get('/clients', function () {
    return view('clients');
});
Route::get('/projects', function () {
    return view('projects');
});
Route::get('/tasks', function () {
    return view('tasks');
});
Route::get('/task-board', function () {
    return view('task-board');
});
Route::get('/leads', function () {
    return view('leads');
});
Route::get('/tickets', function () {
    return view('tickets');
});
Route::get('/estimates', function () {
    return view('estimates');
});
Route::get('/invoices', function () {
    return view('invoices');
});
Route::get('/payments', function () {
    return view('payments');
});
Route::get('/expenses', function () {
    return view('expenses');
});
Route::get('/provident-fund', function () {
    return view('provident-fund');
});
Route::get('/taxes', function () {
    return view('taxes');
});
Route::get('/salary', function () {
    return view('salary');
});
Route::get('/salary-view', function () {
    return view('salary-view');
});
Route::get('/payroll-items', function () {
    return view('payroll-items');
});
Route::get('/policies', function () {
    return view('policies');
});
Route::get('/expense-reports', function () {
    return view('expense-reports');
});
Route::get('/invoice-reports', function () {
    return view('invoice-reports');
});
Route::get('/performance-indicator', function () {
    return view('performance-indicator');
});
Route::get('/performance', function () {
    return view('performance');
});
Route::get('/performance-appraisal', function () {
    return view('performance-appraisal');
});
Route::get('/goal-tracking', function () {
    return view('goal-tracking');
});
Route::get('/goal-type', function () {
    return view('goal-type');
});
Route::get('/training', function () {
    return view('training');
});
Route::get('/trainers', function () {
    return view('trainers');
});
Route::get('/training-type', function () {
    return view('training-type');
});
Route::get('/promotion', function () {
    return view('promotion');
});
Route::get('/resignation', function () {
    return view('resignation');
});
Route::get('/termination', function () {
    return view('termination');
});
Route::get('/assets', function () {
    return view('assets');
});
Route::get('/jobs', function () {
    return view('jobs');
});
Route::get('/jobs-applicants', function () {
    return view('jobs-applicants');
});
Route::get('/knowledgebase', function () {
    return view('knowledgebase');
});
Route::get('/activities', function () {
    return view('activities');
});
Route::get('/users', function () {
    return view('users');
});
Route::get('/settings', function () {
    return view('settings');
});
Route::get('/localization', function () {
    return view('localization');
});
Route::get('/theme-settings', function () {
    return view('theme-settings');
});
Route::get('/roles-permissions', function () {
    return view('roles-permissions');
});
Route::get('/email-settings', function () {
    return view('email-settings');
});
Route::get('/invoice-settings', function () {
    return view('invoice-settings');
});
Route::get('/salary-settings', function () {
    return view('salary-settings');
});
Route::get('/notifications-settings', function () {
    return view('notifications-settings');
});
Route::get('/change-password', function () {
    return view('change-password');
});
Route::get('/leave-type', function () {
    return view('leave-type');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/client-profile', function () {
    return view('client-profile');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/forgot-password', function () {
    return view('forgot-password');
});
Route::get('/otp', function () {
    return view('otp');
});
Route::get('/lock-screen', function () {
    return view('lock-screen');
});
Route::get('/error-404', function () {
    return view('error-404');
});
Route::get('/error-500', function () {
    return view('error-500');
});
Route::get('/subscriptions', function () {
    return view('subscriptions');
});
Route::get('/subscriptions-company', function () {
    return view('subscriptions-company');
});
Route::get('/subscribed-companies', function () {
    return view('subscribed-companies');
});
Route::get('/search', function () {
    return view('search');
});
Route::get('/faq', function () {
    return view('faq');
});
Route::get('/terms', function () {
    return view('terms');
});
Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});
Route::get('/blank-page', function () {
    return view('blank-page');
});
Route::get('/components', function () {
    return view('components');
});
Route::get('/form-basic-inputs', function () {
    return view('form-basic-inputs');
});
Route::get('/form-input-groups', function () {
    return view('form-input-groups');
});
Route::get('/form-horizontal', function () {
    return view('form-horizontal');
});
Route::get('/form-vertical', function () {
    return view('form-vertical');
});
Route::get('/form-mask', function () {
    return view('form-mask');
});
Route::get('/form-validation', function () {
    return view('form-validation');
});
Route::get('/tables-basic', function () {
    return view('tables-basic');
});
Route::get('/data-tables', function () {
    return view('data-tables');
});
Route::get('/create-estimate', function () {
    return view('create-estimate');
});
Route::get('/create-invoice', function () {
    return view('create-invoice');
});
Route::get('/clients-list', function () {
    return view('clients-list');
});
Route::get('/compose', function () {
    return view('compose');
});
Route::get('/edit-estimate', function () {
    return view('edit-estimate');
});
Route::get('/edit-invoice', function () {
    return view('edit-invoice');
});
Route::get('/estimate-view', function () {
    return view('estimate-view');
});
Route::get('/job-view', function () {
    return view('job-view');
});
Route::get('/job-list', function () {
    return view('job-list');
});
Route::get('/job-details', function () {
    return view('job-details');
});
Route::get('/knowledgebase-view', function () {
    return view('knowledgebase-view');
});
Route::get('/mail-view', function () {
    return view('mail-view');
});
Route::get('/project-list', function () {
    return view('project-list');
});
Route::get('/project-view', function () {
    return view('project-view');
});
Route::get('/ticket-view', function () {
    return view('ticket-view');
});
Route::get('/invoice-view', function () {
    return view('invoice-view');
});
Route::get('/employees-list', function () {
    return view('employees-list');
});
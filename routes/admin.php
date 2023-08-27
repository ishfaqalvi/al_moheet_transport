<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Route
|--------------------------------------------------------------------------
*/
Route::get('dashboard', DashboardController::class)->name('dashboard');

/*
|--------------------------------------------------------------------------
| Role Routes
|--------------------------------------------------------------------------
*/
Route::resource('roles', RoleController::class);

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::resource('users', UserController::class);
Route::controller(UserController::class)->prefix('user')->group(function () {
	Route::get('profile', 		 'profileEdit'	)->name('user.profile.edit');
    Route::post('profile',		 'profileUpdate')->name('user.profile.update');
    Route::post('check_email', 	 'checkEmail'	)->name('user.checkEmail');
    Route::post('check_password','checkPassword')->name('user.checkPassword');
});

/*
|--------------------------------------------------------------------------
| Branch Routes
|--------------------------------------------------------------------------
*/
Route::controller(BranchController::class)->prefix('branches')->as('branches.')->group(function(){
    Route::get('list',              'index'     )->name('index'       );
    Route::get('create',            'create'    )->name('create'      );
    Route::post('store',            'store'     )->name('store'       );
    Route::get('edit/{id}',         'edit'      )->name('edit'        );
    Route::patch('update/{branch}', 'update'    )->name('update'      );
    Route::delete('delete/{id}',    'destroy'   )->name('destroy'     );
});

/*
|--------------------------------------------------------------------------
| Charges Types Routes
|--------------------------------------------------------------------------
*/
Route::controller(ChargesTypeController::class)->prefix('charges-types')->as('charges-types.')->group(function(){
    Route::get('list',                  'index'  )->name('index'  );
    Route::get('create',                'create' )->name('create' );
    Route::post('store',                'store'  )->name('store'  );
    Route::get('edit/{id}',             'edit'   )->name('edit'   );
    Route::patch('update/{chargesType}','update' )->name('update' );
    Route::delete('delete/{id}',        'destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Expense Types Routes
|--------------------------------------------------------------------------
*/
Route::controller(ExpenseTypeController::class)->prefix('expense-types')->as('expense-types.')->group(function(){
    Route::get('list',                  'index'  )->name('index'  );
    Route::get('create',                'create' )->name('create' );
    Route::post('store',                'store'  )->name('store'  );
    Route::get('edit/{id}',             'edit'   )->name('edit'   );
    Route::patch('update/{expenseType}','update' )->name('update' );
    Route::delete('delete/{id}',        'destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Expense Routes
|--------------------------------------------------------------------------
*/
Route::controller(ExpenseController::class)->prefix('expenses')->as('expenses.')->group(function(){
    Route::get('list',              'index'  )->name('index'  );
    Route::get('create',            'create' )->name('create' );
    Route::post('store',            'store'  )->name('store'  );
    Route::get('edit/{id}',         'edit'   )->name('edit'   );
    Route::patch('update/{expense}','update' )->name('update' );
    Route::delete('delete/{id}',    'destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Clients Routes
|--------------------------------------------------------------------------
*/
Route::controller(ClientController::class)->prefix('clients')->as('clients.')->group(function(){
    Route::get('list',             'index'    )->name('index'     );
    Route::get('create',           'create'   )->name('create'    );
    Route::post('store',           'store'    )->name('store'     );
    Route::get('show/{id}',        'show'     )->name('show'      );
    Route::get('edit/{id}',        'edit'     )->name('edit'      );
    Route::get('inovice/{id}',     'invoice'  )->name('invoice'   );
    Route::patch('update/{client}','update'   )->name('update'    );
    Route::delete('delete/{id}',   'destroy'  )->name('destroy'   );
    Route::post('check_cnic',      'checkCnic')->name('check_cnic');

    Route::controller(StatmentController::class)->prefix('statments')->as('statments.')->group(function(){
        Route::get('list/{id}',          'index'  )->name('index'  );
        Route::post('store',             'store'  )->name('store'  );
        Route::get('print/{id}',          'print' )->name('print'  );
        Route::patch('update/{statment}','update' )->name('update' );
        Route::delete('delete/{id}',     'destroy')->name('destroy');
    });

    Route::controller(InvoiceController::class)->prefix('invoices')->as('invoices.')->group(function(){
        Route::post('store',             'store'  )->name('store'  );
    });
});

/*
|--------------------------------------------------------------------------
| Report Routes
|--------------------------------------------------------------------------
*/
Route::controller(ReportController::class)->prefix('reports')->as('reports.')->group(function () {
    Route::get('expense',    'expense')->name('expense');
    Route::post('expense',   'expense')->name('expense');
    Route::get('clients',    'clients')->name('clients');
    Route::post('clients',   'clients')->name('clients');
});

/*
|--------------------------------------------------------------------------
| Notifications Routes
|--------------------------------------------------------------------------
*/
Route::controller(NotificationController::class)->prefix('notifications')->group(function () {
    Route::get('index',             'index'  )->name('notifications.index');
    Route::get('show/{id}',         'show'   )->name('notifications.show');
    Route::delete('destroy/{id}',   'destroy')->name('notifications.destroy');
});

/*
|--------------------------------------------------------------------------
| Audit Routes
|--------------------------------------------------------------------------
*/
Route::controller(AuditController::class)->prefix('audits')->as('audit.')->group(function () {
	Route::get('index', 		 'index'  )->name('index');
	Route::get('show/{id}', 	 'show'   )->name('show');
	Route::delete('destroy/{id}','destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Settings Routes
|--------------------------------------------------------------------------
*/
Route::controller(SettingController::class)->prefix('settings')->group(function () {
	Route::get('index', 	'index'	)->name('settings.index');
	Route::post('save', 	'save'	)->name('settings.save');
});

/*
|--------------------------------------------------------------------------
| Error Log Route
|--------------------------------------------------------------------------
*/
Route::get('logs', 
	[\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']
)->name('logs');

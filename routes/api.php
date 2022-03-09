<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/visa-process', 'IndexController@visaProcess');
Route::get('/visa-documents', 'IndexController@visaDocuments');
Route::get('/visa-workers', 'IndexController@visaWorkers');
Route::get('/news-details/{id}', 'IndexController@newsDetails');



//SUPPORT MESSAGES
// Route::get('/send-mail', 'MailController@sendMail');
Route::post('/mail-add', 'MailController@store');
Route::get('/support-list', 'MailController@messageList');
Route::delete('/support-delete/{id}', 'MailController@destroy')->name('mails.destroy');


//CLIENT
Route::get('/client-add', 'ClientController@index'); 
Route::post('/client-add', 'ClientController@store');

Route::get('/client-list', 'ClientController@listview');

Route::get('/client-edit/{id}', 'ClientController@edit');
Route::put('/client-edit/{id}', 'ClientController@update');

Route::delete('/client-delete/{id}', 'ClientController@destroy')->name('clients.destroy');

//OTHER
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//PASSPORT
Route::get('/passport-add', 'PassportController@index');
Route::post('/passport-add', 'PassportController@store');

Route::get('/passport-list', 'PassportController@listview');

Route::get('/passport-edit/{id}', 'PassportController@edit');
Route::put('/passport-edit/{id}', 'PassportController@update');

Route::delete('/passport-delete/{id}', 'PassportController@destroy')->name('passports.destroy');


//VENDOR
Route::get('/vendor-add', 'VendorController@index');
Route::post('/vendor-add', 'VendorController@store');

Route::get('/vendor-list', 'VendorController@listview');

Route::get('/vendor-edit/{id}', 'VendorController@edit');
Route::put('/vendor-edit/{id}', 'VendorController@update');

Route::delete('/vendor-delete/{id}', 'VendorController@destroy')->name('vendors.destroy');


//SUPPLIER
Route::get('/supplier-add', 'SupplierController@index');
Route::post('/supplier-add', 'SupplierController@store');

Route::get('/supplier-list', 'SupplierController@listview');

Route::get('/supplier-edit/{id}', 'SupplierController@edit');
Route::put('/supplier-edit/{id}', 'SupplierController@update');

Route::delete('/supplier-delete/{id}', 'SupplierController@destroy')->name('suppliers.destroy');


//TASK
Route::get('/task-add', 'TaskController@index');
Route::post('/task-add', 'TaskController@store');

Route::get('/task-list', 'TaskController@listview');

Route::get('/task-edit/{id}', 'TaskController@edit');
Route::put('/task-edit/{id}', 'TaskController@update');

Route::delete('/task-delete/{id}', 'TaskController@destroy')->name('tasks.destroy');


//VISA
Route::get('/visa-add', 'VisaController@index');
Route::post('/visa-add', 'VisaController@store');

Route::get('/visa-list', 'VisaController@listview');

Route::get('/visa-edit/{id}', 'VisaController@edit');
Route::put('/visa-edit/{id}', 'VisaController@update');

Route::delete('/visa-delete/{id}', 'VisaController@destroy')->name('visas.destroy');


//VISARATE
Route::get('/visarate-add', 'VisarateController@index');
Route::get('/visarate-add/{id}', 'VisarateController@showDue');
Route::post('/visarate-add', 'VisarateController@store');

Route::get('/visarate-list', 'VisarateController@listview');

Route::get('/visarate-edit/{id}', 'VisarateController@edit');
Route::put('/visarate-edit/{id}', 'VisarateController@update');

Route::delete('/visarate-delete/{id}', 'VisarateController@destroy')->name('visarates.destroy');


//PAYMENT HISTORY
Route::get('/payment-add', 'PaymentController@index');
Route::get('/payment-add/{id}', 'PaymentController@showDue');
Route::post('/payment-add/{id}', 'PaymentController@store');


Route::get('/payment-list', 'PaymentController@listview');

Route::get('/payment-edit/{id}', 'PaymentController@edit');
Route::put('/payment-edit/{id}', 'PaymentController@update');

Route::delete('/payment-delete/{id}', 'PaymentController@destroy')->name('payments.destroy');


//EXPENSE
Route::get('/expense-add', 'ExpenseController@index');
Route::post('/expense-add', 'ExpenseController@store');

Route::get('/expense-list', 'ExpenseController@listview');

Route::get('/expense-edit/{id}', 'ExpenseController@edit');
Route::put('/expense-edit/{id}', 'ExpenseController@update');

Route::delete('/expense-delete/{id}', 'ExpenseController@destroy')->name('expenses.destroy');


//EXPENSETYPE
Route::get('/expensetype-add', 'ExpenseTypeController@index');
Route::post('/expensetype-add', 'ExpenseTypeController@store');

Route::get('/expensetype-list', 'ExpenseTypeController@listview');

Route::get('/expensetype-edit/{id}', 'ExpenseTypeController@edit');
Route::put('/expensetype-edit/{id}', 'ExpenseTypeController@update');

Route::delete('/expensetype-delete/{id}', 'ExpenseTypeController@destroy')->name('expensetypes.destroy');


//HOME
Route::get('visastatus-moreinfo/{visa_status}', 'HomeController@visaStatusMoreInfo');
// Route::get('visastatus-moreinfo', 'HomeController@visaStatusMoreInfo');

Route::get('client-details/{id}', 'HomeController@clientDetails');


//SLIDERIMAGE
Route::get('slider-image-add', 'SliderImageController@index');
Route::post('/slider-image-add', 'SliderImageController@store');

Route::get('/slider-image-list', 'SliderImageController@listview');

Route::get('/slider-image-edit/{id}', 'SliderImageController@edit');
Route::put('/slider-image-edit/{id}', 'SliderImageController@update');

Route::delete('/slider-image-delete/{id}', 'SliderImageController@destroy')->name('sliderimages.destroy');


//VISANEWS
Route::get('visa-news-add', 'VisaNewsController@index');
Route::post('/visa-news-add', 'VisaNewsController@store');

Route::get('/visa-news-list', 'VisaNewsController@listview');

Route::get('/visa-news-edit/{id}', 'VisaNewsController@edit');
Route::put('/visa-news-edit/{id}', 'VisaNewsController@update');

Route::delete('/visa-news-delete/{id}', 'VisaNewsController@destroy')->name('sliderimages.destroy');


//REPORT
Route::get('/typewise-report', 'ReportController@type');
Route::get('/typewise-report/{expenseType}', 'ReportController@specificType');

Route::get('/datewise-report', 'ReportController@date');
Route::post('/datewise-report-generate', 'ReportController@specificDate');

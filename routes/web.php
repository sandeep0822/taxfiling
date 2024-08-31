<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

// main urls
Route::get('/', [MainController::class, 'index']);
Route::get('/about_us', [MainController::class, 'about_us']);
Route::get('/contact_us', [MainController::class, 'contact_us']);
Route::get('/data_security', [MainController::class, 'data_security']);
Route::get('/terms_conditions', [App\Http\Controllers\MainController::class, 'terms_conditions']);
Route::get('/individualTaxes', [App\Http\Controllers\MainController::class, 'individualTaxes']);
Route::get('/auditSupport', [App\Http\Controllers\MainController::class, 'auditSupport']);
Route::get('/stateAudit', [App\Http\Controllers\MainController::class, 'stateAudit']);
Route::get('/refundStatus', [App\Http\Controllers\MainController::class, 'refundStatus']);
Route::get('/businessTax', [App\Http\Controllers\MainController::class, 'businessTax']);
Route::get('/indianTaxFiling', [App\Http\Controllers\MainController::class, 'indianTaxFiling']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// forget password
Route::get('/forget_password', [ForgotPasswordController::class, 'show']);
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
//Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::put('/update_password', [ForgotPasswordController::class, 'submitResetPasswordForm']);

// login & Register
Route::get('/register', [LoginController::class, 'view']);
Route::post('/create_register', [LoginController::class, 'register']);
Route::get('/login', [LoginController::class, 'display']);
Route::post('/log_in', [LoginController::class, 'login']);

// user Routes
Route::middleware(['afterlogin'])->group(function () {
    Route::get('/edit_profile', [UserController::class, 'edit_profile']);
    Route::get('/users_dashboard', [UserController::class, 'index']);
    Route::get('/tax_filing', [UserController::class, 'tax_filing']);
    Route::get('/Referrals', [UserController::class, 'Referrals']);
    Route::get('/Messages', [UserController::class, 'Messages']);
    Route::get('/Settings', [UserController::class, 'Settings']);
    Route::get('/tax_filing/bankdetails', [UserController::class, 'bankdetails']);
    Route::get('/tax_filing/incomeinf', [UserController::class, 'incomeinf']);
    Route::get('/tax_filing/spuosedoc', [UserController::class, 'spuosedoc']);
    Route::get('/tax_filing/taxsummary', [UserController::class, 'taxsummary']);
    Route::get('/delete_income_doc/{id}', [UserController::class, 'delete_income_doc']);
    Route::get('/delete_spouse_doc/{id}', [UserController::class, 'delete_spouse_doc']);
    Route::get('/delete_one_income_doc/{name}/{dbname}', [UserController::class, 'delete_one_income_doc']);
    Route::get('/delete_one_spouse_doc/{name}/{dbname}', [UserController::class, 'delete_one_spouse_doc']);
    Route::get('/Referrals/myrefferals', [UserController::class, 'myrefferals']);
    Route::get('/Messages/inbox', [UserController::class, 'inbox']);
    Route::get('/Messages/sent', [UserController::class, 'sent']);
    Route::get('/Messages/compose', [UserController::class, 'compose']);

    // form posts
    Route::post('/edit_profile', [UserController::class, 'edit_profile_post']);
    Route::post('/change_password', [UserController::class, 'change_password']);

    Route::post('/basic_info', [UserController::class, 'basic_info']);
    Route::post('/bank_details', [UserController::class, 'bank_details']);
    Route::post('/upload_doc', [UserController::class, 'upload_doc']);
    Route::post('/upload_spouse_doc', [UserController::class, 'upload_spouse_doc']);
    Route::post('/addreferrals', [UserController::class, 'addreferrals']);
    Route::post('/Messages/compose', [UserController::class, 'compose_post']);
});

// admin routes
Route::middleware(['admincheck'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/send_email/{id}', [MainController::class, 'send_mail']);
    Route::get('/view_user/{id}', [AdminController::class, 'view_user']);
    Route::get('/edit_user/{id}', [AdminController::class, 'edit_user']);
    Route::post('/tax_payer_edit/{id}', [AdminController::class, 'tax_payer_edit']);
    Route::post('/income_edit/{id}', [AdminController::class, 'income_edit']);
    Route::post('/spouse_edit/{id}', [AdminController::class, 'spouse_edit']);
    Route::post('/bank_edit/{id}', [AdminController::class, 'bank_edit']);
    Route::get('/view/message/{id}', [AdminController::class, 'view_messages']);
    Route::post('/reply/{id}', [AdminController::class, 'reply']);
    Route::post('/compose', [AdminController::class, 'compose']);
    Route::get('/delete_user/{id}', [AdminController::class, 'delete_user']);
    // data tables
    Route::get('dtactiveclients', [AdminController::class, 'activeclients_ajax'])->name('datatables.activeclients');
    Route::get('dtinactiveclients', [AdminController::class, 'inactiveclients_ajax'])->name('datatables.inactiveclients');
    Route::get('dtmessages', [AdminController::class, 'messages_ajax'])->name('datatables.messages');

    Route::get('dttotalregistrations', [AdminController::class, 'totalregistrations_ajax'])->name('datatables.totalregistrations');

    Route::get('dttotalusers', [AdminController::class, 'totalusers_ajax'])->name('datatables.totalusers');

    Route::prefix('admin')->group(function () {
        Route::get('/delete_one_income_doc/{name}/{dbname}', [AdminController::class, 'delete_one_income_doc']);
        Route::get('/delete_one_spouse_doc/{name}/{dbname}', [AdminController::class, 'delete_one_spouse_doc']);
        Route::get('/dashboard', [AdminController::class, 'dashboard']);
        Route::get('/messages', [AdminController::class, 'messages']);
        Route::get('/TotalRegistrations', [AdminController::class, 'TotalRegistrations']);
        Route::get('/ActiveClients', [AdminController::class, 'ActiveClients']);
        Route::get('/InactiveClients', [AdminController::class, 'InactiveClients']);
        Route::get('/Referrals', [AdminController::class, 'Referrals']);
        Route::get('/ActivityLog', [AdminController::class, 'ActivityLog']);

        Route::get('/users', [AdminController::class, 'users']);
        Route::get('/user', [AdminController::class, 'user']);
        Route::POST('/user/create', [AdminController::class, 'user_create']);
        Route::get('/edit/{id}', [AdminController::class, 'user_edit']);
        Route::PUT('/user/update', [AdminController::class, 'user_update']);

        Route::get('/document', [AdminController::class, 'document']);
        Route::post('/upload_documents', [AdminController::class, 'upload_documents']);
        Route::get('/documents', [AdminController::class, 'documents']);
        Route::get('/delete_documents/{id}', [AdminController::class, 'delete_documents']);
        Route::get('/generatePassword/{id}', [AdminController::class, 'generatePassword']);
        Route::PUT('/user/update_password', [AdminController::class, 'update_password']);
    });
});

// logout Route
Route::get('/logout', [LoginController::class, 'logout']);

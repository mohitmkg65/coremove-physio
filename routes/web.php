<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LeadAdminController;
use App\Http\Controllers\Admin\EnquiryAdminController;
use App\Http\Controllers\Admin\AppointmentAdminController;
use App\Http\Controllers\Admin\OfferAdminController;

/*
|--------------------------------------------------------------------------
| Public Patient-Facing Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/treatments', [HomeController::class, 'treatments'])->name('treatments.index');
Route::get('/conditions', [HomeController::class, 'conditions'])->name('conditions.index');
Route::get('/conditions/{slug}', [HomeController::class, 'conditionDetail'])->name('conditions.show');
Route::get('/offers', [HomeController::class, 'offers'])->name('offers');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

/*
|--------------------------------------------------------------------------
| Public AJAX Intake API Endpoints
|--------------------------------------------------------------------------
*/
Route::post('/api/leads', [LeadController::class, 'store'])->name('api.leads.store');
Route::post('/api/enquiries', [EnquiryController::class, 'store'])->name('api.enquiries.store');
Route::post('/api/appointments', [AppointmentController::class, 'store'])->name('api.appointments.store');

/*
|--------------------------------------------------------------------------
| Admin Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', fn() => redirect()->route('admin.login'))->name('login');
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');

Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| Admin Dashboard Protected Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Leads Module
    Route::get('/leads', [LeadAdminController::class, 'index'])->name('leads.index');
    Route::get('/leads/{lead}', [LeadAdminController::class, 'show'])->name('leads.show');
    Route::post('/leads/{lead}/status', [LeadAdminController::class, 'updateStatus'])->name('leads.status');
    Route::post('/leads/{lead}/notes', [LeadAdminController::class, 'addNote'])->name('leads.notes');

    // Enquiries Module
    Route::get('/enquiries', [EnquiryAdminController::class, 'index'])->name('enquiries.index');
    Route::post('/enquiries/{enquiry}/status', [EnquiryAdminController::class, 'updateStatus'])->name('enquiries.status');

    // Appointments Module
    Route::get('/appointments', [AppointmentAdminController::class, 'index'])->name('appointments.index');
    Route::post('/appointments/{appointment}/status', [AppointmentAdminController::class, 'updateStatus'])->name('appointments.status');

    // Offers Module
    Route::get('/offers', [OfferAdminController::class, 'index'])->name('offers.index');
    Route::post('/offers', [OfferAdminController::class, 'store'])->name('offers.store');
    Route::put('/offers/{offer}', [OfferAdminController::class, 'update'])->name('offers.update');
    Route::post('/offers/{offer}/toggle', [OfferAdminController::class, 'toggle'])->name('offers.toggle');
    Route::delete('/offers/{offer}', [OfferAdminController::class, 'destroy'])->name('offers.destroy');
});

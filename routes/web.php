<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;
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

Route::get('/', [UserController::class, 'LoginPage']);
Route::get('/register', [UserController::class, 'RegisterPage']);
Route::get('/forgotPassword', [UserController::class, 'forgotPassword']);
Route::get('/verify-OTP', [UserController::class, 'verifyOTPPage']);
Route::get('/change-password',[UserController::class, 'resetPasswordPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/dashboard', [UserController::class, 'Dashboard'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/profile-update', [UserController::class, 'updateProfilePage'])->middleware([TokenVerificationMiddleware::class]);
//Customers
Route::get('/customers',[CustomerController::class, 'customersPage'])->middleware([TokenVerificationMiddleware::class]);
//Category
Route::get('/category', [CategoryController::class, 'CategoryPage'])->middleware([TokenVerificationMiddleware::class]);
//Product
Route::get('/product', [ProductController::class, 'index'])->middleware([TokenVerificationMiddleware::class]);
////Backend API
Route::post('/user-register', [UserController::class,'UserRegistration']);
Route::post('/user-login', [UserController::class,'UserLogin']);
Route::post('/sendOTP', [UserController::class,'SendEmailOtp']);
Route::post('/verifyOTP', [UserController::class,'verifyOTP']);
Route::post('/resetPassword', [UserController::class,'resetPassword'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/UserLogout', [UserController::class,'UserLogout'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/userUpdateProfile', [UserController::class, 'UserUpdateProfile'])->middleware([TokenVerificationMiddleware::class]);
//User Profile get
Route::get('/user-profile',[UserController::class, 'UserProfile'])->middleware([TokenVerificationMiddleware::class]);
//Product Category
Route::post('/createCategory',[CategoryController::class, 'createCategory'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/getCategory',[CategoryController::class, 'getCategory'])->middleware([TokenVerificationMiddleware::class]);
Route::delete('/deleteCategory',[CategoryController::class, 'deleteCategory'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/updateCategory',[CategoryController::class, 'updateCategory'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/getCategoriesbyId',[CategoryController::class, 'getCategoriesbyId'])->middleware([TokenVerificationMiddleware::class]);
//Customers
Route::get('/getCustomers',[CustomerController::class, 'customers'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/createCustomer',[CustomerController::class, 'createCustomer'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/CustomerById',[CustomerController::class, 'CustomerById'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/updateCustomer',[CustomerController::class, 'updateCustomer'])->middleware([TokenVerificationMiddleware::class]);
Route::delete('/deleteCustomer',[CustomerController::class, 'deleteCustomer'])->middleware([TokenVerificationMiddleware::class]);
//Product
Route::post('/productAdd',[ProductController::class, 'productAdd'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/getProduct',[ProductController::class, 'getProduct'])->middleware([TokenVerificationMiddleware::class]);
Route::delete('/deleteProduct',[ProductController::class, 'productDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/getByIdProduct',[ProductController::class, 'getByIdProduct'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/updateByIdProduct',[ProductController::class, 'updateProduct'])->middleware([TokenVerificationMiddleware::class]);


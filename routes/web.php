<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmergencyFormController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmergencyDetailController;
use App\Http\Controllers\ProctorPlacementController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentPlacementController;
use App\Http\Controllers\StdPlacementController;
use App\Http\Controllers\EmergencyController;
use App\Http\Controllers\StudentAdminController;




// Route::resource('students', StudentController::class)->except(['show']);
Route::resource('employees', EmployeeController::class);
Route::resource('blocks', BlockController::class); // This generates all the necessary routes
Route::resource('rooms', RoomController::class); // This generates all the necessary routes
Route::resource('proctor_placements', ProctorPlacementController::class);
Route::resource('requests', RequestController::class);
Route::resource('reports', ReportController::class);
// Route::resource('stud_placements', StudentPlacementController::class);
Route::resource('stud_placements', StudentController::class);
Route::resource('students', StudentController::class);
Route::get('/students/search', [StudentController::class, 'search'])->name('students.search');
Route::resource('stud_placements', StdPlacementController::class);
Route::resource('emergencies', EmergencyController::class);



Route::post('/students/import', [StudentController::class, 'importExcel'])->name('students.import');



Route::get('/requests/{id}/approve', [RequestController::class, 'approve'])->name('requests.approve');
Route::get('/students/search', [StudentController::class, 'search'])->name('students.search');

Route::get('/login', function () {
    return view('auth.login'); // Return the login view
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/', function () {
    return view('home'); // Adjust the view if necessary
})->name('home');



Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');  // GET method
Route::post('register', [RegisterController::class, 'register']);  // POST method for form submission

// Define user dashboard redirects
Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');
Route::get('manager/dashboard', function () {
    return view('manager.dashboard');
})->name('manager.dashboard');
Route::get('student/dashboard', function () {
    return view('students.dashboard');
})->name('students.dashboard');
Route::get('staff/dashboard', function () {
    return view('proctor_placements.dashboard');
})->name('proctor_placements.dashboard');

Route::get('admin/dashboard', function () {  //dashboard
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('manage/accounts', function () { //manage accounts
    return view('admin.manage_accounts');
})->name('admin.manage_accounts');

Route::get('manage/accounts/add', function () {  //add
    return view('admin.add_accounts');
})->name('admin.add_accounts');

Route::get('manage/accounts/update', function () { //update
    return view('admin.update_accounts');
})->name('admin.update_accounts');

Route::get('manage/accounts/view', function () { //view
    return view('admin.view_accounts');
})->name('admin.view_accounts');

Route::get('manage/students', function () { //manage students
    return view('admin.manage_students');
})->name('admin.manage_students');

Route::get('manage/students/view', function () { //view students
    return view('admin.view_students');
})->name('admin.view_students');

Route::get('manage/students/add', function () { //add students
    return view('admin.add_students');
})->name('admin.add_students');

Route::get('view/students/update', function () { //update students
    return view('admin.update_students');
})->name('admin.update_students');

// Route::get('/admin/add-accounts', [AdminController::class, 'addAccounts'])->name('admin.add_accounts');

Route::get('proctor/dashboard', function () {
    return view(' proctor_placements.dashboard');
})->name(' proctor_placements.dashboard');

Route::get('manage/accounts', function () {
    return view('proctor_placements.manage_accounts');
})->name('proctor_placements.manage_accounts');


Route::get('manage/students', function () {
    return view('proctor_placements.manage_students');
})->name('proctor_placements.manage_students');


Route::get('view/placements', function () {
    return view('proctor_placements.view_placements');
})->name('proctor_placements.view_placements');

// Route to display the form
Route::get('/register-student', function () {
    return view('admin.add_students');
})->name('register_student_form');

// Route to handle the form submission
Route::post('/register-student', [StudentController::class, 'register'])->name('register_student');


// Route to handle the form submission
Route::post('/emergency-form', [StudentController::class, 'emergency'])->name('emergency-form');

Route::get('/update-password', function () {
    return view('students.update_password');
})->name('students.update_password');



Route::get('/reset-password', function () {
    return view('students.reset_password');
})->name('students.reset_password');

Route::get('/view-password', function () {
    return view('students.view_password');
})->name('students.view_password');

Route::get('/view-emergency', function () {
    return view('students.view_emergency');
})->name('students.view_emergency');

Route::get('/update-emergency', function () {
    return view('students.update_emergency');
})->name('students.update_emergency');

// Route to display the form
Route::get('/emergency-form', function () {
    return view('students.emergency');
})->name('students.emergency');


// Display the emergency form
// Route::get('/emergency-form', [EmergencyFormController::class, 'view'])->name('student.emergency');

// // Store the emergency form
// Route::post('/emergency-form', [EmergencyFormController::class, 'store'])->name('emergency.form.store');

Route::get('/employees/add', [EmployeeController::class, 'showUploadForm'])->name('employees.add');
Route::post('/employees/upload', [EmployeeController::class, 'uploadFile'])->name('employees.upload');

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentinfoController;
use App\Http\Controllers\enrolledsubjectsController;
use App\Http\Controllers\gradesController;
use App\Http\Controllers\balancesController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 01 - going to student/index file
Route::get('/student', function () {
    return view('student.index');
})->middleware(['auth','verified'])->name('student');

// 02 - navigate to Form Add Student
Route::get('/student/add', function () {
    return view('student.add');
})->middleware(['auth','verified'])->name('add-student');

// 03 - store student info to create function under studentinfoController
Route::post('/student/add',[studentinfoController::class, 'store'])
    ->middleware(['auth','verified'])
    ->name('student-store');

// 04 - get all data from studentinfo table
Route::get('/student', [studentinfoController::class, 'index'])
->middleware(['auth','verified'])
->name('student');

// 05 - view individually student info
Route::get('/student/{stuno}', [studentinfoController::class, 'show'])
->middleware(['auth','verified'])
->name('student-show');

// 1 enrolled subjects index
Route::get('/enrolledsubjects', function () {
    return view('enrolledsubjects.index');
})->middleware(['auth','verified'])->name('enrolledsubjects');

// 2 add subjects
Route::get('/enrolledsubjects/add', function () {
    return view('enrolledsubjects.add');
})->middleware(['auth','verified'])->name('add-subjects');

// 3 store enrolled subjects to create function under enrolledsubjectsController
Route::post('/enrolledsubjects/add',[enrolledsubjectsController::class, 'store'])
    ->middleware(['auth','verified'])
    ->name('enrolledsubjects-store');

// 4 get all data from enrolledsubjects table
Route::get('/enrolledsubjects', [enrolledsubjectsController::class, 'index'])
->middleware(['auth','verified'])
->name('enrolledsubjects');

// 5 view individually enrolledsubjects
Route::get('/enrolledsubjects/{esNo}', [enrolledsubjectsController::class, 'show'])
->middleware(['auth','verified'])
->name('enrolledsubjects-show');

// 1 grades index
Route::get('/grades', function () {
    return view('grades.index');
})->middleware(['auth','verified'])->name('grades');

// 2 add grades
Route::get('/grades/add', function () {
    return view('grades.add');
})->middleware(['auth','verified'])->name('add-grades');

//  get studentinfo
Route::get('/balances/add', [balancesController::class, 'getstudentinfo'])
->middleware(['auth', 'verified'])
->name('add-grades');

// get subjectinfo
Route::get('/grades/add', [gradesController::class, 'getsubjectinfo'])
->middleware(['auth', 'verified'])
->name('add-grades');

// 3 store grades to create function under gradesController
Route::post('/grades/add',[gradesController::class, 'store'])
    ->middleware(['auth','verified'])
    ->name('grades-store');

// 4 get all data from grades table
Route::get('/grades', [gradesController::class, 'index'])
->middleware(['auth','verified'])
->name('grades');

// 5 view individually grades
Route::get('/grades/{Grade}', [gradesController::class, 'show'])
->middleware(['auth','verified'])
->name('grades-show');



// 1 balances index
Route::get('/balances', function () {
    return view('balances.index');
})->middleware(['auth','verified'])->name('balances');

// 2 add balances
Route::get('/balances/add', function () {
    return view('balances.add');
})->middleware(['auth','verified'])->name('add-balances');

// 3 store balances to create function under balancesController
Route::post('/balances/add',[balancesController::class, 'store'])
    ->middleware(['auth','verified'])
    ->name('balances-store');

// 4 get all data from balances table
Route::get('/balances', [balancesController::class, 'index'])
->middleware(['auth','verified'])
->name('balances');

// 5 view individually balances
Route::get('/balances/{bNo}', [balancesController::class, 'show'])
->middleware(['auth','verified'])
->name('balances-show');

//6 balances
Route::get('/balances/add', [balancesController::class, 'getstudentinfo'])
->middleware(['auth', 'verified'])
->name('add-balances');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

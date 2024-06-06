<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CreateStudentController;
use App\Http\Controllers\Admin\SetAssignmentController;
use App\Http\Controllers\DownloadsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\StudentAssignmentController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

//student route
Route::middleware(['auth','userMiddleware'])->group(function(){

        Route::get('dashboard',[UserController::class,'index'])->name('dashboard');
        Route::get('studentinfo',[UserController::class,'getstudentinfo'])->name('student.getstudentinfo');
        Route::get('checkassignment',[StudentAssignmentController::class,'index'])->name('checkassignment');
        Route::get('getassignments',[StudentAssignmentController::class,'getassignments'])->name('student.getassignments');
        Route::get('/submitassignmentform/{id}',[StudentAssignmentController::class,'create'])->name('student.submitassignmentform');
        Route::post('submitassignment',[StudentAssignmentController::class,'store'])->name('student.submitassignment');
        Route::get('/download/{id}',[DownloadsController::class,'download'])->name('student.download');

    }); 


//admin route
Route::middleware(['auth',  'adminMiddleware'])->group(function(){

    Route::get('admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('admin/getstudentdata',[AdminController::class,'getstudentdata'])->name('admin.getstudentdata');
    Route::get('admin/student',[AdminController::class,'create'])->name('admin.addstudent');
    Route::post('/admin/student',[AdminController::class,'store'])->name('admin.createstudent');
        
    Route::post('/admin/studentprofile',[CreateStudentController::class,'store'])->name('admin.addstudentprofile');
    Route::get('admin/setassignment',[SetAssignmentController::class,'index'])->name('admin.setassignment');
    Route::get('admin/studentassignmentdata',[SetAssignmentController::class,'getstudentassignmentdata'])->name('admin.getstudentassignmentdata');
    Route::get('/admin/checkassignment/{student_id}',[SetAssignmentController::class,'show'])->name('admin.checkassignment');
    Route::get('/admin/checkassignment/{student_id}',[SetAssignmentController::class,'show'])->name('admin.checkassignment');
    Route::get('/admin/checkstudentassignment/{student_id}',[SetAssignmentController::class,'checkstudentassignment'])->name('admin.checkstudentassignment');
    Route::get('/admin/assignmentdownload/{assignment_id}',[DownloadsController::class,'student_assignment_download'])->name('admin.student_assignment_download');
    Route::get('/admin/setassignmentform/{id}',[SetAssignmentController::class,'create'])->name('admin.setassignmentform');
    Route::post('admin/setassignmentform/{student_id}',[SetAssignmentController::class,'store'])->name('admin.storesetassignmentform');


});

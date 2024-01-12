<?php

use App\Http\Controllers\api\ApiController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::get('/programs', [ApiController::class, 'programsList']);
Route::get('/programs/{_date}', [ApiController::class, 'programsDateFiltered']);
Route::get('/program/{_id}', [ApiController::class, 'programSingle']);
Route::get('/programs/archives', [ApiController::class, 'programArchivesList']);
Route::get('/programs/archive/programs', [ApiController::class, 'welcomeArchiveProgramsList']);

Route::post('/chat/student/store', [ApiController::class, 'storeStudentMessage']);
Route::get('/chat/student/{student_id}', [ApiController::class, 'listStudentChat']);
Route::post('/chat/admin/store', [ApiController::class, 'storeAdminReply']);
Route::get('/chat/admin', [ApiController::class, 'listAdminChat']);

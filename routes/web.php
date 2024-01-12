<?php

use App\Http\Controllers\admin\automation\AutomationController;
use App\Http\Controllers\admin\day_archive\DayArchiveController;
use App\Http\Controllers\admin\LeftController;
use App\Http\Controllers\admin\library\LibraryController;
use App\Http\Controllers\admin\library\assetCategoryController;
use App\Http\Controllers\admin\play\PlayController;
use App\Http\Controllers\admin\program\GenreController;
use App\Http\Controllers\admin\program\ProgramController;
use App\Http\Controllers\admin\RightController;
use App\Http\Controllers\admin\users\SchoolController;
use App\Http\Controllers\admin\users\UserController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\chat\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\school\SchoolController as ModeratorController;
use App\Http\Controllers\school\users\UserController as ModeratorUserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [BaseController::class, 'index'])->name('index');
Route::get('/programs', [BaseController::class, 'programs'])->name('welcome.programs');
Route::get('/programs/list', [BaseController::class, 'welcomeProgramsList'])->name('welcome.programs.list');
Route::get('/programs/archives', [BaseController::class, 'programArchivesList'])->name('welcome.archives.list');
Route::get('/programs/archive/programs', [BaseController::class, 'welcomeArchiveProgramsList'])->name('welcome.archive.programs.list');
Route::get('/blog', [BaseController::class, 'blog'])->name('welcome.blog.index');
Route::get('/blog/:id', [BaseController::class, 'blogSingle'])->name('welcome.blog.single.index');
Route::get('/about-us', [BaseController::class, 'about'])->name('about-us');
Route::get('/header', [BaseController::class, 'header'])->name('header');


Auth::routes();

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/user/profile', [BaseController::class, 'userProfile'])->name('student.profile');
    Route::post('/user/update', [BaseController::class, 'userUpdate'])->name('student.profile.update');
    // chat
    Route::post('/chat/student/store', [ChatController::class, 'storeStudentMessage'])->name('student.admin.chat');
    Route::get('/chat/student/list', [ChatController::class, 'listStudentChat'])->name('student.chat');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/dashboard', [RightController::class, 'viewRightHome'])->name('admin.right_dashboard.index');
    // schools management
    Route::get('/admin/schools', [RightController::class, 'viewSchools'])->name('admin.schools.index');
    Route::post('/admin/schools/store', [SchoolController::class, 'storeSchool'])->name('admin.school.store');
    Route::get('/admin/schools/list', [SchoolController::class, 'listSchools'])->name('admin.school.list');
    Route::post('/admin/schools/delete', [SchoolController::class, 'deleteSchool'])->name('admin.school.delete');
    // users management
    Route::get('/admin/users', [RightController::class, 'viewUsers'])->name('admin.users.index');
    Route::post('/admin/users/store', [UserController::class, 'storeUser'])->name('admin.user.store');
    Route::get('/admin/users/students/list', [UserController::class, 'listStudents'])->name('admin.user.list.students');
    Route::post('/admin/users/students/delete', [UserController::class, 'deleteStudent'])->name('admin.user.delete.students');
    Route::get('/admin/users/guests/list', [UserController::class, 'listGuests'])->name('admin.user.list.guests');
    Route::post('/admin/users/guests/delete', [UserController::class, 'deleteGuest'])->name('admin.user.delete.guests');
    Route::get('/admin/users/schooladmins/list', [UserController::class, 'listSchoolAdmins'])->name('admin.user.list.schooladmins');
    Route::post('/admin/users/schooladmins/delete', [UserController::class, 'deleteSchoolAdmin'])->name('admin.user.delete.schooladmins');
    Route::get('/admin/users/teachers/list', [UserController::class, 'listTeachers'])->name('admin.user.list.teachers');
    Route::post('/admin/users/teachers/delete', [UserController::class, 'deleteTeacher'])->name('admin.user.delete.teachers');
    // genre management
    Route::get('/admin/genres', [LeftController::class, 'viewGenres'])->name('admin.genre.index');
    Route::get('/admin/genres/list', [GenreController::class, 'listGenres'])->name('admin.genre.list');
    Route::post('/admin/genres/store', [GenreController::class, 'storeGenre'])->name('admin.genre.store');
    Route::post('/admin/genres/delete', [GenreController::class, 'deleteGenre'])->name('admin.genre.delete');
    // programs management
    Route::get('/admin/programs', [LeftController::class, 'viewPrograms'])->name('admin.programs.index');
    Route::get('/admin/programs/list', [ProgramController::class, 'listArchives'])->name('admin.archive.list');
    Route::post('/admin/programs/store', [ProgramController::class, 'storeArchive'])->name('admin.archive.store');
    Route::post('/admin/programs/delete', [ProgramController::class, 'deleteArchive'])->name('admin.archive.delete');
    // archives management
    Route::get('/admin/programs-archive', [LeftController::class, 'viewProgramsArchive'])->name('admin.archives.index');
    Route::get('/admin/programs-archive/list', [ProgramController::class, 'listPrograms'])->name('admin.program.list');
    Route::post('/admin/programs-archive/store', [ProgramController::class, 'storeProgram'])->name('admin.program.store');
    Route::post('/admin/programs-archive/delete', [ProgramController::class, 'deleteProgram'])->name('admin.program.delete');
    Route::get('/admin/programs-archive/episode', [ProgramController::class, 'getEpisodes'])->name('admin.episode.get');
    // library management
    Route::get('/admin/library', [LeftController::class, 'viewLibrary'])->name('admin.library.index');
    Route::get('/admin/library/list', [LibraryController::class, 'listLibraries'])->name('admin.library.list');
    Route::post('/admin/library/store', [LibraryController::class, 'storeLibrary'])->name('admin.library.store');
    Route::post('/admin/library/delete', [LibraryController::class, 'deleteLibrary'])->name('admin.library.delete');
    Route::post('/admin/library/Category/store', [assetCategoryController::class, 'storeCategory'])->name('admin.library.Category.store');
    // library management
    Route::get('/admin/day-archive', [LeftController::class, 'viewDayPlaylist'])->name('admin.day_archive.index');
    Route::get('/admin/day-archive/list', [DayArchiveController::class, 'listDayArchives'])->name('admin.day_archive.list');
    Route::post('/admin/day-archive/store', [DayArchiveController::class, 'storeDayArchive'])->name('admin.day_archive.store');
    Route::post('/admin/day-archive/delete', [DayArchiveController::class, 'deleteDayArchive'])->name('admin.day_archive.delete');
   // Home Page Edite 
   Route::get('/admin/edit-home', [LeftController::class, 'viewDayEditHome'])->name('admin.edit_home.index');
   Route::post('/admin/timetable', [LeftController::class, 'storeTimeTable'])->name('admin.timeTable.store');
   Route::post('/admin/sliderImages', [LeftController::class, 'storeSliderImages'])->name('admin.sliderImage.store');
   
   
    // automation management
    Route::get('/admin/automation', [LeftController::class, 'viewLeftHome'])->name('admin.left_dashboard.index');
    Route::get('/admin/automation/list', [AutomationController::class, 'listAutomations'])->name('admin.automation.list');
    Route::post('/admin/automation/store', [AutomationController::class, 'storeAutomation'])->name('admin.automation.store');
    Route::post('/admin/automation/delete', [AutomationController::class, 'deleteAutomation'])->name('admin.automation.delete');
    // automation status changing
    Route::post('/admin/automation/start', [PlayController::class, 'startAutomation'])->name('admin.automation.start');
    Route::get('/admin/automation/status', [PlayController::class, 'getStatus'])->name('admin.automation.status');
    // chat
    Route::get('/admin/notifications', [RightController::class, 'viewNotifications'])->name('admin.notifications.index');
    Route::post('/chat/admin/store', [ChatController::class, 'storeAdminReply'])->name('admin.rply.store');
    Route::get('/chat/admin/list', [ChatController::class, 'listAdminChat'])->name('admin.admin.chat');
});

Route::middleware(['auth', 'user-access:school'])->group(function () {
    Route::get('/school/home', [HomeController::class, 'schoolHome'])->name('school.dashboard');
    Route::get('/school/profile', [ModeratorController::class, 'schoolProfile'])->name('moderator.profile');
    Route::get('/school/new-student', [ModeratorController::class, 'newStudent'])->name('moderator.student.new');
    Route::post('/school/users/store', [ModeratorUserController::class, 'storeUser'])->name('moderator.admin.user.store');
    Route::get('/school/users/students/list', [ModeratorUserController::class, 'listStudents'])->name('moderator.list.students');
});

<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GranteeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\StatController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('role:mhs')->group(function() {
    Route::get('beasiswa', [GranteeController::class, 'index']);
    Route::get('beasiswa/update', [GranteeController::class, 'edit']);
    Route::patch('beasiswa/update', [GranteeController::class, 'update']);
    Route::get('download/{jenis_dok}/{path}', [GranteeController::class, 'download']);
    Route::get('beasiswa/akun', [GranteeController::class, 'akun']);
    Route::patch('beasiswa/akun', [GranteeController::class, 'akunupdate']);
});

Route::middleware('role:adm')->group(function() {
    // admin dashboard
    Route::get('admin', [AdminController::class, 'index']);

    // Program Controller
    Route::resource('admin/programs', ProgramController::class);
    
    // Scholarship Controller
    Route::resource('admin/scholarships', ScholarshipController::class);
    
    // Stat Controller
    Route::resource('admin/stats', StatController::class);
    
    // Faq Controller
    Route::resource('admin/faqs', FaqController::class);
    
    // Notice Controller
    Route::resource('admin/notices', NoticeController::class);

    // Student Controller
    Route::resource('admin/students', StudentController::class);

    // User Controller
    Route::resource('admin/users', UserController::class);

    // Report Controller
    Route::get('admin/reports', [ReportController::class, 'index']);
    Route::put('admin/reports', [ReportController::class, 'cetak']);
    Route::put('admin/reports/unduh', [ReportController::class, 'unduhpdf']);

    // Download Controller
    Route::get('admin/file/{rekkoran}', [DownloadController::class, 'index']);
    // Route::get('alldownload', [DownloadController::class, 'download']);
});


// Route::redirect('/', '/login');
Route::get('/', [LandingController::class, 'index']);
Route::get('login', [LoginController::class, 'index']);
Route::post('login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
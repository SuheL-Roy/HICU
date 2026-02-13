<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ExamModuleController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ListeningAnswerController;
use App\Http\Controllers\ListeningController;
use App\Http\Controllers\ListeningTestController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReadingController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\WritingController;
use App\Http\Controllers\WrittingController;
use App\Models\Store;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**--------------Frontend Modules---------------**/
Route::middleware('auth')->name('frontend.')->group(function () {
    Route::get('/', [FrontendController::class, 'exam_module'])->name('exam_module');
    Route::get('/listening', [FrontendController::class, 'listening'])->name('listening');
    Route::get('/reading', [FrontendController::class, 'reading'])->name('reading');
    Route::get('/writing-type', [FrontendController::class, 'writing_type'])->name('writing_type');
    Route::get('/writing', [FrontendController::class, 'writing'])->name('writing');
   
});

/**--------------Listening Modules Test---------------**/
Route::middleware('auth')->name('ListeningTest.')->group(function () {
    Route::get('/listening-test', [ListeningTestController::class, 'listening_test'])->name('listening_test');
    Route::post('/listening-test-store', [ListeningTestController::class, 'listening_test_store'])->name('listening_test_store');
});


/**--------------Exam Modules---------------**/
Route::prefix('exam-module/')->middleware('auth')->name('exam_module.')->group(function () {
    Route::get('/list', [ExamModuleController::class, 'list'])->name('list');
    Route::get('/destroy', [ExamModuleController::class, 'destroy'])->name('destroy');
    Route::post('/store', [ExamModuleController::class, 'store'])->name('store');
});

/**--------------Writing Modules Type---------------**/
Route::prefix('writing-module-type/')->middleware('auth')->name('writing_module_type.')->group(function () {
    Route::get('/type-list', [WritingController::class, 'type_list'])->name('type_list');
    Route::get('/type-destroy', [WritingController::class, 'destroy_type'])->name('destroy_type');
    Route::post('/type-store', [WritingController::class, 'type_store'])->name('type_store');
});


/**--------------Listening Modules---------------**/
Route::prefix('listening-module/')->middleware('auth')->name('listening_module.')->group(function () {
    Route::get('/list', [ListeningController::class, 'list'])->name('list');
    Route::get('/destroy', [ListeningController::class, 'destroy'])->name('destroy');
    Route::post('/store', [ListeningController::class, 'store'])->name('store');
});

/**--------------Reading Modules---------------**/
Route::prefix('reading-module/')->middleware('auth')->name('reading_module.')->group(function () {
    Route::get('/list', [ReadingController::class, 'list'])->name('list');
    Route::get('/destroy', [ReadingController::class, 'destroy'])->name('destroy');
    Route::post('/store', [ReadingController::class, 'store'])->name('store');
});

/**--------------Writing Modules---------------**/
Route::prefix('writing-module/')->middleware('auth')->name('writing_module.')->group(function () {
    Route::get('/list', [WritingController::class, 'list'])->name('list');
    Route::get('/destroy', [WritingController::class, 'destroy'])->name('destroy');
    Route::post('/store', [WritingController::class, 'store'])->name('store');
});

/**--------------Exam Modules---------------**/
Route::prefix('exam-module/')->middleware('auth')->name('exam_module.')->group(function () {
    Route::get('/list', [ExamModuleController::class, 'list'])->name('list');
    Route::get('/destroy', [ExamModuleController::class, 'destroy'])->name('destroy');
    Route::post('/store', [ExamModuleController::class, 'store'])->name('store');
});

/**-------------- Listening Answer---------------**/
Route::prefix('listening-answer-module/')->middleware('auth')->name('listening_answer_module.')->group(function () {
    Route::get('/create', [ListeningAnswerController::class, 'create'])->name('create');
    // Route::get('/answer', [ListeningAnswerController::class, 'answer'])->name('answer');
    Route::get('/answer/{module_id}', [ListeningAnswerController::class, 'answer'])->name('answer');
    Route::post('/store', [ListeningAnswerController::class, 'store'])->name('store');
});

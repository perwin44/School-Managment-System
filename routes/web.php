<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Exams\ExamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Questions\QuestionController;
use App\Http\Controllers\Quizzes\QuizzController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Students\AttendanceController;
use App\Http\Controllers\Students\FeesController;
use App\Http\Controllers\Students\FeesInvoicesController;
use App\Http\Controllers\Students\GraduatedController;
use App\Http\Controllers\Students\LibraryController;
use App\Http\Controllers\Students\OnlineClasseController;
use App\Http\Controllers\Students\PaymentController;
use App\Http\Controllers\Students\ProcessingFeeController;
use App\Http\Controllers\Students\PromotionController;
use App\Http\Controllers\Students\ReceiptStudentsController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Subjects\SubjectController;
use App\Http\Controllers\Teachers\TeacherController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::get('/', [HomeController::class, 'index'])->name('selection');

// Route::group(['middleware' => ['guest']], function () {
//     Route::get('/', function () {
//         return view('welcome');
//     })->name('dashboard');
// });


/////////////////////////admin////////////////////////

Route::group(['namespace' => 'Auth'], function () {

    Route::get('/login/{type}',[LoginController::class, 'loginForm'])->middleware('guest')->name('login_show');

    Route::post('/login',[LoginController::class, 'login'])->name('login');

    Route::post('/logout/{type}', [LoginController::class, 'logout'])->name('logout');

    /////////////////////////end admin////////////////////////



/////////////////////////student////////////////////////
    });

    Route::group(['namespace' => 'Auth'], function () {

        Route::get('/login1/{type}',[LoginController::class, 'loginForm1'])->middleware('guest')->name('login.show');

        Route::post('/login1',[LoginController::class, 'login1'])->name('login1');

        Route::post('/logout/student', [LoginController::class, 'logoutstudent'])->name('logout.student');

        });
        /////////////////////////end student////////////////////////


        /////////////////////////teacher////////////////////////
        Route::group(['namespace' => 'Auth'], function () {

            Route::get('/loginteacher/{type}',[LoginController::class, 'loginFormteacher'])->middleware('guest')->name('login.teacher');

            Route::post('/loginteacher',[LoginController::class, 'loginteacher'])->name('loginteacher');

            Route::post('/logout/teacher', [LoginController::class, 'logoutteacher'])->name('logout.teacher');

            });
            /////////////////////////end teacher////////////////////////

                /////////////////////////parent////////////////////////
        Route::group(['namespace' => 'Auth'], function () {

            Route::get('/loginparent/{type}',[LoginController::class, 'loginFormparent'])->middleware('guest')->name('login.parent');

            Route::post('/loginparent',[LoginController::class, 'loginparent'])->name('loginparent');

            Route::post('/logout/parent', [LoginController::class, 'logoutparent'])->name('logout.parent');

            });
            /////////////////////////end parent////////////////////////

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {


        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard1');

        Route::resource('Grades', GradeController::class);

        Route::resource('Classrooms', ClassroomController::class);
        Route::delete('delete_all', [ClassroomController::class, 'delete_all'])->name('delete_all');
        Route::get('filter_by_grade', [ClassroomController::class, 'filter_by_grade'])->name('filter_by_grade');


        Route::resource('Sections', SectionController::class);
        Route::get('classes/{id}', [SectionController::class, 'getClasses']);
        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/livewire/update', $handle);
        });

        Route::get('test',function(){
            return view('test');
        });


        Route::view('/add_parent', 'livewire.show_form')->name('add_parent');

           //==============================Teachers============================
            //Route::group(['namespace' => 'Teachers'], function () {
        Route::resource('Teachers',  TeacherController::class);
    //});

 //==============================Students============================
 //Route::group(['namespace' => 'Students'], function () {
    Route::resource('Students', StudentController::class);
     Route::get('/Get_classrooms/{id}',[StudentController::class, 'Get_classrooms']);
     Route::get('/Get_Sections/{id}', [StudentController::class, 'Get_Sections']);
    Route::post('Upload_attachment', [StudentController::class, 'Upload_attachment'])->name('Upload_attachment');
    Route::get('Download_attachment/{studentsname}/{filename}', [StudentController::class, 'Download_attachment'])->name('Download_attachment');
    Route::post('Delete_attachment', [StudentController::class, 'Delete_attachment'])->name('Delete_attachment');
//});


 //==============================Promotion Students ============================
 //Route::group(['namespace' => 'Students'], function () {
    Route::resource('Promotion', PromotionController::class);
    Route::resource('Graduated', GraduatedController::class);
    Route::resource('Fees', FeesController::class);
    Route::resource('Fees_Invoices', FeesInvoicesController::class);
    Route::resource('receipt_students', ReceiptStudentsController::class);
    Route::resource('ProcessingFee', ProcessingFeeController::class);
    Route::resource('Payment_students', PaymentController::class);
    Route::resource('Attendance', AttendanceController::class);

    Route::resource('online_classes', OnlineClasseController::class);
    Route::get('/indirect_admin', [OnlineClasseController::class, 'indirectCreate'])->name('indirect.create.admin');
    Route::post('/indirect_admin', [OnlineClasseController::class, 'storeIndirect'])->name('indirect.store.admin');
//});

    Route::resource('library', LibraryController::class);
    Route::get('download_file/{filename}', [LibraryController::class,'downloadAttachment'])->name('downloadAttachment');


   //==============================Subjects============================
  // Route::group(['namespace' => 'Subjects'], function () {
    Route::resource('subjects', SubjectController::class);
//});

 //==============================Exams============================
 //Route::group(['namespace' => 'Exams'], function () {
    Route::resource('Exams', ExamController::class);
//});

  //==============================Quizzes============================
 // Route::group(['namespace' => 'Quizzes'], function () {
    Route::resource('Quizzes', QuizzController::class);
//});

  //==============================questions============================
  //Route::group(['namespace' => 'questions'], function () {
    Route::resource('questions', QuestionController::class);
//});


    //==============================Setting============================
    Route::resource('settings', SettingController::class);
//});














        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });
    }
);


require __DIR__ . '/auth.php';

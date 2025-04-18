<?php

use App\Http\Controllers\BlogCatController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompareDetailsController;
use App\Http\Controllers\CounsellorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UniversitiesController;
use App\Http\Controllers\UniversitiesDetailsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VsCompareDetailsController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\CourceController;
use App\Http\Controllers\SubCourceController;
use App\Http\Controllers\FaqUniversityController;
use App\Http\Controllers\FaqBlogController;
use App\Http\Controllers\FaqCourceController;
use App\Http\Controllers\FaqSubCourseController;
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
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

// Route::get('/', function () {
//     return view('welcome');
// });




Route::get('/datatable', function () {
    return view('datatable');
})->name('datatable');

// have kiya adti nai hu joi jo v mari asdiiiiiiiiiiiiiiiiii 
 

Route::get('/', function () {
    if (Session()->has('data')) {

        return view('index');
    }
    return redirect('/login');
});

Route::get('/passwordrecover/{token}', [LoginController::class, 'passwordrecovershow'])->name('passwordrecover');
Route::post('/passwordrecoverprocess', [LoginController::class, 'passwordrecoverprocess'])->name('passwordrecoverprocess');

Route::get('/login', [LoginController::class, 'show']);
Route::post('/loginprocess', [LoginController::class, 'checklogin']);
Route::get('/adminforgetpwd', function () {
    return view('forgotpassword');
});
Route::post('/forgetpassword', [LoginController::class, 'forgetpassword'])->name('forgetpassword');

Route::get('logout', function () {

    if (Session()->has('data')) {

        Session()->forget('data');
        return redirect('/');
    }

})->name('logout');

Route::get('/adminprofileupdate', [LoginController::class, 'showprofile'])->name('adminprofileupdate');
Route::post('/adminprofileedit', [LoginController::class, 'profileedit'])->name('adminprofileedit');

Route::get('/adminchagepwd', [LoginController::class, 'adminpwdshow'])->name('adminchagepwd');
Route::post('/changepwd', [LoginController::class, 'changepwd'])->name('changepwd');

///////////////////////////////////////users ///////////////////////////

Route::get('/usershow', [UserController::class, 'show'])->name('usershow');
Route::get('/useradd', [UserController::class, 'add'])->name('useradd');
Route::post('/usersave', [UserController::class, 'save'])->name('usersave');
Route::get('/userupdate/{user}', [UserController::class, 'update'])->name('userupdate');
Route::post('/useredit/{user}', [UserController::class, 'edit'])->name('useredit');
Route::get('/userenable/{user}', [UserController::class, 'enable'])->name('userenable');
Route::get('/userdisable/{user}', [UserController::class, 'disable'])->name('userdisable');
Route::get('/userdelete/{user}', [UserController::class, 'delete'])->name('userdelete');
Route::get('/userdetailshow/{user}', [UserController::class, 'detailshow'])->name('userdetailshow');

Route::get('/usergiftshow/{user}', [UserController::class, 'usergiftshow'])->name('usergiftshow');
Route::post('/usergiftsave', [UserController::class, 'usergiftsave'])->name('usergiftsave');
Route::get('/usergiftdelete/{usergift}', [UserController::class, 'usergiftdelete'])->name('usergiftdelete');

Route::get('/usercourseshow/{user}', [UserController::class, 'usercourseshow'])->name('usercourseshow');
Route::post('/usercoursesave', [UserController::class, 'usercoursesave'])->name('usercoursesave');
Route::get('/usercoursedelete/{usercourse}', [UserController::class, 'usercoursedelete'])->name('usercoursedelete');

Route::get('/usermaterialshow/{user}', [UserController::class, 'usermaterialshow'])->name('usermaterialshow');
Route::post('/usermaterialsave', [UserController::class, 'usermaterialsave'])->name('usermaterialsave');
Route::get('/usermaterialdelete/{usermaterial}', [UserController::class, 'usermaterialdelete'])->name('usermaterialdelete');

Route::get('/userexamshow/{user}', [UserController::class, 'userexamshow'])->name('userexamshow');
Route::post('/userexamsave', [UserController::class, 'userexamsave'])->name('userexamsave');
Route::get('/userexamdelete/{userexam}', [UserController::class, 'userexamdelete'])->name('userexamdelete');

//admin routes //
// Route::get('/users',[UserController::class,'show'])->name('user_show');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::post('/users/update', [UserController::class, 'update'])->name('users.update');
Route::post('/users/delete', [UserController::class, 'delete'])->name('users.delete');

//Roles Routes //
// Route::get('/roles',[UserController::class,'rolles_show'])->name('roles_show');

Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
Route::post('/roles/update/{id}', [RoleController::class, 'update'])->name('roles.update');
Route::get('/roles/delete/{id}', [RoleController::class, 'destroy'])->name('roles.delete');

//Counceler Routes //
Route::get('/counsellors', [CounsellorController::class, 'index'])->name('counsellors.index');
Route::post('/counsellors/store', [CounsellorController::class, 'store'])->name('counsellors.store');
Route::get('/counsellors/edit/{id}', [CounsellorController::class, 'edit'])->name('counsellors.edit');
Route::post('/counsellors/update/{id}', [CounsellorController::class, 'update'])->name('counsellors.update');
Route::delete('/counsellors/{id}', [CounsellorController::class, 'destroy'])->name('counsellors.delete');

//category //
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::post('/categories/update', [CategoryController::class, 'update'])->name('categories.update');
Route::post('/categories/delete', [CategoryController::class, 'delete'])->name('categories.delete');

//university//
Route::get('/universities', [UniversitiesController::class, 'index'])->name('universities.index');
Route::post('/universities/store', [UniversitiesController::class, 'store'])->name('universities.store');
Route::post('/universities/update', [UniversitiesController::class, 'update'])->name('universities.update');
Route::post('/universities/delete', [UniversitiesController::class, 'delete'])->name('universities.delete');

//university details //
Route::get('/universities/details', [UniversitiesDetailsController::class, 'index'])->name('universities.details');
Route::post('/universities/details/store', [UniversitiesDetailsController::class, 'store'])->name('universities.details.store');
Route::post('/universities/details/update', [UniversitiesDetailsController::class, 'update'])->name('universities.details.update');
Route::post('/universities/details/delete', [UniversitiesDetailsController::class, 'delete'])->name('universities.details.delete');

//blog category details //
Route::post('/blog-category/{id}', [BlogCatController::class, 'update'])->name('blogcat.update');
Route::post('/blog-category/{id}', [BlogCatController::class, 'delete'])->name('blogcat.destroy');
Route::get('/blogcat/details', [BlogCatController::class, 'index'])->name('blogcat.details');
Route::post('/blog-category', [BlogCatController::class, 'store'])->name('blogcat.store');

//blog //
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');
Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');

//compare details //
Route::get('/compare-details', [CompareDetailsController::class, 'index'])->name('compare_details.index');
Route::post('/compare-details', [CompareDetailsController::class, 'store'])->name('compare_details.store');
Route::get('/compare-details/{id}/edit', [CompareDetailsController::class, 'edit'])->name('compare_details.edit');
Route::put('/compare-details/{id}', [CompareDetailsController::class, 'update'])->name('compare_details.update');
Route::delete('/compare-details/{id}', [CompareDetailsController::class, 'destroy'])->name('compare_details.destroy');

//vs compare details //
Route::get('/vscompare-details', [VsCompareDetailsController::class, 'index'])->name('vscompare_details.index');
Route::post('/vscompare-details', [VsCompareDetailsController::class, 'store'])->name('vscompare_details.store');
Route::put('/vscompare-details/{id}', [VsCompareDetailsController::class, 'update'])->name('vscompare_details.update');
Route::delete('/vscompare-details/{id}', [VsCompareDetailsController::class, 'destroy'])->name('vscompare_details.destroy');


//student rating //
Route::get('/ratings/data', [RatingController::class, 'index'])->name('ratings.data');
Route::get('/ratings/edit/{id}', [RatingController::class, 'edit'])->name('ratings.edit');
Route::post('/ratings/store', [RatingController::class, 'store'])->name('ratings.store');
Route::put('/ratings/update', [RatingController::class, 'update'])->name('ratings.update');
Route::delete('/ratings/destroy/{id}', [RatingController::class, 'destroy'])->name('ratings.destroy');


// ProgramController
Route::resource('programs', ProgramController::class);

// CourceController
Route::resource('cources', CourceController::class);
Route::post('cources/update/{cource}', [CourceController::class, 'courcesUpdate'])->name('cources.update.manual');

// SubCourceController
Route::resource('sub-co', SubCourceController::class);
Route::post('sub-cources/update/{SubCource}', [SubCourceController::class, 'subCourcesUpdate'])->name('subcOurces.update.manual');

// FaqUniversityController
Route::resource('faq-universityes', FaqUniversityController::class);

// FaqBlogController
Route::resource('faq-blogs', FaqBlogController::class);

// FaqCourceController
Route::resource('faq-cources', FaqCourceController::class);

// FaqCourceController
Route::resource('faq-subCourse', FaqSubCourseController::class);

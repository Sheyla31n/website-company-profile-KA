<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BlogController;
use App\Models\Article;
use App\Models\User;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/', function (Request $request) {

    if ($request->ajax()) {
        $articles = Article::latest()->paginate(10);
        return view('components.main.blog-content', compact('articles'))->render();
    }

    return view('welcome');
});



Route::get('/course', [CourseController::class, 'courses'])->name('courses');


// LOGIN ROUTE 
Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');

//dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

//home edit
Route::prefix('dashboard/admin/web/home')->middleware('auth')->group(function () {

    Route::get('/', [HomeController::class, 'index'])
        ->name('admin.web.home');

    Route::get('/{id}/edit', [HomeController::class, 'edit'])
        ->name('admin.web.home.edit');

    Route::put('/{id}', [HomeController::class, 'update'])
        ->name('admin.web.home.update');

});

//about edit
Route::prefix('dashboard/admin/web/about')->middleware('auth')->group(function () {
    Route::get('/', [AboutController::class, 'index'])
        ->name('admin.web.about');

    Route::get('/edit', [AboutController::class, 'edit'])
        ->name('admin.web.about.edit');

    Route::put('/update', [AboutController::class,'update'])
        ->name('admin.web.about.update');

    // partner CRUD
    Route::get('/partner/create', [PartnerController::class, 'create'])
        ->name('admin.web.partner.create');

    Route::get('/partner/{id}/edit', [PartnerController::class, 'edit'])
        ->name('admin.web.partner.edit');

    Route::post('/partner', [PartnerController::class, 'store'])
        ->name('admin.web.partner.store');

    Route::put('/partner/{id}', [PartnerController::class, 'update'])
        ->name('admin.web.partner.update');

    Route::delete('/partner/{id}', [PartnerController::class, 'destroy'])
        ->name('admin.web.partner.destroy');
});

//course edit
Route::prefix('dashboard/admin/web/course')->middleware('auth')->group(function () {
    Route::get('/', [KategoriController::class, 'index'])
        ->name('admin.web.course');

    Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])
        ->name('admin.web.course.edit');

    Route::put('/kategori/{id}', [KategoriController::class, 'update'])
    ->name('admin.web.course.update');

    // review edit
    Route::get('review/{id}/edit', [ReviewController::class, 'edit'])
        ->name('admin.web.review.edit');
    Route::put('/review/{id}', [ReviewController::class, 'update'])
        ->name('admin.web.review.update');
});

// blog edit
Route::prefix('dashboard/admin/web/blog')->middleware('auth')->group(function () {
    Route::get('/', [BlogController::class, 'index'])
        ->name('admin.web.blog');
    Route::get('/create', [BlogController::class, 'create'])
        ->name('admin.web.blog.create');            
    Route::post('/', [BlogController::class, 'store'])
        ->name('admin.web.blog.store');
    Route::get('/{id}/edit', [BlogController::class, 'edit'])           
        ->name('admin.web.blog.edit');
    Route::put('/{id}', [BlogController::class, 'update'])
        ->name('admin.web.blog.update');
    Route::delete('/{id}', [BlogController::class, 'destroy'])
        ->name('admin.web.blog.destroy');
});

// Data Course
Route::prefix('dashboard/admin/course')->middleware('auth')->group(function () {
    Route::get('/create', [CourseController::class, 'create'])
        ->name('admin.course.create');

    Route::post('/', [CourseController::class, 'store'])
        ->name('admin.course.store');

    // ✅ DELETE
    Route::delete('/{id}', [CourseController::class, 'destroy'])
        ->name('admin.course.destroy');
    
    Route::get('/{id}/edit', [CourseController::class, 'edit'])
        ->name('admin.course.edit');
    Route::put('/{id}', [CourseController::class, 'update'])
        ->name('admin.course.update');
});

// USER ACCOUNT MANAGEMENT
Route::middleware(['auth'])->prefix('dashboard/admin')->group(function () {
    Route::get('/teachers', [UserController::class, 'indexTeacher']);
    Route::get('/students', [UserController::class, 'indexStudent']);

    Route::get('/akun/create', [UserController::class, 'create'])
        ->name('admin.user.create');
    Route::post('/akun', [UserController::class, 'store'])
        ->name('admin.user.store');

     // 🔥 EDIT
    Route::get('/akun/{user}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('/akun/{user}', [UserController::class, 'update'])->name('admin.user.update');

    // 🔥 DELETE
    Route::delete('/akun/{user}', [UserController::class, 'destroy'])->name('admin.user.destroy');
});


// LOGOUT
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // balik ke welcome
});



<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\LivestockController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SecretaryController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('landingpage');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/home', [AdminController::class, 'home'])->name('home');


Route::post('/farmer_register', [AuthenticationController::class, 'webregister'])->name('farmerRegister');

Route::get('/getstarted', [AdminController::class, 'getStarted'])->name('getstarted');
Route::get('/registerFarmer', [UserController::class, 'registerView'])->name('registerUser');
Route::post('/registerFarmer', [UserController::class, 'registerFarmer'])->name('farmerStore');

Route::post('/home', [AdminController::class, 'loginPostAdmin'])->name('loginadmin');

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function (){
    Route::get('/admindashboard',
        [AdminController::class, 'admindashboard'])->name('admindashboard');

    Route::delete('/adminlogout',
        [AdminController::class, 'adminLogout'])->name('adminLogout');
        //fetch all announcement
        Route::get('/announcement',
        [AnnouncementController::class, 'index'])->name('announcementIndex');
        Route::get('/announcement/archive',
        [AnnouncementController::class, 'archive'])->name('announcementArchive');
        //create announcement
        Route::get('/announcement/create',
        [AnnouncementController::class, 'createannouncement'])->name('announcementCreate');
        //edit announcement
        Route::get('/announcement/{announcement}/edit',
        [AnnouncementController::class, 'editAnnouncement'])->name('announcementEdit');
        //update announcement
        Route::put('/announcement/{announcement}/update',
        [AnnouncementController::class, 'updateAnnouncement'])->name('announcementUpdate');

        Route::post('/announcement',
        [AnnouncementController::class, 'store'])->name('announcementPost');

        Route::delete('/deleteA/{announcement}/destroy',
        [AnnouncementController::class, 'destroy'])->name('announcementDelete');

        Route::get('/livestock', [LivestockController::class, 'index'])->name('livestockIndex');

        Route::get('/members', [UserController::class, 'index'])->name('memberIndex');

        Route::post('/approve/{id}',[UserController::class, 'approveApplication'])->name('applicationApprove');
        Route::post('/reject/{id}',[UserController::class, 'rejectApplication'])->name('rejectApplication');

        Route::get('/tutorials', [TutorialController::class, 'index'])->name('tutorialIndex');

        //route for sales, inventory and expenses
        Route::get('/inventory', [ProductController::class, 'index'])->name('inventoryIndex');
        Route::get('/createInventory', [ProductController::class, 'create'])->name('inventoryCreate');
        Route::post('/inventory', [ProductController::class, 'store'])->name('inventoryStore');
        Route::get('/inventory/{product}/edit',
        [ProductController::class, 'edit'])->name('inventoryEdit');
        Route::put('/inventory/{product}/update',
        [ProductController::class, 'update'])->name('inventoryUpdate');

        Route::get('/expenses', [ExpenseController::class, 'index'])->name('expensesIndex');
        Route::get('/createExpenses', [ExpenseController::class, 'create'])->name('expensesCreate');
        Route::post('/expenses', [ExpenseController::class, 'store'])->name('expensesStore');
        Route::get('/expenses/{expense}/edit',
        [ExpenseController::class, 'edit'])->name('expensesEdit');
        Route::put('/expenses/{expense}/update',
        [ExpenseController::class, 'update'])->name('expensesUpdate');


});

Route::prefix('secretary')->middleware(['auth', 'role:secretary'])->group(function (){
    Route::get('/dashboard',
        [SecretaryController::class, 'secretarydashboard'])->name('secretarydashboard');
});


require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

require __DIR__.'/admin.php';

require __DIR__.'/employee.php';

require __DIR__.'/customer.php';

require __DIR__.'/supplier.php';

require __DIR__.'/advance_salary.php';

require __DIR__ . '/attendance.php';

require __DIR__ . '/category.php';

require __DIR__ . '/product.php';

require __DIR__.'/expense.php';

require __DIR__.'/pos.php';

require __DIR__ .'/order.php';

require __DIR__.'/permission.php';

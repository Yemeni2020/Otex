<?php
// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\AboutController;
// use App\Http\Controllers\ContactController;
// use App\Http\Controllers\ShopController;

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
Route::get('/1', function () {
    return view('welcome');
});
Route::get('/', Home::class)->name('home');

// About Page
Route::get('/about', function () {
    return view('about'); // resources/views/about.blade.php
})->name('about');

// Contact Page
Route::get('/contact', function () {
    return view('contact'); // resources/views/contact.blade.php
})->name('contact');

// Shop Pages
Route::prefix('shop')->name('shop.')->group(function () {
    Route::get('/', function () {
        return view('shop.index'); // resources/views/shop/index.blade.php
    })->name('index');

    Route::get('/interior', function () {
        return view('shop.interior'); // resources/views/shop/interior.blade.php
    })->name('interior');

    Route::get('/exterior', function () {
        return view('shop.exterior'); // resources/views/shop/exterior.blade.php
    })->name('exterior');

    Route::get('/performance', function () {
        return view('shop.performance'); // resources/views/shop/performance.blade.php
    })->name('performance');

    Route::get('/electronics', function () {
        return view('shop.electronics'); // resources/views/shop/electronics.blade.php
    })->name('electronics');
});

// Categories Pages
Route::prefix('categories')->name('categories.')->group(function () {
    Route::get('/', function () {
        return view('categories.index'); // resources/views/categories/index.blade.php
    })->name('index');

    Route::get('/seat-covers', function () {
        return view('categories.seat-covers'); // resources/views/categories/seat-covers.blade.php
    })->name('seat-covers');

    Route::get('/floor-mats', function () {
        return view('categories.floor-mats'); // resources/views/categories/floor-mats.blade.php
    })->name('floor-mats');

    Route::get('/lighting', function () {
        return view('categories.lighting'); // resources/views/categories/lighting.blade.php
    })->name('lighting');

    Route::get('/dash-cams', function () {
        return view('categories.dash-cams'); // resources/views/categories/dash-cams.blade.php
    })->name('dash-cams');
});


// Home Page
// Route::get('/', [HomeController::class, 'index'])->name('home');

// // About Page
// Route::get('/about', [AboutController::class, 'index'])->name('about');

// // Contact Page
// Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// // Shop Pages
// Route::prefix('shop')->name('shop.')->group(function () {
//     Route::get('/', [ShopController::class, 'index'])->name('index'); // /shop
//     Route::get('/interior', [ShopController::class, 'interior'])->name('interior');
//     Route::get('/exterior', [ShopController::class, 'exterior'])->name('exterior');
//     Route::get('/performance', [ShopController::class, 'performance'])->name('performance');
//     Route::get('/electronics', [ShopController::class, 'electronics'])->name('electronics');
// });

// // Optional: Categories Pages
// Route::prefix('categories')->name('categories.')->group(function () {
//     Route::get('/', [ShopController::class, 'categories'])->name('index'); // /categories
//     Route::get('/seat-covers', [ShopController::class, 'seatCovers'])->name('seat-covers');
//     Route::get('/floor-mats', [ShopController::class, 'floorMats'])->name('floor-mats');
//     Route::get('/lighting', [ShopController::class, 'lighting'])->name('lighting');
//     Route::get('/dash-cams', [ShopController::class, 'dashCams'])->name('dash-cams');
// });

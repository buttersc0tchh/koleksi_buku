<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\HomeController;

/* TAMBAHAN UNTUK GOOGLE LOGIN */
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
/* END TAMBAHAN */


Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return redirect()->route('login');
});

Auth::routes();

/* ROUTE GOOGLE LOGIN */
Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->user();

    $user = User::updateOrCreate(
        ['email' => $googleUser->getEmail()],
        [
            'name' => $googleUser->getName(),
            'password' => bcrypt('google_login')
        ]
    );

    Auth::login($user);

    return redirect()->route('home');
});
/* END ROUTE GOOGLE */


Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('kategori', KategoriController::class);
    Route::resource('buku', BukuController::class);
});
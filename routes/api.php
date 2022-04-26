<?php

    use App\Http\Controllers\ContactController;
    use App\Http\Controllers\UserController;
    use Illuminate\Support\Facades\Route;

    #=============================USERS==================================
Route::controller(UserController::class)->prefix('users')->group(function () {
    Route::get('/', 'index')->name('users.index');
    Route::post('/', 'store')->name('users.store');
    Route::get('/{user}', 'show')->name('users.show');
    Route::patch('/{user}', 'update')->name('users.update');
    Route::delete('/{user}', 'destroy')->name('users.destroy');

    Route::post('/{user}/block', 'block')->name('users.block');
    Route::post('/{user}/unblock', 'unblock')->name('users.unblock');
});

#=============================USER CONTACTS==================================
Route::controller(ContactController::class)->prefix('users/{user}/contacts')->group(function () {
    Route::get('/', 'index')->name('contacts.index');
    Route::post('/', 'store')->name('contacts.store');
    Route::get('/{contact}', 'show')->name('contacts.show');
    Route::patch('/{contact}', 'update')->name('contacts.update');
    Route::delete('/{contact}', 'destroy')->name('contacts.destroy');

});

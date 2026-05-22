<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

Route::get('/{locale?}', function ($locale = 'pt') {
    if (!in_array($locale, ['pt', 'en'])) {
        $locale = 'pt';
    }
    App::setLocale($locale);
    session(['locale' => $locale]);
    return view('welcome');
})->where('locale', 'pt|en');

Route::get('/{locale}/sobre', function ($locale = 'pt') {
    if (!in_array($locale, ['pt', 'en'])) {
        $locale = 'pt';
    }
    App::setLocale($locale);
    session(['locale' => $locale]);
    return view('sobre');
})->where('locale', 'pt|en');

// Rota curta /sobre que detecta o locale da sessão
Route::get('/sobre', function () {
    $locale = session('locale', 'pt');
    App::setLocale($locale);
    return view('sobre');
});

Route::get('/solucoes', function () {
    $locale = session('locale', 'pt');
    App::setLocale($locale);
    return view('solucoes');
});

Route::get('/en/solucoes', function () {
    App::setLocale('en');
    session(['locale' => 'en']);
    return view('solucoes');
});

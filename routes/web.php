<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;

Route::get( '/', [ ArticleController::class, 'index' ] )->name( 'home' );
Route::get( '/{id}', [ ArticleController::class, 'show' ] )->name( 'article.details' );

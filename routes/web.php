<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;

Route::get( '/', [ ArticleController::class, 'index' ] );
Route::get( '/{id}', [ ArticleController::class, 'show' ] )->name( 'article.details' );

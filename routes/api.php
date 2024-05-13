<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/test',function() {
    return "Sam is a Devil";
});

Route::resource('products',ProductController::class);
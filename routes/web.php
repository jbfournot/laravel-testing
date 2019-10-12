<?php

Route::get('/', 'ReportingController@index');
Route::apiResource('products', 'ProductsController');

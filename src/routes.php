<?php


Route::get('sp2','mowmita\sp2\Sp2Controller@index');
Route::post('pay', 'mowmita\sp2\Sp2Controller@pay')->name('pay');
Route::get('subtract/{a}/{b}', 'mowmita\sp2\Sp2Controller@subtract');

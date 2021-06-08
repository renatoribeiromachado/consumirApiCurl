<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'ProdutoController@index')->name('produtos.index');
Route::get('create', 'ProdutoController@create')->name('produto.create');
Route::post('store', 'ProdutoController@store')->name('produto.store');
Route::get('edit/{id}', 'ProdutoController@edit')->name('produto.edit');
Route::any('update/{id}', 'ProdutoController@update')->name('produto.update');
Route::any('delete/{id}', 'ProdutoController@destroy')->name('produto.destroy');

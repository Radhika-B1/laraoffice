<?php
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
Route::resource('support', 'Admin\TicketsController');
Route::resource('priority', 'Admin\PrioritiesController');
Route::resource('status', 'Admin\StatusesController');
Route::resource('supdashboard', 'Admin\DashboardController');
Route::resource('agent', 'Admin\AgentsController');
Route::resource('category', 'Admin\CategoriesController');
Route::resource('administrator', 'Admin\AdministratorsController');
Route::get('completed/tickets', 'Admin\TicketsController@indexComplete')->name('completed.tickets');

});
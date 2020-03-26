<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');

Route::resource('entreprises', 'EntrepriseController');

Route::resource('jobs', 'JobController');

Route::resource('messages', 'MessageController');

Route::resource('newLetters', 'NewLetterController');

Route::resource('postulers', 'PostulerController');

Route::get('/', 'GestionController@index');

Route::get('/emplois', 'GestionController@liste');

Route::post('/details', 'GestionController@detail');

Route::post('/uploadcv', 'GestionController@cv');

Route::get('/poster', function () {
    return view('emploi.create');
});


Route::get('/contactez-nous', function () {
    return view('contact');
});

Route::post('/contactez-nous', 'MessageController@store');

Route::post('/sendupload', 'GestionController@information');

Route::get('/candidats', function () {
    return view('candidat');
});

Route::post('/candidats', 'GestionController@candidats');
Route::post('/updateuser', 'HomeController@update');
Route::get('/information', 'EntrepriseController@information');

Route::get('/offres', 'GestionController@offres');

Route::get('/entreprise', function () {
    return view('auth.entreprise');
});
Route::post('/destroyjob', 'GestionController@destroyoffre');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/search', 'GestionController@search');



Route::get('/users', function () {
    $user = \App\User::all();
    return view('users.index', ['users' => $user]);
});



Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

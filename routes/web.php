<?php


//backend
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::post('/admin-dashboard', 'AdminController@dashboard');
Route::get('/logout', 'AdminController@logout');

// options movie
Route::get('/add-option', 'OptionMovie@add_option');
Route::get('/all-option', 'OptionMovie@all_option');
Route::post('/save-option', 'OptionMovie@save_option');
Route::post('/edit-option/{option_id}', 'OptionMovie@edit_option');
Route::get('/delete-option/{option_id}', 'OptionMovie@delete_option');
Route::get('/update-option/{option_id}', 'OptionMovie@update_option');
Route::get('/edit-option/{option_id}', 'OptionMovie@edit_option');

Route::get('/unactive-option/{option_id}', 'OptionMovie@unactive_option');
Route::get('/active-option/{option_id}', 'OptionMovie@active_option');

// Category movie
Route::get('/add-category', 'CategoryMovie@add_category');
Route::get('/all-category', 'CategoryMovie@all_category');
Route::post('/save-category', 'CategoryMovie@save_category');
Route::post('/edit-category/{category_id}', 'CategoryMovie@edit_category');
Route::get('/delete-category/{category_id}', 'CategoryMovie@delete_category');
Route::get('/update-category/{category_id}', 'CategoryMovie@update_category');
Route::get('/edit-category/{category_id}', 'CategoryMovie@edit_category');

Route::get('/unactive-category/{category_id}', 'CategoryMovie@unactive_category');
Route::get('/active-category/{category_id}', 'CategoryMovie@active_category');

// Country movie
Route::get('/add-country', 'CountryMovie@add_country');
Route::get('/all-country', 'CountryMovie@all_country');
Route::post('/save-country', 'CountryMovie@save_country');
Route::post('/edit-country/{country_id}', 'CountryMovie@edit_country');
Route::get('/delete-country/{country_id}', 'CountryMovie@delete_country');
Route::get('/update-country/{country_id}', 'CountryMovie@update_country');
Route::get('/edit-country/{country_id}', 'CountryMovie@edit_country');

Route::get('/unactive-country/{country_id}', 'CountryMovie@unactive_country');
Route::get('/active-country/{country_id}', 'CountryMovie@active_country');

// Year movie
Route::get('/add-year', 'YearMovie@add_year');
Route::get('/all-year', 'YearMovie@all_year');
Route::post('/save-year', 'YearMovie@save_year');
Route::post('/edit-year/{year_id}', 'YearMovie@edit_year');
Route::get('/delete-year/{year_id}', 'YearMovie@delete_year');
Route::get('/update-year/{year_id}', 'YearMovie@update_year');
Route::get('/edit-year/{year_id}', 'YearMovie@edit_year');

Route::get('/unactive-year/{year_id}', 'YearMovie@unactive_year');
Route::get('/active-year/{year_id}', 'YearMovie@active_year');


// series movie
Route::get('/add-series', 'SeriesController@add_series');
Route::get('/all-series', 'SeriesController@all_series');
Route::post('/save-series', 'SeriesController@save_series');
Route::post('/edit-series/{series_id}', 'SeriesController@edit_series');
Route::get('/delete-series/{series_id}', 'SeriesController@delete_series');
Route::get('/update-series/{series_id}', 'SeriesController@update_series');
Route::get('/edit-series/{series_id}', 'SeriesController@edit_series');

Route::get('/unactive-series/{series_id}', 'SeriesController@unactive_series');
Route::get('/active-series/{series_id}', 'SeriesController@active_series');

// Movie
Route::get('/add-movie', 'MovieController@add_movie');
Route::post('/save-movie', 'MovieController@save_movie');
Route::post('/edit-movie/{movie_id}', 'MovieController@edit_movie');
Route::post('/save-category-movie/{movie_id}', 'MovieController@save_category_movie');
Route::get('/add-category-movie', 'MovieController@add_category_movie');
Route::get('/update-category-movie/{movie_id}', 'MovieController@update_category_movie');
Route::get('/all-movie', 'MovieController@all_movie');
Route::get('/update-movie/{movie_id}', 'MovieController@update_movie');
Route::get('/delete-movie/{movie_id}', 'MovieController@delete_movie');

Route::get('/unactive-movie/{movie_id}', 'MovieController@unactive_movie');
Route::get('/active-movie/{movie_id}', 'MovieController@active_movie');

// Eposide
Route::get('/manager-eposide/{movie_id}', 'EposideController@manager_eposide');
Route::post('/save-eposide', 'EposideController@save_eposide');
Route::get('/update-eposide/{eposide_id}/{movie_id}', 'EposideController@update_eposide');
Route::post('/edit-eposide/{eposide_id}', 'EposideController@edit_eposide');
Route::get('/delete-eposide/{eposide_id}', 'EposideController@delete_eposide');

Route::get('/unactive-eposide/{eposide_id}', 'EposideController@unactive_eposide');
Route::get('/active-eposide/{eposide_id}', 'EposideController@active_eposide');







// Frontend
Route::get('/', 'HomeController@index');
Route::get('/the-loai/{movie_slug}', 'HomeController@display_movie_by_category');

// detail movie page
Route::get('/detail-movie/{movie_id}', 'DetailMovieController@display_detail');

// watch movie
Route::get('/{movie_slug}_{movie_id}/{eposide_slug}', 'MovieController@watch_movie');
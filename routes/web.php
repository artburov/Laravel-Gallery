<?php

Route ::get( '/', 'ImagesController@index' );

Route ::get( '/about', 'HomeController@about' );

Route ::get( '/create', 'ImagesController@create' );

Route ::post( '/store', 'ImagesController@store' );

Route :: get( '/show/{id}', 'ImagesController@show' );

Route :: get( '/edit/{id}', 'ImagesController@edit' );

Route :: post( '/update/{id}', 'ImagesController@update' );

Route :: get( '/delete/{id}', 'ImagesController@delete' );

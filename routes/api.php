<?php

Route::group(['namespace' => 'Api'] ,function (){
    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', 'AuthController@login');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('reset-password', 'AuthController@resetPassword');
    });

    Route::group(['middleware'=>['auth:api']],function (){
        Route::group(['prefix' => 'account'], function () {
            Route::get('/me','ProfileController@me');
            Route::post('/update','ProfileController@update')->name('api.account.update');
            Route::post('/update-password','ProfileController@updatePassword');
        });

        Route::get('/home','HomeController@home');
        Route::get('/speakers','HomeController@speakers');
        Route::get('/speakers/{speaker}','HomeController@singleSpeaker');
        Route::get('/my-schedule','EventController@schedule');
        Route::get('/events','EventController@events');
        Route::get('/events/{event}','EventController@show');
        Route::post('/events/{event}/register-to-event','EventController@registerToEvent');
        Route::get('/events/{event}/days','EventController@days');
        Route::get('/days/{day}','EventController@singleDay');
        Route::get('/events/{event}/speakers','EventController@speakers');


        Route::get('/speakers/{speaker}/questions','QuestionController@index');
        Route::post('/speakers/{speaker}/questions','QuestionController@store');
        Route::get('/questions/{question}','QuestionController@show');
        Route::get('/questions/{question}/destroy','QuestionController@destroy');
        Route::post('/questions/{question}/add-answer','QuestionController@addAnswer');

        Route::get('/speakers/{speaker}/polls','PollController@index');
        Route::post('/speakers/{speaker}/polls','PollController@store');
        Route::get('/polls/{poll}','PollController@show');
        Route::get('/polls/{poll}/destroy','PollController@destroy');
        Route::post('/polls/{poll}/add-vote','PollController@addVote');
    });

    Route::get('/about','GeneralController@about');
    Route::get('/privacy','GeneralController@privacy');
    Route::get('/terms','GeneralController@terms');
});

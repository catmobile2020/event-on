<?php

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::group(['prefix'=>'/admin','namespace'=>'Admin','as'=>'admin.'],function (){
    Route::group(['prefix'=>'/auth'],function (){
        Route::get('/','AuthController@index')->name('login');
        Route::post('/','AuthController@login')->name('login');
        Route::get('/logout','AuthController@logout')->name('logout');
    });

    Route::group(['middleware'=>['auth:admin']],function (){
        Route::get('/','HomeController@index')->name('home');

        Route::get('/profile','ProfileController@index')->name('profile');
        Route::post('/profile','ProfileController@update')->name('profile.update');

        Route::resource('countries','CountryController');
        Route::get('countries/{country}/destroy','CountryController@destroy')->name('countries.destroy');

        Route::resource('companies','CompanyController');
        Route::get('companies/{company}/destroy','CompanyController@destroy')->name('companies.destroy');

        Route::resource('{company}/speakers','SpeakerController');
        Route::get('{company}/speakers/{speaker}/destroy','SpeakerController@destroy')->name('speakers.destroy');

        Route::resource('{company}/events','EventController');
        Route::get('{company}/events/{event}/destroy','EventController@destroy')->name('events.destroy');

        Route::resource('{company}/events','EventController');
        Route::get('{company}/events/{event}/destroy','EventController@destroy')->name('events.destroy');
        Route::get('{company}/events/{event}/users','EventController@users')->name('events.users');

        Route::resource('{event}/days','DayController');
        Route::get('{event}/days/{day}/destroy','DayController@destroy')->name('days.destroy');

        Route::resource('{day}/talks','TalkController');
        Route::get('{day}/talks/{talk}/destroy','TalkController@destroy')->name('talks.destroy');
        Route::get('{day}/talks/{talk}/rates','TalkController@rates')->name('talks.rates');

        Route::resource('{event}/faqs','FaqController');
        Route::get('{event}/faqs/{faq}/destroy','FaqController@destroy')->name('faqs.destroy');

//        Route::resource('polls','PollController');
//        Route::get('polls/{poll}/destroy','PollController@destroy')->name('polls.destroy');
//        Route::get('polls/{poll}/users','PollController@users')->name('polls.users');
//
//        Route::resource('{poll}/options','PollOptionController');
//        Route::get('{poll}/options/{option}/destroy','PollOptionController@destroy')->name('options.destroy');
//
//        Route::get('settings','SettingController@index')->name('settings.index');
//        Route::post('settings','SettingController@update')->name('settings.update');
//
//        Route::resource('practices','PracticeController');
//        Route::get('practices/{practice}/destroy','PracticeController@destroy')->name('practices.destroy');
//        Route::get('practices/{practice}/users','PracticeController@users')->name('practices.users');
//
//        Route::resource('{practice}/answers','PracticeOptionController');
//        Route::get('{practice}/answers/{answer}/destroy','PracticeOptionController@destroy')->name('answers.destroy');
//
//        Route::resource('posts','PostController');
//        Route::get('posts/{post}/destroy','PostController@destroy')->name('posts.destroy');
//        Route::get('posts/{post}/comments','PostController@comments')->name('posts.comments');
//        Route::get('comments/{comment}/destroy','PostController@destroyComment')->name('posts.destroyComment');
//
//        Route::get('/agenda-rating','AgendaRateQuestionController@index')->name('agenda-rating.index');
//        Route::get('/agenda-questions-rating/{question}','AgendaRateQuestionController@show')->name('agenda-rating.show');

    });
});


Route::get('/change-password/{token}','ChangePasswordController@changePassword')->name('change-password');
Route::post('/change-password/{token}','ChangePasswordController@updatePassword');


Route::group(['namespace'=>'Site','as'=>'site.'],function (){

    Route::group(['prefix'=>'/'],function (){
        Route::get('/','AuthController@getLogin')->name('login');
        Route::post('/','AuthController@postLogin');
        Route::get('/sign-up/{token}','AuthController@getRegister')->name('register');
        Route::post('/sign-up/{token}','AuthController@postRegister');
        Route::get('logout','AuthController@logout')->name('logout');
    });

    Route::group(['middleware'=>['auth:web']],function (){
        Route::get('/home','HomeController@index')->name('home');
        Route::get('/about','HomeController@about')->name('about');
        Route::get('/faqs','HomeController@faqs')->name('faqs');
        Route::get('/upcoming-events','EventController@upcoming')->name('events.upcoming');
        Route::get('/register-to-event','EventController@registerToEvent')->name('events.registerToEvent');
        Route::get('/my-calender','EventController@myCalender')->name('events.myCalender');

        Route::get('/events/{event}','EventController@show')->name('events.show');

        Route::get('/events/{event}/speakers','SpeakerController@index')->name('speakers.index');
        Route::get('/speakers/{speaker}','SpeakerController@show')->name('speakers.show');
        Route::get('/speakers/{speaker}/vote','SpeakerController@getVote')->name('speakers.vote');
        Route::get('/speakers/{speaker}/vote','SpeakerController@postVote');
    });


});

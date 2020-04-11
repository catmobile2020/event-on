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

        Route::get('/generals/{type}','GeneralController@edit')->name('generals.edit');
        Route::put('/generals{general}','GeneralController@update')->name('generals.update');

        Route::resource('admins','AdminController');
        Route::get('admins/{admin}/destroy','AdminController@destroy')->name('admins.destroy');

        Route::resource('countries','CountryController');
        Route::get('countries/{country}/destroy','CountryController@destroy')->name('countries.destroy');

        Route::resource('{country}/cities','CityController');
        Route::get('{country}/cities/{city}/destroy','CityController@destroy')->name('cities.destroy');

        Route::resource('companies','CompanyController');
        Route::get('companies/{company}/destroy','CompanyController@destroy')->name('companies.destroy');

        Route::resource('{company}/sliders','SliderController');
        Route::get('{company}/sliders/{slider}/destroy','SliderController@destroy')->name('sliders.destroy');

        Route::resource('{company}/ads','AdController');
        Route::get('{company}/ads/{ad}/destroy','AdController@destroy')->name('ads.destroy');

        Route::resource('{company}/speakers','SpeakerController');
        Route::get('{company}/speakers/{speaker}/destroy','SpeakerController@destroy')->name('speakers.destroy');

        Route::resource('{company}/events','EventController');
        Route::get('{company}/events/{event}/destroy','EventController@destroy')->name('events.destroy');

        Route::get('events/myEvents','EventController@myEvents')->name('events.myEvents');

        Route::resource('{company}/events','EventController');
        Route::get('{company}/events/{event}/destroy','EventController@destroy')->name('events.destroy');
        Route::get('{company}/events/{event}/users','EventController@users')->name('events.users');
        Route::get('{company}/events/{event}/live-event','EventController@fireEvent')->name('events.fireEvent');

        Route::resource('{event}/days','DayController');
        Route::get('{event}/days/{day}/destroy','DayController@destroy')->name('days.destroy');

        Route::resource('{day}/talks','TalkController');
        Route::get('{day}/talks/{talk}/destroy','TalkController@destroy')->name('talks.destroy');
        Route::get('{day}/talks/{talk}/rates','TalkController@rates')->name('talks.rates');

        Route::resource('{company}/faqs','FaqController');
        Route::get('{company}/faqs/{faq}/destroy','FaqController@destroy')->name('faqs.destroy');

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

Route::group(['namespace'=>'Site','as'=>'site.'],function (){

    Route::get('/privacy','GeneralController@privacy')->name('privacy');
    Route::get('/terms-and-conditions','GeneralController@terms')->name('terms');

    Route::group(['prefix'=>'/'],function (){
        Route::get('/','AuthController@getLogin')->name('login');
        Route::post('/','AuthController@postLogin');
        Route::get('/sign-up/{token}','AuthController@getRegister')->name('register');
        Route::post('/sign-up/{token}','AuthController@postRegister');
        Route::get('logout','AuthController@logout')->name('logout');

        Route::get('/reset-password','ChangePasswordController@getResetPassword')->name('getResetPassword');
        Route::post('/reset-password','ChangePasswordController@postResetPassword');

        Route::get('/change-password/{token}','ChangePasswordController@changePassword')->name('change-password');
        Route::post('/change-password/{token}','ChangePasswordController@updatePassword')->name('update-password');
    });

    Route::group(['middleware'=>['auth:web']],function (){
        Route::get('/account','AccountController@me')->name('profile');
        Route::get('/edit-account','AccountController@editAccount')->name('editAccount');
        Route::post('/edit-account','AccountController@updateAccount')->name('updateAccount');

        Route::get('/edit-account-password','AccountController@editAccountPassword')->name('editAccountPassword');
        Route::post('/edit-account-password','AccountController@updateAccountPassword')->name('updateAccountPassword');

        Route::get('/home','HomeController@index')->name('home');
        Route::get('/faqs','HomeController@faqs')->name('faqs');
        Route::get('/about','GeneralController@about')->name('about');
        Route::get('/schedule','EventController@schedule')->name('events.schedule');
        Route::get('/events','EventController@events')->name('events.index');
        Route::get('/events/{event}','EventController@show')->name('events.show');
        Route::get('/events/{event}/default-live','EventController@defaultLive')->name('events.defaultLive');
        Route::get('/events/{event}/live','EventController@live')->name('events.live');
        Route::get('/register-to-event/{event}','EventController@registerToEvent')->name('events.registerToEvent');

        Route::post('/events/{event}/ask-speaker-question','EventController@askSpeakerQuestion')->name('events.askSpeakerQuestion');
        Route::get('/events/{event}/broadcast-event/{type}/{id}','EventController@broadcastEvent')->name('events.broadcastEvent');

        Route::get('/talks/{talk}/vote','EventController@getTalkVote')->name('events.talk.vote');
        Route::get('/talks/{talk}/vote','EventController@postTalkVote');

        Route::get('/events/{event}/speakers','SpeakerController@index')->name('speakers.index');
        Route::get('/speakers/{speaker}','SpeakerController@show')->name('speakers.show');
        Route::get('/speakers/{speaker}/vote','SpeakerController@getVote')->name('speakers.vote');
        Route::post('/speakers/{speaker}/vote','SpeakerController@postVote');

        Route::get('/speakers/{speaker}/questions','QuestionController@index')->name('questions.index');
        Route::post('/speakers/{speaker}/questions','QuestionController@store')->name('questions.store');
        Route::get('/questions/{question}/destroy','QuestionController@destroy')->name('questions.destroy');
        Route::post('/questions/{question}/add-answer','QuestionController@addAnswer')->name('questions.addAnswer');

        Route::get('/speakers/{speaker}/polls','PollController@index')->name('polls.index');
        Route::post('/speakers/{speaker}/polls','PollController@store')->name('polls.store');
        Route::get('/polls/{poll}/destroy','PollController@destroy')->name('polls.destroy');
        Route::post('/polls/{poll}/add-vote','PollController@addVote')->name('polls.addVote');
    });
});

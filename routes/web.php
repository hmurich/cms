<?php

Route::get('/', 'Front\IndexController@getIndex');
Route::post('/', 'Front\IndexController@postIndex');


Route::get('adminka/login', 'Admin\AuthController@getLogin');
Route::post('adminka/login', 'Admin\AuthController@postLogin');

Route::group(['middleware' => ['auth.admin']], function () {
    Route::get('adminka/enter', 'Admin\IndexController@getIndex');

    Route::get('adminka/mail', 'Admin\MailController@getIndex');

    // gen-template routes
    Route::get('adminka/gen-template/{gen_id}', 'Admin\GenTemplateController@getIndex');
    Route::get('adminka/gen-template/item/{gen_id}/{id?}', 'Admin\GenTemplateController@getItem');
    Route::post('adminka/gen-template/item/{gen_id}/{id?}', 'Admin\GenTemplateController@postItem');
    Route::get('adminka/gen-template/delete/{gen_id}/{id}', 'Admin\GenTemplateController@getDelete');


    // gen-template routes
    Route::get('adminka/gen-child-template/{gen_id}/{parent_gen_id}', 'Admin\GenChildTemplateController@getIndex');
    Route::get('adminka/gen-child-template/item/{gen_id}/{parent_gen_id}/{id?}', 'Admin\GenChildTemplateController@getItem');
    Route::post('adminka/gen-child-template/item/{gen_id}/{parent_gen_id}/{id?}', 'Admin\GenChildTemplateController@postItem');
    Route::get('adminka/gen-child-template/delete/{gen_id}/{id}', 'Admin\GenChildTemplateController@getDelete');


    // model generator routes
    /*
    Route::get('adminka/model-generator', 'Admin\ModelGenController@getIndex');
    Route::get('adminka/model-generator/item/{id?}', 'Admin\ModelGenController@getItem');
    Route::post('adminka/model-generator/item/{id?}', 'Admin\ModelGenController@postItem');
    Route::get('adminka/model-generator/delete/{id}', 'Admin\ModelGenController@getDelete');
    */
    
    Route::get('adminka/model-generator/update/{id?}', 'Admin\ModelGenController@getUpdate');
    Route::post('adminka/model-generator/update/{id?}', 'Admin\ModelGenController@postUpdate');

    //site setting routes
    Route::get('adminka/site-setting', 'Admin\SiteSettingController@getIndex');
    Route::post('adminka/site-setting', 'Admin\SiteSettingController@postSave');

    Route::get('adminka/profile', 'Admin\AuthController@getProfile');
    Route::post('adminka/profile', 'Admin\AuthController@postProfile');
    Route::get('adminka/logout', 'Admin\AuthController@getLogout');
});

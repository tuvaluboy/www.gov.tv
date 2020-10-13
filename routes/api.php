<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Ministries
    Route::apiResource('ministries', 'MinistryApiController');

    // Newsand Updates
    Route::post('newsand-updates/media', 'NewsandUpdateApiController@storeMedia')->name('newsand-updates.storeMedia');
    Route::apiResource('newsand-updates', 'NewsandUpdateApiController');

    // Departments
    Route::apiResource('departments', 'DepartmentsApiController');

    // Vacancies
    Route::post('vacancies/media', 'VacancyApiController@storeMedia')->name('vacancies.storeMedia');
    Route::apiResource('vacancies', 'VacancyApiController');

    // Budgets
    Route::post('budgets/media', 'BudgetApiController@storeMedia')->name('budgets.storeMedia');
    Route::apiResource('budgets', 'BudgetApiController');

    // Imageslides
    Route::post('imageslides/media', 'ImageslidesApiController@storeMedia')->name('imageslides.storeMedia');
    Route::apiResource('imageslides', 'ImageslidesApiController');

    // Pages
    Route::apiResource('pages', 'PagesApiController');

    // Aboutuvalus
    Route::post('aboutuvalus/media', 'AboutuvaluApiController@storeMedia')->name('aboutuvalus.storeMedia');
    Route::apiResource('aboutuvalus', 'AboutuvaluApiController');

    // Tuvaluconstitions
    Route::post('tuvaluconstitions/media', 'TuvaluconstitionApiController@storeMedia')->name('tuvaluconstitions.storeMedia');
    Route::apiResource('tuvaluconstitions', 'TuvaluconstitionApiController');

    // Tuvaludevelopmentplans
    Route::post('tuvaludevelopmentplans/media', 'TuvaludevelopmentplanApiController@storeMedia')->name('tuvaludevelopmentplans.storeMedia');
    Route::apiResource('tuvaludevelopmentplans', 'TuvaludevelopmentplanApiController');

    // Holidays
    Route::post('holidays/media', 'HolidayApiController@storeMedia')->name('holidays.storeMedia');
    Route::apiResource('holidays', 'HolidayApiController');

    // Service Categories
    Route::post('service-categories/media', 'ServiceCategoryApiController@storeMedia')->name('service-categories.storeMedia');
    Route::apiResource('service-categories', 'ServiceCategoryApiController');

    // Services Sub Categories
    Route::apiResource('services-sub-categories', 'ServicesSubCategoryApiController');

    // Services
    Route::post('services/media', 'ServicesApiController@storeMedia')->name('services.storeMedia');
    Route::apiResource('services', 'ServicesApiController');
});

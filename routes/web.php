<?php

// Route::redirect('/', '/login');
Route::get('/','HomeController@index')->name('home');
Route::get('/directory', function(){
    return view('front.directory');
});
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Ministries
    Route::delete('ministries/destroy', 'MinistryController@massDestroy')->name('ministries.massDestroy');
    Route::resource('ministries', 'MinistryController');

    // Newsand Updates
    Route::delete('newsand-updates/destroy', 'NewsandUpdateController@massDestroy')->name('newsand-updates.massDestroy');
    Route::post('newsand-updates/media', 'NewsandUpdateController@storeMedia')->name('newsand-updates.storeMedia');
    Route::post('newsand-updates/ckmedia', 'NewsandUpdateController@storeCKEditorImages')->name('newsand-updates.storeCKEditorImages');
    Route::resource('newsand-updates', 'NewsandUpdateController');

    // Departments
    Route::delete('departments/destroy', 'DepartmentsController@massDestroy')->name('departments.massDestroy');
    Route::resource('departments', 'DepartmentsController');

    // Vacancies
    Route::delete('vacancies/destroy', 'VacancyController@massDestroy')->name('vacancies.massDestroy');
    Route::post('vacancies/media', 'VacancyController@storeMedia')->name('vacancies.storeMedia');
    Route::post('vacancies/ckmedia', 'VacancyController@storeCKEditorImages')->name('vacancies.storeCKEditorImages');
    Route::resource('vacancies', 'VacancyController');

    // Budgets
    Route::delete('budgets/destroy', 'BudgetController@massDestroy')->name('budgets.massDestroy');
    Route::post('budgets/media', 'BudgetController@storeMedia')->name('budgets.storeMedia');
    Route::post('budgets/ckmedia', 'BudgetController@storeCKEditorImages')->name('budgets.storeCKEditorImages');
    Route::resource('budgets', 'BudgetController');

    // Imageslides
    Route::delete('imageslides/destroy', 'ImageslidesController@massDestroy')->name('imageslides.massDestroy');
    Route::post('imageslides/media', 'ImageslidesController@storeMedia')->name('imageslides.storeMedia');
    Route::post('imageslides/ckmedia', 'ImageslidesController@storeCKEditorImages')->name('imageslides.storeCKEditorImages');
    Route::resource('imageslides', 'ImageslidesController');

    // Pages
    Route::delete('pages/destroy', 'PagesController@massDestroy')->name('pages.massDestroy');
    Route::resource('pages', 'PagesController');

    // Aboutuvalus
    Route::delete('aboutuvalus/destroy', 'AboutuvaluController@massDestroy')->name('aboutuvalus.massDestroy');
    Route::post('aboutuvalus/media', 'AboutuvaluController@storeMedia')->name('aboutuvalus.storeMedia');
    Route::post('aboutuvalus/ckmedia', 'AboutuvaluController@storeCKEditorImages')->name('aboutuvalus.storeCKEditorImages');
    Route::resource('aboutuvalus', 'AboutuvaluController');

    // Tuvaluconstitions
    Route::delete('tuvaluconstitions/destroy', 'TuvaluconstitionController@massDestroy')->name('tuvaluconstitions.massDestroy');
    Route::post('tuvaluconstitions/media', 'TuvaluconstitionController@storeMedia')->name('tuvaluconstitions.storeMedia');
    Route::post('tuvaluconstitions/ckmedia', 'TuvaluconstitionController@storeCKEditorImages')->name('tuvaluconstitions.storeCKEditorImages');
    Route::resource('tuvaluconstitions', 'TuvaluconstitionController');

    // Tuvaludevelopmentplans
    Route::delete('tuvaludevelopmentplans/destroy', 'TuvaludevelopmentplanController@massDestroy')->name('tuvaludevelopmentplans.massDestroy');
    Route::post('tuvaludevelopmentplans/media', 'TuvaludevelopmentplanController@storeMedia')->name('tuvaludevelopmentplans.storeMedia');
    Route::post('tuvaludevelopmentplans/ckmedia', 'TuvaludevelopmentplanController@storeCKEditorImages')->name('tuvaludevelopmentplans.storeCKEditorImages');
    Route::resource('tuvaludevelopmentplans', 'TuvaludevelopmentplanController');

    // Holidays
    Route::delete('holidays/destroy', 'HolidayController@massDestroy')->name('holidays.massDestroy');
    Route::post('holidays/media', 'HolidayController@storeMedia')->name('holidays.storeMedia');
    Route::post('holidays/ckmedia', 'HolidayController@storeCKEditorImages')->name('holidays.storeCKEditorImages');
    Route::resource('holidays', 'HolidayController');

    // Service Categories
    Route::delete('service-categories/destroy', 'ServiceCategoryController@massDestroy')->name('service-categories.massDestroy');
    Route::post('service-categories/media', 'ServiceCategoryController@storeMedia')->name('service-categories.storeMedia');
    Route::post('service-categories/ckmedia', 'ServiceCategoryController@storeCKEditorImages')->name('service-categories.storeCKEditorImages');
    Route::resource('service-categories', 'ServiceCategoryController');

    // Services Sub Categories
    Route::delete('services-sub-categories/destroy', 'ServicesSubCategoryController@massDestroy')->name('services-sub-categories.massDestroy');
    Route::resource('services-sub-categories', 'ServicesSubCategoryController');

    // Services
    Route::delete('services/destroy', 'ServicesController@massDestroy')->name('services.massDestroy');
    Route::post('services/media', 'ServicesController@storeMedia')->name('services.storeMedia');
    Route::post('services/ckmedia', 'ServicesController@storeCKEditorImages')->name('services.storeCKEditorImages');
    Route::resource('services', 'ServicesController');

    // Pictures
    Route::delete('pictures/destroy', 'PicturesController@massDestroy')->name('pictures.massDestroy');
    Route::post('pictures/media', 'PicturesController@storeMedia')->name('pictures.storeMedia');
    Route::post('pictures/ckmedia', 'PicturesController@storeCKEditorImages')->name('pictures.storeCKEditorImages');
    Route::resource('pictures', 'PicturesController');

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::post('categories/media', 'CategoriesController@storeMedia')->name('categories.storeMedia');
    Route::post('categories/ckmedia', 'CategoriesController@storeCKEditorImages')->name('categories.storeCKEditorImages');
    Route::resource('categories', 'CategoriesController');

    // Items
    Route::delete('items/destroy', 'ItemController@massDestroy')->name('items.massDestroy');
    Route::post('items/media', 'ItemController@storeMedia')->name('items.storeMedia');
    Route::post('items/ckmedia', 'ItemController@storeCKEditorImages')->name('items.storeCKEditorImages');
    Route::resource('items', 'ItemController');
    // Directory Categories
    Route::delete('directory-categories/destroy', 'DirectoryCategoryController@massDestroy')->name('directory-categories.massDestroy');
    Route::post('directory-categories/media', 'DirectoryCategoryController@storeMedia')->name('directory-categories.storeMedia');
    Route::post('directory-categories/ckmedia', 'DirectoryCategoryController@storeCKEditorImages')->name('directory-categories.storeCKEditorImages');
    Route::resource('directory-categories', 'DirectoryCategoryController');

    // Directory Sub Categories
    Route::delete('directory-sub-categories/destroy', 'DirectorySubCategoryController@massDestroy')->name('directory-sub-categories.massDestroy');
    Route::resource('directory-sub-categories', 'DirectorySubCategoryController');

    // Directory Contents
    Route::delete('directory-contents/destroy', 'DirectoryContentController@massDestroy')->name('directory-contents.massDestroy');
    Route::post('directory-contents/media', 'DirectoryContentController@storeMedia')->name('directory-contents.storeMedia');
    Route::post('directory-contents/ckmedia', 'DirectoryContentController@storeCKEditorImages')->name('directory-contents.storeCKEditorImages');
    Route::resource('directory-contents', 'DirectoryContentController');

    // Ministry Contents
    Route::delete('ministry-contents/destroy', 'MinistryContentController@massDestroy')->name('ministry-contents.massDestroy');
    Route::post('ministry-contents/media', 'MinistryContentController@storeMedia')->name('ministry-contents.storeMedia');
    Route::post('ministry-contents/ckmedia', 'MinistryContentController@storeCKEditorImages')->name('ministry-contents.storeCKEditorImages');
    Route::resource('ministry-contents', 'MinistryContentController');

    // Contents
    Route::delete('contents/destroy', 'ContentController@massDestroy')->name('contents.massDestroy');
    Route::post('contents/media', 'ContentController@storeMedia')->name('contents.storeMedia');
    Route::post('contents/ckmedia', 'ContentController@storeCKEditorImages')->name('contents.storeCKEditorImages');
    Route::resource('contents', 'ContentController');

    // Tags
    Route::delete('tags/destroy', 'TagController@massDestroy')->name('tags.massDestroy');
    Route::resource('tags', 'TagController');
    
    // Background Image
    Route::delete('background-images/destroy', 'BackgroundImageController@massDestroy')->name('background-images.massDestroy');
    Route::post('background-images/media', 'BackgroundImageController@storeMedia')->name('background-images.storeMedia');
    Route::post('background-images/ckmedia', 'BackgroundImageController@storeCKEditorImages')->name('background-images.storeCKEditorImages');
    Route::resource('background-images', 'BackgroundImageController');

    
    // Menu Message
    Route::delete('menu-messages/destroy', 'MenuMessageController@massDestroy')->name('menu-messages.massDestroy');
    Route::post('menu-messages/media', 'MenuMessageController@storeMedia')->name('menu-messages.storeMedia');
    Route::post('menu-messages/ckmedia', 'MenuMessageController@storeCKEditorImages')->name('menu-messages.storeCKEditorImages');
    Route::resource('menu-messages', 'MenuMessageController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});


//Front
Route::group(['prefix' => '', 'as' => '', 'namespace' => 'Front'], function () {
    Route::get('/','HomeController@index')->name('home');
    Route::get('/directory','HomeController@directory')->name('directory');
    Route::get('/directory/subcategory/{subcategory}','HomeController@directorysubcategory')->name('directory.list');
    Route::get('/directory/content/{content_id}/show','HomeController@directorycontent')->name('directory.show');
    Route::get('/directory/content/{content_id}/shows','HomeController@directorycontentministry')->name('directory.showministry');
    Route::get('/directory/content/{content_id}','HomeController@directorycontentsingle')->name('directory.showsingle');
    Route::get('/budget','HomeController@budget')->name('budget');
    Route::get('/vacancies','HomeController@vacancies')->name('vacancies');
    Route::get('/vacancies/{vacancies}','HomeController@showvacancies')->name('vacancies.show');
    Route::get('/announcement','HomeController@announcement')->name('announcement');
    Route::get('/anouncement/{anouncement}','HomeController@showannouncement')->name('announcement.show');
    Route::get('/news','HomeController@news')->name('news');
    Route::get('/news/{news}','HomeController@shownews')->name('news.show');
    Route::get('/contacts','HomeController@contact')->name('contacts');
    Route::get('/about','HomeController@about')->name('about');
    Route::get('/about/{about}','HomeController@aboutcontent')->name('aboutcontent');
    Route::get('/showsubcategory/{showsubcategory}','HomeController@showsubcategory')->name('showsubcategory.show');
    Route::get('/services/{sercives}','HomeController@services')->name('services.show');
    Route::get('/media','HomeController@mediacenter')->name('media');
    Route::get('/media/{media}','HomeController@medialist')->name('media.list');
    Route::get('/media/show/{media}','HomeController@mediashow')->name('media.show');
    Route::get('/search','HomeController@search')->name('search');
});


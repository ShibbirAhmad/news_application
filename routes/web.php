<?php


/************************* Front End Route Here ***********************/




Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('optimize:clear');
    // return what you want
});

Route::get('/', 'frontend\WelcomeController@index');
Route::get('/news-search', 'frontend\WelcomeController@News_search');

Route::get('/moshadesh/category/{category_id}/{category_name}', 'frontend\WelcomeController@AnyCategoryname');

Route::get('/moshadesh/news/{id}', 'frontend\NewsController@All_newspost');
Route::get('/news/moshadesh/{id}', 'frontend\NewsController@Menu_news');






// Back Route Here 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user-profile/{id}', 'HomeController@Userprofile');
Route::post('/profile-update/{id}', 'HomeController@Profile_update');


/***************************** Category Route Here ******************************************/
Route::get('/categorys', 'Category\CategoryController@Category_list')->name('categorys');
Route::post('/insert-category', 'Category\CategoryController@Store_category');
Route::get('/category/{id}/delete', 'Category\CategoryController@Delete_category');
Route::get('/category-edit/{id}', 'Category\CategoryController@Edit_category');
Route::post('/update-category', 'Category\CategoryController@Update_category');


/********************** Post Route Here ***************************************************/

Route::get('/posts', 'Post\PostController@post_list')->name('posts');
Route::post('/insert-post', 'Post\PostController@Store_post');
Route::get('/post_edit/{id}', 'Post\PostController@Edit_post');
Route::post('/update-post/{id}', 'Post\PostController@Update_post');
Route::get('/delete-post/{id}', 'Post\PostController@Delete_post');
Route::get('/latest-news-no/{id}', 'Post\PostController@Latestnews_no');
Route::get('/latest-news-yes/{id}', 'Post\PostController@Latestnews_yes');
Route::get('/cover-news-no/{id}', 'Post\PostController@Covernews_no');
Route::get('/cover-news-yes/{id}', 'Post\PostController@Covernews_yes');
Route::get('/breaking-news-no/{id}', 'Post\PostController@Breakingnews_no');
Route::get('/breaking-news-yes/{id}', 'Post\PostController@Breakingnews_yes');

Route::get('/filterbycategory','Post\PostController@filterByCategory');



/********************** Slider Route Here ***************************************************/

Route::get('/slider-list', 'Slider\SliderController@slider_list')->name('slider-list');
Route::post('/insert-slider', 'Slider\SliderController@Store_slider');
Route::get('/edit-slider/{id}', 'Slider\SliderController@Editslider');
Route::post('/update-slider/{id}', 'Slider\SliderController@Update_slider');
Route::get('/delete/{id}/slider', 'Slider\SliderController@Delete_slider');


/********************** Gallery Route Here ***************************************************/

Route::get('/gallery-list', 'Gallery\GalleryController@Gallery_list')->name('gallery-list');
Route::post('/insert-gallery', 'Gallery\GalleryController@Store_gallery');
Route::get('/edit-gallery/{id}', 'Gallery\GalleryController@Edit_gallery');
Route::post('/update-gallery/{id}', 'Gallery\GalleryController@Update_gallery');
Route::get('/delete-gallery/{id}', 'Gallery\GalleryController@Delete_gallery');


/********************* Video Route Here ************************************************/

Route::get('/video-list', 'Video\VideoController@Video_list')->name('video-list');
Route::post('/insert-video', 'Video\VideoController@Store_link');
Route::get('/video-edit/{id}', 'Video\VideoController@Edit_video');
Route::post('/update-video', 'Video\VideoController@Update_video');
Route::get('/delete-video/{id}', 'Video\VideoController@Delete_video');


/************************** User List Route Here ***************************************/

Route::get('/user-list', 'User\UserController@User_list')->name('user-list');
Route::post('/insert-user', 'User\UserController@Store_user');
Route::get('/delete-user/{id}', 'User\UserController@Delete_user');
Route::get('/edit-user/{id}', 'User\UserController@Edit_edit');
Route::post('/update-user/{id}', 'User\UserController@Update_user');


///cke eidtor file upload
Route::post('/cke/editor/upload', 'HomeController@ckEditorUpload')->name('ckeditor.upload');
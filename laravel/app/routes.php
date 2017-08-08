<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('prefix' => 'admin'), function(){
	Route::group(array('prefix' => 'user'), function(){
		Route::get('/', array('as' => 'admin.login', 'uses' => 'AdminController@login'));
		Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'AdminController@getDashBoard'));
	}) ;
});

/*------------------ Front End --------------------*/

Route::any('/', array('as'=>'pages.index', 'uses'=>'PageController@index'));
Route::any('/login', array('as'=>'users.login', 'uses'=>'UserController@login')); 
Route::get('/logout', array('as'=>'users.logout', 'uses'=>'UserController@logout'));
Route::any('/register', array('as'=>'users.register', 'uses'=>'UserController@register'));
Route::any('/my-account', array('as'=>'users.myaccount', 'uses'=>'UserController@myaccount'));
Route::any('/active-profile/{token?}', array('as'=>'users.active_profile', 'uses'=>'UserController@active_profile'));
Route::any('/email-verification/{token?}', array('as'=>'users.email_verification', 'uses'=>'UserController@email_verification'));
Route::any('/contact-us', array('as'=>'pages.contact_us', 'uses'=>'PageController@contact_us'));
Route::any('/update-profile', array('as'=>'users.update_profile', 'uses'=>'UserController@update_profile'));
Route::any('/faqs', array('as' => 'faqs.index', 'uses' => 'FaqController@index'));
Route::any('/about-us', array('as' => 'pages.about_us', 'uses' => 'PageController@about_us'));
Route::any('/pages/{slug?}', array('as' => 'pages.pages', 'uses' => 'PageController@pages'));
Route::any('/fb_login', array('as'=>'users.fb_login', 'uses'=>'UserController@fb_login'));
Route::any('/change-password', array('as'=>'users.change_password', 'uses'=>'UserController@change_password'));
Route::any('/user-upload-img', array('as'=>'users.user_upload_img', 'uses'=>'UserController@user_upload_img'));



//Ads
Route::any('/my-ads', array('as'=>'users.my_ads', 'uses'=>'UserController@my_ads'));
Route::any('/remove-my-ad/{id?}', array('as'=>'users.remove_my_ad', 'uses'=>'UserController@remove_my_ad'));
Route::any('/status-my-ad/{id?}', array('as'=>'users.status_my_ad', 'uses'=>'UserController@status_my_ad'));
Route::any('/ad-images/{id?}', array('as'=>'users.ad_images', 'uses'=>'UserController@ad_images'));
Route::any('/remove-my-ad-image/{id?}/{ad_id?}', array('as'=>'users.remove_ad_image', 'uses'=>'UserController@remove_ad_image'));
Route::any('/status-my-ad-image/{id?}/{ad_id?}', array('as'=>'users.status_my_ad_image', 'uses'=>'UserController@status_my_ad_image'));

Route::any('/who-interested', array('as'=>'users.who_interested', 'uses'=>'UserController@who_interested'));
Route::any('/saved-ads', array('as'=>'users.saved_ads', 'uses'=>'UserController@saved_ads'));


//Blogs
Route::get('blogs/{id?}', array('as'=>'blogs.index', 'uses'=>'BlogController@index'));
Route::get('blog/{slug?}', array('as'=>'blogs.view', 'uses'=>'BlogController@view'));
Route::any('/submit-blog-comment', array('as'=>'submit_comment', 'uses'=>'BlogController@submit_comment')); 
Route::any('/update-blog-comments', array('as'=>'view_total_comments', 'uses'=>'BlogController@view_total_comments'));


//Property
Route::any('/search', array('as'=>'properties.search', 'uses'=>'PropertyController@search'));
Route::any('/listing/{slug?}', array('as'=>'properties.listing', 'uses'=>'PropertyController@listing'));
Route::any('/place-an-ad', array('as'=>'properties.place_an_ad', 'uses'=>'PropertyController@place_an_ad'));
Route::any('/advertise/{slug?}', array('as'=>'properties.advertise_add', 'uses'=>'PropertyController@advertise_add'));
Route::any('/advertise-back/{slug?}/{type?}', array('as'=>'properties.advertise_back', 'uses'=>'PropertyController@advertise_back'));
Route::any('/login-register/{slug?}', array('as'=>'properties.login_register', 'uses'=>'PropertyController@login_register'));
Route::any('/advertise-action/{slug?}', array('as'=>'properties.advertise_action', 'uses'=>'PropertyController@advertise_action'));
Route::any('/advertise-success/{id?}', array('as'=>'properties.advertise_success', 'uses'=>'PropertyController@advertise_success'));
Route::any('/add-interested', array('as'=>'properties.add_interested', 'uses'=>'PropertyController@add_interested'));
Route::any('/add-savedad', array('as'=>'properties.add_savedad', 'uses'=>'PropertyController@add_savedad'));
Route::any('/details/{id?}', array('as'=>'properties.details', 'uses'=>'PropertyController@details'));
Route::any('/email-advertiser/{id?}', array('as'=>'properties.email_advertiser', 'uses'=>'PropertyController@email_advertiser'));
Route::any('/ads-edit/{id?}', array('as'=>'properties.ads_edit', 'uses'=>'PropertyController@ads_edit'));


// Messages
Route::any('/messages', array('as' => 'messages.index', 'uses' => 'MessageController@index'));
Route::any('/important', array('as' => 'messages.important', 'uses' => 'MessageController@important'));
Route::any('/compose', array('as' => 'messages.compose', 'uses' => 'MessageController@compose'));
Route::any('/select-user', array('as' => 'messages.select_user', 'uses' => 'MessageController@select_user'));
Route::any('/send', array('as' => 'messages.send', 'uses' => 'MessageController@send'));
Route::any('download/{id?}', array('as'=>'messages.download', 'uses'=>'MessageController@download'));
Route::any('delete-message', array('as'=>'messages.delete_message', 'uses'=>'MessageController@delete_message'));
Route::any('update-message', array('as'=>'messages.update_message', 'uses'=>'MessageController@update_message'));
Route::any('important-is', array('as'=>'messages.important_is', 'uses'=>'MessageController@important_is')); 


/*------------------ Admin Part --------------------*/

Route::get('admin', array('as'=>'login', 'uses'=>'AdminController@getLogin'));
Route::any('admin/login', array('as'=>'login', 'uses' => 'AdminController@postLogin'));
Route::get('admin/dashboard', array('as' => 'login', 'uses' => 'AdminController@getDashBoard'));
Route::any('admin/update_profile', array('as' => 'admin_update_profile', 'uses' => 'AdminController@admin_update_profile')); 

//Users
Route::any('admin/users/change_password/{role_id?}/{user_id?}', array('as' => 'users.admin_change_password', 'uses' => 'UserController@admin_change_password'))->where('role_id', '[0-9]+')->where('user_id', '[0-9]+');
Route::any('admin/users/{role_id?}', array('as' => 'users.admin_index',  'uses' => 'UserController@admin_index'))->where('role_id', '[0-9]+');
Route::any('admin/users/add', array('as' => 'users.admin_add',  'uses' => 'UserController@admin_add')); 
Route::any('admin/users/edit/{role_id?}/{user_id?}', array('as' => 'users.admin_edit', 'uses' => 'UserController@admin_edit'))->where('role_id', '[0-9]+')->where('user_id', '[0-9]+');
Route::get('admin/users/status/{user_id?}', array('as' => 'users.admin_status', 'uses' => 'UserController@admin_status'))->where('user_id', '[0-9]+');
Route::get('admin/users/block/{user_id?}', array('as' => 'users.admin_block', 'uses' => 'UserController@admin_block'))->where('user_id', '[0-9]+');
Route::get('admin/users/remove/{user_id?}', array('as' => 'users.admin_remove', 'uses' => 'UserController@admin_remove'))->where('user_id', '[0-9]+');
Route::any('admin/users/change_password/{role_id?}/{user_id?}', array('as' => 'users.admin_change_password', 'uses' => 'UserController@admin_change_password'))->where('role_id', '[0-9]+')->where('user_id', '[0-9]+');
Route::get('admin/users/view/{role_id?}/{user_id?}', array('as' => 'users.admin_view', 'uses' => 'UserController@admin_view'))->where('role_id', '[0-9]+')->where('user_id', '[0-9]+');

//Faqs
Route::any('admin/faqs', array('as' => 'faqs.admin_index', 'uses' => 'FaqController@admin_index'));
Route::get('admin/faqs/status/{id?}', array('as' => 'faqs.admin_status', 'uses' => 'FaqController@admin_status'))->where('id', '[0-9]+');
Route::get('admin/faqs/remove/{id?}', array('as' => 'faqs.admin_remove', 'uses' => 'FaqController@admin_remove'))->where('id', '[0-9]+');
Route::any('admin/faqs/add', array('as' => 'faqs.admin_add', 'uses' => 'FaqController@admin_add'));
Route::any('admin/faqs/edit/{id?}', array('as' => 'faqs.admin_edit', 'uses' => 'FaqController@admin_edit'))->where('id', '[0-9]+');

//Settings
Route::any('admin/settings/general', array('as' => 'admin_general_setting', 'uses' => 'SettingController@admin_general_setting'));
Route::any('admin/settings/email-templates', array('as' => 'email_templates', 'uses' => 'SettingController@email_templates'));
Route::any('admin/settings/update-template/{id?}', array('as' => 'update_template', 'uses' => 'SettingController@update_template'))->where('id', '[0-9]+');

//Pages
Route::any('admin/pages', array('as' => 'pages.admin_index', 'uses' => 'PageController@admin_index'));
Route::any('admin/pages/status', array('as' => 'pages.admin_status', 'uses' => 'PageController@admin_status'));
Route::any('admin/pages/edit/{id?}', array('as' => 'pages.admin_edit', 'uses' => 'PageController@admin_edit'))->where('id', '[0-9]+');

//Languages
Route::any('admin/languages', array('as' => 'pages.admin_languages', 'uses' => 'PageController@admin_languages'));
Route::get('admin/languages/status/{id?}', array('as' => 'pages.admin_languages_status', 'uses' => 'PageController@admin_languages_status'))->where('id', '[0-9]+');
Route::get('admin/languages/remove/{id?}', array('as' => 'pages.admin_languages_remove', 'uses' => 'PageController@admin_languages_remove'))->where('id', '[0-9]+');
Route::any('admin/languages/add', array('as' => 'pages.admin_languages_add', 'uses' => 'PageController@admin_languages_add'));
Route::any('admin/languages/edit/{id?}', array('as' => 'pages.admin_languages_edit', 'uses' => 'PageController@admin_languages_edit'))->where('id', '[0-9]+');

//Hobbies
Route::any('admin/hobbies', array('as' => 'pages.admin_hobbies', 'uses' => 'PageController@admin_hobbies'));
Route::get('admin/hobbies/status/{id?}', array('as' => 'pages.admin_hobbies_status', 'uses' => 'PageController@admin_hobbies_status'))->where('id', '[0-9]+');
Route::get('admin/hobbies/remove/{id?}', array('as' => 'pages.admin_hobbies_remove', 'uses' => 'PageController@admin_hobbies_remove'))->where('id', '[0-9]+');
Route::any('admin/hobbies/add', array('as' => 'pages.admin_hobbies_add', 'uses' => 'PageController@admin_hobbies_add'));
Route::any('admin/hobbies/edit/{id?}', array('as' => 'pages.admin_hobbies_edit', 'uses' => 'PageController@admin_hobbies_edit'))->where('id', '[0-9]+');

//Amenities
Route::any('admin/amenities', array('as' => 'pages.admin_amenities', 'uses' => 'PageController@admin_amenities'));
Route::get('admin/amenities/status/{id?}', array('as' => 'pages.admin_amenities_status', 'uses' => 'PageController@admin_amenities_status'))->where('id', '[0-9]+');
Route::get('admin/amenities/remove/{id?}', array('as' => 'pages.admin_amenities_remove', 'uses' => 'PageController@admin_amenities_remove'))->where('id', '[0-9]+');
Route::any('admin/amenities/add', array('as' => 'pages.admin_amenities_add', 'uses' => 'PageController@admin_amenities_add'));
Route::any('admin/amenities/edit/{id?}', array('as' => 'pages.admin_amenities_edit', 'uses' => 'PageController@admin_amenities_edit'))->where('id', '[0-9]+');

//Properties
Route::any('admin/properties', array('as' => 'properties.admin_index', 'uses' => 'PropertyController@admin_index'));
Route::get('admin/properties/status/{id?}', array('as' => 'properties.admin_status', 'uses' => 'PropertyController@admin_status'))->where('id', '[0-9]+');
Route::get('admin/properties/remove/{id?}', array('as' => 'properties.admin_remove', 'uses' => 'PropertyController@admin_remove'))->where('id', '[0-9]+');
Route::any('admin/properties/add', array('as' => 'properties.admin_add', 'uses' => 'PropertyController@admin_add'));
Route::any('admin/properties/edit/{id?}', array('as' => 'properties.admin_edit', 'uses' => 'PropertyController@admin_edit'))->where('id', '[0-9]+');
Route::any('admin/get-room-html', array('as' => 'properties.admin_get_room_html', 'uses' => 'PropertyController@admin_get_room_html'))->where('id', '[0-9]+');



//Blogs
Route::any('admin/blogs', array('as' => 'blogs.admin_index_blog', 'uses' => 'BlogController@admin_index_blog'));
Route::any('admin/blogs/edit/{id?}', array('as' => 'blogs.admin_blog_edit', 'uses' => 'BlogController@admin_blog_edit'))->where('id', '[0-9]+');
Route::get('admin/blogs/remove/{id?}', array('as' => 'blogs.admin_remove_blogs', 'uses' => 'BlogController@admin_remove_blogs'))->where('id', '[0-9]+');
Route::get('admin/blogs/status/{id?}', array('as' => 'blogs.admin_blog_status', 'uses' => 'BlogController@admin_blog_status'))->where('id', '[0-9]+');
Route::any('admin/blogs/add', array('as' => 'blogs.admin_add', 'uses' => 'BlogController@admin_add'));


Route::get('admin/blogs/comment/{blog_id?}', array('as' => 'blogs.admin_blog_comment', 'uses' => 'BlogController@admin_blog_comment'))->where('blog_id', '[0-9]+');
Route::any('admin/blogs/comment/edit/{id?}/{blog_id?}', array('as' => 'blogs.admin_blog_comment_edit', 'uses' => 'BlogController@admin_blog_comment_edit'))->where('id', '[0-9]+');



Route::any('admin/blogs/categories', array('as' => 'blogs.admin_categories', 'uses' => 'BlogController@admin_categories'));
Route::get('admin/blogs/category-status/{id?}', array('as' => 'blogs.admin_category_status', 'uses' => 'BlogController@admin_category_status'))->where('id', '[0-9]+');
Route::any('admin/blogs/category-edit/{id?}', array('as' => 'blogs.admin_category_edit', 'uses' => 'BlogController@admin_category_edit'))->where('id', '[0-9]+');
Route::get('admin/blogs/category/remove/{id?}', array('as' => 'blogs.admin_remove_category', 'uses' => 'BlogController@admin_remove_category'))->where('id', '[0-9]+');
Route::any('admin/blogs/categories/add', array('as' => 'blogs.admin_category_add', 'uses' => 'BlogController@admin_category_add'));



Route::any('admin/message', array('as' => 'messages.admin_index_blog', 'uses' => 'MessageController@index'));




Route::get('admin/logout', array('as' => 'logout', 'uses' => 'AdminController@getLogout'));

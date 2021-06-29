<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//start website routes starts.
Route::get('/','WebsiteController@index')->name('/');
Route::get('signin','WebsiteController@signin')->name('signin');
Route::get('signup','WebsiteController@signup')->name('signup');
Route::get('sale','WebsiteController@sale')->name('sale');
Route::post('sale','WebsiteController@sale')->name('sale');
// Route::get('buy/{address?}/{lat?}/{lng?}','WebsiteController@buy')->name('buy');
Route::post('buy','WebsiteController@buy')->name('buy');
Route::get('testperiod','WebsiteController@testPeriod')->name('testperiod');
Route::get('buy','WebsiteController@buy')->name('buy');
Route::get('homes_estimate','WebsiteController@homesEstimate')->name('homes_estimate');
Route::post('create_estimate','WebsiteController@createEstimate')->name('create_estimate');
Route::get('aboutus','WebsiteController@aboutUs')->name('aboutus');
Route::get('testimonials','WebsiteController@testimonials')->name('testimonials');
Route::get('agent/{state?}','WebsiteController@agent')->name('agent');
Route::get('cash_cloe','WebsiteController@cashCloe')->name('cash_cloe');
Route::get('professionals','WebsiteController@professionals')->name('professionals');
Route::get('press','WebsiteController@press')->name('press');
Route::get('address_process/{location?}','WebsiteController@addressProcess')->name('address_process');
Route::get('selling_soon','WebsiteController@sellingSoon')->name('selling_soon');
Route::get('condition_of_home','WebsiteController@conditionOfHome')->name('condition_of_home');
Route::get('we_need_know','WebsiteController@weNeedKnow')->name('we_need_know');
Route::get('estimated_sent','WebsiteController@estimatedSent')->name('estimated_sent');
Route::get('contract_with_agent','WebsiteController@contractWithAgent')->name('contract_with_agent');
Route::get('unit_number/{selected_location?}','WebsiteController@unitNumber')->name('unit_number');
Route::get('property_type_id/{unitnumber?}','WebsiteController@propertyTypeId')->name('property_type_id');
Route::get('worths/{property?}','WebsiteController@worths')->name('worths');
Route::get('sale_time/{worth?}','WebsiteController@saleTime')->name('sale_time');
Route::get('source_heard/{saletime?}','WebsiteController@sourceHeard')->name('source_heard');
Route::get('top_agents/{sourceheard?}','WebsiteController@topAgents')->name('top_agents');
Route::get('contact_detail/{top_agents?}','WebsiteController@contactDetail')->name('contact_detail');
Route::get('buy_property/{contact_name?}/{contact_phone?}','WebsiteController@buyProperty')->name('buy_property');
Route::post('create_property/{id?}','WebsiteController@create_property')->name('create_property');
Route::post('signin_process','WebsiteController@signinProcess')->name('signin_process');
Route::get('signup','WebsiteController@signup')->name('signup');
Route::get('add_agent','WebsiteController@addAgent')->name('add_agent');
Route::post('agent_register','WebsiteController@agentRegister')->name('agent_register');
Route::post('free_agent_register','WebsiteController@freeAgentRegister')->name('free_agent_register');
//Route::get('my_forum','WebsiteController@myForum')->name('my_forum');
Route::get('elite','WebsiteController@elite')->name('elite');
Route::post('contact_process','WebsiteController@contactProcess')->name('contact_process');
Route::get('message_process','WebsiteController@messageProcess')->name('message_process');
Route::get('request_type/{request_type?}','WebsiteController@requestType')->name('request_type');
Route::get('lead_type/{lead_type?}','WebsiteController@leadType')->name('lead_type');

Route::get('referal_type/{referal_type?}','WebsiteController@referalType')->name('referal_type');
Route::get('buy_package','WebsiteController@buyPackage')->name('buy_package');
Route::post('buy_package_process','WebsiteController@buyPackageProcess')->name('buy_package_process');
Route::get('update_user_status/{id}/{status}','WebsiteController@updateUserStatus')->name('update_user_status');

Route::get('get_referal_notification','WebsiteController@getReferalNotification')->name('get_referal_notification');
Route::get('give_emoji_post','WebsiteController@giveEmojiPost')->name('give_emoji_post');
Route::get('get_post_emoji_count','WebsiteController@getPostEmojiCount')->name('get_post_emoji_count');
Route::get('tooltipdetail/{id?}','WebsiteController@toolTipDetail')->name('tooltipdetail');
//website routes end.

Route::get('contact_us','WebsiteController@contactUs')->name('contact_us');
Route::post('contact_us_process','WebsiteController@contactUsProcess')->name('contact_us_process');
Route::get('terms_and_conditions','WebsiteController@termsAndConditions')->name('terms_and_conditions');
Route::get('privacy_policy','WebsiteController@privacyPolicy')->name('privacy_policy');
Route::post('update_payment_status','WebsiteController@updatePaymentStatus')->name('update_payment_status');

Route::get('disable_account_setting_popover','WebsiteController@disableAccountSettingPopover')->name('disable_account_setting_popover');
Route::get('disable_account_next_popover','WebsiteController@disableAccountNextPopover')->name('disable_account_next_popover');




Route::get('/link', function() {

 $targetFolder = base_path().'/storage/app/public'; $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage'; symlink($targetFolder, $linkFolder); 
    
    
    $exitCode = Artisan::call('storage:link', [] );
    echo $exitCode; // 0 exit code for no errors.
    die;
});


/*Route::get('/',function (){
    return view('welcome');
})->middleware('auth');*/
Route::group(['middleware' => ['auth', 'roles'],'roles' => ['admin','user','agent']], function () {
    // Route::get('/dashboard','WebsiteController@dashboard')->name('dashboard');

    Route::post('search_by_zip_code','UsersController@searchByZipCode')->name('search_by_zip_code');
    Route::get('search_by_zip_code','UsersController@searchByZipCode')->name('search_by_zip_code');
    Route::get('account-settings','UsersController@getSettings');
    Route::post('account-settings','UsersController@saveSettings');
    Route::get('agent_profile/{id?}','UsersController@agentProfile')->name('agent_profile');    
    Route::get('ratings/{rat?}/{to?}/{form?}','UsersController@ratings')->name('ratings');
    Route::get('get_rating/{to?}/{form?}','UsersController@getRating')->name('get_rating');
    Route::get('feed_back/{rat?}/{to?}/{form?}','UsersController@feedBack')->name('feed_back');
    Route::get('get_feed_back/{to?}','UsersController@getFeedBack')->name('get_feed_back');
    Route::get('get_all_rating/{to?}','UsersController@getAllRating')->name('get_all_rating');
    Route::get('change_referal_status/{value?}/{id?}','UsersController@changeReferalStatus')->name('change_referal_status');
    Route::get('referal_rejected/{value?}/{id?}','UsersController@referalRejected')->name('referal_rejected');
    Route::get('get_user_profile_detail','UsersController@getSettings');
    Route::post('get_user_profile_detail','UsersController@getUserProfileDetail')->name('get_user_profile_detail');
    Route::post('referring_submint','UsersController@referringSubmint')->name('referring_submint');

    Route::get('users','UsersController@getIndex');
    Route::get('user/create','UsersController@create');
    Route::post('user/create','UsersController@save');
    Route::get('user/edit/{id}','UsersController@edit');
    Route::post('user/edit/{id}','UsersController@update');
    Route::get('user/delete/{id}','UsersController@delete');
    Route::get('user/deleted/','UsersController@getDeletedUsers');
    Route::get('user/restore/{id}','UsersController@restoreUser');

    Route::get('/change_referral_status/{id?}/{status?}','WebsiteController@changeReferralStatus')->name('change_referral_status');
});


Route::group(['middleware' => ['auth', 'roles'],'roles' => 'admin'], function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard.index');
//    });
    Route::get('index2', function (){
        return view('dashboard.index2');
    });
    Route::get('index3', function (){
        return view('dashboard.index3');
    });
    Route::get('index4', function (){
        return view('ecommerce.index4');
    });
    Route::get('products', function (){
        return view('ecommerce.products');
    });
    Route::get('product-detail', function (){
        return view('ecommerce.product-detail');
    });
    Route::get('product-edit', function (){
        return view('ecommerce.product-edit');
    });
    Route::get('product-orders', function (){
        return view('ecommerce.product-orders');
    });
    Route::get('product-cart', function (){
        return view('ecommerce.product-cart');
    });
    Route::get('product-checkout', function (){
        return view('ecommerce.product-checkout');
    });
    Route::get('panels-wells', function (){
        return view('ui-elements.panels-wells');
    });
    Route::get('panel-ui-block', function (){
        return view('ui-elements.panel-ui-block');
    });
    Route::get('portlet-draggable', function (){
        return view('ui-elements.portlet-draggable');
    });
    Route::get('buttons', function (){
        return view('ui-elements.buttons');
    });
    Route::get('tabs', function (){
        return view('ui-elements.tabs');
    });
    Route::get('modals', function (){
        return view('ui-elements.modals');
    });
    Route::get('progressbars', function (){
        return view('ui-elements.progressbars');
    });
    Route::get('notification', function (){
        return view('ui-elements.notification');
    });
    Route::get('carousel', function (){
        return view('ui-elements.carousel');
    });
    Route::get('user-cards', function (){
        return view('ui-elements.user-cards');
    });
    Route::get('timeline', function (){
        return view('ui-elements.timeline');
    });
    Route::get('timeline-horizontal', function (){
        return view('ui-elements.timeline-horizontal');
    });
    Route::get('range-slider', function (){
        return view('ui-elements.range-slider');
    });
    Route::get('ribbons', function (){
        return view('ui-elements.ribbons');
    });
    Route::get('steps', function (){
        return view('ui-elements.steps');
    });
    Route::get('session-idle-timeout', function (){
        return view('ui-elements.session-idle-timeout');
    });
    Route::get('session-timeout', function (){
        return view('ui-elements.session-timeout');
    });
    Route::get('bootstrap-ui', function (){
        return view('ui-elements.bootstrap');
    });
    Route::get('starter-page', function (){
        return view('pages.starter-page');
    });
    Route::get('blank', function (){
        return view('pages.blank');
    });
    Route::get('blank', function (){
        return view('pages.blank');
    });
    Route::get('search-result', function (){
        return view('pages.search-result');
    });
    Route::get('custom-scroll', function (){
        return view('pages.custom-scroll');
    });
    Route::get('lock-screen', function (){
        return view('pages.lock-screen');
    });
    Route::get('recoverpw', function (){
        return view('pages.recoverpw');
    });
    Route::get('animation', function (){
        return view('pages.animation');
    });
    Route::get('profile', function (){
        return view('pages.profile');
    });
    Route::get('invoice', function (){
        return view('pages.invoice');
    });
    Route::get('gallery', function (){
        return view('pages.gallery');
    });
    Route::get('pricing', function (){
        return view('pages.pricing');
    });
    Route::get('400', function (){
        return view('pages.400');
    });
    Route::get('403', function (){
        return view('pages.403');
    });
    Route::get('404', function (){
        return view('pages.404');
    });
    Route::get('500', function (){
        return view('pages.500');
    });
    Route::get('503', function (){
        return view('pages.503');
    });
    Route::get('form-basic', function (){
        return view('forms.form-basic');
    });
    Route::get('form-layout', function (){
        return view('forms.form-layout');
    });
    Route::get('icheck-control', function (){
        return view('forms.icheck-control');
    });
    Route::get('form-advanced', function (){
        return view('forms.form-advanced');
    });
    Route::get('form-upload', function (){
        return view('forms.form-upload');
    });
    Route::get('form-dropzone', function (){
        return view('forms.form-dropzone');
    });
    Route::get('form-pickers', function (){
        return view('forms.form-pickers');
    });
    Route::get('basic-table', function (){
        return view('tables.basic-table');
    });
    Route::get('table-layouts', function (){
        return view('tables.table-layouts');
    });
    Route::get('data-table', function (){
        return view('tables.data-table');
    });
    Route::get('bootstrap-tables', function (){
        return view('tables.bootstrap-tables');
    });
    Route::get('responsive-tables', function (){
        return view('tables.responsive-tables');
    });
    Route::get('editable-tables', function (){
        return view('tables.editable-tables');
    });
    Route::get('inbox', function (){
        return view('inbox.inbox');
    });
    Route::get('inbox-detail', function (){
        return view('inbox.inbox-detail');
    });
    Route::get('compose', function (){
        return view('inbox.compose');
    });
    Route::get('contact', function (){
        return view('inbox.contact');
    });
    Route::get('contact-detail', function (){
        return view('inbox.contact-detail');
    });
    Route::get('calendar', function (){
        return view('extra.calendar');
    });
    Route::get('widgets', function (){
        return view('extra.widgets');
    });
    Route::get('morris-chart', function (){
        return view('charts.morris-chart');
    });
    Route::get('peity-chart', function (){
        return view('charts.peity-chart');
    });
    Route::get('knob-chart', function (){
        return view('charts.knob-chart');
    });
    Route::get('sparkline-chart', function (){
        return view('charts.sparkline-chart');
    });
    Route::get('simple-line', function (){
        return view('icons.simple-line');
    });
    Route::get('fontawesome', function (){
        return view('icons.fontawesome');
    });
    Route::get('map-google', function (){
        return view('maps.map-google');
    });
    Route::get('map-vector', function (){
        return view('maps.map-vector');
    });

    #Permission management
    Route::get('permission-management','PermissionController@getIndex');
    Route::get('permission/create','PermissionController@create');
    Route::post('permission/create','PermissionController@save');
    Route::get('permission/delete/{id}','PermissionController@delete');
    Route::get('permission/edit/{id}','PermissionController@edit');
    Route::post('permission/edit/{id}','PermissionController@update');

    #Role management
    Route::get('role-management','RoleController@getIndex');
    Route::get('role/create','RoleController@create');
    Route::post('role/create','RoleController@save');
    Route::get('role/delete/{id}','RoleController@delete');
    Route::get('role/edit/{id}','RoleController@edit');
    Route::post('role/edit/{id}','RoleController@update');

    #CRUD Generator
    Route::get('/crud-generator', ['uses' => 'ProcessController@getGenerator']);
    Route::post('/crud-generator', ['uses' => 'ProcessController@postGenerator']);

    # Activity log
    Route::get('activity-log','LogViewerController@getActivityLog');
    Route::get('activity-log/data', 'LogViewerController@activityLogData')->name('activity-log.data');

    #User Management routes
    /*Route::get('users','UsersController@getIndex');
    Route::get('user/create','UsersController@create');
    Route::post('user/create','UsersController@save');
    Route::get('user/edit/{id}','UsersController@edit');
    Route::post('user/edit/{id}','UsersController@update');
    Route::get('user/delete/{id}','UsersController@delete');
    Route::get('user/deleted/','UsersController@getDeletedUsers');
    Route::get('user/restore/{id}','UsersController@restoreUser');*/

});


//Log Viewer
Route::get('log-viewers', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@index')->name('log-viewers');
Route::get('log-viewers/logs', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@listLogs')->name('log-viewers.logs');
Route::delete('log-viewers/logs/delete', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@delete')->name('log-viewers.logs.delete');
Route::get('log-viewers/logs/{date}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@show')->name('log-viewers.logs.show');
Route::get('log-viewers/logs/{date}/download', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@download')->name('log-viewers.logs.download');
Route::get('log-viewers/logs/{date}/{level}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@showByLevel')->name('log-viewers.logs.filter');
Route::get('log-viewers/logs/{date}/{level}/search', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@search')->name('log-viewers.logs.search');
Route::get('log-viewers/logcheck', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@logCheck')->name('log-viewers.logcheck');


Route::get('auth/{provider}/','Auth\SocialLoginController@redirectToProvider');
Route::get('{provider}/callback','Auth\SocialLoginController@handleProviderCallback');
Route::get('logout','Auth\LoginController@logout');
Auth::routes();

Route::group(['middleware' => 'package'], function() {
    Route::get('my_forum','WebsiteController@myForum')->name('my_forum');
     Route::get('/dashboard','WebsiteController@dashboard')->name('dashboard');
});


Auth::routes();


Route::group(['middleware' => 'premium_package'], function() {
    Route::resource('buySaleProperty/buy-sale-property', 'BuySaleProperty\\BuySalePropertyController');
});

/*Route::group(['middleware' => 'package'], function() {
    Route::resource('buySaleProperty/buy-sale-property', 'BuySaleProperty\\BuySalePropertyController');
    // Route::get('my_forum','WebsiteController@myForum')->name('my_forum');
});*/


Route::resource('propertyType/property-type', 'PropertyType\\PropertyTypeController');
Route::resource('worth/worth', 'Worth\\WorthController');
Route::resource('time/time', 'Time\\TimeController');
Route::resource('heardSource/heard-source', 'HeardSource\\HeardSourceController');

Route::resource('chatterTopic/chatter-topic', 'ChatterTopic\\ChatterTopicController');
Route::resource('type/type', 'Type\\TypeController');
Route::resource('leadership/leadership', 'Leadership\\LeadershipController');
Route::resource('contact/contact', 'Contact\\ContactController');
Route::resource('office/office', 'Office\\OfficeController');
Route::resource('review/review', 'Review\\ReviewController');
Route::resource('faq/faq', 'Faq\\FaqController');

Route::get('cache-clear',function(){
//    echo "<pre>";
    $exitCode = Artisan::call('cache:clear');
    print_r($exitCode);die;
    die;
});
Route::resource('testimonial/testimonial', 'Testimonial\\TestimonialController');
Route::resource('tipAndTool/tip-and-tool', 'TipAndTool\\TipAndToolController');
Route::resource('page/page', 'Page\\PageController');


Route::get('test','WebsiteController@test')->name('test');
Route::resource('package/package', 'Package\\PackageController');
Route::resource('userPayment/user-payment', 'UserPayment\\UserPaymentController');
Route::resource('rating/rating', 'Rating\\RatingController');
Route::resource('elite/elite', 'Elite\\EliteController');
Route::resource('press/press', 'Press\\PressController');
Route::resource('referal/referal', 'Referal\\ReferalController');

Route::resource('emoji/emoji', 'Emoji\\EmojiController');
Route::resource('homeCondition/home-condition', 'HomeCondition\\HomeConditionController');
Route::resource('homeExtimate/home-extimate', 'HomeExtimate\\HomeExtimateController');

if (!env('ALLOW_REGISTRATION', false)) {
    Route::any('/register', function() {
        abort(403);
    });
}
Route::resource('paymentDetail/payment-detail', 'PaymentDetail\\PaymentDetailController');
Route::resource('assignLead/assign-lead', 'AssignLead\\AssignLeadController');
Route::get('assign_lead/{id?}','WebsiteController@assignLead')->name('assign_lead');
Route::post('assign_lead_process','WebsiteController@assignLeadProcess')->name('assign_lead_process');
Route::post('individual_assign_lead_process','WebsiteController@individualAssignLeadProcess')->name('individual_assign_lead_process');
Route::resource('subscriber/subscriber', 'Subscriber\\SubscriberController');
Route::post('mailchimp_subscribe','WebsiteController@mailchimpSubscribe')->name('mailchimp_subscribe');
Route::get('mailchimp_status/{email?}','WebsiteController@mailchimpunsubscribe')->name('mailchimp_unsubscribe');

Route::resource('assignEstimate/assign-estimate', 'AssignEstimate\\AssignEstimateController');
Route::get('assign_estimate/{id?}','WebsiteController@assignEstimate')->name('assign_estimate');
Route::post('assign_estimate_process','WebsiteController@assignEstimateProcess')->name('assign_estimate_process');
Route::post('individual_assign_estimate_process','WebsiteController@individualAssignEstimateProcess')->name('individual_assign_estimate_process');
Route::post('complete_referral_process','WebsiteController@completeReferralProcess')->name('complete_referral_process');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminGenreController;
use App\Http\Controllers\AdminAuthorController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Front\RegisterController;
use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Admin\AboutusController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\TermsAndConditionController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Admin\UserContactController;
use App\Http\Controllers\Author\AuthorRegisterController;
use App\Http\Controllers\Author\AuthorLoginController;
use App\Http\Controllers\Vendor\VideoController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Front\CookieController;

























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

Route::prefix('admin')->namespace('Admin')->group(function(){
	Route::group(['middleware'=>'AdminGuest'],function (){
    Route::get('/auth/login',['as'=>'admin.auth.login','uses'=>'\App\Http\Controllers\Admin\LoginController@Login']);
	Route::post('/auth/attempt',['as'=>'admin.auth.attempt','uses'=>'\App\Http\Controllers\Admin\LoginController@attempt']);
	Route::get('/auth/forgetpassword',['as'=>'admin.auth.forgetpassword','uses'=>'\App\Http\Controllers\Admin\LoginController@forget']);
	Route::post('/auth/forgetpassword-process',['as'=>'admin.auth.forgetpassword-process','uses'=>'\App\Http\Controllers\Admin\LoginController@forget_process']);
	Route::get('/auth/resetpassword/{token}',['as'=>'admin.auth.resetpassword','uses'=>'\App\Http\Controllers\Admin\LoginController@resetpassword']);
	Route::post('/auth/resetpassword-process',['as'=>'admin.auth.resetpassword-process','uses'=>'\App\Http\Controllers\Admin\LoginController@resetpassword_process']);




	});

	Route::group(['middleware'=>"AdminAuth"], function(){
		Route::get('main/dashboard',['as'=>'admin.main.dashboard','uses'=>'\App\Http\Controllers\Admin\AdminDashboardController@dashboard']);
		Route::get('logout',['as'=>'admin.logout','uses'=>'\App\Http\Controllers\Admin\AdminDashboardController@logout']);
        //Profile
		Route::get('profile',['as'=>'admin.profile','uses'=>'\App\Http\Controllers\Admin\LoginController@profile']);
		Route::post('profile-update',['as'=>'admin.profile-update','uses'=>'\App\Http\Controllers\Admin\LoginController@updateAdminProfile']);


		//Language
		Route::get('languages',['as'=>'admin.languages','uses'=>'\App\Http\Controllers\Admin\LanguageController@languages']);
		Route::post('addlanguage',['as'=>'admin.addlanguage','uses'=>'\App\Http\Controllers\Admin\LanguageController@addlanguage']);
		Route::post('editlanguage',['as'=>'admin.editlanguage','uses'=>'\App\Http\Controllers\Admin\LanguageController@editlanguage']);
		Route::post('updatelanguage',['as'=>'admin.updatelanguage','uses'=>'\App\Http\Controllers\Admin\LanguageController@updatelanguage']);
		Route::post('deletelanguage',['as'=>'admin.deletelanguage','uses'=>'\App\Http\Controllers\Admin\LanguageController@deletelanguage']);
		//Category
		Route::get('/categorylist',['as'=>'admin.categorylist','uses'=>'\App\Http\Controllers\AdminController@category']);
        Route::post('/create-category-process',['as'=>'admin.create-category-process','uses'=>'\App\Http\Controllers\AdminController@category_process']);
        Route::get('/delete-category/{id}',['as'=>'admin.delete-category','uses'=>'\App\Http\Controllers\AdminController@deleteCategory']);
        Route::get('/edit-category/{id}', ['as'=>'admin.edit-category','uses'=>'\App\Http\Controllers\AdminController@editCategory']);
        Route::post('/update-category-process',['as'=>'admin.update-category-process','uses'=>'\App\Http\Controllers\AdminController@updateCategory']);
		//Genre
		Route::get('generelist',['as'=>'admin.generelist','uses'=>'\App\Http\Controllers\AdminGenreController@genre'] );
        Route::post('create-genre-process', ['as'=>'admin.create-genre-process','uses'=>'\App\Http\Controllers\AdminGenreController@genre_process']);
        Route::get('delete-genre/{id}', ['as'=>'admin.delete-genre','uses'=>'\App\Http\Controllers\AdminGenreController@deleteGenre']);
        Route::get('edit-genre/{id}',['as'=>'admin.edit-genre','uses'=>'\App\Http\Controllers\AdminGenreController@editGenre']);
        Route::post('update-genre-process',['as'=>'admin.update-genre-process','uses'=>'\App\Http\Controllers\AdminGenreController@updateGenre']);
		//Author Routes
        Route::get('authorlist',['as'=>'admin.authorlist','uses'=>'\App\Http\Controllers\AdminAuthorController@author']);
        Route::post('create-author-process',['as'=>'admin.create-author-process','uses'=>'\App\Http\Controllers\AdminAuthorController@author_process']);
        Route::get('delete-author/{id}', ['as'=>'admin.delete-author','uses'=>'\App\Http\Controllers\AdminAuthorController@deleteAuthor']);
        Route::get('edit-author/{id}',['as'=>'admin.edit-author','uses'=>'\App\Http\Controllers\AdminAuthorController@editAuthor'] );
		Route::post('update-author-process',['as'=>'admin.update-author-process','uses'=>'\App\Http\Controllers\AdminAuthorController@updateAuthor'] );
		
		Route::post('add-pdf',['as'=>'admin.add-pdf','uses'=>'\App\Http\Controllers\Admin\PdfController@add_pdf'] );
		Route::get('pdf',['as'=>'admin.pdf','uses'=>'\App\Http\Controllers\Admin\PdfController@pdf'] );

		
		//SubCategories Routes
		Route::get('subcategorylist',['as'=>'admin.subcategorylist','uses'=>'\App\Http\Controllers\Admin\SubCategoryController@subcategory']);
		// Route::get('subcategorylist',['as'=>'admin.subcategorylist','uses'=>'\App\Http\Controllers\Admin\SubCategoryController@subcategory1']);
		Route::post('create-subcat-process',['as'=>'admin.create-subcat-process','uses'=>'\App\Http\Controllers\Admin\SubCategoryController@subcat_process']);
		Route::get('delete-subcat/{id}', ['as'=>'admin.delete-subcat','uses'=>'\App\Http\Controllers\Admin\SubCategoryController@deletesubCat']);
		Route::get('edit-subcat/{id}',['as'=>'admin.edit-subcat','uses'=>'\App\Http\Controllers\Admin\SubCategoryController@editsubCat'] );
		Route::post('update-subcat-process',['as'=>'admin.update-subcat-process','uses'=>'\App\Http\Controllers\Admin\SubCategoryController@updatesubCat'] );
		//Publisher Route
		Route::get('publisherlist',['as'=>'admin.publisherlist','uses'=>'\App\Http\Controllers\Admin\PublisherController@publisher']);
		Route::post('create-publisher-process',['as'=>'admin.create-publisher-process','uses'=>'\App\Http\Controllers\Admin\PublisherController@publisher_process']);
		Route::get('delete-publisher/{id}',['as'=>'admin.delete-publisher','uses'=>'\App\Http\Controllers\Admin\PublisherController@deletePublisher']);
		Route::get('edit-publisher/{id}',['as'=>'admin.edit-publisher','uses'=>'\App\Http\Controllers\Admin\PublisherController@editPublisher']);
		Route::post('update-publisher-process',['as'=>'admin.update-publisher-process','uses'=>'\App\Http\Controllers\Admin\PublisherController@updatePublisher']);
		//Vendor Route
		Route::get('vendorlist',['as'=>'admin.vendorlist','uses'=>'\App\Http\Controllers\Admin\VendorController@vendor']);
		Route::post('create-vendor-process',['as'=>'admin.create-vendor-process','uses'=>'\App\Http\Controllers\Admin\VendorController@vendor_process']);
		Route::get('delete-vendor/{id}',['as'=>'admin.delete-vendor','uses'=>'\App\Http\Controllers\Admin\VendorController@deleteVendor']);
		Route::get('edit-vendor/{id}',['as'=>'admin.edit-vendor','uses'=>'\App\Http\Controllers\Admin\VendorController@editVendor']);
		Route::post('update-vendor-process',['as'=>'admin.update-vendor-process','uses'=>'\App\Http\Controllers\Admin\VendorController@updateVendor']);
		//StoreInformation
		Route::get('storeinformation',['as'=>'admin.storeinformation','uses'=>'\App\Http\Controllers\Admin\StoreInformationController@index']);
		Route::post('storeinformation-process',['as'=>'admin.informationprocess','uses'=>'\App\Http\Controllers\Admin\StoreInformationController@store']);
		Route::get('/booklist',['as'=>'admin.booklist','uses'=>'\App\Http\Controllers\Admin\BookController@booklist']);
		Route::post('change-book-status',['as'=>'admin.change-book-status','uses'=>'\App\Http\Controllers\Admin\BookController@change_book_status']);
		//AboutusInformation
		Route::get('aboutus-information',['as'=>'admin.aboutus-information','uses'=>'\App\Http\Controllers\Admin\AboutusController@index']);
		Route::post('aboutus-information-process',['as'=>'admin.aboutus-information-process','uses'=>'\App\Http\Controllers\Admin\AboutusController@aboutus_process']);
		//TermsConditions
		Route::get('terms-information',['as'=>'admin.terms-information','uses'=>'\App\Http\Controllers\Admin\TermsAndConditionController@index']);
		Route::post('terms-information-process',['as'=>'admin.terms-information-process','uses'=>'\App\Http\Controllers\Admin\TermsAndConditionController@terms_process']);
		//Promotion
		Route::get('promotion-information',['as'=>'admin.promotion-information','uses'=>'\App\Http\Controllers\Admin\PromotionController@index']);
		Route::post('promotion-information-process',['as'=>'admin.promotion-information-process','uses'=>'\App\Http\Controllers\Admin\PromotionController@promotion_process']);
		//Slider
		Route::get('slider-information',['as'=>'admin.slider-information','uses'=>'\App\Http\Controllers\Admin\SliderController@index']);
		Route::post('promotion-information-process',['as'=>'admin.promotion-information-process','uses'=>'\App\Http\Controllers\Admin\PromotionController@promotion_process']);

		

        //Change Password
		Route::get('change-password',['as'=>'admin.change-password','uses'=>'\App\Http\Controllers\Admin\LoginController@changepass']);
		Route::post('change-password-process',['as'=>'admin.change-password-process','uses'=>'\App\Http\Controllers\Admin\LoginController@changepassword_process']);

		Route::get('slider',['as'=>'admin.slider','uses'=>'\App\Http\Controllers\Admin\SliderController@index']);
		Route::post('slider-process',['as'=>'admin.slider-process','uses'=>'\App\Http\Controllers\Admin\SliderController@slider_process']);
		Route::post('delete-slider',['as'=>'admin.delete-slider','uses'=>'\App\Http\Controllers\Admin\SliderController@delete']);

        //User Contact
		Route::get('contact-info',['as'=>'admin.contact-info','uses'=>'\App\Http\Controllers\Admin\UserContactController@contactInfo']);
		
		Route::get('show-contact-info/{id}',['as'=>'admin.show-contact-info','uses'=>'\App\Http\Controllers\Admin\UserContactController@showmessage']);

		//Event Routes
		Route::get('event',['as'=>'admin.event','uses'=>'\App\Http\Controllers\Admin\EventController@event']);
		Route::post('event/process',['as'=>'admin.event.process','uses'=>'\App\Http\Controllers\Admin\EventController@event_process']);
		Route::get('event-delete/{id}',['as'=>'admin.event-delete','uses'=>'\App\Http\Controllers\Admin\EventController@eventdelete']);
		Route::get('event-edit/{id}',['as'=>'admin.event-edit','uses'=>'\App\Http\Controllers\Admin\EventController@eventedit']);
		Route::post('event/update',['as'=>'admin.event.update','uses'=>'\App\Http\Controllers\Admin\EventController@eventupdate']);

		//Logo Routes
		Route::get('logo',['as'=>'admin.logo','uses'=>'\App\Http\Controllers\Admin\LogoController@logo']);
		Route::post('logo/process',['as'=>'admin.logo.process','uses'=>'\App\Http\Controllers\Admin\LogoController@logo_process']);

		//Title Routes
		Route::get('title',['as'=>'admin.title','uses'=>'\App\Http\Controllers\Admin\LogoController@title']);
		Route::post('title/process',['as'=>'admin.title.process','uses'=>'\App\Http\Controllers\Admin\LogoController@title_process']);











		
		
	});
});

//Author Guard Routes
Route::prefix('author')->namespace('Author')->group(function(){
	Route::group(['middleware'=>'AuthorGuest'],function (){
	Route::get('/auth/register',['as'=>'author.auth.register','uses'=>'\App\Http\Controllers\Author\AuthorRegisterController@register']);
    Route::post('/auth/register/process',['as'=>'author.auth.register.process','uses'=>'\App\Http\Controllers\Author\AuthorRegisterController@register_process']);
	Route::get('/auth/login',['as'=>'author.auth.login','uses'=>'\App\Http\Controllers\Author\AuthorLoginController@login']);
	Route::post('/auth/attempt',['as'=>'author.auth.attempt','uses'=>'\App\Http\Controllers\Author\AuthorLoginController@attempt']);

	
});

Route::group(['middleware'=>'AuthorAuth'],function (){
Route::get('/logout',['as'=>'author.logout','uses'=>'\App\Http\Controllers\Author\AuthorLoginController@logout']);

Route::get('/detaillist',['as'=>'author.detaillist','uses'=>'\App\Http\Controllers\Author\AuthorLoginController@details']);

});


});


Route::prefix('vendor')->namespace('Vendor')->group(function(){
	Route::group(['middleware'=>'VendorGuest'],function (){
	Route::get('/auth/login',['as'=>'vendor.auth.login','uses'=>'\App\Http\Controllers\Vendor\VendorLoginController@Login']);
	Route::post('/auth/attempt',['as'=>'vendor.auth.attempt','uses'=>'\App\Http\Controllers\Vendor\VendorLoginController@attempt']);
	Route::get('/auth/forgetpassword',['as'=>'vendor.auth.forgetpassword','uses'=>'\App\Http\Controllers\Vendor\VendorLoginController@forget']);
	Route::post('/auth/forgetpassword-process',['as'=>'vendor.auth.forgetpassword-process','uses'=>'\App\Http\Controllers\Vendor\VendorLoginController@forget_process']);
	Route::get('/auth/resetpassword/{token}',['as'=>'vendor.auth.resetpassword','uses'=>'\App\Http\Controllers\Vendor\VendorLoginController@resetpassword']);
	Route::post('/auth/resetpassword-process',['as'=>'vendor.auth.resetpassword-process','uses'=>'\App\Http\Controllers\Vendor\VendorLoginController@resetpassword_process']);
	});
	Route::group(['middleware'=>"VendorAuth"],function(){
		Route::get('/booklist',['as'=>'vendor.booklist','uses'=>'\App\Http\Controllers\Vendor\BookController@booklist']);
		Route::post('/add-book',['as'=>'vendor.add-book','uses'=>'\App\Http\Controllers\Vendor\BookController@addbook']);
		Route::get('/book/delete/{id}',['as'=>'vendor.book.delete','uses'=>'\App\Http\Controllers\Vendor\BookController@destroy']);
		Route::post('/book/edit/',['as'=>'vendor.book.edit','uses'=>'\App\Http\Controllers\Vendor\BookController@edit']);
		Route::post('/book/update/',['as'=>'vendor.book.update','uses'=>'\App\Http\Controllers\Vendor\BookController@update']);
		Route::post('change-subcategory',['as'=>'vendor.change-subcategory','uses'=>'\App\Http\Controllers\Vendor\BookController@change_category']);
		Route::get('logout',['as'=>'vendor.logout','uses'=>'\App\Http\Controllers\Vendor\VendorLoginController@logout']);
		Route::get('profile',['as'=>'vendor.profile','uses'=>'\App\Http\Controllers\Vendor\VendorLoginController@profile']);
		Route::post('update-profile',['as'=>'vendor.update-profile','uses'=>'\App\Http\Controllers\Vendor\VendorLoginController@updateVendorProfile']);

		Route::get('change-password',['as'=>'vendor.change-password','uses'=>'\App\Http\Controllers\Vendor\VendorLoginController@changepass']);
		Route::post('change-password-process',['as'=>'vendor.change-password-process','uses'=>'\App\Http\Controllers\Vendor\VendorLoginController@changepassword_process']);
		//Notification
		Route::get('vendor-notifications',['as'=>'vendor.vendor-notifications','uses'=>'\App\Http\Controllers\Notification\NotificationController@vendor_notification']);
		Route::get('read-notifications',['as'=>'vendor.read-notification','uses'=>'\App\Http\Controllers\Notification\NotificationController@read_notification']);

        Route::get('vendor-notifications',['as'=>'vendor.vendor-notifications','uses'=>'\App\Http\Controllers\Notification\NotificationController@vendor_notification']);
		Route::get('read-notifications',['as'=>'vendor.read-notification','uses'=>'\App\Http\Controllers\Notification\NotificationController@read_notification']);
        // Route::get('profile-edit/{id}',['as'=>'vendor.profile-edit','uses'=>'\App\Http\Controllers\Vendor\VendorLoginController@editVendorProfile']);
        //Order
		Route::get('order/list',['as'=>'vendor.order.list','uses'=>'\App\Http\Controllers\Vendor\OrderController@order_list']);
		//Order Details
		Route::get('order/details/{id}',['as'=>'vendor.order.details','uses'=>'\App\Http\Controllers\Vendor\OrderController@orderdetails_list']);
		//Video
		Route::get('video',['as'=>'vendor.video','uses'=>'\App\Http\Controllers\Vendor\VideoController@video']); 
		Route::post('video-process',['as'=>'vendor.video-process','uses'=>'\App\Http\Controllers\Vendor\VideoController@video_process']);
		Route::get('video/delete/{id}',['as'=>'vendor.video.delete','uses'=>'\App\Http\Controllers\Vendor\VideoController@video_delete']);
		Route::get('video/edit/{id}',['as'=>'vendor.video.edit','uses'=>'\App\Http\Controllers\Vendor\VideoController@video_edit']);
		Route::post('video/update',['as'=>'vendor.video.update','uses'=>'\App\Http\Controllers\Vendor\VideoController@video_update']);


                            




		
		
	});
		
}); 
Route::get('check',['as'=>'check','uses'=>'\App\Http\Controllers\Vendor\BookController@check']);



Route::get('/dashboard', [AdminController::class, 'index']);


Route::get('/booklist',function(){
	return view('vendor.pages.book.book');
});

Route::get('/orderlist',function(){
	return view('vendor.pages.order.list');
});

// Route::get('/video',function(){
// return view('vendor.pages.video.video');
// });


Route::post('login-process', [LoginController::class, 'login_process'])->name('login-process');

Route::group(['middleware'=>"UserAuth"], function(){
	Route::get('pay/with/square', [CheckoutController::class, 'paySquare'])->name('pay/with/square');

	Route::get('with-square/{nonce}', [CheckoutController::class, 'withSquare']);

	Route::get('logout',[LoginController::class,'logout'])->name('logout');
	Route::get('myaccount', [LoginController::class, 'index'])->name('myaccount');
	Route::get('myaccount-profile/{id}', [LoginController::class, 'editProfile']);
	Route::post('update-myaccount-process', [LoginController::class, 'updateProfile'])->name('update-myaccount-process');
	Route::post('update-account-detail-process', [LoginController::class, 'account_detail'])->name('update-account-detail-process');

	Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
	Route::post('/checkout-process', [CheckoutController::class, 'checkout_process'])->name('checkout-process');
	Route::get('paypal', ['as'=>'paypal','uses'=>"App\Http\Controllers\Front\PayPalController@paypal"]);
	Route::get('paypal-cancel', ['as'=>'paypal.cancel','uses'=>"App\Http\Controllers\Front\PayPalController@paypal_cancel"]);

	Route::get('payment/success', ['as'=>'paypal.success','uses'=>"App\Http\Controllers\Front\PayPalController@paypal_success"]);
	Route::get('whishlist', [FrontController::class, 'whishlist'])->name('whishlist');
	Route::post('whishlist-process', [FrontController::class, 'whishlist_process'])->name('whishlist-process');
	Route::get('/whishlist-delete/{id}', [FrontController::class, 'deleteWhishlist']);

	Route::get('reader/{id}',["as"=>"reader","uses"=>"\App\Http\Controllers\Front\FrontController@reader"]);

	Route::get('paypal-payment',["as"=>"paypal-payment","uses"=>"\App\Http\Controllers\Front\CheckoutController@paypal_payment"]);

	Route::post('cookie/set',["as"=>"cookie/set","uses"=>"\App\Http\Controllers\Front\CookieController@setbookmark"]);
	Route::get('cookie/get',["as"=>"cookie/get","uses"=>"\App\Http\Controllers\Front\CookieController@getCookie"]);






});
Route::get('pusher',["as"=>"pusher","uses"=>"\App\Http\Controllers\Front\FrontController@pusher"]);

Route::group(['middleware'=>"UserGuest"], function(){



Route::get('/login', [RegisterController::class, 'register'])->name('login');
Route::post('/register-process', [RegisterController::class, 'register_process'])->name('register-process');

});
Route::get('/', [FrontController::class, 'home'])->name('/');



Route::get('/edit-eye/{id}', [FrontController::class, 'seeEye'])->name('edit-eye');
Route::post('/comment-process', [FrontController::class, 'comment'])->name('comment-process');
Route::post('/rating-process', [FrontController::class, 'rating'])->name('rating-process');









Route::get('/bookgenerelist',function(){
	return view('admin.pages.bookgenere.list');
});



Route::get('/orderlist',function(){
	return view('admin.pages.order.list');
});

Route::get('/shop/',['as'=>'shop','uses'=>'\App\Http\Controllers\Front\FrontController@index']);


Route::get('productdetail/{book_id}',['as'=>'productdetail','uses'=>'\App\Http\Controllers\Front\FrontController@product_detail']);
Route::get('book-by-sort',['as'=>'book-by-sort','uses'=>'\App\Http\Controllers\Front\FrontController@book_sort']);
Route::get('contact',['as'=>'contact','uses'=>'\App\Http\Controllers\Front\FrontController@contact']);
Route::get('auth/facebook',['as'=>'auth.facebook','uses'=>'\App\Http\Controllers\Social\SocialController@auth_facebook']);
Route::get('auth/facebook/callback',['as'=>'auth.facebook.callback','uses'=>'\App\Http\Controllers\Social\SocialController@call_back']);
Route::get('auth/gmail',['as'=>'auth.gmail','uses'=>'\App\Http\Controllers\Social\SocialController@auth_gmail']);
Route::get('auth/gmail/callback',['as'=>'auth.gmail.callback','uses'=>'\App\Http\Controllers\Social\SocialController@gmail_call_back']);
Route::get('auth/linkedin',['as'=>'auth.linkedin','uses'=>'\App\Http\Controllers\Social\SocialController@auth_linkedin']);
Route::get('auth/linkedin/callback',['as'=>'auth.linkedin.callback','uses'=>'\App\Http\Controllers\Social\SocialController@linkedin_call_back']);
Route::get('user-verify',['as'=>'user-verify','uses'=>'\App\Http\Controllers\Front\RegisterController@user_verify']);
Route::get('verification',['as'=>'verification','uses'=>'\App\Http\Controllers\Front\RegisterController@verification']);
Route::get('verification-process',['as'=>'verification-process','uses'=>'\App\Http\Controllers\Front\RegisterController@verification_process']);


//Author
Route::get('authordetail/{id}',['as'=>'authordetail','uses'=>'\App\Http\Controllers\Front\FrontController@author_detail']);
//SubCategory
Route::get('subcategoriesdetail/{id}',['as'=>'subcategoriesdetail','uses'=>'\App\Http\Controllers\Front\FrontController@subcat_detail']);

Route::get('subcategoriescart',['as'=>'subcategoriescart','uses'=>'\App\Http\Controllers\Front\CartController@subcat_cart_detail']);
Route::get('authorsprofile',['as'=>'authorsprofile','uses'=>'\App\Http\Controllers\Front\FrontController@authorprofile']);
Route::get('authorsprofiledetails/{id}',['as'=>'authorsprofiledetails','uses'=>'\App\Http\Controllers\Front\FrontController@authorprofiledetails']);

Route::get('authorsvideo',['as'=>'authorsvideo','uses'=>'\App\Http\Controllers\Front\FrontController@authorvideos']);

//Event Detail
Route::get('eventdetails/{id}',['as'=>'eventdetails','uses'=>'\App\Http\Controllers\Front\FrontController@eventdetails']);

//Squareup
Route::get('squarepayment',['as'=>'squarepayment','uses'=>'\App\Http\Controllers\Front\CheckoutController@squareup']);







//Add To Cart Routes
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::post('cart-process', [CartController::class, 'cart_process'])->name('cart-process');
Route::get('cart-delete/{id}', [CartController::class, 'deletecart'])->name('cart-delete');

//Checkout Routes

//Contact Route
Route::get('contact', ['as'=>'contact','uses'=>"App\Http\Controllers\Front\ContactController@contact"]);
Route::post('contact-process', ['as'=>'contact-process','uses'=>"App\Http\Controllers\Front\ContactController@contact_process"]);

//Whishlist Route
Route::post('whishlist-count', ['as'=>'whishlist-count','uses'=>"App\Http\Controllers\Front\FrontController@whishlist_count"]);




Route::get('about', [FrontController::class, 'about'])->name('about');

Route::get('orderdetail/{id}', [FrontController::class, 'details'])->name('orderdetail');
Route::get('termsandcondition', [FrontController::class, 'term'])->name('termsandcondition');


Route::get('/forget', [LoginController::class, 'forget'])->name('forget');
Route::post('/forget-process', [LoginController::class, 'forget_process'])->name('forget-process');

Route::get('/newpassword', [LoginController::class, 'newpass'])->name('newpassword');
Route::post('newpassword-process', ['as'=>'newpassword-process','uses'=>"App\Http\Controllers\Front\LoginController@resetpassword_process"]);

	
Route::get('/compare',function(){
return view('client.page.compare');
});

// Route::get('/authorlist',function(){
// return view('client.page.authorlist');
// });



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

/* Blog page*/
Route::get('blog', function () {
    return view('Pages.blog');
});

/* Contact page*/
Route::get('contact', function () {
    return view('Pages.contact');
});

/* About page */
Route::get('about', function () {
    return view('Pages.about');
});

/*Thank You page */
Route::get('orderConfirm', function () {
    return view('Pages.orderConfirm');
})->name('orderConfirm');

/* No products blade file */
Route::get('noproducts', function () {
    return view('Pages.noproducts');
});

/*No orders */
Route::get('noOrder', function () {
    return view('Pages.noOrder');
});

/*Mail blade*/
Route::get('mail', function () {
    return view('Pages.mail');
});

Route::get('/', 'ViewController@index'); //index page of website
Route::get('shop','ViewController@shop')->name('shop'); //store page
//Route::get('admin','AdminController@index');
Route::get('users','AdminController@getUser'); 

Route::get('logout','Auth\LoginController@logout'); //admin logout


Route::get('category-wise/{id}','ViewController@category');
Route::any('/add-to-cart','CartController@getAddToCart'); //add to cart


//Route::any('cart', 'CartController@getCart');
Route::any('/reduce','CartController@reducebyone')->name('reducebyone ');
 Route::any('/remove', 'CartController@removeitem')->name('remove'); //remove items from cart
 Route::any('/add-one','CartController@addone')->name('add-one'); //increase the quantity of the itm n cart
Route::get('/single/{id}', 'ViewController@single')->name('single'); //single page view for each product


Auth::routes();
Route::group(['middleware'=>'auth'],function()
{ 
   
Route::get('admin','AdminController@index'); //index page of admin portal displaying charts

Route::get('/checkout/{id}','CartController@getCheckout')->name('checkout');//returns checkout page
Route::post('/checkout','CartController@postcheckout')->name('checkout'); //handle payment


Route::get('/ship','CartController@getship')->name('ship'); // get shipping details form
Route::post('/shipping','CartController@store'); //store shipping data 

});


Route::get('/home', 'HomeController@index')->name('home'); //dashboard of user
Route::get('/verify/{token}', 'verifyController@verify')->name('verify'); //verify user account through mail
 Route::get('/edit/{id}','editController@edit')->name('edit'); //edit user profile
 Route::post('store','editController@store')->name('store'); //store user profile's data
 Route::post('update','editController@update')->name('update'); //update user profile
Route::any('cart', 'CartController@getCart')->name('cart'); //cart listing


Route::resource('/category', 'CategoryController'); //category create, edit, delete, update
Route::resource('/product','ProductController'); //product create, edit, update, delete
Route::get('/changeProduct','ProductController@changeProduct')->name('changeProduct');
Route::get('/changeCategory','CategoryController@changeCategory')->name('changeCategory');
Route::get('/categoryList/{id}', 'ViewController@categoryList')->name('categoryList');
Route::get('orders','AdminController@orders')->name('orders'); //admin orders

Route::get('myOrders/{id}','AdminController@getOrder'); //front end order list

Route::get('detailorder/{id}','AdminController@detailOrder');//front end detail order list

Route::get('/orderDetails/{id}','AdminController@orderDetails');//admin order details




Route::post('/contact','ViewController@contact'); //store contact data

Route::get('/editaddress/{id}','CartController@editaddress'); //edit shipping address
Route::patch('/updateaddress','CartController@updateaddress'); //update shipping address
Route::any('deladdress/{id}','CartController@deleteaddress'); //delete address


Route::get('/downloadPDF/{id}','CartController@downloadPDF'); //download pdf







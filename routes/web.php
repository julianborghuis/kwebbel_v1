<?php
use Illuminate\Http\Request;
use App\User;


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
Route::get('/', 'IndexController@index')->name('index');

Route::get('/search', 'SearchController@index')->name('index');
Route::post('/search', 'SearchController@search')->name('search');



Route::group(['middleware' => ['web']], function() {

// Own profile Routes...
    Route::get('/me', 'MeController@index')->name('index');
    Route::post('/me', 'MeController@updateAvatar')->name('updateAvatar');

    Route::post('/me/action/denyFriend', 'MeController@denyFriend')->name('denyFriend');
    Route::post('/me/action/addFriend', 'MeController@acceptFriend')->name('acceptFriend');
    Route::resource('/me', 'MeController');
    
// Profile Routes

    Route::get('/profile/{username}', ['uses' => 'ProfileController@index' ])->name('profile');
    Route::post('/profile/action/addfriend', 'ProfileController@sendFriendRequest')->name('sendFriendRequest');
    Route::post('/profile/action/removefriend', 'ProfileController@removeFriend')->name('removeFriend');


// Login Routes...
    Route::post('/', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes...
    Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

// Password Reset Routes...
    Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);
});


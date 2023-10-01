<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Cart;
use App\Http\Livewire\ContactForm;
use App\Http\Livewire\CreateCategory;
use App\Http\Livewire\PermanentlySaveContactDetials;
use App\Http\Livewire\ProceedToCheckout;
use App\Http\Livewire\ViewCart;
use App\Models\Category;
use App\Models\orders;
use App\Models\products;
use App\Models\User;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
  
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('test',function(){
    abort(403, 'Unauthorized action.');
});




/*products*/
Route::get('redirects','App\Http\Controllers\UserController@index')->middleware('isitadmin');
Route::get('product-list',[ProductController::class,'index'])->middleware(['isitadmin','checkadmin']);  
//Route::get('dashboard',[App\Http\Controllers\HomeController::class,'index']);
//Route::get('product-description',[ProductController::class,'productDescription']);

Route::get("details/{id}",[ProductController::class,'details']);
Route::get('getadmindashboard',[UserController::class,'index']);
/*end products*/


/*users*/
Route::get('user-list',[UserController::class,'list'])->middleware(['isitadmin','checkadmin']);
Route::get('delete-user/{id}',[UserController::class,'deleteUser'])->middleware(['isitadmin','checkadmin']);  



Route::group(['prefix' => 'administrator' ] , function(){
Route::get('admin-list',[UserController::class,'adminList'])->middleware(['isitadmin','checkadmin']);
Route::get('edit-admin/{id}',[UserController::class,'EditAdmin'])->middleware(['isitadmin','checkadmin']);
Route::post('update-admin',[UserController::class,'UpdateAdmin']);
//Route::get('backadminlist',[UserController::class,'backadminlist']);
//Route::get('createuser',[UserController::class,'createUser']);
Route::get('AddUser',[UserController::class,'AddUser'])->middleware(['isitadmin','checkadmin']);
Route::post('save-user',[UserController::class,'SaveUser']);
Route::post('registerUser',[UserController::class,'RegisterUser'])->name('registerUser');
Route::get('edit-user/{id}',[UserController::class,'EditUser'])->middleware(['isitadmin','checkadmin']);    
Route::post('update-user',[UserController::class,'UpdateUser']);
Route::get('backtoadmin',[UserController::class,'backtoadmin']);
Route::get('/create-product',[ProductController::class,'createProduct'])->middleware(['isitadmin','checkadmin'])->name('createproduct');
Route::post('/save-product',[ProductController::class,'SaveProduct'])->name('Saveproduct');
Route::get('back-productlist',[ProductController::class,'backProductlist'])->middleware(['isitadmin','checkadmin']);
Route::get('/edit-product/{id}',[ProductController::class,'editProduct'])->middleware(['isitadmin','checkadmin'])->name('editproduct');   
Route::post('/update-product',[ProductController::class,'updateProduct'])->name('updateproduct');    
Route::get('/delete-product/{id}',[ProductController::class,'deleteProduct'])->middleware(['isitadmin','checkadmin'])->name('deleteproduct');
Route::get('adminhome',[App\Http\Controllers\ProductController::class,'back'])->middleware(['isitadmin','checkadmin']);


});


Route::get('back',[UserController::class,'index']);

Route::get('backtoproducts',[ProductController::class,'index'])->middleware(['isitadmin','checkadmin']);
Route::get('Homepage' ,[UserController::class,'index'])->name('homepage');



/*Admin*/
Route::get('create-admin',[UserController::class,'createAdmin'])->middleware(['isitadmin','checkadmin']);
Route::post('save-admin',[UserController::class,'saveAdmin']);
Route::get('delete-admin/{id}',[UserController::class,'deleteAdmin'])->middleware(['isitadmin','checkadmin']);
Route::get('edit-admin/{id}',[UserController::class,'editAdmin'])->middleware(['isitadmin','checkadmin']);  
Route::post('update-admin',[UserController::class,'updateAdmin']);  
Route::get('test',[UserController::class,'test']);
Route::get('gotoadmindash',[UserController::class,'index']);
Route::get('viewcategories',[UserController::class,'viewCategory'])->name('viewcategory');

//cart routes

Route::group(['prefix' => 'cart'] , function(){
   
    Route::get('/', function () { return view ('cart.show'); })->name('viewcart');
    //Route::get('cart/delete/{id}',[Cart::class,'deleteCartItem'])->name('deletecartitem');
    Route::get('/getContactForm',[PurchaseController::class,'getContactForm'])->name('getContactForm');
   // Route::post('/addDetails',[PurchaseController::class,'addcontactDetails'])->name('addDetails');
    // Route::post('/addDetails',[ProceedToCheckout::class,'addcontactDetails'])->name('addDetails');

    Route::get('home',[Cart::class,'home'])->name('home');
    Route::post('/SaveContactDetailsPermanently',[PurchaseController::class,'permanentlySaveDetails'])->name('SaveContactDetailsPermanently');
    
    
});

//categories route 

Route::group(['prefix' => 'purchase'], function(){
    Route::get('/success',[PurchaseController::class,'success'])->name('getSuccessPage');
    Route::get('/history',[PurchaseController::class,'purchasehistory'])->name('purchaseHistory');

});



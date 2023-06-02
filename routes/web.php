<?php

use App\Http\Controllers\Admin\BackgroundImageController;
use App\Http\Controllers\Admin\ChangeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\FacilityAndMachineController;
use App\Http\Controllers\Admin\FloatingController;
use App\Http\Controllers\Admin\FourthFloatingController;
use App\Http\Controllers\Admin\HeaderController;
use App\Http\Controllers\Admin\HomeContentController;
use App\Http\Controllers\Admin\HomeTextContentController;
use App\Http\Controllers\Admin\ModalController;
use App\Http\Controllers\Admin\ModalHomeController;
use App\Http\Controllers\Admin\PaymentConfirmationController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SecondFloatingController;
use App\Http\Controllers\Admin\SosmedController;
use App\Http\Controllers\Admin\ThirdFloatingController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserPaymentConfirmationController;

use App\Http\Controllers\Cs\DashboarController as CsDashboardController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\UserCheckoutController;
use App\Http\Controllers\UserProductCategoryController;
use App\Http\Controllers\UserProductController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserTransactionController;
use App\Models\BackgroundImage;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('auth/google', );
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

// Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::get('/produk', [UserProductController::class, 'index'])->name('product');
Route::get('/produk/{id}', [UserProductController::class, 'details'])->name('product-details');
// Route::get('/produk/{post:name}', [UserProductController::class, 'productdetail'])->name('product-detail');
Route::get('/produk/{id}', [UserProductController::class, 'details'])->name('product-details');

Route::get('/profil', [HomeController::class, 'profile'])->name('profile');
Route::get('/client', [HomeController::class, 'client'])->name('client');

Route::get('/coba', [HomeController::class, 'coba'])->name('coba');

Route::get('/pemasangan', [HomeController::class, 'installation'])->name('installation');
Route::get('/fasilitas-dan-mesin', [HomeController::class, 'facilityandmachine'])->name('facilityandmachine');
Route::get('/fasilitas', [HomeController::class, 'facility'])->name('facility');

Route::get('/mesin', [HomeController::class, 'machine'])->name('machine');
Route::get('/mesin/{post:name}', [HomeController::class, 'machinedetails'])->name('machine-detail');

Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog/{post:slug}', [HomeController::class, 'blogDetail'])->name('blog-home-detail');

Route::get('/register/success', [RegisterController::class, 'success'])->name('register-success');

Route::get('/categories', [UserProductCategoryController::class, 'index'])->name('categories');
Route::get('/categories/{id}', [UserProductCategoryController::class, 'detail'])->name('categories-detail');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();

//     return redirect('/');
// })->middleware(['auth', 'signed'])->name('verification.verify');

//======================================== USER ========================================
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');

    // Route::get('/my_profile', [HomeController::class, 'myprofile'])->name('user-profile');
    Route::get('/my_profile', [UserProfileController::class, 'account'])->name('user-profile');

    // Route::get('/dashboard/account', [UserProfileController::class, 'account'])->name('dashboard-settings-account');
    Route::post('/dashboard/account/{redirect}', [UserProfileController::class, 'update'])->name('dashboard-settings-redirect');

    Route::get('/transaksi', [UserTransactionController::class, 'index'])->name('my-transaction');
    Route::get('/transaksi/detail_transaksi/{id}', [UserTransactionController::class, 'detail'])->name('transaction-details');

    Route::get('/konfirmasi_pembayaran/{id}', [UserPaymentConfirmationController::class, 'index'])->name('payment-confirmation');
    Route::post('/konfirmasi_pembayaran/{id}/send', [UserPaymentConfirmationController::class, 'send'])->name('send-payment-confirmation');
    Route::get('/konfirmasi_pembayaran/success', [UserPaymentConfirmationController::class, 'success'])->name('payment-confirmation-success');

    // Route::get('/details/{id}', [CartController::class, 'index'])->name('detail');
    Route::post('/details/{id}', [CartController::class, 'add'])->name('detail-add');
    Route::delete('/cart/{id}', [CartController::class, 'delete'])->name('cart-delete');
    // Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart-update');
    Route::get('/cart/update-quantity/{id}/{quantity}', [CartController::class, 'update']);

    Route::post('/checkout', [UserCheckoutController::class, 'process'])->name('checkout');

    Route::get('search', [UserProductController::class, 'search'])->name('search');
});



//======================================== CUSTOMER SERVICE ========================================
Route::prefix('customer_service')->namespace('Cs')->middleware(['auth', 'cs'])->group(function () {
    Route::get('/', [CsDashboardController::class, 'index'])->name('cs-dashboard');
    Route::resource('service', '\App\Http\Controllers\Cs\ServiceController');
    Route::resource('message', '\App\Http\Controllers\Cs\MessageController');
});



//======================================== ADMIN ========================================
Route::prefix('admin')->namespace('Admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin-dashboard');

    Route::get('/products', [ProductController::class, 'index'])->name('admin-product');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin-product-create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin-product-store');
    Route::get('/products/{id}', [ProductController::class, 'details'])->name('admin-product-details');
    Route::post('/products/{id}', [ProductController::class, 'update'])->name('admin-product-update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('admin-product-delete');

    Route::post('/products/gallery/upload', [ProductController::class, 'uploadGallery'])->name('admin-product-gallery-upload');
    Route::get('/products/gallery/delete/{id}', [ProductController::class, 'deleteGallery'])->name('admin-product-gallery-delete');

    Route::get('/productgallery', [ProductGalleryController::class, 'index']);
    Route::get('/productgallery/create', [ProductGalleryController::class, 'create']);
    Route::post('/productgallery/store', [ProductGalleryController::class, 'store']);
    Route::delete('productgallery/{id}', [ProductGalleryController::class, 'destroy'])->name('productGalleryDelete');

    Route::resource('product-category', '\App\Http\Controllers\Admin\ProductCategoryController');

    Route::resource('client', '\App\Http\Controllers\Admin\ClientController');

    // Route::resource('backgroundImage', '\App\Http\Controllers\Admin\BackgroundImageController');
    Route::get('/background_image', [BackgroundImageController::class, 'index']);
    Route::put('/background_image/update', [BackgroundImageController::class, 'update']);

    Route::resource('homecontent', '\App\Http\Controllers\Admin\HomeContentController');

    // Route::resource('profile', '\App\Http\Controllers\Admin\ProfileController');
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::put('/profile/update', [ProfileController::class, 'update']);

    Route::resource('facility', '\App\Http\Controllers\Admin\SupportingFacilitiesController');
    Route::resource('machine', '\App\Http\Controllers\Admin\MachineController');

    Route::resource('facilityandmachine', '\App\Http\Controllers\Admin\FacilityAndMachineController');
    Route::get('/facilityandmachine', [FacilityAndMachineController::class, 'index']);
    Route::put('/facilityandmachine/update', [FacilityAndMachineController::class, 'update']);

    Route::resource('machine', '\App\Http\Controllers\Admin\MachineController');

    Route::resource('user', '\App\Http\Controllers\Admin\UserController');

    Route::get('/first_floating', [FloatingController::class, 'index']);
    Route::put('/first_floating/update', [FloatingController::class, 'update']);

    Route::get('/second_floating', [SecondFloatingController::class, 'index']);
    Route::put('/second_floating/update', [SecondFloatingController::class, 'update']);

    Route::get('/third_floating', [ThirdFloatingController::class, 'index']);
    Route::put('/third_floating/update', [ThirdFloatingController::class, 'update']);

    Route::get('/fourth_floating', [FourthFloatingController::class, 'index']);
    Route::put('/fourth_floating/update', [FourthFloatingController::class, 'update']);

    Route::get('/status-update/{id}', [ChangeController::class, 'status_update']);


    Route::resource('slider', '\App\Http\Controllers\Admin\SliderController');

    Route::resource('blog', '\App\Http\Controllers\Admin\BlogController');

    Route::resource('discountTotalPayment', '\App\Http\Controllers\Admin\DiscountTotalPaymentController');

    Route::resource('coupons', '\App\Http\Controllers\Admin\CouponsController');

    Route::resource('installation', '\App\Http\Controllers\Admin\InstallationController');

    Route::get('/navbar_content', [HeaderController::class, 'index']);
    Route::put('/navbar_content/update', [HeaderController::class, 'update']);

    Route::get('/home_text_content', [HomeTextContentController::class, 'index']);
    Route::put('/home_text_content/update', [HomeTextContentController::class, 'update']);

    Route::get('/modalHome', [ModalHomeController::class, 'index']);
    Route::put('/modalHome/update', [ModalHomeController::class, 'update']);

    Route::get('/sosmed_footer', [SosmedController::class, 'index']);
    Route::put('/sosmed_footer/update', [SosmedController::class, 'update']);

    // Route::get('/paymentConfirmation', [PaymentConfirmationController::class, 'index']);
    // Route::delete('/paymentConfirmation/{id}', [PaymentConfirmationController::class, 'delete']);

    Route::resource('paymentConfirmation', '\App\Http\Controllers\Admin\PaymentConfirmationController');
    // Route::delete('paymentConfirmation/{id}', [ProductGalleryController::class, 'destroy'])->name('paymentConfirmationDelete');

    Route::resource('transaction', '\App\Http\Controllers\Admin\TransactionController');
    Route::get('/transaction/payment/{id}', [TransactionController::class, 'payment'])->name('admin-payment-confirmation');
    Route::get('/paymentConfirmation', [PaymentConfirmationController::class, 'index'])->name('payment-confirmation-admin');
    Route::get('/transaction-status-update/{id}', [ChangeController::class, 'transaction_status']);
});


Auth::routes(['verify' => true]);

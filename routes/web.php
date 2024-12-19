<?php
#---------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏---------------------------”
use App\Http\Controllers\AdminStores;
use App\Http\Controllers\AdminViews;
use App\Http\Controllers\UserStores;
use App\Http\Controllers\UserViews;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelContactSheet;
use App\Http\Controllers\WebsiteViews;
use App\Http\Middleware\VerifyCsrfToken;



Route::get('admin/login', function () {
    return view('auth.login');
});

Route::post('/logoutuser', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logoutuser');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('AdminPanel.dashboard');
    })->name('dashboard');
});



//Admin Panel Routes
Route::controller(AdminViews::class)->group(function () {
    Route::get('admin/master', 'master')->name('master');
    Route::get('admin/submaster', 'submaster')->name('submaster');
    Route::get('admin/createform', 'createform')->name('createform');
    Route::get('admin/pricingdetails', 'pricingdetails')->name('pricingdetails');
    Route::get('admin/allcustomers', 'allcustomers')->name('allcustomers');
    Route::get('admin/customersorders', 'customersorders')->name('customersorders');
    Route::get('admin/orderdetails/{id}', 'orderdetailsadmin')->name('orderdetailsadmin');
    Route::get('admin/referincomelevel', 'referincomelevel')->name('referincomelevel');
    Route::get('admin/referedusers', 'referedusers')->name('referedusers');
    Route::get('admin/getchildren/{refercode}', 'getchildren')->name('getchildren');

});

Route::controller(AdminStores::class)->group(function () {
    Route::post('storemaster', 'storemaster')->name('storemaster');
    Route::post('storesubmaster', 'storesubmaster')->name('storesubmaster');
    Route::get('getsubmasterajax/{selectedCat}', 'getsubmasterajax')->name('getsubmasterajax');
    Route::post('updatesubmaster', 'updatesubmaster')->name('updatesubmaster');
    Route::get('deletemaster/{id}', 'deletemaster')->name('deletemaster');
    Route::post('updatemaster', 'updatemaster')->name('updatemaster');
    Route::post('updatesubmaster', 'updatesubmaster')->name('updatesubmaster');
    Route::get('/filterservice/{selectedtype}', 'filterservice')->name('filterservice');
    Route::post('insertform', 'insertform')->name('insertform');
    Route::get('/getattributes/{servicetype}/{servicename}', 'getattributes')->name('getattributes');
    Route::get('/deleteattribute/{id}', 'deleteattribute')->name('deleteattribute');
    Route::post('updateattributes', 'updateattributes')->name('updateattributes');
    Route::post('insertpricingform', 'insertpricingform')->name('insertpricingform');
    Route::get('/deletepricing/{id}', 'deletepricing')->name('deletepricing');
    Route::post('updatepricingdetails', 'updatepricingdetails')->name('updatepricingdetails');
    Route::get('filtertype/{selectedtype}', 'filtertype')->name('filtertype');
    Route::get('/deleteuser/{id}', 'deleteuser')->name('deleteuser');
    Route::get('/deleteorder/{id}', 'deleteorder')->name('deleteorder');
    Route::post('/updateorderstatus', 'updateorderstatus')->name('updateorderstatus');
    Route::post('/insertincomelevel', 'insertincomelevel')->name('insertincomelevel');
    Route::get('/deleteincome/{id}', 'deleteincome')->name('deleteincome');


});











//User Panel Routes
Route::controller(UserViews::class)->group(function () {
    Route::get('user/login', 'userloginpage')->name('userloginpage');
    Route::get('user/registration', 'registration')->name('registration');
    Route::get('userdashboard', 'userdashboard')->name('userdashboard');
    Route::get('logoutuserpanel', 'logoutuserpanel')->name('logoutuserpanel');
    Route::get('home', 'home')->name('home');
    Route::get('wallet', 'wallet')->name('wallet');
    Route::get('servicedetail/{id}', 'servicedetail')->name('servicedetail');
    Route::get('userprofile', 'userprofile')->name('userprofile');
    Route::get('editprofile', 'editprofile')->name('editprofile');
    Route::get('allservices', 'allservices')->name('allservices');
    Route::get('consultingdetails/{id}', 'consultingdetails')->name('consultingdetails');
    Route::get('serviceformpage/{id}', 'serviceformpage')->name('serviceformpage');
    Route::get('orderpage', 'orderpage')->name('orderpage');
    Route::get('orderdetails/{id}', 'orderdetails')->name('orderdetails');
    Route::get('proceedtopay/{id}', 'proceedtopay')->name('proceedtopay');
    Route::get('allrefers', 'allrefers')->name('allrefers');

    Route::get('refer', 'refer')->name('refer');

});


Route::controller(UserStores::class)->group(function () {
    Route::post('/signup_user_otp', 'signup_user_otp')->name('signup_user_otp');
    Route::post('registeruser', 'registeruser')->name('registeruser');
    Route::post('proceedtootp', 'proceedtootp')->name('proceedtootp');
    Route::post('verifyotp', 'verifyotp')->name('verifyotp');
    Route::post('LoginOtpVerify', 'LoginOtpVerify')->name('LoginOtpVerify');
    Route::post('insertserviceform', 'insertserviceform')->name('insertserviceform');
    Route::post('updateserviceform', 'updateserviceform')->name('updateserviceform');
    Route::post('insertwallet', 'insertwallet')->name('insertwallet');

});

Route::controller(WebsiteViews::class)->group(function () {
    Route::get('/', 'home')->name('homepage');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/features', 'features')->name('features');
    Route::get('/services', 'services')->name('services');
    Route::get('/privacypolicy', 'privacypolicy')->name('privacypolicy');
    Route::get('/termsandconditions', 'termsandconditions')->name('termsandconditions');
    Route::get('/returnandrefund', 'returnandrefund')->name('returnandrefund');

});
// //Excel Routes
// Route::get('/import-excel', [ExcelContactSheet::class, 'index'])->name('import.excel');
// Route::post('/import-excel', [ExcelContactSheet::class, 'import']);


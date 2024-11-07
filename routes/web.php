<?php
#---------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏---------------------------”
use App\Http\Controllers\AdminStores;
use App\Http\Controllers\AdminViews;
use App\Http\Controllers\UserStores;
use App\Http\Controllers\UserViews;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelContactSheet;
use App\Http\Middleware\VerifyCsrfToken;


Route::get('/', function () {
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
    Route::get('master', 'master')->name('master');
    Route::get('submaster', 'submaster')->name('submaster');
    Route::get('createform', 'createform')->name('createform');
    Route::get('pricingdetails', 'pricingdetails')->name('pricingdetails');
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
});















//User Panel Routes
Route::controller(UserViews::class)->group(function () {
    Route::get('user/login', 'userloginpage')->name('userloginpage');
    Route::get('userdashboard', 'userdashboard')->name('userdashboard');
    Route::get('logoutuserpanel', 'logoutuserpanel')->name('logoutuserpanel');
    Route::get('home', 'home')->name('home');
    Route::get('wallet', 'wallet')->name('wallet');
    Route::get('servicedetail', 'servicedetail')->name('servicedetail');

});


Route::controller(UserStores::class)->group(function () {
    Route::post('/signup_user_otp', 'signup_user_otp')->name('signup_user_otp');
    Route::post('verifyotp', 'verifyotp')->name('verifyotp');
    Route::post('insertgroups', 'insertgroups')->name('insertgroups');
    Route::get('deletegroup/{id}', 'deletegroup')->name('deletegroup');
    Route::post('insertcontacts', 'insertcontacts')->name('insertcontacts');
    Route::post('send-message', 'sendmessage')->name('send-message');
    Route::get('deletecampaign/{id}', 'deletecampaign')->name('deletecampaign');
    Route::get('deletecontact/{id}', 'deletecontact')->name('deletecontact');
    Route::post('updatecontact', 'updatecontact')->name('updatecontact');
    Route::post('updategroups', 'updategroups')->name('updategroups');
    Route::post('sendsinglemessage', 'sendsinglemessage')->name('sendsinglemessage');
    Route::post('webhook', 'handleWebhook')->name('handleWebhook');
    Route::get('refreshtemplates', 'refreshtemplates')->name('refreshtemplates');


});


// //Excel Routes
// Route::get('/import-excel', [ExcelContactSheet::class, 'index'])->name('import.excel');
// Route::post('/import-excel', [ExcelContactSheet::class, 'import']);


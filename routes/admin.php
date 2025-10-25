<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\SaleController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\AdminProfileController;
use App\Http\Controllers\admin\ChangePasswordController;



Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'adminMiddleware', 'verified']], function(){
    
    // Report Generation
    Route::get('/generate-report', [App\Http\Controllers\ReportController::class, 'generateReport'])->name('generateReport');

    Route::group(['prefix'=>'category'],function(){
        Route::get('create/view',[CategoryController::class,'categoryCreateView'])->name('categoryCreateView');
        Route::post('create/button',[CategoryController::class,'categoryCreateButton'])->name('categoryCreateButton');
        Route::get('delete/{id}',[CategoryController::class,'categoryDeleteButton'])->name('categoryDeleteButton');
    });

    Route::group(['prefix'=>'product'],function(){
        Route::get('list/view/{action?}',[ProductController::class,'productListView'])->name('productListView');
        Route::get('create/view',[ProductController::class,'productCreateView'])->name('productCreateView');
        Route::post('create/data',[ProductController::class,'productCreateData'])->name('productCreateData');
        Route::get('delete/{id}',[ProductController::class,'productDelete'])->name('productDelete');
        Route::get('edit/view/{id}',[ProductController::class,'productEditView'])->name('productEditView');
        Route::post('edit',[ProductController::class,'productEdit'])->name('productEdit');
    });

   
    Route::group(['prefix'=>'store'],function(){
        Route::post('open',[SaleController::class,'openStore'])->name('openStore');
        Route::post('close',[SaleController::class,'closeStore'])->name('closeStore');  
    });
    
    Route::group(['prefix'=>'usermanagement'],function(){
        Route::get('list/view',[UserController::class,'userListView'])->name('userListView');
        Route::get('create/view',[UserController::class,'userCreateView'])->name('userCreateView');
        Route::get('detail/view/{id}',[UserController::class,'userDetailView'])->name('userDetailView');
        Route::post('create',[UserController::class,'userCreate'])->name('userCreate');
        Route::get('delete/{id}',[UserController::class,'deleteAccount'])->name('deleteAccount');
        Route::get('edit/view/{id}',[UserController::class,'userEditView'])->name('userEditView');
        Route::post('edit',[UserController::class,'userEdit'])->name('userEdit');
    });

    
    Route::group(['prefix'=>'sale'],function(){
        Route::get('management/view',[SaleController::class,'saleManagementView'])->name('saleManagementView');
    });
    
});

Route::group(['prefix'=>'user', 'middleware'=>['auth', 'verified']], function(){
     Route::group(['prefix'=>'profile'],function(){
        Route::get('view',[AdminProfileController::class,'adminProfile'])->name('adminProfile');
        Route::get('edit/view',[AdminProfileController::class,'profileEditView'])->name('profileEditView');
        Route::post('edit',[AdminProfileController::class,'profileEdit'])->name('profileEdit');
        Route::get('delete',[AdminProfileController::class,'deleteProfile'])->name('deleteProfile');
        Route::get('changepassword/view',[AdminProfileController::class,'changePasswordView'])->name('changePasswordView');
        Route::post('changepassword',[AdminProfileController::class,'changePassword'])->name('changePassword');
    });

    Route::group(['prefix'=>'cart'],function(){
         Route::get('view',[SaleController::class,'cartView'])->name('cartView');
         Route::post('add',[SaleController::class,'addCart'])->name('addCart');
         Route::get('delete/{id}',[SaleController::class,'cartDelete'])->name('cartDelete');

    });

    Route::group(['prefix'=>'sale'],function(){

        Route::get('view/{action?}',[SaleController::class,'saleProductView'])->name('saleProductView');
        Route::get('list/view',[SaleController::class,'saleListView'])->name('saleListView');
        Route::post('/sale/store', [SaleController::class, 'store'])->name('api.sale.store');

    });

});



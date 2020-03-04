<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//
//use Illuminate\Support\Facades\Auth;
//use Spatie\Permission\Models\Role;
//
//Route::get('user', function(){
//    Auth::user()->syncPermissions('');
//    $d = Role::findByName('admin');
//    $d->syncPermissions('update_role');
//    return array([
//        Auth::user()->getAllPermissions(),
//        Auth::user()->roles,
//    ]);
//});
////
//Route::namespace('role')->group(function(){
////    Route::prefix('roles')->group(function(){
////        Route::get('', 'RoleController@getRoles');
////        Route::get('{role}', 'RoleController@getRole');
////        Route::post('', 'RoleController@postRole');
////        Route::patch('', 'RoleController@patchRole');
////        Route::delete('', 'RoleController@deleteRole');
////    });
////
//    Route::prefix('permissions')
//        ->group(function(){
//        Route::get('', 'PermissionController@getPermissions')->middleware('permission:update_role');
////        Route::get('{permission}', 'PermissionController@getPermission')->middleware('permission:read_permission');
////        Route::post('', 'PermissionController@postPermission')->middleware('permission:create permission');
//        Route::patch('', 'PermissionController@patchPermission')->middleware('permission:update_role');
////        Route::delete('', 'PermissionController@deletePermission')->middleware('permission:delete permission');
//    });
//});


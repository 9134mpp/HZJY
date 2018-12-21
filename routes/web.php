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

Route::get('/', function () {
    return view('welcome');
});



//管理员模块

//添加管理员列表
Route::get('user/create','Admin\UserController@create')->name('user.create');
//保存管理员
Route::post('user/store','Admin\UserController@store')->name('user.store');
//查看管理员
Route::get('user','Admin\UserController@index')->name('user.index');
//修改管理员列表
Route::get('user/edit/{user}','Admin\UserController@edit')->name('user.edit');
//保存修改
Route::post('user/update/{user}','Admin\UserController@update')->name('user.update');
//删除管理员
Route::get('user/destroy/{user}','Admin\UserController@destroy')->name('user.destroy');
//
Route::get('user/show/{user}','Admin\UserController@show')->name('user.show');
//验证登陆
Route::post('user/login','Admin\UserController@login')->name('user.login');
//注销登陆
Route::get('logout','Admin\UserController@logout')->name('logout');

//
Route::get('login','Admin\UserController@show')->name('login');

//家庭服务分类管理模块

//添加家庭服务分类列表
Route::get('fsc/create','Admin\FamilyServiceCategoryController@create')->name('fsc.create');
//保存家庭服务分类
Route::post('fsc/store','Admin\FamilyServiceCategoryController@store')->name('fsc.store');
//查看家庭服务分类
Route::get('fsc/index','Admin\FamilyServiceCategoryController@index')->name('fsc.index');
//修改家庭服务分类
Route::get('fsc/edit/{fsc}','Admin\FamilyServiceCategoryController@edit')->name('fsc.edit');
//保存家庭服务分类
Route::post('fsc/update/{fsc}','Admin\FamilyServiceCategoryController@update')->name('fsc.update');
//删除家庭服务分类
Route::get('fsc/destroy/{fsc}','Admin\FamilyServiceCategoryController@destroy')->name('fsc.destroy');

//家庭服务管理模块

Route::get('fs/create','Admin\FamilyServiceController@create')->name('fs.create');
//保存家庭服务
Route::post('fs/store','Admin\FamilyServiceController@store')->name('fs.store');
//查看家庭服务
Route::get('fs/index','Admin\FamilyServiceController@index')->name('fs.index');
//修改家庭服务
Route::get('fs/edit/{fs}','Admin\FamilyServiceController@edit')->name('fs.edit');
//保存家庭服务
Route::post('fs/update/{fs}','Admin\FamilyServiceController@update')->name('fs.update');
//删除家庭服务
Route::get('fs/destroy/{fs}','Admin\FamilyServiceController@destroy')->name('fs.destroy');
//查看家庭服务详情
Route::get('fs/show/{fs}','Admin\FamilyServiceController@show')->name('fs.show');

//详情模块

//添加
Route::post('fss/store','Admin\FamilyServiceShowController@store')->name('fss.store');
//查看
Route::get('fss/index','Admin\FamilyServiceShowController@index')->name('fss.index');


//巡讲与报道分类模块

//添加分类表单
Route::get('prc/create','Admin\PatrolReportedCategoryController@create')->name('prc.create');
//保存分类
Route::post('prc/store','Admin\PatrolReportedCategoryController@store')->name('prc.store');
//查看分类
Route::get('prc/index','Admin\PatrolReportedCategoryController@index')->name('prc.index');
//修改分类
Route::get('prc/edit/{prc}','Admin\PatrolReportedCategoryController@edit')->name('prc.edit');
//保存分类
Route::post('prc/update/{prc}','Admin\PatrolReportedCategoryController@update')->name('prc.update');
//删除分类
Route::get('prc/destroy/{prc}','Admin\PatrolReportedCategoryController@destroy')->name('prc.destroy');

//巡讲与报道模块

//添加分类表单
Route::get('pr/create','Admin\PatrolReportedController@create')->name('pr.create');
//保存分类
Route::post('pr/store','Admin\PatrolReportedController@store')->name('pr.store');
//查看分类
Route::get('pr/index','Admin\PatrolReportedController@index')->name('pr.index');
//修改分类
Route::get('pr/edit/{pr}','Admin\PatrolReportedController@edit')->name('pr.edit');
//保存分类
Route::post('pr/update/{pr}','Admin\PatrolReportedController@update')->name('pr.update');
//删除分类
Route::get('pr/destroy/{pr}','Admin\PatrolReportedController@destroy')->name('pr.destroy');

//学校服务分类管理

//添加学校服务分类表单
Route::get('ssc/create','Admin\SchoolServiceCategoryController@create')->name('ssc.create');
//保存学校服务分类
Route::post('ssc/store','Admin\SchoolServiceCategoryController@store')->name('ssc.store');
//查看学校服务分类
Route::get('ssc/index','Admin\SchoolServiceCategoryController@index')->name('ssc.index');
//修改学校服务分类
Route::get('ssc/edit/{ssc}','Admin\SchoolServiceCategoryController@edit')->name('ssc.edit');
//保存学校服务分类
Route::post('ssc/update/{ssc}','Admin\SchoolServiceCategoryController@update')->name('ssc.update');
//删除学校服务分类
Route::get('ssc/destroy/{ssc}','Admin\SchoolServiceCategoryController@destroy')->name('ssc.destroy');

//学校服务管理

//添加学校服务分类表单
Route::get('ss/create','Admin\SchoolServiceController@create')->name('ss.create');
//保存学校服务分类
Route::post('ss/store','Admin\SchoolServiceController@store')->name('ss.store');
//查看学校服务分类
Route::get('ss/index','Admin\SchoolServiceController@index')->name('ss.index');
//修改学校服务分类
Route::get('ss/edit/{ss}','Admin\SchoolServiceController@edit')->name('ss.edit');
//保存学校服务分类
Route::post('ss/update/{ss}','Admin\SchoolServiceController@update')->name('ss.update');
//删除学校服务分类
Route::get('ss/destroy/{ss}','Admin\SchoolServiceController@destroy')->name('ss.destroy');

//关于我模块

//添加关于我分类表单
Route::get('imc/create','Admin\IsMeCategoryController@create')->name('imc.create');
//保存关于我分类
Route::post('imc/store','Admin\IsMeCategoryController@store')->name('imc.store');
//查看关于我分类
Route::get('imc/index','Admin\IsMeCategoryController@index')->name('imc.index');
//修改关于我分类
Route::get('imc/edit/{imc}','Admin\IsMeCategoryController@edit')->name('imc.edit');
//保存关于我分类
Route::post('imc/update/{imc}','Admin\IsMeCategoryController@update')->name('imc.update');
//删除关于我分类
Route::get('imc/destroy/{imc}','Admin\IsMeCategoryController@destroy')->name('imc.destroy');


//添加关于我表单
Route::get('im/create','Admin\IsMeController@create')->name('im.create');
//保存关于我
Route::post('im/store','Admin\IsMeController@store')->name('im.store');
//查看关于我
Route::get('im/index','Admin\IsMeController@index')->name('im.index');
//修改关于我
Route::get('im/edit/{im}','Admin\IsMeController@edit')->name('im.edit');
//保存关于我
Route::post('im/update/{im}','Admin\IsMeController@update')->name('im.update');
//删除关于我
Route::get('im/destroy/{im}','Admin\IsMeController@destroy')->name('im.destroy');



//文件上传
Route::post('web/create','Admin\WebUpLoaderController@create')->name('web.create');
Route::post('web/video','Admin\WebUpLoaderController@video')->name('web.video');


//公开课管理

//添加关于我表单
Route::get('pc/create','Admin\PublicClassController@create')->name('pc.create');
//保存关于我
Route::post('pc/store','Admin\PublicClassController@store')->name('pc.store');
//查看关于我
Route::get('pc/index','Admin\PublicClassController@index')->name('pc.index');
//修改关于我
Route::get('pc/edit/{pc}','Admin\PublicClassController@edit')->name('pc.edit');
//保存关于我
Route::post('pc/update/{pc}','Admin\PublicClassController@update')->name('pc.update');
//删除关于我
Route::get('pc/destroy/{pc}','Admin\PublicClassController@destroy')->name('pc.destroy');

//导航栏模块

//添加菜单
Route::get('nav/create','Admin\NavController@create')->name('nav.create');
//保存菜单
Route::post('nav/store','Admin\NavController@store')->name('nav.store');
//查看菜单
Route::get('nav/index','Admin\NavController@index')->name('nav.index');
//修改菜单
Route::get('nav/edit/{nav}','Admin\NavController@edit')->name('nav.edit');
//保存菜单
Route::post('nav/update/{nav}','Admin\NavController@update')->name('nav.update');
//删除菜单
Route::get('nav/destroy/{nav}','Admin\NavController@destroy')->name('nav.destroy');


//权限模块

//添加权限
Route::get('permission/create','Admin\PermissionController@create')->name('permission.create');
//保存添加
Route::post('permission/store','Admin\PermissionController@store')->name('permission.store');
//查看权限
Route::get('permission/index','Admin\PermissionController@index')->name('permission.index');
//修改权限
Route::get('permission/edit/{permission}','Admin\PermissionController@edit')->name('permission.edit');
//保存修改
Route::post('permission/update/{permission}','Admin\PermissionController@update')->name('permission.update');
//删除权限
Route::get('permission/destroy/{permission}','Admin\PermissionController@destroy')->name('permission.destroy');


//角色模块

//添加角色
Route::get('role/create','Admin\RoleController@create')->name('role.create');
//保存添加
Route::post('role/store','Admin\RoleController@store')->name('role.store');
//查看权限
Route::get('role/index','Admin\RoleController@index')->name('role.index');
//修改权限
Route::get('role/edit/{role}','Admin\RoleController@edit')->name('role.edit');
//保存修改
Route::post('role/update/{role}','Admin\RoleController@update')->name('role.update');
//删除权限
Route::get('role/destroy/{role}','Admin\RoleController@destroy')->name('role.destroy');

//添加导航
Route::get('nav/create','Admin\NavController@create')->name('nav.create');
Route::post('nav/save','Admin\NavController@save')->name('nav.save');
//查看
Route::get('nav/index','Admin\NavController@index')->name('nav.index');
//修改导航
Route::get('nav/edit/{nav}','Admin\NavController@edit')->name('nav.edit');
Route::post('nav/update/{nav}','Admin\NavController@update')->name('nav.update');
//删除
Route::get('nav/delete/{nav}','Admin\NavController@delete')->name('nav.delete');


//API
//家庭服务
Route::get('Api/fs','Admin\ApiController@FamilyService')->name('api.fs');
//学校服务
Route::get('Api/ss','Admin\ApiController@SchoolService')->name('api.ss');
//巡讲与报道
Route::get('Api/pr','Admin\ApiController@PatrolReported')->name('api.pr');
//关于我们
Route::get('Api/im','Admin\ApiController@Isme')->name('api.im');
//公开课
Route::get('Api/pc','Admin\ApiController@PublicClass')->name('api.pc');

//加入我们管理

//添加加入我们
Route::get('AddOur/create','Admin\AddOurController@create')->name('AddOur.create');

//保存加入我们
Route::post('AddOur/store','Admin\AddOurController@store')->name('AddOur.store');

//查看加入我们
Route::get('AddOur/index','Admin\AddOurController@index')->name('AddOur.index');

//修改加入我们
Route::get('AddOur/edit/{addOur}','Admin\AddOurController@edit')->name('AddOur.edit');
//保存修改
Route::post('AddOur/update/{addOur}','Admin\AddOurController@update')->name('AddOur.update');
//删除
Route::get('AddOur/destroy/{addOur}','Admin\AddOurController@destroy')->name('AddOur.destroy');




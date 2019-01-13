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

Route::get('/laravel', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/admin', 'HomeController@index');
//Route::get('/home', 'HomeController@index');

/**
 *用户相关
 */

//用户列表
Route::get('/user/lists', 'User\UserController@userList');

//用户创建保存
Route::get('/user/add','User\UserController@showAddUserForm');
Route::post('/user/store','User\UserController@storeNewUser');

//用户编辑更新
Route::get('/user/edit/{user_id}','User\UserController@showUpdateUserForm');
Route::post('/user/update/{user_id}','User\UserController@updateUser');

//重设密码
Route::get('/user/password/reset/{user_id}','User\UserController@showResetPasswordForm');
Route::post('/user/password/store/{user_id}','User\UserController@resetUserPassword');

//删除用户
Route::post('/user/delete/{user_id}','User\UserController@deleteUser');

//用户个人信息管理
Route::get('/user/profile/{user_id}','User\UserController@userProfile');
Route::get('/user/editProfile/{user_id}','User\UserController@showUpdateUserProfile');
Route::post('/user/updateProfile/{user_id}','User\UserController@saveUserProfile');

//修改个人密码
Route::get('/user/resetSelfPasswordForm/{user_id}','User\UserController@showResetSelfPasswordForm');
Route::post('/user/selfPassword/store/{user_id}','User\UserController@resetSelfPassword');



/**
 *权限相关
 */

//权限列表
Route::get('/permission/lists', 'Rbac\PermissionController@permissionList');

//权限创建保存
Route::get('/permission/add','Rbac\PermissionController@showAddPermissionForm');
Route::post('/permission/store','Rbac\PermissionController@storeNewPermission');

//权限编辑更新
Route::get('/permission/edit/{permission_id}','Rbac\PermissionController@showUpdatePermissionForm');
Route::post('/permission/update/{permission_id}','Rbac\PermissionController@updatePermission');

//删除权限
Route::post('/permission/delete/{permission_id}','Rbac\PermissionController@deletePermission');

Route::get('/permission/test', 'Rbac\PermissionController@check');


/**
 *角色相关
 */

//角色列表
Route::get('/role/lists', 'Rbac\RoleController@roleList');

//角色创建保存
Route::get('/role/add','Rbac\RoleController@showAddRoleForm');
Route::post('/role/store','Rbac\RoleController@storeNewRole');

//角色编辑更新
Route::get('/role/edit/{role_id}','Rbac\RoleController@showUpdateRoleForm');
Route::post('/role/update/{role_id}','Rbac\RoleController@updateRole');

//删除角色
Route::post('/role/delete/{role_id}','Rbac\RoleController@deleteRole');


/**
 *角色权限相关
 */

//角色权限设置
Route::get('/role/permission/edit/{role_id}','Rbac\RolePermissionController@showSetRolePermissionForm');
Route::post('/role/permission/store/{role_id}','Rbac\RolePermissionController@setRolePermission');


/**
 *用户角色相关
 */

//用户角色设置
Route::get('/user/role/edit/{user_id}','Rbac\UserRoleController@showSetUserRoleForm');
Route::post('/user/role/store/{user_id}','Rbac\UserRoleController@setUserRole');


//日志
Route::get('/log/lists', 'Log\LogController@lgoList');

/**
 *工作人员相关
 */

//工作人员列表
Route::get('/employee/lists', 'Employee\EmployeeController@employeeList');


//工作人员详情
Route::get('/employee/info/{employee_id}','Employee\EmployeeController@showEmployeeForm');

//工作人员创建保存
Route::get('/employee/add','Employee\EmployeeController@showAddEmployeeForm');
Route::post('/employee/store','Employee\EmployeeController@storeNewEmployee');

//工作人员编辑更新
Route::get('/employee/edit/{employee_id}','Employee\EmployeeController@showUpdateEmployeeForm');
Route::post('/employee/update/{employee_id}','Employee\EmployeeController@updateEmployee');

//删除工作人员
Route::post('/employee/delete/{employee_id}','Employee\EmployeeController@deleteEmployee');


/**
 *Banner相关
 */

//Banner列表
Route::get('/banner/lists', 'Banner\BannerController@bannerList');


//Banner详情
Route::get('/banner/info/{banner_id}','Banner\BannerController@showBannerForm');

//Banner创建保存
Route::get('/banner/add','Banner\BannerController@showAddBannerForm');
Route::post('/banner/store','Banner\BannerController@storeNewBanner');

//Banner编辑更新
Route::get('/banner/edit/{banner_id}','Banner\BannerController@showUpdateBannerForm');
Route::post('/banner/update/{banner_id}','Banner\BannerController@updateBanner');

//删除Banner
Route::post('/banner/delete/{banner_id}','Banner\BannerController@deleteBanner');



/**
 *专长相关
 */

//专长列表
Route::get('/expertise/lists', 'Expertise\ExpertiseController@expertiseList');

//专长详情
Route::get('/expertise/info/{expertise_id}','Expertise\ExpertiseController@showExpertiseForm');

//专长创建保存
Route::get('/expertise/add','Expertise\ExpertiseController@showAddExpertiseForm');
Route::post('/expertise/store','Expertise\ExpertiseController@storeNewExpertise');

//专长编辑更新
Route::get('/expertise/edit/{expertise_id}','Expertise\ExpertiseController@showUpdateExpertiseForm');
Route::post('/expertise/update/{expertise_id}','Expertise\ExpertiseController@updateExpertise');

//删除专长
Route::post('/expertise/delete/{expertise_id}','Expertise\ExpertiseController@deleteExpertise');


/**
 *Type相关
 */

//Type列表
Route::get('/type/lists', 'Type\TypeController@typeList');

//Type详情
Route::get('/type/info/{type_id}','Type\TypeController@showTypeForm');

//Type创建保存
Route::get('/type/add','Type\TypeController@showAddTypeForm');
Route::post('/type/store','Type\TypeController@storeNewType');

//Type编辑更新
Route::get('/type/edit/{type_id}','Type\TypeController@showUpdateTypeForm');
Route::post('/type/update/{type_id}','Type\TypeController@updateType');

//删除Type
Route::post('/type/delete/{type_id}','Type\TypeController@deleteType');



/**
 *Provence相关
 */

//Provence列表
Route::get('/provence/lists', 'Provence\ProvenceController@provenceList');

//Provence详情
Route::get('/provence/info/{provence_id}','Provence\ProvenceController@showProvenceForm');

//Provence创建保存
Route::get('/provence/add','Provence\ProvenceController@showAddProvenceForm');
Route::post('/provence/store','Provence\ProvenceController@storeNewProvence');

//Provence编辑更新
Route::get('/provence/edit/{provence_id}','Provence\ProvenceController@showUpdateProvenceForm');
Route::post('/provence/update/{provence_id}','Provence\ProvenceController@updateProvence');

//删除Provence
Route::post('/provence/delete/{provence_id}','Provence\ProvenceController@deleteProvence');


/**
 *Job相关
 */

//Job列表
Route::get('/job/lists', 'Job\JobController@jobList');

//Job详情
Route::get('/job/info/{job_id}','Job\JobController@showJobForm');

//Job创建保存
Route::get('/job/add','Job\JobController@showAddJobForm');
Route::post('/job/store','Job\JobController@storeNewJob');

//Job编辑更新
Route::get('/job/edit/{job_id}','Job\JobController@showUpdateJobForm');
Route::post('/job/update/{job_id}','Job\JobController@updateJob');

//删除Job
Route::post('/job/delete/{job_id}','Job\JobController@deleteJob');


/**
 *News相关
 */

//News列表
Route::get('/news/lists', 'News\NewsController@newsList');

//News详情
Route::get('/news/info/{news_id}','News\NewsController@showNewsForm');

//News创建保存
Route::get('/news/add','News\NewsController@showAddNewsForm');
Route::post('/news/store','News\NewsController@storeNewNews');

//News编辑更新
Route::get('/news/edit/{news_id}','News\NewsController@showUpdateNewsForm');
Route::post('/news/update/{news_id}','News\NewsController@updateNews');

//删除News
Route::post('/news/delete/{news_id}','News\NewsController@deleteNews');


/**
 *Award相关
 */

//Award列表
Route::get('/award/lists', 'Award\AwardController@awardList');

//Award详情
Route::get('/award/info/{award_id}','Award\AwardController@showAwardForm');

//Award创建保存
Route::get('/award/add','Award\AwardController@showAddAwardForm');
Route::post('/award/store','Award\AwardController@storeNewAward');

//Award编辑更新
Route::get('/award/edit/{award_id}','Award\AwardController@showUpdateAwardForm');
Route::post('/award/update/{award_id}','Award\AwardController@updateAward');

//删除Award
Route::post('/award/delete/{award_id}','Award\AwardController@deleteAward');


/**
 *Project相关
 */

//Project列表
Route::get('/project/lists', 'Project\ProjectController@projectList');

//Project详情
Route::get('/project/info/{project_id}','Project\ProjectController@showProjectForm');

//Project创建保存
Route::get('/project/add','Project\ProjectController@showAddProjectForm');
Route::post('/project/store','Project\ProjectController@storeNewProject');

//Project编辑更新
Route::get('/project/edit/{project_id}','Project\ProjectController@showUpdateProjectForm');
Route::post('/project/update/{project_id}','Project\ProjectController@updateProject');

//删除Project
Route::post('/project/delete/{project_id}','Project\ProjectController@deleteProject');


/**
 *API
 */
Route::get('/api/v1/test/{station_num}', 'Api\TestController@stationRTHistory');



/**
 *前台
 */


//首页
Route::get('/test', function () {
    return view('front/home');
});
Route::get('/test/newsDetail', function () {
    return view('front/newsDetail');
});
Route::get('/test/awardDetail', function () {
    return view('front/awardDetail');
});
Route::get('/test/project', function () {
    return view('front/project');
});
Route::get('/test/projectDetail', function () {
    return view('front/projectDetail');
});
Route::get('/test/employee', function () {
    return view('front/employee');
});
Route::get('/test/job', function () {
    return view('front/job');
});
Route::get('/test/about', function () {
    return view('front/about');
});


//首页
Route::get('/preview', function () {
    return view('front/coding');
});

//首页
Route::get('/', 'Front\HomeController@homeData');

//新闻详情
Route::get('/news/detail/{news_id}', 'Front\HomeController@newsInfo');

//荣誉详情
Route::get('/award/detail/{award_id}', 'Front\HomeController@awardInfo');

//项目列表
Route::get('/projects', 'Front\ProjectController@projectData');

//类型列表
Route::get('/projects/type', 'Front\ProjectController@typeData');

//规划设计项目列表
Route::get('/projects/{flag}', 'Front\ProjectController@projectData');

//建筑设计项目列表
Route::get('/projects/{flag}', 'Front\ProjectController@projectData');

//项目详情
Route::get('/project/detail/{project_id}', 'Front\ProjectController@projectInfo');

//专长
Route::get('/expertise', 'Front\ExpertiseController@expertiseData');

//人员列表
Route::get('/employees', 'Front\EmployeeController@employeeData');

//招聘列表
Route::get('/jobs', 'Front\JobController@jobData');

//关于
Route::get('/about', function () {
    return view('front/online/about');
});

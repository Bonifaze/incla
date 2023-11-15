<?php


Route::get('/rbac/create-role', 'RolesController@create')->name('rbac.create-role');

Route::post('/rbac/store-role', 'RolesController@store')->name('rbac.store-role');

Route::get('/rbac/edit-role/{id}', 'RolesController@edit')->name('rbac.edit-role');

Route::patch('/rbac/edit-role/{id}', 'RolesController@update')->name('rbac.update-role');

Route::get('/rbac/list-roles', 'RolesController@index')->name('rbac.list-roles');

Route::get('/rbac/show-role/{id}', 'RolesController@show')->name('rbac.show-role');

Route::patch('/rbac/delete-role', 'RolesController@delete')->name('rbac.delete-role');



Route::get('/rbac/create-perm', 'PermissionsController@create')->name('rbac.create-perm');

Route::post('/rbac/store-perm', 'PermissionsController@store')->name('rbac.store-perm');

Route::get('/rbac/edit-perm/{id}', 'PermissionsController@edit')->name('rbac.edit-perm');

Route::patch('/rbac/edit-perm/{id}', 'PermissionsController@update')->name('rbac.update-perm');

Route::get('/rbac/list-perms', 'PermissionsController@index')->name('rbac.list-perms');

Route::patch('/rbac/delete-perm', 'PermissionsController@delete')->name('rbac.delete-perm');



Route::post('/rbac/assign-perm', 'RolesController@assignPermission')->name('rbac.assign-perm');

Route::post('/rbac/remove-perm', 'RolesController@removePermission')->name('rbac.remove-perm');


Route::post('/rbac/assign-role', 'UsersController@assignRole')->name('rbac.assign-role');

Route::post('/rbac/remove-role', 'UsersController@removeRole')->name('rbac.remove-role');


Route::post('/rbac/assign-role', 'StaffController@assignRole')->name('rbac.assign-role');

Route::post('/rbac/remove-role', 'StaffController@removeRole')->name('rbac.remove-role');


Route::get('/rbac/refresh-student-password', 'PermissionsController@refreshStudentPassword')->name('rbac.refreshstudentpassword');

Route::post('/rbac/reset-student-password', 'PermissionsController@resetStudentPassword')->name('rbac.resetstudentpassword');


Route::get('/rbac/audit', 'PermissionsController@audit')->name('rbac.audit');

Route::post('/rbac/audit_list', 'PermissionsController@find')->name('rbac.audit-find');
Route::post('/rbac/audit_lista', 'PermissionsController@list')->name('rbac.audit-list');

Route::post('/rbac/audits', 'PermissionsController@findDate')->name('rbac.audit-find-date');

Route::get('/rbac/show-staff/{id}', 'RolesController@showstaff')->name('rbac.show-staff');

Route::get('/rbac/auditviewall', 'PermissionsController@auditviewall')->name('rbac.auditviewall');

Route::get('/rbac/auditviewallremita', 'PermissionsController@auditviewallremita')->name('rbac.auditviewallremita');

Route::get('/rbac/auditviewallevent', 'PermissionsController@auditviewallevent')->name('rbac.auditviewallevent');

Route::get('/rbac/auditviewallassigned', 'PermissionsController@auditviewallassigned')->name('rbac.auditviewallassigned');

Route::get('/rbac/otp', 'PermissionsController@otp')->name('rbac.otp');

Route::post('/rbac/otp/verify', 'PermissionsController@otplogin')->name('rbac.otp.verify');

Route::get('/rbac/home', 'PermissionsController@home')->name('rbac.home');

Route::get('/rbac/auditA', 'PermissionsController@auditA')->name('rbac.auditA');

Route::delete('/Audit/{audit}', 'PermissionsController@destroy')->name('audit.destroy');

Route::delete('/AuditR/{audit}', 'PermissionsController@destroyR')->name('audit.destroyR');

Route::get('/rbac/otpreset', 'PermissionsController@otpreset')->name('rbac.forgotpasswordSetNew');

Route::post('/rbac/otpresetpin', 'PermissionsController@otpresetpin')->name('rbac.otpresetpin');

//FOR OTP
// Route::get('/rbac/otp', function () {
//     return view('rbac.otp');
// });

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

//--------------Dashboard----------------//

Route::get('/dashboard',['as'=>'dashboard.index','uses'=>'DashboardController@Index']);

//--------------Employee---------------//

Route::get('/', function () {
    return redirect('/schedule');
});
Route::get('/employee', ['as' => 'employee.page', function () {
	return redirect('employee/1');
}]);

Route::get('/employee/{page}',['as'=>'employee.index','uses'=>'EmployeeController@Index']);
Route::post('/employee/edit',['as'=>'employee.edit','uses'=>'EmployeeController@Edit']);
Route::post('/employee/getdata',['as'=>'employee.getdata','uses'=>'EmployeeController@GetData']);
Route::post('/employee/insert',['as'=>'employee.insert','uses'=>'EmployeeController@Insert']);
Route::post('/employee/delete',['as'=>'employee.delete','uses'=>'EmployeeController@Destroy']);
Route::get('/check-DB',function(){
	if(DB::connection()->getDatabaseName()){
		return "Yes! successfully connected to the DB: " . DB::connection()->getDatabaseName();
	}else{
 		return 'Connection False !!';
 	}
});

//--------------Download---------------//
Route::get('/file', ['as' => 'Download.page','uses'=>function () {
	return redirect('/file/1');
}]);


Route::get('/file/{page}',['as'=>'file.index','uses'=>'FileController@index']);
Route::post('file', 'FileController@storeFile')->name('upload.file');
Route::get('/download/{filename}', 'FileController@download');

Route::delete('file', 'FileController@delete')->name('delete');



//--------------schedule---------------//
// Route::get('/schedule', ['as' => 'schedule.page','uses'=>function () {
// 	return redirect('/schedule');
// }]);

Route::get('/schedule',['as'=>'schedule.index','uses'=>'ScheduleController@Index']);
Route::post('/schedule/insert',['as'=>'schedule.insert','uses'=>'ScheduleController@insert']);

Route::get('/schedule/getnum',['as'=>'schedule.getnum','uses'=>'ScheduleController@getnum']);


//--------------Salary---------------//


Route::get('/salary', ['as' => 'salary.page','uses'=>function () {
	return redirect('/salary/' . date('Y'));
}]);

Route::get('/salary/{year}', [
    'as' => 'salary.index', 'uses' => 'SalaryController@Index'
]);

Route::post('/salary/insert',['as'=>'salary.insert','uses'=>'SalaryController@Insert']);
Route::post('/salary/delete',['as'=>'salary.delete','uses'=>'SalaryController@Destroy']);
Route::post('/salary/edit',['as'=>'salary.edit','uses'=>'SalaryController@Edit']);







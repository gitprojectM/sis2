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

//Route::get('/', function () { return view('welcome');});

Route::get('/',['as'=>'/','uses'=>'LoginController@getLogin']);
Route::post('/login',['as'=>'login','uses'=>'LoginController@postLogin']);
Route::get('/noPermission',function()
{
	return view('permission.noPermission');
});



Route::group(['middleware'=>['authen']],function(){
	Route::post('logout',['as'=>'logout','uses'=>'LoginController@getLogout']);
	Route::get('/dashboard',['as'=>'dashboard','uses'=>'DashboardController@dashboard']);
	Route::get('/changepassword','UsersController@changepassword2');
	Route::post('/changePassword','UsersController@changePassword')->name('changePassword');
});

 Route::group(['middleware'=>['authen','roles'],'roles'=>['admin']],function(){
Route::resource('users','UsersController');
Route::get('/users/{id}/studaccount','UsersController@edit2');
Route::resource('/students','StudentsController');
Route::resource('/schoolyears','SchoolYearsController');
Route::resource('/teachers','TeachersController');
Route::resource('/sections','SectionsController');
Route::resource('/registers','RegisterController');
Route::resource('/positions','PositionsController');
Route::resource('/clums','ClumsController');
Route::post('/positions','PositionsController@store');

Route::resource('/subjects','SubjectsController');
Route::resource('/teacherloads','TeacherloadsController');
Route::resource('/tracks','TracksController');
Route::resource('/sectionnames','Section_namesController');
Route::resource('/curriculums','CurriculumsController');
Route::resource('/curriculumsubjects','CurriculumSubjectsController');
Route::resource('/syperiods','SyperiodsController');
Route::resource('/sems','SemsController');
Route::resource('/grades','GradesController');
Route::resource('/periods','PeriodsController');
Route::resource('/speriods','SperiodsController');
Route::resource('/majors','MajorsController');
//Route::put('deactivate1/{id}','SemsController@update');
Route::get('/dashb','DashboardController@dash');
Route::get('/show_subject/{id}','GradesController@showsubject');
Route::get('/show__subject/{id}','GradesController@sshowsubject');
Route::get('/show___subject/{id}','GradesController@individualshowsubject');
Route::get('/show___subject2/{id}','GradesController@individualshowsubject2');
Route::post('/grades','GradesController@store');
Route::post('/grades2','GradesController@sstore');
Route::get('/gradesheet/{id}','TeachersController@gradesheet');
Route::get('/gradesheet2/{id}','TeachersController@gradesheet2');
Route::get('/record/{id}','TeachersController@record');
Route::get('/record2/{id}','TeachersController@record2');
//Route::post('grades2','GradesController@store2');

Route::get('set','SchoolYearsController@get_sy');
Route::get('set_curriculum','ClumsController@get_clum');
Route::get('/samples', 'SamplesController@index');
Route::get('/get_yearlevel', 'SamplesController@getyearlevels');
Route::get('/get_section', 'SamplesController@getsections');
Route::get('/get_track', 'SamplesController@gettrack');
Route::get('/get_sembytrack', 'SamplesController@getsembytrack');
Route::get('/get_sectionbysem', 'SamplesController@getsectionbysem');
Route::get('/get_subjectbycurriculum', 'SamplesController@getsubjectbycurriculum');
Route::get('/get_subject', 'RegisterController@getsubject');
Route::get('/get__subject', 'RegisterController@getsubject2');
Route::get('/getsection', 'RegisterController@get__sections');
Route::get('getyearlevel', 'RegisterController@get__yearlevels');
Route::get('get___subject', 'RegisterController@getsubject3');
Route::get('get_year', 'RegisterController@getyear');
Route::get('get_studentname', 'RegisterController@getstudentname');
Route::get('get_juniorsections', 'RegisterController@getjuniorsections');
Route::get('index2', 'RegisterController@index2');
Route::get('junior/{id}', 'RegisterController@junior');
Route::get('senior/{id}', 'RegisterController@senior');
Route::get('get_sections', 'SectionsController@getsections');
Route::get('get_province', 'StudentsController@getprovince');
Route::get('get_mun', 'StudentsController@getmun');
Route::get('get_brgy', 'StudentsController@getbrgy');
Route::get('get_stat', 'TeacherloadsController@getstat');
Route::get('get_status', 'TeacherloadsController@getstatus');
Route::get('get_majorid', 'TeacherloadsController@getmajorid');
 });


 Route::group(['middleware'=>['authen','roles'],'roles'=>['teacher']],function(){

	Route::get('loads/{id}', 'GradesController@teacherload');
	Route::get('tgrades/{id}', 'GradesController@teacherinputgrade');
	Route::get('stgrades/{id}', 'GradesController@steacherinputgrade');
	Route::post('sgrades2','GradesController@sstore2');
	Route::post('grades3','GradesController@store2');
	Route::get('/tgradesheet/{id}','TeachersController@tgradesheet');
	Route::get('/tgradesheet2/{id}','TeachersController@tgradesheet2');
	Route::get('/tshow/{id}','TeachersController@tshow');
	Route::get('/trecord2/{id}','TeachersController@trecord2');
	Route::get('/trecord/{id}','TeachersController@trecord');
	

 });	

 
 Route::group(['middleware'=>['authen','roles'],'roles'=>['student']],function(){
	Route::get('profile/{id}','StudentsController@profile');
	Route::get('enrolled_subject/{id}','StudentsController@enrolled_subject');
	Route::get('current_grade/{id}','StudentsController@current_grade');
	Route::get('studrecord/{id}','StudentsController@studrecord');
	Route::get('previewsubject/{id}','StudentsController@previewsubject');
 });


//Route::get('/', 'PagesController@index');


//Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');











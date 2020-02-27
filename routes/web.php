<?php
use Illuminate\Support\Facades\Input;
use App\Professors;
use App\cilveks;
use App\patalpos;
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

Route::get('/', 'PagesController@index');
Route::get('/destytojai', 'ProfessorController@index');
Route::get('/dalykai', 'PagesController@subjectManagement');
Route::get('/ataskaitos', 'PagesController@reportsManagement');
//Route::get('/reDest', 'ProfessorController@edit');
Route::get('/pridgrupe', 'PagesController@pridetiGrupe');
Route::get('/searchas', 'PagesController@ieskoti');
Route::post('/search', function(){
    $q = Input::get('q');
    if($q != "") {
        $prof = cilveks::where('uzvards', 'LIKE', '%' . $q . '%')
            //->orWhere('vards', 'LIKE', '%' . $q . '%')
            ->get();
        if(count($prof)> 0)
            return view('pages.searchas')->withDetails($prof)->withQuery($q);
    }
    return view('pages.searchas')->withMessage("n00thing");
} );
Route::get('/addGroupTime', 'PagesController@pridetiLaika');
Route::get('/editGroup', 'PagesController@redaguotiGrupe');
Route::get('/editGroup', 'PagesController@editGroup');
//Route::resource('Pages', 'SubjectsController');
Route::get('addgroup', 'SubjectsController@create');
Route::post('addgroup', 'SubjectsController@store');


Route::get('/delete/{id}', 'SubjectsController@delete');

//Route::get('/edit/{id}', 'ProfessorController@edit');
//Route::resource('prof', 'ProfessorController');
//('User/{User}', 'UserController@add_to_group')->name('User.add_to_group');
//Route::resource('prof/{id}', 'ProfessorController@edit')->name('prof.edit');
//Route::get('Prof/{id}', 'ProfessorController@edit')->name('prof.edit');
Route::GET('professor/{professor}', 'ProfessorController@edit')->name('professor.edit');









/*
 * Route::get('/', function () {
    return view('welcome');
});
*/

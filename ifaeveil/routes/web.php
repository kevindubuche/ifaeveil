<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::group(['middleware' => ['ifLogin','auth']], function(){

    Route::resource('admins', 'AdminController')->middleware('ifAdm');

    Route::resource('classes', 'ClasseController')->middleware('ifAdm');

    Route::resource('etapes', 'EtapeController')->middleware('ifAdm');

    Route::resource('annees', 'AnneeController')->middleware('ifAdm');

    Route::resource('profs', 'ProfController')->middleware('ifAdm');

    Route::resource('assignations', 'AssignationsController')->middleware('ifAdm');

    Route::resource('eleves', 'EleveController')->middleware('ifAdm');

    Route::resource('allUsers', 'AllUserController');

    Route::resource('matieres', 'MatiereController');

    Route::resource('lecons', 'LeconController');

    Route::get('/profile/{id}', 'AllUserController@profile')->name('profile');

    Route::post('/userUpdatePassword','AllUserController@userUpdatePassword');

    Route::resource('exams', 'ExamController');

    Route::resource('soumissions', 'SoumissionController');
        
    Route::resource('messages', 'MessageController');

    Route::resource('messagesAssignations', 'Messages_assignationController');
    
    Route::resource('quizQuestions', 'Quiz_questionController')->middleware('ifAdm');

    Route::resource('quizReponses', 'Quiz_reponseController')->middleware('ifAdm');

    Route::resource('quizPropositions', 'Quiz_propositionController')->middleware('ifAdm');

    Route::resource('quizzes', 'QuizController');

    Route::post('/startQuiz','QuizController@startQuiz');

    Route::post('/endQuiz','QuizController@endQuiz');

    Route::post('/endQuiz','QuizController@endQuiz');

    Route::resource('quiznotes', 'QuiznoteController');

    Route::post('noteQuizzes.store', 'QuiznoteController@store');


});











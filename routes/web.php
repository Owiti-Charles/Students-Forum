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
use Illuminate\Http\File;

Route::get('/', 'FrontEndController@index')->name('/');
Route::get('/register/lecturer', 'FrontEndController@lecturer');
Route::get('/register/student', 'FrontEndController@student');
Route::post('/registration', 'RegisterController@register')->name('user.register');
Route::get('/frontend/courses/get','FrontEndController@getCourses')->name('getFrontCourses');
Route::get('/log-in', function(){
    return view('frontend.login');
});
Route::get('/noPermission', function(){
    return view('nopermission');
})->name('nopermission');
Auth::routes();

Route::get('notices/viewimage/{filename}',function ($filename){
    $folder='notices';
    $path = public_path().'\\notices\\'.$filename;

    if(!File::exists($path)) abort(404);
    $file = File::get($path);
    $type = File::mimeType($path);

    $entry=Notice::where('file', '=', $filename)->firstOrFail();

    //  return (new Response($file, 200))
    // ->header(['Content-Type'=> $entry->mime]);
    return Response::make($file, 200, [
        'Content-Type' => $entry->mime,
        'Content-Disposition' => 'inline; filename="'.$entry->file.'"'

    ]);
})->name('getentry');

Route::group(['prefix'=>'administrator', 'middleware'=>['auth', 'roles'], 'roles'=>['admin']],function (){
//    dd('admin');
    Route::get('/','AdminController@manageUsers')->name('admin.index');
    Route::get('/change/password', 'AdminController@password')->name('admin.password');
    Route::post('save/password', 'AdminController@changePassword')->name('admin.changePassword');
    Route::get('/users/manage', 'AdminController@manageUsers')->name('users.manage');
    Route::post('/users/update', 'AdminController@updateUser')->name('users.update');
    Route::post('users/delete/{id}', 'AdminController@deleteUser')->name('user.delete');
    Route::get('/courses/new/courses', 'AdminController@createCourses')->name('courses.create');
    Route::post('/faculty/save/new', 'AdminController@addFaculty')->name('admin.add.faculty');
    Route::get('/courses/get','AdminController@getCourses')->name('getCourses');
    Route::post('/courses/add', 'AdminController@addCourse')->name('admin.add.course');

    

    Route::get('/discussion/create', 'AdministratorDiscussionController@create')->name('admin.discussion.create');
    Route::post('/discussion/save', 'AdministratorDiscussionController@save')->name('admin.discussion.save');
    Route::get('/discussion/save', 'AdministratorDiscussionController@manage')->name('admin.discussion.manage');
    Route::get('/discussion/fetch/{id}', 'AdministratorDiscussionController@fetchDiscusion')->name('getData');
    Route::post('/discussion/update', 'AdministratorDiscussionController@update')->name('admin.discussion.update');
    Route::post('/discussion/destroy/{id}', 'AdministratorDiscussionController@destroy')->name('admin.discussion.destroy');
    Route::get('/discussion/view/{id}', 'AdministratorDiscussionController@view')->name('admin.discussion.view');
    Route::post('/discussion/{id}/thread/create', 'AdministratorDiscussionController@createThread')->name('admin.thread.create');
    Route::post('/discussion/thread/delete/{id}', 'AdministratorDiscussionController@deleteThread')->name('admin.thread.delete');
    Route::get('/discussion/thread/fetch/{id}', 'AdministratorDiscussionController@fetchThread');
    Route::post('/discussion/thread/update', 'AdministratorDiscussionController@updateThread')->name('admin.thread.update');
    Route::get('/discussions/view/all', 'AdministratorDiscussionController@viewDiscussions')->name('admin.discussions.view.all');
    Route::get('/discussions/view/{id}', 'AdministratorDiscussionController@viewDiscussion')->name('admin.discussions.view.more');
    Route::get('/discussions/approve/view/{id}', 'AdministratorDiscussionController@viewToApprove')->name('admin.discussions.view.approve');
    Route::get('/user/discussions/', 'AdministratorDiscussionController@manageUserDiscussions')->name('admin.discussions.user.manage');
    Route::post('/discussion/manage/user/update', 'AdministratorDiscussionController@updateUserDisc')->name('admin.user.discussion.update');
    Route::get('news/create', 'NewsController@create')->name('admin.news.create');
    Route::post('news/save', 'NewsController@save')->name('admin.news.save');
    Route::get('news/manage', 'NewsController@manage')->name('admin.news.manage');
    Route::get('/news/fetch/{id}','NewsController@fetchNews');
    Route::post('news/update', 'NewsController@updateNews')->name('admin.news.update');
    Route::post('/discussion/thread/delete/{id}', 'AdministratorDiscussionController@deleteThread')->name('admin.thread.delete');
});
Route::group(['prefix'=>'student', 'middleware'=>['web','auth', 'roles'], 'roles'=>['student']], function(){
    Route::get('/', 'DiscussionController@viewDiscussions')->name('student.index');
    Route::get('/profile/updatepassword', 'StudentController@updatePassword')->name('updatePassword');
    Route::post('/profile/password/update', 'StudentController@firstLogin')->name('student.firstLogin');
    Route::get('/profile', 'StudentController@profile')->name('student.profile');
    Route::post('/update/basic', 'StudentController@updateBasic')->name('student.updateBasic');
    Route::post('/update/photo', 'StudentController@updatephoto')->name('student.updatePhoto');
    Route::post('/update/contact', 'StudentController@updateContact')->name('student.updateContact');
    Route::get('/update/password', 'StudentController@password')->name('student.password');
    Route::post('/update/password/update', 'StudentController@changePassword')->name('student.password.update');
    Route::get('/discussion/create', 'DiscussionController@create')->name('student.discussion.create');
    Route::post('/discussion/save', 'DiscussionController@save')->name('student.discussion.save');
    Route::get('/discussion/save', 'DiscussionController@manage')->name('student.discussion.manage');
    Route::get('/discussion/fetch/{id}', 'DiscussionController@fetchDiscusion')->name('getData');
    Route::post('/discussion/update', 'DiscussionController@update')->name('student.discussion.update');
    Route::post('/discussion/destroy/{id}', 'DiscussionController@destroy')->name('student.discussion.destroy');
    Route::get('/discussion/view/{id}', 'DiscussionController@view')->name('student.discussion.view');
    Route::post('/discussion/{id}/thread/create', 'DiscussionController@createThread')->name('thread.create');
    Route::post('/discussion/thread/delete/{id}', 'DiscussionController@deleteThread')->name('thread.delete');
    Route::get('/discussion/thread/fetch/{id}', 'DiscussionController@fetchThread');
    Route::post('/discussion/thread/update', 'DiscussionController@updateThread')->name('thread.update');
    Route::get('/discussions/view/all', 'DiscussionController@viewDiscussions')->name('discussions.view.all');
    Route::get('/discussions/view/{id}', 'DiscussionController@viewDiscussion')->name('discussions.view.more');
    Route::get('/notes/view', 'DiscussionController@viewNotes')->name('student.notes.view');
    Route::get('/notes/view/{id}', 'DiscussionController@viewNote')->name('student.note.view');
      Route::get('/news/view', 'NewsController@viewNews')->name('student.news.view');
      Route::get('/news/view{id}', 'NewsController@viewNew')->name('student.new.view');
});
Route::group(['prefix'=>'lecturer', 'middleware'=>['web','auth', 'roles'], 'roles'=>['lecturer']],function(){
    Route::get('/', 'LecturerDiscussionController@viewDiscussions')->name('lecturer.index');
    Route::get('/profile', 'LecturerController@profile')->name('lecturer.profile');
    Route::post('/update/basic', 'LecturerController@updateBasic')->name('lecturer.updateBasic');
    Route::post('/update/profile', 'LecturerController@updatephoto')->name('lecturer.updatePhoto');
    Route::post('/update/contact', 'LecturerController@updateContact')->name('lecturer.updateContact');
    Route::post('/password/change', 'LecturerController@changePassword')->name('lecturer.changePassword');
    Route::get('/update/password', 'LecturerController@password')->name('lecturer.password');
    Route::get('/discussion/create', 'LecturerDiscussionController@create')->name('lecturer.discussion.create');
    Route::post('/discussion/save', 'LecturerDiscussionController@save')->name('lecturer.discussion.save');
    Route::get('/discussion/save', 'LecturerDiscussionController@manage')->name('lecturer.discussion.manage');
    Route::get('/discussion/fetch/{id}', 'LecturerDiscussionController@fetchDiscusion')->name('getData');
    Route::post('/discussion/update', 'LecturerDiscussionController@update')->name('lecturer.discussion.update');
    Route::post('/discussion/destroy/{id}', 'LecturerDiscussionController@destroy')->name('lecturer.discussion.destroy');
    Route::get('/discussion/view/{id}', 'LecturerDiscussionController@view')->name('lecturer.discussion.view');
    Route::post('/discussion/{id}/thread/create', 'LecturerDiscussionController@createThread')->name('lecturer.thread.create');
    Route::post('/discussion/thread/delete/{id}', 'LecturerDiscussionController@deleteThread')->name('lecturer.thread.delete');
    Route::get('/discussion/thread/fetch/{id}', 'LecturerDiscussionController@fetchThread');
    Route::post('/discussion/thread/update', 'LecturerDiscussionController@updateThread')->name('lecturer.thread.update');
    Route::get('/discussions/view/all', 'LecturerDiscussionController@viewDiscussions')->name('lecturer.discussions.view.all');
    Route::get('/discussions/view/{id}', 'LecturerDiscussionController@viewDiscussion')->name('lecturer.discussions.view.more');
    Route::get('learning/notes', 'LecturerDiscussionController@createNotes')->name('lecturer.notes.create');
    Route::post('learning/notes/save', 'LecturerDiscussionController@saveNotes')->name('lecturer.notes.save');
    Route::get('learning/notes/manage', 'LecturerDiscussionController@manageNotes')->name('lecturer.notes.manage');
    Route::get('learning/notes/view/{id}', 'LecturerDiscussionController@viewNotes')->name('lecturer.notes.view');
    Route::post('learning/notes/delete/{id}', 'LecturerDiscussionController@deleteNotes')->name('lecturer.notes.delete');
    Route::get('learning/notes/fetch/{id}', 'LecturerDiscussionController@fetchNotes');
    Route::post('learning/notes/update', 'LecturerDiscussionController@updateNotes')->name('lecturer.notes.update');

});

##password resets links
Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.getemail');
Route::post('/password/reset','ResetPasswordController@reset')->name('password.request');
Route::get('student/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('student.reset');
Route::get('admin/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.reset');
Route::get('lecturer/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('lecturer.reset');

Route::get('pdf','AdminController@generatePDF');
Route::get('csv','AdminController@export');

Route::get('/allusers','AdminController@kibana');
Route::get('/alldiscussions','AdminController@kibanaDiscussion');
Route::get('/allcomments','AdminController@kibanaThread');
Route::get('/all/lectures','AdminController@lecturesPDF')->name('all.lectures');
Route::get('/all/students','AdminController@studentsPDF')->name('all.students');
Route::get('/all/students/discussions','AdminController@activeStudents')->name('student.discussion');
Route::get('/business/students','AdminController@businessPDF')->name('business/students');
Route::get('/cit/students','AdminController@citPDF')->name('cit/students');
Route::get('/fameco/students','AdminController@famecoPDF')->name('fameco/students');
Route::get('/engineering/students','AdminController@engPDF')->name('eng/students');
Route::get('/sciencetech/students','AdminController@sciencePDF')->name('sciencetech/students');
Route::get('/socialscience/students','AdminController@socialPDF')->name('social/students');
Route::get('pdf1','AdminController@discussionPDF');
Route::get('pdf2','AdminController@coursesPDF');
Route::get('/users/new/registered','AdminController@getNewUsersRegistered')->name('user.new.registered');
Route::get('/users/per/roles','AdminController@UsersPerRoles')->name('user.roles');
Route::get('/students/per/faculty','AdminController@UsersPerFaculty')->name('students.faculty');
Route::get('/students/per/course','AdminController@UsersPerCourse')->name('students.course');
Route::get('/courses/per/faculty','AdminController@CoursesPerFaculty')->name('faculty.course');
Route::get('/discussions/per/year','AdminController@discussionsLineChart')->name('discussionslinegraph');
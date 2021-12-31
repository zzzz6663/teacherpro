<?php

use App\Http\Middleware\checkTeacher;
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
Route::get('/admin_login','HomeController@admin_login')->name('admin.login');
Route::post('/check','HomeController@check_login')->name('admin.check.login');
//Route::prefix('profile')->namespace('Profile')->middleware('auth')->group(function (){
Route::get('/go_free_class/{fclass}','HomeController@go_free_class') ->name('go.free.class');
Route::get('/','HomeController@index') ->name('login');
Route::get('/test','HomeController@test') ->name('test');
Route::get('/redirect_google','HomeController@redirect_google')->name('user.redirect.google');
Route::get('/gcallback','HomeController@gcallback') ->name('google.call.back');
Route::get('/teacher_list','HomeController@teacher_list')->name('home.teacher.list');
Route::get('/register','HomeController@register_form')->name('home.teacher.register.form');
Route::post('/login_sms','HomeController@login_sms') ->name('login.sms');
Route::post('/check_sms','HomeController@check_sms') ->name('check.sms');
Route::get('/teacher_profile/{user}','HomeController@teacher_profile')->name('home.teacher.profile');
Route::post('/teacher_register','HomeController@teacher_register')->name('home.teacher.register');
Route::post('/user_login','HomeController@user_login')->name('home.user.login');
Route::post('/student_register','HomeController@student_register')->name('home.student.register');
Route::get('/about_us','HomeController@about_us')->name('home.about.us');
Route::get('/contact_us','HomeController@contact_us')->name('home.contact.us');
Route::get('/home_articles/{acat?}','HomeController@home_articles')->name('home.articles');
Route::get('/tag_articles/{tag}','HomeController@tag_articles')->name('home.tag.articles');
Route::get('/single_article/{article}','HomeController@single_article')->name('home.single.article');
Route::post('/comment_article/{article?}','HomeController@comment_article')->name('home.comment.article');
Route::post('/comment_teacher/{user}','HomeController@comment_teacher')->name('home.comment.teacher');
Route::any('/charge_wallet','BillController@charge_wallet')->name('student.charge.wallet');
Route::post('/home_payam','HomeController@home_payam')->name('admin.home.payam');

//Route::get('/manage1','manage1\AdminController@index') ;






Route::middleware(['auth'])->group(function(){
    Route::resource('Article', 'ArticleController');
//    Route::get('Article/create/{user}', 'ArticleController@create')->name('Article.create');
//    Route::post('Article/{user}', 'ArticleController@store')->name('Article.store');
//    Route::get('Article/{user}', 'ArticleController@index')->name('Article.index');
    Route::post('/pay_meet/{user}','HomeController@pay_meet')->name('home.pay.meet');
    Route::get('/go_class/{meet}','HomeController@go_class')->name('home.go.class');
    Route::post('/cancel_class','HomeController@cancel_class')->name('home.cancel.class');
});

Route::prefix('student')->middleware(['checkStudent','auth'])->namespace('student')->group(function(){
    Route::get('/dashboard','StudentController@dashboard')->name('student.dashboard');
    Route::get('/accept_fclass/{fclass}','StudentController@accept_fclass')->name('student.accept.fclass');
    Route::get('/wallet','StudentController@wallet')->name('student.wallet');
    Route::get('/profile','StudentController@profile')->name('student.profile');
    Route::get('/reserve/{user}/{count}/{meet?}','StudentController@reserve')->name('student.reserve');
    Route::post('/change','StudentController@change')->name('student.change');
    Route::get('/fave','StudentController@fave')->name('student.fave');
    Route::post('/fave_teachers/{user}','StudentController@fave_teachers')->name('student.fave.teachers');
    Route::post('/save_avatar/{user}','StudentController@save_avatar')->name('student.save.avatar');
    Route::post('/save_bg/{user}','StudentController@save_bg')->name('student.save.bg');
    Route::post('/save_password/{user}','StudentController@save_password')->name('student.save.password');
    Route::post('/profile_save_info/{user}','StudentController@profile_save_info')->name('student.profile.save.info');
    Route::get('/logout/{user}','StudentController@logout')->name('student.logout');


});
Route::prefix('teacher')->middleware(['checkTeacher','auth'])->namespace('teacher')->group(function(){
    Route::post('/delete_fclass/{fclass}','TeacherController@delete_fclass')->name('teacher.delete.fclass');
    Route::get('/dashboard/','TeacherController@dashboard')->name('teacher.dashboard');
    Route::get('/setting','TeacherController@setting')->name('teacher.setting');
    Route::get('/classes','TeacherController@classes')->name('teacher.classes');
    Route::get('/wallet','TeacherController@wallet')->name('teacher.wallet');
    Route::get('/downloads','TeacherController@downloads')->name('teacher.downloads');
    Route::get('/posts','TeacherController@posts')->name('teacher.posts');
    Route::get('/plans','TeacherController@plans')->name('teacher.plans');
    Route::get('/prices','TeacherController@prices')->name('teacher.prices');
    Route::get('/tutorials','TeacherController@tutorials')->name('teacher.tutorials');
    Route::get('/quiz','TeacherController@quiz')->name('teacher.quiz');
    Route::get('/profile','TeacherController@profile')->name('teacher.profile');
    Route::get('/lang','TeacherController@lang')->name('teacher.lang');
    Route::post('/profile_save_info/{user}','TeacherController@profile_save_info')->name('teacher.profile.save.info');
    Route::get('/articles','TeacherController@articles')->name('teacher.articles');
    Route::post('/save_plan/{user}','TeacherController@save_plan')->name('teacher.save.plan');
    Route::post('/save_price/{user}','TeacherController@save_price')->name('teacher.save.price');
    Route::post('/more_price/{user}','TeacherController@more_price')->name('teacher.save.more.price');
    Route::post('/save_lang/{user}','TeacherController@save_lang')->name('teacher.save.lang');
    Route::post('/save_avatar/{user}','TeacherController@save_avatar')->name('teacher.save.avatar');
    Route::post('/save_bg/{user}','TeacherController@save_bg')->name('teacher.save.bg');
    Route::post('/save_expert/{user}','TeacherController@save_expert')->name('teacher.save.expert');
    Route::post('/save_port/{user}','TeacherController@save_port')->name('teacher.save.port');
    Route::post('/save_account/','TeacherController@save_account')->name('teacher.save.account');
    Route::post('/active_profile/{user}','TeacherController@active_profile')->name('teacher.active.profile');
    Route::post('/free_class/{user}','TeacherController@free_class')->name('teacher.free.class');
    Route::post('/save_password/{user}','TeacherController@save_password')->name('teacher.save.password');
    Route::get('/see_comment/{article}','TeacherController@see_comment')->name('teacher.see.comment');
    Route::post('/delete_lang/{language}','TeacherController@delete_lang')->name('teacher.delete.lang');
    Route::post('/save_draft','TeacherController@save_draft')->name('teacher.save.draft');
    Route::get('/cancel_class_list','TeacherController@cancel_class_list')->name('teacher.cancel.class.list');
    Route::get('/logout/{user}','TeacherController@logout')->name('teacher.logout');
    Route::resource('Resume', 'ResumeController');


});

Route::middleware(['auth'])->group(function(){
    Route::get('/verify','BillController@verify')->name('bill.verify');
    Route::get('/result_pay/{bill}','BillController@result_pay')->name('bill.result_pay');

//    Route::post('/charge_wallet/{user}','BillController@charge_wallet')->name('teacher.charge.wallet');

});









Route::prefix('admin')->namespace('admin')->middleware([ 'checkadmin','auth'])->group(function(){
    Route::get('/','AdminController@index')->name('admin.index');
    Route::get('/logoutadmin','AdminController@logoutadmin')->name('admin.logout.admin');
    Route::get('/users','AdminController@users')->name('admin.users');
    Route::get('/classes','AdminController@classes')->name('admin.classes');
    Route::get('/tarticles','AdminController@tarticles')->name('admin.tarticles');
    Route::get('/setting','AdminController@setting')->name('admin.setting');
    Route::get('/teachers','AdminController@teachers')->name('admin.teachers');
    Route::get('/bills','AdminController@bills')->name('admin.bills');
    Route::get('/payam','AdminController@payam')->name('admin.payam');
    Route::get('/comments','AdminController@comments')->name('admin.comments');
    Route::get('/zaro_balance/{user}','AdminController@zaro_balance')->name('admin.teacher.zaro.balance');
    Route::get('/teacher_pay/{user}','AdminController@teacher_pay')->name('admin.teacher.pay');
    Route::post('/submit_teacher_pay/{user}','AdminController@submit_teacher_pay')->name('admin.submit.teacher.pay');

    Route::get('/home_article/{article}','AdminController@home_article')->name('admin.home.article');
    Route::get('/edit_teacher/{user}','TeacherController@edit_teacher')->name('admin.teacher.edit');
    Route::get('/teacher_class/{user}','TeacherController@teacher_class')->name('admin.teacher.class');
    Route::get('/teacher_article/{user}','TeacherController@teacher_article')->name('admin.teacher.article');
    Route::get('/teacher_bill/{user}','TeacherController@teacher_bill')->name('admin.teacher.bill');
    Route::post('/teacher_article_active/{article}','TeacherController@teacher_article_active')->name('admin.teacher.article.active');
    Route::post('/teacher_comment_active/{comment}','TeacherController@teacher_comment_active')->name('admin.teacher.comment.active');
    Route::post('/teacher_comment_delete/{comment}','TeacherController@teacher_comment_delete')->name('admin.teacher.comment.delete');
    Route::get('/teacher_article_show/{article}/{user}','TeacherController@teacher_article_show')->name('admin.teacher.article.show');
    Route::get('/active_teacher/{user}','TeacherController@active_teacher')->name('admin.teacher.active');

    Route::post('/save_attr/{user}','TeacherController@save_attr')->name('admin.teacher.save.attr');
    Route::post('/class_result/{meet}','TeacherController@class_result')->name('admin.teacher.class.result');




    Route::get('/student_class/{user}','StudentController@student_class')->name('admin.student.class');

    Route::resource('languages', 'LanguageController');
    Route::resource('acats', 'AcatController');
    Route::resource('com', 'ComController');


    Route::get('/edit_student/{user}','StudentController@edit_student')->name('admin.student.edit');
    Route::get('/student_bill/{user}','StudentController@student_bill')->name('admin.student.bill');





    Route::post('/save_login_info','SettingController@save_login_info')->name('admin.login.info');
    Route::post('/save_lang','SettingController@save_lang')->name('admin.save.lang');
    Route::post('/save_max_min','SettingController@save_max_min')->name('admin.teacher.save.max.min');
    Route::post('/save_period','SettingController@save_period')->name('admin.teacher.save.period');

});

//Route::get('/', function () {
//    return view('welcome');
//});

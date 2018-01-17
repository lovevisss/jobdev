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

Route::get('/', [ 'as' => 'index', function () {
	$posts = TCG\Voyager\Models\Post::where('image', '!=', null)->orderBy('created_at', 'DESC')->take(5)->get();
	$news = TCG\Voyager\Models\Post::with('category')->where('category_id', '=', 1)->orderBy('created_at', 'DESC')->take(7)->get();
	$jobs = TCG\Voyager\Models\Post::with('category')->where('category_id', '=', 2)->orderBy('created_at', 'DESC')->take(5)->get();
	$recommends = TCG\Voyager\Models\Post::with('category')->where('category_id', '=', 3)->orderBy('created_at', 'DESC')->take(5)->get();
	$prerecruits = TCG\Voyager\Models\Post::with('category')->where('category_id', '=', 6)->orderBy('created_at', 'DESC')->take(8)->get();
	$parent_menu = TCG\Voyager\Models\MenuItem::where('id', '=', 14)->first();
    return view('index', compact('posts', 'news', 'jobs', 'recommends','prerecruits' ,'parent_menu'));
}]);

Route::get('/contact', ['as' => 'contact', function(){
	return 'contact';
}]);

Route::get('/about', ['as' => 'page.about', function()
{
	return 'about';
}]);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/post/{id}', ['as' => 'post', function($id)
{
	$post = TCG\Voyager\Models\Post::where('id', '=', $id)->first();
	$category = TCG\Voyager\Models\Category::where('id', '=', $post->category_id)->first();
	$title = $category->name;
	$menu = TCG\Voyager\Models\MenuItem::where('title' , '=', $title)->first();
	$menus = TCG\Voyager\Models\MenuItem::where('parent_id', '=', $menu->parent_id)->get();
	// dd($menus);
	$parent_menu = TCG\Voyager\Models\MenuItem::where('id', '=', $menu->parent_id)->first();
	return view('posts.post', compact('post', 'title', 'menus', 'parent_menu'));
}]
);

Route::get('/page/{id}', ['as' => 'page', function($id)
{
	$page = TCG\Voyager\Models\Page::where('id', '=', $id)->first();
	$title = $page->menu_name;
	$menu = TCG\Voyager\Models\MenuItem::where('title' , '=', $title)->first();
	$menus = TCG\Voyager\Models\MenuItem::where('parent_id', '=', $menu->parent_id)->get();
	// dd($menus);
	$parent_menu = TCG\Voyager\Models\MenuItem::where('id', '=', $menu->parent_id)->first();
	return view('pages.page', compact('page', 'title', 'menus', 'parent_menu'));
}]);

Route::get('/category/{id}', ['as' => 'category', function($id){
	$category = TCG\Voyager\Models\Category::where('id', '=', $id)->first();
	$title = $category->name;
	$menu = TCG\Voyager\Models\MenuItem::where('title' , '=', $title)->first();
	$menus = TCG\Voyager\Models\MenuItem::where('parent_id', '=', $menu->parent_id)->get();
	// dd($menus);
	$parent_menu = TCG\Voyager\Models\MenuItem::where('id', '=', $menu->parent_id)->first();
	$posts = TCG\Voyager\Models\Post::where('category_id', '=', $id)->orderBy('created_at', 'DESC')->paginate(15);
	return view('posts.list', compact('category', 'posts', 'title', 'menus', 'parent_menu'));
}]);

Route::post('search', ['as' => 'search', function(){
	$keys = Input::get('keys');
	return redirect(route('search_get',['keys' => $keys]));  //post 第二页会出问题  需要改成get
}]);

Route::get('/search/{keys}', ['as' => 'search_get', function($keys){
	// $keys = Input::get('keys');
	// return 'test';
	$posts = TCG\Voyager\Models\Post::where('title', 'like', '%'.$keys.'%')->orWhere('body', 'like', '%'.$keys.'%')->orderBy('created_at', 'DESC')->paginate(15);
	$parent_menu = TCG\Voyager\Models\MenuItem::where('id', '=', 14)->first();
	return view('search', compact('keys','posts', 'parent_menu'));
}]);

Route::get('/intro', ['as' => 'intro',function()
{
	return 'intro';
}]);
Route::get('login', ['as' =>'login', function(){
	return \Redirect::route('company_entry');
}]);
Route::get('company_login', ['as' => 'company_entry', 'uses' => 'CompanyController@login']);
Route::get('student_login', ['as' => 'student_entry', 'uses' => 'StudentController@login']);
Route::get('company_register' , ['as' => 'company_register', 'uses' => 'CompanyController@register']);
Route::post('post_company_register', ['as' => 'post_company_register', 'uses' => 'CompanyController@post_register']);
Route::post('post_company_login', ['as' => 'post_company_login', 'uses' => 'CompanyController@post_login']);
Route::get('company_index', ['as' => 'company_index', 'uses' => 'CompanyController@get_index', 'middleware' => 'auth']);
Route::get('logout', ['as' => 'logout', 'uses' => 'CompanyController@logout']);
Route::get('terms', ['as' => 'terms', function(){
	return 'terms';
}]);

Route::get('edit_company', ['as' => 'edit_company', 'uses' => 'CompanyController@edit', 'middleware' => 'auth']);
// Route::get('excel/export', 'ExcelController@export');
// Route::get('excel/import', 'ExcelController@import');
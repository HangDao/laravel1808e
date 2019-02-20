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
Route::get('/hello', function(){
	return 'hello word';
});
Route::get('/hi-you',function(){
	return "This is valentine day";
});
//file web.php nơi tiếp nhận các resquest người dùng gửi nên
/***************Method GET***************/
Route::get('/test', function(){
	return "This is test";
});
//   /test: request người dùng gửi lên
// ::get() :phương thức gửi dlieu
// return "This is test";  :respone tra kết quả về
/**************Method POST*****************/
Route::post('/demo-post', function(){
	return "This is method post";
});
/*********Method DELETE**********************/
Route::delete('/demo-delete', function(){
	return "This is method delete";
});
/*******************Method PUT***************************/
Route::put('/mothod-put', function(){
	return "This is method put";
});

//chấp nhận mọi phưng thức cho một request
Route::any('/demo-any', function(){
	return "This is method ANY";
});
//chấp nhận 1 hoặc nhiều cho 1 request
Route::match(['get','post','put'],'/all-in-one', function(){
	return "This is match Route";
});
Route::get('/quynh-bup-be-t1',function(){
	//điều hướng trang
	//header('Location:domail')
	return redirect('nguoi-phan-xu-t1');
});
Route::get('/nguoi-phan-xu-t1', function(){
	return redirect('nguoi-phan-xu-t1');
})->name('npx');
Route::get('/film-supperman',function(){
	return redirect()->route('npx');
});
//Router view
Route::get('/demo-view',function(){
	return view('demo');
});
//truyen tham so vào router
//tham so bat buoc-phai truiyen vao requesst khi gui dl len server
Route::get('/sam-sung/{name}',function($namePhone, $pricePhone){
	return "ban dang xem dien thoan {$namePhone}-gia ban la:{$pricePhone}";
});
//tham so khong bat buoc
Route::get('/apple/{name?}/{price?}',function($name = null,$price = null){
	
	return "Ban dang xem dthoai iphone : {$name}-gia ban la: {$price}";
});

//validate tham so router
//Tuổi chỉ được phép nhập số
//tên chỉ là các chữ cái
Route::get('/check-age/{age}/{name}',function($age,$name){
	return "my age is {$age} - my name is {$name}";
})->where(['age'=>'[0-9]+','name' => '[A-Za-z]+']);

//name router
Route::get('home-page',function(){
	return view('home-page');
})->name('home-page');

Route::get('/contact-page',function(){
	return "This is contact page";
})->name('contactPage');

//route group

Route::group([
	'prefix' => 'admin',
	'as'=>'admin.'
],function(){
	Route::get('/home',function(){
	return "admin - home";
	})->name('home');
	Route::get('/product',function(){
		return "admin - Product";
	})->name('product');
});

Route::get('/login',function(){
	return redirect()->route('admin.home');
});


Route::get('/watch-film/{age}',function($age){
	return redirect()->route('qbb');
})->name('watchFilm')->where('age','[0-9]+')
->middleware('myCheckAge');



Route::get('/quynh-bup-be-t10', function(){
	return "chuc ban xem phim vui vẻ";
})->name('qbb');

Route::get('do-not-watch-film', function(){
	return "ban chua du tuổi để xem";
})->name('cancleFilm');

Route::get('/kt-snt/{number}',function($num){
	return "OK";
});
Route::get('/result-ok',function(){
	return "Fail";
});
////
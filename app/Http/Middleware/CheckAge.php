<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //lấy tham số mà người dùng gửi lên
        $age = $request->age;
        if($age > 16){
            //cho phép đi tiếp
            return $next($request);
        }else{
            //bắt quay về trang không được xem phim
            return redirect()->route('cancleFilm');
        }

    }
}

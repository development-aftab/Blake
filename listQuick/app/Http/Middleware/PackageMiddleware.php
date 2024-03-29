<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
use App\UserPayment;
class PackageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        try{
            if(auth()->user()!=null){
                if (!auth()->user()->hasRole('user')) {
                    if(Auth::user()->paid == 0){
                        if(strtotime(date('M-d-Y')) > strtotime(Auth::user()->trial_expiry_date)){
                            User::where('id',Auth::user()->id)->update(['trial_expired'=>1]);
                            return redirect()->route('buy_package');
                        }else{
                            return $next($request);
                        }//end if else.
                    }elseif(isset(UserPayment::where('user_id',Auth::user()->id)->orderBy('id','DESC')->first()->created_at) && strtotime(date('M-d-Y')) > strtotime(UserPayment::where('user_id',Auth::user()->id)->orderBy('id','DESC')->first()->created_at->addDays(365)->format('M-d-Y'))){
                        return redirect()->route('buy_package');
                    }else{
                        return $next($request);
                    }//end if.
                }//end if.
                return $next($request);
            }else{
                return $next($request);
            }//end if else.
        }catch(\Exception $e){
            return $next($request);
        }//end trycatch.
    }//end handle function.
}//end class.

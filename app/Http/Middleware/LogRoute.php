<?php

namespace App\Http\Middleware;

use Closure;

class LogRoute
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
        $response = $next($request);
        
        if($request->ip() == '127.0.0.1'){
        $log = [
                'URI' => $request->getUri(),
                'METHOD' => $request->getMethod(),
                'IP'=> $request->ip(),
                'REQUEST_BODY' => $request->all(),
        ];
        }else{
          $log = 'not logged, from this IP';
        }
        
       \Log::debug(json_encode($log));
        return $response;
    }
}

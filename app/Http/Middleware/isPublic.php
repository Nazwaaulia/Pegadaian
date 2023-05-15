<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class isPublic
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (auth()->user()->role == 'admin') {
                Alert::success('Anda Sudah Login!');
                return redirect('/admin')->with('success', 'Anda Sudah Login!');
            } else {
                Alert::success('Anda Sudah Login!');
                return redirect('/petugas')->with('success', 'Anda Sudah Login!');
            }
        }else {
            return $next($request);
        }
    }
}

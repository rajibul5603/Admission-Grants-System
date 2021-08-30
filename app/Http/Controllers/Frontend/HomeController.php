<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Circular;
use Exception;
use Gate;
use Symfony\Component\HttpFoundation\Response;
// class HomeController
// {
//     public function index()
//     {
//         return view('frontend.home');
//     }
// }

class HomeController
{
    public function index()
    {
        $circular = '';
        abort_if(Gate::denies('circular_access') && Gate::denies('circular_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            $circular = Circular::orderBy('created_at')->first();
        } catch (Exception $e) {
        }
        return view('frontend.home', compact('circular'));
    }
}

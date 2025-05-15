<?php

namespace Modules\Service\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function speed()
    {
        return view('service::speed');
    }

    public function item()
    {
        return view('service::item');
    }
}

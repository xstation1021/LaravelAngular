<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->beforeFilter(function()
        {
            $headers = apache_request_headers();
            if($headers['Authorization'] != 'Bearer chicory-token' ){
                return Response::create("You are not authenticatied", 401);
                exit;
            }
        });
        }
}

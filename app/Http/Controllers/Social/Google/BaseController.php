<?php

namespace App\Http\Controllers\Social\Google;

use App\Http\Controllers\Controller;
use App\Service\Social\GoogleService;

class BaseController extends Controller
{
   public $service;

   public function __construct(GoogleService $service)
   {
       $this->service = $service;
   }
}

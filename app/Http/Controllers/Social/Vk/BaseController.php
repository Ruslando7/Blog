<?php

namespace App\Http\Controllers\Social\Vk;

use App\Http\Controllers\Controller;
use App\Service\Social\VkService;

class BaseController extends Controller
{
   public $service;

   public function __construct(VkService $service)
   {
       $this->service = $service;
   }
}

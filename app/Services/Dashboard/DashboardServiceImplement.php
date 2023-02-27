<?php

namespace App\Services\Dashboard;

use LaravelEasyRepository\Service;
use App\Repositories\Dashboard\DashboardRepository;

class DashboardServiceImplement extends Service implements DashboardService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(DashboardRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)
}

<?php

namespace App\Services\ReportVisitor;

use LaravelEasyRepository\Service;
use App\Repositories\ReportVisitor\ReportVisitorRepository;

class ReportVisitorServiceImplement extends Service implements ReportVisitorService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(ReportVisitorRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)
}

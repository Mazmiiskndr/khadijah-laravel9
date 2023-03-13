<?php

namespace App\Repositories\ReportVisitor;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\ReportVisitor;

class ReportVisitorRepositoryImplement extends Eloquent implements ReportVisitorRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(ReportVisitor $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
}

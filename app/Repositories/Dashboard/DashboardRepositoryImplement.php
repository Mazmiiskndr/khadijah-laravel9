<?php

namespace App\Repositories\Dashboard;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Dashboard;

class DashboardRepositoryImplement extends Eloquent implements DashboardRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Dashboard $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
}

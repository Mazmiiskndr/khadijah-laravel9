<?php

namespace App\Services\Tag;

use LaravelEasyRepository\Service;
use App\Repositories\Tag\TagRepository;
use Illuminate\Support\Facades\Log;

class TagServiceImplement extends Service implements TagService
{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;

    public function __construct(TagRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    /**
     * getAllData
     *
     * @return void
     */
    public function getAllData()
    {
        try {
            return $this->mainRepository->getAllData();
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            return [];
            //throw $th;
        }
    }

    /**
     * getLimitData
     *
     * @param  mixed $limit
     * @return void
     */
    public function getLimitData($limit)
    {
        try {
            return $this->mainRepository->getLimitData($limit);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            return [];
            //throw $th;
        }
    }

}

<?php

namespace App\Repositories\Interfaces;

use LaravelEasyRepository\Repository;

interface TransactionRepositoryInterface extends Repository
{

    /**
     * record a adopt tree transaction
     * @param array $data
     * @return mixed
     */
    public function doAdopt(array $data);
}

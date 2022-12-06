<?php

namespace App\Repositories\Eloquent;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Repositories\Interfaces\TransactionRepositoryInterface;
use App\Models\Transaction;

class TransactionRepository extends Eloquent implements TransactionRepositoryInterface
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Transaction|mixed $model;
     */
    protected $model;

    public function __construct(Transaction $model)
    {
        $this->model = $model;
    }

    public function doAdopt(array $data)
    {
        return null;
    }
}

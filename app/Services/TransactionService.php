<?php

namespace App\Services;

use LaravelEasyRepository\Service;
use App\Repositories\Interfaces\TransactionRepositoryInterface;

class TransactionService extends Service {

     /**
     * don't change $this->mainInterface variable name
     * because used in extends service class
     */
     protected $mainInterface;

    public function __construct(TransactionRepositoryInterface $mainInterface)
    {
      $this->mainInterface = $mainInterface;
    }

    // Define your custom methods :)
}

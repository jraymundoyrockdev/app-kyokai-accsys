<?php

namespace KyokaiAccSys\Http\Controllers;

use KyokaiAccSys\Http\Requests;
use KyokaiAccSys\Services\KyokaiApiClient;

class AbstractController extends Controller
{
    protected $apiClient;

    public function __construct(KyokaiApiClient $client)
    {
        $this->apiClient = $client;
    }
}

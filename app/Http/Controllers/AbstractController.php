<?php

namespace KyokaiAccSys\Http\Controllers;

use KyokaiAccSys\Http\Requests;
use KyokaiAccSys\Services\KyokaiApiClient;
use KyokaiAccSys\Services\KyokaiErrorResponseValueSetter;

class AbstractController extends Controller
{
    protected $apiClient;
    protected $errorResponseSetter;

    public function __construct(KyokaiApiClient $client, KyokaiErrorResponseValueSetter $errorResponseSetter)
    {
        $this->apiClient = $client;
        $this->errorResponseSetter = $errorResponseSetter;
    }
}

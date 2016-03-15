<?php

namespace KyokaiAccSys\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class MinistryRequest
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}

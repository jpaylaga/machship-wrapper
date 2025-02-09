<?php

namespace Jpaylaga\MachshipWrapper\Services;

use Jpaylaga\MachshipWrapper\Contracts\AuthenticateContract;
use Jpaylaga\MachshipWrapper\Exceptions\AuthenticateException;

class AuthenticateService extends BaseMachshipService implements AuthenticateContract
{
    /**
     * @throws AuthenticateException
     */
    public function ping()
    {
        try {
            return $this->request('GET', "authenticate/ping");
        } catch (\Exception $e) {
            throw new AuthenticateException($e->getMessage(), 0, $e);
        }
    }
}

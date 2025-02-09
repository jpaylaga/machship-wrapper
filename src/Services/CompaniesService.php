<?php

namespace Jpaylaga\MachshipWrapper\Services;

use Jpaylaga\MachshipWrapper\Contracts\CompaniesContract;
use Jpaylaga\MachshipWrapper\Exceptions\CompaniesException;
use GuzzleHttp;

class CompaniesService extends BaseMachshipService implements CompaniesContract
{
    /**
     * @throws CompaniesException
     */
    public function getAllCompanies(?int $atOrBelowCompanyId = null)
    {
        $query = array_filter(compact('atOrBelowCompanyId'));

        try {
            return $this->request('GET', 'companies', [GuzzleHttp\RequestOptions::QUERY => $query]);
        } catch (\Exception $e) {
            throw new CompaniesException($e->getMessage(), 0, $e);
        }
    }

    /**
     * @throws CompaniesException
     */
    public function getAvailableCarriersAccountsAndServices(int $companyId)
    {
        try {
            return $this->request('GET', "companies/{$companyId}/carriers-accounts-services");
        } catch (\Exception $e) {
            throw new CompaniesException($e->getMessage(), 0, $e);
        }
    }
}

<?php

namespace Jpaylaga\MachshipWrapper\Services;

use Jpaylaga\MachshipWrapper\Contracts\CompanyLocationsContract;
use Jpaylaga\MachshipWrapper\Exceptions\CompanyLocationsException;
use GuzzleHttp;

class CompanyLocationsService extends BaseMachshipService implements CompanyLocationsContract
{
    /**
     * @throws CompanyLocationsException
     */
    public function getCompanyLocation(int $id)
    {
        try {
            return $this->request('GET', "company-locations/{$id}");
        } catch (\Exception $e) {
            throw new CompanyLocationsException($e->getMessage(), 0, $e);
        }
    }

    /**
     * @throws CompanyLocationsException
     */
    public function getAllCompanyLocations(int $companyId)
    {
        try {
            return $this->request('GET', "company-locations", [
                GuzzleHttp\RequestOptions::QUERY => compact('companyId')
            ]);
        } catch (\Exception $e) {
            throw new CompanyLocationsException($e->getMessage(), 0, $e);
        }
    }

    /**
     * @throws CompanyLocationsException
     */
    public function createCompanyLocation(array $locationData)
    {
        try {
            return $this->request('POST', "company-locations", [
                GuzzleHttp\RequestOptions::JSON => $locationData
            ]);
        } catch (\Exception $e) {
            throw new CompanyLocationsException($e->getMessage(), 0, $e);
        }
    }

    /**
     * @throws CompanyLocationsException
     */
    public function editCompanyLocation(array $locationData)
    {
        try {
            return $this->request('PUT', "company-locations", [
                GuzzleHttp\RequestOptions::JSON => $locationData
            ]);
        } catch (\Exception $e) {
            throw new CompanyLocationsException($e->getMessage(), 0, $e);
        }
    }

    public function getPermanentPickupsForCompanyLocation(int $companyLocationId)
    {
        // TODO: Implement getPermanentPickupsForCompanyLocation() method.
    }

    public function addPermanentPickupsToCompanyLocation(array $pickupData)
    {
        // TODO: Implement addPermanentPickupsToCompanyLocation() method.
    }
}

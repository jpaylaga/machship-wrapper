<?php

namespace Jpaylaga\MachshipWrapper\Services;

use Jpaylaga\MachshipWrapper\Contracts\CompanyItemsContract;
use Jpaylaga\MachshipWrapper\Exceptions\CompanyItemsException;
use GuzzleHttp;

class CompanyItemsService extends BaseMachshipService implements
    CompanyItemsContract
{
    /**
     * @throws CompanyItemsException
     */
    public function getCompanyItem(int $id)
    {
        try {
            return $this->request('GET', "company-items/{$id}");
        } catch (\Exception $e) {
            throw new CompanyItemsException($e->getMessage(), 0, $e);
        }
    }

    /**
     * @throws CompanyItemsException
     */
    public function getAllCompanyItems(
        int $companyId,
        int $startIndex = 1,
        int $retrieveSize = 200
    ) {
        try {
            return $this->request('GET', 'company-items', [
                GuzzleHttp\RequestOptions::QUERY => compact(
                    'companyId', 'startIndex', 'retrieveSize'
                ),
            ]);
        } catch (\Exception $e) {
            throw new CompanyItemsException($e->getMessage(), 0, $e);
        }
    }

    /**
     * @throws CompanyItemsException
     */
    public function getCompanyItemBySku(int $companyId, string $sku)
    {
        try {
            return $this->request('GET', "company-items/{$companyId}/sku/{$sku}");
        } catch (\Exception $e) {
            throw new CompanyItemsException($e->getMessage(), 0, $e);
        }
    }

    /**
     * @throws CompanyItemsException
     */
    public function createComplexCompanyItem(int $companyId, array $itemData)
    {
        try {
            return $this->request('POST', "company-items/{$companyId}/complex", [
                GuzzleHttp\RequestOptions::JSON => $itemData,
            ]);
        } catch (\Exception $e) {
            throw new CompanyItemsException($e->getMessage(), 0, $e);
        }
    }

    /**
     * @throws CompanyItemsException
     */
    public function deleteCompanyItem(int $companyItemId)
    {
        try {
            return $this->request('DELETE', "company-items/{$companyItemId}");
        } catch (\Exception $e) {
            throw new CompanyItemsException($e->getMessage(), 0, $e);
        }
    }

    public function getComplexCompanyItem(int $id)
    {
        // TODO: Implement getComplexCompanyItem() method.
    }

    public function getAllComplexCompanyItems(
        int $companyId,
        int $startIndex = 1,
        int $retrieveSize = 200
    ) {
        // TODO: Implement getAllComplexCompanyItems() method.
    }

    public function getCompanyItemBySkuComplex(int $companyId, string $sku)
    {
        // TODO: Implement getCompanyItemBySkuComplex() method.
    }
}

<?php

namespace Jpaylaga\MachshipWrapper\Contracts;

interface CompanyItemsContract
{
    public function getCompanyItem(int $id);
    public function getAllCompanyItems(int $companyId, int $startIndex = 1, int $retrieveSize = 200);
    public function getCompanyItemBySku(int $companyId, string $sku);
    public function getComplexCompanyItem(int $id);
    public function getAllComplexCompanyItems(int $companyId, int $startIndex = 1, int $retrieveSize = 200);
    public function getCompanyItemBySkuComplex(int $companyId, string $sku);
    public function createComplexCompanyItem(int $companyId, array $itemData);
    public function deleteCompanyItem(int $companyItemId);
}

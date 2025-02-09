<?php

namespace Jpaylaga\MachshipWrapper\Contracts;

interface CompaniesContract
{
    public function getAllCompanies(?int $atOrBelowCompanyId = null);
    public function getAvailableCarriersAccountsAndServices(int $companyId);
}

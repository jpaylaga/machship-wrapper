<?php

namespace Jpaylaga\MachshipWrapper\Contracts;

interface CompanyLocationsContract
{
    public function getCompanyLocation(int $id);
    public function getAllCompanyLocations(int $companyId);
    public function createCompanyLocation(array $locationData);
    public function editCompanyLocation(array $locationData);
    public function getPermanentPickupsForCompanyLocation(int $companyLocationId);
    public function addPermanentPickupsToCompanyLocation(array $pickupData);
}

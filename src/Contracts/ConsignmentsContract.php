<?php

namespace Jpaylaga\MachshipWrapper\Contracts;

interface ConsignmentsContract
{
    public function getConsignment(int $id, bool $includeDeleted = false);
    public function getUnmanifestedConsignmentForEdit(int $id);
    public function getConsignmentByPendingConsignmentId(int $id);
    public function returnConsignmentsByPendingConsignmentIds(array $ids);
    public function returnConsignments(array $ids);
    public function returnConsignmentsByCarrierConsignmentId(
        array $carrierConsignmentIds
    );
    public function returnConsignmentsByReference1(array $references);
    public function returnConsignmentsByReference2(array $references);
    public function returnConsignmentStatuses(
        array $ids,
        ?string $sinceDateCreatedUtc = null
    );
    public function updateConsignmentStatuses(array $trackingStatuses);
    public function getUnmanifestedConsignments(
        int $companyId,
        int $startIndex = 1,
        int $retrieveSize = 200,
        ?int $carrierId = null,
        bool $includeChildCompanies = false
    );
    public function getActiveConsignments(
        int $companyId,
        int $startIndex = 1,
        int $retrieveSize = 999999,
        ?int $carrierId = null,
        bool $includeChildCompanies = false
    );
    public function getAllConsignments(
        int $companyId,
        int $startIndex = 1,
        int $retrieveSize = 40,
        ?int $carrierId = null,
        bool $includeChildCompanies = false,
        bool $includeDeletedConsignments = false,
        ?string $fromDateTimeLocal = null,
        ?string $toDateTimeLocal = null,
        ?bool $filterByEtaCompletedOrDespatch = null
    );
    public function getRecentlyCreatedOrUpdatedConsignments(
        int $companyId,
        string $fromDateUtc,
        ?string $toDateUtc = null,
        int $startIndex = 1,
        int $retrieveSize = 40,
        ?int $carrierId = null,
        bool $includeChildCompanies = false,
        bool $getNotes = false,
        bool $getReconciliationData = false
    );
    public function getCompletedConsignments(
        int $companyId,
        string $startDate,
        string $endDate,
        bool $includeChildCompanies = false
    );
    public function createConsignment(array $consignmentData);
    public function createExistingConsignment(array $consignmentData);
    public function editUnmanifestedConsignment(array $consignmentData);
    public function createConsignmentWithComplexItems(array $consignmentData);
    public function deleteUnmanifestedConsignments(array $consignmentIds);
    public function getConsignmentAttachments(int $consignmentId);
    public function getConsignmentForClone(int $id);
    public function searchConsignments(array $references);
}

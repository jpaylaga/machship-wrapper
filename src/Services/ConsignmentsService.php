<?php

namespace Jpaylaga\MachshipWrapper\Services;

use Jpaylaga\MachshipWrapper\Contracts\ConsignmentsContract;
use Jpaylaga\MachshipWrapper\Exceptions\ConsignmentsException;
use GuzzleHttp;

class ConsignmentsService extends BaseMachshipService implements
    ConsignmentsContract
{
    /**
     * @throws ConsignmentsException
     */
    public function getConsignment(int $id, bool $includeDeleted = false)
    {
        try {
            return $this->request('GET', "consignments/{$id}", [
                GuzzleHttp\RequestOptions::QUERY => compact('includeDeleted'),
            ]);
        } catch (\Exception $e) {
            throw new ConsignmentsException($e->getMessage(), 0, $e);
        }
    }

    /**
     * @throws ConsignmentsException
     */
    public function createConsignment(array $consignmentData)
    {
        try {
            return $this->request('POST', 'consignments', [
                GuzzleHttp\RequestOptions::JSON => $consignmentData,
            ]);
        } catch (\Exception $e) {
            throw new ConsignmentsException($e->getMessage(), 0, $e);
        }
    }

    /**
     * @throws ConsignmentsException
     */
    public function editUnmanifestedConsignment(array $consignmentData)
    {
        try {
            return $this->request('PUT', 'consignments', [
                GuzzleHttp\RequestOptions::JSON => $consignmentData,
            ]);
        } catch (\Exception $e) {
            throw new ConsignmentsException($e->getMessage(), 0, $e);
        }
    }

    /**
     * @throws ConsignmentsException
     */
    public function deleteUnmanifestedConsignments(array $consignmentIds)
    {
        try {
            return $this->request('DELETE', 'consignments', [
                GuzzleHttp\RequestOptions::JSON => ['consignmentIds' => $consignmentIds],
            ]);
        } catch (\Exception $e) {
            throw new ConsignmentsException($e->getMessage(), 0, $e);
        }
    }

    /**
     * @throws ConsignmentsException
     */
    public function getCompletedConsignments(
        int $companyId,
        string $startDate,
        string $endDate,
        bool $includeChildCompanies = false
    ) {
        try {
            return $this->request('GET', 'consignments/completed', [
                'query' => compact(
                    'companyId',
                    'startDate',
                    'endDate',
                    'includeChildCompanies'
                ),
            ]);
        } catch (\Exception $e) {
            throw new ConsignmentsException($e->getMessage(), 0, $e);
        }
    }

    public function getUnmanifestedConsignmentForEdit(int $id)
    {
        // TODO: Implement getUnmanifestedConsignmentForEdit() method.
    }

    public function getConsignmentByPendingConsignmentId(int $id)
    {
        // TODO: Implement getConsignmentByPendingConsignmentId() method.
    }

    public function returnConsignmentsByPendingConsignmentIds(array $ids)
    {
        // TODO: Implement returnConsignmentsByPendingConsignmentIds() method.
    }

    public function returnConsignments(array $ids)
    {
        // TODO: Implement returnConsignments() method.
    }

    public function returnConsignmentsByCarrierConsignmentId(
        array $carrierConsignmentIds
    ) {
        // TODO: Implement returnConsignmentsByCarrierConsignmentId() method.
    }

    public function returnConsignmentsByReference1(array $references)
    {
        // TODO: Implement returnConsignmentsByReference1() method.
    }

    public function returnConsignmentsByReference2(array $references)
    {
        // TODO: Implement returnConsignmentsByReference2() method.
    }

    public function returnConsignmentStatuses(
        array $ids,
        ?string $sinceDateCreatedUtc = null
    ) {
        // TODO: Implement returnConsignmentStatuses() method.
    }

    public function updateConsignmentStatuses(array $trackingStatuses)
    {
        // TODO: Implement updateConsignmentStatuses() method.
    }

    public function getUnmanifestedConsignments(
        int $companyId,
        int $startIndex = 1,
        int $retrieveSize = 200,
        ?int $carrierId = null,
        bool $includeChildCompanies = false
    ) {
        // TODO: Implement getUnmanifestedConsignments() method.
    }

    public function getActiveConsignments(
        int $companyId,
        int $startIndex = 1,
        int $retrieveSize = 999999,
        ?int $carrierId = null,
        bool $includeChildCompanies = false
    ) {
        // TODO: Implement getActiveConsignments() method.
    }

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
    ) {
        // TODO: Implement getAllConsignments() method.
    }

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
    ) {
        // TODO: Implement getRecentlyCreatedOrUpdatedConsignments() method.
    }

    public function createExistingConsignment(array $consignmentData)
    {
        // TODO: Implement createExistingConsignment() method.
    }

    public function createConsignmentWithComplexItems(array $consignmentData)
    {
        // TODO: Implement createConsignmentWithComplexItems() method.
    }

    public function getConsignmentAttachments(int $consignmentId)
    {
        // TODO: Implement getConsignmentAttachments() method.
    }

    public function getConsignmentForClone(int $id)
    {
        // TODO: Implement getConsignmentForClone() method.
    }

    public function searchConsignments(array $references)
    {
        // TODO: Implement searchConsignments() method.
    }
}

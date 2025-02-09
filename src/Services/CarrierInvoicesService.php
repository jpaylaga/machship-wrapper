<?php

namespace Jpaylaga\MachshipWrapper\Services;

use Jpaylaga\MachshipWrapper\Contracts\CarrierInvoicesContract;
use Jpaylaga\MachshipWrapper\Exceptions\CarrierInvoicesException;
use GuzzleHttp;

class CarrierInvoicesService extends BaseMachshipService implements
    CarrierInvoicesContract
{
    /**
     * @throws CarrierInvoicesException
     */
    public function getAllCarrierInvoices(
        ?int $companyId = null,
        ?int $carrierId = null,
        ?string $fileName = null,
        ?string $invoiceId = null
    ) {
        $query = array_filter(
            compact('companyId', 'carrierId', 'fileName', 'invoiceId')
        );

        try {
            return $this->request('GET', 'carrier-invoices', [GuzzleHttp\RequestOptions::QUERY => $query]);
        } catch (\Exception $e) {
            throw new CarrierInvoicesException($e->getMessage(), 0, $e);
        }
    }

    /**
     * @throws CarrierInvoicesException
     */
    public function getEntriesForInvoice(
        int $carrierInvoiceId,
        ?string $status = null
    ) {
        $query = array_filter(compact('status'));

        try {
            return $this->request(
                'GET',
                "carrier-invoices/{$carrierInvoiceId}/entries",
                [GuzzleHttp\RequestOptions::QUERY => $query]
            );
        } catch (\Exception $e) {
            throw new CarrierInvoicesException($e->getMessage(), 0, $e);
        }
    }

    /**
     * @throws CarrierInvoicesException
     */
    public function updateAndRepriceConsignment(array $repriceData)
    {
        try {
            return $this->request('POST', 'carrier-invoices/reprice', [
                GuzzleHttp\RequestOptions::JSON => $repriceData,
            ]);
        } catch (\Exception $e) {
            throw new CarrierInvoicesException($e->getMessage(), 0, $e);
        }
    }

    /**
     * @throws CarrierInvoicesException
     */
    public function attemptAutoReconciliation(array $reconciliationRequest)
    {
        try {
            return $this->request('POST', 'carrier-invoices/reconciliation', [
                GuzzleHttp\RequestOptions::JSON => $reconciliationRequest,
            ]);
        } catch (\Exception $e) {
            throw new CarrierInvoicesException($e->getMessage(), 0, $e);
        }
    }
}

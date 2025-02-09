<?php

namespace Jpaylaga\MachshipWrapper\Contracts;

interface CarrierInvoicesContract
{
    public function getAllCarrierInvoices(
        ?int $companyId = null,
        ?int $carrierId = null,
        ?string $fileName = null,
        ?string $invoiceId = null
    );
    public function getEntriesForInvoice(
        int $carrierInvoiceId,
        ?string $status = null
    );
    public function updateAndRepriceConsignment(array $repriceData);
    public function attemptAutoReconciliation(array $reconciliationRequest);
}

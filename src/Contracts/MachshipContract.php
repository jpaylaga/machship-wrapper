<?php

namespace Jpaylaga\MachshipWrapper\Contracts;

interface MachshipContract
{
    public function attachments(): AttachmentsContract;
    public function authenticate(): AuthenticateContract;
    public function carrierInvoices(): CarrierInvoicesContract;
    public function companies(): CompaniesContract;
    public function companyItems(): CompanyItemsContract;
    public function companyLocations(): CompanyLocationsContract;
    public function consignments(): ConsignmentsContract;
}
<?php

namespace Jpaylaga\MachshipWrapper;

use GuzzleHttp\Client;
use Jpaylaga\MachshipWrapper\Contracts\AuthenticateContract;
use Jpaylaga\MachshipWrapper\Contracts\CompaniesContract;
use Jpaylaga\MachshipWrapper\Contracts\CompanyItemsContract;
use Jpaylaga\MachshipWrapper\Contracts\CompanyLocationsContract;
use Jpaylaga\MachshipWrapper\Contracts\ConsignmentsContract;
use Jpaylaga\MachshipWrapper\Contracts\MachshipContract;
use Jpaylaga\MachshipWrapper\Contracts\AttachmentsContract;
use Jpaylaga\MachshipWrapper\Contracts\CarrierInvoicesContract;

class MachshipService implements MachshipContract
{
    protected Client $client;

    protected array $instances = [];

    public function __construct(string $apiBaseUrl, string $apiToken)
    {
        $this->client = new Client([
            'base_uri' => $apiBaseUrl,
            'headers' => [
                'Authorization' => 'Bearer ' . $apiToken,
                'Accept' => 'application/json',
            ]
        ]);
    }

    public function attachments(): AttachmentsContract
    {
        return $this->getInstance('attachments', function () {
            return app(AttachmentsContract::class, ['client' => $this->client]);
        });
    }

    public function authenticate(): AuthenticateContract
    {
        return $this->getInstance('authenticate', function () {
            return app(AuthenticateContract::class, ['client' => $this->client]);
        });
    }

    public function carrierInvoices(): CarrierInvoicesContract
    {
        return $this->getInstance('carrierInvoices', function () {
            return app(CarrierInvoicesContract::class, ['client' => $this->client]);
        });
    }

    public function companies(): CompaniesContract
    {
        return $this->getInstance('companies', function () {
            return app(CompaniesContract::class, ['client' => $this->client]);
        });
    }

    public function companyItems(): CompanyItemsContract
    {
        return $this->getInstance('companyItems', function () {
            return app(CompanyItemsContract::class, ['client' => $this->client]);
        });
    }

    public function companyLocations(): CompanyLocationsContract
    {
        return $this->getInstance('companyLocations', function () {
            return app(CompanyLocationsContract::class, ['client' => $this->client]);
        });
    }

    public function consignments(): ConsignmentsContract
    {
        return $this->getInstance('consignments', function () {
            return app(ConsignmentsContract::class, ['client' => $this->client]);
        });
    }

    protected function getInstance($key, $func)
    {
        if (!isset($this->instances[$key])) {
            $this->instances[$key] = $func();
        }

        return $this->instances[$key];
    }
}

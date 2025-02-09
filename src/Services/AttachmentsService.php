<?php

namespace Jpaylaga\MachshipWrapper\Services;

use Jpaylaga\MachshipWrapper\Contracts\AttachmentsContract;
use Jpaylaga\MachshipWrapper\Exceptions\AttachmentsException;
use GuzzleHttp;

class AttachmentsService extends BaseMachshipService implements AttachmentsContract
{
    /**
     * @throws AttachmentsException
     */
    public function getAttachment(int $id)
    {
        try {
            return $this->request('GET', "attachments/{$id}");
        } catch (\Exception $e) {
            throw new AttachmentsException($e->getMessage(), 0, $e);
        }
    }

    /**
     * @throws AttachmentsException
     */
    public function getAttachmentPodReport(int $id)
    {
        try {
            return $this->request('GET', "attachments/{$id}/pod-report");
        } catch (\Exception $e) {
            throw new AttachmentsException($e->getMessage(), 0, $e);
        }
    }

    /**
     * @throws AttachmentsException
     */
    public function getAttachmentsByConsignmentIds(array $ids)
    {
        try {
            return $this->request('POST', "attachments/consignments", [
                GuzzleHttp\RequestOptions::JSON => ['consignmentIds' => $ids]
            ]);
        } catch (\Exception $e) {
            throw new AttachmentsException($e->getMessage(), 0, $e);
        }
    }

    /**
     * @throws AttachmentsException
     */
    public function uploadAttachments(array $attachments)
    {
        try {
            return $this->request('POST', "attachments/upload", [
                GuzzleHttp\RequestOptions::JSON => ['attachments' => $attachments]
            ]);
        } catch (\Exception $e) {
            throw new AttachmentsException($e->getMessage(), 0, $e);
        }
    }
}

<?php

namespace Jpaylaga\MachshipWrapper\Contracts;

interface AttachmentsContract
{
    public function getAttachment(int $id);
    public function getAttachmentPodReport(int $id);
    public function getAttachmentsByConsignmentIds(array $ids);
    public function uploadAttachments(array $attachments);
}

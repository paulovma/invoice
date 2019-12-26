<?php


namespace App\Domain\Invoice\Repository;

use App\Domain\Invoice\DTO\AccessKeyDTO;
use App\Domain\Invoice\DTO\InvoiceDTO;

interface IGetInvoiceRepository
{

    public function getInvoiceByAccessKey(AccessKeyDTO $accessKeyDTO): InvoiceDTO;

}
<?php


namespace App\Domain\Invoice\Service;

use App\Domain\Invoice\DTO\AccessKeyDTO;
use App\Domain\Invoice\DTO\InvoiceDTO;

interface IGetInvoice
{

    public function getInvoice(AccessKeyDTO $accessKeyDTO): InvoiceDTO;

}
<?php


namespace App\UseCase\GetInvoice\Service;

use App\Domain\Invoice\DTO\AccessKeyDTO;
use App\Domain\Invoice\DTO\InvoiceDTO;
use App\Domain\Invoice\Repository\IGetInvoiceRepository;
use App\Domain\Invoice\Service\IGetInvoice;

class GetInvoiceService implements IGetInvoice
{

    /**
     * @var IGetInvoiceRepository
     */
    private $getInvoiceRepository;

    /**
     * GetInvoiceService constructor.
     * @param IGetInvoiceRepository $getInvoiceRepository
     */
    public function __construct(IGetInvoiceRepository $getInvoiceRepository)
    {
        $this->getInvoiceRepository = $getInvoiceRepository;
    }


    public function getInvoice(AccessKeyDTO $accessKeyDTO): InvoiceDTO
    {
        return $this->getInvoiceRepository->getInvoiceByAccessKey($accessKeyDTO);
    }
}
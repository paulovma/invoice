<?php


namespace App\UseCase\FetchInvoice\Service;

use App\UseCase\Client\GetArquiveiInvoiceClient;
use App\UseCase\Exception\CouldNotFetchInvoices;
use App\UseCase\Exception\CouldNotPersistInvoices;
use App\Domain\Invoice\Factory\InvoiceFactory;
use App\Domain\Invoice\Repository\IInvoicePersistenceRepository;
use App\Domain\Invoice\Service\IFetchInvoice;
use Psr\Http\Message\ResponseInterface;

class FetchInvoiceService implements IFetchInvoice
{

    /**
     * @var GetArquiveiInvoiceClient
     */
    private $getArquiveiInvoiceClient;

    /**
     * @var InvoiceFactory
     */
    private $invoiceFactory;

    /**
     * @var IInvoicePersistenceRepository
     */
    private $invoicePersistenceRepository;

    /**
     * FetchInvoiceService constructor.
     * @param GetArquiveiInvoiceClient $getArquiveiInvoiceClient
     * @param InvoiceFactory $invoiceFactory
     * @param IInvoicePersistenceRepository $invoicePersistenceRepository
     */
    public function __construct(
        GetArquiveiInvoiceClient $getArquiveiInvoiceClient,
        InvoiceFactory $invoiceFactory,
        IInvoicePersistenceRepository $invoicePersistenceRepository
    ) {
        $this->getArquiveiInvoiceClient = $getArquiveiInvoiceClient;
        $this->invoiceFactory = $invoiceFactory;
        $this->invoicePersistenceRepository = $invoicePersistenceRepository;
    }


    /**
     * @throws \App\UseCase\Exception\CouldNotFetchInvoices
     * @throws CouldNotPersistInvoices
     */
    public function fetch(): void
    {
        /** @var ResponseInterface $response */
        $response = $this->getArquiveiInvoiceClient->get();

        $arrInvoice = $this->invoiceFactory->make($response->data);
        try {
            $this->invoicePersistenceRepository->persistAll($arrInvoice);
        } catch (\Exception $e) {
            print_r($e->getMessage());exit;
            throw new CouldNotPersistInvoices();
        }
    }

}
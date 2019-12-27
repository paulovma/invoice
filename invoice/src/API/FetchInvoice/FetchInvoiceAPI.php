<?php


namespace App\API\FetchInvoice;

use App\API\Exception\HttpExceptionFormatter;
use App\UseCase\Exception\CouldNotFetchInvoices;
use App\UseCase\Exception\CouldNotPersistInvoices;
use App\Domain\Invoice\Service\IFetchInvoice;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;

/**
 * Class FetchInvoiceAPI
 * @package App\API\FetchInvoice
 *
 * @Route("/invoice/fetch")
 */
class FetchInvoiceAPI extends AbstractFOSRestController
{

    /**
     * @var IFetchInvoice
     */
    private $fetchInvoiceService;

    /**
     * @var HttpExceptionFormatter
     */
    private $exceptionFormatter;

    /**
     * FetchInvoiceAPI constructor.
     * @param IFetchInvoice $fetchInvoiceService
     * @param HttpExceptionFormatter $exceptionFormatter
     */
    public function __construct(
        IFetchInvoice $fetchInvoiceService,
        HttpExceptionFormatter $exceptionFormatter
    )
    {
        $this->fetchInvoiceService = $fetchInvoiceService;
        $this->exceptionFormatter = $exceptionFormatter;
    }


    /**
     * @Route(path="", name="fetch", methods={"POST"})
     *
     * @SWG\Response(
     *     response=204,
     *     description="Returned when the fetch went well."
     * )
     */
    public function fetch()
    {
        try {
            $this->fetchInvoiceService->fetch();
        } catch (CouldNotFetchInvoices $exception) {
            return $this->handleView($this->view($this->exceptionFormatter->format(new \App\API\Exception\CouldNotFetchInvoices())));
        } catch (CouldNotPersistInvoices $exception) {
            return $this->handleView($this->view($this->exceptionFormatter->format(new \App\API\Exception\CouldNotPersistInvoices())));
        }

        return $this->handleView($this->view(null, Response::HTTP_NO_CONTENT));
    }

}
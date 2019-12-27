<?php

namespace App\API\GetInvoice;

use App\API\DTO\InvoiceTotalDTO;
use App\API\Exception\HttpExceptionFormatter;
use App\API\Exception\InvoiceNotFound;
use App\UseCase\DTO\ExceptionResponseDTO;
use App\Domain\Invoice\DTO\AccessKeyDTO;
use App\Domain\Invoice\DTO\InvoiceDTO;
use App\Domain\Invoice\Service\IGetInvoice;
use Doctrine\ORM\NoResultException;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;
use Nelmio\ApiDocBundle\Annotation\Model;

/**
 * Class GetInvoiceAPI
 * @package App\API
 *
 * @Route("/invoice", name="get")
 */
class GetInvoiceAPI extends AbstractFOSRestController
{

    /** @var IGetInvoice  */
    private $getInvoiceService;

    /** @var HttpExceptionFormatter */
    private $exceptionFormatter;

    public function __construct(IGetInvoice $getInvoice, HttpExceptionFormatter $exceptionFormatter)
    {
        $this->getInvoiceService = $getInvoice;
        $this->exceptionFormatter = $exceptionFormatter;
    }


    /**
     * @Route("/{accessKey}", name="_invoice", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returned when the application was able to find an Invoice for the given access key.",
     *     @Model(type=InvoiceTotalDTO::class)
     * )
     *
     * @SWG\Response(
     *     response=404,
     *     description="Returned when the application was not able to find an Invoice for the given access key.",
     *     @Model(type=ExceptionResponseDTO::class)
     * )
     *
     * @param string $accessKey
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function get(string $accessKey)
    {
        try {
            /** @var InvoiceDTO $response */
            $response = $this->getInvoiceService->getInvoice(new AccessKeyDTO($accessKey));
            return $this->handleView($this->view(new InvoiceTotalDTO($response->getTotal())));
        } catch (NoResultException $exception) {
            return $this->handleView(
                $this->view($this->exceptionFormatter->format(new InvoiceNotFound()))
            );
        }

    }

}
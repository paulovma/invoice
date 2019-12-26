<?php


namespace App\API\Exception;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CouldNotFetchInvoices extends HttpException
{

    private const CODE = 101;

    /**
     * CouldNotFetchInvoices constructor.
     */
    public function __construct()
    {
        parent::__construct(
            Response::HTTP_INTERNAL_SERVER_ERROR,
            "A problem occurred when communicating to Arquivei.",
            null,
            null,
            self::CODE
        );

    }


}
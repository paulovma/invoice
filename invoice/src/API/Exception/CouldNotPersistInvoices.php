<?php


namespace App\API\Exception;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CouldNotPersistInvoices extends HttpException
{

    private const CODE = 103;

    /**
     * CouldNotPersistInvoices constructor.
     */
    public function __construct()
    {
        parent::__construct(
            Response::HTTP_INTERNAL_SERVER_ERROR,
            "A problem occurred when trying to persist an invoice.",
            null,
            array(),
            self::CODE
        );
    }

}
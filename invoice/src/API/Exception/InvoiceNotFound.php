<?php

namespace App\API\Exception;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class InvoiceNotFound extends NotFoundHttpException
{

    private const CODE = 100;

    /**
     * InvoiceNotFound constructor.
     */
    public function __construct()
    {
        parent::__construct("Invoice not found for the given access key", null,self::CODE);
    }
}
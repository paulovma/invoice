<?php


namespace App\UseCase\Exception;

use Exception;

class CouldNotPersistInvoices extends Exception
{

    private const CODE = 103;

    /**
     * CouldNotPersistInvoices constructor.
     */
    public function __construct()
    {
        parent::__construct("A problem occurred when trying to persist an invoice.", self::CODE);
    }
}
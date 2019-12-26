<?php


namespace App\UseCase\Exception;

use Exception;

class CouldNotFetchInvoices extends Exception
{

    private const CODE = 101;

    /**
     * CouldNotFetchInvoices constructor.
     */
    public function __construct()
    {
        parent::__construct("A problem occurred when communicating to Arquivei.", self::CODE);
    }


}
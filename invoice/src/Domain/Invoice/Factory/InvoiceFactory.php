<?php


namespace App\Domain\Invoice\Factory;



use App\Domain\Invoice\Entity\Invoice;

interface InvoiceFactory
{

    /**
     * @param array $data
     *
     * @return Invoice[]
     */
    public function make(array $data): array;

}
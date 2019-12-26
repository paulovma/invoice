<?php


namespace App\Domain\Invoice\Repository;


interface IInvoicePersistenceRepository
{

    /**
     * @param array $entities
     * @return bool
     */
    public function persistAll(array $entities): bool;

}
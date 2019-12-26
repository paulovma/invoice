<?php


namespace App\API\DTO;


class InvoiceTotalDTO
{

    /** @var float */
    private $total;

    /**
     * InvoiceDTO constructor.
     * @param float $total
     */
    public function __construct(float $total)
    {
        $this->total = $total;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

}
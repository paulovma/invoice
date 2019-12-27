<?php


namespace App\API\DTO;

use Swagger\Annotations as SWG;


class InvoiceTotalDTO
{

    /**
     * @var float
     *
     * @SWG\Property(type="number", description="The invoice's total value.")
     */
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
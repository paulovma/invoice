<?php


namespace App\Domain\Invoice\DTO;


class InvoiceDTO
{

    /** @var string */
    private $accessKey;

    /** @var float */
    private $total;

    /**
     * InvoiceDTO constructor.
     * @param string $accessKey
     * @param float $total
     */
    public function __construct(string $accessKey, float $total)
    {
        $this->accessKey = $accessKey;
        $this->total = $total;
    }

    /**
     * @return string
     */
    public function getAccessKey(): string
    {
        return $this->accessKey;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }


}
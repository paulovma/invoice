<?php

namespace App\Domain\Invoice\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\DBAL\Types\Type;


/**
 * Class Invoice
 * @package App\Entity\Invoice
 *
 * @Entity
 * @Table(name="invoice")
 */
class Invoice
{

    /**
     * @var integer
     *
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @Column(name="access_key", type="string")
     */
    private $accessKey;

    /**
     * @var float
     *
     * @Column(type="decimal", precision=10, scale=2)
     */
    private $total;

    /**
     * Invoice constructor.
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
     * @param string $accessKey
     */
    public function setAccessKey(string $accessKey): void
    {
        $this->accessKey = $accessKey;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @param float $total
     */
    public function setTotal(float $total): void
    {
        $this->total = $total;
    }


}
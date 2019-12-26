<?php


namespace App\Domain\Invoice\DTO;


class AccessKeyDTO
{

    /** @var string */
    private $accessKey;

    /**
     * AccessKeyDTO constructor.
     * @param string $accessKey
     */
    public function __construct(string $accessKey)
    {
        $this->accessKey = $accessKey;
    }

    /**
     * @return string
     */
    public function getAccessKey(): string
    {
        return $this->accessKey;
    }

}
<?php


namespace App\UseCase\DTO;


class ExceptionResponseDTO
{

    /**
     * @var string
     */
    private $message;

    /**
     * @var integer
     */
    private $code;

    /**
     * ExceptionResponseDTO constructor.
     * @param string $message
     * @param int $code
     */
    public function __construct(string $message, int $code)
    {
        $this->message = $message;
        $this->code = $code;
    }


}
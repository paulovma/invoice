<?php


namespace App\UseCase\DTO;

use Swagger\Annotations as SWG;

class ExceptionResponseDTO
{

    /**
     * @var string
     *
     * @SWG\Property(type="string", description="A user friendly error message")
     */
    private $message;

    /**
     * @var integer
     *
     * @SWG\Property(type="integer", description="The error code")
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
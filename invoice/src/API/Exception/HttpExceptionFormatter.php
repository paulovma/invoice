<?php


namespace App\API\Exception;

use App\UseCase\DTO\ExceptionResponseDTO;
use Symfony\Component\HttpKernel\Exception\HttpException;

class HttpExceptionFormatter
{

    public function format(HttpException $exception): ExceptionResponseDTO
    {
        return new ExceptionResponseDTO($exception->getMessage(), $exception->getCode());
    }

}
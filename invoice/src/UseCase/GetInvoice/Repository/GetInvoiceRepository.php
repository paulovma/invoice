<?php


namespace App\UseCase\GetInvoice\Repository;

use App\Domain\Invoice\DTO\AccessKeyDTO;
use App\Domain\Invoice\DTO\InvoiceDTO;
use App\Domain\Invoice\Entity\Invoice;
use App\Domain\Invoice\Repository\IGetInvoiceRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class GetInvoiceRepository implements IGetInvoiceRepository
{

    private $entityManager;

    /**
     * GetInvoiceRepository constructor.
     * @param $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function getInvoiceByAccessKey(AccessKeyDTO $accessKeyDTO): InvoiceDTO
    {
        $query = $this->entityManager->createQuery(
            'SELECT new App\Domain\Invoice\DTO\InvoiceDTO(i.accessKey, i.total) FROM App\Domain\Invoice\Entity\Invoice i WHERE i.accessKey = :accessKey'
        );

        $query->setParameter("accessKey", $accessKeyDTO->getAccessKey());
        return $query->getSingleResult();
    }
}
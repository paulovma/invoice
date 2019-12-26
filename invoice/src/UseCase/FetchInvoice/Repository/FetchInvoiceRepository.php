<?php


namespace App\UseCase\FetchInvoice\Repository;


use App\Domain\Invoice\Entity\Invoice;
use App\Domain\Invoice\Repository\IInvoicePersistenceRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMException;

class FetchInvoiceRepository implements IInvoicePersistenceRepository
{

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * FetchInvoiceRepository constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @param array $entities
     * @return bool
     * @throws ORMException
     * @throws \Doctrine\Common\Persistence\Mapping\MappingException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function persistAll(array $entities): bool
    {
        $batchSize = 10;
        $count = 0;
        foreach ($entities as $entity) {
            if ($entity instanceof Invoice && !$this->exists($entity)) {
                $this->entityManager->persist($entity);
                $count++;
            }

            if ($count % $batchSize === 0) {
                $this->entityManager->flush();
                $this->entityManager->clear();
            }
        }
        $this->entityManager->flush();
        $this->entityManager->clear();

        return true;
    }

    private function exists(Invoice $entity): bool
    {
        $query = $this->entityManager->createQuery(
            "SELECT i FROM App\Domain\Invoice\Entity\Invoice i WHERE i.accessKey = :accessKey"
        );

        $query->setParameter("accessKey", $entity->getAccessKey());

        return count($query->getResult()) > 0;
    }
}
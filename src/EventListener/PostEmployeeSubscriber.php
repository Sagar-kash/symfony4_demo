<?php

namespace App\EventListener;

use Doctrine\Common\EventSubscriber;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use App\Entity\Employee;

class PostEmployeeSubscriber implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return array(
            'postPersist',
            'postUpdate',
        );
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $this->index($args);
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $this->index($args);
    }

    public function index(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        if ($entity instanceof Employee) {

            $entityManager = $args->getEntityManager();
//            echo $entity->getId();exit;
            $dql = "Update employee set created_date = NOW() where id =".$entity->getId();
            $stmt = $entityManager->getConnection()->prepare($dql);
            $stmt->execute();
        }
    }
}

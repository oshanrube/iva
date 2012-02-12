<?php

namespace Acme\TaskBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * NotificationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NotificationRepository extends EntityRepository
{
	public function findByPendingNotifications() {
		$now = mktime(date("H"), date("i"), 0, date("m"), date("d"), date("Y"));
		$query = 'SELECT n FROM AcmeTaskBundle:Notification n WHERE n.datetime = :now';
		
		try{
			return $this->getEntityManager()
				->createQuery($query)
				->setParameter('now', $now)
				->getResult();
		} catch (\Doctrine\ORM\NoResultException $e) {
        return null;
    	}
	}
}
<?php

namespace Acme\TaskBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * TaskRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TaskRepository extends EntityRepository
{
	public function findByThisMonth($user) {
		$thisMonth = mktime(0, 0, 0, date('m'), 1, date('Y'));
		$nextMonth = mktime(0, 0, 0, (date('m')+1), 1, date('Y'));
		$query = 'SELECT t FROM AcmeTaskBundle:Task t WHERE t.datetime > :thisMonth AND t.datetime < :nextMonth AND t.userId = :userId';
		
		return $this->getEntityManager()
			->createQuery($query)
			->setParameter('thisMonth', $thisMonth)
			->setParameter('nextMonth', $nextMonth)
			->setParameter('userId', $user->getId())
			->getResult();
	}
	
	public function findOneByDay($id, $user) {
		$query = 'SELECT t FROM AcmeTaskBundle:Task t WHERE t.id = :id AND t.userId = :userId';
		
		return $this->getEntityManager()
			->createQuery($query)
			->setParameter('id', $id)
			->setParameter('userId',$user->getId())
			->getSingleResult();
	}
}
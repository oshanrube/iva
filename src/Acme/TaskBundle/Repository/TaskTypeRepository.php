<?php

namespace Acme\TaskBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * TaskTypeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TaskTypeRepository extends EntityRepository
{
	public function findOneByTask($task) {
		
		$query = 'SELECT tt FROM AcmeTaskBundle:TaskType tt WHERE LOWER(tt.title) LIKE :task ';
		
		return $this->getEntityManager()
			->createQuery($query)
			->setParameter('task', $task)
			->getSingleResult();
	}
	
}
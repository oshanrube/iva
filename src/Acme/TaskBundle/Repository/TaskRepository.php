<?php

namespace Acme\TaskBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * TaskRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TaskRepository extends EntityRepository
{
	public function findByThisMonth($user,$year,$month) {
		$thisMonth = mktime(0, 0, 0, $month, 1, $year);
		$nextMonth = mktime(0, 0, 0, ($month+1), 1, $year);
		$query = 'SELECT t FROM AcmeTaskBundle:Task t WHERE t.startTime > :thisMonth AND t.startTime < :nextMonth AND t.userId = :userId';
		
		return $this->getEntityManager()
			->createQuery($query)
			->setParameter('thisMonth', $thisMonth)
			->setParameter('nextMonth', $nextMonth)
			->setParameter('userId', $user->getId())
			->getResult();
	}
	
	public function findByCalendarMonth($user,$year,$month,$id) {
		$thisMonth = mktime(0, 0, 0, $month, 1, $year);
		$nextMonth = mktime(0, 0, 0, ($month+1), 1, $year);
		$query = 'SELECT t FROM AcmeTaskBundle:Task t WHERE t.startTime > :thisMonth AND t.startTime < :nextMonth AND t.userId = :userId AND t.calendarId = :id';
		
		return $this->getEntityManager()
			->createQuery($query)
			->setParameter('thisMonth', $thisMonth)
			->setParameter('nextMonth', $nextMonth)
			->setParameter('id', $id)
			->setParameter('userId', $user->getId())
			->getResult();
	}
	
	public function findByToday($user) {
		$today = mktime(0, 0, 0, date('m'), date('j'), date('Y'));
		$tommorow = mktime(0, 0, 0, date('m'), date('j')+1, date('Y'));
		$query = 'SELECT t FROM AcmeTaskBundle:Task t WHERE t.startTime > :today AND t.startTime < :tommorow AND t.userId = :userId';
		
		return $this->getEntityManager()
			->createQuery($query)
			->setParameter('today', $today)
			->setParameter('tommorow', $tommorow)
			->setParameter('userId', $user->getId())
			->getResult();
	}
	public function findOneByUserAndId($id, $user) {
		$query = 'SELECT t FROM AcmeTaskBundle:Task t WHERE t.id = :id AND t.userId = :userId';
		
		return $this->getEntityManager()
			->createQuery($query)
			->setParameter('id', $id)
			->setParameter('userId',$user->getId())
			->getSingleResult();
	}
	public function findByNotNotified() {
		$query = 'SELECT t FROM AcmeTaskBundle:Task t WHERE t.id NOT IN (SELECT n.taskId FROM AcmeTaskBundle:Notification n)';
		
		return $this->getEntityManager()
			->createQuery($query)
			->getResult();
	}
	
	//select all the task which is before the given datetime which belongs to the given user id and ALSO NOT EXPIRED YET 
	public function findOneByOneBefore($datetime,$userId) {
		$query = 'SELECT t FROM AcmeTaskBundle:Task t WHERE t.startTime < :datetime AND t.startTime > :now AND t.userId = :userId ORDER BY t.startTime DESC';
		
		try{
			return $this->getEntityManager()
				->createQuery($query)
				->setParameter('datetime', $datetime)
				->setParameter('userId', $userId)
				->setParameter('now', time())
				->setMaxResults(1)
				->getSingleResult();
		} catch (\Doctrine\ORM\NoResultException $e) {
        return null;
    	}
	}
	
}
<?php

namespace Acme\TaskBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Acme\NotificationsBundle\Model\TaskRepeatModel;
/**
 * TaskRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TaskRepository extends EntityRepository
{
	public function findByThisMonth($user,$year,$month) {
		//get no repeat
		$thisMonth = mktime(0, 0, 0, $month, 1, $year);
		$nextMonth = mktime(0, 0, 0, ($month+1), 1, $year);
		$query = 'SELECT t 
					FROM AcmeTaskBundle:Task t 
					WHERE (
						t.startTime > :thisMonth AND 
						t.startTime < :nextMonth AND 
						t.taskRepeatId = 1 ) 
						AND t.userId = :userId';
		$month = $this->getEntityManager()
			->createQuery($query)
			->setParameter('thisMonth', $thisMonth)
			->setParameter('nextMonth', $nextMonth)
			->setParameter('userId', $user->getId())
			->getResult();
		//get repeats
		$query = 'SELECT t FROM AcmeTaskBundle:Task t WHERE (t.taskRepeatId != 1 AND t.userId = :userId)';
		$events = $this->getEntityManager()
					->createQuery($query)
					->setParameter('userId', $user->getId())
					->getResult();
		foreach($events as $event){
			if($evnts = TaskRepeatModel::getRepeatFor($event,$thisMonth,$nextMonth)){
				$month = array_merge($month,$evnts);
			}
		}
		//
		return $month;
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
		$todayDateTime = mktime(0, 0, 0, date('m'), date('j'), date('Y'));
		$tommorow = mktime(0, 0, 0, date('m'), date('j')+1, date('Y'));
		$query = 'SELECT t FROM AcmeTaskBundle:Task t WHERE t.startTime > :today AND t.startTime < :tommorow AND t.userId = :userId AND t.taskRepeatId = 1';
		
		$today = $this->getEntityManager()
			->createQuery($query)
			->setParameter('today', $todayDateTime)
			->setParameter('tommorow', $tommorow)
			->setParameter('userId', $user->getId())
			->getResult();
		//get repeats
		$query = 'SELECT t FROM AcmeTaskBundle:Task t WHERE (t.taskRepeatId != 1 AND t.userId = :userId)';
		$events = $this->getEntityManager()
					->createQuery($query)
					->setParameter('userId', $user->getId())
					->getResult();
		foreach($events as $event){
			if($evnts = TaskRepeatModel::getRepeatFor($event,$todayDateTime,$tommorow)){
				$today = array_merge($today,$evnts);
			}
		}
		return $today;
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
	public function findOneByTitleandTime($task,$startTime) {
		$query = 'SELECT t FROM AcmeTaskBundle:Task t WHERE t.startTime = :startTime AND t.task = :task';
		
		try{
			return $this->getEntityManager()
				->createQuery($query)
				->setParameter('task', $task)
				->setParameter('startTime', $startTime)
				->setMaxResults(1)
				->getSingleResult();
		} catch (\Doctrine\ORM\NoResultException $e) {
        return null;
    	}
	}
	public function findByCurrentStartTime($user, $startTime, $endTime, $taskPriority) {
		
		$query = 'SELECT t 
					FROM AcmeTaskBundle:Task t 
					WHERE 
						t.startTime >= :startTime AND 
						t.startTime <= :endTime AND 
						t.userId = :userId AND
						t.taskPriorityId != 1 AND
						t.taskPriorityId > :taskPriority';
		try{
			return $this->getEntityManager()
				->createQuery($query)
				->setParameter('startTime', $startTime)				
				->setParameter('endTime', $endTime)
				->setParameter('userId', $user->getId())
				->setParameter('taskPriority', $taskPriority)
				->getResult();
		} catch (\Doctrine\ORM\NoResultException $e) {
        return null;
    	}
	}
	public function findByDay($user,$year,$month,$day) {
		$todayDateTime = mktime(0, 0, 0, $month, $day, $year);
		$tommorow = mktime(0, 0, 0, $month, $day+1, $year);
		$query = 'SELECT t FROM AcmeTaskBundle:Task t WHERE t.startTime > :today AND t.startTime < :tommorow AND t.userId = :userId AND t.taskRepeatId = 1';
		
		$today = $this->getEntityManager()
			->createQuery($query)
			->setParameter('today', $todayDateTime)
			->setParameter('tommorow', $tommorow)
			->setParameter('userId', $user->getId())
			->getResult();
		//get repeats
		$query = 'SELECT t FROM AcmeTaskBundle:Task t WHERE (t.taskRepeatId != 1 AND t.userId = :userId)';
		$events = $this->getEntityManager()
					->createQuery($query)
					->setParameter('userId', $user->getId())
					->getResult();
		foreach($events as $event){
			if($evnts = TaskRepeatModel::getRepeatFor($event,$todayDateTime,$tommorow)){
				$today = array_merge($today,$evnts);
			}
		}
		return $today;
	}
}
<?php

namespace balou\MenuBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * menuRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class menuRepository extends EntityRepository
{
	function menuParBloc(){
		return $this->getEntityManager()->createQueryBuilder('m')
			->select('m, bm')
			->join('m.blocMenu', 'bm')
			->getResult();
	}
}

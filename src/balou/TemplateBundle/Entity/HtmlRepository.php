<?php

namespace balou\TemplateBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * HtmlRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class HtmlRepository extends EntityRepository
{
	function hmlParBloc(){
		return $this->getEntityManager()->createQueryBuilder('h')
			->select('h, bh')
			->join('h.BlocHtml', 'bh')
			->getResult();
	}
}
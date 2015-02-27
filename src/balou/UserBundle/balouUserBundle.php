<?php

namespace balou\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class balouUserBundle extends Bundle
{
	public function getParent(){
		return 'FOSUserBundle';
	}
}

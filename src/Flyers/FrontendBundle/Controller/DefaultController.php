<?php

namespace Flyers\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
    	//die('v');
        return array();
    }

    /**
     * @Route("/vic")
     * @Template()
     */
    public function vicAction()
    {
    	return array('name' => 'vikas' );
    }
}

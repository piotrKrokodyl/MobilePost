<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle:index.html.twig');
    }
		
		/**
		*
		*/
		public function indexAction2()
		{
			$parcel_orders = $this->getDoctrine()->getRepository('AppBundle:ParcelOrder')->findAllOrderedById();
			return $this->render('AppBundle:Default:index.html.twig',array( 'ParcelOrder' => $parcel_orders ) );
		}
}

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
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
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

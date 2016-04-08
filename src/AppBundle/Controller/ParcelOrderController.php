<?php

namespace AppBundle\Controller;

use AppBundle\Exception\InvalidFormException;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;

class ParcelOrderController extends FOSRestController 
{
    public function getParcelorderAction($id){
        $data = $this->getDoctrine()->getRepository('AppBundle\Entity\ParcelOrder')->findOneById($id);
        $view = $this->view($data, 200);
        return $this->handleView($view);
    }

    public function postParcelorderAction(Request $request)
    {
        try {
            $new = $this->container
                ->get('pai_rest.parcelorder.form')
                ->post($request->request->all());
            $routeOptions = array(
                'id' => $new->getId(),
                '_format' => $request->get('_format')
            );
            $view = $this->routeRedirectView('api_1_get_parcelorder', $routeOptions);
        }
        catch (InvalidFormException $exception)
        {
            $view = $this->view(array('form' => $exception->getForm()), 400);
        }
        return $this->handleView($view);
    }
	
	/**
	*deleteParcelorderAction - implemented by Och Tomasz
	*
	*/
	public function deleteParcelorderAction(Request $request, $id) 
	{ 
		var_dump($request);
		$parcel = $this->getDoctrine()->getRepository('PAIParcelBundle:Parcelorder')->find($id);
		if ($parcel)
		{
			$this->getDoctrine()->getRepository('PAIParcelBundle:Parcelorfer')->delete($parcel);
		}
		else
		{
			
			throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.', $id));
		}	
	}
}

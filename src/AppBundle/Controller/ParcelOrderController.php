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
}

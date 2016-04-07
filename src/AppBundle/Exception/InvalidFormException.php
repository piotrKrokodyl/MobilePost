<?php
namespace AppBundle\Exception;

class InvalidFormException extends \RuntimeException
{
    protected $form;

    function __construct($message, $form)
    {
        parent::__construct($message);
        $this->form = $form;
    }

    function getForm()
    {
        return $this->form;
    }
}

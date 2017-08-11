<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PanelController extends Controller
{
    /**
     * @Route("/", name="panel")
     */
    public function boardAction()
    {
        return $this->render('CoreBundle:Panel:board.html.twig');
    }
}

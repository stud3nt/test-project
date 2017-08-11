<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class StatisticsController extends Controller
{
    /**
     * @Route("/statistics", name="statistics")
     */
    public function indexAction() : Response
    {
        $repository = $this->getDoctrine()->getRepository("CoreBundle:Weather\Information");

        return $this->render('CoreBundle:Statistics:board.html.twig', [
            "lastSearches" => $repository->findBy(
                [],
                ['createdAt' => "DESC"],
                10,
                0
            ),
            "statistics" => $repository->getSearchStatistics()
        ]);
    }
}

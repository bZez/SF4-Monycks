<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GlobalController extends Controller
{
    /**
     * @Route("/",name="homepage")
     */
    public function indexAction(/*UserRepository $userRepository*/)
    {
        /*        $receiver = $userRepository->find(2);
                $receiver->setMonycks(10);
                $u = $this->getUser();
                $u->setMonycks(10);
                $u->credit($receiver,2);
                $sender = $u->getMonycks();
                $receiver = $receiver->getMonycks();*/
        return $this->render('base.html.twig');
    }
}

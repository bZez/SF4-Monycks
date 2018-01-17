<?php

namespace App\Controller;

use App\Entity\Ticket;
use App\Form\TicketType;
use App\Repository\SkillRepository;
use App\Repository\TicketRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TicketController extends Controller
{
    /**
     * @Route("/ticket/new", name="ticket")
     */
    public function index(Request $request, TicketRepository $ticketRepository,SkillRepository $skillRepository)
    {
        // 1) build the skillForm
        $ticket = new Ticket();
        $ticketForm = $this->createForm(TicketType::class, $ticket);
        $tickets = $ticketRepository->findAll();
        $skills = $skillRepository->findAll();

        // 2) handle the submit (will only happen on POST)
        $ticketForm->handleRequest($request);


        if ($ticketForm->isSubmitted() && $ticketForm->isValid()) {

            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($ticket);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the skill

            return $this->redirectToRoute('ticket_list');
        }

        return $this->render(
            'ticket/add.html.twig',
            array(
                'ticketForm' => $ticketForm->createView(),
                'tickets' => $tickets,
                'skills' => $skills
            )
        );
    }
}

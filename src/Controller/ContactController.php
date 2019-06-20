<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Notification\ContactNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @return Response
     */

    public function index(Request $request): Response
    {
        $form = $this->createForm(ContactType::class);
        return $this->render('pages/contact.html.twig', [
            'form' =>$form->createView()
        ]);
    }

    /**
     * @param Contact $contact
     * @param Request $request
     * @param ContactNotification $notification
     * @return Response
     */
    public function show(Contact $contact, Request $request, ContactNotification $notification): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        return $this->render('contact/show', [
            'form' => $form->createView()
        ]);

        if ($form->isSubmitted() && $form->isValid()){
            $notification->notify($contact);
            $this->addFlash('succes', 'Votre email a bien été envoyé');
            return $this->redirectToRoute('/');

           
        }
    }

}
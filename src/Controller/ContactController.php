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
    public function new(Request $request, \Swift_Mailer $mailer)
    {


        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $datas = $form->getData();
            $this->sendMail($datas, $mailer);
        }
        return $this->render('pages/contact.html.twig', [
            'form' => $form->createView(),
        ]);

        // # code...
        // $contact = new Contact();
        // $contact->setFirstname("");
        // $form = $this->createFormBuilder($contact)
        //     ->add('firstname', TextType::class)
        //     ->add('lastname', TextType::class)
        //     ->add('email', TextType::class)
        //     ->add('message', TextareaType::class)
        //     ->add('save', SubmitType::class)
        //     ->getForm();
        // $form->handleRequest($request);
        // if ($form->isSubmitted() ){
        //     $contact=$form->getData();
        //     // $notification->notify($contact);
        //     $this->addFlash('succes', 'Votre email a bien été envoyé');
        //     return $this->redirectToRoute('/kouzina');
        // }
        // return $this->render('pages/contact.html.twig', [
        //     'form' => $form->createView()
        // ]);
    }

        /**
     * Envoi d'un mail avec SwiftMailer
     * @param $datas
     * @param \Swift_Mailer $mailer
     */
    private function sendMail($datas, \Swift_Mailer $mailer)
    {
        $message = new \Swift_Message();
        $message->setSubject($datas['firstname']);
        $message->setFrom('noreply@monsite.fr');
        $message->setTo('anwal.blog@gmail.com');
        $message->setBody(
            $this->renderView('emails/contact.html.twig', [
                'datas' => $datas
            ]),
            'text/html'
        );
        $mailer->send($message);
    }

    public function index(Request $request): Response
    {
        $form = $this->createForm(ContactType::class);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $notification->notify($contact);
            $this->addFlash('succes', 'Votre email a bien été envoyé');
            return $this->redirectToRoute('/');
        }
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

        if ($form->isSubmitted() && $form->isValid()) {
            $notification->notify($contact);
            $this->addFlash('succes', 'Votre email a bien été envoyé');
            return $this->redirectToRoute('/');
        }
    }
}

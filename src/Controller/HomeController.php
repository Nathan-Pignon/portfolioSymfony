<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Recommandation;
use App\Form\CommentType;
use App\Form\ContactType;
use App\Repository\RecommandationRepository;
use App\Repository\ValidationRepository;
use Doctrine\ORM\EntityManagerInterface;
use PhpParser\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="portfolio_home")
     */
    public function index(ValidationRepository $repo, Request $request, EntityManagerInterface $manager)
    {
        /* -------------------------------------------------------  Form contact  ------------------------------------------------------ */
        $message = new Contact();
        $form_contact = $this->createForm(ContactType::class, $message);

        $form_contact->handleRequest($request);
        if ($form_contact->isSubmitted() && $form_contact->isValid()){
            $message->setCreatedAt(new \DateTime());
            $manager->persist($message);
            $manager->flush();

            return $this->redirectToRoute('portfolio_home');

        }

        /* -------------------------------------------------------  Form recommandation  ------------------------------------------------------ */
        $commentaires = $repo->findAll();

        $comment = new Recommandation();
        $form_reco = $this->createForm(CommentType::class, $comment);

        $form_reco->handleRequest($request);
        if ($form_reco->isSubmitted() && $form_reco->isValid()){
            $comment->setCreatedAt(new \DateTime());
            $manager->persist($comment);
            $manager->flush();

            return $this->redirectToRoute('portfolio_home');
        }
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'commentaires' => $commentaires,
            'commentForm' => $form_reco->createView(),
            'contactForm' => $form_contact->createView(),
        ]);
    }

    /**
     * @Route("/contact", name="portfolio_contact")
     */
    public function contact(Request $request, EntityManagerInterface $manager)
    {
        $message = new Contact();
        $form_contact = $this->createForm(ContactType::class, $message);

        $form_contact->handleRequest($request);
        if ($form_contact->isSubmitted() && $form_contact->isValid()){
            $message->setCreatedAt(new \DateTime());
            $manager->persist($message);
            $manager->flush();

            return $this->redirectToRoute('portfolio_envoye');

        }
        return $this->render('home/contact.html.twig', [
            'contactForm' => $form_contact->createView(),
        ]);
    }

    /**
     * @Route("/contacts", name="portfolio_envoye")
     */
    public function envoye(Request $request, EntityManagerInterface $manager)
    {
        $message = new Contact();
        $form = $this->createForm(ContactType::class, $message);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $message->setCreatedAt(new \DateTime());
            $manager->persist($message);
            $manager->flush();

            return $this->redirectToRoute('portfolio_envoye');

        }
        return $this->render('home/envoye.html.twig', [
            'contactForm' => $form->createView(),]);
    }
}

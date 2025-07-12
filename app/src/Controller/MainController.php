<?php

namespace App\Controller;

use App\Entity\Contacts;
use App\Form\ContactsType;
use App\Repository\SkillsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(SkillsRepository $skillsRepository, Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $skills = $skillsRepository->findAll();

        $message = new Contacts();
        $form = $this->createForm(ContactsType::class, $message);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $entityManagerInterface->persist($message);
            $entityManagerInterface->flush();

            $this->addFlash('success', 'Message envoyé avec succès');

            $this->redirectToRoute('app_main');
        }
        return $this->render('main/index.html.twig', compact('skills', 'form'));
    }
}

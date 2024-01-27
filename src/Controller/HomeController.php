<?php

namespace App\Controller;

use App\Form\DropFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(DropFormType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $pdf = $form->getData();
            // ... perform some action, such as saving the task to the database

            dump($pdf);
            //return $this->redirectToRoute('task_success');
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'form'=>$form
        ]);
    }
}

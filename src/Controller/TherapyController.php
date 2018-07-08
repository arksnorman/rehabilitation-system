<?php

namespace App\Controller;


use App\Entity\Therapy;
use App\Form\TherapyType;
use App\Repository\TherapyRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TherapyController extends Controller
{
    public function index(): Response
    {
        return $this->render('therapy/index.html.twig', []);
    }

    public function new(Request $request): Response
    {
        $therapy = new Therapy();
        $form = $this->createForm(TherapyType::class, $therapy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->getDoctrine()->getManager()->persist($therapy);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Therapy added successfully');
            return $this->redirectToRoute('therapies');
        }

        return $this->render('therapy/new.html.twig', [
            'therapy' => $therapy,
            'form' => $form->createView(),
        ]);
    }

    public function show(Therapy $therapy): Response
    {
        return $this->render('therapy/show.html.twig', ['therapy' => $therapy]);
    }

    public function edit(Request $request, Therapy $therapy): Response
    {
        $form = $this->createForm(TherapyType::class, $therapy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Therapy edited successfully');
            return $this->redirectToRoute('editTherapy', ['id' => $therapy->getId()]);
        }

        return $this->render('therapy/edit.html.twig', [
            'therapy' => $therapy,
            'form' => $form->createView(),
        ]);
    }

    public function delete(Therapy $therapy): Response
    {
        $this->getDoctrine()->getManager()->remove($therapy);
        $this->getDoctrine()->getManager()->flush();
        $this->addFlash('success', 'Therapy deleted successfully');
        return $this->redirectToRoute('therapies');
    }
}

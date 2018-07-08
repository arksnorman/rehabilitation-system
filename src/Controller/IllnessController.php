<?php

namespace App\Controller;

use App\Entity\Illness;
use App\Form\IllnessType;
use App\Repository\IllnessRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/illness")
 */
class IllnessController extends Controller
{
    /**
     * @Route("/", name="illness_index", methods="GET")
     */
    public function index(IllnessRepository $illnessRepository): Response
    {
        return $this->render('illness/index.html.twig', ['illnesses' => $illnessRepository->findAll()]);
    }

    /**
     * @Route("/new", name="illness_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $illness = new Illness();
        $form = $this->createForm(IllnessType::class, $illness);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($illness);
            $em->flush();
            $this->addFlash('success', 'Illness added successfully');
            return $this->redirectToRoute('illness_index');
        }

        return $this->render('illness/new.html.twig', [
            'illness' => $illness,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="illness_show", methods="GET")
     */
    public function show(Illness $illness): Response
    {
        return $this->render('illness/show.html.twig', ['illness' => $illness]);
    }

    /**
     * @Route("/{id}/edit", name="illness_edit", methods="GET|POST")
     */
    public function edit(Request $request, Illness $illness): Response
    {
        $form = $this->createForm(IllnessType::class, $illness);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Illness successfully updated');
            return $this->redirectToRoute('illness_edit', ['id' => $illness->getId()]);
        }

        return $this->render('illness/edit.html.twig', [
            'illness' => $illness,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/delete/", name="illness_delete")
     */
    public function delete(Illness $illness): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($illness);
        $em->flush();
        $this->addFlash('success', 'Illness deleted successfully');
        return $this->redirectToRoute('illness_index');
    }
}

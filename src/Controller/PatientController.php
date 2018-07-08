<?php

namespace App\Controller;


use App\Entity\Patient;
use App\Form\PatientType;
use App\Repository\PatientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PatientController extends Controller
{

    public function index(): Response
    {
        return $this->render('patient/index.html.twig', []);
    }

    public function new(Request $request): Response
    {
        $patient = new Patient();
        $form = $this->createForm(PatientType::class, $patient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $patient->setComments(null);
            $patient->setParentComments(null);
            $patient->setDateCreated();
            $em = $this->getDoctrine()->getManager();
            $em->persist($patient);
            $em->flush();
            $this->addFlash('success', 'Patient has been successfully added to the system');
            return $this->redirectToRoute('newPatient');
        }

        return $this->render('patient/new.html.twig', [
            'patient' => $patient,
            'form' => $form->createView(),
        ]);
    }

    public function show(Patient $patient): Response
    {
        return $this->render('patient/show.html.twig', ['patient' => $patient]);
    }

    public function edit(Request $request, Patient $patient): Response
    {
        $form = $this->createForm(PatientType::class, $patient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Patient updated successfully');
            return $this->redirectToRoute('editPatient', ['id' => $patient->getId()]);
        }

        return $this->render('patient/edit.html.twig', [
            'patient' => $patient,
            'form' => $form->createView(),
        ]);
    }

    public function delete(Patient $patient): Response
    {
        $this->getDoctrine()->getManager()->remove($patient);
        $this->getDoctrine()->getManager()->flush();
        $this->addFlash('success', 'Patient deleted successfully');
        return $this->redirectToRoute('patients');
    }
}

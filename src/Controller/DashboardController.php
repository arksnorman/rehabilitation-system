<?php

namespace App\Controller;

use App\Repository\PatientRepository;
use App\Repository\TherapyRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    /**
     * @Route("/dashboard", name="dashboard")
     * @param PatientRepository $patientRepository
     * @param TherapyRepository $therapyRepository
     * @param UserRepository $userRepository
     * @return Response
     */
    public function index(
        PatientRepository $patientRepository,
        TherapyRepository $therapyRepository,
        UserRepository $userRepository
    ) :Response
    {
        return $this->render('dashboard/index.html.twig', [
            'patients' => count($patientRepository->findAll()),
            'users' => count($userRepository->findAll()),
            'therapies' => count($therapyRepository->findAll()),
            'illPatients' => $patientRepository->getIllPatients(),
        ]);
    }
}

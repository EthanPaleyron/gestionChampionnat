<?php
namespace App\Controller;

use App\Repository\ChampionshipRepository;
use App\Repository\TeamRepository;
use App\Repository\DayRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\ChampionshipService;
use Symfony\Component\HttpFoundation\Request;

class ChampionshipController extends AbstractController
{
    #[Route('/', name: 'home', methods: ['GET'])]
    public function getAllChampionships(ChampionshipRepository $championshipRepository): Response
    {
        $championships = $championshipRepository->getAll();

        return $this->render("championship/index.html.twig", [
            'championships' => $championships,
        ]);
    }

    #[Route('/championship/{idChampionship}', name: 'championship', methods: ['GET'])]
    public function getChampionshipById(int $idChampionship, ChampionshipRepository $championshipRepository, TeamRepository $teamRepository, DayRepository $dayRepository): Response
    {
        $championship = $championshipRepository->getById($idChampionship);
        $teams = $teamRepository->getAll();
        $days = $dayRepository->getAllFormIdChampionship($idChampionship);

        return $this->render("championship/show.html.twig", [
            'championship' => $championship,
            'teams' => $teams,
            'days' => $days,
        ]);
    }


    #[Route('/admin/dashboard/championship', name: 'dashboard_championship', methods: ['GET'])]
    public function getAllChampionshipsToAdmin(ChampionshipRepository $championshipRepository): Response
    {
        $championships = $championshipRepository->getAll();

        return $this->render("admin/championship/dashboard.html.twig", [
            'championships' => $championships,
        ]);
    }


    #[Route('/admin/dashboard/championship/delete/{idChampionship}', name: 'delete_championship', methods: ['POST'])]
    public function deleteChampionshipById(Request $request, int $idChampionship, ChampionshipService $championshipService, ChampionshipRepository $championshipRepository): Response
    {
        $championship = $championshipRepository->getById($idChampionship);
        if (!$championship) {
            $this->addFlash('error', 'Championship not found.');
            return $this->redirectToRoute('dashboard_championship');
        }

        $token = $request->request->get('_token');
        if ($this->isCsrfTokenValid('delete' . $idChampionship, $token)) {
            $championshipService->deleteChampionship($championship);
            $this->addFlash('success', 'Championship deleted successfully.');
        }

        return $this->redirectToRoute('dashboard_championship');
    }
}
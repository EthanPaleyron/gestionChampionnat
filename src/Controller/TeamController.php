<?php

namespace App\Controller;

use App\Repository\TeamRepository;
use App\Service\TeamService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

final class TeamController extends AbstractController
{
    #[Route('/team/{idTeam}', name: 'team', methods: ['GET'])]
    public function getTeamById(int $idTeam, TeamRepository $teamRepository): Response
    {
        $team = $teamRepository->getById($idTeam);

        return $this->render("team/index.html.twig", [
            'team' => $team,
        ]);
    }

    #[Route('/admin/dashboard/country/insert', name: 'add_team', methods: ['POST'])]
    public function addTeam(Request $request, TeamService $teamService): Response
    {
        $data = json_decode($request->getContent(), true);

        if (!isset($data['name']) || empty($data['name'])) {
            return $this->json(['error' => 'Team name is required'], Response::HTTP_BAD_REQUEST);
        }

        $team = $teamService->saveTeam($data['name']);

        return $this->json(['message' => 'Team added successfully', 'team' => $team], Response::HTTP_CREATED);
    }
}

<?php

namespace App\Controller\Wiki;

use App\Repository\SpellRepository;
use App\Service\Tools\ArrayMaker;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/wiki/spell', name: 'app_wiki_spell')]
class SpellController extends AbstractController
{
    public function __construct(
        private readonly ArrayMaker $arrayMaker,
        private readonly SpellRepository $spellRepository
    ) {
    }

    #[Route('/', name: '_index')]
    public function index(): Response
    {
        $url = 'app_wiki_spell_list';

        $arrayColumnKeys = ['id', 'name', 'type', 'level'];
        $arrayColumnLabels = ['Id', 'Name', 'Type', 'Level'];

        return $this->render('spell/index.html.twig', [
            'url' => $url,
            'arrayKeys' => $arrayColumnKeys,
            'arrayLabels' => $arrayColumnLabels
        ]);
    }

    #[Route('/list', name: '_list', options: ['expose' => true])]
    public function list(): Response
    {
        $spells = $this->spellRepository->findAll();
        
        $list = $this->arrayMaker->spellArrayMaker($spells);

        // retour json car le template a besoin d'un json comme donnée d'entrée
        return new JsonResponse($list);
    }
}

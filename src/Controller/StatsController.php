<?php

namespace App\Controller;

use App\Entity\Stats;
use App\Form\StatsType;
use App\Repository\AgenceRepository;
use App\Repository\StatsRepository;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/stats')]
class StatsController extends AbstractController
{
    #[Route('/show', name: 'app_stats_index', methods: ['GET'])]
    public function index(StatsRepository $statsRepository,AgenceRepository $agenceRepository): Response
    {

   //var_dump($statsRepository->GetMatierePremiereTotalByAgence(1));
    //var_dump($statsRepository->GetCATotalByAgence(1));
    //var_dump($statsRepository->GetBenefTotalByAgence(1));
    //var_dump($statsRepository->GetNbrAgence()[0][1]);
    //var_dump( $agenceRepository->GetAllName()[1]['Nom']);

  
        
        //$UneStat=$statsRepository->GetAllStats()[1][2];
        //var_dump($UneStat);  
        return $this->render('stats/index.html.twig', [
            'stats' => $statsRepository->findAll(),
            'sommeCA' => $statsRepository->GetCATotal()[0][1],
            'sommeBenef' => $statsRepository->GetBenefTotal()[0][1],
            'sommeCoutTotal' => $statsRepository->GetCoutTotal()[0][1],
            'NbrAgence' => $statsRepository->GetNbrAgence()[0][1],
            'AllStats'=>$statsRepository->GetAllStats(),
            'AllNameAgence'=>$agenceRepository->GetAllName(),
            'Menu_Name'=>"Stats",
            'Sous_Link_Action_1'=>"",
            'Sous_Name_Action_1'=>"",
            'Name_Action_1'=>"Stats par agence",
        
            //'UneStat'=>$UneStat,
          

        ]);
    }

    #[Route('/new', name: 'app_stats_new', methods: ['GET', 'POST'])]
    public function new(Request $request, StatsRepository $statsRepository): Response
    {
        $stat = new Stats();
        $form = $this->createForm(StatsType::class, $stat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $statsRepository->save($stat, true);

            return $this->redirectToRoute('app_stats_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('stats/new.html.twig', [
            'stat' => $stat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_stats_show', methods: ['GET'])]
    public function show(Stats $stat, StatsRepository $statsRepository,AgenceRepository $agenceRepository): Response
    {
        
        return $this->render('stats/show.html.twig', [
            'stat' => $stat,
            'Menu_Name'=>"Stats",
            'Sous_Link_Action_1'=>"",
            'Sous_Name_Action_1'=>"",
            'Name_Action_1'=>"Stats par agence",
            'NbrAgence' => $statsRepository->GetNbrAgence()[0][1],
           'AllNameAgence'=>$agenceRepository->GetAllName(),
           'AllStats'=>$statsRepository->GetAllStats(),

        ]);
    }

    #[Route('/{id}/edit', name: 'app_stats_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Stats $stat, StatsRepository $statsRepository): Response
    {
        $form = $this->createForm(StatsType::class, $stat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $statsRepository->save($stat, true);

            return $this->redirectToRoute('app_stats_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('stats/edit.html.twig', [
            'stat' => $stat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_stats_delete', methods: ['POST'])]
    public function delete(Request $request, Stats $stat, StatsRepository $statsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stat->getId(), $request->request->get('_token'))) {
            $statsRepository->remove($stat, true);
        }

        return $this->redirectToRoute('app_stats_index', [], Response::HTTP_SEE_OTHER);
    }
}

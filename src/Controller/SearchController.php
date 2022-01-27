<?php

namespace App\Controller;

use App\Repository\FirstnameRepository;
use App\Search\Search;
use App\Search\SearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */

    /*affichage du formulaire de recherche*/
    function search(FirstnameRepository $firstnameRepository, Request $request): Response
    {
        $search = new Search();
        $form = $this->createForm(SearchType::class, $search);
        $form->handleRequest($request);
        $result = [];
        if ($form->isSubmitted() && $form->isValid()) {
            dump($search);
            $result = $firstnameRepository->findByFirstname($search);
        }else{
            dump($search);
        }

        return $this->render('pages/search.html.twig', ['searchForm' => $form->createView(),
            'firstnames' => $result
        ]);
    }


}
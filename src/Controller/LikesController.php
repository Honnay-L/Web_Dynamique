<?php

namespace App\Controller;


use App\Entity\Firstname;
use App\Entity\Likes;
use App\Entity\Usersite;
use App\Repository\LikesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LikesController extends AbstractController {



    /**
     * Permet de "liker" ou "unliker" un prénom
     *
     * @Route("/firstname/{id}/like", name="firstname_like", methods={"GET"})
     *
     * @param Firstname $firstname
     * @param EntityManagerInterface $em
     * @param LikesRepository $likesRepository
     * @return Response
     */

    /*système de like*/
    public function like(Firstname $firstname,EntityManagerInterface $em, LikesRepository $likesRepository,int $id) : Response
    {
        $user = $this->getUser();

        /*retourne une 403 si le user n'est pas connecté*/
        if(!$user) return $this->json([
            'code' => 403,
            'message' => "Unauthorized"
        ],403);

        /*suppression d'un like*/
        if($firstname->isLikedByUser($user)){
            $like = $likesRepository->findOneBy([
                'firstname' => $firstname,
                'user' => $user
            ]);

            $em->remove($like);
            $em->flush();

            return $this->json([
                'code' => 200,
                'message' => 'Like supprimé',
                'likes' => $likesRepository->count(['firstname' => $firstname]),
            ],200);

        }
        /*Ajout d'un like*/
        $like = new Likes();
        $like->setFirstname($firstname);
        $like->setUser($user);

        $em->persist($like);
        $em->flush();
        return $this->json([
            'code' => 200,
            'message' => 'Like ajouté',
            'likes' => $likesRepository->count(['firstname' => $firstname])
        ],200);
    }
}
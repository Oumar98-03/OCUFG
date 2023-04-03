<?php

namespace App\Controller;

use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/', name: 'app_admin')]
    public function index(ArticlesRepository $repos): Response
    {
        return $this->render('acceuil.html.twig',['articles'=>$repos->findAll()]);
    }
   
    #[Route('/Presentation')]
    public function pre()
    {
        $Etudiants=['Aly','Moussa','Oumar','Booba','Sow','Camara','Barry'];
        return $this->render('presentation.html.twig',["Etudiants" =>$Etudiants]);
    }

    #[Route('/Contact')]
    public function con(ArticlesRepository $repos)
    {
        $articles=$repos->findAll();
        return $this->render('contact.html.twig',['articles'=>$articles]);
    }

    #[Route('/Office')]
    public function Off()
    {
        $visiteur="Modibo Camara";
        return $this->render('Office.html.twig',[ "visiteur" =>$visiteur]);
    
    }

    #[Route('/Dropdown')]
    public function DPD()
    {
        return $this->render('Dropdown.html.twig');
    }

    #[Route('/article/{id}', name:'article_show')]
    public function show($id, ArticlesRepository $repos)
    {
        $article=$repos->find($id);
        
        return $this->render('article.html.twig', ['article'=>$article]);
    }

}



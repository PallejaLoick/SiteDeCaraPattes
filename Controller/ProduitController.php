<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\AccessoireRepository;
use App\Repository\JouetRepository;
use App\Repository\HygieneEtSoinRepository;
use App\Repository\ComplementAlimentaireRepository;
use App\Repository\CollierRepository;
use App\Repository\LaisseRepository;
use App\Repository\CroquetteRepository;

/**

 * @Route("/")
 */
class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="produit", methods={"GET"})
     */
    public function index(AccessoireRepository $AccessoireRepository, JouetRepository $JouetRepository, HygieneEtSoinRepository $HygieneEtSoinRepository, 
	ComplementAlimentaireRepository $ComplementAlimentaireRepository, CollierRepository $CollierRepository, LaisseRepository $LaisseRepository, 
	CroquetteRepository $CroquetteRepository): Response
    {
        return $this->render('produit/index.html.twig', [
			'accessoires' => $AccessoireRepository->findAll(), 
			'jouets' => $JouetRepository->findAll(),
			'soins' => $HygieneEtSoinRepository->findAll(), 
			'comps' => $ComplementAlimentaireRepository->findAll(),
			'colliers' => $CollierRepository->findAll(),
			'laisses' => $LaisseRepository->findAll(),
			'croquettes'=>$CroquetteRepository->findAll(),
        ]);
		$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');
    }

	 /**
     * @Route("/boutique", name="boutique", methods={"GET"})
     */
    public function index2(CollierRepository $CollierRepository, LaisseRepository $LaisseRepository, 
	CroquetteRepository $CroquetteRepository, AccessoireRepository $AccessoireRepository, JouetRepository $JouetRepository, HygieneEtSoinRepository $HygieneEtSoinRepository, 
	ComplementAlimentaireRepository $ComplementAlimentaireRepository): Response
    {
        return $this->render('BoutiqueProduit/index.html.twig', [

			'colliers' => $CollierRepository->findAll(),
			'laisses' => $LaisseRepository->findAll(),
			'croquettes'=>$CroquetteRepository->findAll(),
			'accessoires' => $AccessoireRepository->findAll(), 
			'jouets' => $JouetRepository->findAll(),
			'soins' => $HygieneEtSoinRepository->findAll(), 
			'comps' => $ComplementAlimentaireRepository->findAll(),
        ]);
    }
	


}

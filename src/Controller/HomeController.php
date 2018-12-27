<?php
/**
 * Created by PhpStorm.
 * User: abdellahi
 * Date: 24/12/18
 * Time: 22:01
 */

namespace App\Controller;


use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends  AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(PropertyRepository $repository){
        $properties=$repository->findLatest();
        return $this->render( 'page/home.html.twig', [
            'properties'=>$properties
        ]);
    }

}
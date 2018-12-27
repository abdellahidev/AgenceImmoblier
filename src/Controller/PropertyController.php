<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{
    /**
     * @var PropertyRepository
     */
    private $repository;

    public function __construct(PropertyRepository $repository, ObjectManager $manager)
    {
        $this->repository=$repository;
        $this->manager=$manager;
    }
    /**
     * @Route("/property", name="property")

     */
    public function index()
    {

       // $repository=$this->repository->findAllVisible();

      //  dump($repository);
      // $repository[0]->setSold(true);
        // $repository[0]->setSold(true);
        // $this->manager->flush();
        return $this->render('property/index.html.twig', [
            'controller_name' => 'PropertyController',
        ]);
    }

    /**
     * @Route("/property/(slug)-{id}", name="property.show", requirements={"slug": "[a-z0-9\-]*"})

     */
    public function show(Property $property){
          /* return $this->redirectToRoute('property.show',[
               if($property->getSlug()!==$slug){
                     'id' =>$property->getId(),
                        'slug' =>$property->getSlug()],301 );
            }*/
        return $this->render('property/show.html.twig', [
            'property'=>$property,
            'controller_name' => 'PropertyController',
        ]);
    }
}

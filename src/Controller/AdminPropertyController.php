<?php

namespace App\Controller;

use App\Entity\Property;
use App\Form\PropertyType;
use App\Repository\PropertyRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminPropertyController extends AbstractController
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
     * @Route("/admin/property", name="admin_property")
     */
    public function index()
    {
        $properties=$this->repository->findAll();
        return $this->render('admin_property/index.html.twig', compact('properties')
       );
    }

    /**
     * @Route("/admin/property/new", name="admin_property.new")
     */
    public  function new(Request $request){
        $property=new Property();
        $form=$this->createForm(PropertyType::class, $property);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->manager->persist($property);
            $this->manager->flush();
            $this->addFlash('success', 'Bien Créer avec succès');
            return $this->redirectToRoute('admin_property');
        }
        return $this->render('admin_property/new.html.twig', ['property'=>$property,
                'form'=>$form->createView()]
        );
    }

    /**
     * @Route("/admin/property/{id}", name="admin_property.edit", methods="GET|POST")
     */
    public function edit(Property $property, Request $request){
        $form=$this->createForm(PropertyType::class, $property);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->manager->flush();
            $this->addFlash('success', 'Bien modifié avec succès');
            return $this->redirectToRoute('admin_property');
        }

        return $this->render('admin_property/edit.html.twig', ['property'=>$property,
                'form'=>$form->createView()]
        );
    }

    /**
     * @Route("/admin/property/{id}", name="admin_property.delete", methods="DELETE")
     */
    public function delete(Property $property, Request $request){
        if ($this->isCsrfTokenValid('delete' . $property->getId(), $request->get('_token'))){
            $this->manager->remove($property);
            $this->manager->flush();
            $this->addFlash('success', 'Bien supprimé avec succès');
            //return new Response('Suppression');
        }

        return $this->redirectToRoute('admin_property');
    }
}

<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Property;
use App\Entity\PropertySearch;
use App\Form\ContactType;
use App\Form\PropertySearchType;
use App\Notification\ContactNotification;
use App\Repository\PropertyRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(PaginatorInterface $paginator, Request $request)
    {
        $search=new PropertySearch();
        $form=$this->createForm(PropertySearchType::class, $search);
        $form->handleRequest($request);

        $properties=$paginator->paginate($this->repository->findAllVisibleQuery($search)
            ,$request->query->getInt('page', 1),12 );

        return $this->render('property/index.html.twig', [
            'controller_name' => 'PropertyController',
            'properties'=>$properties,
            'form'=>$form->createView()
        ]);
    }

    /**
     * @Route("/property/(slug)-{id}", name="property.show", requirements={"slug": "[a-z0-9\-]*"})

     */
    public function show(Property $property, Request $request, ContactNotification $notification){
        $contact= new Contact();
        $contact->setProperty($property);
        $form=$this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted()&&$form->isValid()){
            $notification->notify($contact);
            $this->addFlash('success', 'Votre email a été bien envoyé');
           // return $this->redirectToRoute('property.show');
        }

        return $this->render('property/show.html.twig', [
            'property'=>$property,
            'controller_name' => 'PropertyController',
            'form'=>$form->createView()
        ]);
    }
}

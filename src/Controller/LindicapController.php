<?php

namespace App\Controller;

use App\Entity\Lindicap;
use App\Form\LindicapType;
use App\Repository\LindicapRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/lindicap")
 */
class LindicapController extends AbstractController
{
    /**
     * @Route("/", name="lindicap_index", methods={"GET"})
     */
    public function index(LindicapRepository $lindicapRepository): Response
    {
        return $this->render('lindicap/index.html.twig', ['lindicaps' => $lindicapRepository->findAll()]);
    }

    /**
     * @Route("/new", name="lindicap_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $lindicap = new Lindicap();
        $form = $this->createForm(LindicapType::class, $lindicap);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($lindicap);
            $entityManager->flush();

            return $this->redirectToRoute('lindicap_index');
        }

        return $this->render('lindicap/new.html.twig', [
            'lindicap' => $lindicap,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lindicap_show", methods={"GET"})
     */
    public function show(Lindicap $lindicap): Response
    {
        return $this->render('lindicap/show.html.twig', ['lindicap' => $lindicap]);
    }

    /**
     * @Route("/{id}/edit", name="lindicap_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Lindicap $lindicap): Response
    {
        $form = $this->createForm(LindicapType::class, $lindicap);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lindicap_index', ['id' => $lindicap->getId()]);
        }

        return $this->render('lindicap/edit.html.twig', [
            'lindicap' => $lindicap,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lindicap_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Lindicap $lindicap): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lindicap->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($lindicap);
            $entityManager->flush();
        }

        return $this->redirectToRoute('lindicap_index');
    }
}

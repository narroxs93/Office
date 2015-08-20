<?php

namespace Cinetic\AvisosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Cinetic\AvisosBundle\Entity\Avisos;
use Cinetic\AvisosBundle\Form\AvisosType;

/**
 * Avisos controller.
 *
 * @Route("/avisos")
 */
class AvisosController extends Controller
{

    /**
     * Lists all Avisos entities.
     *
     * @Route("/", name="avisos")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $avisos = $em->getRepository('CineticAvisosBundle:Avisos')->findAll();

        return $this->render('avisos/avisos.html.twig', array('avisos' => $avisos));
    }

    /**
     * Creates a new Avisos entity.
     * When the Avisos entity is created, it shows the form to perform one.
     * If the form is valid, it shows the new entity Avisos created. /show.
     *
     * @Route("/", name="avisos_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $avisos = new Avisos();
        $form = $this->createCreateForm($avisos);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($avisos);
            $em->flush();

            return $this->redirect($this->generateUrl('avisos_show', array('id' => $avisos->getId())));
        }

        return $this->render('avisos/new.html.twig', array(
            'avisos' => $avisos,
            'form' => $form->createView(),
        ));
    }


    /**
     * Displays a form to create a new Avisos entity.
     *
     * @Route("/new", name="avisos_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $avisos = new Avisos();
        $form   = $this->createCreateForm($avisos);

        return $this->render('avisos/new.html.twig', array(
            'avisos' => $avisos,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Avisos entity.
     *
     * @Route("/{id}", name="avisos_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $aviso = $em->getRepository('CineticAvisosBundle:Avisos')->find($id);

        if (!$aviso) {
            throw $this->createNotFoundException('No se ha encontrado la entidad Avisos.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('avisos/show.html.twig', array(
            'aviso' => $aviso,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Avisos entity.
     *
     * @Route("/{id}/edit", name="avisos_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $aviso = $em->getRepository('CineticAvisosBundle:Avisos')->find($id);

        if (!$aviso) {
            throw $this->createNotFoundException('No se ha encontrado la entidad Avisos.');
        }

        $editForm = $this->createEditForm($aviso);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('avisos/edit.html.twig', array(
            'aviso' => $aviso,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }


    /**
     * Edits an existing Avisos entity.
     *
     * @Route("/{id}", name="avisos_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $aviso = $em->getRepository('CineticAvisosBundle:Avisos')->find($id);

        if (!$aviso) {
            throw $this->createNotFoundException('Unable to find Avisos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($aviso);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            $this->addFlash(
                'notice',
                "Editado correctamente Aviso". $id . "."
            );
            return $this->redirect($this->generateUrl('avisos_edit', array('id' => $id)));
        }

        return $this->render('avisos/edit.html.twig',array(
            'aviso'      => $aviso,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Avisos entity.
     *
     * @Route("/{id}", name="avisos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $aviso = $em->getRepository('CineticAvisosBundle:Avisos')->find($id);

            if (!$aviso) {
                throw $this->createNotFoundException('Unable to find Avisos entity.');
            }

            $em->remove($aviso);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('avisos'));
    }


    /**
     * Creates a form to create a Avisos entity.
     *
     * @param Avisos $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Avisos $entity)
    {
        $form = $this->createForm(new AvisosType(), $entity, array(
            'action' => $this->generateUrl('avisos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear nuevo aviso'));

        return $form;
    }

    /**
     * Creates a form to edit a Avisos entity.
     *
     * @param Avisos $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Avisos $entity)
    {
        $form = $this->createForm(new AvisosType(), $entity, array(
            'action' => $this->generateUrl('avisos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Editar Aviso'));

        return $form;
    }

    /**
     * Creates a form to delete a Avisos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('avisos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar Aviso'))
            ->getForm()
        ;
    }
}

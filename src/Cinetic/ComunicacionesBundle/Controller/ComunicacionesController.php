<?php

namespace Cinetic\ComunicacionesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Cinetic\ComunicacionesBundle\Entity\Comunicaciones;
use Cinetic\ComunicacionesBundle\Form\ComunicacionesType;

/**
 * Comunicaciones controller.
 *
 * @Route("/comunicaciones")
 */
class ComunicacionesController extends Controller
{

    /**
     * Lists all Comunicaciones entities.
     *
     * @Route("/", name="comunicaciones")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CineticComunicacionesBundle:Comunicaciones')->findAll();

        return $this->render('comunicaciones/comunicaciones.html.twig',array(
            'entities'=>$entities,
        ));
    }
    /**
     * Creates a new Comunicaciones entity.
     *
     * @Route("/", name="comunicaciones_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $entity = new Comunicaciones();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('comunicaciones_show', array('id' => $entity->getId())));
        }

        return $this->render('comunicaciones/new.html.twig',array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Comunicaciones entity.
     *
     * @Route("/new", name="comunicaciones_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $entity = new Comunicaciones();
        $form   = $this->createCreateForm($entity);

        return $this->render('comunicaciones/new.html.twig',array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Comunicaciones entity.
     *
     * @Route("/{id}", name="comunicaciones_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CineticComunicacionesBundle:Comunicaciones')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comunicaciones entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('comunicaciones/show.html.twig',array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Comunicaciones entity.
     *
     * @Route("/{id}/edit", name="comunicaciones_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CineticComunicacionesBundle:Comunicaciones')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comunicaciones entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('comunicaciones/edit.html.twig',array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Comunicaciones entity.
     *
     * @Route("/{id}", name="comunicaciones_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CineticComunicacionesBundle:Comunicaciones')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comunicaciones entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('comunicaciones_edit', array('id' => $id)));
        }

        return $this->render('comunicaciones/edit.html.twig',array(
            'entity' => $entity,
            'edit_form' =>$editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Comunicaciones entity.
     *
     * @Route("/{id}", name="comunicaciones_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CineticComunicacionesBundle:Comunicaciones')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Comunicaciones entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('comunicaciones'));
    }


    /**
     * Creates a form to create a Comunicaciones entity.
     *
     * @param Comunicaciones $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Comunicaciones $entity)
    {
        $form = $this->createForm(new ComunicacionesType(), $entity, array(
            'action' => $this->generateUrl('comunicaciones_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Creates a form to edit a Comunicaciones entity.
     *
     * @param Comunicaciones $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Comunicaciones $entity)
    {
        $form = $this->createForm(new ComunicacionesType(), $entity, array(
            'action' => $this->generateUrl('comunicaciones_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Creates a form to delete a Comunicaciones entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comunicaciones_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

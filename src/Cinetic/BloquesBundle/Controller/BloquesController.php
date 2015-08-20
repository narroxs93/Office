<?php

namespace Cinetic\BloquesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Cinetic\BloquesBundle\Entity\Bloques;
use Cinetic\BloquesBundle\Form\BloquesType;

/**
 * Bloques controller.
 *
 * @Route("/bloques")
 */
class BloquesController extends Controller
{

    /**
     * Lists all Bloques entities.
     *
     * @Route("/", name="bloques")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CineticBloquesBundle:Bloques')->findAll();

        return $this->render('bloques/bloques.html.twig',array(
            'entities'=>$entities,
        ));
    }
    /**
     * Creates a new Bloques entity.
     *
     * @Route("/", name="bloques_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $entity = new Bloques();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('bloques_show', array('id' => $entity->getId())));
        }

        return $this->render('bloques/new.html.twig',array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }



    /**
     * Displays a form to create a new Bloques entity.
     *
     * @Route("/new", name="bloques_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $entity = new Bloques();
        $form   = $this->createCreateForm($entity);

        return $this->render('bloques/new.html.twig',array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Bloques entity.
     *
     * @Route("/{id}", name="bloques_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CineticBloquesBundle:Bloques')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bloques entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('bloques/show.html.twig',array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Bloques entity.
     *
     * @Route("/{id}/edit", name="bloques_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CineticBloquesBundle:Bloques')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bloques entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('bloques/edit.html.twig',array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }


    /**
     * Edits an existing Bloques entity.
     *
     * @Route("/{id}", name="bloques_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CineticBloquesBundle:Bloques')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bloques entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('bloques_edit', array('id' => $id)));
        }

        return $this->render('bloques/edit.html.twig',array(
            'entity' => $entity,
            'edit_form' =>$editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Bloques entity.
     *
     * @Route("/{id}", name="bloques_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CineticBloquesBundle:Bloques')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Bloques entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('bloques'));
    }

    /**
     * Creates a form to create a Bloques entity.
     *
     * @param Bloques $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Bloques $entity)
    {
        $form = $this->createForm(new BloquesType(), $entity, array(
            'action' => $this->generateUrl('bloques_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Creates a form to edit a Bloques entity.
     *
     * @param Bloques $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Bloques $entity)
    {
        $form = $this->createForm(new BloquesType(), $entity, array(
            'action' => $this->generateUrl('bloques_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Creates a form to delete a Bloques entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bloques_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

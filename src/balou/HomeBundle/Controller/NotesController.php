<?php

namespace balou\HomeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use balou\HomeBundle\Entity\Notes;
use balou\HomeBundle\Form\NotesType;

/**
 * Notes controller.
 *
 * @Route("/admin/notes")
 */
class NotesController extends Controller
{

    /**
     * Lists all Notes entities.
     *
     * @Route("/", name="admin_notes")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('balouHomeBundle:Notes')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Notes entity.
     *
     * @Route("/", name="admin_notes_create")
     * @Method("POST")
     * @Template("balouHomeBundle:Notes:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Notes();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_notes_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Notes entity.
     *
     * @param Notes $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Notes $entity)
    {
        $form = $this->createForm(new NotesType(), $entity, array(
            'action' => $this->generateUrl('admin_notes_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Notes entity.
     *
     * @Route("/new", name="admin_notes_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Notes();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Notes entity.
     *
     * @Route("/{id}", name="admin_notes_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('balouHomeBundle:Notes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Notes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Notes entity.
     *
     * @Route("/{id}/edit", name="admin_notes_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('balouHomeBundle:Notes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Notes entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Notes entity.
    *
    * @param Notes $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Notes $entity)
    {
        $form = $this->createForm(new NotesType(), $entity, array(
            'action' => $this->generateUrl('admin_notes_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Notes entity.
     *
     * @Route("/{id}", name="admin_notes_update")
     * @Method("PUT")
     * @Template("balouHomeBundle:Notes:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('balouHomeBundle:Notes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Notes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_notes_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Notes entity.
     *
     * @Route("/{id}", name="admin_notes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('balouHomeBundle:Notes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Notes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_notes'));
    }

    /**
     * Creates a form to delete a Notes entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_notes_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

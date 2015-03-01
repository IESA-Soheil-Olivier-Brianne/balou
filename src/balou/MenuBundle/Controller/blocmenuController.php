<?php

namespace balou\MenuBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use balou\MenuBundle\Entity\blocmenu;
use balou\MenuBundle\Form\blocmenuType;

/**
 * blocmenu controller.
 *
 * @Route("/admin/blocmenu")
 */
class blocmenuController extends Controller
{

    /**
     * Lists all blocmenu entities.
     *
     * @Route("/", name="admin_blocmenu")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('balouMenuBundle:blocmenu')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new blocmenu entity.
     *
     * @Route("/", name="admin_blocmenu_create")
     * @Method("POST")
     * @Template("balouMenuBundle:blocmenu:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new blocmenu();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_blocmenu_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a blocmenu entity.
     *
     * @param blocmenu $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(blocmenu $entity)
    {
        $form = $this->createForm(new blocmenuType(), $entity, array(
            'action' => $this->generateUrl('admin_blocmenu_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new blocmenu entity.
     *
     * @Route("/new", name="admin_blocmenu_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new blocmenu();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a blocmenu entity.
     *
     * @Route("/{id}", name="admin_blocmenu_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('balouMenuBundle:blocmenu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find blocmenu entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing blocmenu entity.
     *
     * @Route("/{id}/edit", name="admin_blocmenu_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('balouMenuBundle:blocmenu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find blocmenu entity.');
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
    * Creates a form to edit a blocmenu entity.
    *
    * @param blocmenu $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(blocmenu $entity)
    {
        $form = $this->createForm(new blocmenuType(), $entity, array(
            'action' => $this->generateUrl('admin_blocmenu_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing blocmenu entity.
     *
     * @Route("/{id}", name="admin_blocmenu_update")
     * @Method("PUT")
     * @Template("balouMenuBundle:blocmenu:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('balouMenuBundle:blocmenu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find blocmenu entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_blocmenu_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a blocmenu entity.
     *
     * @Route("/{id}", name="admin_blocmenu_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('balouMenuBundle:blocmenu')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find blocmenu entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_blocmenu'));
    }

    /**
     * Creates a form to delete a blocmenu entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_blocmenu_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

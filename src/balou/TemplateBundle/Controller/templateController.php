<?php

namespace balou\TemplateBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use balou\TemplateBundle\Entity\template as templateentity;
use balou\TemplateBundle\Form\templateType;

/**
 * template controller.
 *
 * @Route("/admin/template")
 */
class templateController extends Controller
{

    /**
     * Lists all template entities.
     *
     * @Route("/", name="admin_template")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('balouTemplateBundle:template')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new template entity.
     *
     * @Route("/", name="admin_template_create")
     * @Method("POST")
     * @Template("balouTemplateBundle:template:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new template();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_template_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a template entity.
     *
     * @param template $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(template $entity)
    {
        $form = $this->createForm(new templateType(), $entity, array(
            'action' => $this->generateUrl('admin_template_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new template entity.
     *
     * @Route("/new", name="admin_template_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new template();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a template entity.
     *
     * @Route("/{id}", name="admin_template_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('balouTemplateBundle:template')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find template entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing template entity.
     *
     * @Route("/{id}/edit", name="admin_template_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('balouTemplateBundle:template')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find template entity.');
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
    * Creates a form to edit a template entity.
    *
    * @param template $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(template $entity)
    {
        $form = $this->createForm(new templateType(), $entity, array(
            'action' => $this->generateUrl('admin_template_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing template entity.
     *
     * @Route("/{id}", name="admin_template_update")
     * @Method("PUT")
     * @Template("balouTemplateBundle:template:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('balouTemplateBundle:template')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find template entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_template_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a template entity.
     *
     * @Route("/{id}", name="admin_template_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('balouTemplateBundle:template')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find template entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_template'));
    }

    /**
     * Creates a form to delete a template entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_template_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

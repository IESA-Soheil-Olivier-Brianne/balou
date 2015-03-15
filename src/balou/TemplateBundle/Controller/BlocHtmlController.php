<?php

namespace balou\TemplateBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use balou\TemplateBundle\Entity\BlocHtml;
use balou\TemplateBundle\Form\BlocHtmlType;

/**
 * BlocHtml controller.
 *
 * @Route("/admin/blochtml")
 */
class BlocHtmlController extends Controller
{

    /**
     * Lists all BlocHtml entities.
     *
     * @Route("/", name="admin_blochtml")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('balouTemplateBundle:BlocHtml')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlocHtml entity.
     *
     * @Route("/", name="admin_blochtml_create")
     * @Method("POST")
     * @Template("balouTemplateBundle:BlocHtml:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlocHtml();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_blochtml_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a BlocHtml entity.
     *
     * @param BlocHtml $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(BlocHtml $entity)
    {
        $form = $this->createForm(new BlocHtmlType(), $entity, array(
            'action' => $this->generateUrl('admin_blochtml_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlocHtml entity.
     *
     * @Route("/new", name="admin_blochtml_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlocHtml();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlocHtml entity.
     *
     * @Route("/{id}", name="admin_blochtml_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('balouTemplateBundle:BlocHtml')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlocHtml entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlocHtml entity.
     *
     * @Route("/{id}/edit", name="admin_blochtml_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('balouTemplateBundle:BlocHtml')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlocHtml entity.');
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
    * Creates a form to edit a BlocHtml entity.
    *
    * @param BlocHtml $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlocHtml $entity)
    {
        $form = $this->createForm(new BlocHtmlType(), $entity, array(
            'action' => $this->generateUrl('admin_blochtml_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlocHtml entity.
     *
     * @Route("/{id}", name="admin_blochtml_update")
     * @Method("PUT")
     * @Template("balouTemplateBundle:BlocHtml:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('balouTemplateBundle:BlocHtml')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlocHtml entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_blochtml_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlocHtml entity.
     *
     * @Route("/{id}", name="admin_blochtml_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('balouTemplateBundle:BlocHtml')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlocHtml entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_blochtml'));
    }

    /**
     * Creates a form to delete a BlocHtml entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_blochtml_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

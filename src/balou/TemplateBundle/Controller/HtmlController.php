<?php

namespace balou\TemplateBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use balou\TemplateBundle\Entity\Html;
use balou\TemplateBundle\Form\HtmlType;

/**
 * Html controller.
 *
 * @Route("/admin/html")
 */
class HtmlController extends Controller
{

    /**
     * Lists all Html entities.
     *
     * @Route("/", name="admin_html")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('balouTemplateBundle:Html')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Html entity.
     *
     * @Route("/", name="admin_html_create")
     * @Method("POST")
     * @Template("balouTemplateBundle:Html:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Html();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_html_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Html entity.
     *
     * @param Html $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Html $entity)
    {
        $form = $this->createForm(new HtmlType(), $entity, array(
            'action' => $this->generateUrl('admin_html_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Html entity.
     *
     * @Route("/new", name="admin_html_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Html();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Html entity.
     *
     * @Route("/{id}", name="admin_html_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('balouTemplateBundle:Html')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Html entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Html entity.
     *
     * @Route("/{id}/edit", name="admin_html_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('balouTemplateBundle:Html')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Html entity.');
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
    * Creates a form to edit a Html entity.
    *
    * @param Html $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Html $entity)
    {
        $form = $this->createForm(new HtmlType(), $entity, array(
            'action' => $this->generateUrl('admin_html_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Html entity.
     *
     * @Route("/{id}", name="admin_html_update")
     * @Method("PUT")
     * @Template("balouTemplateBundle:Html:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('balouTemplateBundle:Html')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Html entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_html_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Html entity.
     *
     * @Route("/{id}", name="admin_html_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('balouTemplateBundle:Html')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Html entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_html'));
    }

    /**
     * Creates a form to delete a Html entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_html_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

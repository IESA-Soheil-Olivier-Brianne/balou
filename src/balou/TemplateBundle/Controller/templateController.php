<?php

namespace balou\TemplateBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use balou\TemplateBundle\Entity\Template as Templateentity;
use balou\TemplateBundle\Form\TemplateType;

/**
 * Template controller.
 *
 * @Route("/admin/Template")
 */
class TemplateController extends Controller
{

    /**
     * Lists all Template entities.
     *
     * @Route("/", name="admin_template")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('balouTemplateBundle:Template')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Template entity.
     *
     * @Route("/", name="admin_Template_create")
     * @Method("POST")
     * @Template("balouTemplateBundle:Template:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Templateentity();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_Template_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Template entity.
     *
     * @param Template $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Templateentity $entity)
    {
        $form = $this->createForm(new TemplateType(), $entity, array(
            'action' => $this->generateUrl('admin_Template_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Template entity.
     *
     * @Route("/new", name="admin_Template_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Templateentity();
        $form   = $this->createCreateForm($entity);
        return array(
             'entity' => $entity,
            'form'   => $form->createView(),
         );
        //die("coucou");

    }

    /**
     * Finds and displays a Template entity.
     *
     * @Route("/{id}", name="admin_Template_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('balouTemplateBundle:Template')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Template entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Template entity.
     *
     * @Route("/{id}/edit", name="admin_Template_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('balouTemplateBundle:Template')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Template entity.');
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
    * Creates a form to edit a Template entity.
    *
    * @param Template $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Template $entity)
    {
        $form = $this->createForm(new TemplateType(), $entity, array(
            'action' => $this->generateUrl('admin_Template_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Template entity.
     *
     * @Route("/{id}", name="admin_Template_update")
     * @Method("PUT")
     * @Template("balouTemplateBundle:Template:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('balouTemplateBundle:Template')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Template entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_Template_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Template entity.
     *
     * @Route("/{id}", name="admin_Template_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('balouTemplateBundle:Template')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Template entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_Template'));
    }

    /**
     * Creates a form to delete a Template entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_Template_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

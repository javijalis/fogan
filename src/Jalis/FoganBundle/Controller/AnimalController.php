<?php

namespace Jalis\FoganBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Jalis\FoganBundle\Entity\Animal;
use Jalis\FoganBundle\Form\AnimalType;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Animal controller.
 *
 * @Route("/animal")
 */
class AnimalController extends Controller
{
    /**
     * Lists all Animal entities.
     *
     * @Route("/", name="animal")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('JalisFoganBundle:Animal')->findAll();

        return array(
            'entities' => $entities,
        );
    }
     /**
     * Lists of my Animals entities.
     *
     * @Route("/my-animals", name="myanimals")
     * @Template()
     */
    public function myAnimalsAction()
    {

        if (false === $this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
        throw new AccessDeniedException();
        }
        
        $user= $this->get('security.context')->getToken()->getUser();
        
        $entities = array();
        $entities = $user->getAnimals(); 

        return array('entities' => $entities);

    }
    /**
     * Finds and displays a Animal entity.
     *
     * @Route("/{id}/show", name="animal_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JalisFoganBundle:Animal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Animal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Animal entity.
     *
     * @Route("/new", name="animal_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Animal();
        $form   = $this->createForm(new AnimalType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Animal entity.
     *
     * @Route("/newpet", name="animal_new_pet")
     * @Template()
     */
    public function newPetAction()
    {
        if( $this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){

        $user= $this->get('security.context')->getToken()->getUser();

        $entity = new Animal();
            $form   = $this->createForm(new AnimalType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
        }
    }

    /**
     * Creates a new Animal entity.
     *
     * @Route("/create", name="animal_create")
     * @Method("POST")
     * @Template("JalisFoganBundle:Animal:new.html.twig")
     */
    public function createAction(Request $request)
    {

        $user= $this->get('security.context')->getToken()->getUser();

        $entity  = new Animal();
        $entity->addUser($user);
        $form = $this->createForm(new AnimalType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('animal_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Animal entity.
     *
     * @Route("/{id}/edit", name="animal_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JalisFoganBundle:Animal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Animal entity.');
        }

        $editForm = $this->createForm(new AnimalType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Animal entity.
     *
     * @Route("/{id}/update", name="animal_update")
     * @Method("POST")
     * @Template("JalisFoganBundle:Animal:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JalisFoganBundle:Animal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Animal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AnimalType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('animal_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Animal entity.
     *
     * @Route("/{id}/delete", name="animal_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('JalisFoganBundle:Animal')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Animal entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('animal'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}

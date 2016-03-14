<?php

namespace ProdAuto\ProdBundle\Controller;

use Login\LoginBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use ProdAuto\ProdBundle\Entity\Spare_parts;
use ProdAuto\ProdBundle\Entity\Post;
use ProdAuto\ProdBundle\Form\Spare_partsType;

/**
 * Spare_parts controller.
 *
 * @Route("/")
 */
class Spare_partsController extends Controller
{
    /**
     * Lists all Post entities.
     *
     * @Route("/", name="_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $spare_parts = $em->getRepository('ProdAutoProdBundle:Spare_parts')->findAll();

        return $this->render('@ProdAutoProd/ProdAuto/index.html.twig', array(
            'spare_parts' => $spare_parts,
        ));
    }

    /**
     * Creates a new Spare_parts entity.
     *
     * @Route("/new", name="_prodautonew")
     * @Method({"GET", "POST"})
     */
    public function prodautonewAction(Request $request)
    {
        $spare_part = new Spare_parts();
        $spare_part->setUserId($this->getUser()->getId());
        $form = $this->createForm('ProdAuto\ProdBundle\Form\Spare_partsType', $spare_part);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($spare_part);
            $em->flush();

            return $this->redirectToRoute('prod_auto_prod_auto_index', array('id' => $spare_part->getId()));
        }

        return $this->render('@ProdAutoProd/ProdAuto/new.html.twig', array(
            'spare_part' => $spare_part,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Spare_parts entity.
     *
     * @Route("prodauto/show/{id}", name="_prodautoshow")
     * @Method("GET")
     */

    public function prodautoshowAction(Request $request, Spare_parts $spare_parts)
    {

        $em = $this->getDoctrine()->getManager();
        $spare_part = $em->getRepository('ProdAutoProdBundle:Spare_parts')-> find($spare_parts);

        //['spare_parts_id' => $spare_parts->getID()]
        $post = $em->getRepository('ProdAutoProdBundle:Post')->findAll();

        $deleteForm = $this->prodautocreateDeleteForm($spare_part);
       /* echo "<pre>";
        var_dump($spare_part);
        echo "<pre>";
        var_dump($post);
        die();*/
        return $this->render('ProdAutoProdBundle:ProdAuto:show.html.twig', array(
            'post' => $post,
            'spare_part' => $spare_part,
            'delete_form' => $deleteForm->createView(),

        ));
    }




    /**
     * Displays a form to edit an existing Post entity.
     *
     * @Route("ukr/show/{id}/edit", name="_prodautoedit")
     * @Method({"GET", "POST"})
     */
    public function prodautoeditAction(Request $request, Spare_parts $spare_part)
    {
        $deleteForm = $this->prodautocreateDeleteForm($spare_part);
        $editForm = $this->createForm('ProdAuto\ProdBundle\Form\Spare_partsType', $spare_part);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($spare_part);
            $em->flush();

            return $this->redirectToRoute('_prodautoedit', array('id' => $spare_part->getId()));
        }

        return $this->render('@ProdAutoProd/ProdAuto/edit.html.twig', array(
            'spare_part' => $spare_part,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Post entity.
     *
     * @Route("/{id}", name="_prodautodelete")
     * @Method("DELETE")
     */
    public function prodautodeleteAction(Request $request, Spare_parts $spare_parts)
    {
        $form = $this->prodautocreateDeleteForm($spare_parts);
        $form->handleRequest($request);


            $em = $this->getDoctrine()->getManager();
            $em->remove($spare_parts);
            $em->flush();



        return $this->redirect($this->generateUrl('prod_auto_prod_auto_index'));
    }

    /**
     * Creates a form to delete a Spare_parts entity.
     *
     * @param Spare_parts $spare_part The Spare_parts entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function prodautocreateDeleteForm(Spare_parts $spare_part)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('prod_auto_prod_delete', array('id' => $spare_part->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
    /**
     *
     * @Route("prodauto/show/{id}", name="_add_post")
     * @Method({"GET", "POST"})
     */
    public function prodavtoadd_postAction (Request $request,Spare_parts $spare_parts)
    {
        $post = new Post();
        $description=$request->get('description');
        $post->setCreated();
        $post->setDescription($description);
        $post->setUsername($this->container->get('security.token_storage')->getToken()->getUsername());
        $post->setUserId($this->getUser()->getId());
        $post->setSPId($spare_parts->getId());
        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($post);
        $em->flush();
        return $this->redirectToRoute('prod_auto_prod_show', array('id' => $spare_parts->getId()));
    }
}

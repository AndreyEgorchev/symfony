<?php

namespace Ukr\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Ukr\BlogBundle\Entity\Post;
use Ukr\BlogBundle\Form\PostType;

/**
 * Post controller.
 *
 * @Route("/")
 */
class PostController extends Controller
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

        $posts = $em->getRepository('UkrBlogBundle:Post')->findAll();

        return $this->render('@UkrBlog/Page/Page.html.twig', array(
            'posts' => $posts,
        ));
    }

    /**
     * Creates a new Post entity.
     *
     * @Route("/new", name="_ukrnew")
     * @Method({"GET", "POST"})
     */
    public function ukrnewAction(Request $request)
    {
        $post = new Post();
        $form = $this->createForm('Ukr\BlogBundle\Form\PostType', $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('_ukrshow', array('id' => $post->getId()));
        }

        return $this->render('UkrBlogBundle:Page:new.html.twig', array(
            'post' => $post,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Post entity.
     *
     * @Route("ukr/show/{id}", name="_ukrshow")
     * @Method("GET")
     */
    public function ukrshowAction(Post $post)
    {
        $deleteForm = $this->createDeleteForm($post);

        return $this->render('UkrBlogBundle:Page:show.html.twig', array(
            'post' => $post,
            'delete_form' => $deleteForm->createView(),
        ));

    }

    /**
     * Displays a form to edit an existing Post entity.
     *
     * @Route("ukr/show/{id}/edit", name="_ukredit")
     * @Method({"GET", "POST"})
     */
    public function ukreditAction(Request $request, Post $post)
    {
        $deleteForm = $this->createDeleteForm($post);
        $editForm = $this->createForm('Ukr\BlogBundle\Form\PostType', $post);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('_ukredit', array('id' => $post->getId()));
        }

        return $this->render('@UkrBlog/Page/edit.html.twig', array(
            'post' => $post,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Post entity.
     *
     * @Route("/{id}", name="_ukrdelete")
     * @Method("DELETE")
     */
    public function ukrdeleteAction(Request $request, Post $post)
    {
        $form = $this->createDeleteForm($post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($post);
            $em->flush();
        }

        return $this->redirectToRoute('_index');
    }

    /**
     * Creates a form to delete a Post entity.
     *
     * @param Post $post The Post entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Post $post)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('_ukrdelete', array('id' => $post->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


}

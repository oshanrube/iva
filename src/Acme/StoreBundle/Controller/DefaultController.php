<?php

namespace Acme\StoreBundle\Controller;
use Acme\StoreBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('AcmeStoreBundle:Default:index.html.twig', array('name' => $name));
    }
	public function createAction()
	{
		$product = new Product();
		$product->setName('A Foo Bar');
		$product->setPrice('19.99');
		$product->setDescription('Lorem ipsum dolor');

		$validator = $this->get('validator');
		$errors = $validator->validate($product);
		if (count($errors) > 0) {
			return new Response(print_r($errors, true));
		} else {
			return new Response('The author is valid! Yes!');
		}

		$em = $this->getDoctrine()->getEntityManager();
		$em->persist($product);
		$em->flush();

		return new Response('Created product id '.$product->getId());
	}
	public function showAction($id)
	{
		$product = $this->getDoctrine()
			->getRepository('AcmeStoreBundle:Product')
			->find($id);

		if (!$product) {
			throw $this->createNotFoundException('No product found for id '.$id);
		}

		// do something, like pass the $product object into a template
		return new Response('name of the product id '.$id.' is '.$product->getName());
	}
	public function showAllAction(){
		$em = $this->getDoctrine()->getEntityManager();
		$products = $em->getRepository('AcmeStoreBundle:Product')
			->findAllOrderedByName();
		return new Response('name of the products are '.$products);
	}
	
	public function updateAction($id)
	{
		$em = $this->getDoctrine()->getEntityManager();
		$product = $em->getRepository('AcmeStoreBundle:Product')->find($id);

		if (!$product) {
			throw $this->createNotFoundException('No product found for id '.$id);
		}

		$product->setName('New product name!');
		$em->flush();

		return $this->redirect($this->generateUrl('AcmeStoreBundle_show',array('id'=>$id)));
	}
	public function deleteAction($id)
	{
		$em = $this->getDoctrine()->getEntityManager();
		$product = $em->getRepository('AcmeStoreBundle:Product')->find($id);

		if (!$product) {
			throw $this->createNotFoundException('No product found for id '.$id);
		}

		$em->remove($product);
		$em->flush();

		return $this->redirect($this->generateUrl('AcmeStoreBundle_homepage',array('name'=>'deleter')));
	}
}

<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="create_product")
     */
    public function createProduct(ValidatorInterface $validator): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Product();
        $product->setName('Jacket');
        $product->setDescription('Ergonomic and stylish!');
        $product->setGender('male');

        $errors = $validator->validate($product);
        if (count($errors) > 0) {
            return new Response((string) $errors, 400);
        }

        $entityManager->persist($product);
        $entityManager->flush();

        return new Response('Saved new product with id '.$product->getId());
    }

    /**
     * @Route("/product/{id}", name="product_show")
     */
    public function show($id)
    {
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return new Response('Check out this great product: '.$product->getName());

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }

    public function showAllProducts()
    {
        $repository = $this->getDoctrine()->getRepository(Product::class);

        $products = $repository->findAll();

        return ['products' => $products];
    }
}
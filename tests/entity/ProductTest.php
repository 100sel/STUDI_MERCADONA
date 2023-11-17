<?php

use PHPUnit\Framework\TestCase;
use App\Entity\Product;
use App\Entity\Category;
use App\Entity\Promotion;

class ProductTest extends TestCase
{
    public function testGetId()
    {
        $product = new Product();
        $this->assertNull($product->getId());
    }

    public function testGetLabel()
    {
        $product = new Product();
        $this->assertNull($product->getLabel());
    }

    public function testSetLabel()
    {
        $product = new Product();
        $product->setLabel("Test Label");
        $this->assertEquals("Test Label", $product->getLabel());
    }

    public function testGetDescription()
    {
        $product = new Product();
        $this->assertNull($product->getDescription());
    }

    public function testSetDescription()
    {
        $product = new Product();
        $product->setDescription("Test Description");
        $this->assertEquals("Test Description", $product->getDescription());
    }

    public function testGetImage()
    {
        $product = new Product();
        $this->assertNull($product->getImage());
    }

    public function testSetImage()
    {
        $product = new Product();
        $product->setImage("test.jpg");
        $this->assertEquals("test.jpg", $product->getImage());
    }

    public function testGetCategory()
    {
        $product = new Product();
        $this->assertNull($product->getCategory());
    }

    public function testSetCategory()
    {
        $product = new Product();
        $category = new Category();
        $product->setCategory($category);
        $this->assertEquals($category, $product->getCategory());
    }

    public function testGetPrice()
    {
        $product = new Product();
        $this->assertNull($product->getPrice());
    }

    public function testSetPrice()
    {
        $product = new Product();
        $product->setPrice(10);
        $this->assertEquals(10, $product->getPrice());
    }

    public function testGetPromotion()
    {
        $product = new Product();
        $this->assertNull($product->getPromotion());
    }

    public function testSetPromotionWithNull()
    {
        $product = new Product();
        $promotion = new Promotion();
        $product->setPromotion($promotion);
        $this->assertEquals($promotion, $product->getPromotion());

        $product->setPromotion(null);
        $this->assertNull($product->getPromotion());
    }

    public function testSetPromotion()
    {
        $product = new Product();
        $promotion = new Promotion();
        $promotion->setProduct($product);
        $product->setPromotion($promotion);
        $this->assertEquals($promotion, $product->getPromotion());
        $this->assertEquals($product, $promotion->getProduct());
    }

}
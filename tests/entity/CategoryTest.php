<?php

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    protected Category $category;

    protected function setUp(): void
    {
        $this->category = new Category();
    }

    protected function tearDown(): void
    {
        unset($this->category);
    }

    public function testGetId()
    {
        $this->assertNull($this->category->getId());
    }

    public function testGetLabel()
    {
        $this->assertNull($this->category->getLabel());
    }

    public function testSetLabel()
    {
        $label = 'Test Label';
        $this->assertInstanceOf(Category::class, $this->category->setLabel($label));
        $this->assertEquals($label, $this->category->getLabel());
    }

    public function testGetProducts()
    {
        $products = $this->category->getProducts();
        $this->assertInstanceOf(ArrayCollection::class, $products);
        $this->assertCount(0, $products);
    }

    public function testAddProduct()
    {
        $product = new Product();
        $this->assertInstanceOf(Category::class, $this->category->addProduct($product));
        $products = $this->category->getProducts();
        $this->assertCount(1, $products);
        $this->assertTrue($products->contains($product));
        $this->assertEquals($this->category, $product->getCategory());
    }

    public function testRemoveProduct()
    {
        $product = new Product();
        $this->category->addProduct($product);

        $this->assertInstanceOf(Category::class, $this->category->removeProduct($product));
        $products = $this->category->getProducts();
        $this->assertCount(0, $products);
        $this->assertFalse($products->contains($product));
        $this->assertNull($product->getCategory());
    }
}
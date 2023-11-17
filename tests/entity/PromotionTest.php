<?php 

use App\Entity\Promotion;
use App\Entity\Product;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;

class PromotionTest extends TestCase
{
    public function testGetId()
    {
        $promotion = new Promotion();
        $this->assertNull($promotion->getId());
    }
    
    public function testGetProduct()
    {
        $promotion = new Promotion();
        $this->assertNull($promotion->getProduct());
        
        $product = new Product();
        $promotion->setProduct($product);
        $this->assertInstanceOf(Product::class, $promotion->getProduct());
    }
    
    public function testGetDiscount()
    {
        $promotion = new Promotion();
        $this->assertNull($promotion->getDiscount());
        
        $promotion->setDiscount(10.00);
        $this->assertEquals(10.00, $promotion->getDiscount());
    }
    
    public function testGetStartDate()
    {
        $promotion = new Promotion();
        $this->assertNull($promotion->getStartDate());
        
        $startDate = new \DateTime();
        $promotion->setStartDate($startDate);
        $this->assertEquals($startDate, $promotion->getStartDate());
    }
    
    public function testGetEndDate()
    {
        $promotion = new Promotion();
        $this->assertNull($promotion->getEndDate());
        
        $endDate = new \DateTime();
        $promotion->setEndDate($endDate);
        $this->assertEquals($endDate, $promotion->getEndDate());
    }
}
<?php

use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Tester\CommandTester;
use Doctrine\ORM\EntityManagerInterface;
use App\Command\ImportCategories;
use App\Entity\Category;

class ImportCategoriesTest extends TestCase
{
    private $entityManager;
    private $command;
    private $commandTester;

    protected function setUp(): void
    {
        $this->entityManager = $this->createMock(EntityManagerInterface::class);
        $this->command = new ImportCategories($this->entityManager);
        $this->commandTester = new CommandTester($this->command);
    }

    public function testExecute()
    {
        $this->entityManager->expects($this->exactly(15))
            ->method('persist');

        $this->entityManager->expects($this->once())
            ->method('flush');

        $this->commandTester->execute([]);

        $output = $this->commandTester->getDisplay();
        $this->assertSame('Categories imported successfully!', trim($output));

        $this->assertEquals(Command::SUCCESS, $this->commandTester->getStatusCode());
    }
}

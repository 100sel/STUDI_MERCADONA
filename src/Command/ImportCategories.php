<?php

namespace App\Command;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImportCategories extends Command
{
    protected static $defaultName = 'app:import-categories';

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function configure()
    {
        $this
            ->setDescription('Imports a list of predefined categories.')
            ->setHelp('This command allows you to import categories...');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $categories = [
            'Books', 'Electronics', 'Home and Kitchen', 'Clothing, Shoes & Jewelry',
            'Beauty and Personal Care', 'Sports and Outdoors', 'Toys and Games',
            'Health and Household', 'Automotive', 'Grocery and Gourmet Food',
            'Pet Supplies', 'Office Products', 'Industrial and Scientific',
            'Tools & Home Improvement', 'Baby Products'
        ];

        foreach ($categories as $categoryName) {
            $category = new Category();
            $category->setLabel($categoryName);

            $this->entityManager->persist($category);
        }

        $this->entityManager->flush();

        $output->writeln('Categories imported successfully!');

        return Command::SUCCESS;
    }
}
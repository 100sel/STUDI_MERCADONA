<?php

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Security\Core\User\UserInterface;

class UserTest extends KernelTestCase
{
    private ?User $user;

    protected function setUp(): void
    {
        self::bootKernel();

        $this->user = new User();
    }

    public function testGetId(): void
    {
        $this->assertSame(null, $this->user->getId());
    }

    public function testGetUsername(): void
    {
        $this->assertSame(null, $this->user->getUsername());
    }

    public function testSetUsername(): void
    {
        $this->user->setUsername('john.doe');
        $this->assertSame('john.doe', $this->user->getUsername());
    }

    public function testGetUserIdentifier(): void
    {
        $this->assertSame('', $this->user->getUserIdentifier());
    }

    public function testGetRoles(): void
    {
        $this->assertSame(['ROLE_USER'], $this->user->getRoles());
    }

    public function testSetRoles(): void
    {
        $this->user->setRoles(['ROLE_USER']);
        $this->assertSame(['ROLE_USER'], $this->user->getRoles());
    }

    public function testGetPassword(): void
    {
        $this->assertSame('', $this->user->getPassword());
    }

    public function testSetPassword(): void
    {
        $this->user->setPassword('password');
        $this->assertSame('password', $this->user->getPassword());
    }

    public function testEraseCredentials(): void
    {
        $this->user->eraseCredentials();
        // No assertion, just verifying that the method does not throw an error
    }
}
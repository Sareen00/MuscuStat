<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface; // Ajout de l'import pour UserPasswordHasherInterface
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class UserFixture extends Fixture implements FixtureGroupInterface
{

    public function __construct(private UserPasswordHasherInterface $hasher) // Injection du UserProvider
    {}

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $admin1 = new User;
        $admin1->setUsername('admin1'); // Ajout du nom d'utilisateur pour admin1
        $admin1->setPassword($this->hasher->hashPassword($admin1, 'admin')); // Ajout du mot de passe haché pour admin1
        $admin1->setRoles(['ROLE_ADMIN']); // Ajout du rôle pour admin1

        $admin2 = new User;
        $admin2->setUsername('admin2'); // Ajout du nom d'utilisateur pour admin2
        $admin2->setPassword($this->hasher->hashPassword($admin2, 'admin')); // Ajout du mot de passe haché pour admin2
        $admin2->setRoles(['ROLE_ADMIN']); // Ajout du rôle pour admin1
        
        $manager->persist($admin1); // Persister l'utilisateur
        $manager->persist($admin2); // Persister l'utilisateur

       
        for ($i = 0; $i <= 5; $i++) {
            $user = new User();
            $user->setUsername("user$i"); // Nom d'utilisateur pour chaque utilisateur normal
            $user->setPassword($this->hasher->hashPassword($user, 'user')); // Mot de passe haché pour chaque utilisateur normal
            $manager->persist($user); // Persister l'utilisateur
        }
        $manager->flush();
    }

    public static function getGroups():array
    {
        return ['user'];
    }
}

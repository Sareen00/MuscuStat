<?php

namespace App\DataFixtures;

use App\Entity\Exercice;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ExerciceFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $exercice1 = new Exercice;
        $exercice1->setName('Squat');
        $exercice1->setMuscle("Fessiers"); 
        $exercice1->setCharge(60); 

        $exercice2 = new Exercice;
        $exercice2->setName('Souleve de Terre');
        $exercice2->setMuscle("Fessiers"); 
        $exercice2->setCharge(40); 

        $exercice3 = new Exercice;
        $exercice3->setName('Développé couché');
        $exercice3->setMuscle("Pectoraux"); 
        $exercice3->setCharge(30); 

        $exercice4 = new Exercice;
        $exercice4->setName('Tirage horizontal');
        $exercice4->setMuscle("Dorsaux "); 
        $exercice4->setCharge(20); 

        $exercice5 = new Exercice;
        $exercice5->setName('Presse à jambes');
        $exercice5->setMuscle("Quadriceps "); 
        $exercice5->setCharge(80); 

        $manager->persist($exercice1); 
        $manager->persist($exercice2); 
        $manager->persist($exercice3); 
        $manager->persist($exercice4); 
        $manager->persist($exercice5); 


        $manager->flush();
    }

    public static function getGroups():array
    {
        return ['exercice'];
    }
}

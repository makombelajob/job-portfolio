<?php

namespace App\DataFixtures;

use App\Entity\Contacts;
use App\Entity\Skills;
use App\Entity\Educations;
use App\Entity\Projets;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Création des compétences
        $skill1 = new Skills();
        $skill1->setName('Symfony')
               ->setLevel('avancé');
        $manager->persist($skill1);

        $skill2 = new Skills();
        $skill2->setName('Html5/Css3')
               ->setLevel('Avancé');
        $manager->persist($skill2);

        $skill3 = new Skills();
        $skill3->setName('JavaScript(ES6+)')
               ->setLevel('Avancé');
        $manager->persist($skill3);
        $skill4 = new Skills();
        $skill4->setName('MySQL/MariaDB')
               ->setLevel('avancé');
        $manager->persist($skill4);

        $skill5 = new Skills();
        $skill5->setName('Ajax / API')
               ->setLevel('débutant');
        $manager->persist($skill5);

        $skill6 = new Skills();
        $skill6->setName('Intégrateur Cabine Aéronef')
               ->setLevel('assez bon');
        $manager->persist($skill6);

        // Création des projets
        $project1 = new Projets();
        $project1->setName('Portfolio')
                 ->setTechnology('Symfony, Bootstrap')
                 ->setOnlineLink('https://jobmakombela.fr')
                 ->addSkill($skill1, $skill2, $skill3, $skill4);
        $manager->persist($project1);

        $project2 = new Projets();
        $project2->setName('ent-facile')
                 ->setTechnology('Symfony-php, Bootstrap')
                 ->setOnlineLink('https://ent-facile.fr')
                 ->addSkill($skill2);
        $manager->persist($project2);

        // Création des formations
        $education1 = new Educations();
        $education1->setName('Bac+2(RNCP-37674)')
                   ->setYear(new \DateTimeImmutable('2025-07-04'))
                   ->setSchool('Ecole Européenne du Numérique')
                   ->addSkill($skill1, $skill2, $skill3, $skill4, $skill5);
        $manager->persist($education1);

        $education2 = new Educations();
        $education2->setName('Intégrateur_Cabine_Aéronautique')
                   ->setYear(new \DateTimeImmutable('2024-01-01'))
                   ->setSchool('Afpa-Toulouse')
                   ->addSkill($skill6);
        $manager->persist($education2);

        // Sauvegarde des données
        $manager->flush();
    }
}

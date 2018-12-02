<?php
/**
 * Created by PhpStorm.
 * User: tomy
 * Date: 22/11/18
 * Time: 10:57
 */

namespace App\DataFixtures;


use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {

            $article = new Article();
            $article->setTitle(mb_strtolower($faker->sentence()))
            ->setContent($faker->text);
            $article->setCategory($this->getReference('categorie_' . ($i%5)));

            $manager->persist($article);
            $manager->flush();
        }
    }

    /**
     * @return array
     */
    public function getDependencies()
    {
        return [CategoryFixtures::class];
    }
}
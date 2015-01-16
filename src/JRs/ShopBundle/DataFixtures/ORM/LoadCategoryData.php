<?php

namespace JRs\ShopBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use JRs\ShopBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface{

    public function load(ObjectManager $em){
        $acsesuars = new Category();
        $acsesuars->setName('Аксесуары');
        $acsesuars->setSlug('aksesuares');

        $vkladishy = new Category();
        $vkladishy->setName('Вкладыши');
        $vkladishy->setSlug('Vkladyshi');

        $glushitel = new Category();
        $glushitel->setName('Глушители');
        $glushitel->setSlug('glushitel');

        $rings = new Category();
        $rings->setName('Кольца');
        $rings->setSlug('rings');

        $podveska = new Category();
        $podveska->setName('Подвеска');
        $podveska->setSlug('podveska');

        $podshipnik = new Category();
        $podshipnik->setName('Подшипники');
        $podshipnik->setSlug('podshipnik');

        $em->persist($acsesuars);
        $em->persist($vkladishy);
        $em->persist($glushitel);
        $em->persist($rings);
        $em->persist($podshipnik);
        $em->persist($podveska);
        $em->flush();

        $this->addReference('category-acsesuars',$acsesuars);
        $this->addReference('category-vkladishy', $vkladishy);
        $this->addReference('category-glushitel', $glushitel);
        $this->addReference('category-rings', $rings);
        $this->addReference('category-podveska',$podveska);
        $this->addReference('category-podshipnik',$podshipnik);
    }
    public function getOrder(){
        return 1;
    }
}
<?php

namespace JRs\ShopBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use JRs\ShopBundle\Entity\Product;

class LoadProductData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $em){

        $tree=new Product();
        $tree->addCategory($em->merge($this->getReference('category-acsesuars')));
        $tree->setName('Елочка-яболко');
        $tree->setArticle('1234');
        $tree->setAnalog('432...555...5555');
        $tree->setBrand('GPD');
        $tree->setCost('20');
        $tree->setOrignArticle('1234');
        $tree->setQuantity('10');
        $tree->setSpecification('100X200X1mm');
        $tree->setDescription('Super pahu4aja elo4ka');
        $tree->setImage('1');

        $vklad=new Product();
        $vklad->addCategory($em->merge($this->getReference('category-vkladishy')));
        $vklad->setName('Вкладышь коленвала');
        $vklad->setArticle('1111');
        $vklad->setAnalog('222...333...444');
        $vklad->setBrand('Timmen');
        $vklad->setCost('50');
        $vklad->setOrignArticle('4321');
        $vklad->setQuantity('5');
        $vklad->setSpecification('400X200X2mm');
        $vklad->setDescription('Вкладышь коленвала Опель');
        $vklad->setImage('1');

        $vklad2=new Product();
        $vklad2->addCategory($em->merge($this->getReference('category-vkladishy')));
        $vklad2->setName('Вкладышь 2');
        $vklad2->setArticle('12345');
        $vklad2->setAnalog('4321...5551...55551');
        $vklad2->setBrand('GPD');
        $vklad2->setCost('55');
        $vklad2->setOrignArticle('12341');
        $vklad2->setQuantity('14');
        $vklad2->setSpecification('4100X200X1mm');
        $vklad2->setDescription('Вкладышь коленвала Форд');
        $vklad2->setImage('1');

        $glush=new Product();
        $glush->addCategory($em->merge($this->getReference('category-glushitel')));
        $glush->setName('Глушитель пацанский');
        $glush->setArticle('11234');
        $glush->setAnalog('1432...1555...15555');
        $glush->setBrand('ВАЗ');
        $glush->setCost('5');
        $glush->setOrignArticle('11234');
        $glush->setQuantity('4');
        $glush->setSpecification('3200X600X1mm');
        $glush->setDescription('Пацанячий на заниженый ТАЗ');
        $glush->setImage('1');

        $tree1=new Product();
        $tree1->addCategory($em->merge($this->getReference('category-podshipnik')));
        $tree1->setName('Подшипник круглый');
        $tree1->setArticle('12134');
        $tree1->setAnalog('4323...5553...55553');
        $tree1->setBrand('SDK');
        $tree1->setCost('34');
        $tree1->setOrignArticle('12134');
        $tree1->setQuantity('10');
        $tree1->setSpecification('100X200X1mm');
        $tree1->setDescription('Круглый');
        $tree1->setImage('1');

        $tree2=new Product();
        $tree2->addCategory($em->merge($this->getReference('category-podshipnik')));
        $tree2->setName('Подшипник квадратный');
        $tree2->setArticle('12344');
        $tree2->setAnalog('4324...4555...55554');
        $tree2->setBrand('GPD');
        $tree2->setCost('204');
        $tree2->setOrignArticle('41234');
        $tree2->setQuantity('6');
        $tree2->setSpecification('600X200X1mm');
        $tree2->setDescription('Подшипник квадратный');
        $tree2->setImage('1');

        $em->persist($tree);
        $em->persist($tree1);
        $em->persist($tree2);
        $em->persist($glush);
        $em->persist($vklad);
        $em->persist($vklad2);
        $em->flush();
    }

    public function getOrder(){
        return 2;
    }
} 
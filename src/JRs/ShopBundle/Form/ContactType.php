<?php

namespace JRs\ShopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
class ContactType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('name', 'text', array('label'=>'Имя'));
        $builder->add('email', 'email', array('label'=>'E-mail'));
        $builder->add('subject', null, array('label'=>'Тема'));
        $builder->add('message', 'textarea', array('label'=>'Сообщение'));
    }

    public function getName(){
        return 'contact';
    }

} 
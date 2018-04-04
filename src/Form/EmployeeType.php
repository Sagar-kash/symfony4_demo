<?php

namespace App\Form;

use App\Entity\Employee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Doctrine\ORM\EntityManagerInterface;

class EmployeeType extends AbstractType
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //get connection
        $conn =  $this->entityManager->getConnection();
        //create sql query
        $sql = 'SELECT id,name FROM department ORDER BY name ASC ';
        // prepare and execute
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        // fetch data
        $choices = array();
        $tempChoices = $stmt->fetchAll();
        foreach($tempChoices as $result) {
            if(isset($result['id']) && $result['id'] != ''){
                $choices[$result['name']] = $result['id'];
            }
        }
        $builder
            ->add('name',null,array(
                    'label' => 'name',
                    'required' => true,
                    'attr' => array('class'=>'form-control')))
            ->add('address',null,array(
                    'required' => true,
                    'label' => 'address',
                    'attr' => array('class'=>'form-control')))
            ->add('department',ChoiceType::class,array(
                    'choices' => $choices,
                    'required' => true,
                    'label' => 'department',
                    'attr' => array('class'=>'form-control')
            ));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Employee::class,
        ]);
    }
}

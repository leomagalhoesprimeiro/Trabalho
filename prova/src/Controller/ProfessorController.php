<?php

namespace App\Controller;

use App\Form\ProfessorType;
use App\helper\ProfessorFactory;
use App\Repository\ProfessorRepository;
use Doctrine\ORM\EntityManagerInterface;


class ProfessorController extends GenericController
{


    public function __construct(ProfessorRepository $objectRepository, EntityManagerInterface $entityManager, ProfessorFactory $entityFactory)
    {
        parent::__construct($objectRepository, $entityManager, $entityFactory);
    }

    public function updateEntity($entity, $entityUpdate)
    {
        // TODO: Implement updateEntity() method.
    }
}

<?php

namespace App\Controller;

use App\helper\ProjetoFactory;
use App\Repository\ProjetoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class ProjetoController extends GenericController
{

    public function __construct(ProjetoRepository $objectRepository, EntityManagerInterface $entityManager, ProjetoFactory $entityFactory)
    {
        parent::__construct($objectRepository, $entityManager, $entityFactory);
    }

    public function updateEntity($entity, $entityUpdate)
    {
        // TODO: Implement updateEntity() method.
    }

    public function inscrever(Request $request)
    {
        $list = json_decode($request->getContent());
        $aluno = $list[0];
        var_dump($aluno);
        $projeto = $list[1];
        var_dump($projeto);
        return json_encode($projeto);
    }
}

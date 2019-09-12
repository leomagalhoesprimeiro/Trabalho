<?php


namespace App\helper;


use App\Entity\Projeto;

class ProjetoFactory implements EntityFactory
{

    public function create(string $json):Projeto
    {
        $content = json_decode($json);
        $projeto = new Projeto();
        $projeto->setNome($content->nome);
        $projeto->setOrientador($content->orientador);
        return $projeto;
    }
}
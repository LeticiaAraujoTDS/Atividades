<?php

namespace app\controllers;

use DateTimeImmutable;
use app\core\Controller;
use app\models\Animal;
use app\services\AnimalService;
use app\helpers\Validador;

class AnimalController extends Controller
{
    private AnimalService $service;

    public function __construct()
    {
        $this->service = new AnimalService();
    }

    public function listarTodos()
    {

        $data['lista'] = $this->service->getAnimais();
        $this->view('animais/animais_list', $data);
    }

    public function verAnimal()
    {

        if (!isset($_GET['id'])) {
            $this->redirect(URL_BASE . '/animais');
        }

        $id = $_GET['id'];

        $data['animal'] = $this->service->getAnimal($id);

        $this->view('animais/animais_show', $data);
    }

    public function criar()
    {
        $this->autenticacaoRequired();

        $this->view('animais/animais_create', []);
    }

    public function salvar()
    {
        $this->autenticacaoRequired();
        $validador = new Validador();

        $nome = $_POST['nome'];
        $idade = $_POST['idade'];

        //Validar
        $validador->obrigatorio('nome', $nome);
        $validador->obrigatorio('idade', $idade);

        if ($validador->temErros()) {

            $data['animal'] = $_POST;
            $data['erros'] = $validador->getErros();

            $this->view('animais/animais_create', $data);

            return;
        }

        $animal = new Animal();

        $animal->setNome($nome);
        $animal->setIdade($idade);
        
        $this->service->saveAnimal($animal);

        $this->redirect(URL_BASE . '/animais');
    }

    public function editar()
    {
        $this->autenticacaoRequired();
        $id = $_GET['id'];
        $data['animal'] = $this->service->getAnimal($id);
        $this->view('animais/animais_edit', $data);
    }

    public function atualizar()
    {
        $this->autenticacaoRequired();

        $animal = new Animal();
        $animal->setId($_POST['id']);
        $animal->setNome($_POST['nome']);
        $animal->setIdade($_POST['idade']);

        $this->service->updateAnimal($animal);
        $this->redirect(URL_BASE . '/animais');
    }

    public function excluir()
    {
        $this->adminRequired();
        $id = $_GET['id'];
        $this->service->deleteAnimal($id);
        $this->redirect(URL_BASE . '/animais');
    }

    public function redirecionarTeste()
    {
        $this->redirect("http://google.com");
    }
}

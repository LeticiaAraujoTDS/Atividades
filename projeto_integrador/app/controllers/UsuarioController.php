<?php

namespace app\controllers;

use app\core\Controller;
use app\helpers\Validador;
use app\models\Usuario;
use app\services\UsuarioService;

class UsuarioController extends Controller
{
    private UsuarioService $service;

    public function __construct()
    {
        $this->service = new UsuarioService();
    }

    public function index()
    {
        $data['usuarios'] = $this->service->getUsuarios();
        $this->view('usuarios/usuario_list', $data);
    }

    public function cadastrar()
    {
        $this->autenticacaoRequired();
        $this->view('usuarios/usuario_create');
    }

    public function salvar()
    {
        $this->autenticacaoRequired();
        $validador = new Validador();

        //Sanitizar
        $nomeUsuario = filter_input(INPUT_POST, 'nomeUsuario', FILTER_SANITIZE_SPECIAL_CHARS);
        $email  = $_POST['email'];
        $senha  = $_POST['senha'];
        $perfil = $_POST['perfil'];

        //Validar
        $validador->obrigatorio('nomeUsuario', $nomeUsuario);
        $validador->obrigatorio('email', $email);

        if ($validador->temErros()) {

            $data['usuario'] = $_POST;
            $data['erros'] = $validador->getErros();

            $this->view('usuarios/usuario_create', $data);

            return;
        }


        //Salvar
        $usuario = new Usuario(0, $nomeUsuario, $email, $senha, $perfil);

        if (!is_array($this->service->saveUsuario($usuario))) {
            $this->redirect(URL_BASE . '/usuarios');
        } else {

            $data["usuario"] = $_POST;
            $data['erros']['email'] = "Erro: Este e-mail já está cadastrado!";

            $this->view('usuarios/usuario_create', $data);
        }
    }

    public function editar()
    {
        $this->autenticacaoRequired();
        $id = $_GET['id'];
        $data['usuario'] = $this->service->getUsuarioById($id);
        $this->view('usuarios/usuario_edit', $data);
    }

    public function atualizar()
    {
        $this->autenticacaoRequired();
        $usuario = new Usuario(
            $_POST['id'],
            $_POST['nomeUsuario'],
            $_POST['email'],
            $_POST['senha'] ?? '',
            $_POST['perfil']
        );

        $resultado = $this->service->updateUsuario($usuario);

        if (is_array($resultado)) {
            $data['usuario'] = $_POST;
            $data['erros'] = $resultado;

            $this->view('usuarios/usuario_edit', $data);
            return;
        }

        $this->redirect(URL_BASE . '/usuarios');
    }

    public function excluir()
    {
        $this->adminRequired();
        $id = $_GET['id'];
        $this->service->deleteUsuario($id);
        $this->redirect(URL_BASE . '/usuarios');
    }
}

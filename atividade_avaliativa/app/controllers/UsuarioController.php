<?php

namespace app\controllers;

use app\core\Controller;
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
        $this->view('usuarios/usuario_create');
    }

    public function salvar()
    {

        $dadosUsuario = [
            'nomeUsuario' => $_POST['nomeUsuario'],
            'email' => $_POST['email'],
            'perfil' => $_POST['perfil']
        ];

        $usuario = new Usuario(
            0,
            $_POST['nomeUsuario'],
            $_POST['email'],
            $_POST['senha'],
            $_POST['perfil']
        );

        $resultado = $this->service->saveUsuario($usuario);

        if ($resultado === true) {
            $this->redirect(URL_BASE . '/usuarios');
        } else {
            $data['erros'] = $resultado;
            $data['usuario'] = $dadosUsuario;
            $this->view('usuarios/usuario_create', $data);
        }
    }

    public function editar()
    {
        $id = $_GET['id'];
        $data['usuario'] = $this->service->getUsuarioById($id);
        $this->view('usuarios/usuario_edit', $data);
    }

    public function atualizar()
    {
        $usuario = new Usuario(
            $_POST['id'],
            $_POST['nomeUsuario'],
            $_POST['email'],
            $_POST['senha'] ?? '',
            $_POST['perfil']
        );

        $resultado = $this->service->updateUsuario($usuario);

        if ($resultado === true) {
            $this->redirect(URL_BASE . '/usuarios');
        } else {
            $data['usuario'] = [
                'id' => $_POST['id'],
                'nomeUsuario' => $_POST['nomeUsuario'],
                'email' => $_POST['email'],
                'perfil' => $_POST['perfil']
            ];
            $data['erros'] = $resultado;
            $this->view('usuarios/usuario_edit', $data);
        }
    }

    public function excluir()
    {
        $id = $_GET['id'];
        $this->service->deleteUsuario($id);
        $this->redirect(URL_BASE . '/usuarios');
    }
}

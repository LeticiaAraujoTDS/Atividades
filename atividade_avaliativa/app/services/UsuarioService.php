<?php

namespace app\services;

use app\models\Usuario;
use app\repositories\UsuarioRepository;

class UsuarioService
{
    private UsuarioRepository $repository;

    public function __construct()
    {
        $this->repository = new UsuarioRepository();
    }

    public function getUsuarios(): array
    {
        return $this->repository->getUsuarios();
    }

    public function saveUsuario(Usuario $usuario): array|bool
    {
        $erros = $this->validarDados($usuario);

        if (!isset($erros['email'])) {
            $usuarioExistente = $this->repository->getUsuarioByEmail($usuario->getEmail());
            if ($usuarioExistente) {
                $erros['emailUsado'] = "Este e-mail já está cadastrado!";
            }
        }

        if (!empty($erros)) {
            return $erros;
        }

        //ta retornando true, por isso o bool
        return $this->repository->saveUsuario($usuario);
    }

    public function getUsuarioById(int $id)
    {
        return $this->repository->getUsuarioById($id);
    }

    public function updateUsuario(Usuario $usuario): array|bool
    {
        $erros = $this->validarDados($usuario, true);

        if (!isset($erros['email'])) {
            $usuarioExistente = $this->repository->getUsuarioByEmail($usuario->getEmail());

            if ($usuarioExistente && $usuarioExistente['id'] != $usuario->getId()) {
                $erros['emailUsado'] = "Este e-mail já está sendo usado por outro usuário!";
            }
        }

        if (!empty($erros)) {
            return $erros;
        }

        return $this->repository->updateUsuario($usuario);
    }

    public function deleteUsuario(int $id): bool
    {
        return $this->repository->deleteUsuario($id);
    }

    public function validarDados(Usuario $usuario, bool $atualizacao = false): array
    {
        $erros = [];

        if (empty($usuario->getNomeUsuario())) {
            $erros['nomeUsuario'] = "O nome de usuário é obrigatório.";
        }

        if (empty($usuario->getEmail())) {
            $erros['email'] = "O e-mail é obrigatório.";
        }

        if (!$atualizacao && empty($usuario->getSenha())) {
            $erros['senha'] = "A senha é obrigatória para usuários.";
        }

        if (empty($usuario->getPerfil())) {
            $erros['perfil'] = "Selecione um perfil de acesso.";
        }

        return $erros;
    }
}

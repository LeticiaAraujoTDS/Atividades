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
        // 1. Verifica se o e-mail já está cadastrado
        $usuarioExistente = $this->repository->getUsuarioByEmail($usuario->getEmail());

        if ($usuarioExistente) {
            $erros['emailUsado'] = "Este e-mail já está cadastrado!";
        }

        if (!empty($erros)) {
            return $erros;
        } else {
            // 2. Se não existir, prossegue com o salvamento
            return $this->repository->saveUsuario($usuario);
        }
    }

    public function getUsuarioById(int $id)
    {
        return $this->repository->getUsuarioById($id);
    }

    public function updateUsuario(Usuario $usuario): array|bool
    {
        // 1. Verifica se o e-mail já está cadastrado
        $usuarioExistente = $this->repository->getUsuarioByEmail($usuario->getEmail());

        if ($usuarioExistente && $usuarioExistente->getId() !== $usuario->getId()) {
            $erros['emailUsado'] = "Este e-mail já está cadastrado!";
        }

        if (!empty($erros)) {
            return $erros;
        } else {
            return $this->repository->updateUsuario($usuario);
        }
    }

    public function deleteUsuario(int $id): bool
    {
        return $this->repository->deleteUsuario($id);
    }
}

<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;
use Firebase\JWT\JWT;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('login/index');
    }

    public function cadastroForm()
    {
        return view('register/index');
    }

    public function login()
    {
        $data = $this->request->getPost();
        if (empty($data)) {
            $data = $this->request->getJSON(true);
        }

        $email = $data['email'] ?? null;
        $senha = $data['senha'] ?? null;

        if (!$email || !$senha) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON(['error' => 'Email e senha são obrigatórios']);
        }

        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->where('email', $email)->first();

        if (!$usuario || !password_verify($senha, $usuario['senha'])) {
            return $this->response
                ->setStatusCode(401)
                ->setJSON(['error' => 'Credenciais inválidas']);
        }

        $key = getenv('JWT_SECRET') ?: 'SUA_CHAVE_SECRETA';
        $payload = [
            'sub'   => $usuario['id'],
            'nome'  => $usuario['nome'],
            'email' => $usuario['email'],
            'papel' => $usuario['papel'],
            'iat'   => time(),
            'exp'   => time() + 3600 // 1 hora
        ];

        $token = JWT::encode($payload, $key, 'HS256');

        $cookie = [
            'name'   => 'token',
            'value'  => $token,
            'expire' => 3600, // 1 hora em segundos
            'secure' => false, // true se usar HTTPS
            'httponly' => true, // impede acesso via JS para segurança
            'path' => '/',
        ];
        setcookie($cookie['name'], $cookie['value'], time() + $cookie['expire'], $cookie['path'], '', $cookie['secure'], $cookie['httponly']);

        return $this->response->setJSON([
            'token' => $token,
            'usuario' => [
                'id' => $usuario['id'],
                'nome' => $usuario['nome'],
                'email' => $usuario['email'],
                'papel' => $usuario['papel'],
            ]
        ]);
    }

    public function logout()
    {
        setcookie('token', '', time() - 3600, '/'); 

        session()->destroy();

        return redirect()->to(base_url('login'));
    }

    
}

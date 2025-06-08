<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Config\Services;

class JwtAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $authHeader = $request->getHeaderLine('Authorization');

        if ($authHeader && str_starts_with($authHeader, 'Bearer ')) {
            $token = str_replace('Bearer ', '', $authHeader);
        } else {
            $token = $_COOKIE['token'] ?? null;
            if (!$token) {
                return redirect()->to('/login');
            }
        }

        try {
            $key = getenv('JWT_SECRET') ?: 'SUA_CHAVE_SECRETA';
            $decoded = JWT::decode($token, new Key($key, 'HS256'));

            $decodedArray = (array) $decoded;
            $usuario = [
                'id'    => $decodedArray['sub'],
                'nome'  => $decodedArray['nome'],
                'email' => $decodedArray['email'],
                'papel' => $decodedArray['papel'],
            ];

            service('request')->usuario_autenticado = $usuario;


            return null; // prossegue
        } catch (\Exception $e) {
            return redirect()->to('/login');
        }
    }



    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}

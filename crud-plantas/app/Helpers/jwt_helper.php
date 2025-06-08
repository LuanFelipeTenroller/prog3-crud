<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function criarToken($usuario)
{
    $key = getenv('JWT_SECRET');
    $payload = [
        'iat' => time(),
        'exp' => time() + 3600, // 1h de validade
        'uid' => $usuario['id'],
        'nome' => $usuario['nome'],
        'email' => $usuario['email'],
        'papel' => $usuario['papel']
    ];

    return JWT::encode($payload, $key, 'HS256');
}

function verificarToken($token)
{
    $key = getenv('JWT_SECRET');
    return JWT::decode($token, new Key($key, 'HS256'));
}

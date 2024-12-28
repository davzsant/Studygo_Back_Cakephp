<?php
namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CorsMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);

        $origin = $request->getHeaderLine('Origin');

        // Lista de origens permitidas (substitua com as suas origens)
        $allowedOrigins = [
            'http://localhost:5173', // Seu frontend Vue
            // Adicione outras origens se necessário
        ];

        if (in_array($origin, $allowedOrigins) || empty($origin)) { // Verifica se a origem está na lista ou se a requisição não possui Origin (ex: requisições do Postman)
            $response = $response->withHeader('Access-Control-Allow-Origin', $origin);
        }

        // Configurações adicionais de CORS (opcional)
        $response = $response->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS'); // Métodos permitidos
        $response = $response->withHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With'); // Cabeçalhos permitidos
        $response = $response->withHeader('Access-Control-Allow-Credentials', 'true'); // Permite envio de cookies (se necessário)
        $response = $response->withHeader('Access-Control-Max-Age', '86400'); // Tempo de cache das opções de preflight (em segundos)

        // Lidar com requisições OPTIONS (preflight)
        if ($request->getMethod() == 'OPTIONS') {
            $response = $response->withStatus(200);
        }

        return $response;
    }
}

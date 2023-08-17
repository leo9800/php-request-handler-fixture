<?php

namespace Leo980\RequestHandlerFixture;

use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Nyholm\Psr7;

class RequestHandler implements RequestHandlerInterface
{
    /**
     * Inbounding request
     * @var \Psr\Http\Message\ServerRequestInterface
     */
    private ServerRequestInterface $request;

    /**
     * Response to requests
     * @var \Psr\Http\Message\ResponseInterface
     */
    private ResponseInterface $response;

    public function __construct(ResponseInterface|null $response = null)
    {
        $this->response = $response ?? new Psr7\Response();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $this->request = $request;
        return $this->response;
    }

    public function getRequest(): ServerRequestInterface
    {
        return $this->request;
    }
}
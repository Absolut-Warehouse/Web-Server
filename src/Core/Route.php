<?php

namespace Core;

class Route
{
    private string $uri;
    private string $method;
    private $callback;
    private bool $requireLogin = false;

    public function __construct(string $method, string $uri, $callback)
    {
        $this->method = $method;
        $this->uri = $uri;
        $this->callback = $callback;
    }

    /**
     * Marque la route comme nécessitant une authentification
     */
    public function requireLogin(): self
    {
        $this->requireLogin = true;
        return $this;
    }

    public function needsLogin(): bool
    {
        return $this->requireLogin;
    }

    public function getCallback()
    {
        return $this->callback;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUri(): string
    {
        return $this->uri;
    }
}

<?php
namespace Core;

use Core\Auth;

class Route
{
    private string $uri;
    private string $method;
    private $callback;

    private bool $requireLogin = false;
    private bool $requireEmployee = false;
    private bool $requireAdmin = false;

    public function __construct(string $method, string $uri, $callback)
    {
        $this->method = $method;
        $this->uri = $uri;
        $this->callback = $callback;
    }

    /**
     * Route nécessitant une connexion
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

    /**
     * Route réservée aux employés
     */
    public function requireEmployee(): self
    {
        $this->requireEmployee = true;
        $this->requireLogin = true;
        return $this;
    }

    public function needsEmployee(): bool
    {
        return $this->requireEmployee;
    }

    public function isEmployee(): bool
    {
        $user = Auth::user();
        return $user ? $user->isEmployee() : false;
    }

    /**
     * Route réservée aux administrateurs
     */
    public function requireAdmin(): self
    {
        $this->requireAdmin = true;
        $this->requireLogin = true;
        return $this;
    }

    public function needsAdmin(): bool
    {
        return $this->requireAdmin;
    }

    public function isAdmin(): bool
    {
        $user = Auth::user();
        return $user ? $user->isAdmin() : false;
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

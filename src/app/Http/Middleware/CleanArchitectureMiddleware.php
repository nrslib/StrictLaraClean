<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Router;

class CleanArchitectureMiddleware
{
    /**
     * @var mixed
     */
    private $data;

    /**
     * @var Router
     */
    private $router;

    /**
     * CleanArchitectureMiddleware constructor.
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * @param mixed $data
     * @see \Illuminate\Routing\Router::toResponse()
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        if ($this->data === null) {
            return $response;
        }

        return $this->router->prepareResponse($this->router->getCurrentRequest(), $this->data);
    }
}

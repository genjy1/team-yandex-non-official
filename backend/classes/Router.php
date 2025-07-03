<?php
namespace Classes;

class Router
{
    private array $api = [];

    public function setApi(array $api): void
    {
        $this->api = $api;
    }

    public function getHandler(string $path): ?callable
    {
        $path = parse_url($path, PHP_URL_PATH); // чистим путь от параметров
        if (isset($this->api['route'], $this->api['handler']) && $this->api['route'] === $path) {
            return $this->api['handler'];
        }
        return null;
    }
}

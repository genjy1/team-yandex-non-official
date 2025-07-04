<?php
namespace Classes;

class Router
{
    /**
     * @var array<int, array{route: string, handler: callable}>
     */
    private array $api = [];

    /**
     * Добавляет маршрут
     * @param array{route: string, handler: callable} $routeData
     * @return void
     */
    public function addApi(array $routeData): void
    {
        if (!isset($routeData['route']) || !isset($routeData['handler']) || !is_callable($routeData['handler'])) {
            throw new \InvalidArgumentException('Route data must contain "route" and callable "handler".');
        }
        $this->api[] = $routeData;
    }


    /**
     * Ищет обработчик по пути
     * @param string $path
     * @return callable|null
     */
    public function getHandler(string $path): ?callable
    {
        $path = parse_url($path, PHP_URL_PATH);

        foreach ($this->api as $routeData) {
            if (str_starts_with($path, $routeData['route'])) {
                return $routeData['handler'];
            }
        }

        return null;
    }


}


<?php

namespace TeamYandex;

class Router
{
    private array $api = [];

    public function setApi(array $api): void
    {
        // сохраняем как есть или проверяем наличие ключей
        $this->api = $api;
    }

    public function getApi(): array
    {
        return ['api' => $this->api];
    }


    public function resolve(string $path): ?string
    {
        return $this->api['route'] === $path ? __DIR__ . $this->api['file'] : null;
    }
}

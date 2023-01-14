<?php

namespace app\core\interfaces;
interface ModelInterface
{
    public function get(): array;

    public function create(): bool;

    public function update(array $array): bool;

    public function delete(array $array): bool;

    public function findOne(array $array): bool|object;
}

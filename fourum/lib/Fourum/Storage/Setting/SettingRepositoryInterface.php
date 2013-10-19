<?php namespace Fourum\Storage\Setting;

use Fourum\Models\Setting;

interface SettingRepositoryInterface
{
    public function all();

    public function get($name);

    public function getByNamespace($namespace);

    public function getByNamespaceAndName($namespace, $name);

    public function create(array $input);
}

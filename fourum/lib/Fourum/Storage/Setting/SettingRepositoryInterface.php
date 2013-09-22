<?php namespace Fourum\Storage\Setting;

interface SettingRepositoryInterface
{
    public function all();

    public function get($name);
}

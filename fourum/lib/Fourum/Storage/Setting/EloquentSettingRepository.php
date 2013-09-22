<?php namespace Fourum\Storage\Setting;

use Fourum\Models\Setting;

/**
 * Eloquent Setting Repository
 *
 * Setting repository for an Eloquent model.
 */
class EloquentSettingRepository implements SettingRepositoryInterface
{
    /**
     * Get all Settings.
     *
     * @return Setting[]
     */
    public function all()
    {
        return Setting::all();
    }

    /**
     * Get Settings for a given namespace.
     *
     * @param  string $name
     * @return Setting[]
     */
    public function getByNamespace($namespace)
    {
        $settings = Setting::where('namespace', $namespace)->get();

        return $settings;
    }

    /**
     * Get a Setting for a given namespace and name.
     * @param  string $namespace
     * @param  string $name
     * @return Setting
     */
    public function getByNamespaceAndName($namespace, $name)
    {
        $setting = Setting::where('namespace', $namespace)->where('name', $name)->first();

        return $setting;
    }

    /**
     * Get the value of a Setting.
     *
     * @param  string $name
     * @return mixed
     */
    public function get($name)
    {
        list($namespace, $name) = explode('.', $name);

        $setting = $this->getByNamespaceAndName($namespace, $name);

        return $setting->value;
    }
}

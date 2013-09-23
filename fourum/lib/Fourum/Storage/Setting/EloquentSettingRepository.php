<?php namespace Fourum\Storage\Setting;

use Fourum\Models\Setting;
use Illuminate\Support\Facades\File;
use Symfony\Component\Yaml\Parser;

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
        $dbSettings = Setting::where('namespace', $namespace)->get();

        return $this->normaliseSettings($namespace, $dbSettings);
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

        if ($setting) {
            return $setting->value;
        }

        return null;
    }

    /**
     * Normalise settings into a standard array.
     *
     * @param  string $namespace
     * @param  array $settings
     * @return array
     */
    private function normaliseSettings($namespace, $settings)
    {
        $normalisedSettings = array();

        foreach ($settings as $dbSetting) {
            $setting = array();
            $setting['namespace'] = $namespace;
            $setting['name'] = $dbSetting->name;
            $setting['title'] = $dbSetting->title;
            $setting['description'] = $dbSetting->description;
            $setting['value'] = $dbSetting->value;

            $normalisedSettings[$setting['name']] = $setting;
        }

        return $normalisedSettings;
    }
}

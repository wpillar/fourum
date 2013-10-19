<?php namespace Fourum\Storage\Setting;

use Fourum\Models\Setting;

/**
 * Settings Manager
 *
 * Managers the retrieving, saving and updating of
 * settings across File and DB repositories.
 */
class Manager
{
    /**
     * Database repository.
     *
     * @var EloquentSettingRepository
     */
    private $db;

    /**
     * Filesystem repository.
     *
     * @var FileSettingRepository
     */
    private $file;

    /**
     * Setup the Manager.
     *
     * @param EloquentSettingRepository $eloquent
     * @param FileSettingRepository     $file
     */
    public function __construct(EloquentSettingRepository $eloquent, FileSettingRepository $file)
    {
        $this->db = $eloquent;
        $this->file = $file;
    }

    /**
     * Set the value of a setting.
     *
     * @param string $namespace
     * @param string $name
     * @param mixed $value
     */
    public function set($namespace, $name, $value)
    {
        $setting = $this->getByNamespaceAndName($namespace, $name);

        if ($setting instanceof Setting) {
            $setting->value = $value;
            $setting->save();
        } elseif ($value !== $setting['value']) {
            $data = array(
                'namespace' => $namespace,
                'name' => $name,
                'title' => $setting['title'],
                'value' => $value,
                'description' => $setting['description']
            );

            $setting = $this->db->create($data);
        }

        return $setting;
    }

    /**
     * Get the settings for a given namespace.
     *
     * @param  string $namespace
     * @return array
     */
    public function getByNamespace($namespace)
    {
        $dbSettings = $this->db->getByNamespace($namespace);
        $fileSettings = $this->file->getByNamespace($namespace);

        return array_merge($fileSettings, $dbSettings);
    }

    /**
     * Get the setting for a given namespace and name.
     *
     * @param  string $namespace
     * @param  string $name
     * @return mixed
     */
    public function getByNamespaceAndName($namespace, $name)
    {
        $dbSetting = $this->db->getByNamespaceAndName($namespace, $name);

        if ($dbSetting) {
            return $dbSetting;
        }

        $fileSetting = $this->file->getByNamespaceAndName($namespace, $name);

        if ($fileSetting) {
            return $fileSetting;
        }

        return null;
    }

    /**
     * Get the value of a setting.
     *
     * @param  string $name
     * @return mixed
     */
    public function get($name)
    {
        $dbSetting = $this->db->get($name);

        if ($dbSetting) {
            return $dbSetting;
        }

        return $this->file->get($name);
    }
}

<?php namespace Fourum\Storage\Setting;

use Fourum\Models\Setting;
use Illuminate\Support\Facades\File;
use Symfony\Component\Yaml\Parser;

/**
 * File Setting Repository
 *
 * Filesystem storage for settings, stored in YAML files. There's a YAML
 * file for each namespace in naming convention {namespace}.yml.
 */
class FileSettingRepository implements SettingRepositoryInterface
{
    /**
     * Get all settings from all YAML files.
     *
     * @return array
     */
    public function all()
    {
        $namespaceFiles = File::files($this->getSettingsDir());

        $settings = array();

        foreach ($namespaceFiles as $file) {
            $namespace = $this->getFilenameFromPath($file);
            $namespaceSettings = $this->getSettingsFromFile($file);

            $settings[$namespace] = $this->normaliseSettings($namespace, $namespaceSettings);
        }

        return $settings;
    }

    /**
     * Get the value of a Setting.
     *
     * @param  string $name format: namespace.name
     * @return mixed
     */
    public function get($name)
    {
        list($namespace, $name) = explode('.', $name);

        $setting = $this->getByNamespaceAndName($namespace, $name);

        if ($setting) {
            return $setting['value'];
        }

        return null;
    }

    /**
     * Get all settings for a given namespace.
     *
     * @param  string $namespace
     * @return array
     */
    public function getByNamespace($namespace)
    {
        $namespaceFile = $this->getSettingsDir("/{$namespace}.yml");

        return $this->normaliseSettings($namespace, $this->getSettingsFromFile($namespaceFile));
    }

    /**
     * Get a setting by its namespace and name.
     *
     * @param  string $namespace
     * @param  string $name
     * @return array|null
     */
    public function getByNamespaceAndName($namespace, $name)
    {
        $settings = $this->getByNamespace($namespace);

        if (isset($settings[$name])) {
            return $settings[$name];
        }

        return null;
    }

    /**
     * @param  array  $input
     * @return void
     */
    public function create(array $input) {}

    /**
     * Return a file name from a path.
     *
     * i.e. 'path/to/a/name.less' -> 'name'
     *
     * @param  string $path
     * @return string
     */
    private function getFilenameFromPath($path)
    {
        $pathBits = explode('/', $path);
        $file = end($pathBits);
        $fileBits = explode('.', $file);
        $filename = $fileBits[0];

        return $filename;
    }

    /**
     * Normalise the settings into a standardised array.
     *
     * @param  string $namespace
     * @param  array $settings
     * @return array
     */
    private function normaliseSettings($namespace, array $settings)
    {
        $normalisedSettings = array();

        foreach ($settings as $name => $values) {
            $setting = array();
            $setting['namespace'] = $namespace;
            $setting['name'] = $name;
            $setting['title'] = $values['title'];
            $setting['description'] = $values['description'];
            $setting['value'] = $values['value'];

            $normalisedSettings[$name] = $setting;
        }

        return $normalisedSettings;
    }

    /**
     * Get settings from a YAML file.
     *
     * @param  string $filePath
     * @return array
     */
    private function getSettingsFromFile($filePath)
    {
        $yaml = new Parser();

        return $yaml->parse(File::get($filePath));
    }

    /**
     * Get the path for the settings directory.
     *
     * @param  string $path
     * @return string
     */
    private function getSettingsDir($path = null)
    {
        return app_path("config/settings").$path;
    }
}

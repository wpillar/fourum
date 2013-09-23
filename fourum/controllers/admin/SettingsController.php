<?php namespace Fourum\Controllers\Admin;

use Fourum\Controllers\AdminController;
use Fourum\Models\Setting;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

/**
 * Settings Controller
 */
class SettingsController extends AdminController
{
    /**
     * General Settings.
     */
    public function index()
    {
        $settings = $this->settings->getByNamespace('general');

        $data['settings'] = $settings;

        echo View::make('settings.general', $data);
    }

    /**
     * Banning settings.
     */
    public function banning()
    {
        $settings = $this->settings->getByNamespace('banning');

        $data['settings'] = $settings;

        echo View::make('settings.banning', $data);
    }

    /**
     * Save settings.
     */
    public function save()
    {
        $newSettings = Input::all();

        foreach ($newSettings as $namespaceAndName => $value) {
            list($namespace, $name) = explode('_', $namespaceAndName);

            $this->settings->set($namespace, $name, $value);
        }

        return Redirect::to('admin/settings')->with('message', '<strong>Saved!</strong> your settings have been saved.');
    }
}

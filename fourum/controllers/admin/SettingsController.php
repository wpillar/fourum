<?php namespace Fourum\Controllers\Admin;

use Fourum\Controllers\AdminController;
use Fourum\Models\Setting;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class SettingsController extends AdminController
{
    public function index()
    {
        $settings = $this->settings->getByNamespace('general');

        $data['settings'] = $settings;

        echo View::make('settings.general', $data);
    }

    public function edit()
    {
        $newSettings = Input::all();

        foreach ($newSettings as $namespaceAndName => $value) {
            list($namespace, $name) = explode('_', $namespaceAndName);

            $setting = $this->settings->getByNamespaceAndName($namespace, $name);
            $setting->value = $value;
            $setting->save();
        }

        return Redirect::to('admin/settings')->with('message', '<strong>Saved!</strong> your settings have been saved.');
    }

    public function banning()
    {
        echo View::make('settings.banning');
    }
}

<?php namespace Fourum\Models;

use Fourum\Storage\Setting\SettingInterface;

class Setting extends \Eloquent implements SettingInterface
{
	protected $guarded = array('id');
}

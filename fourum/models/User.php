<?php namespace Fourum\Models;

use Fourum\Storage\User\UserInterface;
use Illuminate\Auth\UserInterface as IlluminateUserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Support\Facades\Hash;

class User extends \Eloquent implements UserInterface, IlluminateUserInterface, RemindableInterface
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	 * Get the groups that this User is a member of.
	 *
	 * @return array
	 */
	public function groups()
	{
		return $this->belongsToMany('Group');
	}

	/**
	 * @param string $email
	 */
	public function setEmail($email)
	{
		$this->email = $email;
	}

	/**
	 * @param string $password
	 */
	public function setPassword($password)
	{
		$this->password = Hash::make($password);
	}

	/**
	 * @param string $username
	 */
	public function setUsername($username)
	{
		$this->username = $username;
	}

	/**
	 * @param string $date
	 */
	public function setBirthDate($date)
	{
		$this->birthdate = $date;
	}
}

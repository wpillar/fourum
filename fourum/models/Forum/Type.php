<?php namespace Fourum\Models\Forum;

class Type extends \Eloquent
{
    /**
     * @var string
     */
    protected $table = 'forum_type';

    public function getForums()
    {
        return $this->hasMany('Forum');
    }

    public static function getCategoryType()
    {
        return self::where('name', 'category')->first();
    }

    public static function getForumType()
    {
        return self::where('name', 'forum')->first();
    }
}

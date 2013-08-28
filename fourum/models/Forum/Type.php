<?php namespace Fourum\Models\Forum;

class Type extends Eloquent
{
    protected $table = 'forum_type';

    public function forums()
    {
        return $this->hasMany('Forum');
    }
}

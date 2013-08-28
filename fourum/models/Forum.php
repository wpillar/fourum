<?php namespace Fourum\Models;

class Forum extends Eloquent
{
    protected $table = 'forums';

    public function type()
    {
        return $this->belongsTo('Type');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SingletonModel extends Model
{
    
    protected static $instance;
    
    protected function __consturct(array $attributes = []){
        parent::__consturct($attributes);
    }
    
    public static function getInstance():SingletonModel
    {
        if(static::$instance == null){
            static::$instance = new static();
        }
        return static::$instance;
    }

}

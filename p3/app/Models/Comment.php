<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
            /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'comments';

     public function users()
    {

        return $this->belongsToMany('App\Models\User')
        ->withTimestamps(); 
    }

}
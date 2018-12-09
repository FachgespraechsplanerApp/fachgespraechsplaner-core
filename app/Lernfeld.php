<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lernfeld extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number', 'name', 'schulformId', 'year'
    ];

    /**
     * The name of the table.
     *
     * @var string
     */
    protected $table = 'lernfelder';
}

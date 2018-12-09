<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schulform extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'short', 'institutionId'
    ];

    /**
     * The name of the table.
     *
     * @var string
     */
    protected $table = 'schulform';
}

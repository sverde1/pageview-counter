<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageViewLog extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'PageViewLog';

    /**
     * Setting table's fillable fields
     * 
     * @var array
     */
    protected $fillable = [ 'url', 'user_id' ];
}

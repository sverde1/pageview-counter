<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'PageView';

    /**
     * Setting table's fillable fields
     * 
     * @var array
     */
    protected $fillable = [ 'url', 'views_count' ];
}

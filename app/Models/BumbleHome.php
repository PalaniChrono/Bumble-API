<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BumbleHome extends Model
{
    use HasFactory;


    public $timestamps = false;
    protected $table = 'home_banner';
    protected $primarykey = 'id';
    protected $fillable = [
        'banner_1',
        'banner_2',
        'banner_3',
        'banner_4'
    ];
}

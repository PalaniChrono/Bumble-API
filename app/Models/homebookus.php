<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class homebookus extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'homebookus';
    protected $primary = 'id';
    protected $fillable = [
        'name',
        'mobile'
    ];
}

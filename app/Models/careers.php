<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class careers extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'careers';
    protected $primaryKey = 'id';
    protected $fillable = [
    'name',
    'mobile',
    'resume',


];
// protected $hidden = ['created_at','updated_at'];

}

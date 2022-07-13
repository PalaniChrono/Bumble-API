<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = 'contacts';
    protected $primaryKey = 'id';
    protected $fillable = [
    'address_one',
    'address_two',
    'email',
    'contact_one',
    'contact_two',
    'whatsapp',
    'facebook',
    'snapchat',
    'instagram'
    ];
}

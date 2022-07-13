<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\ResponseRepository;

class ExtraEventDetails extends Model
{
    use HasFactory;
     public $timestamps = false;
    protected $table = 'extra_event';
    protected $primaryKey = 'id';
    
protected $fillable = [
    'book_us_id',
     'event_name',
     'event_date',
     'event_time',
     'venue',
     'city',
     'created_at',
];
protected $hidden = ['created_at','updated_at'];

// public function extraevent() {
//     return $this->hasMany('App\Models\bookus','enquire_id', 'id')->orderBy('event_date', 'desc');
// }


}

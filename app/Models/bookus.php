<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ExtraEventDetails;
use App\Models\bookus;
use App\Repositories\ResponseRepository;


class bookus extends Model
{
    use HasFactory;

    // public $timestamps = false;
    protected $table = 'book_us_name';
    protected $primaryKey = 'id';
    protected $fillable = [
      'bride_name',
      'groom_name',
      'enquire_name',
      'enquire_mobile_no',
      'email_id'
    ];
   protected $hidden = ['created_at','updated_at'];

public function extraevent() {
    // return $this->hasMany('App\Models\bookus','book_us_id', 'id')->orderBy('event_date', 'desc');
    return $this->hasMany('App\Models\ExtraEventDetails','book_us_id', 'id')->orderBy('event_date', 'desc');

}

// public function eventperson() {
//   return $this->hasOne('App\Models\bookus','id', 'book_us_id');
// }


}

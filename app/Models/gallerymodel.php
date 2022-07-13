<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class gallerymodel extends Model
{
    use HasFactory;



    public $timestamps = false;
    protected $table = 'gallery';
    // protected $primarykey = 'id';
    protected $fillable = [
        'weddingpotrait',
        'wedding2',
        'wedding3',
        'wedding4',
        'wedding5',
       'wedding6',
        'wedding7',
        'wedding8',
        'wedding9',
        'wedding10',
       'wedding11',
       'wedding12',
       'wedding13',
       'wedding14',
     'outdoorportrait',
       'outdoor2',
        'outdoor3',
        'outdoor4',
        'outdoor5',
        'outdoor6',
        'outdoor7',
        'outdoor8',
        'outdoor9',
        'outdoor10',
        'outdoor11',
        'outdoor12',
        'babywashportrait',
       'babywash2',
        'babywash3',
        'babywash4',
        'babywash5',
        'babywash6',
        'babywash7',
        'babywash8',
        'babywash9',
       'babywash10',
        'babywash11',
        'babywash12',
        'weddingtextcontent',
        'outdoorstextcontent',
        'babywashtextcontent',
        'alltextcontent',
    ];


}

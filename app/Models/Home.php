<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'homes';
    protected $primaryKey = 'id';
    protected $fillable = [
    'POne_SecOne_TxtOne',
    'POne_SecOne_TxtTwo',
    'POne_SecOne_Img',
    
    'POne_SecTwo_Txt',
    'POne_SecTwo_Img',
    'POne_SecThree_ImgOne',
    'POne_SecThree_ImgTwo',
    'POne_SecThree_ImgThree',
    'POne_SecThree_Txt',
    'POne_SecThree_ImgFour',
    'POne_SecFour_Txt',
    'POne_SecFour_Img',
    'POne_SecThree_ImgTwo_sub_one',
    'POne_SecThree_ImgTwo_sub_two',
    'POne_SecThree_ImgTwo_sub_three'
   
    ];
}

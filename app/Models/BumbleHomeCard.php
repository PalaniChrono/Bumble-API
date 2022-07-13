<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BumbleHomeCard extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'home_section';
    protected $primarykey = 'id';
    protected $fillable = [
        'home_card_1_img',
        'home_card_1_iconImg',
        'home_card1_heading',
        'home_card_1_textcontent',
        'home_card_2_img',
        'home_card2_iconImg',
        'home_card2_heading',
        'home_card2_textcontent',
        'home_card3_img',
        'home_card_3_iconImg',
        'home_card3_heading',
        'home_card3_textcontent',
        'home_bigsizetext',
        'home_whoarewe_text',
        'home_video_url',

    ];
}

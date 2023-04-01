<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'short_title',
        'long_description',
        'skill_category',
        'services_title',
        'services_description',
        'short_card_story_title',
        'short_card_social_title',
        'short_card_work_title',
        'about_me_image',
        
    ];
}

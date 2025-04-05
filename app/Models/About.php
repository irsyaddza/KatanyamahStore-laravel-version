<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class About extends Model
{
    protected $table = "abouts";
    protected $fillable = [
        'story',
        'story2',
        'story_img',
        'values1',
        'title_values1',
        'values2',
        'title_values2',
        'values3',
        'title_values3',
    ];
    use HasFactory, Notifiable;
}
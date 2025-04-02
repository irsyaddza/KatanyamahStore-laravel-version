<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class About extends Model
{
    protected $table = "abouts";
    protected $fillable = ['story', 'story2', 'story_img'];
    use HasFactory, Notifiable;
}
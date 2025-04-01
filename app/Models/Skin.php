<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skin extends Model
{
    protected $table = "skins";
    protected $fillable = ['name', 'img_url', 'status'];
    use HasFactory, Notifiable;
}

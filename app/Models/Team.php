<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    protected $table = "teams";
    protected $fillable = ['team_name', 'team_rank', 'team_img'];
    use HasFactory, Notifiable;
}

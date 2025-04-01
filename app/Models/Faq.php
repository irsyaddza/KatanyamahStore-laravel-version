<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    protected $table = "faqs";
    protected $fillable = ['question', 'answer'];
    use HasFactory, Notifiable;
}

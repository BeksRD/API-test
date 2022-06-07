<?php

namespace App\Models;

use App\Casts\AsArray;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subject';

    protected $fillable = [
      'name','content'
    ];
    protected $casts = [
        'content' => AsArray::class,
    ];
}

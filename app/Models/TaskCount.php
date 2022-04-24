<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskCount extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'date' => 'date',
        'tasks' => 'array',
    ];

    public function asdf($id)
    {
      return  TaskCount::whereUserId(auth()->id())->whereJsonContains('tasks', ''.$id.'')->count();
    }
}

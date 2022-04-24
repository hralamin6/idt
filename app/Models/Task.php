<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function monthlyCount($id, $date)
    {
        $parts = explode('-', $date);
        return  TaskCount::whereMonth('date', '=', $parts[0])->whereYear('date', '=', $parts[1])->whereUserId(auth()->id())->whereJsonContains('tasks', ''.$id.'')->count();
    }

}

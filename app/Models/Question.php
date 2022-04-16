<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function quiz()
    {
        return $this->belongsTo(Quiz::class)->withDefault();
    }
    public function options()
    {
        return $this->hasMany(Option::class);
    }
//    public function options()
//    {
//        return $this->hasMany(Option::class)->inRandomOrder();
//    }
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    public function option()
    {
        return $this->belongsTo(Option::class, 'answer')->withDefault();
    }

    public function userAnswer()
    {
        return $this->hasOne(Answer::class)->where('user_id', '=', auth()->id())->withDefault();
    }

}

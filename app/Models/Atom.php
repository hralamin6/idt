<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atom extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function options(Atom $atom)
    {
        $f = substr($atom->symbol, 0, 1);
        return Atom::where('id', '!=', $atom->id)->where('symbol', 'like', $f.'%')->inRandomOrder()->limit(3)->get()->merge(Atom::where('id', $atom->id)->get());
    }

    public function getType()
    {
        if ($this->category=='alkaline earth metal'){
            return 'text-green-400';
        }elseif($this->category=='diatomic nonmetal'){
            return 'text-green-500';
        }elseif($this->category=='alkali metal'){
            return 'text-yellow-500';
        }elseif($this->category=='noble gas'){
            return 'text-orange-500';
        }elseif($this->category=='metalloid'){
            return 'text-blue-500';
        }elseif($this->category=='polyatomic nonmetal'){
            return 'text-red-500';
        }elseif($this->category=='post-transition metal'){
            return 'text-yellow-500';
        }elseif($this->category=='transition metal'){
            return 'text-pink-500';
        }elseif($this->category=='lanthanide'){
            return 'text-purple-500';
        }elseif($this->category=='actinide'){
            return 'text-indigo-500';
        }else{
            return 'text-gray-500';
        }
    }
}

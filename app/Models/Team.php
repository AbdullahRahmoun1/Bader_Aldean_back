<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'grade',
        'class',
        'logo'
    ];
    protected $hidden=[
        'created_at',
        'updated_at'
    ];
    public function players(){
        return $this->hasMany(Player::class); 
    }
    public function contests(){
        return Contest::where('firstTeam_id',$this->id)
        ->orWhere('secondTeam_id',$this->id)
        ->get();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ["title","description","status","user_id"];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
}

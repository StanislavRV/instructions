<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    use HasFactory;

    protected $table = "instruction";
    protected $primaryKey = "id";
    protected $fillable = ["title", 'description', 'path', 'confirm', 'user_id', 'category_id'];

    public $timestamps = false;

    public function category(){
        return $this->hasOne(InstructionCategory::class, "id", "category_id");
    }

    public function author(){
        return $this->hasOne(User::class, "id", "user_id");
    }
}


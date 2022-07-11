<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructionCategory extends Model
{
    use HasFactory;

    protected $table = "category";
    protected $primaryKey = "id";
    protected $fillable = ["title"];

    public $timestamps = false;
}

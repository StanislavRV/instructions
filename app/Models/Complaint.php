<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $table = "complaint";
    protected $primaryKey = "id";
    protected $fillable = ['description', 'instruction_id'];

    public $timestamps = false;

    public function instruction(){
        return $this->hasOne(Instruction::class, "id", "instruction_id");
    }

   
}

<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Instruction;
use App\Models\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



class AdminController extends Controller
{
    public function index()
    {
        
        $allInstruction = Instruction::query()->where('confirm', 0)->get();

        return view("/accept", ["instructions" => $allInstruction]);
    }
    
    public function acceptPost($id)
    {        
        $instruction = Instruction::query()->where('id', $id)->first();
        $instruction->confirm = 1;
        $instruction->save();       

        return redirect("accept"); 
    }

    public function delete($route, $id){       

        $instruction = Instruction::query()->where("id", $id)->first();
        if($instruction == null){
            throw new NotFoundHttpException("Not found instruction " . $id);
        }

        $complaint = Complaint::query()->where("instruction_id", $id);
        $complaint->delete();
        
        $instruction->delete();
        
        return redirect($route);       
    }

    public function banned($id){

        $user = User::query()->where("id", $id)->first();
        if($user == null){
            throw new NotFoundHttpException("User found instruction " . $id);
        }

        $user->banned = !($user->banned);
        $user->save(); 

        return redirect("instructions");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\Request;


class ComplaintController extends Controller
{
    public function index()
    {        
        $allComplaint = Complaint::all();
        return view("/complaint", ["complaints" => $allComplaint]);
    }

    public function create($id)
    {        
        $instr_id = $id;
        return view("/createComplaint", ["instr_id" => $instr_id]);
       
    }

    public function createComplaintPost(Request $request)
    {
        $request->validate([            
            'description' => "required",  
        ]);

        
        $description = $request->description;
        $instruction_id = $request->instr_id;

        $complaint = new Complaint();      
        $complaint->description = $description;
        $complaint->instruction_id = $instruction_id;
      

        $complaint->save();

        return redirect("/");
    }




    public function delete($id){
        $complaint = Complaint::query()->where("id", $id)->first();
        if($complaint == null){
            throw new NotFoundHttpException("Not found instruction " . $id);
        }

        $complaint->delete();

        return redirect("complaint");       
    }
}

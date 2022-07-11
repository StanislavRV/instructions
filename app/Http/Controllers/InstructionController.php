<?php

namespace App\Http\Controllers;

use App\Models\Instruction;
use App\Models\InstructionCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class InstructionController extends Controller
{
    public function index()
    {
       
        $allInstruction = Instruction::query()->where('confirm', 1)->get();
      

        return view("/instructions", ["instructions" => $allInstruction]);
    }

    public function search(Request $request)
    {
        
        $search = "%" . $request->search . "%";
             
        $allInstruction = Instruction::query()->where('confirm', 1)->where('title', 'like', $search)->get(); 
     
        return view("/instructions", ["instructions" => $allInstruction]);
    }


    public function create()
    {
        $categories = InstructionCategory::all();
        
        return view("/create", ["categories" => $categories]);
       
    }
    
    public function download($file)
    {
        // $content = file_get_contents('uploads/ .$file');  
        // return view("/showInstruction", ["file" => $file]);
        
        // $url = Storage::url('uploads/' . $file);
        // $path = path('public/uploads/' . $file);
        // Storage::download(public_path() . '/uploads/' . $file);
        // Storage::download(asset($path));

        return redirect("/");
    }
    
    public function createInstruction(Request $request)
    {
        $request->validate([
            "title" => "required",
            'description' => "required",            
            "category_id" => "required",
            'path' => ['required', 'mimetypes:text/plain'],            
        ]);

        

        $title = $request->title;
        $description = $request->description;


        $instruction = new Instruction();
        $instruction->title = $title;
        $instruction->description = $description;

        if ($request->new_category) {

            $category = new InstructionCategory();
            $title = $request->new_category;
            $category->title = $title;
            $category->save();

            $category_id = InstructionCategory::query()->where('title', $title)->first();

            $instruction->category_id = $category_id->id;

        }else{

            $category_id = $request->category_id;
            $instruction->category_id = $category_id;
        }


        $file = $request->file("path");
        if ($file != null) {

            $fileName = time() . $file->getClientOriginalName();
      
            $file->move(public_path() . "/uploads", $fileName);

            $instruction->path = "$fileName";
        }

        $instruction->user_id = Auth::user()->id;

        $instruction->save();

        return redirect("/");
    }

    

}

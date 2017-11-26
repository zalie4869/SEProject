<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use DB;
use Storage;
use Auth;

class FileController extends Controller
{
    public function index($page) {

        if(!Auth::check()){
            return redirect('/home');
        }
    
        $limit = 5;
        $files = new File;
        $lastPage = $files->count()/$limit;

    
        if(fmod($lastPage,1) > 0){
          $lastPage = intval($lastPage+1);
        }

        //convert float to int
        if(fmod($lastPage,1) > 0){
          $lastPage = intval($lastPage+1);
        }
        $start = ($page-1)*$limit;
        $files = $files->offset($start)->limit($limit)->get();
        
        return view('Download.upload')->with('files',$files)->with('lastPage',$lastPage)->with('page',$page);
          // return view('upload');

    }
   
    public function storeFile(request $request)
    {
        if(!Auth::check()){
            return redirect('/home');
        }
        // dd($request->file);
        // dd($request);

        if ($request->hasFile('file') && $request->has('filename')) {
            $filename = $request->file->getClientOriginalName();
            $filesize = $request->file->getClientSize();
            
            $filedir  = $request->file->store('public/upload');
            $file = new File;
            $file->name = $request->filename;
            $file->size = $filesize; 
          
            if(strchr($file->name,".")==".png" || strchr($file->name,".")==".doc" || strchr($file->name,".")==".docx" || strchr($file->name,".")==".pdf" || strchr($file->name,".")==".xls") {
                $file->dir = $filedir;
                $file->save();
                return back();
            }
            else {
                return back()->with('upload1','กรุณาเลือกไฟล์ที่ต้องการ');
            }
           
        }
        else {
            return back()->with('upload2','กรุณาเลือกไฟล์ที่ต้องการ');
        }

    }

   public function download($filename){ 

    if(!Auth::check()){
        return redirect('/home');
    }

    $pathToFile=public_path()."/public/upload/".$filename;
    return response()->download($pathToFile);           
    }


    public function delete(request $request)
    {
        if(!Auth::check()){
            return redirect('/home');
        }
        
        $file = DB::table('files')->where('id',$request->name)->first();
        Storage::delete($file->dir);
        DB::table('files')->where('id',$request->name)->delete();
        return redirect('/file/1');
      // echo $request->name;
    }
}

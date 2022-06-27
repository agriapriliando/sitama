<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use ZipArchive;

class DownloadController extends Controller
{
    public function index($rekkoran)
    {
        // $student = Student::where('id', $student_id)->select('berkas_one')->get();
        // return $student;
        // return response()->file('rek_koran/'.$rekkoran);
        return Storage::download('rek_koran/'.$rekkoran);
    }

    // public function rekkoran()
    // {
    //     $files = File::files(public_path('myFiles'));
    //     return $files;
    //     return Storage::allFiles('rek_koran');
    // }

    // public function download()
    // {
    //     // return "coba";
    //     // $aa = storage_path('app/rek_koran');
    //     // return $aa;
    //     $zip = new ZipArchive;
   
    //     $fileName = 'zip/myNewFile.zip';
   
    //     if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
    //     {
    //         $files = File::files(storage_path('app/rek_koran'));

    //         foreach ($files as $key => $value) {
    //             $file = basename($value);
    //             $zip->addFile($value, $file);
    //         }
            
    //         $zip->close();
    //     }
    
    //     return response()->download(public_path($fileName));
    // }
}

<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request)
    {

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('public/images/tmp/' . $folder, $filename);

            $temp = TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename
            ]);
            return $temp->folder;
        }
        return '';
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use App\Models\User;
use Illuminate\Http\Request;
use Plank\Mediable\Facades\MediaUploader;
use Plank\Mediable\Media;


class UserAvatarController extends Controller
{
    public function store(Request $request) {
        $user_photo = $request->input('avatar');
        $temporaryFile = TemporaryFile::where('folder', $user_photo)->first();

        if ($temporaryFile) {
            $storage_path = storage_path('app/public/images/tmp/' . $temporaryFile->folder . '/' . $temporaryFile->filename);            
                
            if (auth()->user()->hasMedia('profile')) {
                $media = Media::find(auth()->user()->media()->first()->id);
                MediaUploader::fromSource($storage_path)
                   ->replace($media);
                return back();    
            } 

            auth()->user()->attachMedia(MediaUploader::fromSource($storage_path)
                ->toDirectory('profiles/'. auth()->id())
                ->upload(), ['profile']);
            return back();                
        }
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Services\InstagramService;

class MediaController extends Controller
{

    public function getVisible(InstagramService $instagramService) {
        
        try {
            if($instagramService->is_synchronizable) {
                $instagramService->synchronize();
            }
        }
        catch(Exception $e) {
            Log::error($e->message);
        }
        

        $result = Photo::where('is_hidden', '=', false)
            ->orderBy('id', 'desc')->take(36)->get();

        return response()->json([
            'status' => 'success',
            'data' => $result
        ], 200);
    }

    public function getAll(InstagramService $instagramService) {
        
        try {
            if($instagramService->is_synchronizable) {
                $instagramService->synchronize();
            }
        }
        catch(Exception $e) {
            Log::error($e->message);
        }

        $result = Photo::where('is_deleted', false)->get();

        return response()->json([
            'status' => 'success',
            'data' => $result
        ], 200);
    }

    public function instagramSyncronization(InstagramService $instagramService) {
        
        $instagramService->synchronize();

        return response()->json([
            'status' => 'success'
        ], 200);
    }

    public function changeVisibility($id)
    {
        $photo = Photo::find($id);

        if($photo) {

            $photo->is_hidden = !$photo->is_hidden; 

            $photo->save();

            return response()->json([
                'status' => 'success'
            ], 200);
        }

        return response()->json([
            'status' => 'not found'
        ], 404);
    }

    public function delete($id, InstagramService $instagramService) {
        $instagramService->delete($id);

        return response()->json([
            'status' => 'success'
        ], 200);
    }
}

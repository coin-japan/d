<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::all();

        return response()->json([
            'status' => 'success',
            'settings' => $settings->toArray()
        ], 200);
    }

    
    public function update(Request $request, $id)
    {
        $setting = Settings::find($id);

        if(!$setting){
            return response()->json([
                'status' => 'error',
                'message' => 'Setting not found!'
            ], 404);
        }

        $setting->value = trim($request->value);
        
        $setting->save();

        return response()->json([
            'status' => 'success'
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locale;

class LangController extends Controller
{
    public function getStrings() {

        $db_resourses = $this->getAll();

        $response_data = [];
        $langs = [];

        foreach($db_resourses as $item) {
            if(! in_array($item['locale_index'], $langs)) {
                $langs[] = $item['locale_index'];
                $response_data[$item['locale_index']] = [];
            }
        }

        foreach($langs as $lang_index) {
            foreach($db_resourses as $item) {
                if($lang_index == $item['locale_index']) {
                    $response_data[$lang_index][$item['slug']] = $item['text'];
                }
            }
        }

        return response()->json([
            'status' => 'success',
            'data' => $response_data
        ], 200);
    }

    public function index(Request $request) {
        return response()->json([
            'status' => 'success',
            'data' => $this->getAll()->toArray()
        ], 200);
    }

    public function getItem(Request $request, $id) {
        return response()->json([
            'status' => 'success',
            'data' => $this->get($id)->toArray()
        ], 200);
    }

    public function update(Request $request, $id) {

        $item = $this->get($id);

        if(! $item) {
            return response()->json([
                'status' => 'error',
                'message' => 'Item not found!'
            ], 404);
        }

        $item->text = $request->text;

        $item->save();

        return response()->json([
            'status' => 'success',
            'user' => $item->toArray()
        ], 200);
    }

    public function create(Request $request) {
        $request->validate([
            'locale_index' => 'required',
            'page_index' => 'required',
            'section_index' => 'required',
            'slug' => 'required',
            'text' => 'required'
        ]);

        $item = $this->get($id);

        if(! $item) {
            return response()->json([
                'status' => 'error',
                'message' => 'Item not found!'
            ], 404);
        }

        $item->text = $request->text;

        $item->save();

        return response()->json([
            'status' => 'success',
            'user' => $item->toArray()
        ], 200);
    }

    public function delete(Request $request, $id) {
        $item = $this->get($id);
        
        if(!$item){
            return response()->json([
                'status' => 'error',
                'message' => 'Item not found!'
            ], 404);
        }

        $item->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'String has been deleted.'
        ], 200);
    }

    private function getAll() {
        return Locale::all();
    }

    private function get($id) {
        return Locale::find($id);
    }
}

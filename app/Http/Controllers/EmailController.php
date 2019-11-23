<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;
use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
  public function index() {
    $list = Email::all();

    return response()->json([
        'status' => 'success',
        'data' => $list->toArray()
    ], 200);
  }

  public function delete(Request $request, $id) {
    $item = Email::find($id);

    if(!$item){
        return response()->json([
            'status' => 'error',
            'message' => 'Item not found!'
        ], 404);
    }

    $item->delete();

    return response()->json([
      'status' => 'success',
      'message' => 'Note has been deleted.'
    ], 200);
  }
  
  public function send(Request $request) {

    $request->validate([
      'email' => 'required|email',
      'name' => 'required',
      'text' => 'required',
      'type' => 'nullable|numeric'
    ]);

    $item =  Email::create([
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
      'text' => $request->text,
      'type' => $request->type
    ]);

    $item->save();

    $obj = new \stdClass();
    $obj->name = $request->name;
    $obj->email = $request->email;
    $obj->phone = $request->phone;
    $obj->message = $request->text;
    $obj->sender = 'DND App';
    $obj->receiver = 'Admin';
 
    Mail::to("info@dnd.promo")->send(new ContactEmail($obj));
  }
}

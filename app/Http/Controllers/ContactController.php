<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->take(10)->get();
        return response()->json($contacts, 200);
    }

    public function destroy($id)
    {

       $contact = Contact::find($id);

       if ($contact){
           $contact->delete();
           return response()->json('success', 200);
       }else{
           return response()->json('failed', 404);
       }

    }
}

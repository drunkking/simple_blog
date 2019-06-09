<?php

namespace App\Http\Controllers;

use App\ContactMessage;
use Illuminate\Http\Request;

class ContactMessagesController extends Controller
{

    public function index(){

        $contact_messages = ContactMessage::orderBy('created_at','desc')->paginate(10);

        return view('messages.index')
            ->with('contact_messages', $contact_messages);
    }


    public function show($id){

        $contact_message = ContactMessage::findOrFail($id);

        return view('messages.show')
            ->with('contact_message', $contact_message);
    }

    public function destroy($id){

        $contact_message = ContactMessage::findOrFail($id);
        $contact_message->delete();

        return redirect('/home/messages')
            ->with('success','Message deleted');
    }
}

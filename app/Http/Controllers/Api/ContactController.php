<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    public function __invoke(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email',
            'phone'=>'required|string',
            'message'=>'required|string',
        ]);

        Contact::create($request->all());
        return \responder::success(__('Message Sent Successfully'));
    }
}

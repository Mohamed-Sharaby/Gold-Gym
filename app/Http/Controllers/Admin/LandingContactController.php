<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\LandingContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LandingContactController extends Controller
{

    public function store(Request $request)
    {
        $vL = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'phone' => 'required|phone:eg,sa',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        if ($vL->fails()) return response()->json([
            'status' => false,
            'errors' => $vL->errors()->first()
        ]);
        Contact::create($request->all());

        return response()->json([
            'status' => true,
        ]);
    }

}

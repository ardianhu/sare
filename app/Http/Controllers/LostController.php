<?php

namespace App\Http\Controllers;

use App\Models\Lost;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class LostController extends Controller
{
    //
    public function index() {
        return view('lostform');
    }

    public function form(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_id' => 'required',
        ]);
    
        // Handle file upload
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('img', 'public');
        } else {
            $path = null;
        }
    
        Lost::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'location' => $request['location'],
            'photo' => $path,
            'user_id' => $request['user_id'],
        ]);
    
        return redirect()->route('home');
    }
    
    public function markAsClaimed(Request $request, $id)
    {
        $lostItem = Lost::findOrFail($id);
        $lostItem->update(['is_claimed' => true]);

        return redirect()->back();
    }
}

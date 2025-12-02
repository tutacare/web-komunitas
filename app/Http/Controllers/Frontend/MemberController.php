<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function requirements()
    {
        return view('frontend.member.requirements');
    }

    public function registration()
    {
        return view('frontend.member.registration');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email'     => 'required|email|unique:members,email',
            'phone'     => 'required',
            'address'   => 'required',
            'motivation' => 'required',
        ]);

        // SIMPAN DATA
        \DB::table('members')->insert([
            'full_name' => $request->full_name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'address'   => $request->address,
            'motivation' => $request->motivation,
            'created_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Registrasi member berhasil dikirim');
    }
}

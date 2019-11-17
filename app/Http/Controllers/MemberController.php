<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();

        return view('admin.member.home', ['members' => $members]);
    }

    public function create()
    {
        return view('admin.member.create');
    }

    public function edit(string $id)
    {
        $member = Member::find($id);

        if (is_null($member)) {
            abort(404);
        }

        return view('admin.member.edit', ['member' => $member]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'zip_code' => 'max:4',
            'address' => 'max:255',
            'email' => 'email',
        ]);

        if ($request->has('id')) {
            $member = Member::find($request->id);

            if (is_null($member)) {
                abort(404);
            }
        } else {
            $member = new Member();
        }

        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->zip_code = $request->zip_code;
        $member->address = $request->address;
        $member->email = $request->email;
        $member->phone_number = $request->phone_number;

        $member->save();

        return redirect()->route('admin.members.home');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class InvitationController extends Controller
{
    //
    public function create()
    {
        $companies = Company::all();
        return view('invitations.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'role' => 'required',
            'company_id' => 'required'
        ]);

        Invitation::create([
            'email' => $request->email,
            'role' => $request->role,
            'company_id' => $request->company_id,
            'token' => Str::random(32),  //to identify the unique invitation
        ]);

        return back()->with('success', 'Invitation created successfully');
    }

    public function showAcceptForm($token)
    {
        $invitation = Invitation::where('token', $token)->first();

        if (!$invitation) {
            return "Invalid invitation";
        }

        return view('accept-invitation', compact('invitation'));
    }

    public function accept(Request $request, $token)
{
    $request->validate([
        'password' => 'required|min:6'
    ]);

    $invitation = Invitation::where('token', $token)->first();

    if (!$invitation) {
        return "Invalid or expired invitation";
    }

    $user = User::where('email', $invitation->email)->first();

    if (!$user) {
        $user = User::create([
            'name' => explode('@', $invitation->email)[0],
            'email' => $invitation->email,
            'password' => Hash::make($request->password),
            'role' => $invitation->role,
            'company_id' => $invitation->company_id,
        ]);
    }

    $invitation->delete();

    return "Invitation accepted successfully";
}

        // public function accept($token)
        // {
        //     $invitation = Invitation::where('token', $token)->first();
        //     // dd($invitation);
        //     if (!$invitation) {
        //         return "Invalid or expired invitation";
        //     }

        //     // check if user already exists
        //     $user = User::where('email', $invitation->email)->first();

        //     if (!$user) {
        //         $user = User::create([
        //             'name' => explode('@', $invitation->email)[0],
        //             'email' => $invitation->email,
        //             'password' => Hash::make('password'), // temp password
        //             'role' => $invitation->role,
        //             'company_id' => $invitation->company_id,
        //         ]);
        //     } else {
        //         $user->update([
        //             'role' => $invitation->role,
        //             'company_id' => $invitation->company_id,
        //         ]);
        //     }

        //     $invitation->delete();


        // }

}

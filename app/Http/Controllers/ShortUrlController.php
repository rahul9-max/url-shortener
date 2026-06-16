<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{
    //
    public function create()
    {
        return view('shorturls.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'original_url' => 'required|url'
        ]);
        // dd(Auth::user());
        $user = Auth::user();

        if ($user->role === 'SuperAdmin') {
            return back()->with('error', 'SuperAdmin cannot create short URLs');  //if role is of superadmin then block it
        }

        ShortUrl::create([
            'user_id' => $user->id,
            'company_id' => $user->company_id,
            'original_url' => $request->original_url,
            'short_code' => Str::random(6),
        ]);

        return back()->with('success', 'Short URL created');
    }

     public function redirect($short_code)
    {
        $url = ShortUrl::where('short_code', $short_code)->first();

        if (!$url) {
            abort(404);
        }

        return redirect($url->original_url);
    }

        public function index()
        {

            $user = Auth::user();  // Get the currently logged-in user

            // SuperAdmin can see ALL short URLs from all companies
            if ($user->role === 'SuperAdmin') {
                $urls = ShortUrl::all();
            }

            // He can only see URLs created in his own company
            elseif ($user->role === 'Admin') {
                $urls = ShortUrl::where('company_id', $user->company_id)->get();
            }

            // He can only see URLs that he created himself
            else {
                $urls = ShortUrl::where('user_id', $user->id)->get();
            }
            return view('shorturls.index', compact('urls'));
        }
}

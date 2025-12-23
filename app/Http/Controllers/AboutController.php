<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Partner;

class AboutController extends Controller
{
    public function index(Request $request)
{
    return view('dashboard', [
        'page' => 'adminWebAbout',
        'tab' => $request->query('tab', 'about'),
        'about' => About::first(),
        'partners' => Partner::all(),
    ]);
}


    public function edit()
    {
        return view('dashboard', [
            'page' => 'adminWebAboutEdit',
            'about' => About::first(),
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
        ]);

        $about = About::first();
        $about->update([
            'description' => $request->description,
        ]);

        return redirect()
            ->route('dashboard', ['page' => 'adminWebAbout'])
            ->with('success', 'Deskripsi About berhasil diperbarui');
    }
}



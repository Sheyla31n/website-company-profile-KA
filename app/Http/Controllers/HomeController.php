<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeSlider;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        return view('kelola-web.home.index', [
            'homeSliders' => HomeSlider::all()
        ]);
    }

   public function edit($id)
{
    $slider = HomeSlider::findOrFail($id);

    return view('dashboard', [
        'page' => 'adminWebHomeEdit',
        'slider' => $slider,
    ]);
}


public function update(Request $request, $id)
{
    $slider = HomeSlider::findOrFail($id);

    $request->validate([
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    if ($request->hasFile('image')) {

        // hapus gambar lama
        if ($slider->image && Storage::disk('public')->exists($slider->image)) {
            Storage::disk('public')->delete($slider->image);
        }

        // simpan baru
        $path = $request->file('image')->store('home-sliders', 'public');
        $slider->image = $path;
    }

    $slider->save();

    return redirect()
        ->route('dashboard', ['page' => 'adminWebHome'])
        ->with('success', 'Slider berhasil diperbarui!');
}
}

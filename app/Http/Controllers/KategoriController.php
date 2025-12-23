<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Review;
use Illuminate\Support\Facades\Storage; 

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard', [
            'page' => 'adminWebCourse',
            'tab' => $request->query('tab', 'categories'),
            'kategori' => Kategori::all(),
            'reviews' => Review::all(),
        ]);
    }

     public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);

        return view('dashboard', [
            'page' => 'adminWebKategoriEdit',
            'kategori' => $kategori,
        ]);
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        if ($request->hasFile('icon')) {
            Storage::disk('public')->delete($kategori->icon);
            $kategori->icon = $request->file('icon')->store('course_categories', 'public');
        }

        $kategori->update([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('dashboard', ['page' => 'adminWebCourse'])
            ->with('success', 'Kategori diperbarui');
    }
}


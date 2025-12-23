<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{

public function courses(Request $request)
{
    $query = Course::with('category');

    // 🔍 SEARCH
    if ($request->filled('search')) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    // 🏷️ FILTER CATEGORY
    if ($request->filled('category')) {
        $query->whereHas('category', function ($q) use ($request) {
            $q->where('id', $request->category);
        });
    }

    return view('course', [
        'courses' => $query->get(),
        'categories' => Kategori::all(),
    ]);
}

    public function create()
    {
        return view('dashboard', [
            'page' => 'adminCourseCreate',
            'categories' => Kategori::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|image',
            'category_id' => 'required|exists:course_categories,id',
        ]);

        $iconPath = $request->file('icon')->store('courses', 'public');

        Course::create([
            'title' => $request->title,
            'icon' => $iconPath,
            'category_id' => $request->category_id,
        ]);

        return redirect('/dashboard?page=adminCourse')
        ->with('success', 'Course berhasil ditambahkan');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $categories = Kategori::all();

        return view('dashboard', [
            'page' => 'adminCourseEdit',
            'course' => $course,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, $id)
{
    $course = Course::findOrFail($id);

    // VALIDASI
    $request->validate([
        'title' => 'required|string|max:255',
        'icon' => 'nullable|image',
        'category_id' => 'required|exists:course_categories,id',
    ]);

    // UPDATE DATA DASAR
    $course->title = $request->title;
    $course->category_id = $request->category_id;

    // JIKA ADA ICON BARU
    if ($request->hasFile('icon')) {

        // hapus icon lama
        if ($course->icon && Storage::disk('public')->exists($course->icon)) {
            Storage::disk('public')->delete($course->icon);
        }

        // simpan icon baru
        $course->icon = $request->file('icon')->store('courses', 'public');
    }

    $course->save();

    return redirect('/dashboard?page=adminCourse')
        ->with('success', 'Course berhasil diperbarui');
}


    public function destroy($id)
{
    $course = Course::findOrFail($id);

    // hapus icon dari storage
    if ($course->icon && Storage::disk('public')->exists($course->icon)) {
        Storage::disk('public')->delete($course->icon);
    }

    $course->delete();

    return redirect('/dashboard?page=adminCourse')
        ->with('success', 'Course berhasil dihapus');
}
}


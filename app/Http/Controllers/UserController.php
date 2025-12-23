<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;

class UserController extends Controller
{
    public function teachers()
    {
        $teachers = User::where('role', 'teacher')->get();

        return view('dashboard', [
            'page' => 'adminTeacher',
            'teachers' => $teachers,
        ]);
    }

    public function students()
    {
        $students = User::where('role', 'student')->get();

        return view('dashboard', [
            'page' => 'adminStudent',
            'students' => $students,
        ]);
    }

    public function create(Request $request)
    {
        // 🔥 role target DIAMBIL LANGSUNG DARI URL
        $targetRole = $request->query('role'); // teacher / student

        // safety
        if (!in_array($targetRole, ['teacher', 'student'])) {
            abort(404);
        }

        return view('dashboard', [
            'page' => 'adminAkunCreate',
            'courses' => Course::all(),
        ]);
    }

    public function store(Request $request)
    {
        // ✅ VALIDASI
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:teacher,student',
            'courses' => 'nullable|array',
            'courses.*' => 'exists:courses,id',
        ]);

        // ✅ CREATE USER
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        // ✅ ASSIGN COURSE (teacher & student)
        if ($request->has('courses')) {
            $user->courses()->sync($request->courses);
        }

        // redirect rapi
        return redirect()->route('dashboard', [
            'page' => $request->role === 'teacher'
                ? 'adminTeacher'
                : 'adminStudent',
        ])->with('success', 'Akun berhasil dibuat');
    }

    // =======================
// EDIT FORM
// =======================
public function edit(User $user, Request $request)
{
    // role target DIAMBIL DARI URL
    $targetRole = $request->query('role'); // teacher / student

    // safety
    if (!in_array($targetRole, ['teacher', 'student'])) {
        abort(404);
    }

    // pastikan user sesuai role
    if ($user->role !== $targetRole) {
        abort(403);
    }

    return view('dashboard', [
        'page' => 'adminAkunEdit',
        'user' => $user,
        'courses' => Course::all(),
    ]);
}

// =======================
// UPDATE USER
// =======================
public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|min:6',
        'role' => 'required|in:teacher,student',
        'courses' => 'nullable|array',
        'courses.*' => 'exists:courses,id',
    ]);

    // update data utama
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password
            ? bcrypt($request->password)
            : $user->password,
    ]);

    // update course (teacher & student)
    if ($request->has('courses')) {
        $user->courses()->sync($request->courses);
    }

    return redirect()->route('dashboard', [
        'page' => $request->role === 'teacher'
            ? 'adminTeacher'
            : 'adminStudent',
    ])->with('success', 'Akun berhasil diperbarui');
}

// =======================
// DELETE USER
// =======================
public function destroy(Request $request, User $user)
{
    $role = $request->query('role');

    if (!in_array($role, ['teacher', 'student'])) {
        abort(403);
    }

    // safety: jangan hapus admin
    if ($user->role === 'admin') {
        abort(403);
    }

    $user->delete();

    return redirect()->route('dashboard', [
        'page' => $role === 'teacher'
            ? 'adminTeacher'
            : 'adminStudent',
    ])->with('success', 'Akun berhasil dihapus');
}

}

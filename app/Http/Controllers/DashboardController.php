<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\HomeSlider;
use App\Models\About;
use App\Models\Article;
use App\models\Course;
use App\Models\Kategori;
use App\Models\Partner;
use App\Models\Review;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
       $role = Auth::user()->role;

        $defaultPage = match ($role) {
            'student' => 'studentDashboard',
            'teacher' => 'teacherDashboard',
            'admin' => 'adminDashboard',
            default => 'dashboard',
        };

        $page = $request->query('page', $defaultPage);

        // 🔥 DATA PER PAGE
        $data = [];

        if ($page === 'adminWebHome') {
            $data['homeSliders'] = HomeSlider::orderBy('id')->get();
        } elseif ($page === 'adminWebAbout') {
            $data['About'] = About::orderBy('id')->get();
            $data['Partners'] = Partner::orderBy('id')
            ->paginate(5, ['*'], 'p')
            ->appends([
                'page' => 'adminWebAbout', 
            ]);
        }elseif ($page === 'adminWebBlog') {
            $data['articles'] = Article::orderBy('id', 'desc')
                ->paginate(5, ['*'], 'p')   
                ->appends([
                    'page' => 'adminWebBlog', 
                ]);
        } elseif ($page === 'adminWebCourse') {
            $data['kategori'] = Kategori::orderBy('id')->get();
            $data['reviews'] = Review::orderBy('id')->get();
        } elseif ($page === 'adminCourse') {
            return view('dashboard', [
                'page' => 'adminCourse',
                'courses' => Course::with('category')
                    ->paginate(5, ['*'], 'p')
                    ->appends([
                        'page' => 'adminCourse',
                    ]),
            ]);
        } elseif ($page === 'adminStudent') {
            $data['students'] = User::where('role', 'student')
            ->paginate(5, ['*'], 'p')
            ->appends([
                'page' => 'adminStudent',
            ]);
        } elseif ($page === 'adminTeacher') {
            $data['teachers'] = User::where('role', 'teacher')
            ->paginate(5, ['*'], 'p')
            ->appends([
                'page' => 'adminTeacher',
            ]);
        }
        return view('dashboard', array_merge([
            'role' => $role,
            'page' => $page,
        ], $data));
    }
}

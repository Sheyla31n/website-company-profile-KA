<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    public function edit($id)
    {
        return view('dashboard', [
            'page' => 'adminWebReviewEdit',
            'review' => Review::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        $request->validate([
            'name'    => 'required|string|max:255',
            'stars'    => 'required|integer|min:1|max:5',
            'content' => 'required|string',
        ]);

        $review->update([
            'name' => $request->name,
            'stars' => $request->stars,
            'content' => $request->content,
        ]);

        return redirect()
            ->route('admin.web.course', ['tab' => 'review'])
            ->with('success', 'Review diperbarui');
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class FeedbackController extends Controller
{
   public function store(Request $request)
{
    try {
        Log::info('Feedback submission attempt', $request->all());
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'rating' => 'required|integer|between:1,5',
            'feedback' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            Log::error('Validation failed', $validator->errors()->toArray());
            return response()->json([
                'success' => false,
                'message' => implode(' ', $validator->errors()->all())
            ], 422);
        }

        $feedback = Feedback::create([
            'name' => $request->name,
            'email' => $request->email,
            'rating' => $request->rating,
            'feedback' => $request->feedback,
            'approved' => false,
            'featured' => $request->rating >= 4
        ]);

        Log::info('Feedback submitted successfully', ['id' => $feedback->id]);

        return response()->json([
            'success' => true,
            'message' => 'Feedback submitted successfully!'
        ]);

    } catch (\Exception $e) {
        Log::error('Feedback submission error: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Failed to submit feedback: ' . $e->getMessage()
        ], 500);
    }
}

     public function getFeaturedTestimonials()
    {
        $testimonials = Feedback::where('approved', true)
                               ->where('featured', true)
                               ->orderBy('rating', 'desc')
                               ->orderBy('created_at', 'desc')
                               ->limit(5)
                               ->get();

        return response()->json($testimonials);
    }
    
    public function getTopTestimonials()
    {
        $testimonials = Feedback::where('rating', 5)
                              ->where('approved', true)
                              ->orderBy('created_at', 'desc')
                              ->limit(6)
                              ->get(['id', 'name', 'feedback', 'rating', 'created_at']);

        return response()->json($testimonials);
    }
}
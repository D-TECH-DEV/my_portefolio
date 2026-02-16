<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();
        return view("admin.testimonials.index", compact('testimonials'));
    }

    public function create()
    {
        return view("avis");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'profession' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        Testimonial::create([
            'name' => $request->name,
            'profession' => $request->profession,
            'message' => $request->message,
            'is_active' => false, // Require approval
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Merci pour votre témoignage ! Il sera visible après validation.'
            ]);
        }

        return back()->with('success', 'Merci pour votre témoignage ! Il sera visible après validation.');
    }

    public function toggleStatus(Testimonial $testimonial)
    {
        $testimonial->update(['is_active' => !$testimonial->is_active]);
        return back()->with('success', 'Statut du témoignage mis à jour.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return back()->with('success', 'Témoignage supprimé avec succès.');
    }
}

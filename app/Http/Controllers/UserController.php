<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;

class UserController extends Controller
{
    use HasApiTokens;
    public function __construct()
    {
        $this->middleware('auth:sanctum'); // Apply auth middleware to ensure user is authenticated
    }
    public function getProfile(Request $request)
    {
        $user = $request->user();
        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }

    public function setImageProfile(){
        $request->validate([
            'photo_profile' => 'required|image|mimes:jpg,jpeg,png,gif|max:512',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->move(public_path('profile_images'), $request->file('image')->getClientOriginalName());

        // Simpan path gambar ke database (atau sesuaikan dengan kolom profile_image di tabel pengguna)
        $user->profile_image =          'images/profile/' . $request->file('image')->getClientOriginalName();
        $user->save(); // Save the image path in the user's profile
            
            return response()->json([
            'success' => true,
            'message' => 'Profile image updated successfully!',
            'data' => [
                'image_url' => url($user->profile_image),
            ],
        ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No image provided.',
        ], 400);
    }
}

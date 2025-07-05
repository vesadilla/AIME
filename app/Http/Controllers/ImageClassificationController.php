<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ImageClassificationController extends Controller
{
    public function index()
    {
        return view('landing');
    }

    public function classify(Request $request)
    {
        // Validasi
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        // Simpan file ke storage/app/public/images
        $image    = $request->file('image');
        $path     = $image->store('images', 'public'); // ✅ simpan dengan disk 'public'
        $filename = basename($path);

        // Kirim ke API Flask
        $response = Http::attach(
            'image',
            Storage::disk('public')->get('images/' . $filename),
            $filename
        )->post('http://127.0.0.1:5000/predict');

        if (! $response->successful()) {
            return back()->with('error', 'Gagal memproses gambar.');
        }

        $result   = $response->json();
        $imageUrl = Storage::url('images/' . $filename); // ✅ URL bisa langsung diakses

        return redirect()->to('/#prediction-result')->with([
            'result' => $result,
            'imageUrl' => $imageUrl
        ]);
        
}
}

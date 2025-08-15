<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Advert;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    public function adverts()
    {
        $adverts = Advert::latest()->get();
        return view('pages.backend.admin.adverts.adverts', compact('adverts'));
    }
    public function create()
    {
        return view('pages.backend.admin.adverts.add-advert');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'url'           => 'nullable|url',
            'advert_image'  => 'required|image|mimes:jpeg,png,jpg,webp|max:5048',
        ]);

        try {
            $imagePath = null;

            if ($request->hasFile('advert_image') && $request->file('advert_image')->isValid()) {
                $imageFile = $request->file('advert_image');
                $imageName = time() . '_' . Str::slug(pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $imageFile->getClientOriginalExtension();
                $uploadPath = 'assets/img/adverts';
                $imageFile->move(public_path($uploadPath), $imageName);
                $imagePath = $uploadPath . '/' . $imageName;
            }

            Advert::create([
                'title'        => $validated['title'],
                'url'          => $validated['url'] ?? null,
                'advert_image' => $imagePath,
            ]);

            return redirect()->route('adverts')->with('success', 'Advert added successfully.');
            Log::info('Advert store request:', $request->all());
        } catch (\Exception $e) {
            Log::error('Advert upload failed: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong while uploading the advert.');
        }
    }

    public function destroy($id)
    {
        $advert = Advert::findOrFail($id);
        if ($advert->advert_image && file_exists(public_path($advert->advert_image))) {
            unlink(public_path($advert->advert_image));
        }
        $advert->delete();
        return redirect()->route('adverts')->with('success', 'Advert deleted successfully.');
    }

    public function edit($id)
    {
        $advert = Advert::findOrFail($id);
        return view('pages.backend.admin.adverts.update-advert', compact('advert'));
    }


    public function update(Request $request, $id)
    {
        $advert = Advert::findOrFail($id);

        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'url'           => 'nullable|url',
            'advert_image'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5048',
        ]);

        try {

            if ($request->hasFile('advert_image') && $request->file('advert_image')->isValid()) {

                if ($advert->advert_image && file_exists(public_path($advert->advert_image))) {
                    unlink(public_path($advert->advert_image));
                }

               
                $imageFile = $request->file('advert_image');
                $imageName = time() . '_' . Str::slug(pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $imageFile->getClientOriginalExtension();
                $uploadPath = 'assets/img/adverts';
                $imageFile->move(public_path($uploadPath), $imageName);
                $advert->advert_image = $uploadPath . '/' . $imageName;
            }

            
            $advert->title = $validated['title'];
            $advert->url = $validated['url'] ?? $advert->url;

            $advert->save();

            return redirect()->route('adverts')->with('success', 'Advert updated successfully.');
        } catch (\Exception $e) {
            Log::error('Advert update failed: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong while updating the advert.');
        }
    }
}

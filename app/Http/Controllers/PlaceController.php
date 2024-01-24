<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255'
        ]);

        $newPlace = Place::create([
            'name' => $request->input('name'),
            'slug' => $this->createSlug($request->input('name')),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
        ]);

        return response()->json(['message' => 'Success', 'data' => $newPlace], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $place = Place::find($id);

        if (!$place) {
            return response()->json(['message' => 'Place not found'], 404);
        }

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'city' => 'sometimes|string|max:255',
            'state' => 'sometimes|string|max:255'
        ]);



        $place->name = $request->input('name', $place->name);
        $place->slug = $this->createSlug($request->input('name', $place->name));
        $place->city = $request->input('city', $place->city);
        $place->state = $request->input('state', $place->state);

        $place->save();
        return response()->json(['message' => 'Place updated successfully', 'data' => $place], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function findById(string $id)
    {
        $place = Place::find($id);

        if (!$place) {
            return response()->json(['message' => 'Place not found'], 404);
        }

        return response()->json(['message' => 'Success', 'data' => $place], 200);
    }

    public function listByName(Request $request)
    {
        $name = $request->query('name');
        $perPage = $request->query('perPage', 10);

        $places = $name ? Place::where('name', 'LIKE', "%$name%")->paginate($perPage) : Place::paginate($perPage);

        if ($places->isEmpty()) {
            return response()->json(['message' => 'Places not found'], 404);
        }

        return response()->json(['message' => 'Success', 'data' => $places], 200);
    }


    private function createSlug($title)
    {
        $regex = '/[^\w\s]/';
        $slug = preg_replace($regex, '_', $title) . '_' . $this->generateRandomDigits();
        return $slug;
    }

    private function generateRandomDigits()
    {
        $randomDigits = array_map(function () {
            return mt_rand(0, 9);
        }, range(1, 4));

        return implode('', $randomDigits);
    }
}
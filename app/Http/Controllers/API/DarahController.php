<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\KantongDarahStoreRequest;
use App\Http\Requests\KantongDarahUpdateRequest;
use App\Http\Resources\KantongDarahResource;
use App\Models\KantongDarah;

class DarahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function kantongdarah()
    {
        $query = request()->query();
        $listKantongDarah = KantongDarah::filterByQuery($query)->get();

        // Check if the request wants a JSON response
        if (request()->wantsJson()) {
            return response()->json([
                'status' => '200 OK',
                'message' => 'Berhasil mengambil data darah.',
                'data' => KantongDarahResource::collection($listKantongDarah),
            ], 200);
        } else {
            // Return the HTML view for web requests
            return view('pages.kantongdarah', ['kantongdarah' => $listKantongDarah]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KantongDarahStoreRequest $request)
    {
        $validated = $request->validated();
        $kantongDarah = KantongDarah::create($validated);

        return response()->json([
            'status' => '201 Created',
            'message' => 'Berhasil menambah data darah.',
            'data' => new KantongDarahResource($kantongDarah),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kantongDarah = KantongDarah::find($id);
        if (is_null($kantongDarah)) {
            return response()->json([
                'status' => '404 Not Found',
                'message' => 'Data kantong darah tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'status' => '200 OK',
            'message' => 'Berhasil menampilkan data kantong darah.',
            'data' => new KantongDarahResource($kantongDarah),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KantongDarahUpdateRequest $request, KantongDarah $darah)
    {
        $validated = $request->validated();
        $darah->fill($validated)->save();

        return response()->json([
            'status' => '200 OK',
            'message' => 'Berhasil memperbarui data kantong darah.',
            'data' => new KantongDarahResource($darah),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KantongDarah $darah)
    {
        $darah->delete();

        return response()->json([
            'status' => '200 OK',
            'message' => 'Berhasil menghapus data darah.',
        ], 200);
    }
}

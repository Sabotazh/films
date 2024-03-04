<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            return response()->json(
                Genre::query()->paginate(5),
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            return response()->json(
                ['data' => [], 'message' => $e->getMessage()],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'title' => ['required', 'string', 'max:20']
            ]);

            $genre = Genre::query()->firstOrCreate([
                'title' => $request->get('title')
            ]);

            return response()->json(
                $genre,
                Response::HTTP_CREATED
            );
        } catch (Exception $e) {
            return response()->json(
                ['data' => [], 'message' => $e->getMessage()],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre): JsonResponse
    {
        try {
            return response()->json(
                $genre->films()->orderByPivot('film_id')->paginate(4),
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            return response()->json(
                ['data' => [], 'message' => $e->getMessage()],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        //
    }
}

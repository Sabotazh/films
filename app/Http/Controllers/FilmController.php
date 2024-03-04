<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            return response()->json(
                Film::query()->paginate(5),
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
        return view('films.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'genre' => ['required', 'numeric', 'max:255'],
                'url' => ['nullable', 'string', 'max:255'],
                'isPublished' => ['sometimes', 'string'],
                'poster' => ['nullable', 'mimes:jpeg,png,jpg,gif', 'max:2048']
            ]);

            $input = [
                'name' => $request->get('name'),
                'isPublished' => $request->has('isPublished'),
                'poster' => $request->has('url')
                    ? $request->get('url')
                    : 'https://media.istockphoto.com/id/1068817392/photo/cool-placeholder-for-your-picture-no-movie-screen-35mm-film-strip.jpg?s=612x612&w=0&k=20&c=EtidjW1YFEA7G_QKhbMPn_YjFqMXdIB22wEO0seeaVI=',
            ];

            if ($image = $request->file('poster')) {
                $destinationPath = 'images/';
                $posterImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $posterImage);
                $input['poster'] = env("APP_URL") . '/images/' . $posterImage;
            }

            $film = Film::query()->firstOrCreate($input);
            $film->genres()->attach($request->get('genre'));

            return response()->json($film, Response::HTTP_CREATED);
        } catch (Exception $e) {
//            return response()->json(
//                ['data' => [], 'message' => $e->getMessage()],
//                Response::HTTP_INTERNAL_SERVER_ERROR
//            );
            return to_route('films.create')->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film): JsonResponse
    {
        try {
            return response()->json(
                $film,
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
    public function edit(Film $film)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        //
    }
}

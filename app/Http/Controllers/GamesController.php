<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGameRequest;
use App\Models\Category;
use App\Models\Game;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Games', [
            'games' => Auth::user()->games,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Games/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateGameRequest $request
     * @return RedirectResponse
     */
    public function store(CreateGameRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        if (isset($validated['default_setup'])) {
            $defaultSetup = $validated['default_setup'];
            unset($validated['default_setup']);
        }

        $game = Auth::user()->games()->create($validated);
        if ($defaultSetup ?? false) {
            foreach ([1, 2, 3, 4, 5, 6] as $order) {
                $category = $game->categories()->create([
                    'type' => Category::REGULAR_JEOPARDY,
                    'order' => $order,
                ]);

                foreach ([200, 400, 600, 800, 1000] as $value) {
                    $category->answers()->create(['value' => $value]);
                }
            }

            foreach ([1, 2, 3, 4, 5, 6] as $order) {
                $category = $game->categories()->create([
                    'type' => Category::DOUBLE_JEOPARDY,
                    'order' => $order,
                ]);

                foreach ([400, 800, 1200, 1600, 2000] as $value) {
                    $category->answers()->create(['value' => $value]);
                }
            }

            $finalRound = $game->categories()->create([
                'type' => Category::FINAL_JEOPARDY,
                'order' => 1,
            ]);
            $finalRound->answers()->create(['value' => 0]);
        }

        return redirect()->route('games.show', $game);
    }

    /**
     * Display the specified resource.
     *
     * @param Game $game
     * @return Response
     */
    public function show(Game $game): Response
    {
        return Inertia::render('Games/Show', [
            'game' => $game->load(['categories' => fn ($query) => $query->with('answers')]),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

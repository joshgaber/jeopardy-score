<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GamesControllerTest extends TestCase
{
    use RefreshDatabase;

    // region Store

    public function testItCanCreateAGameWithoutSetup()
    {
        $gameDate = \today();
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('games.store'), ['name' => 'New Game', 'game_date' => $gameDate]);

        $game = Game::where(['user_id' => $user->id, 'game_date' => $gameDate])->first();
        $this->assertInstanceOf(Game::class, $game);
        $this->assertCount(0, $game->categories);
        $this->assertCount(0, $game->answers);
    }

    public function testItCanCreateAGameWithDefaultSetup()
    {
        $gameDate = \today();
        $user = User::factory()->create();

        $this->actingAs($user)->post(route('games.store'), [
            'name' => 'New Game',
            'game_date' => $gameDate,
            'default_setup' => true,
        ]);

        $game = Game::where(['user_id' => $user->id, 'game_date' => $gameDate])->first();
        $this->assertInstanceOf(Game::class, $game);
        $this->assertCount(61, $game->answers);
    }

    public function testItRequiresANameToCreateAGame()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('games.store'), ['game_date' => \today()]);

        $this->assertNull(Game::where(['user_id' => $user->id, 'game_date' => \today()])->first());
    }

    // endregion
}

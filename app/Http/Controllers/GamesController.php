<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use MarcReichel\IGDBLaravel\Models\Game;

class GamesController extends Controller
{
  public function index()
  {
    $gameIds = config('games.featured_games');
    $games = $this->fetchGamesFromIGDB($gameIds);

    return view('hobbies', compact('games'));
  }

  private function fetchGamesFromIGDB($gameIds)
  {
    $cacheKey = 'igdb_games_' . md5(implode(',', $gameIds));

    return Cache::remember($cacheKey, 3600, function () use ($gameIds) {
      return Game::whereIn('id', $gameIds)
        ->with(['cover'])
        ->limit(count($gameIds))
        ->get(['id', 'name', 'cover'])->map(function ($game) {
          return [
            'id'    => $game->id,
            'name'  => $game->name,
            'cover' => $game->cover,
          ];
        });
    });
  }

  // Optional search function using the package
  public function searchGameIds(Request $request)
  {
    $searchTerm = $request->get('q');

    if (!$searchTerm) {
      return response()->json(['error' => 'Search term required'], 400);
    }

    $games = Game::fuzzySearch(
      ['name'],   // fields to search in
      $searchTerm,
      false       // case sensitivity (false = ignore case)
    )
      ->where('parent_game', null) // exclude DLCs/expansions/remasters
      ->take(50)
      ->get(['id', 'name', 'cover'])->map(function ($game) {
        return [
          'id'    => $game->id,
          'name'  => $game->name,
          'cover' => $game->cover,
        ];
      });

    return response()->json($games);
  }

  public function refreshCache()
  {
    $gameIds = config('games.featured_games');
    $cacheKey = 'igdb_games_' . md5(implode(',', $gameIds));

    Cache::forget($cacheKey);

    $games = $this->fetchGamesFromIGDB($gameIds);

    return response()->json([
      'message' => 'Games cache refreshed successfully',
      'games_count' => count($games),
    ]);
  }
}

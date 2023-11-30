<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Game;
use App\Models\GameCategory;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use ZipArchive;

class GameController extends Controller
{
    public function show()
    {
        $games = Game::latest()->paginate(20);
        return view('backend.pages.game.game_show', compact('games'));
    }

    public function add(Request $request)
    {
        $categories = Category::get();
        return view('backend.pages.game.game_add', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'game_name' => 'required|unique:games,game_name',
            'category_name' => 'required',
            'is_exclusive' => 'required',
            'description' => 'required',
            'zip' => 'required|mimes:zip',
            'game_thumbnail' => 'required|image',
        ]);
        $allData = $request->all();
        // Game thumbnail Upload
        $file = $allData['game_thumbnail'];
        $thumbnailName = time() . '-' . $file->getClientOriginalName();
        $path_name = 'Uploads/Game/Thumbnail/' . $thumbnailName;
        $file->move(public_path('Uploads/Game/Thumbnail'), $thumbnailName);
        // Game Table datas

        //---game zip file upload
        $file = $request->file('zip');
        $zip = new ZipArchive();
        $zip->open($file->path());
        $pathName = 'AllGames/' . Str::slug($request->game_name, '-');
        $zip->extractTo($pathName);

        $game = [
            'game_name' => $allData['game_name'],
            'game_thumbnail' => $path_name,
            'zip' => $pathName,
            'is_free' => $request->is_free,
            'is_exclusive' => $allData['is_exclusive'],
            'game_file' => Str::slug($request->game_name),
            'description' => $allData['description'],
            'meta_title' => $allData['meta_title'],
            'meta_keyword' => $allData['meta_keyword'],
            'meta_description' => $allData['meta_description'],
        ];

        // Insert data on Game Table
        if (Game::create($game)) {
            $uploadedGame = Game::where('game_name', $allData['game_name'])->first();
            // Add Game Categories
            foreach ($allData['category_name'] as $category) {
                $addCategory = [
                    'game_id' => $uploadedGame->id,
                    'category_id' => $category,
                ];
                GameCategory::create($addCategory);
            }
        }
        return redirect()->route('dashboard.game.show');
    }

    public function edit(Game $game)
    {
        $categories = Category::all();
        return view('backend.pages.game.game_edit', compact('game', 'categories'));
    }

    public function update(Request $request, Game $game)
    {
        $request->validate([
            'game_name' => 'required',
            'category_name' => 'required',
            'is_exclusive' => 'required',
            'game_thumbnail' => 'image',
            'zip' => 'mimes:zip',
        ]);

        $allData = $request->all();
        if ($request->hasFile('zip') == '') {
            $game->update([
                'game_name' => $request->game_name,
                'is_free' => $request->is_free,
                'is_exclusive' => $request->is_exclusive,
                'game_file' => Str::slug($request->game_name),
                'description' => $request->description,
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
            ]);
        }

        if ($request->hasFile('game_thumbnail')) {
            if ($game->game_thumbnail) {
                File::delete(public_path($game->game_thumbnail));
            }
            $thumbnailName = time() . '-' . $request->file('game_thumbnail')->getClientOriginalName();
            $path_name = 'Uploads/Game/Thumbnail/' . $thumbnailName;
            $request->file('game_thumbnail')->move(public_path('Uploads/Game/Thumbnail'), $thumbnailName);
            $game->update(['game_thumbnail' => $path_name]);
        }

        // /////////// Game thumbnail Upload process start ///////////////
        // $file = $allData['game_thumbnail'] ?? 0;
        // $thumbnailName = $game->game_thumbnail;
        // // Game thumbnail Delete previous and upload new
        // if ($file && $file->getClientOriginalName() !== $game->game_thumbnail) {
        //     $thumbnailName = time() . '-' . $file->getClientOriginalName();
        //     $path_name = 'Uploads/Game/Thumbnail/' . $thumbnailName;
        //     unlink(public_path($game->game_thumbnail));
        //     $file->move(public_path('Uploads/Game/Thumbnail'), $thumbnailName);
        // }
        // /////////// Game thumbnail Upload process End ///////////////

        // // Game Table datas
        // $updatedGame = [
        //     'game_name' => $allData['game_name'],
        //     'is_free' => '0',
        //     'is_exclusive' => $allData['is_exclusive'],
        //     'game_file' => str_replace(" ", "-", strtolower($allData['game_name'])),
        // ];

        // // Insert data on Game Table and if true update the categories
        // if ($game->update($updatedGame)) {
        //     // Delete All Categories
        //     $uploadedGame = Game::where('game_name', $allData['game_name'])->first();
        //     GameCategory::where('game_id', $uploadedGame->id)->delete();
        //     // Add Game Categories
        //     foreach ($allData['category_name'] as $category) {
        //         $addCategory = [
        //             'game_id' => $uploadedGame->id,
        //             'category_id' => $category,
        //         ];

        //         GameCategory::create($addCategory);
        //     }
        // }

        return redirect()->route('dashboard.game.show');
    }

    public function destroy(Game $game)
    {
        if ($game->game_thumbnail) {
            File::delete(public_path($game->game_thumbnail));
        }
        if ($game->zip) {
            File::deleteDirectory(public_path($game->zip));
        }
        $game->delete();
        return back()->with('delete', 'The Game has been deleted successfully.');
    }
}

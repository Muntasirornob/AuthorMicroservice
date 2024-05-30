<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return response()->json($authors);
    }

    public function show($id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }
        return response()->json($author);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'gender' => 'required',
            'name' => 'required',
            'country' => 'required',
            'social_media_id' => 'required|integer',
        ]);

        $author = Author::create($request->all());

        return response()->json($author, 201);
    }

    public function update(Request $request, $id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        $author->update($request->all());

        return response()->json($author, 200);
    }

    public function destroy($id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        $author->delete();

        return response()->json(['message' => 'Author deleted'], 200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
// use Dotenv\Validator;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $dataPosts = Post::latest()->paginate(5);
        return new PostResource(true, 'List Data Posts', $dataPosts);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'user_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $image = $request->file('image');
        $image->storeAs('post-images', $image->hashName());

        $post = Post::create([
            'title'     => $request->title,
            'category_id'     => $request->category_id,
            'user_id'     => $request->user_id,
            'image'     => $image->hashName(),
            'excerpt'   => $request->excerpt,
            'body'   => $request->body,
        ]);

        return new PostResource(true, 'Data Post Berhasil Ditambahkan!', $post);
    }
}

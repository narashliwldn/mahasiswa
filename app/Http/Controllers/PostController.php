<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Post as PostResource;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PostResource::collection(Post::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'country' => 'required',
            'coffee_name' => 'required',
            'variety' => 'required',
            'altitude' => 'required',
            'terroir' => 'required',
            'producer' => 'required',
            'harvest_period' => 'required',
            'postharvest_process' => 'required',
            'postharvest_processor' => 'required',
            'roaster' => 'required',
            'country_of_roaster' => 'required',
            'roast_profile' => 'required',
            'flavor' => 'required',
        ]);

        $post = new Post([
            'country' => $request->country,
            'coffee_name' => $request->coffee_name,
            'variety' => $request->variety,
            'altitude' => $request->altitude,
            'terroir' => $request->terroir,
            'producer' => $request->producer,
            'harvest_period' => $request->harvest_period,
            'postharvest_process' => $request->postharvest_process,
            'postharvest_processor' => $request->postharvest_processor,
            'roaster' => $request->roaster,
            'country_of_roaster' => $request->country_of_roaster,
            'roast_profile' => $request->roast_profile,
            'flavor' => $request->flavor,
        ]);

        $post->save();
        return response()->json([
            'data' => 'Catalog created!'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PostResource(Post::find($id));
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
        $request->validate([
            'country' => 'required',
            'coffee_name' => 'required',
            'variety' => 'required',
            'altitude' => 'required',
            'terroir' => 'required',
            'producer' => 'required',
            'harvest_period' => 'required',
            'postharvest_process' => 'required',
            'postharvest_processor' => 'required',
            'roaster' => 'required',
            'country_of_roaster' => 'required',
            'roast_profile' => 'required',
            'flavor' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->country = $request->country;
        $post->coffee_name = $request->coffee_name;
        $post->variety = $request->variety;
        $post->altitude = $request->altitude;
        $post->terroir = $request->terroir;
        $post->producer = $request->producer;
        $post->harvest_period = $request->harvest_period;
        $post->postharvest_process = $request->postharvest_process;
        $post->postharvest_processor = $request->postharvest_processor;
        $post->roaster = $request->roaster;
        $post->country_of_roaster = $request->country_of_roaster;
        $post->roast_profile = $request->roast_profile;
        $post->flavor = $request->flavor;

        $post->update();
        return response()->json([
            'data' => 'Catalog update!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return response()->json([
            'data' => 'Catalog deleted!'
        ]);
    }
}

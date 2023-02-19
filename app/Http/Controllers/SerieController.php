<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series = Serie::with(['seasons.chapters', 'images'])->paginate(10);
        return response()->json($series);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serieR = Serie::with(['seasons.chapters', 'seasons.subtitles', 'images'])->find($id);
        return response()->json($serieR);
    }

    public function searchByName($term)
    {
        $serieR = Serie::with(['seasons.chapters', 'seasons.subtitles', 'images'])->where('title', 'LIKE', '%' . $term . '%')->get();
        return response()->json($serieR);
    }
}

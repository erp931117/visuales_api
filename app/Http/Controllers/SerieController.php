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
        $serieR->views++;
        $serieR->save();
        return response()->json($serieR);
    }

    public function increaseDownload($id){
        $season = Season::find($id);
        $serie = Serie::find($season->serie_id);
        $serie->downloads++;
        $serie->save();
        return response()->json($serie);
    }

    public function searchByName($term)
    {
        $serieR = Serie::with(['seasons.chapters', 'seasons.subtitles', 'images'])->where('title', 'LIKE', '%' . $term . '%')->get();
        return response()->json($serieR);
    }

    public function popularSeries(){
        $popularSeries = Serie::with(['seasons.chapters', 'seasons.subtitles', 'images'])->orderBy('views','DESC')->limit(10)->get();
        return response()->json($popularSeries);
    }

    public function mostPopular(){
        $popularSeries = Serie::orderBy('views','DESC')->limit(1)->get();
        $mostPopular = Serie::with(['seasons.chapters', 'seasons.subtitles', 'images'])->find($popularSeries[0]->id);
        return response()->json($mostPopular);
    }

    public function mostDownloads(){
        $popularSeries = Serie::with(['seasons.chapters', 'seasons.subtitles', 'images'])->orderBy('downloads','DESC')->limit(10)->get();
        return response()->json($popularSeries);
    }

    public function randomSeries(){
        $randomSeries = Serie::with(['seasons.chapters', 'seasons.subtitles', 'images'])->inRandomOrder()->limit(10)->get();
        return response()->json($randomSeries);
    }
}

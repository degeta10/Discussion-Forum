<?php

namespace App\Http\Controllers;

use Auth;
use App\Discussion;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( Auth::check() )
        {
            $discussions = Discussion::all();
            return view('home',compact('discussions'));
        }
        return view('auth.login'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion $discussion)
    {
        if( Auth::check() )
        {
            // return $discussion->comments;
            return view('dicussions.show',compact('discussion'));
        }
        return view('auth.login'); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function edit(Discussion $discussion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discussion $discussion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discussion $discussion)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
         * loading N+1 problem solving #1 (using querylogger)
         * koroche esli sdelat with('user') - to vo vremya zaprosov na questions
         * sobirayutsya vse user_id i zatem delaetsya  odin zapros s tablicy users
         * tipa select from users where id in {id1, id2, id3...}
         *
         * a esli delat bez with('user') to posle kak podgruzyatsya vse questions
         * chtob dostat kajdogo usera delaetsya otdelnyi zapros. I dazhe esli
         * neskolko questions prinadlejat 1 useru to dlya kajdogo questiona delaetsya
         * otdelnyi zapros na usera (ETO i EST problema)
         *
         * Nije kod kotoryi bez levyh packages pokajet kakie queries byli sdelany
         *
         * If we have 10 posts, this will execute
         * 1 query to get all the posts
         * and 10 additional queries to get their authors.
         * Obviously, this is bad! We want to get all the authors with 1 query.
         * And Laravel solves this with EAGER LOADING
         * (using with('relationship')):
         */
//        \DB::enableQueryLog();
//        $questions = Question::with('user')->latest()->paginate(10);
//
//        view('questions.index', compact('questions'))->render();
//        dd(\DB::getQueryLog());

        $questions = Question::latest()->paginate(10);
        return view('questions.index', compact('questions'));
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
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}

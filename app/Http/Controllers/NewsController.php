<?php

namespace Isidro\Http\Controllers;

use Isidro\News;
use Illuminate\Http\Request;
use Isidro\Http\Requests\CreateNewsRequest;
use Isidro\Http\Requests\UpdateNewsRequest;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//      $news = News::with('user')->orderBy('id', 'desc')->paginate(10);



      $news = News::orderBy('idNew', 'DESC')->paginate();
      

      return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $news = new News;
      return view('news.create')->with(['news' => $news]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewsRequest $request)
    {

      $new = new News;
      //$imagen = $request->file('image')->store('public');
      $new->fill(
          $request->only('title', 'text')
      );
      $new->user_id = $request->user()->id;
      if ($request->hasFile('image')) {
        $new->image =  $request->file('image')->store('public');
      }

      $new->save();
      session()->flash('message', 'News Created!');
      return redirect()->route('news_path');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Isidro\New  $new
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //dd($new);
      $new = News::find($id);
      return view('news.show', compact('new'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Isidro\New  $new
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $news= News::find($id);
       //return view('crudgerente.edit', compact('user'));

      if($news->user_id != \Auth::user()->id) {

         return redirect()->route('news_path');
     }

     return view('news.edit')->with(['new' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Isidro\New  $new
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
      $new = News::find($id);
      if(\Auth::user()->id == $new->user_id){
        if ($request->hasFile('image')) {
          $new->image =  $request->file('image')->store('public');
        }
        $new->update(
           $request->only('title', 'text')
           );
           session()->flash('message', 'New Updated!');
           return redirect()->route('news_path', ['new' => $new->idNew]);

     }else{

     }
     session()->flash('message', 'Not Updated!');
     return redirect()->route('news_path', ['new' => $new->idNew]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Isidro\New  $new
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
      $new = News::find($id);
      if($new->user_id != \Auth::user()->id) {
        return redirect()->route('news_path');
      }
      $new->delete();
      session()->flash('message', 'New Deleted!');
      return redirect()->route('news_path');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proposal;

class ProposalsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     * $this->middleware('auth',['except' => ['views']]);--- in the event
     * one needs to display data to public users
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proposals = Proposal::all();
        return view('proposals.index')->with('proposals', $proposals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proposals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
            'cost' => 'required'
        ]);

        //create proposal
        $proposal = new Proposal();
        $proposal->title = $request->input('title');
        $proposal->text = $request->input('text');
        $proposal->cost = $request->input('cost');
        $proposal->user_id = auth()->user()->id;
        $proposal->save();

        return redirect('/proposals')->with('success', 'Proposal Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proposal = Proposal::find($id);
        return view('proposals.show')->with('proposal',$proposal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proposal = Proposal::find($id);

        //check for correct user
        if(auth()->user()->id !==$proposal->user_id){
            return redirect('/proposals')->with('error','Unauthorized Access');
        }
        return view('proposals.edit')->with('proposal',$proposal);
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
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
            'cost' => 'required'
        ]);

        //create proposal
        $proposal = Proposal::find($id);
        $proposal->title = $request->input('title');
        $proposal->text = $request->input('text');
        $proposal->cost = $request->input('cost');
        $proposal->save();

        return redirect('/proposals')->with('success', 'Proposal Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proposal = Proposal::find($id);

        // check for correct user

        if(auth()->user()->id !==$proposal->user_id){
            return redirect('/proposals')->with('error','Unauthorized Access');
        }
        
        $proposal->delete();
        return redirect('/proposals')->with('success', 'Proposal Deleted');
    }
}

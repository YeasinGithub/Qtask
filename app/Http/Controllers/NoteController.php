<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();

        $notes = Note::where('user_id', $user_id)->get();
        return view('Note.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Note.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ],[
            'title.required' => 'Title Field is required',
            'content.required' => 'Content Field is required',
        ]);

        $note = new Note();
        $note->title = $request->title;
        $note->content = $request->content;
        $note->user_id = $user_id;
        $note->save();

        session()->flash('success', 'Note created successfully');
        return redirect()->route('note.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['notes']=Note::find($id);
        return view('Note.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user_id = Auth::id();
        
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ],[
            'title.required' => 'Title Field is required',
            'content.required' => 'Content Field is required',
        ]);

        $note= Note::find($id);
        $note->title = $request->title;
        $note->content = $request->content;
        $note->user_id = $user_id;
        $note->save();

        session()->flash('success', 'Note updated successfully');
        return redirect()->route('note.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $note=Note::find($id);
        $note->delete();

        session()->flash('success', 'Note deleted successfully');
        return redirect()->route('note.index');
    }
}

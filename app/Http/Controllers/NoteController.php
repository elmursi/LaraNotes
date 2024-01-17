<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // logged in user
        $userId = Auth::user()->id;
        // get all notes for the logged in user
        $notes = Note::where('user_id', $userId)->latest('updated_at')->paginate(3);
        // return the view with the notes
        return view('notes.index')->with('notes', $notes);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate the request
        $request->validate([
            'title' => 'required|max:255',
            'note' => 'required',
        ]);

        //create a new note
        $note = new Note();
        //unique id for the note
        $note->uuid = Str::uuid();
        //assign the values from the form
        $note->title = $request->title;

        $note->note = $request->note;
        //strip tags from the note
        $note->note = strip_tags($note->note);
        $note->user_id = Auth::user()->id;

        //save the note
        $note->save();

        //redirect to the notes.index view and display a message
        return redirect()->route('notes.index')->with('message', 'Note created successfully.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        if ($note->user_id != Auth::user()->id) {
            return abort(403);
        }
    
        return view('notes.show')->with('note', $note);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        if ($note->user_id != Auth::user()->id) {
            return abort(403);
        }
    
        return view('notes.edit')->with('note', $note);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        if ($note->user_id != Auth::user()->id) {
            return abort(403);
        }
    
        //validate the request
        $request->validate([
            'title' => 'required|max:255',
            'note' => 'required',
        ]);

        //assign the values from the form
        $note->title = $request->title;
        $note->note = $request->note;
        //strip tags from the note
        $note->note = strip_tags($note->note);

        //save the note
        $note->save();

        //redirect to the notes.index view and display a message
        return to_route('notes.show', $note)->with('success', 'Note updated successfully.');
    }
 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        if ($note->user_id != Auth::user()->id) {
            return abort(403);
        }
    
        //delete the note
        $note->delete();

        //redirect to the notes.index view and display a message
        return to_route('notes.index')->with('success', 'Note deleted successfully.');
    }
    
}

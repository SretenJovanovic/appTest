<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RemindersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        return view('reminders.index', compact('user'));
    }
    
    public function create()
    {
        return view('reminders.create');
    }
    
    public function store()
    {
        $data = request()->validate([
            'naslov' => 'required',
            'rok' => 'required',
            'prioritet' => 'required',
            'opis' => 'required',
            'image' => 'image|nullable',
        ]);
        $imagePath = '';
        if(request('image')!== null){
         $imagePath = request('image')->store('uploads','public');
        }
        else{
            $imagePath = '';
        }
        // $imagePath = request('image')->store('uploads','public');

        auth()->user()->reminders()->create([
            'naslov' => $data['naslov'],
            'rok' => $data['rok'],
            'prioritet' => $data['prioritet'],
            'opis' => $data['opis'],
            'image' => $imagePath,
        ]);

        return redirect('/reminder/' .auth()->user()->id);

    }
}
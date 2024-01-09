<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('');
    }
    public function index(){
        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        $abort = Announcement::whereNotNull('is_accepted')->get()->last();
        return view ('revisor.index', compact('announcement_to_check', 'abort'));

    }
    
    public function acceptAnnouncement(Announcement $announcement){
        $announcement->setAccepted(true);
        return redirect()->back()->with('success', 'Annuncio accettato!');
    }
    
    public function rejectAnnouncement(Announcement $announcement){
        $announcement->setAccepted(false);
        return redirect()->back()->with('success', 'Annuncio rifiutato!');
    }
    
    
    public function becomeRevisor(){
        Mail::to('admin@presto.com')->send(new BecomeRevisor(Auth::user()));
        
        return redirect()->back()->with('success','Complimenti, hai richiesto di diventare revisore!');
    }
    
    
    public function makeRevisor(User $user){
        Artisan::call('presto:make-user-revisor', ["email" => $user->email]);
        return redirect('/')->with('success','Complimenti! Sei diventato revisore');
    }
    public function form()
    {   
        return view('lavoraconnoi');
    }

    public function sendEmail(Request $request){
        return redirect()->route('index.form')->with('success','Email inviata con successo');
    }


    public function abortAnnouncement(Announcement $announcement){
        $announcement->setAccepted(null);
        return redirect()->back()->with('success', 'Annuncio annullato!');
    }
    
}

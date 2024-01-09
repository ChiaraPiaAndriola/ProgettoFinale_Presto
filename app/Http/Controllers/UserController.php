<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Image;
use App\Models\User;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function dashboard(){
        $user = Auth::user();
        if($user){
            // $announcements = $user->announcements;
            // $announcements = Announcement::where('is_accepted' ,true)->orderBy('created_at','desc')->paginate(6);
            $announcements = Announcement::where('user_id', $user->id)->where('is_accepted' ,true)->orderBy('created_at','desc')->paginate(6);
            return view('users.dashboard', ['announcements' => $announcements]);
        }
    }


    public function destroy(Announcement $announcement){
        $announcement->delete();
        return redirect()->route('users.dashboard',compact('announcement'))->with('success','Eliminazione effettuata'); 
    }

}

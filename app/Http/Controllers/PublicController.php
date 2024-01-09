<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller

{
    public function __construct(){
        $this->middleware('auth')->except('home','index','showCategory','show', 'setLanguage');

    }

    public function home () {
        $announcements = Announcement::where('is_accepted',true)->orderBy('created_at', 'desc')->get()->take(6);
        // $categories = Category::with('announcements')->get()->take(4)->sortByDesc('created_at');
        $categories = Category::orderBy('created_at','desc')->get()->take(1);
        return view('home', compact('announcements'));
    }

    public function showCategory(Category $category){
        // $categories = Category::orderBy('created_at','desc')->get();
        $categories= Announcement::where('category_id', $category->id)->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view ('announcements.showCategory', compact('category', 'categories'));
    }

    public function searchAnnouncements (Request $request){
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(12);
        return view('announcements.index', compact('announcements'));
    }


    public function setLanguage($lang){

        session()->put('locale', $lang);
        return redirect()->back();
    }
}

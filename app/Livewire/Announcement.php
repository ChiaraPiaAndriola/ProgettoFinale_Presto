<?php

namespace App\Livewire;

use App\Models\Image;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Announcement as AnnouncementModel;


class Announcement extends Component
{
    use WithFileUploads;
    public $name;
    public $description;
    public $price;
    public $image;
    public $category;
    public $user_id;
    public $temporary_images;
    public $images = [];
    public $announcement;
    
    protected $rules = [
        "name"=>"required|max:255",
        "description"=>"required",
        "price"=>"required|decimal:0,2",
        "category"=>"required",
        "temporary_images.*"=>"image|max:1024",
        "images.*"=>"image|max:1024"
    ];
    
    protected $messages = [
        "name.required"=>"Campo obbligatorio",
        "description.required"=>"Campo obbligatorio",
        "price.required"=>"Campo obbligatorio",
        "price.decimal"=>"Separare i decimali con il punto",
        "category.required"=>"Campo obbligatorio",
        "temporary_images.required"=>"Campo obbligatorio",
        "temporary_images.*.image"=>"I file devono essere immagini",
        "temporary_images.*.max"=>"L'immagine deve essere al massimo 1 mb",
        "images.image"=>"Il file dev'essere un'immagine",
        "images.max"=>"L'immagine deve essere al massimo 1 mb"
    ];
    
    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*' => 'image|max:1024',
            
            ])) {
                foreach($this->temporary_images as $image){
                    $this->images[]= $image;
                }
            }
        }
        
        public function removeImage($key){
            if(in_array($key, array_keys($this->images))){
                unset($this->images[$key]);
            }
        }
        
        public function store(){
            $this->validate();
            $this->announcement = Category::find($this->category)->announcements()->create([
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
                'user_id' => Auth::user()->id,
            ]);
            // count($this->images)
            // count($announcement->images)
        
            if(count($this->images)){
                foreach($this->images as $image){
                    // $this->announcement->images()->create(['path'=>$image->store('images', 'public')]);

                    $newFileName = "announcements/{$this->announcement->id}";
                    $newImage = $this->announcement->images()->create(['path' => $image->store("$newFileName", 'public')]);

                    RemoveFaces::withChain([
                        new ResizeImage($newImage->path, 300, 300),
                        new GoogleVisionSafeSearch($newImage->id),
                        new GoogleVisionLabelImage($newImage->id)
                    ])->dispatch($newImage->id);
                }

                File::deleteDirectory(storage_path('/app/livewire-tmp'));
            }
            $this->announcement->user()->associate(Auth::user());
            $this->announcement->save();
            session()->flash('success','Annuncio inserito con successo!');
            $this->cleanForm();
        }
        
        public function cleanForm(){
            $this->name = '';
            $this->description= '';
            $this->price= '';
            $this->category= '';
            $this->images= [];
            $this->temporary_images= [];
            
        }
        public function updated($propertyName){
            $this->validateOnly($propertyName);
        }
        
        public function render()
        {
            
            return view('livewire.announcement');
        }

        // public function destroy(AnnouncementModel $announcement){
        //     $announcement->delete();
        //     session()->flash('success', 'Annuncio eliminato con successo');
        // }
    }
    
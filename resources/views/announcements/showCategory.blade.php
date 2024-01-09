<x-layout title='{{$category->name}}'> 
    
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-5">
                <h1 class="text-center pt-5 mt-3">{{$category->name}}</h1>
            </div>
            @forelse ($categories as $announcement)
            {{-- <div class="col-12 col-md-4 my-3 d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <img src="https://picsum.photos/200" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$announcement->name}}</h5>
                        <p class="card-text">€ {{$announcement->price}}</p>
                        <p class="card-text">Pubblicato il: {{$announcement->created_at}}</p>
                        <p class="card-text">Creato da: {{$announcement->user->name}}</p>
                        <a class="btn" href="{{route('announcements.show', compact('announcement'))}}">Dettagli</a>
                    </div>
                </div>
            </div> --}}
            <x-categoryCard :announcement="$announcement"/>
            @empty 
            <div class="col-12 pt-5 pb-5 vh-100 text-center">
                <p class="h1 my-5 ">Ops! Non sono presenti annunci per questa categoria.</p>
                <p class="h2 my-5 ">Pubblicane uno!</p>
                <a class="btn btn-category-empty text-center" href="{{route('announcements.create')}}">Nuovo Annuncio</a>
            </div>
            @endforelse
        </div>
    </div>
</x-layout>
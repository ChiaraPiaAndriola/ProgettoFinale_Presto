<x-layout title="Area Personale - Presto.it" class="dashboard-background"> 

    {{-- @if(session()->has('success'))
            <div class="col-12 alert alert-success mt-5">
                <p>{{session('success')}}</p>
            </div>
            @endif --}}

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{session('success')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif 
                    </div>
                </div>
            </div>
    
    <div class="container dashboard-altezza">
        <div class="row">
            <div class="col-12 mt-5">
                <h1 class="mt-5 text-center">Ciao {{ Auth::user()->name }}! </h1>
                <h4 class="mt-2 text-center">Benvenuto nella tua area personale!</h4>
                <h5 class="mt-4 mb-5 text-center">Qui puoi visualizzare i tuoi annunci</h5>
            </div>
            
            @forelse ($announcements as $announcement)
            <div class="col-12 col-md-6">
                <div class="card mb-3 card-dashboard" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            @if($announcement->images)
                            <div class="carousel-inner text-center">
                                @foreach ( $announcement->images as $image)
                                <div class="carousel-item @if($loop->first) active @endif">
                                    <a href="{{ route('announcements.show', compact('announcement')) }}"><img src="{{$image->getUrl(300,300)}}" class="img-fluid p-3 rounded" alt=""></a>
                                </div>
                                @endforeach
                            </div>
                            @else
                            <img src="https://picsum.photos/100" class="d-block w-100" alt="...">
                            @endif
                        </div>
                        <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title text-truncate">{{$announcement->name}}</h5>
                                    <p class="card-text"><small>{{$announcement->category->name}}</small></p>
                                    <p class="card-text"><small>€ {{$announcement->price}}</small></p>
                                    <p class="card-text"><small>Inserito da: {{$announcement->user->name}}</small></p>
                                    <p class="card-text"><small class="text-body-secondary">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}}</small></p>
                                    <form action="{{route('users.destroy', compact('announcement'))}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn">Elimina Annuncio</button>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 pt-5 text-center">         
                <h2 class="pb-3">Attualmente, non hai annunci in vendita</h2>
                <a class="btn" href="{{ route('announcements.create') }}">Creane uno ora!</a>
            </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center">
            {{$announcements->links()}}
        </div>
    </div>
    
</x-layout>
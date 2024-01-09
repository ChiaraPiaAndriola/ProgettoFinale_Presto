<x-layout title="Dettagli">
    
    {{-- DETTAGLIO NUOVO --}}
    
    <div class="container-fluid detail-background vh-75">
        <div class="row justify-content-center align-items-center bg-row">
            <div class="col-12 mb-4">
                <h1 class="text-center pt-0 pt-md-5 mt-5">Dettagli</h1>
            </div>

            <div class="col-12 col-md-6 size-div2 mx-5 d-flex align-items-center">
                    {{-- CAROSELLO  --}}
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                    @if($announcement->images)
                    <div class="carousel-inner text-center">
                        @foreach ( $announcement->images as $image)
                        <div class="carousel-item @if($loop->first) active @endif">
                            <img src="{{$image->getUrl(300,300)}}" class="img-fluid p-3 rounded" alt="">
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="carousel-inner text-center">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/300" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/300" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/300" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    @endif
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
    
            <div class="col-12 col-md-6 div-2 d-flex flex-column justify-content-center align-items-center card-detail-background">
                <a class="category-a text-center a-card ml-"
                    href="{{ route('category.show', ['category' => $announcement->category]) }}">{{ $announcement->category->name }}
                </a>
                <h2 class="card-title text-center pb-2">{{$announcement->name}}</h2>
                <h4 class="card-text text-center pt-2">€ {{$announcement->price}}</h4>
                <p class="card-text text-center mt-3">Inserito da: {{$announcement->user->name}}</p>
                <p class="card-title text-center">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}}</p>
    
            </div>
        </div>
    </div>
        
        {{-- DESCRIZIONE --}}
        <div class="container pt-3 pb-5">
            <div class="row justify-content-center border-detail-description">
                
                <div class="col-12 d-flex justify-content-center mt-4">
                    <h3>Descrizione</h3>
                </div>
                
                <div class="col-12 col-md-8 d-flex mb-5">
                    <p class="card-text text-wrap">{{$announcement->description}}</p>
                </div>
            </div>
        </div>
   
    
    
</x-layout>

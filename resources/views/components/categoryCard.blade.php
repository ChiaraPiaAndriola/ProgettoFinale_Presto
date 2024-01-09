{{-- <div class="col-12 col-md-3 my-3">
    <div class="card card-custom card-hover">
        <img class="img-fluid card-img-top" src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(300,300): 'https://picsum.photos/200'}}"  alt="...">
        <div class="card-body color">
            <h5 class="card-title text-truncate">{{$announcement->name}}</h5>
            <p class="card-title">€ {{$announcement->price}}</p>
            <div class="d-flex justify-content-between">

                <p class="card-title">{{$announcement->category->name}}</p>
                {{-- <p class="card-text"><small class="text-body-secondary">Inserito da: {{$announcement->user->name}}</small></p>
                <p class="card-text"><small class="text-body-secondary">Pubblicato il: {{$announcement->created_at}}</small></p> --}}
                {{-- <a class="btn" href="{{route('announcements.show', compact('announcement'))}}">Dettagli</a>
            </div>
        </div>
    </div>
</div> --}}
{{-- <p class="card-text">Inserito da: {{$announcement->user->name}}</p>
            <p class="card-text">Pubblicato il: {{$announcement->created_at}}</p> --}}
            <div class="col-12 col-md-4 d-flex justify-content-center my-5">
                <div class="card card-custom">
                    <a href="{{ route('announcements.show', compact('announcement')) }}">
                        <img class="img-fluid card-img-top" src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(300,300): 'https://picsum.photos/200'}}"  alt="...">
                    </a>
                        <div class="card-body color">
                        <h5 class="card-title text-truncate ">{{ $announcement->name }}</h5>
                        <p class="card-title">€ {{ $announcement->price }}</p>
                        <div class="d-flex justify-content-between">
                            <a class="category-a text-center a-card"
                                href="{{ route('category.show', ['category' => $announcement->category]) }}">{{ $announcement->category->name }}
                            </a>
                            {{-- <p class="card-text a-card"><small class="text-body-secondary a-card">Inserito da:
                                    {{ $announcement->user->name }}</small></p>
                            <p class="card-text a-card"><small class="text-body-secondary a-card">Pubblicato il:
                                    {{ $announcement->created_at }}</small></p> --}}
                            <a href="{{ route('announcements.show', compact('announcement')) }}" class="btn btn-margin">Dettagli</a>
                        </div>
                    </div>
                </div>
            </div>
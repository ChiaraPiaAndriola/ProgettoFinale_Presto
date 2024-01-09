<x-layout title="Area revisore">

    {{-- ! TITOLO --}}
    <div class="container-fluid">
        <div class="row">
            @if (session()->has('success'))
                <div class="col-12 alert alert-success mt-5">
                    <p class="pt-3">{{ session('success') }}</p>
                </div>
            @endif
            <div class="col-12 mt-2">
                <h1 class="text-b text-center mt-5 pt-5">
                    {{ $announcement_to_check ? 'Annuncio da revisionare' : 'Non ci sono annunci da revisionare' }}
                </h1>
            </div>
        </div>
    </div>
    {{-- ? FINE TITOLO --}}


    @if ($announcement_to_check)
        <div class="container-fluid justify-content-center">
            <div class="row justify-content-center ">

                @if (count($announcement_to_check->images) > 0)

                    {{-- ! INIZIO ANNUNCIO DA REVISIONARE --}}

                    <div class="col-12 d-flex justify-content-center ">

                        {{-- ! INIZIO CAROSELLO --}}
                        <div id="carouselExample" class="carousel slide d-flex" data-bs-ride="carousel">
                            <div class="carousel-inner text-center">
                                @foreach ($announcement_to_check->images as $image)
                                    <div class="carousel-item  @if ($loop->first) active @endif">
                                        <div class="row">
                                            <div class="col-12 ">
                                                <img src="{{ $image->getUrl(300, 300) }}" class="img-fluid p-3 rounded"
                                                    alt="">

                                                {{-- ! INIZIO TAGS --}}
                                                <h5 class="tc-accent mt-3 ">Tags</h5>
                                                <div class="p-2">
                                                    @if ($image->labels)
                                                        <div>
                                                            @foreach ($image->labels as $label)
                                                                <p class="d-inline">{{ $label }},</p>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                    <h5 class="tc-accent mt-2">Revisione Immagini</h5>
                                                    <div
                                                        class="card-body d-flex justify-content-center align-items-center gap-md-3 gap-2 ">
                                                        <p>Adulti: <span class="{{ $image->adult }}"></span>
                                                        </p>
                                                        <p>Satira: <span class="{{ $image->spoof }}"></span>
                                                        </p>
                                                        <p>Medicina: <span class="{{ $image->medical }}"></span></p>
                                                        <p>Violenza: <span class="{{ $image->violence }}"></span></p>
                                                        <p>Contenuto Ammiccante: <span
                                                                class="{{ $image->racy }}"></span></p>
                                                    </div>
                                                </div>
                                                {{-- ? FINE TAGS --}}
                                            </div>
                                            {{-- <div class="col-6"> --}}
                                            {{-- </div> --}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev mb-md-3 mb-5 " type="button"
                                data-bs-target="#carouselExample" data-bs-slide="prev">
                                <i class="fa-solid fa-chevron-left fa-2x arrow"></i>
                                {{-- <span class="carousel-control-prev-icon ms-4 mb-5" ></span> --}}
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next mb-md-3 mb-5" type="button"
                                data-bs-target="#carouselExample" data-bs-slide="next">
                                <i class="fa-solid fa-chevron-right fa-2x arrow"></i>
                                {{-- <span class="carousel-control-next-icon ms-4 mb-5" aria-hidden="true"></span> --}}
                                <span class="visually-hidden ">Next</span>
                            </button>
                        </div>
                    @else
                        {{-- ! INIZIO IMMAGINE DI DEFAULT --}}
                        <div class="col-12 col-md-6 text-center">
                            <img src="/media/default.png" class="w-50" alt="...">
                        </div>

                        {{-- ? FINE IMMAGINE DI DEFAULT --}}
                @endif

                {{-- ? FINE CAROSELLO --}}

            </div>
        </div>
        {{-- ! INIZIO DATI ANNUNCIO --}}
        <div class="row justify-content-center mt-3">
            <div class="col-12 d-flex justify-content-center align-items-center flex-column">
                <h4 class="card-title m-0">{{ $announcement_to_check->name }}</h4>
                <h6 class="card-text m-2">{{ $announcement_to_check->description }}</h6>
                <h6 class="card-text m-0">€ {{ $announcement_to_check->price }}</h6>
                {{-- <p class=" card-text text-center m-0"><a class="category-a"
                    href="{{ route('category.show', ['category' => $announcement_to_check->category]) }}">{{ $announcement_to_check->category->name }}</a>
                </p>
                <p class="card-text text-center m-0">Inserito da: {{ $announcement_to_check->user->name }}</p>
                <p class="card-title text-center m-0">Pubblicato il:
                    {{ $announcement_to_check->created_at->format('d/m/Y') }}</p>
                </div> --}}
                {{-- ? FINE DATI ANNUNCIO --}}


                {{-- ? FINE ANNUNCIO DA REVISIONARE --}}

                {{-- ! INIZIO BUTTON ACCETTA RIFIUTA ANNULLA --}}

                <div class="col-12 col-md-6 text-center mt-3 d-flex justify-content-around">
                    <form class="text-center"
                        action="{{ route('revisor.accept_announcement', ['announcement' => $announcement_to_check]) }}"
                        method="POST">
                        @csrf
                        @method('patch')
                        <button type="submit" class="btn ">Accetta</button>
                    </form>
                    <form class="text-center"
                        action="{{ route('revisor.reject_announcement', ['announcement' => $announcement_to_check]) }}"
                        method="POST">
                        @csrf
                        @method('patch')
                        <button type="submit" class="btn">Rifiuta</button>
                    </form>
                </div>
                @elseif ($abort)
                <div class="col-12 d-flex justify-content-center pb-3">
                    <form action="{{ route('revisor.abort_announcement', ['announcement' => $abort]) }}"
                        method="POST">
                        @csrf
                        @method('patch')
                        <button type="submit" class="btn">Annulla</button>
                    </form>
                </div>
                {{-- ? FINE BUTTON ACCETTA RIFIUTA ANNULLA --}}
            </div>
        </div>
    @endif
    </div>
</x-layout>

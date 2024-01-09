<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top m-0">
    
    {{-- probabilmente il tasto x mobile --}}
    <div class="container-fluid dropdownbg">
        <a class="navbar-brand logo-font" href="{{ route('home') }}"><img class="logo" src="/media/logo 2.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"   aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        {{-- parte estesa --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            {{-- QUESTO FORM ERA A RIGA 25 --}}
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li>
                    <form class="d-flex text-center form-cerca " role="search" action="{{ route('announcements.search') }}" method="get">
                        <input class="form-control me-1 searchbar-custom" type="search" placeholder="{{__('ui.search')}}" aria-label="Search" name="searched">
                        <button class="btn" type="submit">{{__('ui.search')}}</button>
                    </form>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <ul class="navbar-nav ms-0 me-auto mb-2 mb-lg-0">
                            <li>
                                <a class="nav-link a-navbar" href="{{ route('announcements.index') }}">{{__('ui.announcements')}}</a>
                            </li>
                            
                            {{-- ! inizio dropdown categorie --}}
                            <li class="nav-item dropdown ">
                                <a class=" a-navbar nav-link dropdown-toggle dropdown-menu-right" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{__('ui.categories')}}
                                </a>
                                <ul class="dropdown-menu dropdown-categorie dropdown-media-categorie" aria-labelledby="categoriesDropdown">
                                    @foreach ($categories as $category)
                                    <li>
                                        <a class="dropdown-item text-center" href="{{ route('category.show', compact('category')) }}">{{ $category->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>
                    
                    {{-- ! inizio login register --}}
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle a-navbar" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu dropdown-menu-end bg-p dropdown-media-utente">
                            <li class="text-center nav-item ">
                                <a class="nav-link a-navbar text-center" href="{{ route('users.dashboard') }}">Dashboard</a>
                            </li>
                            @if (Auth::user()->is_revisor)
                            <li class="nav-item">
                                <a class="a-navbar nav-link position-relative text-center" href="{{ route('revisor.index') }}">{{__('ui.areaRevisore')}}
                                    <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-danger">
                                        {{ App\Models\Announcement::toBeRevisionedCount() }}
                                        <span class="visually-hidden">Messaggi Non Letti</span>
                                    </span>
                                </a>
                            </li>
                            @endif
                            <li class="text-center nav-item ">
                                <a class="nav-link a-navbar text-center" href="{{ route('announcements.create') }}">{{__('ui.creaAnnuncio')}}</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="d-flex justify-content-center">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="btn-logout dropdown-link">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="  nav-link dropdown-toggle dropdown-menu-right" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user fs-5" style="color: #0e0f19;"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end  dropdown-categorie dropdown-media-log-reg">
                            <li class="nav-item text-center">
                                <a class="nav-link mx-0 mx-lg-2 a-navbar" href="{{ route('login') }}">{{__('ui.login')}}</a>
                                </li>
                            <li class="nav-item text-center">
                                <a class="nav-link mx-0 mx-lg-2 a-navbar" href="{{ route('register') }}">{{__('ui.register')}}</a>
                            </li>
                            </ul>
                        </li>
                    @endauth


                    {{-- LINGUE --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-earth-americas fs-5" style="color: #0e0f19;"></i>
                        </a>
                        <ul class="dropdown-menu  language-dropdown ">
                            <li> <x-_locale lang='it' /> </li>
                            <li> <x-_locale lang='en' /> </li>
                            <li> <x-_locale lang='es' /> </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    


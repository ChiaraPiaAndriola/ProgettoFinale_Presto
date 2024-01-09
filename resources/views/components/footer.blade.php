<footer class="pb-5 bg-gl mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-3 d-flex justify-content-center align-items-center flex-column mt-2">
                <a class=" navbar-brand logo-font-footer" href="{{ route('home') }}"><img class="logo" src="/media/logo 2.png" alt=""></a>
                <p class="pb-3"><small> © Tutti i diritti sono riservati</small></p>
            </div>
            <div class="col-12 col-md-3 ">
                <h4 class="text-w my-3">{{__('ui.supporto')}}</h4>
                <ul class="ul-footer position-relative nav flex-column">
                    <li class="li-link nav-item">
                        <a class="text-w link-footer " href="">{{__('ui.domandeFrequenti')}}</a>
                    </li>
                    <li class="li-link nav-item pt-2">
                        <a class="text-w link-footer " href="">{{__('ui.consigli')}}</a>
                    </li>
                    <li class="li-link nav-item pt-2">
                        <a class="text-w link-footer " href="">{{__('ui.servizioClienti')}}</a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-3 ">
                <h4 class="text-w my-3">{{__('ui.info')}}</h4>
                <ul class="ul-footer position-relative nav flex-column">
                    <li class="li-link nav-item">
                        <a class="text-w link-footer " href="">{{__('ui.contattaci')}}</</a>
                    </li>
                    {{-- @auth --}}
                    <li class="li-link nav-item mt-2">
                        <a class="text-w link-footer " href="{{route('form.lavoraconnoi')}}">{{__('ui.lavoraConNoi')}}</a>
                    </li>
                    <li class="li-link nav-item mt-2">
                        <a class="text-w link-footer ">{{__('ui.comeFunziona')}}</a>
                    </li>
                    {{-- <li class="li-link nav-item my-1">
                        <a class="text-w link-footer " href="">About Us</a>
                    </li> --}}
                </ul>
            </div>
            <div class="col-12 col-md-3 ">
                <h4 class="text-w my-3">{{__('ui.spedizioni')}}</h4>
                <ul class="ul-footer position-relative nav flex-column">
                    <li class="li-link nav-item">
                        <a class="text-w link-footer " href="">{{__('ui.cambi')}}</a>
                    </li>
                    <li class="li-link nav-item mt-2">
                        <a class="text-w link-footer " href="">{{__('ui.resi')}}</a>
                    </li>
                    <li class="li-link nav-item mt-2">
                        <a class="text-w link-footer " href="">{{__('ui.tracciaIlTuoOrdine')}}</a>
                    </li>
                </ul>
            </div>
            <div class="w-100 d-flex justify-content-center">
                <hr class="text-b w-75">
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row ">
            <div class=" col-12 text-center ">
                <i class="fa-brands fa-instagram fa-2x text-w px-4"></i>
                <i class="fa-brands fa-facebook fa-2x text-w px-4"></i>
                <i class="fa-brands fa-whatsapp fa-2x text-w px-4"></i>
            </div>
        </div>
    </div>
</footer>

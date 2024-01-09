<x-layout title="Lavora Con Noi">

    @if(session()->has('success'))
    <div class="col-12 alert alert-success mt-5 pt-5">
        <p>{{session('success')}}</p>
    </div>
    @endif  

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="text-center my-5 pt-5">Lavora Con Noi</h1>
            </div>
            <div class="col-12 col-md-6 shadow rounded-5 p-3">
                <form action="{{route('send.email')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="text" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Scrivi Il Tuo Messaggio</label>
                        <textarea name="description" id="" cols="30" rows="10" placeholder="scrivi un messaggio" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn mb-5"> <a class="nav-link" href="{{route('become.revisor')}}">Diventa revisore</a></button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
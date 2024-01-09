<x-layout title="Accedi">
    
    <div class="container login-altezza" >
        <div class="row justify-content-center align-items-center">
            <div class="col-12 mt-5">
                <h1 class="text-center mt-3 pt-5">Accedi</h1>
            </div>
            <div class="col-10 col-md-6 pt-4 mt-4 login-height">
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="{{old('email')}}">
                        @error('email') <p class="text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @error('password') <p class="text-danger">{{$message}}</p> @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn ">Accedi</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6 pt-4 mt-4 login-height ">
                <div class="text-center">
                    <h4 class="mt-3 mb-3">Non sei registrato?</h4>
                    <h3 class="mt-3 mb-3">Unisciti alla community!</h3>
                    <a class="btn mt-3" href="{{route('register')}}">Registrati!</a>
                </div>
                <div class="h-75 logo-login">
                    
                </div>
            </div>
        </div>
    </div>
    
</x-layout>
<x-layout title="Registrati">
    <div class="container login-altezza">
        <div class="row justify-content-center">
            <div class="col-12 mt-5">
                <h1 class="text-center mt-3 pt-5">Registrati</h1>
            </div>
            <div class="col-10 col-md-6 pt-4 mt-4 login-height">
                
                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Nome Utente</label>
                        <input type="text" class="form-control" id="username" name="name">
                        @error('username')<p class="text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                        @error('email')<p class="text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @error('password')< class="text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Conferma Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        @error('password_confirmation')<p class="text-danger">{{$message}}</p> @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn">Registrati</button>
                        
                        
                    </div>
                </form>
            </div>
            
            <div class="col-12 col-md-6 pt-4 mt-4 login-height ">
                <div class="text-center">
                    <h4 class="mt-3">Hai gia un account?</h4>
                    <h3 class="mt-3 mb-3">Comincia a vendere!</h3>
                    <a class="btn" href="{{route('login')}}">Accedi</a>
                </div>
                <div class="h-75 logo-login">
                    
                </div>
            </div>
            
        </div>
    </div>
</x-layout>
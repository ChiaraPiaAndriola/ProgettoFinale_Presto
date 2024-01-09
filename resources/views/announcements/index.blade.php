<x-layout title="Annunci"> 
    <div class="container-fluid ">
        <div class="row justify-content-center">
            <div class="col-12 mt-5">
                <h1 class="text-center pt-5 mt-3">Annunci</h1>
            </div>
            @forelse ($announcements as $announcement)
            <x-card :announcement="$announcement"/>  
            @empty
            <div class="col-12">
                <div class="alert alert-warning py-3 shadow">
                    <p class="lead">Non ci sono annunci per questa ricerca.</p>
                </div>
            </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{$announcements->links()}}
        </div>
    </div>
</x-layout>
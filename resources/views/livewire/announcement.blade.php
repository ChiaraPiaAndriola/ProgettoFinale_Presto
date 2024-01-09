<div class="container">
    <div class="row justify-content-center">
        
        @if(session('success'))
        
        <div class="col-12 mt-5 alert alert-success">
            {{session('success')}}
        </div>
        
        @endif
        <div class="col-12">
            <h1 class="text-center mt-3 pt-5">Inserisci un Annuncio</h1>
        </div>
        <div class="col-12 col-md-7 shadow rounded-5 p-3">
            <form wire:submit.prevent="store" class="py-3">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" wire:model="name">
                    @error('name') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="description" cols="30" rows="10" wire:model="description"></textarea>
                    @error('description') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="mb-3 ">
                    <label for="price" class="form-label">Prezzo</label>
                    <input type="text" class="form-control" id="price" aria-describedby="emailHelp" wire:model="price">
                    @error('price') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Categoria</label>
                    <select wire:model="category" class="form-select" aria-label="Default select example" name="category">
                        <option selected>Seleziona</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="mb-3 ">
                    <label for="img" class="form-label">Immagine</label>
                    <input type="file" multiple class="form-control @error('temporary_images.*') is-invalid @enderror" id="img" name="images" aria-describedby="emailHelp" wire:model="temporary_images">
                    @error('temporary_images.*') 
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>
                @if (!empty($images))
                <p>Anteprima immagine:</p>
                <div class="row border border-4 border-gm rounded shadow py-4">
                    @foreach ($images as $key => $image)
                    <div class="col my-3">
                        <div class="img-preview mx-auto shadow rounded " style="background-image: url({{$image->temporaryUrl()}}); background-position:center; background-size:cover;"></div>
                        <button type="button" class="btn d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">Cancella</button>
                    </div>
                    @endforeach
                </div>
                @endif
                <button type="submit" class="btn mt-2">Inserisci l'annuncio</button>
                
            </form>
        </div>
    </div>
</div>

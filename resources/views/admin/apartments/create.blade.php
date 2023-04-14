@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row row-cols-1 mb-5">
        <div class="col">
            <h1>
                Aggiungi Progetto
            </h1>

        </div>
        <div class="col">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-primary">
                Torna Indietro
                <i class="fa-solid fa-rotate-left"></i>
            </a>
        </div>
    </div>
    @include('admin.partials.errors')
    @include('admin.partials.success')
    @include('admin.partials.warning')
    <div class="row">
        <div class="col">

            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label  @error('title') text-danger @enderror ">Titolo <span
                            class="text-danger fw-bold">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" placeholder="Example Title" maxlength="98" value="{{ old('title') }}" required>
                    @error('title')
                        <p class="text-danger fw-bold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name_repo" class="form-label  @error('name_repo') text-danger @enderror">Nome
                        Repo <span class="text-danger fw-bold">*</span></label>
                    <input type="text" class="form-control @error('name_repo') is-invalid @enderror" id="name_repo"
                        name="name_repo" placeholder="example-name-repo" maxlength="98" value="{{ old('name_repo') }}"
                        required>
                    @error('name_repo')
                        <p class="text-danger fw-bold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="link_repo" class="form-label  @error('link_repo') text-danger @enderror">Link
                        Repo <span class="text-danger fw-bold">*</span></label>
                    <input type="text" class="form-control @error('link_repo') is-invalid @enderror" id="link_repo"
                        name="link_repo" placeholder="https://github.com/Example-link/name-repo" maxlength="255"
                        value="{{ old('link_repo') }}" required>
                    @error('link_repo')
                        <p class="text-danger fw-bold">{{ $message }}</p>
                    @enderror
                </div>

                @if (count($types) > 0)

                    <div class="mb-3">
                        <label for="type_id"
                            class="form-label  @error('type_id') text-danger @enderror">Tipologia</label>
                        <select class="form-select @error('type_id') is-invalid @enderror" name="type_id">
                            <option value="">Nessuna Tipologia</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                    {{ $type->name }}</option>
                            @endforeach
                        </select>
                        @error('type_id')
                            <p class="text-danger fw-bold">{{ $message }}</p>
                        @enderror
                    </div>

                @endif

                @if (count($technologies) > 0)

                    <div class="mb-3">
                        <label class="form-check-label d-block mb-2 @error('technologies') text-danger @enderror">
                            Tecnologie
                        </label>
                        @foreach ($technologies as $technology)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input  @error('technologies') is-invalid @enderror"
                                    type="checkbox" id="tech-{{ $technology->id }}" name="technologies[]"
                                    value="{{ $technology->id }}" 
                                    
                                    @if (old('technologies') && is_array(old('technologies')) && count(old('technologies')) > 0) 
                                    {{ in_array($technology->id,old('technologies',[])) ? 'checked': '' }}
                                    @endif
                                    
                                    >

                                <label class="form-check-label @error('technologies') text-danger @enderror"
                                    for="tech-{{ $technology->id }}">{{ $technology->name }}</label>
                            </div>
                        @endforeach
                        @error('technologies')
                            <p class="text-danger fw-bold">{{ $message }}</p>
                        @enderror
                    </div>

                @endif

                <div class="mb-3">
                    <label for="featured_image"
                        class="form-label  @error('featured_image') text-danger @enderror">Immagine in
                        evidenzia</label>
                    <input type="file" class="form-control @error('featured_image') is-invalid @enderror"
                        id="featured_image" name="featured_image" {{-- validazione frontend da aggiungere --}} {{-- si usa per i file --}}
                        accept="image/*">
                    @error('featured_image')
                        <p class="text-danger fw-bold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description"
                        class="form-label  @error('description') text-danger @enderror">Descrizione</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                        placeholder="Lorem ipsum dolor sit amet ..." rows="3" maxlength="4096"> {{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-danger fw-bold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <p>
                        I campi contrassegnati con <span class="text-danger fw-bold">*</span> sono <span
                            class="text-danger fw-bold text-decoration-underline">obbligatori</span>
                    </p>
                </div>
                <div>
                    <button type="submit" class="btn btn-success mb-3">Conferma</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
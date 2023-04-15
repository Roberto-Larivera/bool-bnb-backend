@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row row-cols-1 mb-5">
        <div class="col py-3">
            <h1>
                I miei appartamenti
            </h1>
        </div>

        <div class="col">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary">
                Torna Indietro
                <i class="fa-solid fa-rotate-left"></i>
            </a>
        </div>
    </div>

    @include('admin.partials.errors')
    @include('admin.partials.success')
    @include('admin.partials.warning')

    {{-- Bottone crea: Qui responsive su row --}}
    <div class="row">
        <div class="col">
            <a href="{{ route('admin.apartments.create') }}" class="my-btn rounded">
                <i class="fa-solid fa-plus"></i> Nuovo
            </a>
        </div>
    </div>

    {{-- Tabella: Qui responsive su row --}}
    <div class="row">
        <div class="col">
            <table class="table my-4 rounded">
                <thead>
                  <tr>
                    <th scope="col">
                        Titolo
                    </th>
                    <th scope="col" class="d-none d-md-table-cell">
                        Indirizzo
                    </th>
                    <th scope="col" class="d-none d-lg-table-cell">
                        Mq
                    </th>
                    <th scope="col" class="d-none d-lg-table-cell">
                        Prezzo / notte
                    </th>
                    <th scope="col">
                        Azioni
                    </th>
                  </tr>
                </thead>

                    @foreach ($apartments as $index => $apartment)
                    <tbody>
                        <tr>
                        <td>
                            {{ $apartment->title }}
                        </td>
                        <td class="d-none d-md-table-cell">
                            {{ $apartment->address }}
                        </td>
                        <td class="d-none d-lg-table-cell">
                            {{ $apartment->mq }}
                        </td>
                        <td class="d-none d-lg-table-cell">
                            {{ $apartment->price }}
                        </td>
                        <td>
                            <a href="{{ route('admin.apartments.show', $apartment->id) }}" class="my-action rounded">
                                Dettagli
                            </a>

                            {{-- bottone per delete DA TOGLIERE SE RESTA IN SHOW --}}
                            {{-- <button type="button" class="btn-modal my-action rounded" data-bs-toggle="modal" data-bs-target="#modal-delete" onclick="openModal({{ $index }})">
                                <i class="fa-solid fa-trash my-color-dark"></i>
                            </button> --}}
                        </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>

                {{-- Prova modale senza ripetizione DA TOGLIERE --}}
                {{-- <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" query="modal-delete">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    Cancellare appartamento {{ $index }}?
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="deleteItem()">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Modal Body
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Chiudi
                                </button>
                                <button type="button" class="btn btn-primary">
                                    Cancella
                                </button>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection


{{-- Prove per NON ciclare anche modale di delete --}}
{{-- <script>
    function openModal(index) {

        const myInput = document.getElementByAttribute('data-bs-target', 'myModal' + index);
        const myModal = document.getElementByAttribute('query', 'modal-delete');

        myModal.id = 'myModal' + index;
    }

</script> --}}

{{-- <script>
    function openModal(index) {
        const modal = document.getElementById('modal-delete');
        modal.id = 'myModal' + index;
        const myModal = new bootstrap.Modal(modal);
        myModal.show();
    }

    function deleteItem() {
        // Code to delete item goes here
        const modal = document.querySelector('.modal');
        const myModal = new bootstrap.Modal.getInstance(modal);
        myModal.hide();
    }
</script> --}}
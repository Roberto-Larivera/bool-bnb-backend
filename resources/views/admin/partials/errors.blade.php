
@if ($errors->any())

<div class="row mb-5">
    <div class="col">
        <div class="alert alert-danger">
            <h5>
                <i class="fa-solid fa-xmark fa-fade"></i> Errore
            </h5>
            <ul class="m-0">
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif
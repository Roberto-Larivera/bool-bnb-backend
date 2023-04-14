
@if (session('success'))

<div class="row mb-5">
    <div class="col">
        <div class="alert alert-success">
            <h5>
                <i class="fa-solid fa-circle-check fa-fade"></i> Successo
            </h5>
            <p class="m-0">
                 {{ session('success') }}
            </p>
        </div>
    </div>
</div>
@endif
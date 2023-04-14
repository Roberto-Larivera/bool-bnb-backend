@if (session('warning'))

<div class="row mb-5">
    <div class="col">
        <div class="alert alert-warning">
            <h5>
                <i class="fa-solid fa-triangle-exclamation fa-fade"></i> Attenzione
            </h5>
            <p class="m-0">
                {{ session('warning') }}
            </p>
        </div>
    </div>
</div>
@endif
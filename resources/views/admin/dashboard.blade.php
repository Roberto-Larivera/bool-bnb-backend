@extends('layouts.admin')

@section('content')
    {{-- QUESTO MESSAGGIO 'SEI LOGGATO' --}}
    {{-- <div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}

    <div class="container-fluid mt-4">
        <div class="row row-cols-1 mb-5">
            <div class="col py-3">
                <h1>
                    <span class="icon-section">
                        <i class="fa-solid fa-gauge-high fa-sm"></i>
                    </span>
                    Dashboard
                </h1>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-4">
        <div class="row row-cols-1">
            <div class="col">
                <div>
                    Filtra in base all'appartamento e al mese:
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row row-cols-2 mb-5">
            <div class="col-12 col-md-6 py-3">
                <form action="{{ route('admin.dashboard') }}" method="POST" id="formApartment">
                    @csrf
                    <select class="form-select" aria-label="Default select example" name="selectApartment"
                        onchange="document.getElementById('formApartment').submit()">
                        <option value="tutti" {{ $request->input('selectApartment') == 'tutti' ? 'selected' : '' }}>Tutti
                            gli appartamenti</option>
                        @foreach ($allApartments as $apartment)
                            <option value="{{ $apartment->id }}"
                                {{ $apartment->id == $request->input('selectApartment') ? 'selected' : '' }}>
                                {{ $apartment->title }}
                            </option>
                        @endforeach
                    </select>
                    <input type="hidden" name="month" value="{{ $request->input('month') }}">
                </form>
            </div>

            <div class="col-12 col-md-6 py-3">
                <form action="{{ route('admin.dashboard') }}" method="POST" id="dateFilterForm">
                    @csrf
                    <select class="form-select" aria-label="Default select example" name="month"
                        onchange="document.getElementById('dateFilterForm').submit()">
                        <option value="tutti" {{ $request->input('month') == 'tutti' ? 'selected' : '' }}>Tutti i mesi
                        </option>
                        <option value="01" {{ $request->input('month') == '01' ? 'selected' : '' }}>Gennaio</option>
                        <option value="02" {{ $request->input('month') == '02' ? 'selected' : '' }}>Febbraio</option>
                        <option value="03" {{ $request->input('month') == '03' ? 'selected' : '' }}>Marzo</option>
                        <option value="04" {{ $request->input('month') == '04' ? 'selected' : '' }}>Aprile</option>
                        <option value="05" {{ $request->input('month') == '05' ? 'selected' : '' }}>Maggio</option>
                        <option value="06" {{ $request->input('month') == '06' ? 'selected' : '' }}>Giugno</option>
                        <option value="07" {{ $request->input('month') == '07' ? 'selected' : '' }}>Luglio</option>
                        <option value="08" {{ $request->input('month') == '08' ? 'selected' : '' }}>Agosto</option>
                        <option value="09" {{ $request->input('month') == '09' ? 'selected' : '' }}>Settembre</option>
                        <option value="10" {{ $request->input('month') == '10' ? 'selected' : '' }}>Ottobre</option>
                        <option value="11" {{ $request->input('month') == '11' ? 'selected' : '' }}>Novembre</option>
                        <option value="12" {{ $request->input('month') == '12' ? 'selected' : '' }}>Dicembre</option>
                    </select>
                    <input type="hidden" name="selectApartment" value="{{ $request->input('selectApartment') }}">
                </form>
            </div>
        </div>



        <div class="container-fluid mt-4">
            <div class="row justify-content-center row-cols-1 row-cols-md-2 row-cols-lg-3 mb-5">
                <div class="col py-3 ps-0">
                    <div class="card">
                        <div class="card-body statistics rounded p-3">
                            <h5 class="card-title my-4">
                                <i class="fa-solid fa-eye"></i>
                                Visualizzazioni
                            </h5>
                            <h2 class="card-subtitle  text-body-secondary mb-3 fw-bold">
                                {{ $totalViews }}
                            </h2>
                            <p class="card-text mb-4">
                                Lorem ipsum dolor sit.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col ps-0 py-3">
                    <div class="card">
                        <div class="card-body statistics rounded p-3">
                            <h5 class="card-title my-4">
                                <i class="fa-solid fa-envelope"></i>
                                Messaggi
                            </h5>
                            <h2 class="card-subtitle text-body-secondary mb-3 fw-bold">
                                {{ $totalMessages }}
                            </h2>
                            <p class="card-text mb-4">
                                Lorem ipsum dolor sit.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col ps-0 py-3">
                    <div class="card">
                        <div class="card-body statistics rounded p-3">
                            <h5 class="card-title my-4">
                                <i class="fa-solid fa-sack-dollar"></i>
                                Guadagno
                            </h5>
                            <h2 class="card-subtitle text-body-secondary mb-3 fw-bold">
                                200.000 &euro;
                            </h2>
                            <p class="card-text mb-4">
                                Lorem ipsum dolor sit.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid mt-4">
            <div class="row row-cols-1">
                <div class="col d-none d-md-block">
                    <div>
                        <h3 class="mb-3">Statistiche generali</h3>
                    </div>
                    <canvas class="" id="viewsChart"></canvas>
                    <canvas class="d-none" id="viewsChartMobile"></canvas>
                    <canvas class="" id="viewsChartHorizontal"></canvas>
                </div>
            </div>
        </div>

        <script>
            var ctx = document.getElementById('viewsChart').getContext('2d');
            var viewsChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu', 'Lug', 'Ago',
                        'Set', 'Ott', 'Nov', 'Dic'
                    ],
                    axis: 'y',
                    datasets: [{

                            label: 'Visualizzazioni Totali',
                            data: {!! json_encode($viewsByMonth) !!},
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 5
                        },
                        {

                            label: 'Messaggi Totali',
                            data: {!! json_encode($messagesByMonth) !!},
                            backgroundColor: 'rgba(27, 130, 209, 0.3)',
                            borderColor: 'rgba(27, 130, 209, 1)',
                            borderWidth: 5
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }

            });
            var ctxMobile = document.getElementById('viewsChartMobile').getContext('2d');
            var viewsChartMobile = new Chart(ctxMobile, {
                type: 'doughnut',
                data: {
                    labels: ['Visualizzazioni', 'Messaggi'],
                    datasets: [{
                        label: 'Totali',

                        data: [{!! json_encode($totalViews) !!},
                            {!! json_encode($totalMessages) !!}

                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(27, 130, 209, 0.3)'

                        ]
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }

            });

            const data = {
                labels: [
                    'Red',
                    'Blue',
                    'Yellow'
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [300, 50, 100],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            };
            const labels = Utils.months({
                count: 7
            });
            const config = {
                type: 'bar',
                data,
                options: {
                    indexAxis: 'y',
                }
            };
            const data = {
                labels: labels,
                datasets: [{
                    axis: 'y',
                    label: 'My First Dataset',
                    data: [65, 59, 80, 81, 56, 55, 40],
                    fill: false,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            };
        </script>
    @endsection

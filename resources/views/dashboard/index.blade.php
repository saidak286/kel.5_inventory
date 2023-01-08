@extends('admin.index')
@section('content')
<section class="section">
    <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-7">
            <div class="row">
                <!-- Sales Card -->
                <div class="col-xxl-12 col-md-6">
                    <div class="card info-card sales-card">

                        <div class="card-body text-center">
                        <h5 class="card-title">Total Transaksi</h5>

                            <div class="d-flex align-items-center justify-content-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-arrow-down-up"></i>
                                </div>
                                <div class="ps-3">
                                    @foreach ($ar_transaksi as $row)
                                        <h6>{{ $row->jumlah }}</h6>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Grafik Barang</h5>
                            <!-- Bar Chart -->
                            <canvas id="barChart" style="max-height: 400px;"></canvas>
                            <script>
                                //ambil data nama pegawai dan kekayaan dari DashboardController di fungsi index
                                var lbl = [@foreach($ar_barang as $barang)
                                    '{{ $barang->nama }}', @endforeach
                                ];
                                var stk = [@foreach($ar_barang as $barang)
                                    '{{ $barang->stok }}', @endforeach
                                ];
                                document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#barChart'), {
                                        type: 'bar',
                                        data: {
                                            //labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                                            labels: lbl,
                                            datasets: [{
                                                label: 'Barang',
                                                //data: [65, 59, 80, 81, 56, 55, 40],
                                                data: stk,
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
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                });
                            </script>
                            <!-- End Bar CHart -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Right side columns -->
        <div class="col-lg-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Grafik Perbandingan Gender Pegawai</h5>
                        <!-- Pie Chart -->
                        <canvas id="pieChart" style="max-height: 400px;"></canvas>
                        <script>
                            //ambil data gender dan jumlah gendernya dari DashboardController di fungsi index
                            var lbl2 = [@foreach($ar_gender as $g)
                                '{{ $g->gender }}', @endforeach
                            ];
                            var jml = [@foreach($ar_gender as $g) 
                                '{{$g -> jumlah}}', @endforeach];
                            document.addEventListener("DOMContentLoaded", () => {
                                new Chart(document.querySelector('#pieChart'), {
                                    type: 'pie',
                                    data: {
                                        labels: lbl2,
                                        datasets: [{
                                            label: 'My First Dataset',
                                            //data: [300, 50, 100],
                                            data: jml,
                                            backgroundColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(54, 162, 235)',
                                                'rgb(255, 205, 86)'
                                            ],
                                            hoverOffset: 4
                                        }]
                                    }
                                });
                            });
                        </script>
                        <!-- End Pie CHart -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@extends('layouts.layoutAdmin')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Admin</h4>
            </div>
            <div class="card-body">
              {{$admin}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Members</h4>
            </div>
            <div class="card-body">
              {{$member}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Trainers</h4>
            </div>
            <div class="card-body">
              {{$trainer}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-circle"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Class</h4>
            </div>
            <div class="card-body">
              {{$class}}
            </div>
          </div>
        </div>
      </div>                  
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Statistics Members And Trials</h4>
          </div>
          <div class="card-body">
            <canvas id="memberChartLine" height="80%"></canvas>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Statistics Transaction  </h4>
            <span class="badge badge-danger">IDR</span>
          </div>
          <div class="card-body">
            <canvas id="transactionChartBar" height="80%"></canvas>
          </div>
        </div>
      </div>

      <div class="col-lg-8 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4>Chart Type Member</h4>
          </div>
          <div class="card-body">
            <canvas id="typeMemberChartPie" height="80%"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4>Recent Activities</h4>
          </div>
          <div class="card-body">             
            <ul class="list-unstyled list-unstyled-border">
              <li class="media">
                <img class="mr-3 rounded-circle" width="50" src="{{url('newAdmin')}}/dist/assets/img/avatar/avatar-1.png" alt="avatar">
                <div class="media-body">
                  <div class="float-right text-primary">Now</div>
                  <div class="media-title">Farhan A Mujib</div>
                  <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                </div>
              </li>
              <li class="media">
                <img class="mr-3 rounded-circle" width="50" src="assets/img/avatar/avatar-2.png" alt="avatar">
                <div class="media-body">
                  <div class="float-right">12m</div>
                  <div class="media-title">Ujang Maman</div>
                  <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                </div>
              </li>
              <li class="media">
                <img class="mr-3 rounded-circle" width="50" src="assets/img/avatar/avatar-3.png" alt="avatar">
                <div class="media-body">
                  <div class="float-right">17m</div>
                  <div class="media-title">Rizal Fakhri</div>
                  <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                </div>
              </li>
            <div class="text-center pt-1 pb-1">
              <a href="#" class="btn btn-primary btn-lg btn-round">
                View All
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@section('addJavascript')
<script>
  "use strict";
const ctx = document.getElementById("memberChartLine").getContext('2d');
const memberChartLine = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December",],
    datasets: [{
      label: 'New Members',
      data: @json($userCounts),
      borderWidth: 2,
      backgroundColor: 'transparent',
      borderColor: 'rgba(254,86,83,.7)',
      borderWidth: 2.5,
      pointBackgroundColor: 'transparent',
      pointBorderColor: 'transparent',
      pointRadius: 4
    },
    {
      label: 'Trials',
      data: @json($trialCounts),
      borderWidth: 2,
      backgroundColor: 'transparent',
      borderColor: 'rgba(63,82,227,.8)',
      borderWidth: 2.5,
      pointBackgroundColor: 'transparent',
      pointBorderColor: 'transparent',
      pointRadius: 4
    },
    ]
  },
  options: {
    legend: {
      display: true
    },
    scales: {
      yAxes: [{
        gridLines: {
          drawBorder: false,
          color: '#f2f2f2',
        },
        ticks: {
          beginAtZero: true,
          stepSize: 1
        }
      }],
      xAxes: [{
        gridLines: {
          display: false
        }
      }]
    },
  }
});

function getRandomColor() {
        const letters = '0123456789ABCDEF';
        let color = '#';
        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    // Buat array warna acak sesuai panjang data membership
    function generateRandomColors(length) {
        const colors = [];
        for (let i = 0; i < length; i++) {
            colors.push(getRandomColor());
        }
        return colors;
    }
const ctxType = document.getElementById("typeMemberChartPie").getContext('2d');
const typeMemberChartPie = new Chart(ctxType, {
  type: 'pie',
  data: {
    datasets: [{
      data:  @json($membershipData),
      backgroundColor: [
        '#fc544b',
        '#6777ef',
      ],
      label: 'Dataset 1'
    }],
    labels:@json($membershipLabels),
  },
  options: {
    responsive: true,
    legend: {
      position: 'bottom',
    },
  }
});


var ctxTransaction = document.getElementById("transactionChartBar").getContext('2d');
        var transactionData = @json($transactionData);

        // Function to format number as Rupiah
        function formatRupiah(angka, prefix) {
            var number_string = angka.toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                var separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix === undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        var formattedData = transactionData.map(amount => formatRupiah(amount, 'Rp'));

        var transactionChartBar = new Chart(ctxTransaction, {
            type: 'bar',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                datasets: [{
                    label: 'Transaction',
                    data: transactionData,
                    borderWidth: 2,
                    backgroundColor: '#6777ef',
                    borderColor: '#6777ef',
                    borderWidth: 2.5,
                    pointBackgroundColor: '#ffffff',
                    pointRadius: 4
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            drawBorder: false,
                            color: '#f2f2f2',
                        },
                        ticks: {
                            beginAtZero: true,
                            stepSize: 500000,
                            callback: function(value) {
                                return formatRupiah(value, 'Rp');
                            }
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            display: true
                        },
                        gridLines: {
                            display: false
                        }
                    }]
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            return formatRupiah(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index], 'Rp');
                        }
                    }
                }
            }
        });
</script>
@endsection
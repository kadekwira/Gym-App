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
              10
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
              42
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
              12
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
              47
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
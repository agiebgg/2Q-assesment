@extends('layouts.admin')
@section('content')

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Home</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
         <div class="row">
          <div class="col-12 col-sm-6 col-md-6">
          <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
          <div class="info-box-content">
          <span class="info-box-text">Total Company</span>
          <span class="info-box-number">
          {{$TotalCompanies}}
          </span>
          </div>

          </div>

          </div>

          <div class="col-12 col-sm-6 col-md-6">
          <div class="info-box">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
          <span class="info-box-text">Total User</span>
          <span class="info-box-number">
          {{$TotalUser}}
          </span>
          </div>

          </div>
          </div>
          </div>

       
    </div>
  </div>
@endsection
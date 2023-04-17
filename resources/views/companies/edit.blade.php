@extends('layouts.admin')
@section('content')

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Company</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
         <div class="card ">
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form enctype="multipart/form-data" method="post" action="{{ url('/company/update') }}">
         @csrf

         <input type="hidden" name="company_id" value="{{ $Companies->id }}">
        <div class="form-group">
            <label for="name">Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter company name"
              value="{{ $Companies->name }}" required>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
              value="{{ $Companies->email }}">
          </div>

          @if(isset($Companies) && $Companies->logo)
            <div class="form-group">
              <label for="logo">Current Logo</label><br>
              <img src="{{ asset('storage/'.$Companies->logo) }}" alt="{{ $Companies->name }} logo" width="100">
            </div>
            @endif

            <div class="form-group">
              <label for="logo">Logo (Minimum 100x100) <span class="text-danger">*</span></label>
              <input type="file" class="form-control" id="logo" name="logo" accept="image/*" >
            </div>

          <div class="form-group">
            <label for="website_link">Website Link</label>
            <input type="text" class="form-control" id="website_link" name="website_link"
              placeholder="Enter company website link" value="{{ $Companies->website_link }}">
          </div>
         
          

          <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
    </div>
  </div>
@endsection
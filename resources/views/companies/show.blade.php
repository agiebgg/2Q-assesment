@extends('layouts.admin')
@section('content')

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">View Company</h1>
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
   
         <input type="hidden" name="company_id" value="{{ $Companies->id }}">
        <div class="form-group">
            <label for="name">Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter company name"
              value="{{ $Companies->name }}" readonly>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
              value="{{ $Companies->email }}" readonly>
          </div>

          @if(isset($Companies) && $Companies->logo)
            <div class="form-group">
              <label for="logo">Current Logo</label><br>
              <img src="{{ asset('storage/'.$Companies->logo) }}" alt="{{ $Companies->name }} logo" width="100">
            </div>
            @endif


          <div class="form-group">
            <label for="website_link">Website Link</label>
            <input type="text" class="form-control" id="website_link" name="website_link"
              placeholder="Enter company website link" value="{{ $Companies->website_link }}" readonly>
          </div>
         
          

      </form>
  </div>
</div>
    </div>
  </div>
@endsection
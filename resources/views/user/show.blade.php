@extends('layouts.admin')
@section('content')

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">View User</h1>
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

      <div class="form-group">
            <label for="price">Name :</label>
            <input type="text" class="form-control" name="name"  value="{{ $User->name }}" disabled/>
        </div>

        <div class="form-group">
            <label for="price">Email :</label>
            <input type="email" class="form-control" name="email"  value="{{ $User->email }}" disabled/>
        </div>
        <div class="form-group">
            <label for="quantity">Password:</label>
            <input type="password" class="form-control" name="password"  value="{{ $User->password }}"disabled/>
        </div>

        <div class="form-group">
            <label for="quantity">Role:</label>
            <!-- <input type="text" class="form-control" name="product_status"/> -->
            <select class="form-control select2" name="role" style="width: 100%;" disabled>
                <option value="1" {{ $User->user_type == '1' ? 'selected' : '' }}>Admin</option>
                <option value="2" {{ $User->user_type == '2' ? 'selected' : '' }}>Supervisor</option>
                <option value="3" {{ $User->user_type == '3' ? 'selected' : '' }}>Employee</option>
            </select>
        </div>

     
  </div>
</div>
    </div>
  </div>
@endsection
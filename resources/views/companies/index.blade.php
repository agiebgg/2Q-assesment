@extends('layouts.admin')
@section('content')

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
             <h1 class="m-0 text-dark">Company</h1>
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
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-dark" href="{{ url('company/create') }}"> Create New Company</a>
            </div>
        </div>
    </div>
    
   <br>
    <table id="companies-table" class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Website Link</th>
            <th>Logo</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
    
</div>
</div>
</div>
</div>
<
@endsection

@push('custom-scripts')
    <script>
        $(function () {
        $('#companies-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('company.data') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'website_link', name: 'website_link'},
                {data: 'logo', name: 'logo'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            order: [[0, 'desc']],
            pageLength: 10,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, 'All']],
        });
    });
    </script>
@endpush

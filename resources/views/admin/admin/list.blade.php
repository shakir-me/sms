
@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Admin</h1>
          </div>
          <div class="col-sm-6" style="text-align: right">
            <a href="{{ url('admin/admin/add') }}" class="btn btn-primary">Add New Admin</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Search </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="get">
                  <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" value="{{ Request::get('name') }}" name="name"  placeholder="name">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputPassword1">email</label>
                      <input type="email" class="form-control" value="{{ Request::get('email') }}" name="email"  placeholder="email">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="exampleInputPassword1">Date</label>
                        <input type="date" class="form-control" value="{{ Request::get('date') }}" name="date"  placeholder="email">
                      </div>
                    <div class="form-group col-md-3">
                       <button type="submit" class="btn btn-success" style="margin-top: 30px;">Search</button>
                      </div>

                    </div>


                  </div>
                  <!-- /.card-body -->


                </form>
              </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Admin All (Total:{{ $getRecord->total() }})</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                        <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Create Time</th>
                      <th>Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($getRecord as $value )
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        {{-- <td>{{ $value->created_at }}</td> --}}
                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                        <td>
                            <a href="{{ route('admin.admin.edit',$value->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ url('admin/admin/delete',$value->id) }}" class="btn btn-danger">Delete</a>
                        </td>



                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <div style="padding: 10px; float:right">
                    {!! $getRecord->links() !!}
                 </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- /.row -->

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


@endsection

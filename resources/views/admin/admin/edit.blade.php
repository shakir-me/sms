
@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin Edit</h1>
          </div>
          <div class="col-sm-6" style="text-align: right">
            <a href="{{ url('admin/admin/list') }}" class="btn btn-primary">All  Admin</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">

                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="POST">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{ $getRecord->name }}" >
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{ $getRecord->email }}" required>
                        <p style="color:red">{{ $errors->first('email') }}</p>
                      </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      <p>Due you want to change password so please add new password</p>
                    </div>

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->

              <!-- general form elements -->

              <!-- /.card -->

              <!-- Input addon -->

              <!-- /.card -->
              <!-- Horizontal Form -->

              <!-- /.card -->

            </div>
            <!--/.col (left) -->
            <!-- right column -->

            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>

    <!-- Main content -->

    <!-- /.content -->
  </div>

@endsection

@extends('masterlayout.masteradmin')
@section('title','Change Password')



@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Change Password</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Change Password</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- /.content-header -->
        <!-- alert message start -->
        @if(Session('success'))

        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i>{{ Session('success') }} </h5>
        </div>

        @endif

        @if(Session('error'))

        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-times"></i>{{ Session('error') }} </h5>
        </div>
        @endif
        @if($errors -> any())
        @foreach($errors->all() as $err)
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-times"></i>{{$err}} </h5>
        </div>
        @endforeach
        @endif
        <!--alert message end -->
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Change Password</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form novalidate="" action="{{ route('changepwd')}}" method="post" enctype="multipart/form-data" >
            @csrf
          <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Old Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="oldpwd" placeholder="Enter Old Password" >
                    </div>
                </div>
                <div class="col-md-12">    
                    <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="newpwd" placeholder="Enter New Password" >
                    </div>
                </div>
                <div class="col-md-12">    
                  <div class="form-group">
                  <label for="exampleInputPassword1">Confirm Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="cpwd" placeholder="Enter Confirm Password" >
                  </div>
              </div>
            </div>
            <!--/.row-->
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.card -->
  </div>
  <!-- /.content-wrapper -->
@endsection

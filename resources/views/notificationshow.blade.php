@extends('masterlayout.masteradmin')
@section('title','Send Notification')



@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Send Notification</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Send Notification</li>
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
          <h3 class="card-title">Send Notification</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form novalidate="" action="{{ route('sendnotification') }}" method="post" enctype="multipart/form-data" >
            @csrf
          <div class="card-body">
              <div class="row">
                
                <div class="col-md-4">
                  <div class="form-group">
                  <label for="exampleInputFile">Notification Image</label>
                  <div class="input-group">
                      <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile" name="notificationimage">
                      <label class="custom-file-label" for="exampleInputFile"  >Choose file</label>
                      </div>
                  </div>
                  </div>
                </div>

              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Notification Message</label>
                    <textarea type="text" class="form-control" id="exampleInputEmail1" name="message" placeholder="Enter Notification Message" ></textarea>
                </div>
              </div>
            </div>
            <!--/.row-->
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Send Notification</button>
          </div>
        </form>
      </div>
      <!-- /.card -->
  </div>
  <!-- /.content-wrapper -->
@endsection

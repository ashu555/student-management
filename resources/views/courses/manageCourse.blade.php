@extends('layouts.master')
@section('content-header')
<h3>
Courses
</h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="">Courses</a></li>
        <li><a href=""><i class="fa fa-dashboard"></i>Manage Courses</a></li>
        </ol>
@stop
@section('content')
<!-- <div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-file-text-o"></i>Courses</h3>
		  <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="">Courses</a></li>
        <li><a href=""><i class="fa fa-dashboard"></i>Manage Courses</a></li>
        </ol>
	</div>
</div> -->

<!-- <div class="row">
	<div class="col-lg-12">
		<section class="panel panel-default">
			<header class="panel-heading">
				Manage Course
			</header>
			<form class="form-horizontal">
				
			</form>
		</section>
	</div>
</div> -->
<div class="row">

    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('success')}}
                </div>
                @endif
                <!-- fail message -->
                @if(Session::has('fails'))
                <div class="alert alert-danger alert-dismissable">
                    <i class="fa fa-ban"></i>
                    <b>{{Lang::get('message.alert')}}!</b> {{Lang::get('message.failed')}}.
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('fails')}}
                </div>
                @endif
            </div>


            <div class="box-body">
                <h3>
				Manage Course
				</h3>




            </div>

        </div>
        <!-- /.box -->

    </div>


</div>
@endsection
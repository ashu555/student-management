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

<div class="row">

    <div class="col-md-12">
        <div class="box box-primary">
           
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
           


                <form role="form">
                  <div class="box-header with-border">
              <h3 class="box-title">Manage Course</h3>
              <button type="submit" class="btn btn-primary pull-right" id="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'>&nbsp;</i> Saving..."><i class="fa fa-floppy-o">&nbsp;&nbsp;</i>Save</button>
            </div>
          
                 <div class="box-body">
                    <div class="row">
                 <div class="form-group col-md-4">
                  <label for="academicyear">Academic Year</label>
                 <div class="input-group">
                <select name="academic" type="text" id ="academic_id" class="form-control" ></select>
                 <span class="input-group-addon" id="academic-year"><i class="fa fa-plus"></i></span>
              </div>
                 @include('courses.popup.academic') 

              </div>

                   <div class="form-group col-md-4">
                  <label for="Course">Course</label>
                  <div class="input-group">
                  <select name="program" type="email" class="form-control" id="exampleInputEmail1" ></select>
                  <span class="input-group-addon" id="add-more-program"><i class="fa fa-plus"></i></span>
                  </div>
                   @include('courses.popup.program') 
                </div>

                 <div class="form-group col-md-4">
                  <label for="Course">Course</label>
                  <div class="input-group">
                  <select name="course" type="email" class="form-control" id="exampleInputEmail1" ></select>
                   <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                  </div>
                </div>
              </div>
                 
            <div class="row">
                 <div class="form-group col-md-4">
                  <label for="shift">Shift</label>
                   <div class="input-group">
                  <select name="shift" type="email" class="form-control" id="exampleInputEmail1" ></select>
                  <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                  </div>
                </div>

                 <div class="form-group col-md-4">
                  <label for="time">Time</label>
                   <div class="input-group">
                  <select name="time" type="email" class="form-control" id="exampleInputEmail1" ></select>
                   <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                  </div>
                </div>

                 <div class="form-group col-md-4">
                  <label for="batch">Batch</label>
                   <div class="input-group">
                  <select name="batch" type="email" class="form-control" id="exampleInputEmail1" ></select>
                   <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                  </div>
                </div>
            </div>
  

                <div class="row">
                 <div class="form-group col-md-4">
                  <label for="group">Group</label>
                   <div class="input-group">
                  <select name="group" type="email" class="form-control" id="exampleInputEmail1" ></select>
                  <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                  </div>
                </div>

                 <div class="form-group col-md-4">
                    <label for="group">Start Date</label>
                      <div class="input-group date">
                    <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                   <input name="sdate" type="text" class="form-control datepicker" id="datepicker" >
              </div>
                 
                </div>

                <div class="form-group col-md-4">
                    <label for="group">End Date</label>
                      <div class="input-group date">
                    <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                   <input name="EDATE" type="text" class="form-control datepicker" id="datepicker" >
              </div>
            </div>
            </form>

            </div>

        </div>
        <!-- /.box -->

    </div>
    @endsection
    @section('script')
    <script type="text/javascript">
       $(function() {
       $('.datepicker').datepicker({
      autoclose: true
         });
       });

       $("#academic-year").on('click',function(){
        $("#academic-modal-show").modal();
      })
       $('.save-academic').on('click',function(){

        $.ajax ({
          type : 'POST',
          url: "{{url('postInsertAcademic')}}",
          data : { "academic": $('#new-academic').val()},
          success:  function(data){
              console.log(data)
            $('#academic_id').append($("<option/>",{
              value : data.academic_id,
              text  : data.academic,
            }))
             $('#new-academic').val("");
          }

        })
       })

     //  -----------------------------------------
    $("#add-more-program").on('click',function(){
        $("#program-show").modal();
      })
    $('.save-program').on('click',function(){

        $.ajax ({
          type : 'POST',
          url: "{{url('postInsertProgram')}}",
          data : { "program": $('#program').val(),"description": $('#description').val()},
          // function(data){
          //   $('#academic_id').append($("<option/>",{
          //     value : data.academic_id,
          //     text  : data.academic
          //   }))
          // }

        });
       });
    </script>
@endsection

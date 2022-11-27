{{--  @php

if(!session('adminId'))
{

  header('location: /adminLogin');
  exit;
}
@endphp  --}}
@extends('layouts.mini')



@section('pagetitle')
    Staff Home
@endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('staff-open')
    menu-open
@endsection

@section('staff')
    active
@endsection

<!-- Page -->
@section('staff-home')
    active
@endsection

<!-- End Sidebar links -->



@section('content')
    <div class="content-wrapper bg-white">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">
                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Dashboard
                    </h1>





   <div class="row">
                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-12">
                    <div class="signup-content p-5">
                        <form method="POST" action="/adminTaskToRole" class="border border-success shadow p-5 rounded">
                            @csrf
                            <h4 class=" h4 form-title mb-4 text-center fw-bold text-success"> Add Task(s) To Role</h4>
                            @if (session('approvalMsg'))
                            {!! session('approvalMsg') !!}
                            @endif
                            <div class="form-group">

                                <select id="role" name="role" class="form-control @error('role') is-invalid @enderror">
                                <option value="" selected disabled>Select Role</option>
                                @foreach ($roles as $role )
                                    <option value="{{$role -> id}}">{{$role -> role}}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">

                                <div class="card">
                                    <div class="card-body" id= "tasksdiv" style="max-height: 10rem; overflow-y: auto;">
                                        <label class="fw-bold">Select Appropriate Task(s)</label>
                                        @foreach ($tasks as $task )
                                        <div class="form-check @error('task') is-invalid @enderror">
                                            <input class="form-check-input" type="checkbox" id="task" name="tasks[]" value="{{$task -> id}}">
                                            <label class="form-check-label">{{$task -> task}}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>


                            <button type="submit" class="btn text-white fw-bold btn-success my-2">
                                {{ __('Add') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>




                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

@section('pagescript')
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>

    <script>
    $(document).on('change', '#role', function(){
        var id = $("#role").val();
        $.ajax({
            url:'/getTasks',
            type:'GET',
            data:{
                roleid:id
            },
            success:function(response){
                 var jsonn = $.parseJSON(response.trim());
                 $('#tasksdiv').html(jsonn.msg);
            },
            error:function(response)
            {

            }

           });
    });
@endsection

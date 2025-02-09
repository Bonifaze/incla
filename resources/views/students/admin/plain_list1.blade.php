@extends('layouts.mini')



@section('pagetitle')
    List Students
@endsection

@section('css')
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="{{ asset('v3/plugins/ekko-lightbox/ekko-lightbox.css') }}">
@endsection


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">

                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
 @isset($sum)
                        {{($sum)}}
                    @else
                        List Students
                    @endisset
                    </h1>
                    <div class="card ">


                        <div class="table-responsive card-body">

                            <table class="table table-striped">
                                <thead>

                                    <th>S/N</th>
                                    {{--  <th>DB ID</th>
                                     <th>USER ID</th>  --}}
                                      {{--  <th>Passport</th>  --}}

                                    <th>Matric No</th>
                                    <th>Last Name</th>
                                    <th>Department</th>
                                    <th>level</th>
                                    <th>Gender</th>
                                     <th>Marital Status</th>
                                     <th>title</th>
                                    <th>First Name</th>

                                </thead>


                                <tbody>

                                    @foreach ($students as $key => $student)
                                        <tr>




                                            <td>{{ $key + $students->firstItem() }}.</td>
                                            @if ($student->academic)
                                                <td>{{ $student->academic->mat_no }}</td>
                                            @endif
                                             <td>{{ $student->surname}}</td>
                                           <td>{{ $student->academic->program->name }}</td>
                                            <td>{{ $student->academic->level  }}</td>


                                              <td>{{ $student->gender}}</td>
                                                   <td>{{ $student->marital_status}}</td>
                                            <td>{{ $student->title }}</td>
                                            <td>{{ $student->first_name}}</td>



                                        </tr>
                                    @endforeach

                                </tbody>



                            </table>
                            {!! $students->render() !!}


                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
            <!-- /.box -->


        </section>
        <!-- /.content -->
    </div>
@endsection

@section('pagescript')
    <script src="<?php echo asset('js/bootbox.min.js'); ?>"></script>

    <!-- Ekko Lightbox -->
    <script src="{{ asset('v3/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>

    <script>
        function deleteOption(id) {
            bootbox.dialog({
                message: "<h4>You are about to delete a Patient</h4> <h5>Note: This action is permanent and irreversible? </h5>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("deleteForm" + id).submit();
                        }
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger',
                    }
                },
                callback: function(result) {}

            });
            // e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
        }
    </script>

    <script>
        $(function() {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.filter-container').filterizr({
                gutterPixels: 3
            });
            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        })
    </script>
@endsection

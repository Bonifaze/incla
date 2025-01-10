@extends('layouts.mini')



@section('pagetitle')
    EVENT
@endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('news-open')
    menu-open
@endsection

@section('news')
    active
@endsection

<!-- Page -->
@section('news')
    active
@endsection

<!-- End Sidebar links -->



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">


                    <div class="card card-primary">
                        <h1
                            class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                            EVENTS
                        </h1>

                        @include('partialsv3.flash')
                        <div class="table-responsive card-body">




                            <div class="news row">
                                @foreach ($events as $events)
                                    <div class="col">
                                        <div class="news">
                                            <form method="POST" action="{{ route('events.update', ['id' => $events->id]) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')

                                                <div>
    <label for="date">Date:</label>
    <input type="date" class="form-control" name="date" value="{{ $events->date }}">
</div>

                                                <div>
                                                    <label for="title">Title:</label>

                                                    <textarea class="form-control" name="title">{{ $events->title }}</textarea>
                                                </div>
                                                <div>
                                                    <label for="text">Text:</label>
                                                    <textarea class="form-control" name="text">{{ $events->text }}</textarea>
                                                </div>
                                                <div>
                                                    <button class="btn btn-primary m-4" type="submit">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <h3
                                class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                                ADD EVENTS
                            </h3>

                            <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data"
                                id="addForm">
                                @csrf

                                  <div>
    <label for="date">Date:</label>
    <input type="date" class="form-control" name="date">
</div>
                                <div class="col form-group">
                                    <div @if ($errors->has('title')) class ='has-error form-group' @endif>
                                        <label for="allergies">Events Title :</label>
                                        {!! Form::textarea('title', null, [
                                            'placeholder' => ' ',
                                            'rows' => '3',
                                            'class' => 'form-control',
                                            'id' => 'title',
                                            'required' => 'required',
                                        ]) !!}
                                        <span class="text-danger"> {{ $errors->first('title') }}</span>
                                    </div>
                                </div>


                                <div class="col form-group">
                                    <div @if ($errors->has('text')) class ='has-error form-group' @endif>
                                        <label for="allergies">Events Body :</label>
                                        {!! Form::textarea('text', null, [
                                            'placeholder' => ' ',
                                            'rows' => '3',
                                            'class' => 'form-control',
                                            'id' => 'text',
                                            'required' => 'required',
                                        ]) !!}
                                        <span class="text-danger"> {{ $errors->first('text') }}</span>
                                    </div>
                                </div>


     <input type="hidden" class="form-control" name="type" value="main">


                                <div>
                                    {{--  <button type="button" onclick="previewImage()">Preview Image</button>  --}}
                                    <button class="btn btn-success" type="submit">Add</button>
                                </div>
                            </form>



                        </div>

                    </div>
                    <!-- /.box -->

                </div>
                <!--/.col (left) -->

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('pagescript')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#imageInput").change(function() {
                readURL(this);
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $("#imagePreview").attr("src", e.target.result).show();
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        });
    </script>



    <!-- External JavaScripts
     ============================================= -->
    <script src="{{ asset('js/jquery.js') }}"></script>

    <!-- bootstrap datepicker -->
    <script src="{{ asset('dist/js/components/bootstrap-datepicker.js') }}"></script>
    <!-- Bootstrap File Upload Plugin -->
    <script src="{{ asset('dist/js/components/bs-filestyle.js') }}"></script>

    <script type="text/javascript">
        //Date picker
        $('#dob').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        })
    </script>

    <script type="text/javascript">
        $(document).on('ready', function() {

            $("#image").fileinput({
                mainClass: "input-group-md",
                showUpload: false,
                previewFileType: "image",
                browseClass: "btn btn-success",
                browseLabel: "Pick Image",
                browseIcon: "<i class=\"fas fa-user\"></i>",
                removeClass: "btn btn-danger",
                removeLabel: "Delete",
                removeIcon: "<i class=\"icon-trash\"></i> ",
                allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
                elErrorContainer: "#errorBlock"



            });



        });
    </script>

    <script type="text/javascript">
        $(document).on('ready', function() {

            $("#signature").fileinput({
                mainClass: "input-group-md",
                showUpload: false,
                previewFileType: "image",
                browseClass: "btn btn-success",
                browseLabel: "Pick Image",
                browseIcon: "<i class=\"fas fa-signature\"></i>",
                removeClass: "btn btn-danger",
                removeLabel: "Delete",
                removeIcon: "<i class=\"icon-trash\"></i> ",
                allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
                elErrorContainer: "#errorBlock"



            });



        });
    </script>
@endsection

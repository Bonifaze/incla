@extends('layouts.plain')

{{--  @extends('layouts.student')  --}}
@section('pagetitle')

@endsection
<head>
<title> {{ $student->full_name }} Clearance Form </title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    body {
        text-align: justify;
        text-justify: inter-word;

    }



  @media print {
    .print-image {
         background-image: url('{{ asset('img/bursary.png') }}');
        background-size: cover;
        width: 250px;
        height: 100px;
        position: absolute;
        top: -95px;
        left: 85px;
    }
}



    .dotted-underline {
        text-decoration: underline;
        text-decoration-style: dotted;
    }
    .page-number {

        top: 25px;
        font-size: 24px;
        text-transform: uppercase;
    }

    .space_marg{
        margin-top:-10px
    }


</style>
</head>


<!-- End Sidebar links -


    @section('content')
    <body>
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">
                    <div class="">
                     {{--  <div class="text-uppercase">
                                   <strong> {{ substr($student->surname, 0, 1) . substr($student->matric_number, 0, 1). $student->id . substr($student->first_name, -2) }}</strong>
                                </div>  --}}
                        <div class="row p-5 d-flex justify-content-center align-items-center " style="width: 100%;">
                            <div class="text-center">

                                <h5>
                                  <p class="align-center"><img src="{{ asset('img/letter_logo.png') }}" width='120'
                                            height='100' border='0' /></p>
                                    <h1 class="text-center"><strong>VERITAS UNIVERSITY, ABUJA</strong></h1>
                                    <h3 class="text-center space_marg"><strong>The Catholic University, Abuja</strong></h3>
                                    <h3 class="text-centerspace_marg "><strong>UNDERGRADUATE STUDIES</strong></h3>
                                    <BR>
                                        <h3 class="text-center"><strong>BURSARY REGISTRATION CLEARANCE FORM</strong></h3>


                                </h5>
                            </div>

                            <div class="">
                                <div class="">
                                    <div class="page-number h4" >
                                        <p><strong>NAME:</strong>
                                                <span class="" style="text-align: center;">{{ $student->full_name }}</span>
                                         </p>
                                        <p class="mt-5"><strong>MATRICULATION NUMBER:</strong> {{ $student->matric_number }}</p>
                                    {{--  </div>  --}}
                                    {{--  <div class="col-lg-6 text-left h4">  --}}
                                        <p class="mt-5"><strong>PROGRAMME OF STUDY:</strong> {{ $academic->program->department->name }}</p>
                                          <p class="mt-5"><strong>FACULTY:</strong> {{  $academic->college()->name  }}</p>
                                        <p class="mt-5"><strong>ACADEMIC YEAR:</strong> {{ $session->name }}</p>
                                         <p class="mt-5"><strong>SEMESTER:</strong>
                                         @if ($semester==1)
                                             FIRST SEMESTER
                                         @elseif ($semester==2)
                                             SECOND SEMESTER
                                         @endif
                                         </p>

                                    </div>
                                </div>

                                <h3 class="text-center primary"><strong>BURSARY</strong></h3>
                                <h4 class="">  I hereby confirm that the above student has paid the fees prescribed and therefore cleared for registration. </h4>
                                <br>
                                <div class="row mt-3">
                                    <div class="col-lg-6 text-left h4">
                                       <p><strong>Bursar (Name): MRS. AKOJE MARGARET EJIMA</strong> </p>
                                    </div>
<div class="col-lg-6 text-left h4">
    <p><strong> Sign / Date:..<span class="text-danger font-weight-bold" style="margin-left:80px">{{ $rv->updated_at->format('d/m/Y') }}</span></strong></p>
    <div style="position: relative; display: block;">
        <img class="print-image"src="{{ asset('img/bursary.png') }}" width='250' height='100' border='0' style="position: absolute; top: -95px; left: 85px;" />
        {{--  <div style="position: absolute; top: 20px; left: 120px; width: 250px; border-bottom: 1px solid #000;"></div>  --}}
    </div>
</div>



                                </div>
                                <br>

                                <h3 class="text-center primary"><strong>DEPARTMENT</strong></h3>
                                <h4 class="">  I hereby confirm that the above student has met the Departmental Requirements for admission / registration and therefore cleared for registration. </h4>
                                <br>
                                <div class="row mt-3">
                                    <div class="col-lg-6 text-left h4">
                                        <p><strong>HOD (Name): ..........................................................</strong></p>
                                    </div>
                                    <div class="col-lg-6 text-left h4">
                                         <p><strong> Sign / Date: ................................................... </strong> </p>
                                    </div>
                                </div>
                                <br>

                                <h3 class="text-center primary"><strong>DEAN</strong></h3>
                                <h4 class=""> I hereby confirm that the above student has met the Departmental Requirements for admission / registration and therefore cleared for registration. </h4>
                                <br>
                                <div class="row mt-3">
                                    <div class="col-lg-6 text-left h4">
                                        <p><strong>Dean (Name): .....................................................</strong> </p>
                                    </div>
                                    <div class="col-lg-6 text-left h4">
                   <p><strong> Sign / Date: ................................................... </strong> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
    {{--  <script>
        window.onload = function() {
              window.print();
          }
      </script>  --}}
    @endsection

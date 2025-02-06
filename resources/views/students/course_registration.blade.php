@extends('layouts.student')



@section('pagetitle')
    Home
@endsection


@section('student-open')
    menu-open
@endsection

@section('student')
    active
@endsection

@section('home')
    active
@endsection

<!-- End Sidebar links -->



@section('content')
    <div class="content-wrapper bg-white">
        <!-- Content Header (Page header) -->

        <section class="content">
            <div class="container-fluid">
                <div class="col_full">

                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Course Registration
                    </h1>

                    <div id="content-wrapper" class="d-flex flex-column">
                        <!-- Main Content -->
                        <div id="content m-4">
                            @if (session('approvalMsg'))
                                {!! session('approvalMsg') !!}
                            @endif
                            {{--  <div class="h2 text-center">Course Registration ends in:  <span class="h2 text-danger font-weight-bold" id="demo"></span> </div>  --}}
                            <div class="container">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    {{--  <h6 class="m-0 font-weight-bold text-success">Current Level Course </h6>  --}}
                                    <div class="dropdown no-arrow">
                                        {{--  <input type=button class=" btn btn-sm btn-success shadow-sm" name=type
                                            id='bt1' value='Show Lower Level Courses'
                                            onclick="setVisibility('sub3');">  --}}
                                        {{--  <button onclick="setVisibility()" class="btn btn-sm btn-success shadow-sm" id="myButton"> Show Lower Level Courses </button>  --}}
                                    </div>

                                </div>
                                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th col-span="1">First Semester </th>
                                            <th>Course Code</th>
                                            <th>Course Title</th>
                                            <th>Credit Unit</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <form name="form1" id="form-1" method="post" action="/course-reg">
                                            @csrf
                                            @php
                                                $totalCredits = 0;
                                            @endphp
                                            <input type="hidden" name="student_id"
                                                value="{{ Auth::guard('student')->user()->id }}">
                                            <input type="hidden" name="session" value="{{ $session->id }}">

                                            @foreach ($courseFirst as $key => $course)
                                                @if ($course->is_registered == 0)
                                                    @php
                                                        $totalCredits += $course->credit_unit;
                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            {{ $key + 1 }}.
                                                            <input type="checkbox" name="courses1[]"
                                                                value="{{ $course->course_id }}"
                                                                data-credit="{{ $course->credit_unit }}"
                                                                class="course-checkbox" onclick="calculateTotalCredits()">
                                                            <input type="hidden" name="course_units1[]"
                                                                value="{{ $course->credit_unit }}">
                                                            <input type="hidden" name="course_semester[]"
                                                                value="{{ $course->semester }}">
                                                        </td>
                                                        <td>{{ $course->course_code }}</td>
                                                        <td>{{ $course->course_title }}</td>
                                                        <td>{{ $course->credit_unit }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach

                                            <tr>
                                                <td><strong>Total Credit Unit</strong></td>
                                                <td colspan="2"></td>
                                                <td id="tcu">0</td>
                                            </tr>

                                    </tbody>

                                    <script>
                                        function calculateTotalCredits() {
                                            let totalCredits = 0;

                                            // Select all checked checkboxes and sum their credit units
                                            document.querySelectorAll('.course-checkbox:checked').forEach((checkbox) => {
                                                totalCredits += parseInt(checkbox.getAttribute('data-credit'));
                                            });

                                            // Update the total credit unit display
                                            document.getElementById('tcu').innerText = totalCredits;
                                        }
                                    </script>


                                </table>
                                {{--  Second Semester Courses  --}}

                                {{--  To show First  lower level courses  --}}


                                <button type="submit" class="btn btn-success">
                                    {{ __('Register Course') }}
                                </button>
                                {{--  <div> <a href="#" class="btn btn-primary" id="btn" onClick="getCheckboxValue()" > Register </a>
                                    </div>  --}}

                                </form><br><br>
                                <h1
                                    class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                                    Registered Courses
                                </h1>

                                <div class="dropdown no-arrow my-3">
                                    {{--  <input type=button class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" name=type id='bt1' value='Show Lower Level Courses' onclick="setVisibility('sub3');";>  --}}
                                    <a href="/courseform" class=" btn btn-sm btn-success shadow-sm"><i
                                            class="fas fa-print text-white-50"></i> Print </a>

                                </div>

                                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th> </th>
                                            <th>Course Code</th>
                                            <th>Course Title</th>
                                            <th>Credit Unit</th>
                                            {{--  <th> Action</th>  --}}
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <form name=form1 method=post action="/dropcourse-reg">
                                            @csrf

                                            <input id="" type="hidden" name="student_id"
                                                value="{{ Auth::guard('student')->user()->id }}">
                                            <input id="" type="hidden" name="session"
                                                value="{{ $session->id }}">
                                            {{--  <input id="" type="text"  name="session" value="{{ $prevsession }}" >  --}}

                                            @php
                                                $tatolCredits = 0;
                                            @endphp

                                            @foreach ($courseform as $key => $course)
                                                @php
                                                    $tatolCredits += $course->course_unit;

                                                @endphp
                                                <tr>
                                                    {{--  <td> <input class="itemcourse" type="checkbox" id="course" name="courses[]" {{$course->course_category==1?"checked ":""}} value="{{ $course->course_code }}" onclick="{{$course->course_category==1?'return false':'totalIt()'}}"> </td>  --}}
                                                    <td>  {{ $key + 1 }}.<input class="itemcourse" type="checkbox" id="course"
                                                            name="courses[]"

                                                            value="{{ $course->course_id }}">



                                                    </td>
                                                    <td>{{ $course->course_code }} </td>
                                                    <td>{{ $course->course_title }}</td>
                                                    <td>{{ $course->course_unit }}</td>
                                                    {{--  <td><a class="btn btn-danger" type="button" href="">Delete Admin</a></td>  --}}
                                                    {{--  <td>{!! $course->course_category == 1 ?'':'
                        <form method=post action=/dropcourse">
                                <div class="btn btn-danger px-3"> <i class="fas fa-credit-card text-white-50"></i>
                                    <input type="text" class="form-control" id="js-rrr" value="'. $course->course_id .'" name="rrr" />
                                    <input type="button" " value="Drop" button class="btn btn-danger"/>
                                </div>
                            </form>   '!!}</td>  --}}
                                                    {{--  <td>{{ $course->id }} drop</td>  --}}
                                            @endforeach
                                            </tr>
                                            <tr>
                                                <td><strong>Total Credit Unit</strong> </td>
                                                <td colspan="2"></td>
                                                <td id="result" name="total">{{ $tatolCredits }}</td>

                                            </tr>
                                    </tbody>

                                </table>
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Drop course') }}
                                </button>
                                {{--  <div> <a href="#" class="btn btn-primary" id="btn" onClick="getCheckboxValue()" > Register </a>
                        </div>  --}}
                            </div>
                            </form>

                            <!-- Begin Page Content -->
                        </div>
                    </div>





                </div>
            </div>
        </section>
    </div>
@endsection

@section('pagescript')
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>




    <script language="JavaScript">
        function setVisibility() {
            let x = document.getElementById("sub3");
            if (x.style.display === "none") {
                x.style.display = "block";
                document.getElementById("myButton").innerHTML = "Hide Lower Level Courses";
            } else {
                x.style.display = "none";
                document.getElementById("myButton").innerHTML = "Show Lower Level Courses";
            }
        }
    </script>

    <script>
        function totalIt() {
            let sum = 0;
            frm = document.getElementById("form-1"),
                cbs = frm["courses1[]"]
            for (i = 0; i < cbs.length; i++) {
                if (cbs[i].checked) {
                    sum += parseInt(cbs[i].id);
                }
            }
            document.getElementById("tcu").innerHTML = sum;
            if (sum > 24) {
                document.getElementById("limit").innerHTML =
                    "Total credit load should not exceed 24 unit for First Semester Courses";
                frm.cbs[j].checked = false;
                // let unmarkedBoxCount = document.querySelectorAll('input[type="checkbox"]:not(:checked)');
                //  unmarkedBoxCount.disabled = true
            }
            //console.log(sum)
        }
        //Second seasemter total credit limit
        function totalIt2() {
            let sum1 = 0;
            frm1 = document.getElementById("form-1"),
                cbs1 = frm1["courses2[]"]
            for (i = 0; i < cbs1.length; i++) {
                if (cbs1[i].checked) {
                    sum1 += parseInt(cbs1[i].id);
                }
            }
            document.getElementById("tcu2").innerHTML = sum1;
            if (sum1 > 24) {
                document.getElementById("limit2").innerHTML =
                    "Total credit load should not exceed 24 unit For Second Semester Courses";
                frm.cbs1[j].checked = false;
                // let unmarkedBoxCount = document.querySelectorAll('input[type="checkbox"]:not(:checked)');
                //  unmarkedBoxCount.disabled = true
            }
            //console.log(sum)
        }


        // Set the date we're counting down to
        var countDownDate = new Date("october 31, 2023 23:59:00").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
                minutes + "m " + seconds + "s ";

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
@endsection

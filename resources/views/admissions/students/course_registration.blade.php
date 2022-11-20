{{--  @php

if(!session('userid'))
{

header('location: /');
exit;
}
@endphp  --}}
@extends('layouts.userapp')
<style type="text/css">
    #sub3 {



        display: none;
    }
</style>
@section('content')
    <div class="row justify-content-center">
        <!-- Page Wrapper -->
        <div id="wrapper">
            @include('layouts.studentsidebar')
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content m-4">
                    @if (session('approvalMsg'))
                        {!! session('approvalMsg') !!}
                    @endif
                    <div class="container">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-success">Current Level Course </h6>
                            <div class="dropdown no-arrow">
                                <input type=button class=" btn btn-sm btn-success shadow-sm"
                                    name=type id='bt1' value='Show Lower Level Courses'
                                    onclick="setVisibility('sub3');";>
                                {{--  <a href="/addRemitaServiceType" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus text-white-50"></i> Add </a>  --}}

                            </div>

                        </div>
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>First Semester </th>
                                    <th>Course Code</th>
                                    <th>Course Title</th>
                                    <th>Credit Unit</th>
                                </tr>
                            </thead>

                            <tbody>
                                <form name=form1 id="form-1" method=post action="/course-reg">
                                    @csrf
                                    @php
                                        $tatolCredits = 0;
                                    @endphp
                                    <input id="" type="hidden" name="student_id" value="{{ session('userid') }}">
                                    <input id="" type="hidden" name="session" value="{{ $session->id }}">
                                    {{--  <input id="" type="text"  name="session" value="{{ $prevsession }}" >  --}}

                                    @foreach ($courseFirst as $key => $course)
                                        @if($course->is_registered == 0)
                                        @php
                                            $tatolCredits += $course->course_category == 1 ? $course->credit_unit : 0;

                                        @endphp
                                        <tr>


                                            <td> <input type="checkbox" id="{{ $course->credit_unit }}" name="courses[]"
                                                    {{ $course->course_category == 1 ? 'checked ' : '' }}
                                                    value="{{ $course->id }}" class="{{ $course->credit_unit }}"
                                                    onclick="{{ $course->course_category == 1 ? 'return false' : 'totalIt()' }}">
                                                    <input type="hidden" name="course_units1[]" value="{{ $course->credit_unit }}">
                                            </td>
                                            <td>{{ $course->course_code }}</td>
                                            <td>{{ $course->course_title }}</td>
                                            <td>{{ $course->credit_unit }}</td>
                                            @endif
                                    @endforeach
                                    </tr>
                                    <tr>
                                        <td><strong>Total Credit Unit</strong></td>
                                        <td colspan="2"></td>
                                        <td id="tcu" name="total"></td>

                                    </tr>
                            </tbody>

                        </table>
                        {{--  Second Semester Courses  --}}
                         <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Second Semester </th>
                                    <th>Course Code</th>
                                    <th>Course Title</th>
                                    <th>Credit Unit</th>
                                </tr>
                            </thead>

                            <tbody>

                                    @php
                                        $tatolCredits = 0;
                                    @endphp
                                    <input id="" type="hidden" name="student_id" value="{{ session('userid') }}">
                                    <input id="" type="hidden" name="session" value="{{ $session->id }}">
                                    {{--  <input id="" type="text"  name="session" value="{{ $prevsession }}" >  --}}

                                    @foreach ($courseSecond as $key => $course)
                                        @if ($course->is_registered == 0)
                                        @php
                                            $tatolCredits += $course->course_category == 1 ? $course->credit_unit : 0;

                                        @endphp
                                        <tr>


                                            <td> <input type="checkbox" id="{{ $course->credit_unit }}" name="courses[]"
                                                    {{ $course->course_category == 1 ? 'checked ' : '' }}
                                                    value="{{ $course->id }}" class="{{ $course->credit_unit }}"
                                                    onclick="{{ $course->course_category == 1 ? 'return false' : 'totalIt2()' }}">
                                                <input type="hidden" name="course_units2[]" value="{{ $course->credit_unit }}">
                                            </td>
                                            <td>{{ $course->course_code }}</td>
                                            <td>{{ $course->course_title }}</td>
                                            <td>{{ $course->credit_unit }}</td>
                                            @endif
                                    @endforeach
                                    </tr>
                                    <tr>
                                        <td><strong>Total Credit Unit</strong> </td>
                                        <td colspan="2"></td>
                                        <td id="tcu2" name="total"></td>

                                    </tr>
                            </tbody>

                        </table>
                        {{--  To show lower level courses  --}}
                        <div id="sub3">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-success">Lower Level Course </h6>
                            </div>


{{--  First Semester lower coursess --}}

                            <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>First Semester </th>
                                        <th>Course Code</th>
                                        <th>Course Title</th>
                                        <th>Credit Unit</th>
                                    </tr>
                                </thead>

                                <tbody>


                                    <input id="" type="hidden" name="student_id" value="{{ session('userid') }}">
                                    <input id="" type="hidden" name="session" value="{{ $session->id }}">
                                    {{--  <input id="" type="text"  name="session" value="{{ $prevsession }}" >  --}}

                                    @foreach ($lowercourseFirst as $key => $course)
                                    @if ($course->is_registered == 0)
                                        <tr>


                                            <td> <input type="checkbox" id="{{ $course->credit_unit }}" name="courses[]"
                                                   class="{{ $course->credit_unit }}" value="{{ $course->id }}" onclick=totalIt()>
                                                   <input type="hidden" name="course_units1[]" value="{{ $course->credit_unit }}">
                                                   </td>
                                            <td>{{ $course->course_code }}</td>
                                            <td>{{ $course->course_title }}</td>
                                            <td>{{ $course->credit_unit }}</td>
                                            @endif
                                    @endforeach
                                    </tr>
                                    {{--  <tr>
                                <td>Total Credit Unit</td>
                                <td colspan="2"></td>
                                <td id="result" name="total"></td>

                                </tr>  --}}
                                </tbody>

                            </table>
                            {{--  Second Semester Lower Courses   --}}
                            <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Second Semester </th>
                                        <th>Course Code</th>
                                        <th>Course Title</th>
                                        <th>Credit Unit</th>
                                    </tr>
                                </thead>

                                <tbody>


                                    <input id="" type="hidden" name="student_id" value="{{ session('userid') }}">
                                    <input id="" type="hidden" name="session" value="{{ $session->id }}">
                                    {{--  <input id="" type="text"  name="session" value="{{ $prevsession }}" >  --}}

                                    @foreach ($lowercourseSecond as $key => $course)
                                    @if ($course->is_registered == 0)
                                        <tr>


                                            <td> <input type="checkbox" id="{{ $course->credit_unit }}" name="courses[]"
                                                 class="{{ $course->credit_unit }}"   value="{{ $course->id }}" onclick=totalIt2()>
                                                <input type="hidden" name="course_units2 []" value="{{ $course->credit_unit }}">
                                                 </td>
                                            <td>{{ $course->course_code }}</td>
                                            <td>{{ $course->course_title }}</td>
                                            <td>{{ $course->credit_unit }}</td>
                                            @endif
                                    @endforeach
                                    </tr>
                                    {{--  <tr>
                                <td>Total Credit Unit</td>
                                <td colspan="2"></td>
                                <td id="result" name="total"></td>

                                </tr>  --}}
                                </tbody>

                            </table>
                        </div>


                        <div id="limit" class="text-danger fw-bold"></div>
                         <div id="limit2" class="text-danger fw-bold"></div>
                        <button type="submit" class="btn btn-success">
                            {{ __('Register Course') }}
                        </button>
                        {{--  <div> <a href="#" class="btn btn-primary" id="btn" onClick="getCheckboxValue()" > Register </a>
                        </div>  --}}

                    </form>
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-success">Registered Courses </h6>
                        <div class="dropdown no-arrow">
                            {{--  <input type=button class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" name=type id='bt1' value='Show Lower Level Courses' onclick="setVisibility('sub3');";>  --}}
                            <a href="/courseform" class=" btn btn-sm btn-success shadow-sm"><i
                                    class="fas fa-print text-white-50"></i> Print </a>

                        </div>

                    </div>
                    <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th> </th>
                                <th>Course Code</th>
                                <th>Course Title</th>
                                <th>Credit Unit</th>
                            </tr>
                        </thead>

                        <tbody>
                            <form name=form1 method=post action="/dropcourse-reg">
                                @csrf

                                <input id="" type="hidden" name="student_id" value="{{ session('userid') }}">
                                <input id="" type="hidden" name="session" value="{{ $session->id }}">
                                {{--  <input id="" type="text"  name="session" value="{{ $prevsession }}" >  --}}

                                @php
                                    $tatolCredits = 0;
                                @endphp

                                @foreach ($courseform as $key => $course)
                                    @php
                                        $tatolCredits += $course->credit_unit;

                                    @endphp
                                    <tr>


                                        {{--  <td> <input class="itemcourse" type="checkbox" id="course" name="courses[]" {{$course->course_category==1?"checked ":""}} value="{{ $course->course_code }}" onclick="{{$course->course_category==1?'return false':'totalIt()'}}"> </td>  --}}
                                        <td> <input class="itemcourse" type="checkbox" id="course" name="courses[]"
                                                {{ $course->course_category == 1 ? 'disabled ' : '' }}
                                                value="{{ $course->id }}"
                                                onclick="{{ $course->course_category == 1 ? 'return false' : 'totalIt()' }}">{{ $key + 1 }}
                                        </td>
                                        <td>{{ $course->course_code }}</td>
                                        <td>{{ $course->course_title }}</td>
                                        <td>{{ $course->credit_unit }}</td>
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

    @include('layouts.footer')
    {{-- JAVASCRIPT FOR DOING THE MOST --}}
    <script language="JavaScript">
        function setVisibility(id) {
            if (document.getElementById('bt1').value == 'Hide Lower Lvevel Courses') {
                document.getElementById('bt1').value = 'Show Lower vevel Courses';
                document.getElementById(id).style.display = 'none';
            } else {
                document.getElementById('bt1').value = 'Hide Lower Lvevel Courses';
                document.getElementById(id).style.display = 'inline';
            }
        }
    </script>

    <script>
        function totalIt() {
            let sum = 0;
            frm = document.getElementById("form-1"),
                cbs = frm["courses[]"]
            for (i = 0; i < cbs.length; i++) {
                if (cbs[i].checked) {
                    sum += parseInt(cbs[i].id);
                }
            }
            document.getElementById("tcu").innerHTML = sum;
            if (sum > 11) {
                document.getElementById("limit").innerHTML = "Total credit load should not exceed 11 for First Semester Courses";
               frm.cbs[j].checked = false ;
               // let unmarkedBoxCount = document.querySelectorAll('input[type="checkbox"]:not(:checked)');
              //  unmarkedBoxCount.disabled = true
            }
            //console.log(sum)
        }
        //Second seasemter total credit limit
        function totalIt2() {
            let sum = 0;
            frm = document.getElementById("form-1"),
                cbs = frm["courses[]"]
            for (i = 0; i < cbs.length; i++) {
                if (cbs[i].checked) {
                    sum += parseInt(cbs[i].id);
                }
            }
            document.getElementById("tcu2").innerHTML = sum;
            if (sum > 11) {
                document.getElementById("limit2").innerHTML = "Total credit load should not exceed 11 For Second Semester Courses";
               frm.cbs[j].checked = false ;
               // let unmarkedBoxCount = document.querySelectorAll('input[type="checkbox"]:not(:checked)');
              //  unmarkedBoxCount.disabled = true
            }
            //console.log(sum)
        }
    </script>

    {{--  <script type="text/javascript">
function chkcontrol() {
   // alert('hello');
   // var try= document.getElementById("course");
    var cb = event.target.className;
    alert(cb[].value);
var sum=0;
for(var i=0; i < document.form1.course[i].length; i++){

if(document.form1.course[i].checked){
sum = sum + parseInt(document.form1.course[i].value);
}
document.getElementById("msg").innerHTML="Sum :"+ sum;

if(sum >24){
sum = sum - parseInt(document.form1.roles[j].value);
document.form1.course[j].checked = false ;
alert("credit Unit of the selection can't be more than 24")
//return false;
}
document.getElementById("msg").innerHTML="Sum :"+ sum;
}
}
</script>  --}}
    {{--  <script>
function getCheckboxValue() {

  var l1 = document.getElementById("course");

  var res=" ";
  if (l1.checked == true){
    var pl1 = document.getElementById("course").value;
    res = pl1 + ",";
  }
  return document.getElementById("result").innerHTML = res;

  function totalIt() {
  var input = document.getElementsByName("course");
  var total = 0;
  for (var i = 0; i < input.length; i++) {
    if (input[i].checked) {
      total += parseFloat(input[i].value);
    }
  }
  document.getElementsByName("total")[0].value = "$" + total.toFixed(2);
}
}
</script>  --}}
@endsection

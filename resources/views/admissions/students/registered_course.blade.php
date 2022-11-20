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
                        <h6 class="m-0 font-weight-bold text-success">Registered Courses </h6>
                         <div class="dropdown no-arrow">
          {{--  <input type=button class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" name=type id='bt1' value='Show Lower Level Courses' onclick="setVisibility('sub3');";>  --}}
                           <a href="/courseform" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-print text-white-50"></i> Print </a>

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
                             <form name=form1 method=post action="/course-reg">
                             @csrf
                            @php
                                $tatolCredits = 0;
                            @endphp
                             <input id="" type="hidden"  name="student_id" value="{{ session('userid') }}" >
                             <input id="" type="hidden"  name="session" value="{{ $session->id }}" >
                              {{--  <input id="" type="text"  name="session" value="{{ $prevsession }}" >  --}}

                               @foreach ($course as $key => $course)
                                   @php
                                      $tatolCredits += $course->course_category==1?$course->credit_unit:0;

                                   @endphp
                                <tr>


                                        <td> <input class="itemcourse" type="checkbox" id="course" name="courses[]" {{$course->course_category==1?"checked ":""}} value="{{ $course->course_code }}" onclick="{{$course->course_category==1?'return false':'totalIt()'}}"> </td>
                                        <td>{{ $course->course_code }}</td>
                                        <td>{{ $course->course_title }}</td>
                                        <td>{{ $course->credit_unit }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                <td>Total Credit Unit</td>
                                <td colspan="2"></td>
                                <td id="result" name="total"></td>

                                </tr>
                            </tbody>

                        </table>


                         <button type="submit" class="btn btn-success">
                                                            {{ __('Register') }}
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
if(document.getElementById('bt1').value=='Hide Lower Lvevel Courses'){
document.getElementById('bt1').value = 'Show Lower vevel Courses';
document.getElementById(id).style.display = 'none';
}else{
document.getElementById('bt1').value = 'Hide Lower Lvevel Courses';
document.getElementById(id).style.display = 'inline';
}
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

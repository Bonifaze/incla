@extends('layouts.plain')

@section('pagetitle')
<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<title> Course Form</title>

@endsection
   <script>
      window.onload = function() {
            window.print();
        }
    </script>  
@section('content')
<body>
<table width="650" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="650" valign="top"><table width="100%" height="80" border="0" cellpadding="0" cellspacing="0">

      <tr>
        <td align="center" valign="top"><h1><strong> Course Form </strong></h1></td>
      </tr>
    </table>
      <table width="100%" border="0">

        <tr>
          <td><strong>Name of Student: {{ $student->full_name }}  </strong></td>
          <td><strong>  Matric. No.: {{ $academic->mat_no }}  </strong></td>
        </tr>
        <tr>
            @php
                $col;
            @endphp
          <td><strong>Faculty:   {{ $academic->college()->name }}  </strong></td>
          <td><strong>Gender: {{ $student->gender }}  </strong></td>
        </tr>
        <tr>
          <td><strong>Programme:  {{ $academic->program->name }}  </strong></td>
          <td><strong>Dept:    {{ $academic->program->department->name }} </strong></td>
        </tr>
        <tr>
          <td height="21">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
         <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>


        <table width="100%" height="87" border="1" cellpadding="0" cellspacing="0">
                          <tr>
                            <td colspan="3" align="center"><strong>ACADEMIC SESSION: {{ $session->name }}</strong></td>
                            <td colspan="1" align="center"><strong>LEVEL: {{ $academic->level }} </strong></td>
                            <td colspan="1" align="center"><strong>Semester: First </strong> </td>
                          </tr>
                          <tr>
                            <td width="5%"><div align="center"><span style="font-weight: bold">S/N</span></div></td>
                            <td width="15%"><div align="center"><span style="font-weight: bold">Course Code </span></div></td>
                            <td width="40%"><div align="center"><span style="font-weight: bold">Course Title </span></div></td>
                            <td width="10%"><div align="center"><span style="font-weight: bold">Credit Unit </span></div></td>
                            <td width="20%"><div align="center"><span style="font-weight: bold">Remark</span></div></td>
                          </tr>
                           @php
                                $tatolCredits = 0;
                            @endphp

                               @foreach ($courseform as $key => $course)
                                       @php
                                      $tatolCredits += $course->course_unit;

                                   @endphp
						 <tr>
                            <td width="5%"><div align="center"><span style="font-weight: bold">{{ $key+1 }}</span></div></td>
                            <td width="15%"><div align="center"><span style="font-weight: bold">{{ $course->course_code }} </span></div></td>
                            <td width="50%"><div align="center"><span style="font-weight: bold"> {{ $course->course_title }}</span></div></td>
                            <td width="10%"><div align="center"><span style="font-weight: bold">{{ $course->course_unit }} </span></div></td>
                            <td width="20%"><div align="center"><span style="font-weight: bold"> </span></div></td>
                          </tr>

@endforeach
                         <tr>
                            <td width="5%"><div align="center"><span style="font-weight: bold"> </span></div></td>
                            <td width="15%"><div align="center"><span style="font-weight: bold"> </span></div></td>
                            <td width="50%"><div align="center"><span style="font-weight: bold">Total </span></div></td>
                            <td width="10%"><div align="center"><span style="font-weight: bold"> {{  $tatolCredits }} </span></div></td>
                            <td width="20%"><div align="center"><span style="font-weight: bold"> </span></div></td>
                          </tr>


                         </table>
                         <br>
                          <table width="100%" height="87" border="1" cellpadding="0" cellspacing="0">
                          <tr>
                            <td colspan="3" align="center"><strong>ACADEMIC SESSION: {{ $session->name }}</strong></td>
                            <td colspan="1" align="center"><strong>LEVEL:  {{ $academic->level }} </strong></td>
                            <td colspan="1" align="center"><strong>Semester: Second </strong> </td>
                          </tr>
                          <tr>
                            <td width="5%"><div align="center"><span style="font-weight: bold">S/N</span></div></td>
                            <td width="15%"><div align="center"><span style="font-weight: bold">Course Code </span></div></td>
                            <td width="40%"><div align="center"><span style="font-weight: bold">Course Title </span></div></td>
                            <td width="10%"><div align="center"><span style="font-weight: bold">Credit Unit </span></div></td>
                            <td width="20%"><div align="center"><span style="font-weight: bold">Remark</span></div></td>
                          </tr>
                           @php
                                $tatolCredits = 0;

                            @endphp

                               @foreach ($courseform2 as $key => $course)
                                       @php
                                      $tatolCredits += $course->course_unit;

                                   @endphp
						 <tr>
                            <td width="5%"><div align="center"><span style="font-weight: bold">{{ $key+1 }}</span></div></td>
                            <td width="15%"><div align="center"><span style="font-weight: bold">{{ $course->course_code }} </span></div></td>
                            <td width="50%"><div align="center"><span style="font-weight: bold"> {{ $course->course_title }}</span></div></td>
                            <td width="10%"><div align="center"><span style="font-weight: bold">{{ $course->course_unit }} </span></div></td>
                            <td width="20%"><div align="center"><span style="font-weight: bold"> </span></div></td>
                          </tr>

@endforeach
                         <tr>
                            <td width="5%"><div align="center"><span style="font-weight: bold"> </span></div></td>
                            <td width="15%"><div align="center"><span style="font-weight: bold"> </span></div></td>
                            <td width="50%"><div align="center"><span style="font-weight: bold">Total </span></div></td>
                            <td width="10%"><div align="center"><span style="font-weight: bold"> {{  $tatolCredits }} </span></div></td>
                            <td width="20%"><div align="center"><span style="font-weight: bold"> </span></div></td>
                          </tr>


                         </table>


      <table width="100%" border="0">
        <tr>
          <td width="69%">&nbsp;</td>
          <td width="31%">&nbsp;</td>
        </tr>
        <tr>
          <td height="29">SIGNATURE OF STUDENT : .................................................</td>
          <td>&nbsp;&nbsp;&nbsp;DATE : ................................</td>
        </tr>
        <tr>
          <td height="34">SIGNATURE OF COURSE ADVISER : ...................................</td>
          <td>&nbsp;&nbsp;&nbsp;DATE : ................................</td>
        </tr>
        <tr>
          <td height="34">SIGNATURE OF H.O.D : ......................................................</td>
          <td>&nbsp;&nbsp;&nbsp;DATE : ................................</td>
        </tr>
        <tr>
          <td height="30">SIGNATURE OF DEAN : .......................................................</td>
          <td>&nbsp;&nbsp;&nbsp;DATE : ................................</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
@endsection

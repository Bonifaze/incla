@extends('layouts.plain')

@section('pagetitle')
<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ $student->full_name }} Transcript</title>

@endsection

@section('content')
<body >
<table width="650" border="0" cellspacing="0" cellpadding="0" style="margin:auto" >
  <tr>
    <td height="650" valign="top"><table width="100%" height="174" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="138" valign="top"><h1>&nbsp;&nbsp;&nbsp;&nbsp;</h1></td>
        </tr>
      <tr>
        <td align="center" valign="top"><h1><strong>Unofficial Academic  Transcript </strong></h1></td>
      </tr>
    </table>
      <table width="100%" border="0">

        <tr>
          <td><strong>Name of Student: {{ $student->full_name }} </strong></td>
          <td><strong>  Matric. No.: {{ $academic->mat_no }} </strong></td>
        </tr>
        <tr>
          {{--  <td><strong>College: {{ $academic->college()->name }} </strong></td>  --}}
          <td><strong>Gender: {{ $student->gender }} </strong></td>
        </tr>
        <tr>
          <td><strong>Programme: {{ $academic->program->name }} </strong></td>
          <td><strong>Dept: {{ $academic->program->department->name }} </strong></td>
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

	 @foreach ($sessions as $session)

	{{--  @php $results = $reg->result(); @endphp

	@php $gpa = $reg->gpa(); @endphp

	@php $cgpa = $reg->cgpa(); @endphp  --}}

        <table width="100%" height="87" border="1" cellpadding="0" cellspacing="0">
                          <tr>
                            <td colspan="3"><strong>ACADEMIC SESSION</strong>:
                             {{  $session->name }}
                             </td>
                            <td colspan="2" align="center"><strong></strong>:

                             </td>
                            <td colspan="2"><strong></strong>:
                        {{--  {{ $session->registered_courses1->first()?->semester }}  --}}

                             </td>
                          </tr>
                          <tr>
                            <td width="5%"><div align="center"><span style="font-weight: bold">S/N</span></div></td>
                            <td width="15%"><div align="center"><span style="font-weight: bold">Course Code </span></div></td>
                            <td width="23%"><div align="center"><span style="font-weight: bold">Course Title </span></div></td>
                            <td width="14%"><div align="center"><span style="font-weight: bold">Credit Unit </span></div></td>
                            <td width="13%"><div align="center"><span style="font-weight: bold">Score</span></div></td>
                            <td width="17%"><div align="center"><span style="font-weight: bold">Grade</span></div></td>
                            <td width="13%"><div align="center"><span style="font-weight: bold">Pass / Fail</span></div></td>
                          </tr>
                          @php
                            $tc1 = 0;
                            $tc2 = 0;
                            $tgp1 = 0;
                            $tgp2 = 0;
                          @endphp
                            @foreach ($session->registered_courses1 as $result)
                            @php
                              $tc1 += $result->course_unit;
                              $tgp1 += $result->grade_point * $result->course_unit;
                            @endphp

						<tr>
                            <td width="5%"><div align="center"><span style="font-weight: bold">{{ $loop->iteration }} </span></div></td>
                            <td width="15%"><div align="center"><span style="font-weight: bold">{{ $result->course_code }} </span></div></td>
                             <td width="23%"><div align="center"><span style="font-weight: bold">{{ $result->course_title }} </span></div></td>
                           <td width="14%"><div align="center"><span style="font-weight: bold">{{ $result->course_unit }} </span></div></td>
                            <td width="13%"><div align="center"><span style="font-weight: bold">{{ $result->total }}</span></div></td>
                            <td width="17%"><div align="center"><span style="font-weight: bold">{{ $result->grade }}</span></div></td>
                            <td width="13%"><div align="center"><span style="font-weight: bold">{{ $result->grade_status }}</span></div></td>
                          </tr>
                         @endforeach

                         </table>
      <table width="100%" border="1" cellpadding="0" cellspacing="0">
                          <tr>
                            <td  colspan="7">&nbsp;</td>
                            </tr>
                            @php
                              $courses = $registered_courses->where('session','<=', $session->id);
                              //dd($courses);
                              $tgp_cgpa = 0;
                              $tcu_cgpa = 0;
                              foreach ($courses as $course) {
                                if (($course->session == $session->id && $course->semester != 2) || $course->session < $session->id)
                                {
                                  $tgp_cgpa += $course->grade_point * $course->course_unit;
                                  $tcu_cgpa += $course->course_unit;
                                }
                              }
                              //dd($tgp_cgpa, $tcu_cgpa);
                            @endphp
                          <tr>
                            <td width="2%">&nbsp;</td>
                            <td colspan="2" align="center"><strong>Total Credit Load</strong></td>
                            <td colspan="2" align="left"><strong> {{ $tc1 }}</strong></td>
                            <td width="30%" align="left"><strong>Total Credit Unit Value</strong></td>
                            <td width="10%" align="left"><strong> {{ $tgp1 }}</strong></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="3" align="right"><strong>Grade Points Average (GPA)</strong></td>
                            <td width="13%">&nbsp;</td>
                            <td><span style="font-weight: bold">GPA : {{ $tgp1 > 0 && $tc1 > 0 ? number_format($tgp1/$tc1,2) : '0.00' }} </span></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="3" align="right"><strong>TC</strong></td>
                           <td>&nbsp;</td>
                            <td><strong> {{$tc1 > 0 ? $tcu_cgpa : 0 }}</strong></td>
                            <td>&nbsp;</td>
                          </tr>

                           <tr>
                            <td>&nbsp;</td>
                            <td colspan="3" align="right"><strong>TGP</strong></td>
                            <td>&nbsp;</td>
                            <td><strong> {{ $tc1 > 0 ? $tgp_cgpa : 0 }}</strong></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="3" align="right"><strong>Cumulative Grade Points Average (CGPA) </strong></td>
                            <td>&nbsp;</td>
                            <td><span style="font-weight: bold">CGPA : {{ $tc1 > 0 ?  number_format($tgp_cgpa/$tcu_cgpa, 2) : '0.00' }}</span></td>
                            <td>&nbsp; </td>
                          </tr>


                        </table>
                        <br />
<br />


<br />
<br />


     @endforeach

      <table width="100%" border="0">
        <tr>
          {{--  <td width="46%"><strong>Total Credit Load : </strong> {{ $totalCGPA->hours }}</td>
          <td width="54%"><strong>Total Credit Unit Value: </strong> {{ $totalCGPA->units }}</td>  --}}
        </tr>
        <tr>
          {{--  <td colspan="2"><strong>Final CGPA</strong>:  {{ $totalCGPA->value }} </td>  --}}
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
         <tr>
          <td colspan="2"><br />
            ...............................................<br />
            Dr. <br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Registrar </strong></td>
        </tr>
         <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
@endsection

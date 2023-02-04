@extends('layouts.plain')

@section('pagetitle')
<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ $student->full_name }} Results</title>

@endsection

@section('content')
<body>
<br>
  <table width="100%" border="0">

        <tr>
          <td><strong>Name of Student: {{ $student->full_name }} </strong></td>
          <td><strong>  Matric. No.: {{ $academic->mat_no }} </strong></td>
        </tr>
        <tr>
          <td><strong>College: {{ $academic->college()->name }} </strong></td>
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
<table width="650" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="650" valign="top">

	 @foreach ($sessions as $session)

	{{--  @php $results = $reg->result(); @endphp

	@php $gpa = $reg->gpa(); @endphp

	@php $cgpa = $reg->cgpa(); @endphp  --}}

        <table width="100%" height="87" border="1" cellpadding="0" cellspacing="0">
                          <tr>
                            <td colspan="3"><strong>ACADEMIC SESSION</strong>:
                             {{  $session->name }}
                             </td>
                            <td colspan="2" align="center"><strong>LEVEL</strong>:
                             {{ $session->registered_courses1->first()?->level }}
                             </td>
                            <td colspan="2"><strong>SEMESTER</strong>:
                             {{--  {{ $session->registered_courses1->first()?->semester }}  --}}
                             FIRST
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

                        <br />
<br />

<table width="100%" height="87" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3"><strong>ACADEMIC SESSION</strong>:
     {{  $session->name }}
     </td>
    <td colspan="2" align="center"><strong>LEVEL</strong>:
     {{ $session->registered_courses2->first()?->level }}
     </td>
    <td colspan="2"><strong>SEMESTER</strong>:
     {{--  {{ $session->registered_courses2->first()?->semester }}  --}}
     SECOND
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
    @foreach ($session->registered_courses2 as $result2)
    @php
      $tc2 += $result2->course_unit;
      $tgp2 += $result2->grade_point * $result2->course_unit;
    @endphp
<tr>
    <td width="5%"><div align="center"><span style="font-weight: bold">{{ $loop->iteration }} </span></div></td>
    <td width="15%"><div align="center"><span style="font-weight: bold">{{ $result2->course_code }} </span></div></td>
     <td width="23%"><div align="center"><span style="font-weight: bold">{{ $result2->course_title }} </span></div></td>
   <td width="14%"><div align="center"><span style="font-weight: bold">{{ $result2->course_unit }} </span></div></td>
    <td width="13%"><div align="center"><span style="font-weight: bold">{{ $result2->total }}</span></div></td>
    <td width="17%"><div align="center"><span style="font-weight: bold">{{ $result2->grade }}</span></div></td>
    <td width="13%"><div align="center"><span style="font-weight: bold">{{ $result2->grade_status }}</span></div></td>
  </tr>
 @endforeach


 </table>

<br />
<br />


     @endforeach

      </td>
  </tr>
</table>
@endsection

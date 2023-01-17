@extends('layouts.plain')

@section('pagetitle')
<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ $student->full_name }} Transcript</title>

@endsection

@section('content')
<body>
<table width="650" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="650" valign="top"><table width="100%" height="174" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="138" valign="top"><h1>&nbsp;&nbsp;&nbsp;&nbsp;</h1></td>
        </tr>
      <tr>
        <td align="center" valign="top"><h1><strong>Academic  Transcript </strong></h1></td>
      </tr>
    </table>
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

	 @foreach ($registrations as $key => $reg)

	{{--  @php $results = $reg->result(); @endphp

	@php $gpa = $reg->gpa(); @endphp

	@php $cgpa = $reg->cgpa(); @endphp  --}}

        <table width="100%" height="87" border="1" cellpadding="0" cellspacing="0">
                          <tr>
                            <td colspan="3"><strong>ACADEMIC SESSION</strong>:
                             {{ $reg->session }}
                             </td>
                            <td colspan="2" align="center"><strong>LEVEL</strong>:
                             {{ $reg->level }}
                             </td>
                            <td colspan="2"><strong>SEMESTER</strong>:
                             {{--  {{ $reg->session->semesterName($reg->semester) }}  --}}
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
                            @foreach ($registrations as $result)

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

                          <tr>
                            <td width="2%">&nbsp;</td>
                            <td colspan="2" align="center"><strong>Total Credit Load</strong></td>
                            {{--  <td colspan="2" align="left"><strong> {{ $gpa->hours }}</strong></td>  --}}
                            <td width="30%" align="left"><strong>Total Credit Unit Value</strong></td>
                            {{--  <td width="10%" align="left"><strong> {{ $gpa->units }}</strong></td>  --}}
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="3" align="right"><strong>Grade Points Average (GPA)</strong></td>
                            <td width="13%">&nbsp;</td>
                            {{--  <td><span style="font-weight: bold">GPA : {{ $gpa->value }} </span></td>  --}}
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="3" align="right"><strong>TC</strong></td>
                           <td>&nbsp;</td>
                            {{--  <td><strong> {{ $cgpa->hours }}</strong></td>  --}}
                            <td>&nbsp;</td>
                          </tr>

                           <tr>
                            <td>&nbsp;</td>
                            <td colspan="3" align="right"><strong>TGP</strong></td>
                            <td>&nbsp;</td>
                            {{--  <td><strong> {{ $cgpa->units }}</strong></td>  --}}
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="3" align="right"><strong>Cumulative Grade Points Average (CGPA) </strong></td>
                            <td>&nbsp;</td>
                            {{--  <td><span style="font-weight: bold">CGPA : {{ $cgpa->value }}</span></td>  --}}
                            <td>&nbsp; </td>
                          </tr>


                        </table>
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
            Dr. (Mrs) Stella Chizoba Okonkwo, FCAI, FIIA, JP<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Registrar </strong></td>
        </tr>
         <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
@endsection

@extends('layouts.plain')

@section('pagetitle')
<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
<title>{{ $student->full_name }} Results</title>

@endsection

@section('content')
<body>
<table width="650" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="650" valign="top">

	 @foreach ($registrations as $key => $reg)
	
	@php $results = $reg->result(); @endphp
	
	@php $gpa = $reg->gpa(); @endphp
	
	@php $cgpa = $reg->cgpa(); @endphp
  
        <table width="100%" height="87" border="1" cellpadding="0" cellspacing="0">
                          <tr>
                            <td colspan="3"><strong>ACADEMIC SESSION</strong>: {{ $reg->session->name }}</td>
                            <td colspan="2" align="center"><strong>LEVEL</strong>: {{ $reg->level }} </td>
                            <td colspan="2"><strong>SEMESTER</strong>: {{ $reg->session->semesterName($reg->semester) }}</td>
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
                            @foreach ($results as $key => $result)
                           
						 <tr>
                            <td width="5%"><div align="center"><span style="font-weight: bold">{{ $loop->iteration }} </span></div></td>
                            <td width="15%"><div align="center"><span style="font-weight: bold">{{ $result->programCourse->course->code }} </span></div></td>
                            <td width="23%"><div align="center"><span style="font-weight: bold">{{ $result->programCourse->course->title }} </span></div></td>
                            <td width="14%"><div align="center"><span style="font-weight: bold">{{ $result->programCourse->hours }} </span></div></td>
                            <td width="13%"><div align="center"><span style="font-weight: bold">{{ $result->total }}</span></div></td>
                            <td width="17%"><div align="center"><span style="font-weight: bold">{{ $result->grade }}</span></div></td>
                            <td width="13%"><div align="center"><span style="font-weight: bold">{{ $result->pass_status }}</span></div></td>
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
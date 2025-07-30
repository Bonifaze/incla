@extends('layouts.plain')

@section('pagetitle')
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ $student->full_name }} Transcript</title>

@endsection

@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }
    .container {
        width: 750px;
        margin: auto;
        background: #e5e5e5;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .header {
        text-align: center;
        margin-bottom: 20px;
    }
    .school-logo {
        width: 80px;
        height: 80px;
    }
    .student-info, .result-table, .summary-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    .student-info td, .result-table td, .result-table th, .summary-table td {
        padding: 10px;
        border: 1px solid #000;
    }
    .result-table th, .summary-table th {
        background-color: #D3D3D3;
        color: white;
    }
    .summary-table td {
        font-weight: bold;
    }
    .signature {
        margin-top: 30px;
        text-align: right;
    }
</style>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: white;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        height: 100vh;
        position: relative;
    }
    .content-wrapper {
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }
    .watermark {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) rotate(-45deg);
        font-size: 60px;
        font-weight: bold;
        color: rgba(0, 0, 0, 0.1);
        text-align: center;
        z-index: -1;
        pointer-events: none;
        white-space: nowrap;
    }
    .watermark img {
        width: 150px;
        opacity: 0.01;
        display: block;
        margin: 0 auto;
    }
    .watermark p {
        margin-top: -20px;
        font-size: 30px;
        color: rgba(211, 205, 205, 0.1);
    }
    table {
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
        border-collapse: collapse;
        background-color: white;
        position: relative;
    }
    td, th {
        padding: 8px;
        text-align: left;
        border: 1px solid #ddd;
    }
    th {
        background-color: #D3D3D3;
    }
    .logo {
        width: 80px;
        max-width: 80px;
    }
    .student-passport {
        width: 80px;
        height: 80px;
    }
    h1 {
        text-align: center;
        font-size: 24px;
    }
    h3 {
        text-align: center;
        font-weight: bold;
        color: #4CAF50;
        margin-top: 20px;
    }
    @media print {
        body {
            margin: 0;
            padding: 0;
            background-color: white;
        }
        table, th, td {
            page-break-inside: avoid;
            border: 1px solid #000;
        }
        .logo {
            width: 60px;
            max-width: 60px;
        }
        .student-passport {
            width: 80px;
            height: 80px;
        }
        td, th {
            font-size: 12px;
        }
        .content-wrapper {
            width: 100%;
            margin: 0 auto;
            padding: 10px;
        }
        h3 {
            text-align: center;
            font-weight: bold;
        }
    }
    @media (max-width: 768px) {
        td, th {
            font-size: 14px;
        }
        .logo {
            width: 50px;
        }
        .student-passport {
            width: 60px;
            height: 60px;
        }
    }
    .chart-container {
        width: 100%;
        height: 300px;
        margin-top: 30px;
    }
</style>


<div class="container">
    <div class="header">
        <table width="100%" height="80" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td width="20%" align="left">
                    <img src="{{ asset('img/letter_logo.png') }}" alt="School Logo" class="school-logo" />
                </td>
                <td width="60%" align="center">
                    <h1><strong>Unofficial Academic Transcript</strong></h1>
                </td>
                <td width="20%" align="right">
                    <img src="data:image/jpeg;base64,{{ $student->passport }}" alt="{{ $student->full_name }} Image" class="student-passport" />
                </td>
            </tr>
        </table>
    </div>

    <table class="student-info">
        <tr>
            <td><strong>Name of Student:</strong> {{ $student->full_name }}</td>
            <td><strong>Matric No.:</strong> {{ $academic->mat_no }}</td>
        </tr>
        <tr>
            <td><strong>Gender:</strong> {{ $student->gender }}</td>
            <td><strong>Programme:</strong> {{ $academic->program->name }}</td>
        </tr>
        <tr>
            <td><strong>Department:</strong> {{ $academic->program->department->name }}</td>
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
                            {{--  <td colspan="2" align="center"><strong>LEVEL</strong>:
                             {{ $session->registered_courses1->last()?->level }}
                             </td>  --}}
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

<table width="100%" height="87" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3"><strong>ACADEMIC SESSION</strong>:
     {{  $session->name }}
     </td>
    {{--  <td colspan="2" align="center"><strong>LEVEL</strong>:
     {{ $session->registered_courses2->last()?->level }}
     </td>  --}}
    <td colspan="2"><strong>SEMESTER</strong>:
 {{--   {{ $session->registered_courses2->first()?->semester }} --}}
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

 @php
      $tgp_cgpa2 = 0;
      $tcu_cgpa2 = 0;
      foreach ($courses as $course) {
          $tgp_cgpa2 += $course->grade_point * $course->course_unit;
          $tcu_cgpa2 += $course->course_unit;
      }
      //dd($tgp_cgpa, $tcu_cgpa);
    @endphp

 </table>
<table width="100%" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td  colspan="7">&nbsp;</td>
    </tr>

  <tr>
    <td width="2%">&nbsp;</td>
    <td colspan="2" align="center"><strong>Total Credit Load</strong></td>
    <td colspan="2" align="left"><strong> {{ $tc2 }}</strong></td>
    <td width="30%" align="left"><strong>Total Credit Unit Value</strong></td>
    <td width="10%" align="left"><strong> {{ $tgp2 }}</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3" align="right"><strong>Grade Points Average (GPA)</strong></td>
    <td width="13%">&nbsp;</td>
    <td><span style="font-weight: bold">GPA : {{ $tgp2 > 0 && $tc2 > 0 ? number_format($tgp2/$tc2, 2) : '0.00' }} </span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3" align="right"><strong>TC</strong></td>
   <td>&nbsp;</td>
    <td><strong>
    {{ $tc2 > 0 ?  $tcu_cgpa2 : 0 }}
    </strong></td>
    <td>&nbsp;</td>
  </tr>

   <tr>
    <td>&nbsp;</td>
    <td colspan="3" align="right"><strong>TGP</strong></td>
    <td>&nbsp;</td>
    <td><strong> {{  $tc2 > 0 ? $tgp_cgpa2 : 0 }}</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3" align="right"><strong>Cumulative Grade Points Average (CGPA) </strong></td>
    <td>&nbsp;</td>

    <td><span style="font-weight: bold">CGPA : {{ $tc2 > 0  ? number_format($tgp_cgpa2/$tcu_cgpa2, 2) : '0.00' }}</span></td>
    <td>&nbsp; </td>
  </tr>


</table>
<br />
<br />


     @endforeach
    <div class="signature">
        <p><strong>Authorized Signature</strong></p>
        <hr>
        <p>Dr. <br><strong>Registrar</strong></p>
    </div>
</div>

@endsection

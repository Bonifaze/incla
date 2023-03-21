<!doctype html>
<html lang="en">

<head>
<title>{{ $meta['session']->name }}  {{ $meta['program']->name }} Exmination Report </title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
@php
    $course_ids = [];
@endphp
<body>
 <div class="row justify-content-center mt-4">
    <div class="col-md-5">
        <h3 class="text-center text-capitalize">VERITAS UNIVERSITY ABUJA</h3>

            <h6 class="text-center">Bwari Area Council, FCT</h6>
             <h5 class="text-center text-bold">EXMINATION REPORTING SHEET</h5>
    </div>
  </div>
<div>
<table class="table table-borderless">
						  <thead>

						  </thead>


						  <tbody>
                          <tr>
                              <td colspan="4"> </td>
                              {{--  @foreach ($program_courses as $key => $program_course)  --}}

                                  <td> </td>


                              {{--  @endforeach  --}}
                              <td colspan="4"> </td>
                          </tr>

                          <tr>
                              <td colspan="4">Collect:  {{ $meta['program']->department->college->name }} ({{ $meta['program']->department->college->code }})</td>
                              {{--  @foreach ($program_courses as $key => $program_course)  --}}

                                  <td> </td>


                              {{--  @endforeach  --}}
                              <td colspan="12">Session: {{ $meta['session']->name }} </td>
                          </tr>

                          <tr>
                              <td colspan="4">Department: {{ $meta['program']->department->name }} </td>
                              {{--  @foreach ($program_courses as $key => $program_course)  --}}

                                  <td> </td>


                              {{--  @endforeach  --}}
                              <td colspan="12">Semester:
                                @if ( $meta['semester']  == 1)
                              First
                             @else ( $meta['semester']  == 2)
                             Second
                             @endif
                              </td>
                          </tr>


                          <tr>
                              <td colspan="4">Program:
                                @if ( $meta['level'] <= 600)
                                {{ $meta['program']->degree}}
                                @else  ( $meta['level'] > 600)
                                  {{ $meta['program']->masters}}
                                  @endif
                                 {{ $meta['program']->name }}  </td>
                              {{--  @foreach ($program_courses as $key => $program_course)  --}}

                                  <td> </td>


                              {{--  @endforeach  --}}
                              <td colspan="12">Level: {{ $meta['level'] }}</td>
                          </tr>

                          <tr>
                              <td colspan="4"> </td>
                              {{--  @foreach ($program_courses as $key => $program_course)  --}}

                                  <td> </td>


                              {{--  @endforeach  --}}
                              <td colspan="4"> </td>
                          </tr>
</div>

  <div class="row justify-content-cente mb-4">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead class="text-center">
                <tr>
                    <th colspan="{{ 8 + $program_courses->count() }}"></th>
                </tr>
                <tr>
                    <th rowspan="2">S/N</th>
                    <th rowspan="2">MATRIC NUMBER</th>
                    <th rowspan="2">NAME</th>
                    <th rowspan="2">Gender</th>
                    <th colspan="{{ $program_courses->count() }}">Courses, Credit, Scores, Grades, GP</th>
                    <th rowspan="2">TC</th>
                    <th rowspan="2">TGP</th>
                    <th rowspan="2">GPA</th>
                      {{--  <th rowspan="2">CGPA</th>  --}}
                    <th rowspan="2">Remark</th>
                </tr>
                <tr>
                    @foreach ($program_courses as $program_course)
                        @php
                            $course_ids[] = $program_course->course_id;
                        @endphp
                        <th>{{ $program_course->course_code }} <br> {{ $program_course->credit_unit }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    @php
                        $tc = 0;
                        $tgp = 0;
                        $gpa = 0.00;
                    @endphp
                    <tr>
                    @if ($student->academic->level > 900)

                    @else


                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->matric_number }}</td>
                        <td>{{ $student->full_name }}</td>
                        <td>{{ $student->gender[0] }}</td>
                        @for ($x = 0; $x < $program_courses->count(); $x++)
                        <td>
                            @php
                                $student_course = $student->registered_courses->where('course_id', $course_ids[$x])->first();
                                $tc += $student_course?->course_unit;
                                $tgp += $student_course?->course_unit * $student_course?->grade_point;
                            @endphp
                            {{ $student_course?->total }} <br>
                            {{ $student_course?->grade }} <br>
                            {{ $student_course ? $student_course?->course_unit * $student_course?->grade_point : '' }}
                        </td>
                        @endfor
                        <td>{{ $tc }}</td>
                        <td>{{ $tgp }}</td>
                        <td>{{ $tc > 0 && $tgp > 0 ? number_format($tgp/$tc, 2) : '0.00' }}</td>
                         {{--  <td><span style="font-weight: bold">CGPA : {{ $tgp_cgpa > 0 && $tcu_cgpa > 0 ? number_format($tgp_cgpa/$tcu_cgpa, 2) : '0.00' }}</span></td>  --}}
                        <td class="small">
                         {{--  {{ $student_course?->total }}
                         @if ( $student_course?->total <= 44)
                                CO :
                                @else  ( $student_course?->grade >= 45)

                                  @endif  --}}

                                  {{$student->semesterResultRemark()}}
                        </td>
                         @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
   <script>
      window.onload = function() {
            window.print();
        }
    </script>
</body>

</html>

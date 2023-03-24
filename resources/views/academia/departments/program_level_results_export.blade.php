
<table class="table table-striped">
						  <thead>

						  </thead>


						  <tbody>
                            <tr>
                              <td colspan="4"> </td>
                          </tr>

                          <tr>
                              <td colspan="8"> </td>


                                  <td colspan="8"> VERITAS UNIVERSITY ABUJA </td>



                              <td colspan="8"> </td>
                          </tr>

                            <tr>
                              <td colspan="4"> </td>
                          </tr>

                          <tr>
                              <td colspan="12">Faculty:  {{ $meta['program']->department->college->name }} ({{ $meta['program']->department->college->code }})</td>
                              {{--  @foreach ($program_courses as $key => $program_course)  --}}

                                  <td> </td>


                              {{--  @endforeach  --}}
                              <td colspan="12">Session: {{ $meta['session']->name }} </td>
                          </tr>

                          <tr>
                              <td colspan="12">Department: {{ $meta['program']->department->name }} </td>
                              {{--  @foreach ($program_courses as $key => $program_course)  --}}

                                  <td> </td>


                              {{--  @endforeach  --}}
                              <td colspan="12">Semester:
                                @if ( $meta['semester']  == 1)
                              First Semester
                             @else ( $meta['semester']  == 2)
                             Second Semester
                             @endif
                              </td>
                          </tr>


                          <tr>
                              <td colspan="12">Program:
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
                    <th rowspan="2">GP</th>
                    <th rowspan="2">GPA</th>
                    <th rowspan="2">TC (BF)</th>
                    <th rowspan="2">TGP(BF)</th>
                    <th rowspan="2">TC (Total)</th>
                    <th rowspan="2">TGP (Total)</th>
                    <th rowspan="2">CGPA</th>
                    <th rowspan="2">Remarks</th>
                </tr>
                <tr>
                    @foreach ($program_courses as $program_course)
                        @php
                            $course_ids[] = $program_course->course_id;
                        @endphp
                        <th>{{ $program_course->course_code }}<br> {{ $program_course->credit_unit }}</th>
                    @endforeach
                </tr>

                @foreach ($students as $student)
                    @php
                        $tc = 0;
                        $tgp = 0;
                        $gpa = 0.00;
                        $tcbf = 0;
                        $tgpbf = 0;
                        $cgpa = 0.00;
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->matric_number }}</td>
                        <td>{{ $student->full_name }}</td>
                        <td>{{ $student->gender[0] }}</td>
                        @php
                            $previous_courses = $student->previous_registered_courses;
                            foreach ($previous_courses as $course) {
                                $tcbf = $course?->course_unit;
                                $tgpbf = $course?->course_unit * $course?->grade_point;
                            }
                        @endphp
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
                        <td>{{ $tcbf }}</td>
                        <td>{{ $tgpbf }}</td>
                        <td>{{ $tc + $tcbf }}</td>
                        <td>{{ $tgp + $tgpbf }}</td>
                        <td>{{($tc + $tcbf) >0 && ($tgp + $tgpbf) > 0 ? number_format(($tgp + $tgpbf)/($tc + $tcbf), 2): '0.00' }}</td>
                        <td class="small">
                         {{--  {{ $student_course?->total }}
                         @if ( $student_course?->total <= 44)
                                CO :
                                @else  ( $student_course?->grade >= 45)

                                  @endif  --}}

                                  {{$student->semesterResultRemark()}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

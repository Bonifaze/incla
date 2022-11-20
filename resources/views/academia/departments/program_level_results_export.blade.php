						<table class="table table-striped">
						  <thead>

						  </thead>

						  
						  <tbody>
                          <tr>
                              <td colspan="4"> </td>
                              @foreach ($program_courses as $key => $program_course)

                                  <td> </td>


                              @endforeach
                              <td colspan="4"> </td>
                          </tr>

                          <tr>
                              <td colspan="4">Faculty: {{$program->department->college->name}}</td>
                              @foreach ($program_courses as $key => $program_course)

                                  <td> </td>


                              @endforeach
                              <td colspan="4">Session: {{$session->currentSessionName()}}</td>
                          </tr>

                          <tr>
                              <td colspan="4">Department: {{$program->department->name}}</td>
                              @foreach ($program_courses as $key => $program_course)

                                  <td> </td>


                              @endforeach
                              <td colspan="4">Semester: {{$session->semesterName($session->currentSemester())}}</td>
                          </tr>


                          <tr>
                              <td colspan="4">Program: {{$program->name}} </td>
                              @foreach ($program_courses as $key => $program_course)

                                  <td> </td>


                              @endforeach
                              <td colspan="4">Level: {{$level}}</td>
                          </tr>

                          <tr>
                              <td colspan="4"> </td>
                              @foreach ($program_courses as $key => $program_course)

                                  <td> </td>


                              @endforeach
                              <td colspan="4"> </td>
                          </tr>


                          <tr>
                          <td>S/N</td>
                          <td>Name</td>
                          <td>Mat No</td>
                          <td>Gender</td>
                          @foreach ($program_courses as $key => $program_course)

                              <td>{{$program_course->course->code}} <br /> {{$program_course->hours}}</td>


                          @endforeach
                          <td>TC</td>
                              <td>GP</td>
                              <td>GPA</td>
                              <td>TC (BF)</td>
                              <td>TGP (BF)</td>
                              <td>TC (Total)</td>
                              <td>TGP (Total)</td>
                              <td>CGPA</td>
                              <td>Remarks</td>
                          </tr>
                          @foreach($students as $key => $student)
                              @php
                                  //$gpa = $student->unApprovedGPA();
                              $cgpa = $student->excelCGPA();
                              @endphp
                              <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$student->fullName}}</td>
                                  <td>{{$student->academic->mat_no}}</td>
                                  <td>{{$student->gender}}</td>
                                  @foreach ($program_courses as $key => $program_course)

                                      <td>{!! $student->programCourseResult($program_course->id)!!}</td>

                                  @endforeach
                                  <td>{{$cgpa->currenthours}}</td>
                                  <td>{{$cgpa->currentunits}}</td>
                                  <td>{{$cgpa->currentgpa}}</td>
                                  <td>{{$cgpa->bfhours}}</td>
                                  <td>{{$cgpa->bfunits}}</td>
                                  <td>{{$cgpa->hours}}</td>
                                  <td>{{$cgpa->units}}</td>
                                  <td>{{$cgpa->value}}</td>
                                  <td> {{$student->semesterResultRemark()}} </td>

                              </tr>
                          @endforeach
						  </tbody>
						  
						  
						  
						</table>

						

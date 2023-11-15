						<table class="table table-striped">
						  <thead>

						  </thead>

						  
						  <tbody>

                          <tr>
                              <td> {{ $pcid }} </td>

                              <td> </td>
                          </tr>


                          <tr>
                          <td>S/N</td>
                          <td>Marker</td>
                          <td>Mat No</td>
                          <td>CA 1</td>
                          <td>CA 2</td>
                          <td>CA 3</td>
                          <td>Exam</td>

                          </tr>
                          @foreach($results as $key => $result)
                              <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$result->id}}</td>
                                  <td>{{$result->student->academic->mat_no}}</td>
                                  <td>{{$result->CA1}}</td>
                                  <td>{{$result->CA2}}</td>
                                  <td>{{$result->CA3}}</td>
                                  <td>{{$result->exam}}</td>


                              </tr>
                          @endforeach
						  </tbody>
						  
						  
						  
						</table>

						

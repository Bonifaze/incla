@extends('layouts.plain')



@section('pagetitle') {{$program_course->course->code}}  @endsection



@section('content')


						<table class="table table-striped">

							<tbody>

							<tr>
								<td>ID</td>
								<td>NAME</td>
								<td>Mat No</td>

							</tr>
						  
						  @foreach ($results as $key => $result)
						  
							<tr>
							  <td>{{ $loop->iteration }}</td>
								<td>{{ $result->full_name }}</td>
							  <td>{{ $result->mat_no }}</td>

							</tr>
							@endforeach
							
						  </tbody>

						</table>


@endsection

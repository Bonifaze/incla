@extends('layouts.student')



@section('pagetitle') Currently Registered Courses  @endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('course-open') menu-open @endsection

@section('course') active @endsection

<!-- Page -->
 @section('registration') active @endsection

 <!-- End Sidebar links -->



@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">


            <div class="card ">
              <div class="card-header">
                <h3 class="card-title"> Currently Registered Courses test </h3>
				</div>

             <div class="table-responsive">

                 <table width="650" border="0" cellspacing="0" cellpadding="0">
                     <tr>
                         <td height="650" valign="top">

                             <table width="100%" border="0">

                                 <tr>
                                     <td><strong>Name of Student: {{ $student->full_name }} </strong></td>
                                     <td><strong>  Matric. No.: {{ $academic->mat_no }} </strong></td>
                                 </tr>
                                 <tr>
                                     <td><strong>Faculty: {{ $academic->college()->name }} </strong></td>
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


                             <table width="100%" height="87" border="1" cellpadding="0" cellspacing="0">
                                 <tr>
                                     <td colspan="3" align="center"><strong>ACADEMIC SESSION</strong>: {{ $session->name }}</td>
                                     <td colspan="1" align="center"><strong>LEVEL</strong>: {{ $academic->level }} </td>
                                     <td colspan="1"><strong>SEMESTER</strong>: {{ $session->semesterName($semester) }}</td>
                                 </tr>
                                 <tr>
                                     <td width="5%"><div align="center"><span style="font-weight: bold">S/N</span></div></td>
                                     <td width="15%"><div align="center"><span style="font-weight: bold">Course Code </span></div></td>
                                     <td width="40%"><div align="center"><span style="font-weight: bold">Course Title </span></div></td>
                                     <td width="10%"><div align="center"><span style="font-weight: bold">Credit Unit </span></div></td>
                                     <td width="20%"><div align="center"><span style="font-weight: bold">Remark</span></div></td>
                                 </tr>
                                 @foreach ($results as $key => $result)

                                     <tr>
                                         <td width="5%"><div align="center"><span style="font-weight: bold">{{ $loop->iteration }} </span></div></td>
                                         <td width="15%"><div align="center"><span style="font-weight: bold">{{ $result->programCourse->course->code }} </span></div></td>
                                         <td width="50%"><div align="center"><span style="font-weight: bold">{{ $result->programCourse->course->title }} </span></div></td>
                                         <td width="10%"><div align="center"><span style="font-weight: bold">{{ $result->programCourse->hours }} </span></div></td>
                                         <td width="20%"><div align="center"><span style="font-weight: bold"> </span></div></td>
                                     </tr>
                                 @endforeach

                                 <tr>
                                     <td width="5%"><div align="center"><span style="font-weight: bold"> </span></div></td>
                                     <td width="15%"><div align="center"><span style="font-weight: bold"> </span></div></td>
                                     <td width="50%"><div align="center"><span style="font-weight: bold">Total </span></div></td>
                                     <td width="10%"><div align="center"><span style="font-weight: bold">{{ $total }} </span></div></td>
                                     <td width="20%"><div align="center"><span style="font-weight: bold"> </span></div></td>
                                 </tr>


                             </table>


                             </td>
                     </tr>
                 </table>

                 <div class="card-footer">
                     <a class="btn btn-info" href="{{ route('student.course-form',base64_encode($registration->id)) }}" target="_blank"> <i class="fa fa-eye"></i> Print Form </a>
                 </div>

            </div>


























          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('pagescript')
<script src="<?php echo asset('dist/js/bootbox.min.js')?>"></script>

    @endsection


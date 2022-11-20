@extends('layouts.mini')



@section('pagetitle') List Security Permissions  @endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('rbac-open') menu-open @endsection

@section('rbac') active @endsection

<!-- Page -->
 @section('list-perms') active @endsection

 <!-- End Sidebar links -->



@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">
           <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                  List all Permissions
                    </h1>


            <div class="card">


             <div class="table-responsive card-body">

						<table class="table table-striped">
						  <thead>

							  <th>S/N</th>
							  {{--  <th>Data Id</th>  --}}
                              <th>Name</th>
							 <th>Description</th>
							 <th>Action</th>



						  </thead>


						  <tbody>

						  @foreach ($perms as $key => $perm)

							<tr>
							  <td>{{ $loop->iteration }}</td>
							  {{--  <td>{{ $perm->id }}</td>  --}}
                                <td>{{ $perm->name }}</td>
							 <td>{{ $perm->description }}</td>

							 <td><a class="btn btn-warning" href="{{ route('rbac.edit-perm',$perm->id) }}"> <i class="fa fa-edit"></i> Edit </td>


							</tr>

							@endforeach

						  </tbody>



						</table>
						 {!! $perms->render() !!}


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




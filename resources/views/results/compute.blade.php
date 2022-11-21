@php

if(!session('adminId'))
{

  header('location: /adminLogin');
  exit;
}
@endphp
@extends('layouts.app')

@section('content')

<!-- Page Wrapper -->
<div id="wrapper">

    @include('layouts.sidebar')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Begin Page Content -->
        <div class="container-fluid p-5">

            <!-- Page Heading -->
            <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h5 mb-2 p-2 fw-bold text-capitalize text-success">Administrator Dashboard</h1>
            </div> -->

            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="body">
                                <h4 class="card-title mb-4">
                                    Compute Result
                                </h4>
                                @if($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">
                                            {{ $error }}
                                        </div>
                                    @endforeach
                                @endif
                                @if (session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                <form action="" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="program">Program</label>
                                        <select name="program_id" id="program" class="form-control">
                                            <option value="">Select Programme</option>
                                            @foreach ($programs as $program)
                                                <option value="{{ $program->id }}">{{ $program->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="session">Session</label>
                                        <select name="session" id="session" class="form-control">
                                            <option value="">Select Session</option>
                                            @foreach ($sessions as $session)
                                                <option value="{{ $session->id }}" {{ $session->status == 1 ? 'selected' : '' }}>{{ $session->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="level">Level</label>
                                        <select name="level" id="level" class="form-control">
                                            <option value="">Select Level</option>
                                            @for($i = 100; $i <= 600; $i += 100)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="semester">Semester</label>
                                        <select name="semester" id="semester" class="form-control">
                                            <option value="">Select Semester</option>
                                            @for($i = 1; $i < 3; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Compute</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Footer -->
            <!--  -->
            <!-- End of Footer -->

        </div>

    </div>
    <!-- End of Content Wrapper -->

    @endsection

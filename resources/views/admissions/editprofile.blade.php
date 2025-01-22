@extends('layouts.adminsials')

@section('pagetitle')
Home
@endsection

<!-- Sidebar Links -->
<!-- Treeview -->
@section('student-open')
menu-open
@endsection

@section('student')
active
@endsection

<!-- Page -->
@section('home')
active
@endsection
<!-- End Sidebar links -->

@section('content')
<div class="content-wrapper bg-white">
    <section class="content p-5">

        @if (session('signUpMsg'))
        {!! session('signUpMsg') !!}
        @endif

        <div class="card p-5 shadow">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active text-success fw-bold text-capitalize" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Biodata</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-success fw-bold text-capitalize" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Sponsor Information</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-success fw-bold text-capitalize" id="profile2-tab" data-bs-toggle="tab" data-bs-target="#profile2-tab-pane" type="button" role="tab" aria-controls="profile2-tab-pane" aria-selected="false">Academic Record</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-success fw-bold text-capitalize" id="profile3-tab" data-bs-toggle="tab" data-bs-target="#profile3-tab-pane" type="button" role="tab" aria-controls="profile3-tab-pane" aria-selected="false">Uploaded Documents</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-success fw-bold text-capitalize" id="profile4-tab" data-bs-toggle="tab" data-bs-target="#profile4-tab-pane" type="button" role="tab" aria-controls="profile4-tab-pane" aria-selected="false">Password</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab">
                    <form method="POST" action="/editbiodata" enctype="multipart/form-data" class="p-3">
                        @csrf
                        <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="item-label mb-2">
                                        Passport Photo
                                    </div>
                                    <div class="rounded-circle">
                                        <img class="rounded-circle p-3 mx-auto d-block" src="data:image/jpeg;base64,{{$applicantsDetails ->passport}}" alt="Applicant Passport" style="height: 180px; width:200px;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">

                            @if (session('statusMsg'))
                            {!! session('statusMsg') !!}
                            @endif
                            <label for="passport">{{ __('Upload Passport Photograph') }} </label>

                            <div class="form-group">
                                <input id="passport" type="file" class="form-control" name="passport">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('Surname') }} </label>
                            <input id="surname" type="text" class="form-control" value="{{$applicantsDetails -> surname}}" name="surname" placeholder="{{$applicantsDetails -> surname}}" autofocus readonly>
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('First Name') }} </label>
                            <input id="first_name" type="text" class="form-control" value="{{$applicantsDetails -> first_name}}" name="first_name" autofocus readonly>
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('Other Name') }} </label>
                            <input id="middle_name" type="text" class="form-control" value="{{$applicantsDetails -> middle_name}}" name="middle_name"  autofocus readonly>
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('Email') }} </label>
                            <input id="email" type="email" class="form-control" value="{{$applicantsDetails -> email}}" name="email" autofocus readonly>
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('Phone') }} </label>
                            <input id="phone" type="phone" class="form-control" value="{{$applicantsDetails -> phone}}" name="phone" autocomplete="phone" autofocus>
                        </div>



                        <div class="form-group">
                            <label for="">{{ __('Gender:') }} </label>
                            <select class="form-select text-lg col-12" name="gender">
                                <option value="{{$applicantsDetails -> gender}}">{{$applicantsDetails -> gender}}</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>



                        <div class="form-group">
                            <label for="dob">{{ __('Date of Birth') }}:{{$applicantsDetails -> dob}}</label>
                            <input id="dob" type="date" class="form-control" value="{{$applicantsDetails -> dob}}" name="dob" required>
                        </div>



                        <div class="form-group">
                            <label for="">{{ __('State of Origin') }} </label>
                            <input id="state_origin" type="text" class="form-control" name="state_origin" value="{{$applicantsDetails -> state_origin}} ">
                        </div>

                        <div class="form-group">
                            <label for="">{{ __('Local Area Governemt') }} </label>
                            <input id="lga" type="text" class="form-control" name="lga" required value=" {{$applicantsDetails -> lga}}">
                        </div>

                        <div class="form-group">
                            <label for="">{{ __('Address') }} </label>
                            <input id="address" type="text" class="form-control" name="address" value="{{$applicantsDetails -> address}}">
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-success mt-5">
                                {{ __('Update') }}
                            </button>
                        </div>

                    </form>
                </div>

                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab">
                    {{-- 2nd table div  --}}
                    <form method="POST" action="/editsponsers" class="p-3">
                        @csrf
                        <div class="form-group">
                            <label for="">{{ __(' Name') }} </label>
                            <input id="fname" type="text" name="sponsor_surname" class="form-control" value="{{ $applicantsDetails->sponsor_surname }} " autofocus>
                        </div>
                          <div class="form-group">
                            <label for="">{{ __(' Name') }} </label>
                            <input id="fname" type="text" name="sponsor_othername" class="form-control" value="{{ $applicantsDetails->sponsor_othername }}" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="">{{ __('Phone No.') }} </label>
                            <input id="phone" type="text" name="sponsors_phone" class="form-control" value="{{$applicantsDetails -> sponsors_phone}}" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="">{{ __('Sponsor email') }} </label>
                            <input id="foccupation" type="text" name="sponsors_email" class="form-control" value="{{$applicantsDetails -> sponsors_email}}" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="">{{ __('Address') }} </label>
                            <input id="address" type="text" class="form-control" name="sponsors_address" value="{{$applicantsDetails -> sponsors_address}}">
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="profile4-tab-pane" role="tabpanel" aria-labelledby="profile4-tab">

                    <form method="POST" action="/editpassword" class="p-3">
                        @csrf
                        <input id="email" type="hidden" class="form-input form-control" name="email" value="{{$applicantsDetails -> email}}">
                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="New Password" autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password" autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>

                </div>

                <div class="tab-pane fade" id="profile2-tab-pane" role="tabpanel" aria-labelledby="profile2-tab">

                    <form method="POST" action="/editutmejamb" class="p-3">
                        @csrf
                        <div class="form-group">
                            <label for="refferal">{{ __('Admission Type') }} </label>
                            <input id="score" type="text" name="admission_typ" class="form-control" value="{{ $applicantsDetails->admission_type }}" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="refferal">{{ __('Course of Study') }} </label>
                            <select class="form-select" name="course_program">
                                <option value="{{ $applicantsDetails->course_program }}}">{{ $applicantsDetails->course_program }}</option>
                                {{--  @foreach($programs as $program)
                                <option value="{{$program->name}}">{{$program->name}}</option>
                                @endforeach  --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="refferal">{{ __('School Attended') }} </label>
                            <input id="school_attended" type="text" name="school_attended" class="form-control" value="{{ $applicantsDetails->school_attended }}" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="refferal">{{ __('Certificates Obtained') }} </label>
                            <input id="certificates_obtained" type="text" name="certificates_obtained" class="form-control" value="{{ $applicantsDetails->certificates_obtained	 }}" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="refferal">{{ __('Previous Reaearch Topic') }} </label>
                            <input id="pr_topic" type="text" name="pr_topic" class="form-control" value="{{ $applicantsDetails->pr_topic }}" autofocus>
                        </div>

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="profile3-tab-pane" role="tabpanel" aria-labelledby="profile3-tab">

                    <form method="POST" action="/editutmeuploads" enctype="multipart/form-data" class="p-3">
                        @csrf
                        <div class="row">
                            <div class="col"> <img class="mx-auto d-block" src="data:image/jpeg;base64,{{ $applicantsDetails->olevel1 }}" alt="Transcipt" style="height: 300px; width:300px;" /></div>
                            <div class="col"> <img class="mx-auto d-block" src="data:image/jpeg;base64,{{ $applicantsDetails->cert }}" alt="Olevel" style="height: 300px; width:300px;" /></div>
                            {{--  <div class="col"> <img class=" mx-auto d-block" src="data:image/jpeg;base64,{{ $applicantsDetails->olevel2 }}" alt="" style="height: 300px; width:300px;" /></div>  --}}
                        </div>
                        <div class="form-group">

                                @if (session('statusMsg'))
                                {!! session('statusMsg') !!}
                                @endif
                                <label for="passport">{{ __('certificate :') }}
                                    {{-- <b class="text-danger"> (Picture format)</b>  --}}
                                </label>

                                <div class="form-group">
                                    <input id="jamb" type="file" class="form-control" name="cert">
                                </div>
                            </div>




                            <div class="form-group">
                                <label>{{ __('Upload Olevel Result:') }}</label>

                                <div class="form-group">
                                    <input id="olevel1" type="file" class="form-control" name="olevel1">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">

                                    {{-- @if (session('signUpMsg'))
                                                                {!! session('signUpMsg') !!}
                                                            @endif --}}
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>


         </form>
                </div>
            </div>
        </div>

    </section>
</div>

@endsection

@section('pagescript')
<!-- External JavaScripts
            ============================================= -->
<script src="{{ asset('js/jquery.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('dist/js/components/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap File Upload Plugin -->
<script src="{{ asset('dist/js/components/bs-filestyle.js') }}"></script>

<script src="{{ asset('js/jquery.js') }}"></script>

<!-- bootstrap datepicker -->
<script src="{{ asset('dist/js/components/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap File Upload Plugin -->
<script src="{{ asset('dist/js/components/bs-filestyle.js') }}"></script>


<script>
    $(document).ready(function() {
        $('#myTab a').on('click', function(e) {
            e.preventDefault();
            $(this).tab('show');
        });
    });
</script>

<script type="text/javascript">
    $(document).on('ready', function() {

        $("#passport").fileinput({
            mainClass: "input-group-md",
            showUpload: false,
            previewFileType: "image",
            browseClass: "btn btn-success",
            browseLabel: "Pick Image",
            browseIcon: "<i class=\"fas fa-user\"></i>",
            removeClass: "btn btn-danger",
            removeLabel: "Delete",
            removeIcon: "<i class=\"icon-trash\"></i> ",
            allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
            elErrorContainer: "#errorBlock"
        });

    });
</script>

<script type="text/javascript">
    $(document).on('ready', function() {

        $("#jamb").fileinput({
            mainClass: "input-group-md",
            showUpload: false,
            previewFileType: "image",
            browseClass: "btn btn-success",
            browseLabel: "Pick Image",
            browseIcon: "<i class=\"fas fa-file-upload\"></i>",
            removeClass: "btn btn-danger",
            removeLabel: "Delete",
            removeIcon: "<i class=\"icon-trash\"></i> ",
            allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
            elErrorContainer: "#errorBlock"
        });
    });
</script>

<script type="text/javascript">
    $(document).on('ready', function() {

        $("#olevel1").fileinput({
            mainClass: "input-group-md",
            showUpload: false,
            previewFileType: "image",
            browseClass: "btn btn-success",
            browseLabel: "Pick Image",
            browseIcon: "<i class=\"fas fa-file-upload\"></i>",
            removeClass: "btn btn-danger",
            removeLabel: "Delete",
            removeIcon: "<i class=\"icon-trash\"></i> ",
            allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
            elErrorContainer: "#errorBlock"
        });
    });
</script>

<script type="text/javascript">
    $(document).on('ready', function() {

        $("#olevel2").fileinput({
            mainClass: "input-group-md",
            showUpload: false,
            previewFileType: "image",
            browseClass: "btn btn-success",
            browseLabel: "Pick Image",
            browseIcon: "<i class=\"fas fa-file-upload\"></i>",
            removeClass: "btn btn-danger",
            removeLabel: "Delete",
            removeIcon: "<i class=\"icon-trash\"></i> ",
            allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
            elErrorContainer: "#errorBlock"
        });
    });
</script>
@endsection

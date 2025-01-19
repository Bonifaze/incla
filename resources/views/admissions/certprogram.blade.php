@extends('layouts.adminsials')
{{-- @extends('layouts.formstyle')  --}}

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
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="dashboard-body">


                <div class="page-content">
                    <div class="form-v10-content">
                        <form class="form-detail" action="#" method="post" id="myform">
                            <div class="form-left">
                                <h2>General Infomation</h2>
                                {{-- <div class="form-row">
						<select name="title">
						    <option class="option" value=" " disabled selected>Title</option>
						    <option class="option" value="dr">Dr.</option>
						    <option class="option" value="prof">Prof.</option>
						    <option class="option" value="rev">Rev.</option>
						    <option class="option" value="revfr">Rev. Fr.</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>  --}}
                                <div class="form-group">
                                    <div class="form-row form-row-1">

                                        <input type="text" name="surname" id="" class="input-text" placeholder="{{ session('userssurname')}} " required readonly>
                                    </div>
                                    <div class="form-row form-row-2">
                                        <input type="text" name="first_name" id="first_name" class="input-text" placeholder="{{ session('usersFirstName')}}" required readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row form-row-1">
                                        <select name="title" required>
                                            <option class="option" value=" " disabled selected>Title</option>
                                            <option class="option" value="dr">Dr.</option>
                                            <option class="option" value="prof">Prof.</option>
                                            <option class="option" value="rev">Rev.</option>
                                            <option class="option" value="revfr">Rev. Fr.</option>
                                        </select>
                                        <span class="select-btn">
                                            <i class="zmdi zmdi-chevron-down"></i>
                                        </span>
                                    </div>
                                    <div class="form-row form-row-2">
                                        <select name="Gender" required>
                                            <option value="" disabled selected >Select Gender</option>
                                            <option value="m">Male</option>
                                            <option value="f">Female</option>
                                        </select>
                                        <span class="select-btn">
                                            <i class="zmdi zmdi-chevron-down"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row form-row-1">
                                        <input type="date" name="dob" id="dob" class="input-date" required>
                                    </div>
                                    <div class="form-row form-row-2">
                                        <select name="Language">
                                            <option value=" ">Select Langauge spoken</option>
                                            <option value="employees">English</option>
                                            <option value="trainee">Hausa</option>
                                            <option value="colleague">Igbo</option>
                                            <option value="associate">Yoruba</option>
                                        </select>
                                        <span class="select-btn">
                                            <i class="zmdi zmdi-chevron-down"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <select name="admission-type" id="admission-type" onchange="updateCredentialInputs()">
                                        <option value=" " disabled selected >Type Amission </option>
                                        <option value="lcl">Licentiate</option>
                                        <option value="diploma">Diploma Programs </option>
                                        <option value="cert">Certificate Programs</option>
                                    </select>

                                    <span class="select-btn">
                                        <i class="zmdi zmdi-chevron-down"></i>
                                    </span>
                                </div>
                                <div class="form-row">
                                    <input type="text" name="congregation" class="congregation" id="congregation" placeholder="Congregation" required>
                                </div>
                                <div class="form-row">
                                    <input type="text" name="address" class="address" id="address" placeholder="Contact Address" required>
                                </div>


                                <h2>Sponsors Infomation</h2>

                                <div class="form-group">
                                    <div class="form-row form-row-1">

                                        <input type="text" name="sponsorsfn" id="" class="input-text" placeholder="Sponsors First Name " required>
                                    </div>
                                    <div class="form-row form-row-2">
                                        <input type="text" name="sponsorsn" id="first_name" class="input-text" placeholder="Sponsors Surname" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row form-row-1">
                                        <input type="text" name="code" class="code" id="code" placeholder="Code +" required>
                                    </div>
                                    <div class="form-row form-row-2">
                                        <input type="text" name="phone" class="phone" id="phone" placeholder="Phone Number" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <input type="text" name="address" class="address" id="address" placeholder="Contact Address" required>
                                </div>

                            </div>
                            <div class="form-right " id="credentials-section">
                                <h2>Credentials Upload Section</h2>

                                <div class="form-checkbox">
                                    <label class="container">
                                        <p>I do accept the <a href="#" class="text">Terms and Conditions</a> of your site.</p>
                                        <input type="checkbox" name="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-row-last">
                                    <input type="submit" name="submit" class="register" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
@endsection

@section('pagescript')
<script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>

<script>
    // Define dynamic inputs for each admission type
    const admissionTypes = {
        lcl: [
            {
                name: "lcl_type",
                placeholder: "Select Licentiate Type",
                options: [
                    { value: "lcl", label: "LCL - Licentiate in Theology of Consecrated Life" }
                ]
            },
            { name: "school_attended", placeholder: "School Attended" },
            { name: "certificates_obtained", placeholder: "Certificates Obtained" },
            { name: "previous_research", placeholder: "Previous Research Topic" },
            { name: "upload_waec", placeholder: "Upload WAEC Results", type: "file" },
            { name: "upload_degree", placeholder: "Upload Degree Certificate", type: "file" },
            { name: "upload_birth", placeholder: "Upload Birth Certificate", type: "file" },
            { name: "upload_passport", placeholder: "Upload Passport", type: "file" }
        ],
        diploma: [
            {
                name: "diploma_type",
                placeholder: "Type of Diploma",
                options: [
                    { value: "dbt", label: "DBT - Diploma in Basic Theology" },
                    { value: "dff", label: "DFF - Diploma in Formation of Formators" },
                    { value: "dsd", label: "DSD - Diploma in Spiritual Direction" },
                    { value: "dcl", label: "DCL - Diploma in Theology of Consecrated Life" }
                ]
            },
            { name: "school_attended", placeholder: "School Attended" },
            { name: "certificates_obtained", placeholder: "Certificates Obtained" },
            { name: "upload_waec", placeholder: "Upload WAEC Results", type: "file" },
            { name: "upload_birth", placeholder: "Upload Birth Certificate", type: "file" },
            { name: "upload_passport", placeholder: "Upload Passport", type: "file" }
        ],
        cert: [
            {
                name: "certificate_type",
                placeholder: "Type of Certificate",
                options: [
                    { value: "cbt", label: "CBT - Certificate in Basic Theology" },
                    { value: "cff", label: "CFF - Certificate in Formation of Formators" },
                    { value: "csd", label: "CSD - Certificate in Spiritual Direction" },
                    { value: "ccf", label: "CCF - Certificate in Chapter Facilitation" },
                    { value: "cfp", label: "CFP - Certificate in Fundraising & Project Management" }
                ]
            },
            { name: "upload_waec", placeholder: "Upload WAEC Results", type: "file" },
            { name: "upload_birth", placeholder: "Upload Birth Certificate", type: "file" },
            { name: "upload_passport", placeholder: "Upload Passport", type: "file" }
        ]
    };

    function updateCredentialInputs() {
        const selectedType = document.getElementById("admission-type").value;
        const credentialsSection = document.getElementById("credentials-section");

        credentialsSection.innerHTML = `<h2>Credentials Upload Section</h2>`; // Clear existing inputs

        if (admissionTypes[selectedType]) {
            admissionTypes[selectedType].forEach(input => {
                const inputRow = document.createElement("div");
                inputRow.className = "form-row";

                if (input.options) {
                    inputRow.innerHTML = `
                        <label>${input.placeholder}</label>
                        <select name="${input.name}">
                            <option value="">${input.placeholder}</option>
                            ${input.options.map(option => `<option value="${option.value}">${option.label}</option>`).join("")}
                        </select>
                    `;
                } else if (input.type === "file") {
                    inputRow.innerHTML = `
                        <label>${input.placeholder}</label>
                        <input type="file" name="${input.name}" onchange="previewFile(this)">
                        <div id="${input.name}_preview" class="file-preview"></div>
                    `;
                } else {
                    inputRow.innerHTML = `
                        <input type="text" name="${input.name}" class="input-text" placeholder="${input.placeholder}" required>
                    `;
                }

                credentialsSection.appendChild(inputRow);
            });
        }

        // Re-add terms and conditions and submit button
        credentialsSection.innerHTML += `
            <div class="form-checkbox">
                <label class="container">
                    <p>I do accept the <a href="#" class="text">Terms and Conditions</a> of your site.</p>
                    <input type="checkbox" name="checkbox" required>
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="form-row-last">
                <input type="submit" name="submit" class="register" value="Submit">
            </div>
        `;
    }

    function previewFile(input) {
        const previewDiv = document.getElementById(`${input.name}_preview`);
        previewDiv.innerHTML = "";
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => {
                previewDiv.innerHTML = `<img src="${e.target.result}" alt="File Preview" style="max-width: 100px; max-height: 100px;">`;
            };
            reader.readAsDataURL(file);
        }
    }
</script>



@endsection

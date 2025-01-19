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
                                    </div>
                                    <div class="form-row form-row-2">
                                        <select name="Gender">
                                            <option value="">Select Gender</option>
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
                                        <select name="dob">
                                            <option class="option" value=" " disabled selected>Date of Birth</option>

                                        </select>
                                        <span class="select-btn">
                                            <i class="zmdi zmdi-chevron-down"></i>
                                        </span>
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
                                        <option value="">Select Type of Admission</option>
                                        <option value="dbt">DBT - Diploma in Basic Theology</option>
                                        <option value="dff">DFF - Diploma in Formation of Formators</option>
                                    </select>
                                </div>


                                {{--  <div class="form-row">
                                    <select name="languages[]" id="languages" multiple>
                                        <!-- Populated dynamically by JavaScript -->
                                    </select>
                                </div>  --}}



                                <div class="form-row">
                                    <select name="diplomas">
                                        <option value=" ">Type of Diploma </option>
                                        <option value="dbt"> DBT- Diploma in Basic Theology</option>
                                        <option value="dff">DFF- Diploma in Formation of Formators</option>
                                        <option value="dsd">DSD- Diploma in Spiritual Direction</option>
                                        <option value="dcl">DCL- Diploma in Theology of Consecrated Life</option>
                                    </select>

                                    <span class="select-btn">
                                        <i class="zmdi zmdi-chevron-down"></i>
                                    </span>
                                </div>

                                <div class="form-row">
                                  <select name="certificates">
                                        <option value=" ">Type Certificate</option>
                                        <option value="cbt">  CBT- Certificate in Basic Theology</option>
                                        <option value="cff">CFF- Certificate in Formation of Formators</option>
                                        <option value="csd">CSD- Certificate in Spiritual Direction</option>
                                        <option value="ccf">CCF- Certificate in Chapter Facilitation</option>
                                        <option value="cfp">CFP- Certificate in Fundraising & Project Mgt</option>
							        </select>
                                    <span class="select-btn">
                                        <i class="zmdi zmdi-chevron-down"></i>
                                    </span>
                                </div>
                                <div class="form-row">
                                  <select name="lcl">
                                        <option value="lcl">LCL- Licentiate in Theology of Consecrated Life</option>
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

                                        <input type="text" name="sponsorsfn" id="" class="input-text" placeholder="Sponsors First Name " required >
                                    </div>
                                    <div class="form-row form-row-2">
                                        <input type="text" name="sponsorsn" id="first_name" class="input-text" placeholder="Sponsors Surname" required >
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
                            {{--  <div class="form-right">
                                <h2>Contact Details</h2>
                                <div class="form-row">
                                    <input type="text" name="street" class="street" id="street" placeholder="Street + Nr" required>
                                </div>
                                <div class="form-row">
                                    <input type="text" name="additional" class="additional" id="additional" placeholder="Additional Information" required>
                                </div>
                                <div class="form-group">
                                    <div class="form-row form-row-1">
                                        <input type="text" name="zip" class="zip" id="zip" placeholder="Zip Code" required>
                                    </div>
                                    <div class="form-row form-row-2">
                                        <select name="place">
                                            <option value="place">Place</option>
                                            <option value="Street">Street</option>
                                            <option value="District">District</option>
                                            <option value="City">City</option>
                                        </select>
                                        <span class="select-btn">
                                            <i class="zmdi zmdi-chevron-down"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <select name="country">
                                        <option value="country">Country</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="India">India</option>
                                    </select>
                                    <span class="select-btn">
                                        <i class="zmdi zmdi-chevron-down"></i>
                                    </span>
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
                                    <input type="text" name="your_email" id="your_email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Your Email">
                                </div>
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
                            </div>  --}}

                             <div class="form-right" id="credentials-section">
                                <h2>Credentials</h2>
                                <!-- Inputs will be dynamically adjusted based on admission type -->
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
        dbt: [
            { name: "school_attended", placeholder: "School Attended" },
            { name: "certificates_obtained", placeholder: "Certificates Obtained" },
            { name: "previous_research", placeholder: "Previous Research Topic" },
            { name: "upload_waec", placeholder: "Upload WAEC Results", type: "file" },
            { name: "upload_degree", placeholder: "Upload Degree Certificate", type: "file" },
            { name: "upload_birth", placeholder: "Upload Birth Certificate", type: "file" },
            { name: "upload_passport", placeholder: "Upload Passport", type: "file" }
        ],
        dff: [

            { name: "upload_waec", placeholder: "Upload WAEC Results", type: "file" },
            { name: "upload_degree", placeholder: "Upload Degree Certificate", type: "file" },
            { name: "upload_birth", placeholder: "Upload Birth Certificate", type: "file" },
            { name: "upload_passport", placeholder: "Upload Passport", type: "file" }
        ]
    };

    // Function to update credential inputs based on admission type
    function updateCredentialInputs() {
        const selectedType = document.getElementById("admission-type").value;
        const credentialsSection = document.getElementById("credentials-section");

        // Clear existing inputs
        credentialsSection.innerHTML = "<h2>Credentials</h2>";

        // Add inputs for the selected admission type
        if (admissionTypes[selectedType]) {
            admissionTypes[selectedType].forEach(input => {
                const inputRow = document.createElement("div");
                inputRow.className = "form-row";

                if (input.type === "file") {
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
    }

    // File preview function
    function previewFile(input) {
        const previewDiv = document.getElementById(`${input.name}_preview`);
        previewDiv.innerHTML = ""; // Clear existing previews

        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => {
                previewDiv.innerHTML = `<img src="${e.target.result}" alt="File Preview" style="max-width: 100px; max-height: 100px;">`;
            };
            reader.readAsDataURL(file);
        }
    }

    // Populate language select with prioritized Nigerian languages
    {{--  function populateLanguages() {
        const languages = [
            "English", "Hausa", "Igbo", "Yoruba", "French", "Arabic", "Fulfulde",
            "Kanuri", "Tiv", "Ebira", "Idoma", "Nupe", "Urhobo", "Edo", "Ijaw"
        ];
        const languageSelect = document.getElementById("languages");

        languages.sort((a, b) => {
            const nigerianLanguages = ["Hausa", "Igbo", "Yoruba"];
            if (nigerianLanguages.includes(a) && !nigerianLanguages.includes(b)) return -1;
            if (!nigerianLanguages.includes(a) && nigerianLanguages.includes(b)) return 1;
            return a.localeCompare(b);
        });

        languages.forEach(lang => {
            const option = document.createElement("option");
            option.value = lang.toLowerCase();
            option.textContent = lang;
            languageSelect.appendChild(option);
        });
    }  --}}

    // Initialize on page load
    document.addEventListener("DOMContentLoaded", () => {
        populateLanguages();
    });
</script>


@endsection

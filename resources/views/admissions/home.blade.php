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


                @if (session('signUpMsg'))
                {!! session('signUpMsg') !!}
                @endif
                <div class="page-content">

                    <div class="form-v10-content">
                        <form class="form-detail" action="{{ route('form.submit') }}" enctype="multipart/form-data" method="post" id="myform">
                            @csrf
                            <div class="form-left">
                                <h2>General Infomation</h2>
                                <div class="form-group">
                                    <div class="form-row form-row-1">

                                        <label for="surname">Surname </label>
                                        <input type="text" name="surname" id="surname" class="input-text @error('surname') is-invalid @enderror" placeholder="{{ session('userssurname')}} " required readonly autofocus>
                                    </div>
                                    <div class="form-row form-row-2">

                                        <label for="firstname">Other Name</label>
                                        <input type="text" name="first_name" id="first_name" class="input-text" placeholder="{{ session('usersFirstName')}}  {{ session('usersMiddleName')}}" required readonly autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row form-row-1">
                                        <label for="title">Title </label>
                                        <input type="text" name="title" id="title" class="input-text @error('title') is-invalid @enderror" placeholder="Title ">
                                    </div>
                                    <div class="form-row form-row-2">
                                        <label for="gender">Gender </label>
                                        <select name="gender" required>
                                            <option value="" disabled selected>Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <span class="select-btn">
                                            <i class="zmdi zmdi-chevron-down"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-row form-row-1">
                                        <label for="dob">Date Of Birth</label>
                                        <input type="date" name="dob" id="dob" class="input-date" required>
                                    </div>


                                    <div class="form-row form-row-2">
                                        <label for="title">Language Spoken </label>
                                        <input type="text" name="lang_spoken" id="lang_spoken" class="input-text @error('lang_spoken') is-invalid @enderror" placeholder="English, French etc ">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <!-- Blood Group Dropdown -->
                                    <div class="form-row form-row-1">
                                        <label for="bld">Blood Group</label>
                                        <select name="blood_group" id="bld" class="input-text @error('bld') is-invalid @enderror" required>
                                            <option value="" disabled selected>Select Blood Group</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                        </select>
                                        @error('bld')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Genotype Dropdown -->
                                    <div class="form-row form-row-2">
                                        <label for="genotype">Genotype</label>
                                        <select name="genotype" id="genotype" class="input-text @error('genotype') is-invalid @enderror" required>
                                            <option value="" disabled selected>Select Genotype</option>
                                            <option value="AA">AA</option>
                                            <option value="AS">AS</option>
                                            <option value="SS">SS</option>
                                            <option value="AC">AC</option>
                                        </select>
                                        @error('genotype')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="form-row form-row-1 @if ($errors->has('state_origin')) has-error @endif">
                                        <label for="state-origin">State of Origin</label>
                                        <div id="state-origin-group">
                                            <select name="state_origin" id="state-origin" onchange="updateLGA()">
                                                <option value="" disabled selected>Pick a State</option>
                                            </select>
                                        </div>
                                        <span class="select-btn">
                                            <i class="zmdi zmdi-chevron-down"></i>
                                        </span>
                                        @if ($errors->has('state_origin'))
                                        <span class="text-danger">{{ $errors->first('state_origin') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-row form-row-2 @if ($errors->has('lga')) has-error @endif">
                                        <label for="lga">Local Govt Area</label>
                                        <div id="lga-group">
                                            <select name="lga" id="slga">
                                                <option value="" disabled selected>Pick an LGA</option>
                                            </select>
                                        </div>
                                        <span class="select-btn">
                                            <i class="zmdi zmdi-chevron-down"></i>
                                        </span>
                                        @if ($errors->has('lga'))
                                        <span class="text-danger">{{ $errors->first('lga') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-row">
                                    <label for="admission_types">Choose Admission Type</label>
                                    <select name="admission-type" id="admission-type" onchange="updateCredentialInputs()">
                                        <option value=" " disabled selected>Type of Amission </option>
                                        <option value="Licentiate">Licentiate</option>
                                        <option value="Diploma">Diploma Programs </option>
                                        <option value="Certificate">Certificate Programs</option>
                                    </select>

                                    <span class="select-btn">
                                        <i class="zmdi zmdi-chevron-down"></i>
                                    </span>
                                </div>
                                <div class="form-row">
                                    <label for="congregation"> Your Congregation</label>
                                    <input type="text" name="congregation" class="congregation" id="congregation" placeholder="Congregation" required>
                                </div>
                                <div class="form-row">
                                    <label for="address"> Address</label>
                                    <input type="text" name="address" class="address" id="address" placeholder="Contact Address" required>
                                </div>


                                <h2>Sponsors Infomation</h2>

                                <div class="form-group">

                                    <div class="form-row form-row-1">
                                        <label for="sponsorssn"> Surname</label>
                                        <input type="text" name="sponsor_surname" id="first_name" class="input-text" placeholder="Sponsors Surname" required>
                                    </div>
                                    <div class="form-row form-row-2">
                                        <label for="sponsorsfn"> OtherNames</label>
                                        <input type="text" name="sponsor_othername" id="" class="input-text" placeholder="Sponsors Other Name " required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row form-row-1">
                                        <label for="sponsors_fn"> Email</label>
                                        <input type="email" name="sponsor_email" class="email" id="semail" placeholder="Sponsors Email">
                                    </div>

                                    <div class="form-row form-row-2">
                                        <label for="sponsors_fn">Phone Number</label>
                                        <input type="text" name="sponsor_phone" class="phone" id="phone" placeholder="Phone Number" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <label for="sponsors_address"> Address</label>
                                    <input type="text" name="sponsor_address" class="sponsor_address" id="sponsor_address" placeholder="Sponsors Address">
                                </div>

                            </div>
                            <div class="form-right " id="credentials-section">
                                <h2>Credentials Upload Section</h2>
                                <script>
                                    const admissionTypes = {
                                        Licentiate: [{
                                                name: "course_program"
                                                , placeholder: "Select Licentiate Type"
                                                , options: [{
                                                    value: "Licentiate in Theology of Consecrated Life"
                                                    , label: "Licentiate in Theology of Consecrated Life"
                                                }]
                                            }
                                            , {
                                                name: "school_attended"
                                                , placeholder: "School Attended"
                                            }
                                            , {
                                                name: "certificates_obtained"
                                                , placeholder: "Certificates Obtained"
                                            }
                                            , {
                                                name: "pr_topic"
                                                , placeholder: "Previous Research Topic"
                                            }
                                            , {
                                                name: "olevel1"
                                                , placeholder: "Upload Olevel Results"
                                                , type: "file"
                                            }
                                             , {
                                                name: "olevel2"
                                                , placeholder: "Upload Olevel Results (For Result Combination)"
                                                , type: "file"
                                            }
                                            , {
                                                name: "cert"
                                                , placeholder: "Upload Highest Qualification/ Degree Certificate"
                                                , type: "file"
                                            }
                                            , {
                                                name: "passport"
                                                , placeholder: "Upload Passport"
                                                , type: "file"
                                            }
                                            , {
                                                name: "signature"
                                                , placeholder: "Upload Signature"
                                                , type: "file"
                                            }
                                        ]
                                        , Diploma: [{
                                                name: "course_program"
                                                , placeholder: "Type of Diploma"
                                                , options: [{
                                                        value: "Diploma in Basic Theology"
                                                        , label: "Diploma in Basic Theology"
                                                    }
                                                    , {
                                                        value: "Diploma in Formation of Formators"
                                                        , label: "Diploma in Formation of Formators"
                                                    }
                                                    , {
                                                        value: "Diploma in Spiritual Direction"
                                                        , label: "Diploma in Spiritual Direction"
                                                    }
                                                    , {
                                                        value: "Diploma in Theology of Consecrated Life"
                                                        , label: "Diploma in Theology of Consecrated Life"
                                                    }
                                                ]
                                            }
                                            , {
                                                name: "school_attended"
                                                , placeholder: "School Attended"
                                            }
                                            , {
                                                name: "certificates_obtained"
                                                , placeholder: "Certificates Obtained"
                                            }
                                            ,{
                                             name: "cert"
                                                , placeholder: "Upload Highest Qualification/ Degree Certificate"
                                                , type: "file"
                                            }

                                            , {
                                                name: "olevel1"
                                                , placeholder: "Upload Olevel Results"
                                                , type: "file"
                                            }
                                             , {
                                                name: "olevel2"
                                                , placeholder: "Upload Olevel Results (For Result Combination)"
                                                , type: "file"
                                            }
                                            , {
                                                name: "passport"
                                                , placeholder: "Upload Passport"
                                                , type: "file"
                                            }
                                            , {
                                                name: "signature"
                                                , placeholder: "Upload Signature"
                                                , type: "file"
                                            }
                                        ]
                                        , Certificate: [{
                                                name: "course_program"
                                                , placeholder: "Type of Certificate"
                                                , options: [{
                                                        value: "Certificate in Basic Theology"
                                                        , label: "Certificate in Basic Theology"
                                                    }
                                                    , {
                                                        value: "Certificate in Formation of Formators"
                                                        , label: "Certificate in Formation of Formators"
                                                    }
                                                    , {
                                                        value: "Certificate in Spiritual Direction"
                                                        , label: "Certificate in Spiritual Direction"
                                                    }
                                                    , {
                                                        value: "Certificate in  Facilitation and Leadership"
                                                        , label: "Certificate in  Facilitation and Leadership"
                                                    }
                                                    , {
                                                        value: "Certificate in Fundraising & Project Management"
                                                        , label: "Certificate in Fundraising & Project Management"
                                                    }
                                                ]
                                            }
                                            ,{
                                             name: "cert"
                                                , placeholder: "Upload Highest Qualification/ Degree Certificate"
                                                , type: "file"
                                            }
                                            , {
                                                name: "olevel1"
                                                , placeholder: "Upload Olevel Results"
                                                , type: "file"
                                            }
                                             , {
                                                name: "olevel2"
                                                , placeholder: "Upload Olevel Results (For Result Combination)"
                                                , type: "file"
                                            }
                                            , {
                                                name: "passport"
                                                , placeholder: "Upload Passport"
                                                , type: "file"
                                            }
                                            , {
                                                name: "signature"
                                                , placeholder: "Upload Signature"
                                                , type: "file"
                                            }
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



<script type="text/javascript">
    var ngst = [{
            "ID": "0"
            , "Name": "----Choose State----"
        }
        , {
            "ID": "NOT NGN"
            , "Name": "Not a Nigerian"
        }
        , {
            "ID": "Abuja"
            , "Name": "Abuja"
        }
        , {
            "ID": "Abia"
            , "Name": "Abia"
        }
        , {
            "ID": "Adamawa"
            , "Name": "Adamawa"
        }
        , {
            "ID": "Anambra"
            , "Name": "Anambra"
        }
        , {
            "ID": "Akwa Ibom"
            , "Name": "Akwa Ibom"
        }
        , {
            "ID": "Bauchi"
            , "Name": "Bauchi"
        }
        , {
            "ID": "Bayelsa"
            , "Name": "Bayelsa"
        }
        , {
            "ID": "Benue"
            , "Name": "Benue"
        }
        , {
            "ID": "Borno"
            , "Name": "Borno"
        }
        , {
            "ID": "Cross River"
            , "Name": "Cross River"
        }
        , {
            "ID": "Delta"
            , "Name": "Delta"
        }
        , {
            "ID": "Ebonyi"
            , "Name": "Ebonyi"
        }
        , {
            "ID": "Edo"
            , "Name": "Edo"
        }
        , {
            "ID": "Ekiti"
            , "Name": "Ekiti"
        }
        , {
            "ID": "Enugu"
            , "Name": "Enugu"
        }
        , {
            "ID": "Gombe"
            , "Name": "Gombe"
        }
        , {
            "ID": "Imo"
            , "Name": "Imo"
        }
        , {
            "ID": "Jigawa"
            , "Name": "Jigawa"
        }
        , {
            "ID": "Kaduna"
            , "Name": "Kaduna"
        }
        , {
            "ID": "Kano"
            , "Name": "Kano"
        }
        , {
            "ID": "Katsina"
            , "Name": "Katsina"
        }
        , {
            "ID": "kebbi"
            , "Name": "Kebbi"
        }
        , {
            "ID": "Kogi"
            , "Name": "Kogi"
        }
        , {
            "ID": "Kwara"
            , "Name": "Kwara"
        }
        , {
            "ID": "Lagos"
            , "Name": "Lagos"
        }
        , {
            "ID": "Nassarawa"
            , "Name": "Nassarawa"
        }
        , {
            "ID": "Niger"
            , "Name": "Niger"
        }
        , {
            "ID": "Ogun"
            , "Name": "Ogun"
        }
        , {
            "ID": "Ondo"
            , "Name": "Ondo"
        }
        , {
            "ID": "Osun"
            , "Name": "Osun"
        }
        , {
            "ID": "Oyo"
            , "Name": "Oyo"
        }
        , {
            "ID": "Plateau"
            , "Name": "Plateau"
        }
        , {
            "ID": "Rivers"
            , "Name": "Rivers"
        }
        , {
            "ID": "Sokoto"
            , "Name": "Sokoto"
        }
        , {
            "ID": "Taraba"
            , "Name": "Taraba"
        }
        , {
            "ID": "Yobe"
            , "Name": "Yobe"
        }
        , {
            "ID": "Zamfara"
            , "Name": "Zamfara"
        }
    , ];

    var ele = document.getElementById('state');
    for (var i = 0; i < ngst.length; i++) {

        ele.innerHTML = ele.innerHTML +
            '<option value="' + ngst[i]['ID'] + '">' + ngst[i]['Name'] + '</option>';
    }


    function show(ele) {

        $("#slga").empty();
        $('#writew').val('');

        var parts = {
            "Abia": [
                "Aba North"
                , "Aba South"
                , "Arochukwu"
                , "Bende"
                , "Ikwuano"
                , "Isiala-Ngwa North"
                , "Isiala-Ngwa South"
                , "Isuikwato"
                , "Obi Nwa"
                , "Ohafia"
                , "Osisioma"
                , "Ngwa"
                , "Ugwunagbo"
                , "Ukwa East"
                , "Ukwa West"
                , "Umuahia North"
                , "Umuahia South"
                , "Umu-Neochi"
            ]
            , "Adamawa": [
                "Demsa"
                , "Fufore"
                , "Ganaye"
                , "Gireri"
                , "Gombi"
                , "Guyuk"
                , "Hong"
                , "Jada"
                , "Lamurde"
                , "Madagali"
                , "Maiha"
                , "Mayo-Belwa"
                , "Michika"
                , "Mubi North"
                , "Mubi South"
                , "Numan"
                , "Shelleng"
                , "Song"
                , "Toungo"
                , "Yola North"
                , "Yola South"
            ]
            , "Anambra": [
                "Aguata"
                , "Anambra East"
                , "Anambra West"
                , "Anaocha"
                , "Awka North"
                , "Awka South"
                , "Ayamelum"
                , "Dunukofia"
                , "Ekwusigo"
                , "Idemili North"
                , "Idemili south"
                , "Ihiala"
                , "Njikoka"
                , "Nnewi North"
                , "Nnewi South"
                , "Ogbaru"
                , "Onitsha North"
                , "Onitsha South"
                , "Orumba North"
                , "Orumba South"
                , "Oyi"
            ]
            , "Akwa Ibom": [
                "Abak"
                , "Eastern Obolo"
                , "Eket"
                , "Esit Eket"
                , "Essien Udim"
                , "Etim Ekpo"
                , "Etinan"
                , "Ibeno"
                , "Ibesikpo Asutan"
                , "Ibiono Ibom"
                , "Ika"
                , "Ikono"
                , "Ikot Abasi"
                , "Ikot Ekpene"
                , "Ini"
                , "Itu"
                , "Mbo"
                , "Mkpat Enin"
                , "Nsit Atai"
                , "Nsit Ibom"
                , "Nsit Ubium"
                , "Obot Akara"
                , "Okobo"
                , "Onna"
                , "Oron"
                , "Oruk Anam"
                , "Udung Uko"
                , "Ukanafun"
                , "Uruan"
                , "Urue-Offong/Oruko "
                , "Uyo"
            ]
            , "Bauchi": [
                "Alkaleri"
                , "Bauchi"
                , "Bogoro"
                , "Damban"
                , "Darazo"
                , "Dass"
                , "Ganjuwa"
                , "Giade"
                , "Itas/Gadau"
                , "Jama'are"
                , "Katagum"
                , "Kirfi"
                , "Misau"
                , "Ningi"
                , "Shira"
                , "Tafawa-Balewa"
                , "Toro"
                , "Warji"
                , "Zaki"
            ]
            , "Bayelsa": [
                "Brass"
                , "Ekeremor"
                , "Kolokuma/Opokuma"
                , "Nembe"
                , "Ogbia"
                , "Sagbama"
                , "Southern Jaw"
                , "Yenegoa"
            ]
            , "Benue": [
                "Ado"
                , "Agatu"
                , "Apa"
                , "Buruku"
                , "Gboko"
                , "Guma"
                , "Gwer East"
                , "Gwer West"
                , "Katsina-Ala"
                , "Konshisha"
                , "Kwande"
                , "Logo"
                , "Makurdi"
                , "Obi"
                , "Ogbadibo"
                , "Oju"
                , "Okpokwu"
                , "Ohimini"
                , "Oturkpo"
                , "Tarka"
                , "Ukum"
                , "Ushongo"
                , "Vandeikya"
            ]
            , "Borno": [
                "Abadam"
                , "Askira/Uba"
                , "Bama"
                , "Bayo"
                , "Biu"
                , "Chibok"
                , "Damboa"
                , "Dikwa"
                , "Gubio"
                , "Guzamala"
                , "Gwoza"
                , "Hawul"
                , "Jere"
                , "Kaga"
                , "Kala/Balge"
                , "Konduga"
                , "Kukawa"
                , "Kwaya Kusar"
                , "Mafa"
                , "Magumeri"
                , "Maiduguri"
                , "Marte"
                , "Mobbar"
                , "Monguno"
                , "Ngala"
                , "Nganzai"
                , "Shani"
            ]
            , "Cross River": [
                "Akpabuyo"
                , "Odukpani"
                , "Akamkpa"
                , "Biase"
                , "Abi"
                , "Ikom"
                , "Yarkur"
                , "Odubra"
                , "Boki"
                , "Ogoja"
                , "Yala"
                , "Obanliku"
                , "Obudu"
                , "Calabar South"
                , "Etung"
                , "Bekwara"
                , "Bakassi"
                , "Calabar Municipality"
            ]
            , "Delta": [
                "Oshimili"
                , "Aniocha"
                , "Aniocha South"
                , "Ika South"
                , "Ika North-East"
                , "Ndokwa West"
                , "Ndokwa East"
                , "Isoko south"
                , "Isoko North"
                , "Bomadi"
                , "Burutu"
                , "Ughelli South"
                , "Ughelli North"
                , "Ethiope West"
                , "Ethiope East"
                , "Sapele"
                , "Okpe"
                , "Warri North"
                , "Warri South"
                , "Uvwie"
                , "Udu"
                , "Warri Central"
                , "Ukwani"
                , "Oshimili North"
                , "Patani"
            ]
            , "Ebonyi": [
                "Afikpo South"
                , "Afikpo North"
                , "Onicha"
                , "Ohaozara"
                , "Abakaliki"
                , "Ishielu"
                , "lkwo"
                , "Ezza"
                , "Ezza South"
                , "Ohaukwu"
                , "Ebonyi"
                , "Ivo"
            ]
            , "Enugu": [
                "Enugu South,"
                , "Igbo-Eze South"
                , "Enugu North"
                , "Nkanu"
                , "Udi Agwu"
                , "Oji-River"
                , "Ezeagu"
                , "IgboEze North"
                , "Isi-Uzo"
                , "Nsukka"
                , "Igbo-Ekiti"
                , "Uzo-Uwani"
                , "Enugu Eas"
                , "Aninri"
                , "Nkanu East"
                , "Udenu."
            ]
            , "Edo": [
                "Esan North-East"
                , "Esan Central"
                , "Esan West"
                , "Egor"
                , "Ukpoba"
                , "Central"
                , "Etsako Central"
                , "Igueben"
                , "Oredo"
                , "Ovia SouthWest"
                , "Ovia South-East"
                , "Orhionwon"
                , "Uhunmwonde"
                , "Etsako East"
                , "Esan South-East"
            ]
            , "Ekiti": [
                "Ado"
                , "Ekiti-East"
                , "Ekiti-West"
                , "Emure/Ise/Orun"
                , "Ekiti South-West"
                , "Ikare"
                , "Irepodun"
                , "Ijero,"
                , "Ido/Osi"
                , "Oye"
                , "Ikole"
                , "Moba"
                , "Gbonyin"
                , "Efon"
                , "Ise/Orun"
                , "Ilejemeje."
            ]
            , "Abuja": [
                "Abaji"
                , "AMAC"
                , "Bwari"
                , "Gwagwalada"
                , "Kuje"
                , "Kwali"
            ]
            , "Gombe": [
                "Akko"
                , "Balanga"
                , "Billiri"
                , "Dukku"
                , "Kaltungo"
                , "Kwami"
                , "Shomgom"
                , "Funakaye"
                , "Gombe"
                , "Nafada/Bajoga"
                , "Yamaltu/Delta."
            ]
            , "Imo": [
                "Aboh-Mbaise"
                , "Ahiazu-Mbaise"
                , "Ehime-Mbano"
                , "Ezinihitte"
                , "Ideato North"
                , "Ideato South"
                , "Ihitte/Uboma"
                , "Ikeduru"
                , "Isiala Mbano"
                , "Isu"
                , "Mbaitoli"
                , "Mbaitoli"
                , "Ngor-Okpala"
                , "Njaba"
                , "Nwangele"
                , "Nkwerre"
                , "Obowo"
                , "Oguta"
                , "Ohaji/Egbema"
                , "Okigwe"
                , "Orlu"
                , "Orsu"
                , "Oru East"
                , "Oru West"
                , "Owerri-Municipal"
                , "Owerri North"
                , "Owerri West"
            ]
            , "Jigawa": [
                "Auyo"
                , "Babura"
                , "Birni Kudu"
                , "Biriniwa"
                , "Buji"
                , "Dutse"
                , "Gagarawa"
                , "Garki"
                , "Gumel"
                , "Guri"
                , "Gwaram"
                , "Gwiwa"
                , "Hadejia"
                , "Jahun"
                , "Kafin Hausa"
                , "Kaugama Kazaure"
                , "Kiri Kasamma"
                , "Kiyawa"
                , "Maigatari"
                , "Malam Madori"
                , "Miga"
                , "Ringim"
                , "Roni"
                , "Sule-Tankarkar"
                , "Taura"
                , "Yankwashi"
            ]
            , "Kaduna": [
                "Birni-Gwari"
                , "Chikun"
                , "Giwa"
                , "Igabi"
                , "Ikara"
                , "jaba"
                , "Jema'a"
                , "Kachia"
                , "Kaduna North"
                , "Kaduna South"
                , "Kagarko"
                , "Kajuru"
                , "Kaura"
                , "Kauru"
                , "Kubau"
                , "Kudan"
                , "Lere"
                , "Makarfi"
                , "Sabon-Gari"
                , "Sanga"
                , "Soba"
                , "Zango-Kataf"
                , "Zaria"
            ]
            , "Kano": [
                "Ajingi"
                , "Albasu"
                , "Bagwai"
                , "Bebeji"
                , "Bichi"
                , "Bunkure"
                , "Dala"
                , "Dambatta"
                , "Dawakin Kudu"
                , "Dawakin Tofa"
                , "Doguwa"
                , "Fagge"
                , "Gabasawa"
                , "Garko"
                , "Garum"
                , "Mallam"
                , "Gaya"
                , "Gezawa"
                , "Gwale"
                , "Gwarzo"
                , "Kabo"
                , "Kano Municipal"
                , "Karaye"
                , "Kibiya"
                , "Kiru"
                , "kumbotso"
                , "Kunchi"
                , "Kura"
                , "Madobi"
                , "Makoda"
                , "Minjibir"
                , "Nasarawa"
                , "Rano"
                , "Rimin Gado"
                , "Rogo"
                , "Shanono"
                , "Sumaila"
                , "Takali"
                , "Tarauni"
                , "Tofa"
                , "Tsanyawa"
                , "Tudun Wada"
                , "Ungogo"
                , "Warawa"
                , "Wudil"
            ]
            , "Katsina": [
                "Bakori"
                , "Batagarawa"
                , "Batsari"
                , "Baure"
                , "Bindawa"
                , "Charanchi"
                , "Dandume"
                , "Danja"
                , "Dan Musa"
                , "Daura"
                , "Dutsi"
                , "Dutsin-Ma"
                , "Faskari"
                , "Funtua"
                , "Ingawa"
                , "Jibia"
                , "Kafur"
                , "Kaita"
                , "Kankara"
                , "Kankia"
                , "Katsina"
                , "Kurfi"
                , "Kusada"
                , "Mai'Adua"
                , "Malumfashi"
                , "Mani"
                , "Mashi"
                , "Matazuu"
                , "Musawa"
                , "Rimi"
                , "Sabuwa"
                , "Safana"
                , "Sandamu"
                , "Zango"
            ]
            , "Kebbi": [
                "Aleiro"
                , "Arewa-Dandi"
                , "Argungu"
                , "Augie"
                , "Bagudo"
                , "Birnin Kebbi"
                , "Bunza"
                , "Dandi"
                , "Fakai"
                , "Gwandu"
                , "Jega"
                , "Kalgo"
                , "Koko/Besse"
                , "Maiyama"
                , "Ngaski"
                , "Sakaba"
                , "Shanga"
                , "Suru"
                , "Wasagu/Danko"
                , "Yauri"
                , "Zuru"
            ]
            , "Kogi": [
                "Adavi"
                , "Ajaokuta"
                , "Ankpa"
                , "Bassa"
                , "Dekina"
                , "Ibaji"
                , "Idah"
                , "Igalamela-Odolu"
                , "Ijumu"
                , "Kabba/Bunu"
                , "Kogi"
                , "Lokoja"
                , "Mopa-Muro"
                , "Ofu"
                , "Ogori/Mangongo"
                , "Okehi"
                , "Okene"
                , "Olamabolo"
                , "Omala"
                , "Yagba East"
                , "Yagba West"
            ]
            , "Kwara": [
                "Asa"
                , "Baruten"
                , "Edu"
                , "Ekiti"
                , "Ifelodun"
                , "Ilorin East"
                , "Ilorin West"
                , "Irepodun"
                , "Isin"
                , "Kaiama"
                , "Moro"
                , "Offa"
                , "Oke-Ero"
                , "Oyun"
                , "Pategi"
            ]
            , "Lagos": [
                "Agege"
                , "Ajeromi-Ifelodun"
                , "Alimosho"
                , "Amuwo-Odofin"
                , "Apapa"
                , "Badagry"
                , "Epe"
                , "Eti-Osa"
                , "Ibeju/Lekki"
                , "Ifako-Ijaye"
                , "Ikeja"
                , "Ikorodu"
                , "Kosofe"
                , "Lagos Island"
                , "Lagos Mainland"
                , "Mushin"
                , "Ojo"
                , "Oshodi-Isolo"
                , "Shomolu"
                , "Surulere"
            ]
            , "Nasarawa": [
                "Akwanga"
                , "Awe"
                , "Doma"
                , "Karu"
                , "Keana"
                , "Keffi"
                , "Kokona"
                , "Lafia"
                , "Nasarawa"
                , "Nasarawa-Eggon"
                , "Obi"
                , "Toto"
                , "Wamba"
            ]
            , "Niger": [
                "Agaie"
                , "Agwara"
                , "Bida"
                , "Borgu"
                , "Bosso"
                , "Chanchaga"
                , "Edati"
                , "Gbako"
                , "Gurara"
                , "Katcha"
                , "Kontagora"
                , "Lapai"
                , "Lavun"
                , "Magama"
                , "Mariga"
                , "Mashegu"
                , "Mokwa"
                , "Muya"
                , "Pailoro"
                , "Rafi"
                , "Rijau"
                , "Shiroro"
                , "Suleja"
                , "Tafa"
                , "Wushishi"
            ]
            , "Ogun": [
                "Abeokuta North"
                , "Abeokuta South"
                , "Ado-Odo/Ota"
                , "Egbado North"
                , "Egbado South"
                , "Ewekoro"
                , "Ifo"
                , "Ijebu East"
                , "Ijebu North"
                , "Ijebu North East"
                , "Ijebu Ode"
                , "Ikenne"
                , "Imeko-Afon"
                , "Ipokia"
                , "Obafemi-Owode"
                , "Ogun Waterside"
                , "Odeda"
                , "Odogbolu"
                , "Remo North"
                , "Shagamu"
            ]
            , "Ondo": [
                "Akoko North East"
                , "Akoko North West"
                , "Akoko South Akure East"
                , "Akoko South West"
                , "Akure North"
                , "Akure South"
                , "Ese-Odo"
                , "Idanre"
                , "Ifedore"
                , "Ilaje"
                , "Ile-Oluji"
                , "Okeigbo"
                , "Irele"
                , "Odigbo"
                , "Okitipupa"
                , "Ondo East"
                , "Ondo West"
                , "Ose"
                , "Owo"
            ]
            , "Osun": [
                "Aiyedade"
                , "Aiyedire"
                , "Atakumosa East"
                , "Atakumosa West"
                , "Boluwaduro"
                , "Boripe"
                , "Ede North"
                , "Ede South"
                , "Egbedore"
                , "Ejigbo"
                , "Ife Central"
                , "Ife East"
                , "Ife North"
                , "Ife South"
                , "Ifedayo"
                , "Ifelodun"
                , "Ila"
                , "Ilesha East"
                , "Ilesha West"
                , "Irepodun"
                , "Irewole"
                , "Isokan"
                , "Iwo"
                , "Obokun"
                , "Odo-Otin"
                , "Ola-Oluwa"
                , "Olorunda"
                , "Oriade"
                , "Orolu"
                , "Osogbo"
            ]
            , "Oyo": [
                "Afijio"
                , "Akinyele"
                , "Atiba"
                , "Atigbo"
                , "Egbeda"
                , "Ibadan Central"
                , "Ibadan North"
                , "Ibadan North West"
                , "Ibadan South East"
                , "Ibadan South West"
                , "Ibarapa Central"
                , "Ibarapa East"
                , "Ibarapa North"
                , "Ido"
                , "Irepo"
                , "Iseyin"
                , "Itesiwaju"
                , "Iwajowa"
                , "Kajola"
                , "Lagelu Ogbomosho North"
                , "Ogbmosho South"
                , "Ogo Oluwa"
                , "Olorunsogo"
                , "Oluyole"
                , "Ona-Ara"
                , "Orelope"
                , "Ori Ire"
                , "Oyo East"
                , "Oyo West"
                , "Saki East"
                , "Saki West"
                , "Surulere"
            ]
            , "Plateau": [
                "Barikin Ladi"
                , "Bassa"
                , "Bokkos"
                , "Jos East"
                , "Jos North"
                , "Jos South"
                , "Kanam"
                , "Kanke"
                , "Langtang North"
                , "Langtang South"
                , "Mangu"
                , "Mikang"
                , "Pankshin"
                , "Qua'an Pan"
                , "Riyom"
                , "Shendam"
                , "Wase"
            ]
            , "Rivers": [
                "Abua/Odual"
                , "Ahoada East"
                , "Ahoada West"
                , "Akuku Toru"
                , "Andoni"
                , "Asari-Toru"
                , "Bonny"
                , "Degema"
                , "Emohua"
                , "Eleme"
                , "Etche"
                , "Gokana"
                , "Ikwerre"
                , "Khana"
                , "Obia/Akpor"
                , "Ogba/Egbema/Ndoni"
                , "Ogu/Bolo"
                , "Okrika"
                , "Omumma"
                , "Opobo/Nkoro"
                , "Oyigbo"
                , "Port-Harcourt"
                , "Tai"
            ]
            , "Sokoto": [
                "Binji"
                , "Bodinga"
                , "Dange-shnsi"
                , "Gada"
                , "Goronyo"
                , "Gudu"
                , "Gawabawa"
                , "Illela"
                , "Isa"
                , "Kware"
                , "kebbe"
                , "Rabah"
                , "Sabon birni"
                , "Shagari"
                , "Silame"
                , "Sokoto North"
                , "Sokoto South"
                , "Tambuwal"
                , "Tqngaza"
                , "Tureta"
                , "Wamako"
                , "Wurno"
                , "Yabo"
            ]
            , "Taraba": [
                "Ardo-kola"
                , "Bali"
                , "Donga"
                , "Gashaka"
                , "Cassol"
                , "Ibi"
                , "Jalingo"
                , "Karin-Lamido"
                , "Kurmi"
                , "Lau"
                , "Sardauna"
                , "Takum"
                , "Ussa"
                , "Wukari"
                , "Yorro"
                , "Zing"
            ]
            , "Yobe": [
                "Bade"
                , "Bursari"
                , "Damaturu"
                , "Fika"
                , "Fune"
                , "Geidam"
                , "Gujba"
                , "Gulani"
                , "Jakusko"
                , "Karasuwa"
                , "Karawa"
                , "Machina"
                , "Nangere"
                , "Nguru Potiskum"
                , "Tarmua"
                , "Yunusari"
                , "Yusufari"
            ]
            , "Zamfara": [
                "Anka"
                , "Bakura"
                , "Birnin Magaji"
                , "Bukkuyum"
                , "Bungudu"
                , "Gummi"
                , "Gusau"
                , "Kaura"
                , "Namoda"
                , "Maradun"
                , "Maru"
                , "Shinkafi"
                , "Talata Mafara"
                , "Tsafe"
                , "Zurmi"
            ]
        };

        var msg = ele.value;

        var ele1 = document.getElementById('slga');

        for (i = 0; i < parts[msg].length; i++) {

            $('#slga1').show();
            $('#writew1').show();

            ele1.innerHTML = ele1.innerHTML +
                '<option value="' + parts[msg][i] + '">' + parts[msg][i] + '</option>';
        }


    }

</script>
<script type="text/javascript">
    var ngst = [{
            "ID": "0"
            , "Name": "----Choose State----"
        }
        , {
            "ID": "NOT NGN"
            , "Name": "Not a Nigerian"
        }
        , {
            "ID": "Abuja"
            , "Name": "Abuja"
        }
        , {
            "ID": "Abia"
            , "Name": "Abia"
        }
        , {
            "ID": "Adamawa"
            , "Name": "Adamawa"
        }
        , {
            "ID": "Anambra"
            , "Name": "Anambra"
        }
        , {
            "ID": "Akwa Ibom"
            , "Name": "Akwa Ibom"
        }
        , {
            "ID": "Bauchi"
            , "Name": "Bauchi"
        }
        , {
            "ID": "Bayelsa"
            , "Name": "Bayelsa"
        }
        , {
            "ID": "Benue"
            , "Name": "Benue"
        }
        , {
            "ID": "Borno"
            , "Name": "Borno"
        }
        , {
            "ID": "Cross River"
            , "Name": "Cross River"
        }
        , {
            "ID": "Delta"
            , "Name": "Delta"
        }
        , {
            "ID": "Ebonyi"
            , "Name": "Ebonyi"
        }
        , {
            "ID": "Edo"
            , "Name": "Edo"
        }
        , {
            "ID": "Ekiti"
            , "Name": "Ekiti"
        }
        , {
            "ID": "Enugu"
            , "Name": "Enugu"
        }
        , {
            "ID": "Gombe"
            , "Name": "Gombe"
        }
        , {
            "ID": "Imo"
            , "Name": "Imo"
        }
        , {
            "ID": "Jigawa"
            , "Name": "Jigawa"
        }
        , {
            "ID": "Kaduna"
            , "Name": "Kaduna"
        }
        , {
            "ID": "Kano"
            , "Name": "Kano"
        }
        , {
            "ID": "Katsina"
            , "Name": "Katsina"
        }
        , {
            "ID": "kebbi"
            , "Name": "Kebbi"
        }
        , {
            "ID": "Kogi"
            , "Name": "Kogi"
        }
        , {
            "ID": "Kwara"
            , "Name": "Kwara"
        }
        , {
            "ID": "Lagos"
            , "Name": "Lagos"
        }
        , {
            "ID": "Nassarawa"
            , "Name": "Nassarawa"
        }
        , {
            "ID": "Niger"
            , "Name": "Niger"
        }
        , {
            "ID": "Ogun"
            , "Name": "Ogun"
        }
        , {
            "ID": "Ondo"
            , "Name": "Ondo"
        }
        , {
            "ID": "Osun"
            , "Name": "Osun"
        }
        , {
            "ID": "Oyo"
            , "Name": "Oyo"
        }
        , {
            "ID": "Plateau"
            , "Name": "Plateau"
        }
        , {
            "ID": "Rivers"
            , "Name": "Rivers"
        }
        , {
            "ID": "Sokoto"
            , "Name": "Sokoto"
        }
        , {
            "ID": "Taraba"
            , "Name": "Taraba"
        }
        , {
            "ID": "Yobe"
            , "Name": "Yobe"
        }
        , {
            "ID": "Zamfara"
            , "Name": "Zamfara"
        }
    , ];

    var ele = document.getElementById('state-origin');
    for (var i = 0; i < ngst.length; i++) {
        ele.innerHTML = ele.innerHTML +
            '<option value="' + ngst[i]['ID'] + '">' + ngst[i]['Name'] + '</option>';
    }

    // This function will be triggered when a country is selected
    function updateStates() {
        var country = document.getElementById("country").value;
        var stateSelect = document.getElementById("state-origin");
        var lgaSelect = document.getElementById("slga");

        // Clear previous state and LGA options
        stateSelect.innerHTML = '<option value="" disabled selected>Pick a State</option>';
        lgaSelect.innerHTML = '<option value="" disabled selected>Pick an LGA</option>';

        if (country === "Nigeria") {
            ngst.forEach(function(state) {
                var option = document.createElement("option");
                option.value = state.ID;
                option.textContent = state.Name;
                stateSelect.appendChild(option);
            });
        }
    }

    // This function will be triggered when a state is selected
    function updateLGA() {
        var state = document.getElementById("state-origin").value;
        var lgaSelect = document.getElementById("slga");

        // Clear previous LGA options
        lgaSelect.innerHTML = '<option value="" disabled selected>Pick an LGA</option>';

        // Define LGAs for each state
        var parts = {
            "Abia": [
                "Aba North"
                , "Aba South"
                , "Arochukwu"
                , "Bende"
                , "Ikwuano"
                , "Isiala-Ngwa North"
                , "Isiala-Ngwa South"
                , "Isuikwato"
                , "Obi Nwa"
                , "Ohafia"
                , "Osisioma"
                , "Ngwa"
                , "Ugwunagbo"
                , "Ukwa East"
                , "Ukwa West"
                , "Umuahia North"
                , "Umuahia South"
                , "Umu-Neochi"
            ]
            , "Adamawa": [
                "Demsa"
                , "Fufore"
                , "Ganaye"
                , "Gireri"
                , "Gombi"
                , "Guyuk"
                , "Hong"
                , "Jada"
                , "Lamurde"
                , "Madagali"
                , "Maiha"
                , "Mayo-Belwa"
                , "Michika"
                , "Mubi North"
                , "Mubi South"
                , "Numan"
                , "Shelleng"
                , "Song"
                , "Toungo"
                , "Yola North"
                , "Yola South"
            ]
            , "Anambra": [
                "Aguata"
                , "Anambra East"
                , "Anambra West"
                , "Anaocha"
                , "Awka North"
                , "Awka South"
                , "Ayamelum"
                , "Dunukofia"
                , "Ekwusigo"
                , "Idemili North"
                , "Idemili south"
                , "Ihiala"
                , "Njikoka"
                , "Nnewi North"
                , "Nnewi South"
                , "Ogbaru"
                , "Onitsha North"
                , "Onitsha South"
                , "Orumba North"
                , "Orumba South"
                , "Oyi"
            ]
            , "Akwa Ibom": [
                "Abak"
                , "Eastern Obolo"
                , "Eket"
                , "Esit Eket"
                , "Essien Udim"
                , "Etim Ekpo"
                , "Etinan"
                , "Ibeno"
                , "Ibesikpo Asutan"
                , "Ibiono Ibom"
                , "Ika"
                , "Ikono"
                , "Ikot Abasi"
                , "Ikot Ekpene"
                , "Ini"
                , "Itu"
                , "Mbo"
                , "Mkpat Enin"
                , "Nsit Atai"
                , "Nsit Ibom"
                , "Nsit Ubium"
                , "Obot Akara"
                , "Okobo"
                , "Onna"
                , "Oron"
                , "Oruk Anam"
                , "Udung Uko"
                , "Ukanafun"
                , "Uruan"
                , "Urue-Offong/Oruko "
                , "Uyo"
            ]
            , "Bauchi": [
                "Alkaleri"
                , "Bauchi"
                , "Bogoro"
                , "Damban"
                , "Darazo"
                , "Dass"
                , "Ganjuwa"
                , "Giade"
                , "Itas/Gadau"
                , "Jama'are"
                , "Katagum"
                , "Kirfi"
                , "Misau"
                , "Ningi"
                , "Shira"
                , "Tafawa-Balewa"
                , "Toro"
                , "Warji"
                , "Zaki"
            ]
            , "Bayelsa": [
                "Brass"
                , "Ekeremor"
                , "Kolokuma/Opokuma"
                , "Nembe"
                , "Ogbia"
                , "Sagbama"
                , "Southern Jaw"
                , "Yenegoa"
            ]
            , "Benue": [
                "Ado"
                , "Agatu"
                , "Apa"
                , "Buruku"
                , "Gboko"
                , "Guma"
                , "Gwer East"
                , "Gwer West"
                , "Katsina-Ala"
                , "Konshisha"
                , "Kwande"
                , "Logo"
                , "Makurdi"
                , "Obi"
                , "Ogbadibo"
                , "Oju"
                , "Okpokwu"
                , "Ohimini"
                , "Oturkpo"
                , "Tarka"
                , "Ukum"
                , "Ushongo"
                , "Vandeikya"
            ]
            , "Borno": [
                "Abadam"
                , "Askira/Uba"
                , "Bama"
                , "Bayo"
                , "Biu"
                , "Chibok"
                , "Damboa"
                , "Dikwa"
                , "Gubio"
                , "Guzamala"
                , "Gwoza"
                , "Hawul"
                , "Jere"
                , "Kaga"
                , "Kala/Balge"
                , "Konduga"
                , "Kukawa"
                , "Kwaya Kusar"
                , "Mafa"
                , "Magumeri"
                , "Maiduguri"
                , "Marte"
                , "Mobbar"
                , "Monguno"
                , "Ngala"
                , "Nganzai"
                , "Shani"
            ]
            , "Cross River": [
                "Akpabuyo"
                , "Odukpani"
                , "Akamkpa"
                , "Biase"
                , "Abi"
                , "Ikom"
                , "Yarkur"
                , "Odubra"
                , "Boki"
                , "Ogoja"
                , "Yala"
                , "Obanliku"
                , "Obudu"
                , "Calabar South"
                , "Etung"
                , "Bekwara"
                , "Bakassi"
                , "Calabar Municipality"
            ]
            , "Delta": [
                "Oshimili"
                , "Aniocha"
                , "Aniocha South"
                , "Ika South"
                , "Ika North-East"
                , "Ndokwa West"
                , "Ndokwa East"
                , "Isoko south"
                , "Isoko North"
                , "Bomadi"
                , "Burutu"
                , "Ughelli South"
                , "Ughelli North"
                , "Ethiope West"
                , "Ethiope East"
                , "Sapele"
                , "Okpe"
                , "Warri North"
                , "Warri South"
                , "Uvwie"
                , "Udu"
                , "Warri Central"
                , "Ukwani"
                , "Oshimili North"
                , "Patani"
            ]
            , "Ebonyi": [
                "Afikpo South"
                , "Afikpo North"
                , "Onicha"
                , "Ohaozara"
                , "Abakaliki"
                , "Ishielu"
                , "lkwo"
                , "Ezza"
                , "Ezza South"
                , "Ohaukwu"
                , "Ebonyi"
                , "Ivo"
            ]
            , "Enugu": [
                "Enugu South,"
                , "Igbo-Eze South"
                , "Enugu North"
                , "Nkanu"
                , "Udi Agwu"
                , "Oji-River"
                , "Ezeagu"
                , "IgboEze North"
                , "Isi-Uzo"
                , "Nsukka"
                , "Igbo-Ekiti"
                , "Uzo-Uwani"
                , "Enugu Eas"
                , "Aninri"
                , "Nkanu East"
                , "Udenu."
            ]
            , "Edo": [
                "Esan North-East"
                , "Esan Central"
                , "Esan West"
                , "Egor"
                , "Ukpoba"
                , "Central"
                , "Etsako Central"
                , "Igueben"
                , "Oredo"
                , "Ovia SouthWest"
                , "Ovia South-East"
                , "Orhionwon"
                , "Uhunmwonde"
                , "Etsako East"
                , "Esan South-East"
            ]
            , "Ekiti": [
                "Ado"
                , "Ekiti-East"
                , "Ekiti-West"
                , "Emure/Ise/Orun"
                , "Ekiti South-West"
                , "Ikare"
                , "Irepodun"
                , "Ijero,"
                , "Ido/Osi"
                , "Oye"
                , "Ikole"
                , "Moba"
                , "Gbonyin"
                , "Efon"
                , "Ise/Orun"
                , "Ilejemeje."
            ]
            , "Abuja": [
                "Abaji"
                , "AMAC"
                , "Bwari"
                , "Gwagwalada"
                , "Kuje"
                , "Kwali"
            ]
            , "Gombe": [
                "Akko"
                , "Balanga"
                , "Billiri"
                , "Dukku"
                , "Kaltungo"
                , "Kwami"
                , "Shomgom"
                , "Funakaye"
                , "Gombe"
                , "Nafada/Bajoga"
                , "Yamaltu/Delta."
            ]
            , "Imo": [
                "Aboh-Mbaise"
                , "Ahiazu-Mbaise"
                , "Ehime-Mbano"
                , "Ezinihitte"
                , "Ideato North"
                , "Ideato South"
                , "Ihitte/Uboma"
                , "Ikeduru"
                , "Isiala Mbano"
                , "Isu"
                , "Mbaitoli"
                , "Mbaitoli"
                , "Ngor-Okpala"
                , "Njaba"
                , "Nwangele"
                , "Nkwerre"
                , "Obowo"
                , "Oguta"
                , "Ohaji/Egbema"
                , "Okigwe"
                , "Orlu"
                , "Orsu"
                , "Oru East"
                , "Oru West"
                , "Owerri-Municipal"
                , "Owerri North"
                , "Owerri West"
            ]
            , "Jigawa": [
                "Auyo"
                , "Babura"
                , "Birni Kudu"
                , "Biriniwa"
                , "Buji"
                , "Dutse"
                , "Gagarawa"
                , "Garki"
                , "Gumel"
                , "Guri"
                , "Gwaram"
                , "Gwiwa"
                , "Hadejia"
                , "Jahun"
                , "Kafin Hausa"
                , "Kaugama Kazaure"
                , "Kiri Kasamma"
                , "Kiyawa"
                , "Maigatari"
                , "Malam Madori"
                , "Miga"
                , "Ringim"
                , "Roni"
                , "Sule-Tankarkar"
                , "Taura"
                , "Yankwashi"
            ]
            , "Kaduna": [
                "Birni-Gwari"
                , "Chikun"
                , "Giwa"
                , "Igabi"
                , "Ikara"
                , "jaba"
                , "Jema'a"
                , "Kachia"
                , "Kaduna North"
                , "Kaduna South"
                , "Kagarko"
                , "Kajuru"
                , "Kaura"
                , "Kauru"
                , "Kubau"
                , "Kudan"
                , "Lere"
                , "Makarfi"
                , "Sabon-Gari"
                , "Sanga"
                , "Soba"
                , "Zango-Kataf"
                , "Zaria"
            ]
            , "Kano": [
                "Ajingi"
                , "Albasu"
                , "Bagwai"
                , "Bebeji"
                , "Bichi"
                , "Bunkure"
                , "Dala"
                , "Dambatta"
                , "Dawakin Kudu"
                , "Dawakin Tofa"
                , "Doguwa"
                , "Fagge"
                , "Gabasawa"
                , "Garko"
                , "Garum"
                , "Mallam"
                , "Gaya"
                , "Gezawa"
                , "Gwale"
                , "Gwarzo"
                , "Kabo"
                , "Kano Municipal"
                , "Karaye"
                , "Kibiya"
                , "Kiru"
                , "kumbotso"
                , "Kunchi"
                , "Kura"
                , "Madobi"
                , "Makoda"
                , "Minjibir"
                , "Nasarawa"
                , "Rano"
                , "Rimin Gado"
                , "Rogo"
                , "Shanono"
                , "Sumaila"
                , "Takali"
                , "Tarauni"
                , "Tofa"
                , "Tsanyawa"
                , "Tudun Wada"
                , "Ungogo"
                , "Warawa"
                , "Wudil"
            ]
            , "Katsina": [
                "Bakori"
                , "Batagarawa"
                , "Batsari"
                , "Baure"
                , "Bindawa"
                , "Charanchi"
                , "Dandume"
                , "Danja"
                , "Dan Musa"
                , "Daura"
                , "Dutsi"
                , "Dutsin-Ma"
                , "Faskari"
                , "Funtua"
                , "Ingawa"
                , "Jibia"
                , "Kafur"
                , "Kaita"
                , "Kankara"
                , "Kankia"
                , "Katsina"
                , "Kurfi"
                , "Kusada"
                , "Mai'Adua"
                , "Malumfashi"
                , "Mani"
                , "Mashi"
                , "Matazuu"
                , "Musawa"
                , "Rimi"
                , "Sabuwa"
                , "Safana"
                , "Sandamu"
                , "Zango"
            ]
            , "Kebbi": [
                "Aleiro"
                , "Arewa-Dandi"
                , "Argungu"
                , "Augie"
                , "Bagudo"
                , "Birnin Kebbi"
                , "Bunza"
                , "Dandi"
                , "Fakai"
                , "Gwandu"
                , "Jega"
                , "Kalgo"
                , "Koko/Besse"
                , "Maiyama"
                , "Ngaski"
                , "Sakaba"
                , "Shanga"
                , "Suru"
                , "Wasagu/Danko"
                , "Yauri"
                , "Zuru"
            ]
            , "Kogi": [
                "Adavi"
                , "Ajaokuta"
                , "Ankpa"
                , "Bassa"
                , "Dekina"
                , "Ibaji"
                , "Idah"
                , "Igalamela-Odolu"
                , "Ijumu"
                , "Kabba/Bunu"
                , "Kogi"
                , "Lokoja"
                , "Mopa-Muro"
                , "Ofu"
                , "Ogori/Mangongo"
                , "Okehi"
                , "Okene"
                , "Olamabolo"
                , "Omala"
                , "Yagba East"
                , "Yagba West"
            ]
            , "Kwara": [
                "Asa"
                , "Baruten"
                , "Edu"
                , "Ekiti"
                , "Ifelodun"
                , "Ilorin East"
                , "Ilorin West"
                , "Irepodun"
                , "Isin"
                , "Kaiama"
                , "Moro"
                , "Offa"
                , "Oke-Ero"
                , "Oyun"
                , "Pategi"
            ]
            , "Lagos": [
                "Agege"
                , "Ajeromi-Ifelodun"
                , "Alimosho"
                , "Amuwo-Odofin"
                , "Apapa"
                , "Badagry"
                , "Epe"
                , "Eti-Osa"
                , "Ibeju/Lekki"
                , "Ifako-Ijaye"
                , "Ikeja"
                , "Ikorodu"
                , "Kosofe"
                , "Lagos Island"
                , "Lagos Mainland"
                , "Mushin"
                , "Ojo"
                , "Oshodi-Isolo"
                , "Shomolu"
                , "Surulere"
            ]
            , "Nasarawa": [
                "Akwanga"
                , "Awe"
                , "Doma"
                , "Karu"
                , "Keana"
                , "Keffi"
                , "Kokona"
                , "Lafia"
                , "Nasarawa"
                , "Nasarawa-Eggon"
                , "Obi"
                , "Toto"
                , "Wamba"
            ]
            , "Niger": [
                "Agaie"
                , "Agwara"
                , "Bida"
                , "Borgu"
                , "Bosso"
                , "Chanchaga"
                , "Edati"
                , "Gbako"
                , "Gurara"
                , "Katcha"
                , "Kontagora"
                , "Lapai"
                , "Lavun"
                , "Magama"
                , "Mariga"
                , "Mashegu"
                , "Mokwa"
                , "Muya"
                , "Pailoro"
                , "Rafi"
                , "Rijau"
                , "Shiroro"
                , "Suleja"
                , "Tafa"
                , "Wushishi"
            ]
            , "Ogun": [
                "Abeokuta North"
                , "Abeokuta South"
                , "Ado-Odo/Ota"
                , "Egbado North"
                , "Egbado South"
                , "Ewekoro"
                , "Ifo"
                , "Ijebu East"
                , "Ijebu North"
                , "Ijebu North East"
                , "Ijebu Ode"
                , "Ikenne"
                , "Imeko-Afon"
                , "Ipokia"
                , "Obafemi-Owode"
                , "Ogun Waterside"
                , "Odeda"
                , "Odogbolu"
                , "Remo North"
                , "Shagamu"
            ]
            , "Ondo": [
                "Akoko North East"
                , "Akoko North West"
                , "Akoko South Akure East"
                , "Akoko South West"
                , "Akure North"
                , "Akure South"
                , "Ese-Odo"
                , "Idanre"
                , "Ifedore"
                , "Ilaje"
                , "Ile-Oluji"
                , "Okeigbo"
                , "Irele"
                , "Odigbo"
                , "Okitipupa"
                , "Ondo East"
                , "Ondo West"
                , "Ose"
                , "Owo"
            ]
            , "Osun": [
                "Aiyedade"
                , "Aiyedire"
                , "Atakumosa East"
                , "Atakumosa West"
                , "Boluwaduro"
                , "Boripe"
                , "Ede North"
                , "Ede South"
                , "Egbedore"
                , "Ejigbo"
                , "Ife Central"
                , "Ife East"
                , "Ife North"
                , "Ife South"
                , "Ifedayo"
                , "Ifelodun"
                , "Ila"
                , "Ilesha East"
                , "Ilesha West"
                , "Irepodun"
                , "Irewole"
                , "Isokan"
                , "Iwo"
                , "Obokun"
                , "Odo-Otin"
                , "Ola-Oluwa"
                , "Olorunda"
                , "Oriade"
                , "Orolu"
                , "Osogbo"
            ]
            , "Oyo": [
                "Afijio"
                , "Akinyele"
                , "Atiba"
                , "Atigbo"
                , "Egbeda"
                , "Ibadan Central"
                , "Ibadan North"
                , "Ibadan North West"
                , "Ibadan South East"
                , "Ibadan South West"
                , "Ibarapa Central"
                , "Ibarapa East"
                , "Ibarapa North"
                , "Ido"
                , "Irepo"
                , "Iseyin"
                , "Itesiwaju"
                , "Iwajowa"
                , "Kajola"
                , "Lagelu Ogbomosho North"
                , "Ogbmosho South"
                , "Ogo Oluwa"
                , "Olorunsogo"
                , "Oluyole"
                , "Ona-Ara"
                , "Orelope"
                , "Ori Ire"
                , "Oyo East"
                , "Oyo West"
                , "Saki East"
                , "Saki West"
                , "Surulere"
            ]
            , "Plateau": [
                "Barikin Ladi"
                , "Bassa"
                , "Bokkos"
                , "Jos East"
                , "Jos North"
                , "Jos South"
                , "Kanam"
                , "Kanke"
                , "Langtang North"
                , "Langtang South"
                , "Mangu"
                , "Mikang"
                , "Pankshin"
                , "Qua'an Pan"
                , "Riyom"
                , "Shendam"
                , "Wase"
            ]
            , "Rivers": [
                "Abua/Odual"
                , "Ahoada East"
                , "Ahoada West"
                , "Akuku Toru"
                , "Andoni"
                , "Asari-Toru"
                , "Bonny"
                , "Degema"
                , "Emohua"
                , "Eleme"
                , "Etche"
                , "Gokana"
                , "Ikwerre"
                , "Khana"
                , "Obia/Akpor"
                , "Ogba/Egbema/Ndoni"
                , "Ogu/Bolo"
                , "Okrika"
                , "Omumma"
                , "Opobo/Nkoro"
                , "Oyigbo"
                , "Port-Harcourt"
                , "Tai"
            ]
            , "Sokoto": [
                "Binji"
                , "Bodinga"
                , "Dange-shnsi"
                , "Gada"
                , "Goronyo"
                , "Gudu"
                , "Gawabawa"
                , "Illela"
                , "Isa"
                , "Kware"
                , "kebbe"
                , "Rabah"
                , "Sabon birni"
                , "Shagari"
                , "Silame"
                , "Sokoto North"
                , "Sokoto South"
                , "Tambuwal"
                , "Tqngaza"
                , "Tureta"
                , "Wamako"
                , "Wurno"
                , "Yabo"
            ]
            , "Taraba": [
                "Ardo-kola"
                , "Bali"
                , "Donga"
                , "Gashaka"
                , "Cassol"
                , "Ibi"
                , "Jalingo"
                , "Karin-Lamido"
                , "Kurmi"
                , "Lau"
                , "Sardauna"
                , "Takum"
                , "Ussa"
                , "Wukari"
                , "Yorro"
                , "Zing"
            ]
            , "Yobe": [
                "Bade"
                , "Bursari"
                , "Damaturu"
                , "Fika"
                , "Fune"
                , "Geidam"
                , "Gujba"
                , "Gulani"
                , "Jakusko"
                , "Karasuwa"
                , "Karawa"
                , "Machina"
                , "Nangere"
                , "Nguru Potiskum"
                , "Tarmua"
                , "Yunusari"
                , "Yusufari"
            ]
            , "Zamfara": [
                "Anka"
                , "Bakura"
                , "Birnin Magaji"
                , "Bukkuyum"
                , "Bungudu"
                , "Gummi"
                , "Gusau"
                , "Kaura"
                , "Namoda"
                , "Maradun"
                , "Maru"
                , "Shinkafi"
                , "Talata Mafara"
                , "Tsafe"
                , "Zurmi"
            ]
        };

        // Check if the selected state has any LGAs
        if (parts[state]) {
            var lgas = parts[state];
            lgas.forEach(function(lga) {
                var option = document.createElement("option");
                option.value = lga;
                option.textContent = lga;
                lgaSelect.appendChild(option);
            });
        }
    }

</script>

@endsection

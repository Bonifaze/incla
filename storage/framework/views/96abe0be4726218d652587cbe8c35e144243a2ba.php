<?php $__env->startSection('pagetitle'); ?>
Home
<?php $__env->stopSection(); ?>

<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('student-open'); ?>
menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('student'); ?>
active
<?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('home'); ?>
active
<?php $__env->stopSection(); ?>

<!-- End Sidebar links -->

<?php $__env->startSection('content'); ?>
<div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="dashboard-body">


                <div class="page-content">
                    <div class="form-v10-content">
                        <form class="form-detail" action="#" enctype="multipart/form-data" method="post" id="myform">
                            <?php echo csrf_field(); ?>
                            <div class="form-left">
                                <h2>General Infomation</h2>
                                <div class="form-group">
                                    <div class="form-row form-row-1">

                                        <label for="surname">Surname </label>
                                        <input type="text" name="surname" id="surname" class="input-text <?php $__errorArgs = ['surname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(session('userssurname')); ?> " required readonly autofocus>
                                    </div>
                                    <div class="form-row form-row-2">

                                        <label for="firstname">First Name</label>
                                        <input type="text" name="first_name" id="first_name" class="input-text" placeholder="<?php echo e(session('usersFirstName')); ?>" required readonly autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row form-row-1">
                                        <label for="title">Title </label>
                                        <input type="text" name="title" id="title" class="input-text <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Title ">
                                    </div>
                                    <div class="form-row form-row-2">
                                        <label for="gender">Gender </label>
                                        <select name="Gender" required>
                                            <option value="" disabled selected>Select Gender</option>
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
                                        <label for="dob">Date Of Birth</label>
                                        <input type="date" name="dob" id="dob" class="input-date" required>
                                    </div>

                                    <div class="form-row form-row-2">
                                        <label for="country">Country</label>
                                        <select name="nationality" id="country" onchange="updateStates()">
                                            <option value="" disabled selected>Choose Country</option>
                                            <option value="ngn">Nigeria</option>
                                            <option value="notngn">Not Nigeria</option>
                                        </select>
                                        <span class="text-danger" id="country-error"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-row form-row-1 <?php if($errors->has('state_origin')): ?> has-error <?php endif; ?>">
                                        <label for="state-origin">State of Origin</label>
                                        <div id="state-origin-group">
                                            <select name="state_origin" id="state-origin" onchange="updateLGA()">
                                                <option value="" disabled selected>Pick a State</option>
                                            </select>
                                        </div>
                                        <span class="select-btn">
                                            <i class="zmdi zmdi-chevron-down"></i>
                                        </span>
                                        <?php if($errors->has('state_origin')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('state_origin')); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-row form-row-2 <?php if($errors->has('lga')): ?> has-error <?php endif; ?>">
                                        <label for="lga">Local Govt Area</label>
                                        <div id="lga-group">
                                            <select name="lga" id="slga">
                                                <option value="" disabled selected>Pick an LGA</option>
                                            </select>
                                        </div>
                                        <span class="select-btn">
                                            <i class="zmdi zmdi-chevron-down"></i>
                                        </span>
                                        <?php if($errors->has('lga')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('lga')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <label for="admission_types">Choose Admission Type</label>
                                    <select name="admission-type" id="admission-type" onchange="updateCredentialInputs()">
                                        <option value=" " disabled selected>Type Amission </option>
                                        <option value="lcl">Licentiate</option>
                                        <option value="diploma">Diploma Programs </option>
                                        <option value="cert">Certificate Programs</option>
                                    </select>

                                    <span class="select-btn">
                                        <i class="zmdi zmdi-chevron-down"></i>
                                    </span>
                                </div>
                                <div class="form-row">
                                    <label for="congregation">Type Your Congregation</label>
                                    <input type="text" name="congregation" class="congregation" id="congregation" placeholder="Congregation" required>
                                </div>
                                <div class="form-row">
                                    <label for="address">Type Your Address</label>
                                    <input type="text" name="address" class="address" id="address" placeholder="Contact Address" required>
                                </div>


                                <h2>Sponsors Infomation</h2>

                                <div class="form-group">
                                    <div class="form-row form-row-1">
                                        <label for="sponsorsfn">Sponsors Firstname</label>
                                        <input type="text" name="sponsorsfn" id="" class="input-text" placeholder="Sponsors First Name " required>
                                    </div>
                                    <div class="form-row form-row-2">
                                        <label for="sponsorssn">Sponsors Surname</label>
                                        <input type="text" name="sponsorsn" id="first_name" class="input-text" placeholder="Sponsors Surname" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row form-row-1">
                                        <label for="sponsors_fn">Sponsors Email</label>
                                        <input type="email" name="code" class="email" id="semail" placeholder="Sponsors Email">
                                    </div>
                                    <div class="form-row form-row-2">
                                        <input type="text" name="phone" class="phone" id="phone" placeholder="Phone Number">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <label for="sponsors_address">Sponsors Address</label>
                                    <input type="text" name="sponsor_address" class="sponsor_address" id="sponsor_address" placeholder="Sponsors Address">
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
<script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>

 
<script>
    // Define dynamic inputs for each admission type
    const admissionTypes = {
        lcl: [{
                name: "lcl_type"
                , placeholder: "Select Licentiate Type"
                , options: [{
                    value: "lcl"
                    , label: "LCL - Licentiate in Theology of Consecrated Life"
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
                name: "previous_research"
                , placeholder: "Previous Research Topic"
            }
            , {
                name: "upload_waec"
                , placeholder: "Upload WAEC Results"
                , type: "file"
            }
            , {
                name: "upload_degree"
                , placeholder: "Upload Degree Certificate"
                , type: "file"
            }
            , {
                name: "upload_birth"
                , placeholder: "Upload Birth Certificate"
                , type: "file"
            }
            , {
                name: "upload_passport"
                , placeholder: "Upload Passport"
                , type: "file"
            }
        ]
        , diploma: [{
                name: "diploma_type"
                , placeholder: "Type of Diploma"
                , options: [{
                        value: "dbt"
                        , label: "DBT - Diploma in Basic Theology"
                    }
                    , {
                        value: "dff"
                        , label: "DFF - Diploma in Formation of Formators"
                    }
                    , {
                        value: "dsd"
                        , label: "DSD - Diploma in Spiritual Direction"
                    }
                    , {
                        value: "dcl"
                        , label: "DCL - Diploma in Theology of Consecrated Life"
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
            , {
                name: "upload_waec"
                , placeholder: "Upload WAEC Results"
                , type: "file"
            }
            , {
                name: "upload_birth"
                , placeholder: "Upload Birth Certificate"
                , type: "file"
            }
            , {
                name: "upload_passport"
                , placeholder: "Upload Passport"
                , type: "file"
            }
        ]
        , cert: [{
                name: "certificate_type"
                , placeholder: "Type of Certificate"
                , options: [{
                        value: "cbt"
                        , label: "CBT - Certificate in Basic Theology"
                    }
                    , {
                        value: "cff"
                        , label: "CFF - Certificate in Formation of Formators"
                    }
                    , {
                        value: "csd"
                        , label: "CSD - Certificate in Spiritual Direction"
                    }
                    , {
                        value: "ccf"
                        , label: "CCF - Certificate in Chapter Facilitation"
                    }
                    , {
                        value: "cfp"
                        , label: "CFP - Certificate in Fundraising & Project Management"
                    }
                ]
            }
            , {
                name: "upload_waec"
                , placeholder: "Upload WAEC Results"
                , type: "file"
            }
            , {
                name: "upload_birth"
                , placeholder: "Upload Birth Certificate"
                , type: "file"
            }
            , {
                name: "upload_passport"
                , placeholder: "Upload Passport"
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
        previewDiv.innerazHTML = "";
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




<script>
    // List of States and LGAs
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

    // List of LGAs for each state
    var lgaData = {
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

    // Function to update the States dropdown based on the selected country
    function updateStates() {
        var country = document.getElementById("country").value;
        var stateSelect = document.getElementById("state-origin");
        var lgaSelect = document.getElementById("slga");

        // Clear previous state and LGA options
        stateSelect.innerHTML = '<option value="" disabled selected>Pick a State</option>';
        lgaSelect.innerHTML = '<option value="" disabled selected>Pick an LGA</option>';

        // Only populate states when a valid country is selected
        if (country === "ngn") {
            ngst.forEach(function(state) {
                var option = document.createElement("option");
                option.value = state.ID;
                option.textContent = state.Name;
                stateSelect.appendChild(option);
            });
        }
    }

    // Function to update the LGA dropdown based on the selected state
    function updateLGA() {
        var state = document.getElementById("state-origin").value;
        var lgaSelect = document.getElementById("slga");

        // Clear previous LGA options
        lgaSelect.innerHTML = '<option value="" disabled selected>Pick an LGA</option>';

        // Only populate LGAs when a valid state is selected
        if (lgaData[state]) {
            var lgas = lgaData[state];
            lgas.forEach(function(lga) {
                var option = document.createElement("option");
                option.value = lga;
                option.textContent = lga;
                lgaSelect.appendChild(option);
            });
        }
    }

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminsials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Downloads\Onoyima (1)\work\incla\resources\views/admissions/home.blade.php ENDPATH**/ ?>
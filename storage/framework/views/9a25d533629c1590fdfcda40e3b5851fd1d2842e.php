




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
    <section class="content">

        <?php if(session('signUpMsg')): ?>
        <?php echo session('signUpMsg'); ?>

        <?php endif; ?>

        <div class="card mb-4">
            <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                TRANSFER INFORMATION
            </h1>
            <div class="card-body p-5">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link<?php echo e($transfers->status == 0 ? ' active' : ''); ?> text-success fw-bold text-capitalize" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="<?php echo e($transfers->status  == 0 ? 'true' : 'false'); ?>">Bio
                            Data</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link<?php echo e($transfers->status  == 1 ? ' active' : ''); ?> text-success fw-bold text-capitalize" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="<?php echo e($transfers->status  == 1 ? 'true' : 'false'); ?>">Sponsor Information</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link<?php echo e($transfers->status  == 2 ? ' active' : ''); ?> text-success fw-bold text-capitalize" id="profile2-tab" data-bs-toggle="tab" data-bs-target="#profile2-tab-pane" type="button" role="tab" aria-controls="profile2-tab-pane" aria-selected="<?php echo e($transfers->status  == 2 ? 'true' : 'false'); ?>">Direct Entry Information</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link<?php echo e($transfers->status  == 3 ? ' active' : ''); ?> text-success fw-bold text-capitalize" id="profile3-tab" data-bs-toggle="tab" data-bs-target="#profile3-tab-pane" type="button" role="tab" aria-controls="profile3-tab-pane" aria-selected="<?php echo e($transfers->status  == 3 ? 'true' : 'false'); ?>">Upload Documents</button>
                    </li>
                </ul>


                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade<?php echo e($transfers->status == 0 ? ' show active' : ''); ?>" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab">
                        <form method="POST" action="/transfersbiodata" enctype="multipart/form-data" class="p-3">
                            <?php echo csrf_field(); ?>
                            <label for=""><?php echo e(__('Surname')); ?> </label>
                            <div class="form-group">
                                <div class="form-group">
                                    <input id="surname" type="text" class="form-control <?php $__errorArgs = ['surname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="surname" placeholder="<?php echo e($transfers->surname); ?>" readonly autofocus>
                                    <input id="status" type="hidden" class="form-control " name="'<?php echo e($transfers->status); ?>" readonly autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for=""><?php echo e(__('First Name')); ?> </label>
                                    <input id="first_name" type="text" class="form-control" name="first_name" placeholder="<?php echo e($transfers->first_name); ?>" readonly autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Email')); ?> </label>
                                    <input id="email" type="email" class="form-control " name="email" placeholder="<?php echo e($transfers->email); ?>" readonly autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Phone')); ?> </label>
                                    <input id="phone" type="phone" class="form-control" name="phone" autocomplete="phone" placeholder="<?php echo e($transfers->phone); ?>" readonly autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Middle Name')); ?> </label>
                                    <input id="middle_name" type="text" class="form-control" name="middle_name" placeholder="<?php echo e($transfers->middle_name ?? null); ?>" value="<?php echo e($transfers->middle_name ?? null); ?>" readonly autofocus>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="passport">Passport :</label>
                                <?php echo Form::file('passport', [
                                'class' => 'form-control file-loading',
                                'id' => 'passport',
                                'placeholder' => 'Choose profile pic',
                                'name' => 'passport',
                                'accept' => 'image/*',
                                'required' => 'required',
                                ]); ?>

                                <span class="text-danger"> <?php echo e($errors->first('passport')); ?></span>
                            </div>
                            <div class="form-group">
                                <div class=" form-group">
                                    <label for="type">Gender :</label>
                                    <?php echo e(Form::select(
                                    'gender',
                                    [
                                    'Male' => 'Male',
                                    'Female' => 'Female',
                                    ],
                                    'Male',
                                    ['class' => 'form-control select2'],
                                    )); ?>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="religion">Religion :</label>
                                    <?php echo e(Form::select(
                                    'religion',
                                    [
                                    'Christain(Catholic)' => 'Christain (Catholic)',
                                    'Christain(Non-Catholic)' => 'Christain (non-Catholic)',
                                    'Muslim' => 'Muslim',
                                    'Other' => 'Other',
                                    ],
                                    'Catholic',
                                    ['class' => 'form-control select2'],
                                    )); ?>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="dob"><?php echo e(__('Date of Birth')); ?> </label>

                                <div class="form-group">
                                    <input id="dob" type="text" class="form-control" name="dob" required>
                                </div>
                            </div>

                                               <div class="form-group">
                                    <label for="program_id">Nationality :</label>
                                    <?php echo e(Form::select('nationality', $country, null, ['class' => 'form-control', 'id' => 'nationality', 'name' => 'nationality'])); ?>

                                    <span class="text-danger"> <?php echo e($errors->first('nationality')); ?></span>

                                </div>
                                
                                <div class="form-group" style="margin-top:0px" id="state1">
                                    <div <?php if($errors->has('nationality')): ?> class ='has-error form-group' <?php endif; ?>>
                                        <label for="nationality">State of Origin :</label>
                                    </div>
                                    <div class="has-error form-group">
                                        <select class="form-control" name="state_origin" id="state"
                                            placeholder="Pick State" onchange="show(this)">
                                        </select>

                                    </div>
                                    <span class="help-block" id="helpstate"></span>
                                </div>

                                <div class="col-md-12 form-group" id="slga1" style="display: none;">
                                    <div <?php if($errors->has('nationality')): ?> class ='has-error form-group' <?php endif; ?>>
                                        <label for="nationality">Local Government Area :</label>
                                    </div>
                                    <div class="has-error form-group">
                                        <select class="form-control" name="lga" id="slga"
                                            placeholder="State LGA">
                                        </select>

                                    </div>
                                    <span class="help-block" id="helpslga"></span>
                                </div>



                                <script type="text/javascript">
                                    var ngst = [{
                                            "ID": "0",
                                            "Name": "----Choose State----"
                                        },
                                        {
                                            "ID": "NOT NGN",
                                            "Name": "Not a Nigerian"
                                        },
                                        {
                                            "ID": "Abuja",
                                            "Name": "Abuja"
                                        },
                                        {
                                            "ID": "Abia",
                                            "Name": "Abia"
                                        },
                                        {
                                            "ID": "Adamawa",
                                            "Name": "Adamawa"
                                        },
                                        {
                                            "ID": "Anambra",
                                            "Name": "Anambra"
                                        },
                                        {
                                            "ID": "Akwa Ibom",
                                            "Name": "Akwa Ibom"
                                        },
                                        {
                                            "ID": "Bauchi",
                                            "Name": "Bauchi"
                                        },
                                        {
                                            "ID": "Bayelsa",
                                            "Name": "Bayelsa"
                                        },
                                        {
                                            "ID": "Benue",
                                            "Name": "Benue"
                                        },
                                        {
                                            "ID": "Borno",
                                            "Name": "Borno"
                                        },
                                        {
                                            "ID": "Cross River",
                                            "Name": "Cross River"
                                        },
                                        {
                                            "ID": "Delta",
                                            "Name": "Delta"
                                        },
                                        {
                                            "ID": "Ebonyi",
                                            "Name": "Ebonyi"
                                        },
                                        {
                                            "ID": "Edo",
                                            "Name": "Edo"
                                        },
                                        {
                                            "ID": "Ekiti",
                                            "Name": "Ekiti"
                                        },
                                        {
                                            "ID": "Enugu",
                                            "Name": "Enugu"
                                        },
                                        {
                                            "ID": "Gombe",
                                            "Name": "Gombe"
                                        },
                                        {
                                            "ID": "Imo",
                                            "Name": "Imo"
                                        },
                                        {
                                            "ID": "Jigawa",
                                            "Name": "Jigawa"
                                        },
                                        {
                                            "ID": "Kaduna",
                                            "Name": "Kaduna"
                                        },
                                        {
                                            "ID": "Kano",
                                            "Name": "Kano"
                                        },
                                        {
                                            "ID": "Katsina",
                                            "Name": "Katsina"
                                        },
                                        {
                                            "ID": "kebbi",
                                            "Name": "Kebbi"
                                        },
                                        {
                                            "ID": "Kogi",
                                            "Name": "Kogi"
                                        },
                                        {
                                            "ID": "Kwara",
                                            "Name": "Kwara"
                                        },
                                        {
                                            "ID": "Lagos",
                                            "Name": "Lagos"
                                        },
                                        {
                                            "ID": "Nassarawa",
                                            "Name": "Nassarawa"
                                        },
                                        {
                                            "ID": "Niger",
                                            "Name": "Niger"
                                        },
                                        {
                                            "ID": "Ogun",
                                            "Name": "Ogun"
                                        },
                                        {
                                            "ID": "Ondo",
                                            "Name": "Ondo"
                                        },
                                        {
                                            "ID": "Osun",
                                            "Name": "Osun"
                                        },
                                        {
                                            "ID": "Oyo",
                                            "Name": "Oyo"
                                        },
                                        {
                                            "ID": "Plateau",
                                            "Name": "Plateau"
                                        },
                                        {
                                            "ID": "Rivers",
                                            "Name": "Rivers"
                                        },
                                        {
                                            "ID": "Sokoto",
                                            "Name": "Sokoto"
                                        },
                                        {
                                            "ID": "Taraba",
                                            "Name": "Taraba"
                                        },
                                        {
                                            "ID": "Yobe",
                                            "Name": "Yobe"
                                        },
                                        {
                                            "ID": "Zamfara",
                                            "Name": "Zamfara"
                                        },
                                    ];

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
                                                "Aba North",
                                                "Aba South",
                                                "Arochukwu",
                                                "Bende",
                                                "Ikwuano",
                                                "Isiala-Ngwa North",
                                                "Isiala-Ngwa South",
                                                "Isuikwato",
                                                "Obi Nwa",
                                                "Ohafia",
                                                "Osisioma",
                                                "Ngwa",
                                                "Ugwunagbo",
                                                "Ukwa East",
                                                "Ukwa West",
                                                "Umuahia North",
                                                "Umuahia South",
                                                "Umu-Neochi"
                                            ],
                                            "Adamawa": [
                                                "Demsa",
                                                "Fufore",
                                                "Ganaye",
                                                "Gireri",
                                                "Gombi",
                                                "Guyuk",
                                                "Hong",
                                                "Jada",
                                                "Lamurde",
                                                "Madagali",
                                                "Maiha",
                                                "Mayo-Belwa",
                                                "Michika",
                                                "Mubi North",
                                                "Mubi South",
                                                "Numan",
                                                "Shelleng",
                                                "Song",
                                                "Toungo",
                                                "Yola North",
                                                "Yola South"
                                            ],
                                            "Anambra": [
                                                "Aguata",
                                                "Anambra East",
                                                "Anambra West",
                                                "Anaocha",
                                                "Awka North",
                                                "Awka South",
                                                "Ayamelum",
                                                "Dunukofia",
                                                "Ekwusigo",
                                                "Idemili North",
                                                "Idemili south",
                                                "Ihiala",
                                                "Njikoka",
                                                "Nnewi North",
                                                "Nnewi South",
                                                "Ogbaru",
                                                "Onitsha North",
                                                "Onitsha South",
                                                "Orumba North",
                                                "Orumba South",
                                                "Oyi"
                                            ],
                                            "Akwa Ibom": [
                                                "Abak",
                                                "Eastern Obolo",
                                                "Eket",
                                                "Esit Eket",
                                                "Essien Udim",
                                                "Etim Ekpo",
                                                "Etinan",
                                                "Ibeno",
                                                "Ibesikpo Asutan",
                                                "Ibiono Ibom",
                                                "Ika",
                                                "Ikono",
                                                "Ikot Abasi",
                                                "Ikot Ekpene",
                                                "Ini",
                                                "Itu",
                                                "Mbo",
                                                "Mkpat Enin",
                                                "Nsit Atai",
                                                "Nsit Ibom",
                                                "Nsit Ubium",
                                                "Obot Akara",
                                                "Okobo",
                                                "Onna",
                                                "Oron",
                                                "Oruk Anam",
                                                "Udung Uko",
                                                "Ukanafun",
                                                "Uruan",
                                                "Urue-Offong/Oruko ",
                                                "Uyo"
                                            ],
                                            "Bauchi": [
                                                "Alkaleri",
                                                "Bauchi",
                                                "Bogoro",
                                                "Damban",
                                                "Darazo",
                                                "Dass",
                                                "Ganjuwa",
                                                "Giade",
                                                "Itas/Gadau",
                                                "Jama'are",
                                                "Katagum",
                                                "Kirfi",
                                                "Misau",
                                                "Ningi",
                                                "Shira",
                                                "Tafawa-Balewa",
                                                "Toro",
                                                "Warji",
                                                "Zaki"
                                            ],
                                            "Bayelsa": [
                                                "Brass",
                                                "Ekeremor",
                                                "Kolokuma/Opokuma",
                                                "Nembe",
                                                "Ogbia",
                                                "Sagbama",
                                                "Southern Jaw",
                                                "Yenegoa"
                                            ],
                                            "Benue": [
                                                "Ado",
                                                "Agatu",
                                                "Apa",
                                                "Buruku",
                                                "Gboko",
                                                "Guma",
                                                "Gwer East",
                                                "Gwer West",
                                                "Katsina-Ala",
                                                "Konshisha",
                                                "Kwande",
                                                "Logo",
                                                "Makurdi",
                                                "Obi",
                                                "Ogbadibo",
                                                "Oju",
                                                "Okpokwu",
                                                "Ohimini",
                                                "Oturkpo",
                                                "Tarka",
                                                "Ukum",
                                                "Ushongo",
                                                "Vandeikya"
                                            ],
                                            "Borno": [
                                                "Abadam",
                                                "Askira/Uba",
                                                "Bama",
                                                "Bayo",
                                                "Biu",
                                                "Chibok",
                                                "Damboa",
                                                "Dikwa",
                                                "Gubio",
                                                "Guzamala",
                                                "Gwoza",
                                                "Hawul",
                                                "Jere",
                                                "Kaga",
                                                "Kala/Balge",
                                                "Konduga",
                                                "Kukawa",
                                                "Kwaya Kusar",
                                                "Mafa",
                                                "Magumeri",
                                                "Maiduguri",
                                                "Marte",
                                                "Mobbar",
                                                "Monguno",
                                                "Ngala",
                                                "Nganzai",
                                                "Shani"
                                            ],
                                            "Cross River": [
                                                "Akpabuyo",
                                                "Odukpani",
                                                "Akamkpa",
                                                "Biase",
                                                "Abi",
                                                "Ikom",
                                                "Yarkur",
                                                "Odubra",
                                                "Boki",
                                                "Ogoja",
                                                "Yala",
                                                "Obanliku",
                                                "Obudu",
                                                "Calabar South",
                                                "Etung",
                                                "Bekwara",
                                                "Bakassi",
                                                "Calabar Municipality"
                                            ],
                                            "Delta": [
                                                "Oshimili",
                                                "Aniocha",
                                                "Aniocha South",
                                                "Ika South",
                                                "Ika North-East",
                                                "Ndokwa West",
                                                "Ndokwa East",
                                                "Isoko south",
                                                "Isoko North",
                                                "Bomadi",
                                                "Burutu",
                                                "Ughelli South",
                                                "Ughelli North",
                                                "Ethiope West",
                                                "Ethiope East",
                                                "Sapele",
                                                "Okpe",
                                                "Warri North",
                                                "Warri South",
                                                "Uvwie",
                                                "Udu",
                                                "Warri Central",
                                                "Ukwani",
                                                "Oshimili North",
                                                "Patani"
                                            ],
                                            "Ebonyi": [
                                                "Afikpo South",
                                                "Afikpo North",
                                                "Onicha",
                                                "Ohaozara",
                                                "Abakaliki",
                                                "Ishielu",
                                                "lkwo",
                                                "Ezza",
                                                "Ezza South",
                                                "Ohaukwu",
                                                "Ebonyi",
                                                "Ivo"
                                            ],
                                            "Enugu": [
                                                "Enugu South,",
                                                "Igbo-Eze South",
                                                "Enugu North",
                                                "Nkanu",
                                                "Udi Agwu",
                                                "Oji-River",
                                                "Ezeagu",
                                                "IgboEze North",
                                                "Isi-Uzo",
                                                "Nsukka",
                                                "Igbo-Ekiti",
                                                "Uzo-Uwani",
                                                "Enugu Eas",
                                                "Aninri",
                                                "Nkanu East",
                                                "Udenu."
                                            ],
                                            "Edo": [
                                                "Esan North-East",
                                                "Esan Central",
                                                "Esan West",
                                                "Egor",
                                                "Ukpoba",
                                                "Central",
                                                "Etsako Central",
                                                "Igueben",
                                                "Oredo",
                                                "Ovia SouthWest",
                                                "Ovia South-East",
                                                "Orhionwon",
                                                "Uhunmwonde",
                                                "Etsako East",
                                                "Esan South-East"
                                            ],
                                            "Ekiti": [
                                                "Ado",
                                                "Ekiti-East",
                                                "Ekiti-West",
                                                "Emure/Ise/Orun",
                                                "Ekiti South-West",
                                                "Ikare",
                                                "Irepodun",
                                                "Ijero,",
                                                "Ido/Osi",
                                                "Oye",
                                                "Ikole",
                                                "Moba",
                                                "Gbonyin",
                                                "Efon",
                                                "Ise/Orun",
                                                "Ilejemeje."
                                            ],
                                            "Abuja": [
                                                "Abaji",
                                                "AMAC",
                                                "Bwari",
                                                "Gwagwalada",
                                                "Kuje",
                                                "Kwali"
                                            ],
                                            "Gombe": [
                                                "Akko",
                                                "Balanga",
                                                "Billiri",
                                                "Dukku",
                                                "Kaltungo",
                                                "Kwami",
                                                "Shomgom",
                                                "Funakaye",
                                                "Gombe",
                                                "Nafada/Bajoga",
                                                "Yamaltu/Delta."
                                            ],
                                            "Imo": [
                                                "Aboh-Mbaise",
                                                "Ahiazu-Mbaise",
                                                "Ehime-Mbano",
                                                "Ezinihitte",
                                                "Ideato North",
                                                "Ideato South",
                                                "Ihitte/Uboma",
                                                "Ikeduru",
                                                "Isiala Mbano",
                                                "Isu",
                                                "Mbaitoli",
                                                "Mbaitoli",
                                                "Ngor-Okpala",
                                                "Njaba",
                                                "Nwangele",
                                                "Nkwerre",
                                                "Obowo",
                                                "Oguta",
                                                "Ohaji/Egbema",
                                                "Okigwe",
                                                "Orlu",
                                                "Orsu",
                                                "Oru East",
                                                "Oru West",
                                                "Owerri-Municipal",
                                                "Owerri North",
                                                "Owerri West"
                                            ],
                                            "Jigawa": [
                                                "Auyo",
                                                "Babura",
                                                "Birni Kudu",
                                                "Biriniwa",
                                                "Buji",
                                                "Dutse",
                                                "Gagarawa",
                                                "Garki",
                                                "Gumel",
                                                "Guri",
                                                "Gwaram",
                                                "Gwiwa",
                                                "Hadejia",
                                                "Jahun",
                                                "Kafin Hausa",
                                                "Kaugama Kazaure",
                                                "Kiri Kasamma",
                                                "Kiyawa",
                                                "Maigatari",
                                                "Malam Madori",
                                                "Miga",
                                                "Ringim",
                                                "Roni",
                                                "Sule-Tankarkar",
                                                "Taura",
                                                "Yankwashi"
                                            ],
                                            "Kaduna": [
                                                "Birni-Gwari",
                                                "Chikun",
                                                "Giwa",
                                                "Igabi",
                                                "Ikara",
                                                "jaba",
                                                "Jema'a",
                                                "Kachia",
                                                "Kaduna North",
                                                "Kaduna South",
                                                "Kagarko",
                                                "Kajuru",
                                                "Kaura",
                                                "Kauru",
                                                "Kubau",
                                                "Kudan",
                                                "Lere",
                                                "Makarfi",
                                                "Sabon-Gari",
                                                "Sanga",
                                                "Soba",
                                                "Zango-Kataf",
                                                "Zaria"
                                            ],
                                            "Kano": [
                                                "Ajingi",
                                                "Albasu",
                                                "Bagwai",
                                                "Bebeji",
                                                "Bichi",
                                                "Bunkure",
                                                "Dala",
                                                "Dambatta",
                                                "Dawakin Kudu",
                                                "Dawakin Tofa",
                                                "Doguwa",
                                                "Fagge",
                                                "Gabasawa",
                                                "Garko",
                                                "Garum",
                                                "Mallam",
                                                "Gaya",
                                                "Gezawa",
                                                "Gwale",
                                                "Gwarzo",
                                                "Kabo",
                                                "Kano Municipal",
                                                "Karaye",
                                                "Kibiya",
                                                "Kiru",
                                                "kumbotso",
                                                "Kunchi",
                                                "Kura",
                                                "Madobi",
                                                "Makoda",
                                                "Minjibir",
                                                "Nasarawa",
                                                "Rano",
                                                "Rimin Gado",
                                                "Rogo",
                                                "Shanono",
                                                "Sumaila",
                                                "Takali",
                                                "Tarauni",
                                                "Tofa",
                                                "Tsanyawa",
                                                "Tudun Wada",
                                                "Ungogo",
                                                "Warawa",
                                                "Wudil"
                                            ],
                                            "Katsina": [
                                                "Bakori",
                                                "Batagarawa",
                                                "Batsari",
                                                "Baure",
                                                "Bindawa",
                                                "Charanchi",
                                                "Dandume",
                                                "Danja",
                                                "Dan Musa",
                                                "Daura",
                                                "Dutsi",
                                                "Dutsin-Ma",
                                                "Faskari",
                                                "Funtua",
                                                "Ingawa",
                                                "Jibia",
                                                "Kafur",
                                                "Kaita",
                                                "Kankara",
                                                "Kankia",
                                                "Katsina",
                                                "Kurfi",
                                                "Kusada",
                                                "Mai'Adua",
                                                "Malumfashi",
                                                "Mani",
                                                "Mashi",
                                                "Matazuu",
                                                "Musawa",
                                                "Rimi",
                                                "Sabuwa",
                                                "Safana",
                                                "Sandamu",
                                                "Zango"
                                            ],
                                            "Kebbi": [
                                                "Aleiro",
                                                "Arewa-Dandi",
                                                "Argungu",
                                                "Augie",
                                                "Bagudo",
                                                "Birnin Kebbi",
                                                "Bunza",
                                                "Dandi",
                                                "Fakai",
                                                "Gwandu",
                                                "Jega",
                                                "Kalgo",
                                                "Koko/Besse",
                                                "Maiyama",
                                                "Ngaski",
                                                "Sakaba",
                                                "Shanga",
                                                "Suru",
                                                "Wasagu/Danko",
                                                "Yauri",
                                                "Zuru"
                                            ],
                                            "Kogi": [
                                                "Adavi",
                                                "Ajaokuta",
                                                "Ankpa",
                                                "Bassa",
                                                "Dekina",
                                                "Ibaji",
                                                "Idah",
                                                "Igalamela-Odolu",
                                                "Ijumu",
                                                "Kabba/Bunu",
                                                "Kogi",
                                                "Lokoja",
                                                "Mopa-Muro",
                                                "Ofu",
                                                "Ogori/Mangongo",
                                                "Okehi",
                                                "Okene",
                                                "Olamabolo",
                                                "Omala",
                                                "Yagba East",
                                                "Yagba West"
                                            ],
                                            "Kwara": [
                                                "Asa",
                                                "Baruten",
                                                "Edu",
                                                "Ekiti",
                                                "Ifelodun",
                                                "Ilorin East",
                                                "Ilorin West",
                                                "Irepodun",
                                                "Isin",
                                                "Kaiama",
                                                "Moro",
                                                "Offa",
                                                "Oke-Ero",
                                                "Oyun",
                                                "Pategi"
                                            ],
                                            "Lagos": [
                                                "Agege",
                                                "Ajeromi-Ifelodun",
                                                "Alimosho",
                                                "Amuwo-Odofin",
                                                "Apapa",
                                                "Badagry",
                                                "Epe",
                                                "Eti-Osa",
                                                "Ibeju/Lekki",
                                                "Ifako-Ijaye",
                                                "Ikeja",
                                                "Ikorodu",
                                                "Kosofe",
                                                "Lagos Island",
                                                "Lagos Mainland",
                                                "Mushin",
                                                "Ojo",
                                                "Oshodi-Isolo",
                                                "Shomolu",
                                                "Surulere"
                                            ],
                                            "Nasarawa": [
                                                "Akwanga",
                                                "Awe",
                                                "Doma",
                                                "Karu",
                                                "Keana",
                                                "Keffi",
                                                "Kokona",
                                                "Lafia",
                                                "Nasarawa",
                                                "Nasarawa-Eggon",
                                                "Obi",
                                                "Toto",
                                                "Wamba"
                                            ],
                                            "Niger": [
                                                "Agaie",
                                                "Agwara",
                                                "Bida",
                                                "Borgu",
                                                "Bosso",
                                                "Chanchaga",
                                                "Edati",
                                                "Gbako",
                                                "Gurara",
                                                "Katcha",
                                                "Kontagora",
                                                "Lapai",
                                                "Lavun",
                                                "Magama",
                                                "Mariga",
                                                "Mashegu",
                                                "Mokwa",
                                                "Muya",
                                                "Pailoro",
                                                "Rafi",
                                                "Rijau",
                                                "Shiroro",
                                                "Suleja",
                                                "Tafa",
                                                "Wushishi"
                                            ],
                                            "Ogun": [
                                                "Abeokuta North",
                                                "Abeokuta South",
                                                "Ado-Odo/Ota",
                                                "Egbado North",
                                                "Egbado South",
                                                "Ewekoro",
                                                "Ifo",
                                                "Ijebu East",
                                                "Ijebu North",
                                                "Ijebu North East",
                                                "Ijebu Ode",
                                                "Ikenne",
                                                "Imeko-Afon",
                                                "Ipokia",
                                                "Obafemi-Owode",
                                                "Ogun Waterside",
                                                "Odeda",
                                                "Odogbolu",
                                                "Remo North",
                                                "Shagamu"
                                            ],
                                            "Ondo": [
                                                "Akoko North East",
                                                "Akoko North West",
                                                "Akoko South Akure East",
                                                "Akoko South West",
                                                "Akure North",
                                                "Akure South",
                                                "Ese-Odo",
                                                "Idanre",
                                                "Ifedore",
                                                "Ilaje",
                                                "Ile-Oluji",
                                                "Okeigbo",
                                                "Irele",
                                                "Odigbo",
                                                "Okitipupa",
                                                "Ondo East",
                                                "Ondo West",
                                                "Ose",
                                                "Owo"
                                            ],
                                            "Osun": [
                                                "Aiyedade",
                                                "Aiyedire",
                                                "Atakumosa East",
                                                "Atakumosa West",
                                                "Boluwaduro",
                                                "Boripe",
                                                "Ede North",
                                                "Ede South",
                                                "Egbedore",
                                                "Ejigbo",
                                                "Ife Central",
                                                "Ife East",
                                                "Ife North",
                                                "Ife South",
                                                "Ifedayo",
                                                "Ifelodun",
                                                "Ila",
                                                "Ilesha East",
                                                "Ilesha West",
                                                "Irepodun",
                                                "Irewole",
                                                "Isokan",
                                                "Iwo",
                                                "Obokun",
                                                "Odo-Otin",
                                                "Ola-Oluwa",
                                                "Olorunda",
                                                "Oriade",
                                                "Orolu",
                                                "Osogbo"
                                            ],
                                            "Oyo": [
                                                "Afijio",
                                                "Akinyele",
                                                "Atiba",
                                                "Atigbo",
                                                "Egbeda",
                                                "Ibadan Central",
                                                "Ibadan North",
                                                "Ibadan North West",
                                                "Ibadan South East",
                                                "Ibadan South West",
                                                "Ibarapa Central",
                                                "Ibarapa East",
                                                "Ibarapa North",
                                                "Ido",
                                                "Irepo",
                                                "Iseyin",
                                                "Itesiwaju",
                                                "Iwajowa",
                                                "Kajola",
                                                "Lagelu Ogbomosho North",
                                                "Ogbmosho South",
                                                "Ogo Oluwa",
                                                "Olorunsogo",
                                                "Oluyole",
                                                "Ona-Ara",
                                                "Orelope",
                                                "Ori Ire",
                                                "Oyo East",
                                                "Oyo West",
                                                "Saki East",
                                                "Saki West",
                                                "Surulere"
                                            ],
                                            "Plateau": [
                                                "Barikin Ladi",
                                                "Bassa",
                                                "Bokkos",
                                                "Jos East",
                                                "Jos North",
                                                "Jos South",
                                                "Kanam",
                                                "Kanke",
                                                "Langtang North",
                                                "Langtang South",
                                                "Mangu",
                                                "Mikang",
                                                "Pankshin",
                                                "Qua'an Pan",
                                                "Riyom",
                                                "Shendam",
                                                "Wase"
                                            ],
                                            "Rivers": [
                                                "Abua/Odual",
                                                "Ahoada East",
                                                "Ahoada West",
                                                "Akuku Toru",
                                                "Andoni",
                                                "Asari-Toru",
                                                "Bonny",
                                                "Degema",
                                                "Emohua",
                                                "Eleme",
                                                "Etche",
                                                "Gokana",
                                                "Ikwerre",
                                                "Khana",
                                                "Obia/Akpor",
                                                "Ogba/Egbema/Ndoni",
                                                "Ogu/Bolo",
                                                "Okrika",
                                                "Omumma",
                                                "Opobo/Nkoro",
                                                "Oyigbo",
                                                "Port-Harcourt",
                                                "Tai"
                                            ],
                                            "Sokoto": [
                                                "Binji",
                                                "Bodinga",
                                                "Dange-shnsi",
                                                "Gada",
                                                "Goronyo",
                                                "Gudu",
                                                "Gawabawa",
                                                "Illela",
                                                "Isa",
                                                "Kware",
                                                "kebbe",
                                                "Rabah",
                                                "Sabon birni",
                                                "Shagari",
                                                "Silame",
                                                "Sokoto North",
                                                "Sokoto South",
                                                "Tambuwal",
                                                "Tqngaza",
                                                "Tureta",
                                                "Wamako",
                                                "Wurno",
                                                "Yabo"
                                            ],
                                            "Taraba": [
                                                "Ardo-kola",
                                                "Bali",
                                                "Donga",
                                                "Gashaka",
                                                "Cassol",
                                                "Ibi",
                                                "Jalingo",
                                                "Karin-Lamido",
                                                "Kurmi",
                                                "Lau",
                                                "Sardauna",
                                                "Takum",
                                                "Ussa",
                                                "Wukari",
                                                "Yorro",
                                                "Zing"
                                            ],
                                            "Yobe": [
                                                "Bade",
                                                "Bursari",
                                                "Damaturu",
                                                "Fika",
                                                "Fune",
                                                "Geidam",
                                                "Gujba",
                                                "Gulani",
                                                "Jakusko",
                                                "Karasuwa",
                                                "Karawa",
                                                "Machina",
                                                "Nangere",
                                                "Nguru Potiskum",
                                                "Tarmua",
                                                "Yunusari",
                                                "Yusufari"
                                            ],
                                            "Zamfara": [
                                                "Anka",
                                                "Bakura",
                                                "Birnin Magaji",
                                                "Bukkuyum",
                                                "Bungudu",
                                                "Gummi",
                                                "Gusau",
                                                "Kaura",
                                                "Namoda",
                                                "Maradun",
                                                "Maru",
                                                "Shinkafi",
                                                "Talata Mafara",
                                                "Tsafe",
                                                "Zurmi"
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
                        
                            <div class="form-group">
                                <div class="col-md-12 form-group">
                                    <div <?php if($errors->has('eaddress')): ?> class ='has-error form-group' <?php endif; ?>>

                                        <label for="address">Address :</label>
                                        <?php echo Form::textarea('address', null, [
                                        'placeholder' => '',
                                        'rows' => '5',
                                        'class' => 'form-control',
                                        'id' => 'address',
                                        'required' => 'required',
                                        ]); ?>

                                        <span class="text-danger"> <?php echo e($errors->first('address')); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="religion">How did you hear about us :</label>
                                    <?php echo e(Form::select(
                                    'referral',
                                    [
                                    'Social Media' => 'Social Media',
                                    'From a friend' => 'From a friend',
                                    'Google' => 'Google',
                                    'Television' => 'Television',
                                    'Church' => 'Church',
                                    ],
                                    'Social Media',
                                    ['class' => 'form-control select2'],
                                    )); ?>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">

                                    

                                    <button type="submit" class="btn btn-success">
                                        <?php echo e(__('Save and continue')); ?>

                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>


                    <div class="tab-pane fade<?php echo e($transfers->status == 1 ? ' show active' : ''); ?>" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab">
                        <form method="POST" action="/transferssponsors" enctype="multipart/form-data" class="p-3">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for=""><?php echo e(__('First Name')); ?> </label>
                                    <input id="fname" type="text" name="name" class="form-control" placeholder="Full Name" autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Phone Number')); ?> </label>
                                    <input id="phone" type="text" name="sponsors_phone" class="form-control" placeholder="Phone Number" autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Email')); ?> </label>
                                    <input id="foccupation" type="text" name="sponsors_email" class="form-control" placeholder="Email" autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Address')); ?> </label>
                                    <textarea id="address" type="text" class="form-control" name="sponsors_address" required placeholder="Address"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for=""><?php echo e(__('Occupation')); ?> </label>
                                <input id="foccupation" type="text" name="occupation" class="form-control" placeholder="Occupation" autofocus>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    
                                    <button type="submit" class="btn btn-success mt-5">
                                        <?php echo e(__('Save and continue')); ?>

                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>


                    <div class="tab-pane fade<?php echo e($transfers->status == 2 ? ' show active' : ''); ?>" id="profile2-tab-pane" role="tabpanel" aria-labelledby="profile2-tab">
                          <form method="POST" action="/transfersinformation" class="p-3">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-group">

                                                <div class="form-group">
                                                    <input id="institution" type="text" class="form-control" name="institution" placeholder="Previous Institution" required autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group">

                                                <div class="form-group">
                                                    <input id="score" type="text" class="form-control" name="matric_no" placeholder="Matriculation Number" autofocus required>
                                                </div>
                                            </div>
                                            <div class="form-group">

                                                <div class="form-group">
                                                    <input id="first_choice" type="text" name="entry_year" class="form-control" placeholder="Year of Entry" autofocus required>
                                                </div>
                                            </div>
                                            <div class="form-group">


                                                 <div class="form-group">
                            <label for="religion">Year of Study :</label>
                            <?php echo e(Form::select(
                                'level',
                                [
                                    '100' => '100 level',
                                    '200' => '200 level',
                                    '300' => '300 level',
                                    '400' => '400 level',

                                ],
                                'Social Media',
                                ['class' => 'form-control select2'],
                            )); ?>

                        </div>


                                            </div>

                                            <div class="form-group">

                                                <div class="form-group">
                                                    <input id="course" type="text" class="form-control" name="course" placeholder="Previous Couse of Study" autofocus required>
                                                </div>
                                            </div>
                                            <div class="form-group">

                                                <div class="form-group">
                                                    <input id="cpga" type="text" class="form-control" name="cgpa" placeholder="CGPA" autofocus required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="refferal"><?php echo e(__('Proposed Course of Study')); ?> </label>
                                                    <select class="form-select text-lg" name="course_applied">
                                                        <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <option value="<?php echo e($program->name); ?>"><?php echo e($program->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-group">

                                                    
                                                    <button type="submit" class="btn btn-success">
                                                        <?php echo e(__('Save and continue')); ?>

                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                    </div>


                    <div class="tab-pane fade<?php echo e($transfers->status == 3 ? ' show active' : ''); ?>" id="profile3-tab-pane" role="tabpanel" aria-labelledby="profile3-tab">
                        <form method="POST" action="/utmeuploads" enctype="multipart/form-data" class="p-3">
                            <?php echo csrf_field(); ?>


                            <div class="form-group">

                                <?php if(session('statusMsg')): ?>
                                <?php echo session('statusMsg'); ?>

                                <?php endif; ?>
                                <p>Upload Transcript
                                
                                </p>

                                <div class="form-group">
                                    <input id="jamb" type="file" class="form-control" name="jamb">
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="passport"><?php echo e(__('Upload Olevel Result')); ?>

                                
                                </label>

                                <div class="form-group">
                                    <input id="olevel1" type="file" class="form-control" name="olevel1">
                                </div>
                            </div>
                            <div class="form-group">

                                <p>Upload Result <b class="text-danger">( if any)</b></p>
                                <div class="form-group">
                                    <input id="olevel2" type="file" class="form-control" name="olevel2">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">

                                    
                                    <button type="submit" class="btn btn-success">
                                        <?php echo e(__('Save')); ?>

                                    </button>
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
<!-- External JavaScripts
            ============================================= -->
<script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo e(asset('dist/js/components/bootstrap-datepicker.js')); ?>"></script>
<!-- Bootstrap File Upload Plugin -->
<script src="<?php echo e(asset('dist/js/components/bs-filestyle.js')); ?>"></script>

<script src="<?php echo e(asset('js/jquery.js')); ?>"></script>

<!-- bootstrap datepicker -->
<script src="<?php echo e(asset('dist/js/components/bootstrap-datepicker.js')); ?>"></script>
<!-- Bootstrap File Upload Plugin -->
<script src="<?php echo e(asset('dist/js/components/bs-filestyle.js')); ?>"></script>

<script type="text/javascript">
    //Date picker
    $('#dob').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    })
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

            $("#olevel1").fileinput({
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

            $("#olevel2").fileinput({
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminsials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\Documents\WEB DEV\Work-VUNA\laraproject\resources\views/admissions//transfers.blade.php ENDPATH**/ ?>
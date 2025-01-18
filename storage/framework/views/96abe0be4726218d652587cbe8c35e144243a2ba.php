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


                <div class="row gy-4">
                    <div class="col-lg-9">
                        <!-- Widgets Start -->
                        <div class="row gy-4">
                             <div class="row p-5">
                        <?php $__currentLoopData = $admissiontype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-3">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h4 text-success" style="text-decoration: underline;">

                                                <a href="<?php echo e($session->route); ?>" class="text-success <?php echo $__env->yieldContent('registration'); ?>"><?php echo e($session->name); ?></a>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-tasks fa-3x text-success"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                        </div>
                        <!-- Widgets End -->
<section class="content">

        <?php if(session('signUpMsg')): ?>
        <?php echo session('signUpMsg'); ?>

        <?php endif; ?>

        <div class="card mb-4">
            <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                UTME INFORMATION
            </h1>
            <div class="card-body p-5">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    
                </ul>


                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade<?php echo e($utme->status == 0 ? ' show active' : ''); ?>" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab">
                        <form method="POST" action="/utmebiodata" enctype="multipart/form-data" class="p-3">
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
unset($__errorArgs, $__bag); ?>" name="surname" placeholder="<?php echo e($utme->surname); ?>" readonly autofocus>
                                    <input id="status" type="hidden" class="form-control " name="'<?php echo e($utme->status); ?>" readonly autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for=""><?php echo e(__('First Name')); ?> </label>
                                    <input id="first_name" type="text" class="form-control" name="first_name" placeholder="<?php echo e($utme->first_name); ?>" readonly autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Email')); ?> </label>
                                    <input id="email" type="email" class="form-control " name="email" placeholder="<?php echo e($utme->email); ?>" readonly autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Phone')); ?> </label>
                                    <input id="phone" type="phone" class="form-control" name="phone" autocomplete="phone" placeholder="<?php echo e($utme->phone); ?>" readonly autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Middle Name')); ?> </label>
                                    <input id="middle_name" type="text" class="form-control" name="middle_name" placeholder="<?php echo e($utme->middle_name ?? null); ?>" value="<?php echo e($utme->middle_name ?? null); ?>" readonly autofocus>
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
                                    <select class="form-control" name="state_origin" id="state" placeholder="Pick State" onchange="show(this)">
                                    </select>

                                </div>
                                <span class="help-block" id="helpstate"></span>
                            </div>

                            <div class="col-md-12 form-group" id="slga1" style="display: none;">
                                <div <?php if($errors->has('nationality')): ?> class ='has-error form-group' <?php endif; ?>>
                                    <label for="nationality">Local Government Area :</label>
                                </div>
                                <div class="has-error form-group">
                                    <select class="form-control" name="lga" id="slga" placeholder="State LGA">
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
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Address')); ?> </label>
                                    <textarea id="address" type="text" class="form-control" name="address" required placeholder="Address"> </textarea>
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

                                    

                                    <button type="submit" class="btn btn-success mt-5">
                                        <?php echo e(__('Save and continue')); ?>

                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>


                    <div class="tab-pane fade<?php echo e($utme->status == 1 ? ' show active' : ''); ?>" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab">
                        <form method="POST" action="/utmesponsers" class="p-3">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Title')); ?> </label>
                                    <input id="fname" type="text" name="sponsor_title" class="form-control" placeholder="" autofocus>
                                </div>
                            </div>
                             <div class="form-group">
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Relationship')); ?> </label>
                                    <input id="fname" type="text" name="sponsor_relationship" class="form-control" placeholder="" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Full Name')); ?> </label>
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


                    <div class="tab-pane fade<?php echo e($utme->status == 2 ? ' show active' : ''); ?>" id="profile2-tab-pane" role="tabpanel" aria-labelledby="profile2-tab">
                        <form method="POST" action="/utmejamb" enctype="multipart/form-data" class="p-3">
                            <?php echo csrf_field(); ?>

                            <div class="form-group">

                                <div class="form-group">
                                    <input id="score" type="text" name="jamb_reg_no" class="form-control" placeholder="Jamb Registration number" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="refferal"><?php echo e(__('COURSE OF STUDY:')); ?> </label>
                                    <select class="form-group col-12 text-lg" name="course_applied">
                                        <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($program->name); ?>"><?php echo e($program->name); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                </div>
                            </div>
                            <label for="refferal"><?php echo e(__('UTME UNIVERSITY CHOICE:')); ?> </label>
                            <div class="form-group">

                                <div class="form-group">
                                    <input id="first_choice" type="text" name="first_choice" class="form-control" placeholder="University First Choice" autofocus>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="form-group">
                                    <input id="second_choice" type="text" name="second_choice" class="form-control" placeholder="University Second Choice" autofocus>
                                </div>
                            </div>
                            <label for="refferal"><?php echo e(__('UTME SUBJECT :')); ?> </label>
                            <div class="form-group">

                                <div class="form-group">
                                    <input id="subject_1" type="text" name="subject_1" class="form-control" placeholder="Subject one" autofocus>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="form-group">
                                    <input id="subject_2" type="text" name="subject_2" class="form-control" placeholder="Subject Two" autofocus>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="form-group">
                                    <input id="subject_3" type="text" name="subject_3" class="form-control" placeholder="Subject Three" autofocus>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="form-group">
                                    <input id="subject_4" type="text" class="form-control" name="subject_4" placeholder="Subject Four" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="refferal"><?php echo e(__('JAMB SCORE:')); ?> </label>
                                <div class="form-group">
                                    <input id="score" type="text" name="score" class="form-control" placeholder="Jamb Score" autofocus>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success mt-5">
                                <?php echo e(__('Save and continue')); ?>

                            </button>
                        </form>
                    </div>


                    <div class="tab-pane fade<?php echo e($utme->status == 3 ? ' show active' : ''); ?>" id="profile3-tab-pane" role="tabpanel" aria-labelledby="profile3-tab">
                        <form method="POST" action="/utmeuploads" enctype="multipart/form-data" class="p-3">
                            <?php echo csrf_field(); ?>


                            <div class="form-group">

                                <?php if(session('statusMsg')): ?>
                                <?php echo session('statusMsg'); ?>

                                <?php endif; ?>
                                <label for="passport"><?php echo e(__('Jamb Result:')); ?>

                                    
                                </label>

                                <div class="form-group">
                                    <input id="jamb" type="file" class="form-control" name="jamb">
                                </div>
                            </div>

                            <div class="d-flex align-items-center mb-5">
                                <input class="" type="checkbox" name="olevel_awaiting" value="Awaiting Result" id="flexCheckDefault">
                                <label class="form-check-label text-bold px-2" for="flexCheckDefault">
                                    Awaiting Result
                                </label>
                            </div>


                            <div class="form-group">
                                <label><?php echo e(__('Upload Olevel Result:')); ?></label>

                                <div class="form-group">
                                    <input id="olevel1" type="file" class="form-control" name="olevel1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label><?php echo e(__('Upload Additional Olevel Result - If any:')); ?></label>
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

                    <div class="col-lg-3">
                        <!-- Calendar Start -->
                        <div class="card">
                            <div class="card-body">
                                <div class="calendar">
                                    <div class="calendar__header">
                                        <button type="button" class="calendar__arrow left"><i class="ph ph-caret-left"></i></button>
                                        <p class="display h6 mb-0">""</p>
                                        <button type="button" class="calendar__arrow right"><i class="ph ph-caret-right"></i></button>
                                    </div>

                                    <div class="calendar__week week">
                                        <div class="calendar__week-text">Su</div>
                                        <div class="calendar__week-text">Mo</div>
                                        <div class="calendar__week-text">Tu</div>
                                        <div class="calendar__week-text">We</div>
                                        <div class="calendar__week-text">Th</div>
                                        <div class="calendar__week-text">Fr</div>
                                        <div class="calendar__week-text">Sa</div>
                                    </div>
                                    <div class="days"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Calendar End -->

                        <!-- Assignment Start -->
                        <div class="card mt-24">
                            <div class="card-body">
                                <div class="mb-20 flex-between flex-wrap gap-8">
                                    <h4 class="mb-0">Assignments</h4>
                                    <a href="assignment.html" class="text-13 fw-medium text-main-600 hover-text-decoration-underline">See All</a>
                                </div>
                                <div class="p-xl-4 py-16 px-12 flex-between gap-8 rounded-8 border border-gray-100 hover-border-gray-200 transition-1 mb-16">
                                    <div class="flex-align flex-wrap gap-8">
                                        <span class="text-main-600 bg-main-50 w-44 h-44 rounded-circle flex-center text-2xl flex-shrink-0"><i class="ph-fill ph-graduation-cap"></i></span>
                                        <div>
                                            <h6 class="mb-0">Do The Research</h6>
                                            <span class="text-13 text-gray-400">Due in 9 days</span>
                                        </div>
                                    </div>
                                    <a href="assignment.html" class="text-gray-900 hover-text-main-600"><i class="ph ph-caret-right"></i></a>
                                </div>
                                <div class="p-xl-4 py-16 px-12 flex-between gap-8 rounded-8 border border-gray-100 hover-border-gray-200 transition-1 mb-16">
                                    <div class="flex-align flex-wrap gap-8">
                                        <span class="text-main-600 bg-main-50 w-44 h-44 rounded-circle flex-center text-2xl flex-shrink-0"><i class="ph ph-code"></i></span>
                                        <div>
                                            <h6 class="mb-0">PHP Dvelopment</h6>
                                            <span class="text-13 text-gray-400">Due in 2 days</span>
                                        </div>
                                    </div>
                                    <a href="assignment.html" class="text-gray-900 hover-text-main-600"><i class="ph ph-caret-right"></i></a>
                                </div>
                                <div class="p-xl-4 py-16 px-12 flex-between gap-8 rounded-8 border border-gray-100 hover-border-gray-200 transition-1">
                                    <div class="flex-align flex-wrap gap-8">
                                        <span class="text-main-600 bg-main-50 w-44 h-44 rounded-circle flex-center text-2xl flex-shrink-0"><i class="ph ph-bezier-curve"></i></span>
                                        <div>
                                            <h6 class="mb-0">Graphic Design</h6>
                                            <span class="text-13 text-gray-400">Due in 5 days</span>
                                        </div>
                                    </div>
                                    <a href="assignment.html" class="text-gray-900 hover-text-main-600"><i class="ph ph-caret-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Assignment End -->

                        <!-- Progress Bar Start -->
                        <div class="card mt-24">
                            <div class="card-header border-bottom border-gray-100">
                                <h5 class="mb-0">My Progress</h5>
                            </div>
                            <div class="card-body">
                               <div id="radialMultipleBar"></div>

                               <div class="">
                                    <h6 class="text-lg mb-16 text-center"> <span class="text-gray-400">Total hour:</span> 6h 32 min</h6>
                                    <div class="flex-between gap-8 flex-wrap">
                                        <div class="flex-align flex-column">
                                            <h6 class="mb-6">60/60</h6>
                                            <span class="w-30 h-3 rounded-pill bg-main-600"></span>
                                            <span class="text-13 mt-6 text-gray-600">Completed</span>
                                        </div>
                                        <div class="flex-align flex-column">
                                            <h6 class="mb-6">60/60</h6>
                                            <span class="w-30 h-3 rounded-pill bg-main-two-600"></span>
                                            <span class="text-13 mt-6 text-gray-600">Completed</span>
                                        </div>
                                        <div class="flex-align flex-column">
                                            <h6 class="mb-6">60/60</h6>
                                            <span class="w-30 h-3 rounded-pill bg-gray-500"></span>
                                            <span class="text-13 mt-6 text-gray-600">Completed</span>
                                        </div>
                                    </div>
                               </div>
                            </div>
                        </div>
                        <!-- Progress bar end -->
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
    function updateCalendar() {
    const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    const date = new Date();

    const currentMonth = date.getMonth(); // Current month (0-11)
    const currentYear = date.getFullYear(); // Current year (e.g., 2025)
    const currentDay = date.getDate(); // Current day of the month (1-31)

    // Display the current month and year in the calendar header
    document.querySelector('.calendar__header .display').innerHTML = `${monthNames[currentMonth]} ${currentYear}`;

    // Get the first day of the month and the total number of days in the month
    const firstDay = new Date(currentYear, currentMonth, 1).getDay(); // Day of the week for the 1st of the month (0-6)
    const totalDays = new Date(currentYear, currentMonth + 1, 0).getDate(); // Total days in the month

    // Generate the days of the month in the calendar
    const daysContainer = document.querySelector('.days');
    daysContainer.innerHTML = ''; // Clear any previous days

    // Create empty cells for the days before the first day of the month
    for (let i = 0; i < firstDay; i++) {
        daysContainer.innerHTML += `<div class="calendar__day empty"></div>`;
    }

    // Add the actual days of the month
    for (let i = 1; i <= totalDays; i++) {
        // Check if the day is the current day and add the 'today' class
        const isToday = i === currentDay ? 'today' : '';

        // Add the day to the calendar
        daysContainer.innerHTML += `<div class="calendar__day ${isToday}">${i}</div>`;
    }
}

// Call the updateCalendar function when the page loads
window.onload = updateCalendar;

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminsials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Downloads\Onoyima (1)\work\incla\resources\views/admissions/home.blade.php ENDPATH**/ ?>
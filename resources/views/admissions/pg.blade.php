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
    <!-- Content Header (Page header) -->
    <section class="content">

        @if (session('signUpMsg'))
        {!! session('signUpMsg') !!}
        @endif

        <div class="card mb-4">
            <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                POSTGRADUATE INFORMATION
            </h1>
            <div class="card-body p-5">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link{{ $pg->status == 0 ? ' active' : '' }} text-success fw-bold text-capitalize" id="home-tab" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="{{ $pg->status  == 0 ? 'true' : 'false' }}">Biodata</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link{{ $pg->status  == 1 ? ' active' : '' }} text-success fw-bold text-capitalize" id="profile-tab" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="{{ $pg->status  == 1 ? 'true' : 'false' }}">Sponsor Information</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link{{ $pg->status  == 2 ? ' active' : '' }} text-success fw-bold text-capitalize" id="profile2-tab" type="button" role="tab" aria-controls="profile2-tab-pane" aria-selected="{{ $pg->status  == 2 ? 'true' : 'false' }}">PostGraduate Information</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link{{ $pg->status  == 3 ? ' active' : '' }} text-success fw-bold text-capitalize" id="profile3-tab" type="button" role="tab" aria-controls="profile3-tab-pane" aria-selected="{{ $pg->status  == 3 ? 'true' : 'false' }}">Upload Documents</button>
                    </li>
                </ul>


                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade{{ $pg->status == 0 ? ' show active' : '' }}" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab">
                        <form method="POST" action="/pgbiodata" enctype="multipart/form-data" class="p-3">
                            @csrf

                            <label for="">{{ __('Surname') }} </label>

                            <div class="form-group">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" placeholder="{{ $pg->surname}}" readonly autofocus>
                                <input id="status" type="hidden" class="form-control " name="status" value="{{ $pg->status }}" readonly autofocus>
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('First Name') }} </label>
                                <input id="first_name" type="text" class="form-control" name="first_name" placeholder="{{ $pg->first_name}}" readonly autofocus>
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('Email') }} </label>
                                <input id="email" type="email" class="form-control " name="email" placeholder="{{ $pg->email}}" readonly autofocus>
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('Phone') }} </label>
                                <input id="phone" type="phone" class="form-control" name="phone" autocomplete="phone" placeholder="{{ $pg->phone}}" readonly autofocus>
                            </div>


                            <div class="form-group">
                                <label for="">{{ __('Middle Name') }} </label>
                                <input id="middle_name" type="text" class="form-control" name="middle_name" placeholder="{{ $utme->middle_name ?? null}}" value="{{ $utme->middle_name ?? null }}" readonly autofocus>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="passport">Passport :</label>
                                {!! Form::file('passport', [
                                'class' => 'form-control file-loading',
                                'id' => 'passport',
                                'placeholder' => 'Choose profile pic',
                                'name' => 'passport',
                                'accept' => 'image/*',
                                'required' => 'required',
                                ]) !!}
                                <span class="text-danger"> {{ $errors->first('passport') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="type">Gender :</label>
                                {{ Form::select(
                                    'gender',
                                    [
                                    'Male' => 'Male',
                                    'Female' => 'Female',
                                    ],
                                    'Male',
                                    ['class' => 'form-control select2'],
                                    ) }}
                            </div>

                            <div class="form-group">
                                <label for="religion">Religion :</label>
                                {{ Form::select(
                                    'religion',
                                    [
                                    'Christain(Catholic)' => 'Christain (Catholic)',
                                    'Christain(Non-Catholic)' => 'Christain (non-Catholic)',
                                    'Muslim' => 'Muslim',
                                    'Other' => 'Other',
                                    ],
                                    'Catholic',
                                    ['class' => 'form-control select2'],
                                    ) }}
                            </div>


                            <div class="form-group">
                                <label for="dob">{{ __('Date of Birth') }} </label>
                                <input id="dob" type="date" class="form-control" name="dob" required>
                            </div>

                            <div class="form-group">
                                <label for="program_id">Nationality :</label>
                                {{ Form::select('nationality', $country, null, ['class' => 'form-control', 'id' => 'nationality', 'name' => 'nationality']) }}
                                <span class="text-danger"> {{ $errors->first('nationality') }}</span>
                            </div>


                            <div class="form-group" style="margin-top:0px" id="state1">
                                <div @if ($errors->has('nationality')) class ='has-error form-group' @endif>
                                    <label for="nationality">State of Origin :</label>
                                </div>
                                <div class="has-error form-group">
                                    <select class="form-control" name="state_origin" id="state" placeholder="Pick State" onchange="show(this)">
                                    </select>
                                </div>
                                <span class="help-block" id="helpstate"></span>
                            </div>

                            <div class="col-md-12 form-group" id="slga1" style="display: none;">
                                <div @if ($errors->has('nationality')) class ='has-error form-group' @endif>
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
                                <label for="">{{ __('Address') }} </label>
                                <textarea id="address" type="text" class="form-control" name="address" required placeholder="Address"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="religion">How did you hear about us :</label>
                                {{ Form::select(
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
                                    ) }}
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success mt-5">
                                    {{ __('Save and continue') }}
                                </button>
                            </div>

                        </form>
                    </div>

                    <div class="tab-pane fade{{ $pg->status == 1 ? ' show active' : '' }}" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab">
                        <form method="POST" action="/pgsponsors" enctype="multipart/form-data" class="p-3">
                            @csrf
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="">{{ __('Title') }} </label>
                                    <input id="fname" type="text" name="sponsor_title" class="form-control" placeholder="" autofocus>
                                </div>
                            </div>
                             <div class="form-group">
                                <div class="form-group">
                                    <label for="">{{ __('Relationship') }} </label>
                                    <input id="fname" type="text" name="sponsor_relationship" class="form-control" placeholder="" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="">{{ __('Full Name') }} </label>
                                    <input id="fname" type="text" name="name" class="form-control" placeholder="Full Name" autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">{{ __('Phone Number') }} </label>
                                <input id="phone" type="text" name="sponsors_phone" class="form-control" placeholder="Phone Number" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="">{{ __('Email') }} </label>
                                <input id="foccupation" type="text" name="sponsors_email" class="form-control" placeholder="Email" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="">{{ __('Address') }} </label>
                                <textarea id="address" type="text" class="form-control" name="sponsors_address" required placeholder="Address"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="">{{ __('Occupation') }} </label>
                                <input id="foccupation" type="text" name="occupation" class="form-control" placeholder="Occupation" autofocus>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success mt-5">
                                    {{ __('Save and continue') }}
                                </button>
                            </div>
                        </form>
                    </div>


                    <div class="tab-pane fade{{ $pg->status == 2 ? ' show active' : '' }}" id="profile2-tab-pane" role="tabpanel" aria-labelledby="profile2-tab">
                        <form method="POST" action="/pginformation" class="p-3">
                            @csrf

                            <div class="form-group">
                                <label for="refferal">{{ __('PROGRAM:') }} </label>
                                <select class="form-control" name="mode">
                                    {{-- <option disabled selected>Program </option>  --}}
                                    <option value="PGD">PGD</option>
                                    <option value="MBA">MBA</option>
                                    <option value="M.Sc">M.Sc</option>
                                    <option value="PhD">PhD</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="refferal">{{ __('MODE OF LEARNING:') }} </label>
                                <select class="form-control" name="type">
                                    <option value="Full Time">Full Time</option>
                                    <option value="Part Time">Part Time</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input id="first_choice" type="text" class="form-control" name="research_topic" placeholder="Research Topic" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="refferal">{{ __('COURSE OF STUDY') }} </label>
                                <select class="form-control" name="course_applied">
                                    @foreach($programs as $program)
                                    <option value="{{$program->name}}">{{$program->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <br>
                            <h3 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                                Post Secondary Education and Certifications
                            </h3>

                            <div class="form-group">
                                <label for="refferal">{{ __('Institution:') }} </label>
                                <div class="form-group">
                                    <input id="second_choice" type="text" class="form-control" name="institution" placeholder="Institution attended" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="refferal">{{ __('Period:') }} </label>
                                <div class="form-group">
                                    <input id="subject_1" type="text" name="period" class="form-control" placeholder="August 2015 - july 2017" autofocus required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="refferal">{{ __('Course Studied:') }} </label>
                                <div class="form-group">
                                    <input id="subject_2" type="text" name="course" class="form-control" required placeholder="Computer Science" autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="refferal">{{ __('Certificate Obtained:') }} </label>
                                <div class="form-group">
                                    <select class="form-control" name="certificate_type">
                                        {{-- <option disabled selected>Certificate Obtained</option>  --}}
                                        <option value="Degree">Degree</option>
                                        <option value="PGD">PGD</option>
                                        <option value="M.Sc">M.Sc</option>
                                        <option value="PhD">PhD</option>
                                        <option value="Professional">Professional</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="refferal">{{ __('Certificate honor:') }} </label>
                                <div class="form-group">
                                    <input id="subject_3" type="text" name="certificate_name" class="form-control" required placeholder="Second class upper" autofocus>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="form-group">
                                    <input id="subject_4" type="text" name="class_honour" class="form-control" placeholder="CGPA" required autofocus>
                                </div>
                            </div>

                            <h3 class="app-page-title text-uppercase h5 font-weight-bold p-2 mt-5 mb-2 shadow-sm text-center text-success border">
                                REFEREES
                            </h3>
                            <h6 class="h6 text-warning text-center fw-small pt-2"> Provide three (3) referees, two (2) must be your former lecturers. </h6>
                            {{-- First Referee  --}}
                            <br>
                            <br>

                            <label for="refferal">{{ __('First Refree:') }} </label>
                            <div class="form-group">
                                <input id="subject_3" type="text" name="name1" class="form-control" required placeholder="Name" autofocus>
                            </div>
                            <div class="form-group">
                                <input id="subject_3" type="text" name="position1" class="form-control" required placeholder="Position" autofocus>
                            </div>
                            <div class="form-group">
                                <input id="subject_3" type="text" name="institution1" class="form-control" required placeholder="Institution/Organisation" autofocus>
                            </div>
                            <div class="form-group">
                                <input id="subject_3" type="text" name="email1" class="form-control" required placeholder="Email Address" autofocus>
                            </div>
                            {{-- Second referee  --}}

                            <br>
                            <label for="refferal">{{ __('Second Refree:') }} </label>
                             <div class="form-group">
                                <input id="subject_3" type="text" name="name2" class="form-control" required placeholder="Name" autofocus>
                            </div>
                            <div class="form-group">
                                <input id="subject_3" type="text" name="position2" class="form-control" required placeholder="Position" autofocus>
                            </div>
                            <div class="form-group">
                                <input id="subject_3" type="text" name="institution2" class="form-control" required placeholder="Institution/Organisation" autofocus>
                            </div>
                            <div class="form-group">
                                <input id="subject_3" type="text" name="email2" class="form-control" required placeholder="Email Address" autofocus>
                            </div>
                            {{-- third referees  --}}

                            <br>
                            <label for="refferal">{{ __('Third Refree:') }} </label>
                            <div class="form-group">
                                <input id="subject_3" type="text" name="name3" class="form-control" required placeholder="Name" autofocus>
                            </div>
                            <div class="form-group">
                                <input id="subject_3" type="text" name="position3" class="form-control" required placeholder="Position" autofocus>
                            </div>
                            <div class="form-group">
                                <input id="subject_3" type="text" name="institution3" class="form-control" required placeholder="Institution/Organisation" autofocus>
                            </div>
                            <div class="form-group">
                                <input id="subject_3" type="text" name="email3" class="form-control" required placeholder="Email Address" autofocus>
                            </div>

                            <div class="form-group">

                                {{-- @if (session('signUpMsg'))
                                                    {!! session('signUpMsg') !!}
                                                    @endif  --}}
                                <button type="submit" class="btn btn-success mt-5">
                                    {{ __('Save and continue') }}
                                </button>
                            </div>
                        </form>
                    </div>


                    <div class="tab-pane fade{{ $pg->status == 3 ? ' show active' : '' }}" id="profile3-tab-pane" role="tabpanel" aria-labelledby="profile3-tab">
                        <form method="POST" action="/utmeuploads" enctype="multipart/form-data" class="p-3">
                            @csrf
                            <div class="form-group">

                                @if (session('statusMsg'))
                                {!! session('statusMsg') !!}
                                @endif
                                <label for="passport">{{ __('Upload Degree Certificate ') }}
                                </label>

                                <div class="form-group">
                                    <input id="jamb" type="file" class="form-control" name="jamb">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="passport">{{ __('Upload Olevel Result ') }}
                                </label>

                                <div class="form-group">
                                    <input id="olevel1" type="file" class="form-control" name="olevel1">
                                </div>
                            </div>
                            <div class="form-group">

                              <label for="passport">{{ __('Upload  Result (if any)') }}
                                </label>
                                <div class="form-group">
                                    <input id="olevel2" type="file" class="form-control" name="olevel2">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">

                                    {{-- @if (session('signUpMsg'))
                                                    {!! session('signUpMsg') !!}
                                                @endif --}}
                                    <button type="submit" class="btn btn-success mt-5">
                                        {{ __('Save') }}
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

@endsection

@section('pagescript')
<!-- External JavaScripts  -->
<script src="{{ asset('js/jquery.js') }}"></script>

<!-- bootstrap datepicker -->
<script src="{{ asset('dist/js/components/bootstrap-datepicker.js') }}"></script>

<!-- Bootstrap File Upload Plugin -->
<script src="{{ asset('dist/js/components/bs-filestyle.js') }}"></script>


{{--  <script type="text/javascript">
    //Date picker
    $('#dob').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    })
</script>  --}}

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

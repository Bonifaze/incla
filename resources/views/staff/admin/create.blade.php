@extends('layouts.mini')



@section('pagetitle')Create New Staff @endsection


@section('css')


<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{ asset('dist/css/components/bootstrap-datepicker.css')}}" />

<!-- Bootstrap File Upload CSS -->
<link rel="stylesheet" href="{{ asset('dist/css/components/bs-filestyle.css')}}" />


@endsection



<!-- Sidebar Links -->

<!-- Treeview -->
@section('staff-open') menu-open @endsection

@section('staff') active @endsection


<!-- Page -->
 @section('staff-create') active @endsection

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
                        create staff
                    </h1>
            <div class="card ">
              <div class="card-header">
                {{--  <h3 class="card-title">Create New Staff</h3>

                 --}}
              </div>
              <!-- /.card-header -->
            <!-- form start -->

						{!! Form::open(array('route' => 'staff.store', 'method'=>'POST', 'class' => 'nobottommargin', 'files' => true)) !!}
				<div class="card-body">

                     @include('partialsv3.flash')

              <div class="box-body">

              			<div class="row">
              			<div class="col-md-4 form-group">
              			<div  @if($errors->has('surname')) class ='has-error form-group' @endif>
								<label for="surname">Surname :</label>
								{!! Form::text('surname', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'surname', 'required' => 'required')) !!}
							 <span class="text-danger"> {{ $errors->first('surname') }}</span>
							 </div>
							</div>


							<div class="col-md-4 form-group">
							<div  @if($errors->has('first_name')) class ='has-error form-group' @endif>
								<label for="first_name">First Name :</label>
								{!! Form::text('first_name', null, array('placeholder' => '', 'class' => 'form-control', 'id' => 'first_name', 'required' => 'required')) !!}
							 <span class="text-danger"> {{ $errors->first('first_name') }}</span>
							</div>
							</div>


							<div class="col-md-4 form-group">
							<div  @if($errors->has('middle_name')) class ='has-error form-group' @endif>
								<label for="middle_name">Middle Name :</label>
								{!! Form::text('middle_name', null, array('placeholder' => '', 'class' => 'form-control', 'id' => 'middle_name')) !!}
							 <span class="text-danger"> {{ $errors->first('middle_name') }}</span>
							</div>
							</div>


							</div>

							<div class="row">
							<div class="col-md-4 form-group">
								<label for="type">Gender :</label>
								{{ Form::select('gender', [
	                        		'Male' => 'Male',
	                       			 'Female' => 'Female'],
	                        		'Female',
	                       			 ['class' => 'form-control select2']
	                    			) }}

							</div>

							<div class="col-md-4 form-group">
							<div  @if($errors->has('phone')) class ='has-error form-group' @endif>
								<label for="phone">Phone :</label>

                                {!! Form::text('phone', null, array('placeholder' => '080xxxxx', 'class' => 'form-control', 'id' => 'phone', 'name' => 'phone', 'required' => 'required')) !!}
							<span class="text-danger"> {{ $errors->first('phone') }}</span>
							</div>
							</div>

							<div class="col-md-4 form-group">
							<div  @if($errors->has('title')) class ='has-error form-group' @endif>
								<label for="title">Title :</label>

                                {!! Form::text('title', null, array('placeholder' => 'Mr', 'class' => 'form-control', 'id' => 'title', 'name' => 'title', 'required' => 'required')) !!}
							<span class="text-danger"> {{ $errors->first('title') }}</span>
							</div>
							</div>
							</div>




							<div class="row">
							<div class="col-md-4 form-group">
								<label for="dob">Date of Birth :</label>
								{!! Form::text('dob', '1980-07-01', array('placeholder' => '', 'class' => 'form-control', 'id' => 'dob', 'name' => 'dob')) !!}
								<span class="text-danger"> {{ $errors->first('dob') }}</span>
							</div>

							<div class="col-md-4 form-group">
							<div  @if($errors->has('email')) class ='has-error form-group' @endif>
								<label for="email">Email :</label>

                                {!! Form::email('email', null, array('placeholder' => 'john@doe.com', 'class' => 'form-control', 'id' => 'email', 'name' => 'email')) !!}
							<span class="text-danger"> {{ $errors->first('email') }}</span>
							</div>
							</div>

							<div class="col-md-4 form-group">
								<label for="marital_status">Marital Status :</label>
								{{ Form::select('marital_status', [
	                        		'Single' => 'Single',
	                        		'Religious' => 'Religious',
	                       			'Married' => 'Married'],
	                        		'Married',
	                       			 ['class' => 'form-control select2']
	                    			) }}

							</div>

							</div>


							<div class="row">
							 <div class="col-md-4 form-group">
								<div  @if($errors->has('nationality')) class ='has-error form-group' @endif>
								<label for="nationality">Nationality :</label>

                                {!! Form::text('nationality', 'Nigeria', array('placeholder' => 'Nigeria', 'class' => 'form-control', 'id' => 'nationality', 'name' => 'nationality', 'required' => 'required')) !!}
							<span class="text-danger"> {{ $errors->first('nationality') }}</span>
							</div>
							</div>

							{{-- <div class="col-md-4 form-group">
							<div  @if($errors->has('state')) class ='has-error form-group' @endif>
								<label for="state">State of Origin :</label>

                                {!! Form::text('state', null, array('placeholder' => 'Imo', 'class' => 'form-control', 'id' => 'state', 'name' => 'state', 'required' => 'required')) !!}
							<span class="text-danger"> {{ $errors->first('state') }}</span>
							</div>  --}}

							{{--  <div class="col-md-4 form-group">
							<div  @if($errors->has('lga_name')) class ='has-error form-group' @endif>
								<label for="lga_name">LGA :</label>

                                {!! Form::text('lga_name', null, array('placeholder' => 'Ahiazu-Mbaise', 'class' => 'form-control', 'id' => 'lga_name', 'name' => 'lga_name', 'required' => 'required')) !!}
							<span class="text-danger"> {{ $errors->first('lga_name') }}</span>
							</div>
							</div>
							</div>  --}}


<div class="col-md-4 form-group" style="margin-top:0px" id="state1">
<div  @if($errors->has('nationality')) class ='has-error form-group' @endif>
								<label for="nationality">State :</label> </div>
    <div class="has-error form-group">
      <select class="form-control" name="state" id="state" placeholder="Pick State" onchange="show(this)">
        </select>

      </div>
      <span class="help-block" id="helpstate"></span>
    </div>

      <div class="col-md-4 form-group" id="slga1" style="display: none;">
      <div  @if($errors->has('nationality')) class ='has-error form-group' @endif>
								<label for="nationality">LGA :</label> </div>
    <div class="has-error form-group">
        <select class="form-control" name="lga_name" id="slga" placeholder="State LGA">
        </select>

      </div>
      <span class="help-block" id="helpslga"></span>
    </div>



<script type="text/javascript">

var ngst = [
{"ID": "0", "Name": "----Choose State----"},
{"ID": "NOT NGN", "Name": "Not a Nigerian"},
{"ID": "Abuja", "Name": "Abuja"},
{"ID": "Abia", "Name": "Abia"},
{"ID": "Adamawa", "Name": "Adamawa"},
{"ID": "Anambra", "Name": "Anambra"},
{"ID": "Akwa Ibom", "Name": "Akwa Ibom"},
{"ID": "Bauchi", "Name": "Bauchi"},
{"ID": "Bayelsa", "Name": "Bayelsa"},
{"ID": "Benue", "Name": "Benue"},
{"ID": "Borno", "Name": "Borno"},
{"ID": "Cross River", "Name": "Cross River"},
{"ID": "Delta", "Name": "Delta"},
{"ID": "Ebonyi", "Name": "Ebonyi"},
{"ID": "Edo", "Name": "Edo"},
{"ID": "Ekiti", "Name": "Ekiti"},
{"ID": "Enugu", "Name": "Enugu"},
{"ID": "Gombe", "Name": "Gombe"},
{"ID": "Imo", "Name": "Imo"},
{"ID": "Jigawa", "Name": "Jigawa"},
{"ID": "Kaduna", "Name": "Kaduna"},
{"ID": "Kano", "Name": "Kano"},
{"ID": "Katsina", "Name": "Katsina"},
{"ID": "kebbi", "Name": "Kebbi"},
{"ID": "Kogi", "Name": "Kogi"},
{"ID": "Kwara", "Name": "Kwara"},
{"ID": "Lagos", "Name": "Lagos"},
{"ID": "Nassarawa", "Name": "Nassarawa"},
{"ID": "Niger", "Name": "Niger"},
{"ID": "Ogun", "Name": "Ogun"},
{"ID": "Ondo", "Name": "Ondo"},
{"ID": "Osun", "Name": "Osun"},
{"ID": "Oyo", "Name": "Oyo"},
{"ID": "Plateau", "Name": "Plateau"},
{"ID": "Rivers", "Name": "Rivers"},
{"ID": "Sokoto", "Name": "Sokoto"},
{"ID": "Taraba", "Name": "Taraba"},
{"ID": "Yobe", "Name": "Yobe"},
{"ID": "Zamfara", "Name": "Zamfara"},
];

var ele = document.getElementById('state');
for (var i = 0; i < ngst.length; i++) {

ele.innerHTML = ele.innerHTML +
    '<option value="' + ngst[i]['ID'] + '">' + ngst[i]['Name'] + '</option>';
}


function show(ele) {

$("#slga").empty();
$('#writew').val('');

var parts =
  {
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
							</div>
                            </div>


							<div class="row">
							<div class="col-md-4 form-group">
								<label for="city">City or Residence :</label>
								{!! Form::text('city', null, array('placeholder' => 'Abuja', 'class' => 'form-control', 'id' => 'city', 'name' => 'city')) !!}
								<span class="text-danger"> {{ $errors->first('city') }}</span>
							</div>

							<div class="col-md-4 form-group">
							<div  @if($errors->has('maiden_name')) class ='has-error form-group' @endif>
								<label for="maiden_name">Maiden Name :</label>

                                {!! Form::text('maiden_name', null, array('placeholder' => ' ', 'class' => 'form-control', 'id' => 'maiden_name', 'name' => 'maiden_name')) !!}
							<span class="text-danger"> {{ $errors->first('maiden_name') }}</span>
							</div>
							</div>

							<div class="col-md-4 form-group">
								<label for="religion">Religion :</label>
								{{ Form::select('religion', [
	                        		'Christain/Catholic' => 'Christain',
	                       			'Muslim' => 'Muslim',
	                        		'Other' => 'Other'],
	                        		'Catholic',
	                       			 ['class' => 'form-control select2']
	                    			) }}

							</div>

							</div>


							<div class="row">
							<div class="col-md-12 form-group">
							<div  @if($errors->has('address')) class ='has-error form-group' @endif>

								<label for="address">Address :</label>
								 {!! Form::text('address', null, array('placeholder' => '','rows'=>'3', 'class' => 'form-control', 'id' => 'address', 'required' => 'required')) !!}
								<span class="text-danger"> {{ $errors->first('address') }}</span>
								</div>
							</div>

							</div>

							<div class="row">
							<div class="col-md-6 form-group">
								<label for="passport">Passport :</label>
								{!! Form::file('passport', array('class' => 'form-control file-loading', 'id' => 'passport', 'placeholder'=>'Choose profile pic', 'name' => 'passport',  'accept' => 'image/*', 'required' => 'required')) !!}
								<span class="text-danger"> {{ $errors->first('passport') }}</span>
							</div>

							<div class="col-md-6 form-group">
								<label for="signature">Signature :</label>
								{!! Form::file('signature', array('class' => 'form-control file-loading', 'id' => 'signature', 'placeholder'=>'Choose Signature pic', 'name' => 'signature',  'accept' => 'image/*', 'required' => 'required')) !!}
								<span class="text-danger"> {{ $errors->first('signature') }}</span>
							</div>

							</div>

							<div class="box-header">
              <h3 class="box-title">&nbsp;</h3>
            </div>


							 <div class="box-header">
              <h3 class="box-title">Emergency Contact </h3>
            </div>



							<div class="row">

							<div class="col-md-4 form-group">
              			<div  @if($errors->has('esurname')) class ='has-error form-group' @endif>
								<label for="esurname">Surname :</label>
								{!! Form::text('esurname', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'esurname', 'required' => 'required')) !!}
							 <span class="text-danger"> {{ $errors->first('esurname') }}</span>
							 </div>
							</div>


							<div class="col-md-4 form-group">
							<div  @if($errors->has('eother_names')) class ='has-error form-group' @endif>
								<label for="eother_names">Other Names :</label>
								{!! Form::text('eother_names', null, array('placeholder' => '', 'class' => 'form-control', 'id' => 'eother_names', 'required' => 'required')) !!}
							 <span class="text-danger"> {{ $errors->first('eother_names') }}</span>
							</div>
							</div>

							 <div class="col-md-4 form-group">
              			<div  @if($errors->has('relationship')) class ='has-error form-group' @endif>
								<label for="relationship">Relationship with Contact / Sponsor :</label>
								{!! Form::text('relationship', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'relationship', 'required' => 'required')) !!}
							 <span class="text-danger"> {{ $errors->first('relationship') }}</span>
							 </div>
							</div>

							</div>


							<div class="row">

              			<div class="col-md-4 form-group">
							<div  @if($errors->has('eemail')) class ='has-error form-group' @endif>
								<label for="eemail">Email :</label>
							 {!! Form::email('eemail', null, array('placeholder' => 'john@doe.com', 'class' => 'form-control', 'id' => 'eemail', 'name' => 'eemail')) !!}
							<span class="text-danger"> {{ $errors->first('eemail') }}</span>
							</div>
							</div>

							<div class="col-md-4 form-group">
							<div  @if($errors->has('ephone')) class ='has-error form-group' @endif>
								<label for="ephone">Phone :</label>
							 {!! Form::text('ephone', null, array('placeholder' => '080xxxxx', 'class' => 'form-control', 'id' => 'ephone', 'name' => 'ephone', 'required' => 'required')) !!}
							<span class="text-danger"> {{ $errors->first('ephone') }}</span>
							</div>
							</div>

							<div class="col-md-4 form-group">
              			<div  @if($errors->has('estate')) class ='has-error form-group' @endif>
								<label for="estate">State of Residence :</label>
								{!! Form::text('estate', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'estate', 'required' => 'required')) !!}
							 <span class="text-danger"> {{ $errors->first('estate') }}</span>
							 </div>
							</div>

							</div>



							<div class="row">
							<div class="col-md-12 form-group">
							<div  @if($errors->has('eaddress')) class ='has-error form-group' @endif>

								<label for="eaddress">Address :</label>
								 {!! Form::text('eaddress', null, array('placeholder' => '','rows'=>'4', 'class' => 'form-control', 'id' => 'eaddress', 'required' => 'required')) !!}
								<span class="text-danger"> {{ $errors->first('eaddress') }}</span>
								</div>
							</div>


							</div>

						<div class="box-header">
              <h3 class="box-title">&nbsp;</h3>
            </div>


							 <div class="box-header">
              <h3 class="box-title">Work Information</h3>
            </div>


							<div class="row">

							<div class="col-md-4 form-group">
              			<div  @if($errors->has('staff_no')) class ='has-error form-group' @endif>
								<label for="staff_no">Staff No :</label>
								{!! Form::text('staff_no', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'staff_no', 'required' => 'required')) !!}
							 <span class="text-danger"> {{ $errors->first('staff_no') }}</span>
							 </div>
							</div>


							<div class="col-md-4 form-group">
							<div  @if($errors->has('staff_position_id')) class ='has-error form-group' @endif>
								<label for="staff_position_id">Staff Position :</label>
								{{ Form::select('staff_position_id', $positions, null,['class' => 'form-control', 'id' => 'staff_position_id', 'name' => 'staff_position_id']) }}
							 <span class="text-danger"> {{ $errors->first('staff_position_id') }}</span>
							</div>
							</div>

							 <div class="col-md-4 form-group">
								<label for="staff_type_id">Staff Type :</label>
								{{ Form::select('staff_type_id', [
	                        		'' => 'Select',
	                        		'1' => 'Teaching',
	                        		'2' => 'Non-Teaching'],
	                        		'2',
	                       			 ['class' => 'form-control select2']
	                    			) }}

							</div>

							</div>



							<div class="row">

							<div class="col-md-4 form-group">
              			<div  @if($errors->has('employment_type_id')) class ='has-error form-group' @endif>
								<label for="employment_type_id">Employment Type :</label>
								{{ Form::select('employment_type_id', $employment_types, null,['class' => 'form-control', 'id' => 'employment_type_id']) }}
							 <span class="text-danger"> {{ $errors->first('employment_type_id') }}</span>
							 </div>
							</div>


							<div class="col-md-4 form-group">
							<div  @if($errors->has('admin_department_id')) class ='has-error form-group' @endif>
								<label for="admin_department_id">Department :</label>
								{{ Form::select('admin_department_id', $departments, null,['class' => 'form-control', 'id' => 'admin_department_id']) }}
							 <span class="text-danger"> {{ $errors->first('admin_department_id') }}</span>
							</div>
							</div>

							 {{--  <div class="col-md-4 form-group">
              			<div  @if($errors->has('grade_id')) class ='has-error form-group' @endif>
								<label for="grade_id">Grade Level :</label>
								{!! Form::text('grade_id', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'grade_id', 'required' => 'required')) !!}
							 <span class="text-danger"> {{ $errors->first('grade_id') }}</span>
							 </div>
							</div>  --}}

							</div>



							<div class="row">
							<div class="col-md-4 form-group">
							<div  @if($errors->has('username')) class ='has-error form-group' @endif>
								<label for="username">Official Email :</label>
								{!! Form::email('username', null, array( 'placeholder' => '@incla.edu.ng','class' => 'form-control', 'id' => 'username', 'required' => 'required')) !!}
							 <span class="text-danger"> {{ $errors->first('username') }}</span>
							 </div>
							</div>


							<div class="col-md-4 form-group">
								<label for="appointment_date">Appointment Date :</label>
								{!! Form::text('appointment_date', '2024-07-01', array('placeholder' => '', 'class' => 'form-control', 'id' => 'appointment_date', 'required' => 'required')) !!}
								<span class="text-danger"> {{ $errors->first('appointment_date') }}</span>
							</div>

							{{--  <div class="col-md-4 form-group">
								<label for="assumption_date">Assumption Date :</label>
								{!! Form::text('assumption_date', '2024-07-01', array('placeholder' => '', 'class' => 'form-control', 'id' => 'assumption_date', 'required' => 'required')) !!}
								<span class="text-danger"> {{ $errors->first('assumption_date') }}</span>
							</div>  --}}


							</div>









              </div>

               </div>





                <!-- /.card-body -->

                <div class="card-footer">



								{{ Form::submit('Create Staff', array('class' => 'btn btn-primary')) }}




                </div>

                 </div>
               <!-- /.box-body -->


            {!! Form::close() !!}


          <!-- /.box -->

        </div>
        <!--/.col (left) -->

      </div>


      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('pagescript')

<!-- External JavaScripts
	============================================= -->
	<script src="{{ asset('js/jquery.js')}}"></script>

	<!-- bootstrap datepicker -->
	<script src="{{ asset('dist/js/components/bootstrap-datepicker.js')}}"></script>
<!-- Bootstrap File Upload Plugin -->
	<script src="{{ asset('dist/js/components/bs-filestyle.js')}}"></script>

<script type="text/javascript">
	//Date picker
	    $('#dob').datepicker({
	    	format: 'yyyy-mm-dd',
		      autoclose: true
	    })
  </script>

  <script type="text/javascript">
	//Date picker
	    $('#appointment_date').datepicker({
	    	format: 'yyyy-mm-dd',
		      autoclose: true
	    })
  </script>

  <script type="text/javascript">
	//Date picker
	    $('#assumption_date').datepicker({
	    	format: 'yyyy-mm-dd',
		      autoclose: true
	    })
  </script>

 <script  type="text/javascript">
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

	<script  type="text/javascript">
		$(document).on('ready', function() {

			$("#signature").fileinput({
				mainClass: "input-group-md",
				showUpload: false,
				previewFileType: "image",
				browseClass: "btn btn-success",
				browseLabel: "Pick Image",
				browseIcon: "<i class=\"fas fa-signature\"></i>",
				removeClass: "btn btn-danger",
				removeLabel: "Delete",
				removeIcon: "<i class=\"icon-trash\"></i> ",
				allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
				elErrorContainer: "#errorBlock"



			});



		});

	</script>
@endsection


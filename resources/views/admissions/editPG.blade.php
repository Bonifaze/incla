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
                    <button class="nav-link text-success  fw-bold text-capitalize" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Sponsor Information</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-success fw-bold text-capitalize" id="profile2-tab" data-bs-toggle="tab" data-bs-target="#profile2-tab-pane" type="button" role="tab" aria-controls="profile2-tab-pane" aria-selected="false">PG Information/ Qualification</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-success fw-bold text-capitalize" id="profile3-tab" data-bs-toggle="tab" data-bs-target="#profile3-tab-pane" type="button" role="tab" aria-controls="profile3-tab-pane" aria-selected="false">Uploaded Documents</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-success fw-bold text-capitalize" id="profile4-tab" data-bs-toggle="tab" data-bs-target="#profile4-tab-pane" type="button" role="tab" aria-controls="profile4-tab-pane" aria-selected="false">Password</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <form method="POST" action="/editbiodata" enctype="multipart/form-data" class="p-3">
                        @csrf
                        {{-- @if (session('signUpMsg'))
                        {!! session('signUpMsg') !!}
                        @endif  --}}

                        <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="item-label mb-2">
                                        <strong>Photo</strong>
                                    </div>
                                    <div class="rounded-circle">
                                        <img class="rounded-circle p-3 mx-auto d-block" src="data:image/jpeg;base64,{{$applicantsDetails->passport}}" alt="Applicant Passport" style="height: 250px; width:250px;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="passport">{{ __('Upload Passport Photograph') }} </label>

                                <input id="passport" type="file" class="form-control" name="passport" value="">
                        </div>
                        <label for="">{{ __('Surname') }} </label>
                            <div class="form-group">
                                <input id="surname" type="text" class="form-control " name="surname" value="{{ $applicantsDetails->surname}}" autofocus readonly>
                        </div>
                        <div class="form-group">

                                <label for="">{{ __('First Name') }} </label>
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $applicantsDetails->first_name}}" autofocus readonly>

                        </div>
                        <div class="form-group">
                                <label for="">{{ __('Email') }} </label>
                                <input id="email" type="email" class="form-control " name="email" value="{{ $applicantsDetails->email}}" autofocus readonly>
                        </div>
                        <div class="form-group">
                                <label for="">{{ __('Phone') }} </label>
                                <input id="phone" type="phone" class="form-control" name="phone" value="{{ $applicantsDetails->phone}}" autofocus>
                        </div>

                            <div class="form-group">
                                <label for="">{{ __('Other Name') }} </label>
                                <input id="middle_name" type="text" class="form-control" name="middle_name" value="{{$applicantsDetails -> middle_name}}" autofocus>
                        </div>

                        <div class="form-group">
                                <label for="">{{ __('Gender') }} </label>
                                <select class="form-control" name="gender">
                                    <option value="{{$applicantsDetails -> gender}}">{{$applicantsDetails -> gender}}</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                        </div>

                            <div class="form-group">
                                <label for="">{{ __('Religion') }} </label>
                                <select class="form-control" name="religion">
                                    <label for="">{{ __('Religion') }} </label>
                                    <option value="{{$applicantsDetails -> religion}}">{{$applicantsDetails -> religion}}</option>
                                    <option value="Christian (Catholic)">Christian (Catholic)</option>
                                    <option value="Christian (non-catholic)">Christian (non-catholic)</option>
                                    <option value="Muslim">Muslim</option>

                                </select>
                        </div>

                        <div class="form-group">

                                <label for="dob">{{ __('Date of Birth') }}:{{$applicantsDetails -> dob}}</label>
                            <div class="form-group">
                                <input id="" type="date" class="form-control" name="dob" value="{{$applicantsDetails -> dob}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label for="">{{ __('Nationality') }} </label>
                                <select class="form-control" name="nationality" id="nationality">
                                    <option value="{{$applicantsDetails-> nationality}}">{{$applicantsDetails-> nationality}}</option>
                                    <option value="Åland Islands">Åland Islands</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antarctica">Antarctica</option>
                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Bouvet Island">Bouvet Island</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote D'ivoire">Cote D'ivoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Territories">French Southern Territories</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guernsey">Guernsey</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guinea-bissau">Guinea-bissau</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                    <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="India">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jersey">Jersey</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                    <option value="Korea, Republic of">Korea, Republic of</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macao">Macao</option>
                                    <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                    <option value="Moldova, Republic of">Moldova, Republic of</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montenegro">Montenegro</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Namibia">Namibia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau">Palau</option>
                                    <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Pitcairn">Pitcairn</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russian Federation">Russian Federation</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="Saint Helena">Saint Helena</option>
                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                    <option value="Saint Lucia">Saint Lucia</option>
                                    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                    <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Timor-leste">Timor-leste</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States">United States</option>
                                    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Viet Nam">Viet Nam</option>
                                    <option value="Virgin Islands, British">Virgin Islands, British</option>
                                    <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                    <option value="Wallis and Futuna">Wallis and Futuna</option>
                                    <option value="Western Sahara">Western Sahara</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="form-group">
                                <label for="refferal">{{ __('Statr of Origin') }} </label>
                                <input id="state_origin" type="text" class="form-control" name="state_origin" value="{{$applicantsDetails -> state_origin}}">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="form-group">
                                <label for="refferal">{{ __('Local Government Area') }} </label>
                                <input id="lga" type="text" class="form-control" name="lga" value="{{$applicantsDetails -> lga}}">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="form-group">
                                <label for="refferal">{{ __('Address') }} </label>
                                <input id="address" type="text" class="form-control" name="address" value="{{$applicantsDetails -> address}}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="refferal">{{ __('How did you hear about us') }} </label>

                            <div class="form-group">
                                <select class="form-control" name="referral">
                                    <option value="{{$applicantsDetails-> referral}}">{{$applicantsDetails-> referral}}</option>
                                    <option value="Social Media"> Social Media</option>
                                    <option value="Friend">From a friend</option>
                                    <option value="Google">Google</option>
                                    <option value="TV">Television</option>
                                    <option value="Church">Church</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-success mt-5">
                                    {{ __('Update') }}
                                </button>
                        </div>


                    </form>
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">

                    {{-- 2nd table div  --}}
                    <form method="POST" action="/editsponsers" class="p-3">
                        @csrf

                        <div class="form-group">
                                <label for="refferal">{{ __('Name') }} </label>
                                <input id="fname" type="text" name="name" class="form-control" value="{{$applicantsDetails -> name}}" autofocus>
                        </div>
                        <div class="form-group">
                                <label for="refferal">{{ __('Phone') }} </label>
                                <input id="phone" type="text" name="sponsors_phone" class="form-control" value="{{$applicantsDetails -> sponsors_phone}}" autofocus>
                        </div>
                        <div class="form-group">
                                <label for="refferal">{{ __('email') }} </label>
                                <input id="foccupation" type="text" name="sponsors_email" class="form-control" value="{{$applicantsDetails -> sponsors_email}}" autofocus>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="refferal">{{ __('Address') }} </label>
                                <input id="address" type="text" class="form-control" name="sponsors_address" required value="{{$applicantsDetails -> sponsors_address}}">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="form-group">
                                <label for="refferal">{{ __('Ocupation') }} </label>
                                <input id="foccupation" type="text" name="occupation" class="form-control" value="{{$applicantsDetails -> occupation}}" autofocus>
                            </div>

                            <div class="form-group">
                                <div class="form-group">


                                    <button type="submit" class="btn btn-success mt-5">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="profile4-tab-pane" role="tabpanel" aria-labelledby="profile4-tab" tabindex="0">

                {{-- 2nd table div  --}}
                <form method="POST" action="/editpassword" class="p-3">
                    @csrf
                    <input id="email" type="hidden" class="form-input form-control" name="email" value="{{$applicantsDetails -> email}}">

                    <div class="form-group">
                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="New Password" autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password" autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-group">

                            {{-- @if (session('signUpMsg'))
                                                                {!! session('signUpMsg') !!}
                                                            @endif  --}}
                            <button type="submit" class="btn btn-success mt-5">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="profile2-tab-pane" role="tabpanel" aria-labelledby="profile2-tab" tabindex="0">
                {{-- 3rd div  --}}

                <form method="POST" action="/editpginformation" class="p-3">
                    @csrf
                    <div class="form-group">

                        <div class="form-group">
                            <label for="refferal">{{ __('Program') }} </label>
                            <select class="form-select" name="mode">
                                <option value="{{$applicantsDetails -> mode}}">{{$applicantsDetails -> mode}} </option>
                                <option value="PGD">PGD</option>
                                <option value="M.Sc">M.Sc</option>
                                <option value="PhD">PhD</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="form-group">
                            <label for="refferal">{{ __('Mode of Learning') }} </label>
                            <select class="form-select" name="type">
                                <option value="{{$applicantsDetails -> type}}">{{$applicantsDetails -> type}} </option>
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="form-group">
                            <label for="refferal">{{ __('Research Topic') }} </label>
                            <input id="first_choice" type="text" class="form-control" name="research_topic" value="{{$applicantsDetails -> research_topic}}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="refferal">{{ __('Course of Study') }} </label>
                            <select class="form-select" name="course_applied">
                                <option value="{{$applicantsDetails -> course_applied}}">{{$applicantsDetails -> course_applied}}</option>
                                @foreach($programs as $program)

                                <option value="{{$program->name}}">{{$program->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <h5 class="h6 text-success text-center fw-bold mb-4 pt-2">Post Secondary Education and Certifications </h5>

                    <div class="form-group">
                        <label for="refferal">{{ __('Institution') }} </label>
                        <div class="form-group">
                            <input id="second_choice" type="text" class="form-control" name="institution" value="{{$applicantsDetails -> institution}}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="refferal">{{ __('Period') }} </label>
                        <div class="form-group">
                            <input id="subject_1" type="text" name="period" class="form-control" value="{{$applicantsDetails -> period}}" autofocus required>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="form-group">
                            <label for="refferal">{{ __('Course') }} </label>
                            <input id="subject_2" type="text" name="course" class="form-control" required value="{{$applicantsDetails -> course}}" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="refferal">{{ __('Certificate Obtained') }} </label>
                            <input id="subject_3" type="text" name="certificate_name" class="form-control" required value="{{$applicantsDetails -> certificate_name}}" autofocus>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="form-group">
                            <label for="refferal">{{ __('Type of Certificate') }} </label>
                            <select class="form-select" name="certificate_type">
                                <option value="{{$applicantsDetails -> certificate_type}}">{{$applicantsDetails -> certificate_type}}</option>
                                <option value="Degree">Degree</option>
                                <option value="PGD">PGD</option>
                                <option value="M.Sc">M.Sc</option>
                                <option value="PhD">PhD</option>
                                <option value="Professional">Professional</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="form-group">
                            <label for="refferal">{{ __('Honour') }} </label>
                            <input id="subject_4" type="text" name="class_honour" class="form-control" value="{{$applicantsDetails -> class_honour}}" required autofocus>
                        </div>
                    </div>
                    <h5 class="h6 text-success text-center fw-bold mb-2 pt-2">REFEREES </h5>
                    <h6 class="h6 text-warning text-center fw-small mb-4 pt-2"> Provide three (3) referees, two (2) must be your former lecturers. </h6>
                    {{-- First Referee  --}}
                    <hr>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="refferal">{{ __('Name') }} </label>
                            <input id="subject_3" type="text" name="name1" class="form-control" required value="{{$applicantsDetails -> name1}}" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="refferal">{{ __('Position') }} </label>
                            <input id="subject_3" type="text" name="position1" class="form-control" required value="{{$applicantsDetails -> position1}}" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="refferal">{{ __('Institution/ Organisation') }} </label>
                            <input id="subject_3" type="text" name="institution1" class="form-control" required value="{{$applicantsDetails -> institution1}}" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="refferal">{{ __('Nmae') }} </label>
                            <input id="subject_3" type="text" name="email1" class="form-control" required value="{{$applicantsDetails -> email1}}" autofocus>
                        </div>
                    </div>
                    {{-- Second referee  --}}
                    <hr>
                    <div class="form-group">
                        <div class="form-group">
                            <input id="subject_3" type="text" name="name2" class="form-control" required value="{{$applicantsDetails -> name2}}" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <input id="subject_3" type="text" name="position2" class="form-control" required value="{{$applicantsDetails -> position2}}" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <input id="subject_3" type="text" name="institution2" class="form-control" required value="{{$applicantsDetails -> institution2}}" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <input id="subject_3" type="text" name="email2" class="form-control" required value="{{$applicantsDetails -> email1}}" autofocus>
                        </div>
                    </div>
                    {{-- third referees  --}}
                    <hr>
                    <div class="form-group">
                        <div class="form-group">
                            <input id="subject_3" type="text" name="name3" class="form-control" required value="{{$applicantsDetails -> name3}}" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <input id="subject_3" type="text" name="position3" class="form-control" required value="{{$applicantsDetails -> position3}}" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <input id="subject_3" type="text" name="institution3" class="form-control" required value="{{$applicantsDetails -> institution1}}" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <input id="subject_3" type="text" name="email3" class="form-control" required value="{{$applicantsDetails -> email1}}" autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-group">

                            {{-- @if (session('signUpMsg'))
                                                    {!! session('signUpMsg') !!}
                                                    @endif  --}}
                            <button type="submit" class="btn btn-success mt-5">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="profile3-tab-pane" role="tabpanel" aria-labelledby="profile3-tab" tabindex="0">
                <form method="POST" action="/editutmeuploads" enctype="multipart/form-data" class="p-3">
                    @csrf
                    <div class="row">
                        <div class="col"> <img class="mx-auto d-block" src="data:image/jpeg;base64,{{ $applicantsDetails->jamb }}" alt="Transcipt" style="height: 300px; width:300px;" /></div>
                        <div class="col"> <img class="mx-auto d-block" src="data:image/jpeg;base64,{{ $applicantsDetails->olevel1 }}" alt="Olevel" style="height: 300px; width:300px;" /></div>
                        <div class="col"> <img class=" mx-auto d-block" src="data:image/jpeg;base64,{{ $applicantsDetails->olevel2 }}" alt="" style="height: 300px; width:300px;" /></div>
                    </div>

                    <div class="form-group">

                        @if (session('statusMsg'))
                        {!! session('statusMsg') !!}
                        @endif
                        <label for="passport">{{ __('Edit  Degree Certificate') }}
                        </label>

                        <div class="form-group">
                            <input id="jamb" type="file" class="form-control" name="jamb">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="passport">{{ __('Edit Olevel Result') }}
                        </label>

                        <div class="form-group">
                            <input id="olevel1" type="file" class="form-control" name="olevel1">
                        </div>
                    </div>

                    <div class="form-group">

                        <p>Edit Olevel Result <b class="text-danger">( if any)</b></p>
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
                                {{ __('update') }}
                            </button>
                        </div>
                    </div>
                </form>
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

<script type="text/javascript">
    //Date picker
    $('#dob').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    })
</script>

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

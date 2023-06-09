

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
                DE INFORMATION
            </h1>
            <div class="card-body p-5">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link<?php echo e($de->status == 0 ? ' active' : ''); ?> text-success fw-bold text-capitalize" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="<?php echo e($de->status  == 0 ? 'true' : 'false'); ?>">Bio Data</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link<?php echo e($de->status  == 1 ? ' active' : ''); ?> text-success fw-bold text-capitalize" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="<?php echo e($de->status  == 1 ? 'true' : 'false'); ?>">Sponsor Information</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link<?php echo e($de->status  == 2 ? ' active' : ''); ?> text-success fw-bold text-capitalize" id="profile2-tab" data-bs-toggle="tab" data-bs-target="#profile2-tab-pane" type="button" role="tab" aria-controls="profile2-tab-pane" aria-selected="<?php echo e($de->status  == 2 ? 'true' : 'false'); ?>">Direct Entry Information</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link<?php echo e($de->status  == 3 ? ' active' : ''); ?> text-success fw-bold text-capitalize" id="profile3-tab" data-bs-toggle="tab" data-bs-target="#profile3-tab-pane" type="button" role="tab" aria-controls="profile3-tab-pane" aria-selected="<?php echo e($de->status  == 3 ? 'true' : 'false'); ?>">Upload Documents</button>
                    </li>
                </ul>


                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade<?php echo e($de->status == 0 ? ' show active' : ''); ?>" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab">
                        <form method="POST" action="/debiodata" enctype="multipart/form-data" class="p-3">
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
unset($__errorArgs, $__bag); ?>" name="surname" placeholder="<?php echo e($de->surname); ?>" readonly autofocus>
                                    <input id="status" type="hidden" class="form-control " name="'<?php echo e($de->status); ?>" readonly autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for=""><?php echo e(__('First Name')); ?> </label>
                                    <input id="first_name" type="text" class="form-control" name="first_name" placeholder="<?php echo e($de->first_name); ?>" readonly autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Email')); ?> </label>
                                    <input id="email" type="email" class="form-control " name="email" placeholder="<?php echo e($de->email); ?>" readonly autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Phone')); ?> </label>
                                    <input id="phone" type="phone" class="form-control" name="phone" autocomplete="phone" placeholder="<?php echo e($de->phone); ?>" readonly autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Middle Name')); ?> </label>
                                    <input id="middle_name" type="text" class="form-control" name="middle_name" placeholder="<?php echo e($de->middle_name ?? null); ?>" value="<?php echo e($de->middle_name ?? null); ?>" readonly autofocus>
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
                                <label for="refferal"><?php echo e(__('Nationality')); ?> </label>

                                <div class="form-group">
                                    <select class="col-md-12 form-group text-lg" name="nationality" id="nationality">
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Åland Islands">Åland Islands</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antarctica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda
                                        </option>
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
                                        <option value="Bosnia and Herzegovina">Bosnia and
                                            Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British
                                            Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam">Brunei Darussalam
                                        </option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African
                                            Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling)
                                            Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo, The Democratic Republic of The">
                                            Congo, The Democratic Republic of The</option>
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
                                        <option value="Dominican Republic">Dominican Republic
                                        </option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea
                                        </option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands (Malvinas)">Falkland
                                            Islands (Malvinas)</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern
                                            Territories</option>
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
                                        <option value="Heard Island and Mcdonald Islands">Heard
                                            Island and Mcdonald Islands</option>
                                        <option value="Holy See (Vatican City State)">Holy See
                                            (Vatican City State)</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran, Islamic Republic of">Iran, Islamic
                                            Republic of</option>
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
                                        <option value="Korea, Democratic People's Republic of">
                                            Korea, Democratic People's Republic of</option>
                                        <option value="Korea, Republic of">Korea, Republic of
                                        </option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao People's Democratic Republic">Lao
                                            People's Democratic Republic</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab
                                            Jamahiriya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macao">Macao</option>
                                        <option value="Macedonia, The Former Yugoslav Republic of">
                                            Macedonia, The Former Yugoslav Republic of</option>
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
                                        <option value="Micronesia, Federated States of">Micronesia,
                                            Federated States of</option>
                                        <option value="Moldova, Republic of">Moldova, Republic of
                                        </option>
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
                                        <option value="Netherlands Antilles">Netherlands Antilles
                                        </option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria" selected>Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana
                                            Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Palestinian Territory, Occupied">Palestinian
                                            Territory, Occupied</option>
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
                                        <option value="Russian Federation">Russian Federation
                                        </option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Helena">Saint Helena</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis
                                        </option>
                                        <option value="Saint Lucia">Saint Lucia</option>
                                        <option value="Saint Pierre and Miquelon">Saint Pierre and
                                            Miquelon</option>
                                        <option value="Saint Vincent and The Grenadines">Saint
                                            Vincent and The Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe
                                        </option>
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
                                        <option value="South Georgia and The South Sandwich Islands">
                                            South Georgia and The South Sandwich Islands</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard and Jan Mayen">Svalbard and Jan
                                            Mayen</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syrian Arab Republic">Syrian Arab Republic
                                        </option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania, United Republic of">Tanzania,
                                            United Republic of</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-leste">Timor-leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago
                                        </option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos Islands">Turks and Caicos
                                            Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates
                                        </option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United
                                            States Minor Outlying Islands</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Viet Nam">Viet Nam</option>
                                        <option value="Virgin Islands, British">Virgin Islands,
                                            British</option>
                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.
                                        </option>
                                        <option value="Wallis and Futuna">Wallis and Futuna
                                        </option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 form-group" id="slga1" style="display: none;">
                                <div <?php if($errors->has('nationality')): ?> class ='has-error form-group' <?php endif; ?>>
                                    <label for="nationality">Local Government Area :</label>
                                </div>
                                <div class="has-error form-group">
                                    <select class="form-control" name="lga" id="slga" placeholder="State LGA"></select>
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
                                        ''
                                    ' + ngst[i]['
                                    ID '] + '
                                    ">' + ngst[i]['Name'] + '</>';
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
                                            ''
                                        ' + parts[msg][i] + '
                                        ">' + parts[msg][i] + '</>';
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
                                    'How did you hear about us',
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


                    <div class="tab-pane fade<?php echo e($de->status == 1 ? ' show active' : ''); ?>" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab">
                        <form method="POST" action="/desponsers" enctype="multipart/form-data" class="p-3">
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
                                    <input id="address" type="text" class="form-control" name="sponsors_address" required placeholder="Address">
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


                    <div class="tab-pane fade<?php echo e($de->status == 2 ? ' show active' : ''); ?>" id="profile2-tab-pane" role="tabpanel" aria-labelledby="profile2-tab">
                        <form method="POST" action="/deinformation" class="p-3">
                            <?php echo csrf_field(); ?>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Jamb DE Number')); ?> </label>
                                    <input id="score" type="text" name="jamb_de_no" class="form-control" placeholder="Jamb DE number" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for=""><?php echo e(__('Qualification')); ?> </label>
                                <select class="form-select" name="qualification">
                                    <option disabled selected>Qualification </option>
                                    <option value="ALEVEL">ALEVEL</option>
                                    <option value="IJMB">IJMB</option>
                                    <option value="JUPEB">JUPEB</option>
                                    <option value="OND">OND</option>
                                    option value="HND">HND</option>
                                    <option value="NCE">NCE</option>
                                    <option value="DEGREE">DEGREE</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="refferal"><?php echo e(__('Course of Study')); ?> </label>
                                <select class="form-select" name="course_applied">
                                    <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <option value="<?php echo e($program->name); ?>"><?php echo e($program->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for=""><?php echo e(__('Qualification Year')); ?> </label>
                                <input id="first_choice" type="text" name="qualification_year" class="form-control" placeholder="Year Qualification was Obtained" autofocus>
                            </div>
                            <div class="form-group">
                                <label for=""><?php echo e(__('Qualification Number')); ?> </label>
                                <input id="second_choice" type="text" name="qualification_number" class="form-control" placeholder="Qualification Number" autofocus>
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


                    <div class="tab-pane fade<?php echo e($de->status == 3 ? ' show active' : ''); ?>" id="profile3-tab-pane" role="tabpanel" aria-labelledby="profile3-tab">
                        <form method="POST" action="/deuploads" enctype="multipart/form-data" class="p-3">
                            <?php echo csrf_field(); ?>

                            <div class="col-md-12 form-group">
                                <label for="passport">Direct Entry Result :</label>
                                <?php echo Form::file('passport', [
                                'class' => 'form-control file-loading',
                                'id' => 'passport',
                                'placeholder' => 'Choose profile pic',
                                'name' => 'jamb',
                                'accept' => 'image/*',
                                'required' => 'required',
                                ]); ?>

                                <span class="text-danger"> <?php echo e($errors->first('passport')); ?></span>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="passport">Olevel Result :</label>
                                <?php echo Form::file('passport', [
                                'class' => 'form-control file-loading',
                                'id' => 'passport',
                                'placeholder' => 'Choose profile pic',
                                'name' => 'olevel1',
                                'accept' => 'image/*',
                                'required' => 'required',
                                ]); ?>

                                <span class="text-danger"> <?php echo e($errors->first('passport')); ?></span>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="passport"> Result <b class="text-danger">( if any)</b>:</label>
                                <?php echo Form::file('passport', [
                                'class' => 'form-control file-loading',
                                'id' => 'passport',
                                'placeholder' => 'Choose profile pic',
                                'name' => 'olevel2',
                                'accept' => 'image/*',

                                ]); ?>

                                <span class="text-danger"> <?php echo e($errors->first('passport')); ?></span>
                            </div>

                            <div class="form-group">
                                <div class="form-group">

                                    
                                    <button type="submit" class="btn btn-success mt-5">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminsials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\Documents\WEB DEV\Work-VUNA\laraproject\resources\views/admissions//de.blade.php ENDPATH**/ ?>
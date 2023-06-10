<?php

if(!session('userid'))
{

header('location: /');
exit;
}
?>


<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">


    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php echo $__env->make('layouts.usersidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h3 class="h5 text-center fw-bold mb-4 pt-2">
                        <p class="fw-bold text-success">Post Graduate</p> Registration Form
                    </h3>

                    <!-- Content Row -->

                    <div class="row justify-content-center">

                        <!-- Area Chart -->
                        <div class="col-xl-8">
                            <div class="card shadow mb-4 p-5">
                                <!-- Card Header - Dropdown -->

                                <div class="card-body">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active text-success fw-bold text-capitalize" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Bio Data</button>
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
                                                <?php echo csrf_field(); ?>
                                                <?php if(session('signUpMsg')): ?>
                                                <?php echo session('signUpMsg'); ?>

                                                <?php endif; ?>

                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label mb-2">
                                                                <strong>Photo</strong>
                                                            </div>
                                                            <div class="rounded-circle">
                              <img class="rounded-circle p-3 mx-auto d-block" src="data:image/jpeg;base64,<?php echo e($applicantsDetails->passport); ?>" alt="Applicant Passport" style="height: 180px; width:200px;" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="passport"><?php echo e(__('Upload Passport Photograph')); ?> </label>

                                                    <div class="form-group">
                                                        <input id="passport" type="file" class="form-control" name="passport" value="">
                                                    </div>
                                                </div>
                                                <label for=""><?php echo e(__('Surname')); ?> </label>
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <input id="surname" type="text" class="form-control " name="surname" value="<?php echo e($applicantsDetails->surname); ?>" autofocus>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for=""><?php echo e(__('First Name')); ?> </label>
                                                        <input id="first_name" type="text" class="form-control" name="first_name" value="<?php echo e($applicantsDetails->first_name); ?>" autofocus>


                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for=""><?php echo e(__('Email')); ?> </label>
                                                        <input id="email" type="email" class="form-control " name="email" value="<?php echo e($applicantsDetails->email); ?>" autofocus>


                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for=""><?php echo e(__('Phone')); ?> </label>
                                                        <input id="phone" type="phone" class="form-control" name="phone" autocomplete="phone" placeholder="<?php echo e($applicantsDetails->phone); ?>" autofocus>


                                                    </div>
                                                </div>

                                                <div class="form-group">

                                                    <div class="form-group">
                                                        <label for=""><?php echo e(__('Other Name')); ?> </label>
                                                        <input id="middle_name" type="text" class="form-control" name="middle_name" value="<?php echo e($applicantsDetails -> middle_name); ?>" autofocus>
                                                    </div>
                                                </div>

                                                <div class="form-group">

                                                    <div class="form-group">
                                                        <label for=""><?php echo e(__('Gender')); ?> </label>
                                                        <select class="form-select" name="gender">
                                                            <option value="<?php echo e($applicantsDetails -> gender); ?>"><?php echo e($applicantsDetails -> gender); ?></option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">

                                                    <div class="form-group">
                                                        <select class="form-select" name="religion">
                                                            <label for=""><?php echo e(__('Religion')); ?> </label>
                                                            <option value="<?php echo e($applicantsDetails -> religion); ?>"><?php echo e($applicantsDetails -> religion); ?></option>
                                                            <option value="Christian (Catholic)">Christian (Catholic)</option>
                                                            <option value="Christian (non-catholic)">Christian (non-catholic)</option>
                                                            <option value="Muslim">Muslim</option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="dob"><?php echo e(__('Date of Birth')); ?> </label>

                                                    <div class="form-group">
                                                        <input id="dob" type="date" class="form-control" name="dob" value="<?php echo e($applicantsDetails -> dob); ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for=""><?php echo e(__('Nationality')); ?> </label>
                                                        <select class="form-select" name="nationality" id="nationality">
                                                            <option value="<?php echo e($applicantsDetails-> nationality); ?>"><?php echo e($applicantsDetails-> nationality); ?></option>
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
                                                        <label for="refferal"><?php echo e(__('Statr of Origin')); ?> </label>
                                                        <input id="state_origin" type="text" class="form-control" name="state_origin" value="<?php echo e($applicantsDetails -> state_origin); ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">

                                                    <div class="form-group">
                                                        <label for="refferal"><?php echo e(__('Local Government Area')); ?> </label>
                                                        <input id="lga" type="text" class="form-control" name="lga" value="<?php echo e($applicantsDetails -> lga); ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">

                                                    <div class="form-group">
                                                        <label for="refferal"><?php echo e(__('Address')); ?> </label>
                                                        <input id="address" type="text" class="form-control" name="address" value="<?php echo e($applicantsDetails -> address); ?>">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="refferal"><?php echo e(__('How did you hear about us')); ?> </label>

                                                    <div class="form-group">
                                                        <select class="form-select" name="referral">
                                                            <option value="<?php echo e($applicantsDetails-> referral); ?>"><?php echo e($applicantsDetails-> referral); ?></option>
                                                            <option value="Social Media"> Social Media</option>
                                                            <option value="Friend">From a friend</option>
                                                            <option value="Google">Google</option>
                                                            <option value="TV">Television</option>
                                                            <option value="Church">Church</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="form-group">
                                                        
                                                        <button type="submit" class="btn btn-success">
                                                            <?php echo e(__('Update')); ?>

                                                        </button>
                                                    </div>
                                                </div>


                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">

                                            
                                            <form method="POST" action="/editsponsers" class="p-3">
                                                <?php echo csrf_field(); ?>

                                                <div class="form-group">

                                                    <div class="form-group">
                                                        <label for="refferal"><?php echo e(__('Name')); ?> </label>
                                                        <input id="fname" type="text" name="name" class="form-control" value="<?php echo e($applicantsDetails -> name); ?>" autofocus>
                                                    </div>
                                                </div>
                                                <div class="form-group">

                                                    <div class="form-group">
                                                        <label for="refferal"><?php echo e(__('Phone')); ?> </label>
                                                        <input id="phone" type="text" name="sponsors_phone" class="form-control" value="<?php echo e($applicantsDetails -> sponsors_phone); ?>" autofocus>
                                                    </div>
                                                </div>
                                                <div class="form-group">

                                                    <div class="form-group">
                                                        <label for="refferal"><?php echo e(__('email')); ?> </label>
                                                        <input id="foccupation" type="text" name="sponsors_email" class="form-control" value="<?php echo e($applicantsDetails -> sponsors_email); ?>" autofocus>
                                                    </div>
                                                </div>
                                                <div class="form-group">

                                                    <div class="form-group">
                                                        <label for="refferal"><?php echo e(__('Address')); ?> </label>
                                                        <input id="address" type="text" class="form-control" name="sponsors_address" required value="<?php echo e($applicantsDetails -> sponsors_address); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">

                                                    <div class="form-group">
                                                        <label for="refferal"><?php echo e(__('Ocupation')); ?> </label>
                                                        <input id="foccupation" type="text" name="occupation" class="form-control" value="<?php echo e($applicantsDetails -> occupation); ?>" autofocus>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="form-group">


                                                            <button type="submit" class="btn btn-success">
                                                                <?php echo e(__('Update')); ?>

                                                            </button>
                                                        </div>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile4-tab-pane" role="tabpanel" aria-labelledby="profile4-tab" tabindex="0">

                                        
                                        <form method="POST" action="/editpassword" class="p-3">
                                            <?php echo csrf_field(); ?>
                                            <input id="email" type="hidden" class="form-input form-control"  name="email" value="<?php echo e($applicantsDetails -> email); ?>">

                                            <div class="form-group">
                                                <div class="form-group">
                                                    <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required placeholder="New Password" autocomplete="new-password">

                                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-group">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password" autocomplete="new-password">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-group">

                                                    
                                                    <button type="submit" class="btn btn-success">
                                                        <?php echo e(__('Update')); ?>

                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="profile2-tab-pane" role="tabpanel" aria-labelledby="profile2-tab" tabindex="0">
                                        

                                        <form method="POST" action="/editpginformation" class="p-3">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-group">

                                                <div class="form-group">
                                                    <label for="refferal"><?php echo e(__('Program')); ?> </label>
                                                    <select class="form-select" name="mode">
                                                        <option value="<?php echo e($applicantsDetails -> mode); ?>"><?php echo e($applicantsDetails -> mode); ?> </option>
                                                        <option value="PGD">PGD</option>
                                                        <option value="M.Sc">M.Sc</option>
                                                        <option value="PhD">PhD</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">

                                                <div class="form-group">
                                                    <label for="refferal"><?php echo e(__('Mode of Learning')); ?> </label>
                                                    <select class="form-select" name="type">
                                                        <option value="<?php echo e($applicantsDetails -> type); ?>"><?php echo e($applicantsDetails -> type); ?> </option>
                                                        <option value="Full Time">Full Time</option>
                                                        <option value="Part Time">Part Time</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">

                                                <div class="form-group">
                                                    <label for="refferal"><?php echo e(__('Research Topic')); ?> </label>
                                                    <input id="first_choice" type="text" class="form-control" name="research_topic" value="<?php echo e($applicantsDetails -> research_topic); ?>" required autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="refferal"><?php echo e(__('Course of Study')); ?> </label>
                                                    <select class="form-select" name="course_applied">
                                                        <option value="<?php echo e($applicantsDetails -> course_applied); ?>"><?php echo e($applicantsDetails -> course_applied); ?></option>
                                                        <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <option value="<?php echo e($program->name); ?>"><?php echo e($program->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>

                                                </div>
                                            </div>
                                            <h5 class="h6 text-success text-center fw-bold mb-4 pt-2">Post Secondary Education and Certifications </h5>

                                            <div class="form-group">
                                                <label for="refferal"><?php echo e(__('Institution')); ?> </label>
                                                <div class="form-group">
                                                    <input id="second_choice" type="text" class="form-control" name="institution" value="<?php echo e($applicantsDetails -> institution); ?>" required autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="refferal"><?php echo e(__('Period')); ?> </label>
                                                <div class="form-group">
                                                    <input id="subject_1" type="text" name="period" class="form-control" value="<?php echo e($applicantsDetails -> period); ?>" autofocus required>
                                                </div>
                                            </div>
                                            <div class="form-group">

                                                <div class="form-group">
                                                    <label for="refferal"><?php echo e(__('Course')); ?> </label>
                                                    <input id="subject_2" type="text" name="course" class="form-control" required value="<?php echo e($applicantsDetails -> course); ?>" autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="refferal"><?php echo e(__('Certificate Obtained')); ?> </label>
                                                    <input id="subject_3" type="text" name="certificate_name" class="form-control" required value="<?php echo e($applicantsDetails -> certificate_name); ?>" autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group">

                                                <div class="form-group">
                                                    <label for="refferal"><?php echo e(__('Type of Certificate')); ?> </label>
                                                    <select class="form-select" name="certificate_type">
                                                        <option value="<?php echo e($applicantsDetails -> certificate_type); ?>"><?php echo e($applicantsDetails -> certificate_type); ?></option>
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
                                                    <label for="refferal"><?php echo e(__('Honour')); ?> </label>
                                                    <input id="subject_4" type="text" name="class_honour" class="form-control" value="<?php echo e($applicantsDetails -> class_honour); ?>" required autofocus>
                                                </div>
                                            </div>
                                            <h5 class="h6 text-success text-center fw-bold mb-2 pt-2">REFEREES </h5>
                                            <h6 class="h6 text-warning text-center fw-small mb-4 pt-2"> Provide three (3) referees, two (2) must be your former lecturers. </h6>
                                            
                                            <hr>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="refferal"><?php echo e(__('Name')); ?> </label>
                                                    <input id="subject_3" type="text" name="name1" class="form-control" required value="<?php echo e($applicantsDetails -> name1); ?>" autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="refferal"><?php echo e(__('Position')); ?> </label>
                                                    <input id="subject_3" type="text" name="position1" class="form-control" required value="<?php echo e($applicantsDetails -> position1); ?>" autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="refferal"><?php echo e(__('Institution/ Organisation')); ?> </label>
                                                    <input id="subject_3" type="text" name="institution1" class="form-control" required value="<?php echo e($applicantsDetails -> institution1); ?>" autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="refferal"><?php echo e(__('Nmae')); ?> </label>
                                                    <input id="subject_3" type="text" name="email1" class="form-control" required value="<?php echo e($applicantsDetails -> email1); ?>" autofocus>
                                                </div>
                                            </div>
                                            
                                            <hr>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <input id="subject_3" type="text" name="name2" class="form-control" required value="<?php echo e($applicantsDetails -> name2); ?>" autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <input id="subject_3" type="text" name="position2" class="form-control" required value="<?php echo e($applicantsDetails -> position2); ?>" autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <input id="subject_3" type="text" name="institution2" class="form-control" required value="<?php echo e($applicantsDetails -> institution2); ?>" autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <input id="subject_3" type="text" name="email2" class="form-control" required value="<?php echo e($applicantsDetails -> email1); ?>" autofocus>
                                                </div>
                                            </div>
                                            
                                            <hr>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <input id="subject_3" type="text" name="name3" class="form-control" required value="<?php echo e($applicantsDetails -> name3); ?>" autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <input id="subject_3" type="text" name="position3" class="form-control" required value="<?php echo e($applicantsDetails -> position3); ?>" autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <input id="subject_3" type="text" name="institution3" class="form-control" required value="<?php echo e($applicantsDetails -> institution1); ?>" autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <input id="subject_3" type="text" name="email3" class="form-control" required value="<?php echo e($applicantsDetails -> email1); ?>" autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-group">

                                                    
                                                    <button type="submit" class="btn btn-success">
                                                        <?php echo e(__('Update')); ?>

                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane fade" id="profile3-tab-pane" role="tabpanel" aria-labelledby="profile3-tab" tabindex="0">
                                        <form method="POST" action="/editutmeuploads"enctype="multipart/form-data"
                                        class="p-3">
                                        <?php echo csrf_field(); ?>
   <div class="row">
                                                    <div class="col"> <img class="mx-auto d-block"
                                                            src="data:image/jpeg;base64,<?php echo e($applicantsDetails->jamb); ?>"
                                                            alt="Transcipt" style="height: 300px; width:300px;" /></div>
                                                    <div class="col"> <img class="mx-auto d-block"
                                                            src="data:image/jpeg;base64,<?php echo e($applicantsDetails->olevel1); ?>"
                                                            alt="Olevel" style="height: 300px; width:300px;" /></div>
                                                    <div class="col"> <img class=" mx-auto d-block"
                                                            src="data:image/jpeg;base64,<?php echo e($applicantsDetails->olevel2); ?>"
                                                            alt="" style="height: 300px; width:300px;" /></div>
                                                </div>

                                        <div class="form-group">

                                            <?php if(session('statusMsg')): ?>
                                                <?php echo session('statusMsg'); ?>

                                            <?php endif; ?>
                                            <label for="passport"><?php echo e(__('Edit  Degree Certificate')); ?>

                                            </label>

                                            <div class="form-group">
                                                <input id="jamb" type="file" class="form-control"
                                                    name="jamb">
                                            </div>
                                        </div>

                                        

                                        
                                        <div class="form-group">
                                            <label for="passport"><?php echo e(__('Edit Olevel Result')); ?>

                                            </label>

                                            <div class="form-group">
                                                <input id="olevel1" type="file" class="form-control"
                                                    name="olevel1">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">

                                            <p>Edit Olevel Result  <b class="text-danger">(  if any)</b></p>
                                            <div class="form-group">
                                                <input id="olevel2" type="file" class="form-control"
                                                    name="olevel2">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">

                                                
                                                <button type="submit" class="btn btn-success">
                                                    <?php echo e(__('update')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                        

                                                        
                                                        
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
    </div>


</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.userapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\Documents\WEB DEV\Work-VUNA\laraproject\resources\views/admissions//editPG.blade.php ENDPATH**/ ?>
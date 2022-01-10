@extends('default')

@section('content1')

 <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
  
        <!-- BEGIN HEADER -->
     
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">                           <!---K-->
                            <div class="portlet light bordered"  id="form_wizard_1">
                                <div class="portlet-title" style="background-color:#48525e; ">
                                    <div class="caption" style="color:#bcc2cb">
                                        <i class=" icon-layers "></i>
                                        <span class="caption-subject  bold uppercase"> Register Staff -
                                            <span class="step-title"> Step 1 of 4 </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form class="form-horizontal" action="" id="submit_form" enctype="multipart/form-data" method="POST">  {{ csrf_field() }}
                                        <div class="form-wizard">
                                            <div class="form-body">
                                                <ul class="nav nav-pills nav-justified steps">
                                                    <li>
                                                        <a href="#tab1" data-toggle="tab" class="step">
                                                            <span class="number"> 1 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i>  Account Setup </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab2" data-toggle="tab" class="step">
                                                            <span class="number"> 2 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Staff Profile Setup </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab3" data-toggle="tab" class="step active">
                                                            <span class="number"> 3 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Staff Status Details</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab4" data-toggle="tab" class="step">
                                                            <span class="number"> 4 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> Confirm Staff Account</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div id="bar" class="progress progress-striped" role="progressbar">
                                                    <div class="progress-bar progress-bar-success"> </div>
                                                </div>
                                                <div class="tab-content">
                                                    <div class="alert alert-danger display-none">
                                                        <button class="close" data-dismiss="alert"></button> You have some form errors. Please check below. </div>
                                                    <div class="alert alert-success display-none">
                                                        <button class="close" data-dismiss="alert"></button> Your form validation is successful! </div>
                                                    <div class="tab-pane active" id="tab1">
                                                        <h3 class="block">Provide Staff Account details</h3>
                                                          <div class="form-group">
                                                              
                                                                  <center><div>
                                                       
                                                              <input type="file" style="visibility: hidden" class="galleryImg" name="file" class="form-control" 
                                                                
                                                    onchange="display(this)"  
                                                                 name=""
                                                                value=""/>
                                                               
                                                            </div></center>
                                                          
                                                        

                                                            </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Staff ID
                                                                <span class="required"> * </span>
                                                            </label>


                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"
                                                                value="{!!$staff_code!!}" 
                                                                name="staff_code" required="" />
                                                                <span class="help-block"> Provide  Student ID </span>
                                                            </div>
                                                        </div>
                                                           <div class="form-group">
                                                            <label class="control-label col-md-3">Phone Number
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" 
                                                                value="{!!$phoneNumber!!}" 

                                                                name="pNumber" required/>

                                                  @if ($errors->has('pNumber'))
                                                         <span class="help-block">
                                                        <strong>{{ $errors->first('pNumber') }}</strong>
                                                                      </span>
                                @endif
                                                                <span class="help-block"> Provide Staff phone number </span>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Staff Email
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"
                                                                placeholder="example2500@gmail.com" name="email"
                                                                value="{!!$email!!}" />

                                                @if ($errors->has('email'))
                                                     <span  class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                                          </span>
                                                     @endif
                                                                <span class="help-block"> Provide Staff Email </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab2">
                                                        <h3 class="block">Provide Staff Profile details</h3>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">First Name
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="fName" 
                                                                required="" value="{!!$firstName!!}" />

                                                   @if ($errors->has('fName'))
                                                    <span class="help-block">
                                               <strong>{{ $errors->first('fName') }}</strong>
                                                     </span>
                                                         @endif
                                                                <span class="help-block"> Provide First Name </span>
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <label class="control-label col-md-3">Last Name
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="lName" required="" value="{!!$lastName!!}" />

                                                     @if ($errors->has('lName'))
                                                      <span class="help-block">
                                                  <strong>{{ $errors->first('lName') }}</strong>
                                                      </span>
                                                        @endif
                                                                <span class="help-block"> Provide Last Name </span>
                                                            </div>
                                                        </div>
                                                          <div class="form-group">
                                                            <label class="control-label col-md-3">Middle Name
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="mName" required="" value="{!!$middleName!!}" />

                                                        @if ($errors->has('mName'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('mName') }}</strong>
                                                                  </span>
                                                            @endif
                                                                <span class="help-block"> Provide Middle Name </span>
                                                            </div>
                                                        </div>
                                                  
                                                   
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Gender
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <div class="radio-list">
                                                                    <label>
                                                                        <input type="radio" name="gender" value="M" data-title="Male"  required="" /> Male </label>
                                                                    <label>
                                                                        <input type="radio" name="gender" value="F" data-title="Female" required="" /> Female </label>
                                                                </div>
                                                                <div id="form_gender_error" > </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                    <label class="control-label col-md-3">Date of Birth <span class="required">*</span></label>
                                                    <div class="col-md-4">
                                                        <input class="form-control" id="mask_date2" type="text"  name="dofBirth"  required="" value="{!!$dofBirth!!}"  />
                                                        <span class="help-block"> Date of Birth </span>
                                                    </div>
                                                </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Address
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="sAddress" required="" value="{!!$Address!!}" />
                                                                 @if ($errors->has('sAddress'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('sAddress') }}</strong>
                                                                      </span>
                                                                 @endif
                                                                <span class="help-block"> Provide Student street Address </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">City/Town
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="{!!$city!!}" required value="paynesville" />
                                                                 @if ($errors->has('sCity'))
                                                         <span class="help-block">
                                                        <strong>{{ $errors->first('sCity') }}</strong>
                                                                      </span>
                                                                 @endif
                                                                <span class="help-block"> Provide your city or town </span>
                                                            </div>
                                                        </div>
                                                            <div class="form-group">
                                                            <label class="control-label col-md-3">Nationality
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control"
                                                                value="Liberian"
                                                                 name="sNationality" required/>
                                                                <span class="help-block"> Provide Student Nationality </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Country of Birth</label>
                                                            <div class="col-md-4">
                                                                <select name="country" id="country" class="form-control">
                                                            <option value="{!!$country!!}"> {!!$country!!}</option>
                                                                    <option value="AF">Afghanistan</option>
                                                                    <option value="AL">Albania</option>
                                                                    <option value="DZ">Algeria</option>
                                                                    <option value="AS">American Samoa</option>
                                                                    <option value="AD">Andorra</option>
                                                                    <option value="AO">Angola</option>
                                                                    <option value="AI">Anguilla</option>
                                                                    <option value="AR">Argentina</option>
                                                                    <option value="AM">Armenia</option>
                                                                    <option value="AW">Aruba</option>
                                                                    <option value="AU">Australia</option>
                                                                    <option value="AT">Austria</option>
                                                                    <option value="AZ">Azerbaijan</option>
                                                                    <option value="BS">Bahamas</option>
                                                                    <option value="BH">Bahrain</option>
                                                                    <option value="BD">Bangladesh</option>
                                                                    <option value="BB">Barbados</option>
                                                                    <option value="BY">Belarus</option>
                                                                    <option value="BE">Belgium</option>
                                                                    <option value="BZ">Belize</option>
                                                                    <option value="BJ">Benin</option>
                                                                    <option value="BM">Bermuda</option>
                                                                    <option value="BT">Bhutan</option>
                                                                    <option value="BO">Bolivia</option>
                                                                    <option value="BA">Bosnia and Herzegowina</option>
                                                                    <option value="BW">Botswana</option>
                                                                    <option value="BV">Bouvet Island</option>
                                                                    <option value="BR">Brazil</option>
                                                                    <option value="IO">British Indian Ocean Territory</option>
                                                                    <option value="BN">Brunei Darussalam</option>
                                                                    <option value="BG">Bulgaria</option>
                                                                    <option value="BF">Burkina Faso</option>
                                                                    <option value="BI">Burundi</option>
                                                                    <option value="KH">Cambodia</option>
                                                                    <option value="CM">Cameroon</option>
                                                                    <option value="CA">Canada</option>
                                                                    <option value="CV">Cape Verde</option>
                                                                    <option value="KY">Cayman Islands</option>
                                                                    <option value="CF">Central African Republic</option>
                                                                    <option value="TD">Chad</option>
                                                                    <option value="CL">Chile</option>
                                                                    <option value="CN">China</option>
                                                                    <option value="CX">Christmas Island</option>
                                                                    <option value="CC">Cocos (Keeling) Islands</option>
                                                                    <option value="CO">Colombia</option>
                                                                    <option value="KM">Comoros</option>
                                                                    <option value="CG">Congo</option>
                                                                    <option value="CD">Congo, the Democratic Republic of the</option>
                                                                    <option value="CK">Cook Islands</option>
                                                                    <option value="CR">Costa Rica</option>
                                                                    <option value="CI">Cote d'Ivoire</option>
                                                                    <option value="HR">Croatia (Hrvatska)</option>
                                                                    <option value="CU">Cuba</option>
                                                                    <option value="CY">Cyprus</option>
                                                                    <option value="CZ">Czech Republic</option>
                                                                    <option value="DK">Denmark</option>
                                                                    <option value="DJ">Djibouti</option>
                                                                    <option value="DM">Dominica</option>
                                                                    <option value="DO">Dominican Republic</option>
                                                                    <option value="EC">Ecuador</option>
                                                                    <option value="EG">Egypt</option>
                                                                    <option value="SV">El Salvador</option>
                                                                    <option value="GQ">Equatorial Guinea</option>
                                                                    <option value="ER">Eritrea</option>
                                                                    <option value="EE">Estonia</option>
                                                                    <option value="ET">Ethiopia</option>
                                                                    <option value="FK">Falkland Islands (Malvinas)</option>
                                                                    <option value="FO">Faroe Islands</option>
                                                                    <option value="FJ">Fiji</option>
                                                                    <option value="FI">Finland</option>
                                                                    <option value="FR">France</option>
                                                                    <option value="GF">French Guiana</option>
                                                                    <option value="PF">French Polynesia</option>
                                                                    <option value="TF">French Southern Territories</option>
                                                                    <option value="GA">Gabon</option>
                                                                    <option value="GM">Gambia</option>
                                                                    <option value="GE">Georgia</option>
                                                                    <option value="DE">Germany</option>
                                                                    <option value="GH">Ghana</option>
                                                                    <option value="GI">Gibraltar</option>
                                                                    <option value="GR">Greece</option>
                                                                    <option value="GL">Greenland</option>
                                                                    <option value="GD">Grenada</option>
                                                                    <option value="GP">Guadeloupe</option>
                                                                    <option value="GU">Guam</option>
                                                                    <option value="GT">Guatemala</option>
                                                                    <option value="GN">Guinea</option>
                                                                    <option value="GW">Guinea-Bissau</option>
                                                                    <option value="GY">Guyana</option>
                                                                    <option value="HT">Haiti</option>
                                                                    <option value="HM">Heard and Mc Donald Islands</option>
                                                                    <option value="VA">Holy See (Vatican City State)</option>
                                                                    <option value="HN">Honduras</option>
                                                                    <option value="HK">Hong Kong</option>
                                                                    <option value="HU">Hungary</option>
                                                                    <option value="IS">Iceland</option>
                                                                    <option value="IN">India</option>
                                                                    <option value="ID">Indonesia</option>
                                                                    <option value="IR">Iran (Islamic Republic of)</option>
                                                                    <option value="IQ">Iraq</option>
                                                                    <option value="IE">Ireland</option>
                                                                    <option value="IL">Israel</option>
                                                                    <option value="IT">Italy</option>
                                                                    <option value="JM">Jamaica</option>
                                                                    <option value="JP">Japan</option>
                                                                    <option value="JO">Jordan</option>
                                                                    <option value="KZ">Kazakhstan</option>
                                                                    <option value="KE">Kenya</option>
                                                                    <option value="KI">Kiribati</option>
                                                                    <option value="KP">Korea, Democratic People's Republic of</option>
                                                                    <option value="KR">Korea, Republic of</option>
                                                                    <option value="KW">Kuwait</option>
                                                                    <option value="KG">Kyrgyzstan</option>
                                                                    <option value="LA">Lao People's Democratic Republic</option>
                                                                    <option value="LV">Latvia</option>
                                                                    <option value="LB">Lebanon</option>
                                                                    <option value="LS">Lesotho</option>
                                                                    <option value="LR">Liberia</option>
                                                                    <option value="LY">Libyan Arab Jamahiriya</option>
                                                                    <option value="LI">Liechtenstein</option>
                                                                    <option value="LT">Lithuania</option>
                                                                    <option value="LU">Luxembourg</option>
                                                                    <option value="MO">Macau</option>
                                                                    <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
                                                                    <option value="MG">Madagascar</option>
                                                                    <option value="MW">Malawi</option>
                                                                    <option value="MY">Malaysia</option>
                                                                    <option value="MV">Maldives</option>
                                                                    <option value="ML">Mali</option>
                                                                    <option value="MT">Malta</option>
                                                                    <option value="MH">Marshall Islands</option>
                                                                    <option value="MQ">Martinique</option>
                                                                    <option value="MR">Mauritania</option>
                                                                    <option value="MU">Mauritius</option>
                                                                    <option value="YT">Mayotte</option>
                                                                    <option value="MX">Mexico</option>
                                                                    <option value="FM">Micronesia, Federated States of</option>
                                                                    <option value="MD">Moldova, Republic of</option>
                                                                    <option value="MC">Monaco</option>
                                                                    <option value="MN">Mongolia</option>
                                                                    <option value="MS">Montserrat</option>
                                                                    <option value="MA">Morocco</option>
                                                                    <option value="MZ">Mozambique</option>
                                                                    <option value="MM">Myanmar</option>
                                                                    <option value="NA">Namibia</option>
                                                                    <option value="NR">Nauru</option>
                                                                    <option value="NP">Nepal</option>
                                                                    <option value="NL">Netherlands</option>
                                                                    <option value="AN">Netherlands Antilles</option>
                                                                    <option value="NC">New Caledonia</option>
                                                                    <option value="NZ">New Zealand</option>
                                                                    <option value="NI">Nicaragua</option>
                                                                    <option value="NE">Niger</option>
                                                                    <option value="NG">Nigeria</option>
                                                                    <option value="NU">Niue</option>
                                                                    <option value="NF">Norfolk Island</option>
                                                                    <option value="MP">Northern Mariana Islands</option>
                                                                    <option value="NO">Norway</option>
                                                                    <option value="OM">Oman</option>
                                                                    <option value="PK">Pakistan</option>
                                                                    <option value="PW">Palau</option>
                                                                    <option value="PA">Panama</option>
                                                                    <option value="PG">Papua New Guinea</option>
                                                                    <option value="PY">Paraguay</option>
                                                                    <option value="PE">Peru</option>
                                                                    <option value="PH">Philippines</option>
                                                                    <option value="PN">Pitcairn</option>
                                                                    <option value="PL">Poland</option>
                                                                    <option value="PT">Portugal</option>
                                                                    <option value="PR">Puerto Rico</option>
                                                                    <option value="QA">Qatar</option>
                                                                    <option value="RE">Reunion</option>
                                                                    <option value="RO">Romania</option>
                                                                    <option value="RU">Russian Federation</option>
                                                                    <option value="RW">Rwanda</option>
                                                                    <option value="KN">Saint Kitts and Nevis</option>
                                                                    <option value="LC">Saint LUCIA</option>
                                                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                                                    <option value="WS">Samoa</option>
                                                                    <option value="SM">San Marino</option>
                                                                    <option value="ST">Sao Tome and Principe</option>
                                                                    <option value="SA">Saudi Arabia</option>
                                                                    <option value="SN">Senegal</option>
                                                                    <option value="SC">Seychelles</option>
                                                                    <option value="SL">Sierra Leone</option>
                                                                    <option value="SG">Singapore</option>
                                                                    <option value="SK">Slovakia (Slovak Republic)</option>
                                                                    <option value="SI">Slovenia</option>
                                                                    <option value="SB">Solomon Islands</option>
                                                                    <option value="SO">Somalia</option>
                                                                    <option value="ZA">South Africa</option>
                                                                    <option value="GS">South Georgia and the South Sandwich Islands</option>
                                                                    <option value="ES">Spain</option>
                                                                    <option value="LK">Sri Lanka</option>
                                                                    <option value="SH">St. Helena</option>
                                                                    <option value="PM">St. Pierre and Miquelon</option>
                                                                    <option value="SD">Sudan</option>
                                                                    <option value="SR">Suriname</option>
                                                                    <option value="SJ">Svalbard and Jan Mayen Islands</option>
                                                                    <option value="SZ">Swaziland</option>
                                                                    <option value="SE">Sweden</option>
                                                                    <option value="CH">Switzerland</option>
                                                                    <option value="SY">Syrian Arab Republic</option>
                                                                    <option value="TW">Taiwan, Province of China</option>
                                                                    <option value="TJ">Tajikistan</option>
                                                                    <option value="TZ">Tanzania, United Republic of</option>
                                                                    <option value="TH">Thailand</option>
                                                                    <option value="TG">Togo</option>
                                                                    <option value="TK">Tokelau</option>
                                                                    <option value="TO">Tonga</option>
                                                                    <option value="TT">Trinidad and Tobago</option>
                                                                    <option value="TN">Tunisia</option>
                                                                    <option value="TR">Turkey</option>
                                                                    <option value="TM">Turkmenistan</option>
                                                                    <option value="TC">Turks and Caicos Islands</option>
                                                                    <option value="TV">Tuvalu</option>
                                                                    <option value="UG">Uganda</option>
                                                                    <option value="UA">Ukraine</option>
                                                                    <option value="AE">United Arab Emirates</option>
                                                                    <option value="GB">United Kingdom</option>
                                                                    <option value="US">United States</option>
                                                                    <option value="UM">United States Minor Outlying Islands</option>
                                                                    <option value="UY">Uruguay</option>
                                                                    <option value="UZ">Uzbekistan</option>
                                                                    <option value="VU">Vanuatu</option>
                                                                    <option value="VE">Venezuela</option>
                                                                    <option value="VN">Viet Nam</option>
                                                                    <option value="VG">Virgin Islands (British)</option>
                                                                    <option value="VI">Virgin Islands (U.S.)</option>
                                                                    <option value="WF">Wallis and Futuna Islands</option>
                                                                    <option value="EH">Western Sahara</option>
                                                                    <option value="YE">Yemen</option>
                                                                    <option value="ZM">Zambia</option>
                                                                    <option value="ZW">Zimbabwe</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                      
                                                    </div>
                                                    <div class="tab-pane" id="tab3">
                                                        <h3 class="block">Provide Staff Details</h3>
                                                         
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Role
                                                                <span class="required"> * </span>
                                                            </label>
                                                     <div class="col-md-4">
                                                                <input type="text" class="form-control" name="role" value="{!!$Role!!}" required />
                                                                 @if ($errors->has('role'))
                                                              <span class="help-block">
                                                            <strong>{{ $errors->first('role') }}</strong>
                                                                      </span>
                                                                 @endif
                                                                <span class="help-block"> 
                                                                    Provide Staff Role
                                                                </span>
                                                            </div>
                                                        </div>
                                                     <div class="form-group">
                                                            <label class="control-label col-md-3">Select Staff Campus</label>
                                                            <div class="col-md-4">
                                                                <select name="campus" id="country_list" class="form-control" required="">
                                                         <option value=""><span style="color:yellow">Select--Campus</span></option>
                                                    @foreach($campusName as $keys=>$value)   
                                                    <option value="{!!$keys!!}">
                                                    {!!$value!!}</option>
                                                    @endforeach       
                                                                </select>
                                                                
                                                            </div>
                                                        </div>
                                                   <div class="form-group">
                                                            <label class="control-label col-md-3">Relationship Status<span class="required">*</span></label>
                                                            <div class="col-md-4">
                                                                <select name="rSatus" id="country_list" class="form-control" required="">
                                                         <option value=""><span style="color:yellow">Select--Status</span></option>
                                                            <option value="single">Single</option>
                                                            <option value="marriage">Marriage</option>
                                                            <option value="devorce">Devorce</option>
                                                                </select>
                                                                <span class="help-block"> 
                                                                    Provide Relationship Status
                                                                </span> 
                                                            </div>
                                                        </div> 

                                                    <div class="form-group">
                                                    <label class="control-label col-md-3">Employement Date <span class="required">*</span></label>
                                                    <div class="col-md-4">
                                                        <input class="form-control" id="mask_date" value="{!!$employDate!!}" name="eDate" type="text" />
                                                        <span class="help-block"> d/m/y <br>
                                                        Provide Employement Date</span>
                                                    </div>
                                                      </div>
                                                        
                                                            <div class="form-group">
                                                            <label class="control-label col-md-3">Religion
                                                                <span class="required"> *
                                                                 </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" placeholder="" class="form-control" name="religion" value="Christian" required="" />
                                                                 @if ($errors->has('religion'))
                                                         <span class="help-block">
                                                        <strong>{{ $errors->first('religion') }}</strong>
                                                                      </span>
                                                                 @endif
                                                                <span class="help-block">
                                                                Provide Religion
                                                                </span>
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <label class="control-label col-md-3">Pysical Defect
                                                                <span class="required"> *
                                                                 </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" placeholder="" class="form-control" name="pdefect" value="Normal" required="" />
                                                                 @if ($errors->has('pdefect'))
                                                         <span class="help-block">
                                                        <strong>{{ $errors->first('pdefect') }}</strong>
                                                                      </span>
                                                                 @endif
                                                                <span class="help-block">
                                                                Provide physical Defect
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab4">
                                                        <h3 class="block">Confirm your account</h3>
                                                       <center> <div>
                                                           <img src="{{ URL::to('/')}}/{!!$staff_photo!!}" 
                                                            style="height: auto;max-width: 100%;width: 150px;height: 150px;" 
                                                              class="galleryDisplay"
                                                            onclick="trigger()"
                                                            >
                                                              @if ($errors->has('file'))
                                                              <span class="help-block">
                                                            <strong>{{ $errors->first('file') }}</strong>
                                                                      </span>
                                                                 @endif
                                                             <span class="help-block"> Add Staff Photo </span>
                                                        </div></center>
                                                     
                                                        <h4 class="form-section">Account</h4>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Staff ID:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="staff_code"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Student Email:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="email"> </p>
                                                            </div>
                                                        </div>
                                                        <h4 class="form-section">Student Profile</h4>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">First Name:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="fName"> </p>
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <label class="control-label col-md-3">Last Name:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="lName"> </p>
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <label class="control-label col-md-3">Middle:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="mName"> </p>
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <label class="control-label col-md-3">Date of Birth:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="dofBirth"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Gender:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="gender"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Phone:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="pNumber"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Address:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="sAddress"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">City/Town:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="sCity"> </p>
                                                            </div>
                                                        </div>
                                                          <div class="form-group">
                                                            <label class="control-label col-md-3">Nationality:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="sNationality"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Country of Birth:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="country"> </p>
                                                            </div>
                                                        </div>
                                                        <h4 class="form-section">Staff Status Details</h4>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Staff Role:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="role"> </p>
                                                            </div>
                                                        </div> 
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Relationship Status:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="rSatus"> </p>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Employement Date:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="eDate"> </p>
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <label class="control-label col-md-3">Religion :</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="religion"> </p>
                                                            </div>
                                                        </div>
                                                          <div class="form-group">
                                                            <label class="control-label col-md-3">Physical Defect :</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="pdefect"> </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <a href="javascript:;" class="btn default button-previous">
                                                            <i class="fa fa-angle-left"></i> Back </a>
                                                        <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                                            <i class="fa fa-angle-right"></i>
                                                        </a>
                                                        <button class="btn green button-submit">Submit
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
           
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
   
@endsection

@section('scripts')

<!--<script src="{!!asset('assets/global/plugins/jquery.min.js')!!}" type="text/javascript"></script>
        <script src="{!!asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')!!}" type="text/javascript"></script>
        <script src="{!!asset('assets/global/plugins/js.cookie.min.js')!!}" type="text/javascript"></script>
        <script src="{!!asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')!!}" type="text/javascript"></script>
        <script src="{!!asset('assets/global/plugins/jquery.blockui.min.js')!!}" type="text/javascript"></script>
        <script src="{!!asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')!!}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
         <script src="{!!asset('js/script.js')!!}" type="text/javascript"></script>
        <script src="{!!asset('assets/global/plugins/select2/js/select2.full.min.js')!!}" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="{!!asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js')!!}" type="text/javascript"></script>
        <script src="{!!asset('assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js')!!}" type="text/javascript"></script>

        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{!!asset('assets/global/scripts/app.min.js')!!}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{!!asset('assets/pages/scripts/form-wizard.min.js')!!}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{!!asset('assets/layouts/layout5/scripts/layout.min.js')!!}" type="text/javascript"></script>

        <!--END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS This is the Date Script-->

        <script src="{!!('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js')!!}" type="text/javascript"></script>

          <script src="{!!('assets/pages/scripts/form-input-mask.min.js')!!}" type="text/javascript"></script>

          <script type="text/javascript">
             $("#country option[value='{!!$country!!}']").attr("disabled","disabled");
          </script>
     
        @endsection


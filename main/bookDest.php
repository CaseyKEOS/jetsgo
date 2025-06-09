<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/daterangepicker.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <title>JetsGo</title>
</head>

<body>

  <?php
  require 'nav.php';
  include 'connection.php';

  $id = $_GET['imgID'];
  $sql = "SELECT * FROM tbldestination WHERE imgID ='$id'";
  $query = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($query);
  ?>

  <nav class="nav-colored" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item"><a href="services.php">Services</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo $row['promoName']; ?></li>
    </ol>
  </nav>


  <!-- Main -->
  <div class="untree_co-section3">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mb-lg-0">
          <div class="card text-white" style="width: 35rem; background:#5E9BB8;">
            <img src="<?php echo "img/" . $row['imgName']; ?>" class="card-img-top" alt="...">
          </div>
        </div>
        <div class="col-lg-6 ml-auto">
          <div class="card container p-5 mb-3" style="background: #004175;">
            <span class="text-white text-bold" style="font-size: 40px;"><?php echo $row['promoName']; ?></span>
            <h5 class="text-white text-bold"><span class="icon-room"> </span><?php echo $row['locationName']; ?></h5>
            <hr>
            <h6 class="text-white text-bold"><?php echo $row['pcurrency'] ?><?php echo $row['pPrice']; ?></h6>
          </div>
          <div class="card p-3">
            <ul class="nav nav-tabs" id="myTab">
              <li class="nav-item">
                <a href="#itinerary" class="nav-link active" data-bs-toggle="tab">Itinerary</a>
              </li>
              <li class="nav-item">
                <a href="#inexclusion" class="nav-link" data-bs-toggle="tab">Inclusions / Exclusions</a>
              </li>
              <li class="nav-item">
                <a href="#tandc" class="nav-link" data-bs-toggle="tab">Terms and Conditions</a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="itinerary">
                <div class="accordion mb-3 mt-3" id="accordionExample">
                  <h2 class="text-bold text-black container">Itinerary</h2>
                  <?php
                  $sql = "SELECT * FROM tbldestdetails WHERE destID = '$id' && detailType = 'itinerary' ORDER BY detPosition";
                  $result = mysqli_query($conn, $sql);
                  while ($row = $result->fetch_assoc()) :
                  ?>
                    <div class="accordion-item text-black">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $row['naryID'] ?>" aria-expanded="true" aria-controls="collapse<?php echo $row['naryID'] ?>">
                          <h5 class="text-bold"><?php echo $row['destTitle'] ?></h5>
                        </button>
                      </h2>
                      <div id="collapse<?php echo $row['naryID'] ?>" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                          <pre class="inner-pre container text-black" style="font-size: 16px; font-family: sans-serif; white-space: pre-wrap; "><?php echo $row['destDetails'] ?></pre>
                        </div>
                      </div>
                    </div>
                  <?php endwhile; ?>
                </div>
              </div>
              <div class="tab-pane fade" id="inexclusion">
                <h2 class="text-bold text-black container mt-3">Inclusions:</h2>
                <?php
                $sql = "SELECT * FROM tbldestdetails WHERE destID = '$id' && detailType = 'inclusion'";
                $result = mysqli_query($conn, $sql);
                while ($row = $result->fetch_assoc()) :
                ?>
                  <p><i class="bi bi-check-circle-fill text-success"> </i> <?php echo $row['destDetails'] ?></p>
                <?php endwhile; ?>
                <h2 class="text-bold text-black container">Exclusions:</h2>
                <?php
                $sql = "SELECT * FROM tbldestdetails WHERE destID = '$id' && detailType = 'exclusion'";
                $result = mysqli_query($conn, $sql);
                while ($row = $result->fetch_assoc()) :
                ?>
                  <p><i class="bi bi-x-circle-fill text-danger"> </i> <?php echo $row['destDetails'] ?></p>
                <?php endwhile; ?>
              </div>
              <div class="tab-pane fade" id="tandc">
                <?php
                $sql = "SELECT * FROM tbldestdetails WHERE destID = '$id' && detailType = 'tnc'";
                $result = mysqli_query($conn, $sql);
                while ($row = $result->fetch_assoc()) :
                ?>
                  <h4 class="mt-2 text-bold text-black container"><?php echo $row['destTitle'] ?></h4>
                  <pre class="inner-pre container text-black" style="font-size: 16px; font-family: sans-serif; white-space: pre-wrap; "><span><?php echo $row['destDetails'] ?></span></pre>
                <?php endwhile; ?>
                <pre class="inner-pre text-black" style="font-size: 16px; font-family: sans-serif; white-space: pre-wrap; ">
    Please message us with any questions you may have about alternative plans, your ideal hotel, or the requirements for an airline ticket.
    Travel around Philippines, visit our <a href="services.php#domestic" style="color:#E0A800;">Domestic Tour.</a>
    Travel around the world with fixed departures dates, visit our <a href="services.php#international" style="color:#E0A800;">International Tour.</a></pre>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="untree_co-section2">

  </div>

  <!-- enquiry form -->
  <?php

  $id = $_GET['imgID'];
  $sql = "SELECT * FROM tbldestination WHERE imgID ='$id'";
  $query = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($query);
  ?>

  <div class="untree_co-section" style="background:#5E9BB8;">
    <form class="contact-form" action="send_email.php" method="POST">
      <div class="container" align="center">
        <h1 class="mb-3 text-white text-bold">You can send your enquiry via the form below.</h1>
        <h5 class="mb-5 text-black text-bold">Promo name: <?php echo $row['promoName']; ?></h5>
        <input type="text" name="promo" id="promo" value="<?php echo $row['promoName']; ?>" hidden>
        <div class="row g-3 mb-3">
          <div class="col">
            <div class="">
              <label class="text-black text-bold" for="name">Your Name</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Full name" required>
            </div>
          </div>
          <div class="col">
            <label class="text-black text-bold" for="email">Your Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email" required>
          </div>
        </div>
        <div class="row g-3 mb-3">
          <div class="col">
            <label class="text-black text-bold" for="contactnumber">Contact Number</label>
            <input type="number" class="form-control" name="contactnumber" id="contactnumber" placeholder="Enter your Contact Number" required>
          </div>
          <div class="col">
            <label class="text-black text-bold" for="country">Country</label>
            <select id="country" name="country" class="form-control" required>
              <option value="" selected disabled>Select a country</option>
              <option value="Afghanistan">Afghanistan</option>
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
        <div class="row g-3 mb-3">
          <div class="col">
            <div class="">
              <label class="text-black text-bold" for="noofadults">No. of Adults</label>
              <input type="number" class="form-control" name="noofadults" id="noofadults" placeholder="Enter the Number of Adults" required>
            </div>
          </div>
          <div class="col">
            <label class="text-black text-bold" for="noofchilds">No. of Children</label>
            <input type="number" class="form-control" name="noofchilds" id="noofchilds" placeholder="Enter the Number of Children" required>
          </div>
        </div>
        <div class="row g-3 mb-3">
          <div class="col">
            <div class="">
              <label class="text-black text-bold" for="enquirysub">Enquiry Subject</label>
              <input type="text" class="form-control" name="enquirysub" id="enquirysub" placeholder="Enter the Enquiry Subject" required>
            </div>
          </div>
        </div>
        <div class="row g-3 mb-3">
          <div class="col">
            <div class="">
              <label class="text-black text-bold" for="message">Your Message</label>
              <textarea class="form-control" name="message" id="message" cols="30" rows="5" placeholder="Enter your Message here" required></textarea>
            </div>
          </div>
        </div>
        <div class="form-check mb-3">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate" required>
          <label class="form-check-label" for="flexCheckIndeterminate">
            By contacting us, you agree to our <a href="" class="text-yellow"><b>Privacy Policy</b></a>
          </label>
        </div>
        <button type="submit" name="send" class="btn btn-primary" onclick="sendemail()">Send Message</button>
      </div>
    </form>
  </div>

  <?php
  include 'assets/php/footer.php';
  ?>

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/moment.min.js"></script>
  <script src="js/daterangepicker.js"></script>

  <script src="js/typed.js"></script>

  <script src="js/custom.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
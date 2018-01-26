<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12/29/2017
 * Time: 3:31 PM
 */
    require_once './include/header.php';
    require 'include/checklogin.php';

    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != 0) {
        $sql = "SELECT * FROM tbl_user where user_id = '".$_SESSION['user_id']."'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }
    }
?>

    <div class="container">
        <div class="row main-title">
            <h2>This is Where Your Success Happens</h2>
        </div>

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#profile-tab">Profile</a></li>
            <li><a data-toggle="tab" href="#list-tab">Lists</a></li>
            <li><a data-toggle="tab" href="#videos-tab">Videos</a></li>
            <li><a data-toggle="tab" href="#upload-tab">Upload</a></li>
            <li><a data-toggle="tab" href="#billing-tab">Billing</a></li>
            <li><a data-toggle="tab" href="#plan-tab">Plan</a></li>
            <li><a data-toggle="tab" href="#faq-tab">FAQ</a></li>
        </ul>

        <div class="tab-content">

            <div id="profile-tab" class="tab-pane fade in active">

                <p>*If you are trying <b>VideoDup</b> for free, then you just need to fill out this <b>Profile</b>
                    tab,  <b>Lists</b> tab and the <b>Videos</b> tab above (just these 3 tabs), then you can go to
                    the <b>Upload</b> tab to upload your one video 10 times! (aka 10 <b>VideoDups</b>)</p>
                <div class="row">
                    <div class="col-md-4">
                        <form id="uploadlogoform" action="" method="post" enctype="multipart/form-data">
                            <div class="upload-logo-preview">
                                <?php
                                if (isset($_SESSION['user_id']) && isset($row) && $_SESSION['user_id'] != 0) {
                                    echo '<img src="'.BASE_URL.'assets/uploads/profile/'.$row['logo_image'].'" id="logo-preview-image">';    
                                } else {
                                    echo '<img src="'.BASE_URL.'assets/images/videodup-logo.png" id="logo-preview-image">';    
                                }
                                ?>
                                <br>
                                <button type="button" class="btn btn-success" id="upload-logo-btn">Upload Logo</button>
                                <p><h4 style="text-align: center;">jpg or png</h4></p>
                                <input type="file" name="logoimagefile" id="logoimagefile" accept="image/*">
                            </div>
                        </form>
                        <div id="uploadlogomessage">

                        </div>
                    </div>

                    <div class="col-md-8 input-part">
                        <form id="profile-form" class="form-horizontal" method="post" action="">
                            <div class="form-group">
                                <label class="control-label col-sm-5">Name or Business</label>
                                <div class="col-sm-5">

                                <?php
                                if (isset($_SESSION['user_id']) && isset($row) && $_SESSION['user_id'] != 0) {
                                    echo ' <input type="text" class="form-control" placeholder="Name or Business" id="name_or_business" required value="'.$row['name_or_business'].'">';    
                                } else {
                                    echo ' <input type="text" class="form-control" placeholder="Name or Business" id="name_or_business" required>';    
                                }
                                ?>
                                </div>
                                <label class="validation-label col-md-2">*</label>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-5">Your Cell Number</label>
                                <div class="col-sm-5">
                                <?php
                                if (isset($_SESSION['user_id']) && isset($row) && $_SESSION['user_id'] != 0) {
                                    echo '<input type="text" class="form-control" placeholder="6269876543"
                                           id="cell_number" required value="'.$row['cell_number'].'">';    
                                } else {
                                    echo '<input type="text" class="form-control" placeholder="6269876543"
                                           id="cell_number" required>';    
                                }
                                ?>
                                </div>
                                <label class="validation-label col-md-2">(USA only) for instant notifications</label>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-5">Email</label>
                                <div class="col-sm-5">
                                <?php
                                if (isset($_SESSION['user_id']) && isset($row) && $_SESSION['user_id'] != 0) {
                                    echo '<input type="email" class="form-control" placeholder="Email" id="user_email" required value="'.$row['user_email'].'">';    
                                } else {
                                    echo '<input type="email" class="form-control" placeholder="Email" id="user_email" required>';    
                                }
                                ?>
                                    
                                </div>
                                <label class="validation-label col-md-2">*</label>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-5">User</label>
                                <div class="col-sm-5">
                                <?php
                                if (isset($_SESSION['user_id']) && isset($row) && $_SESSION['user_id'] != 0) {
                                    echo ' <input type="text" class="form-control" placeholder="User" id="user_name" required value="'.$row['user_name'].'">';    
                                } else {
                                    echo '<input type="text" class="form-control" placeholder="User" id="user_name" required>';    
                                }
                                ?>
                                </div>
                                <label class="validation-label col-md-2">*</label>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-5">Password</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" placeholder="Password" id="user_pwd"
                                           required>
                                </div>
                                <label class="validation-label col-md-2">*</label>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-5">Repeat Password</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" placeholder="Repeat Password"
                                           id="re_pwd" required>
                                </div>
                                <label class="validation-label col-md-2">*</label>
                            </div>

                            <div class="form-group">
                                <div class="control-labe col-md-offset-5 col-md-5">
                                    <div id="submitprofile" class="btn btn-success">Save</div>
                                </div>
                            </div>
                            <div id="saveprofilemessage">

                            </div>
                        </form>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-md-5 col-md-offset-5">
                        <p>Do you wish to make a request or have a question? Feel free to send a direct message here..</p>
                        <textarea class="col-md-12" style="width: 100%;" id="direct_message_txt"></textarea>
                        <button class="btn btn-success" style="margin-top: 10px;" id="send_direct_message_txt">Send</button>
                        <div id="send_dir_message_result"></div>
                    </div>
                </div> -->
            </div>

            <div id="list-tab" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                        <h3>Automatic List Builder</h3>
                        <p>Every list will have 5,000 phrases from your niche phrase. Be sure to type at least a 3 word phrase for your niche for the most targeted titles and keywords.</p>
                        
                        <input type="text" class="form-control" placeholder="type here..."><br>
                        <button class="btn btn-success">Build List</button>

                        
                        <br>
                        <br>

                        <div class="custom-progress-bar">
                            <div class="progress">
                              <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <label>95%</label>
                        </div>

                        <select class="form-control" style="margin-top: 30px;">
                            <option> See Your Lists(s) </option>
                        </select>

                    </div>

                    <div class="col-md-5 col-md-offset-1">
                        <h4 style="margin-top: 45px;">Upgrade To <a data-toggle="tab" href="#plan-tab" style="color: #193cc2;">Automatic List Builder</a></h4>
                        <h3 style="margin-top: 30px;">Excel Only</h3>
                        <h4>(CSV comma delimited)</h4>
                        <button class="btn btn-success">CLICK TO UPLOAD YOUR<br> TITLE & KEYWORD LIST</button>
                        <a href="#" id="popoversamplehover" style="color: #193cc2;">sample</a>
                        <div  style="display: none;">
                            <table id='popoversample' class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>Title</th>
                                    <th>KeyWords</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>Apple</td>
                                    <td>Apple</td>
                                  </tr>
                                  <tr>
                                    <td>Blue</td>
                                    <td>Blue</td>
                                  </tr>
                                  <tr>
                                    <td>Catty</td>
                                    <td>Catty</td>
                                  </tr>
                                  <tr>
                                    <td>Duig</td>
                                    <td>Duig</td>
                                  </tr>
                                  <tr>
                                    <td>Eggs</td>
                                    <td>Eggs</td>
                                  </tr>
                                  <tr>
                                    <td>Fun</td>
                                    <td>Fun</td>
                                  </tr>
                                  <tr>
                                    <td>Grab</td>
                                    <td>Grab</td>
                                  </tr>
                                  <tr>
                                    <td>Hunt</td>
                                    <td>Hunt</td>
                                  </tr>
                                  <tr>
                                    <td>lgloo</td>
                                    <td>lgloo</td>
                                  </tr>
                                  <tr>
                                    <td>Jacko</td>
                                    <td>Jacko</td>
                                  </tr>
                                  
                                </tbody>
                              </table>
                        </div>

                        <br>
                        <br>

                        <div class="custom-progress-bar">
                            <div class="progress">
                              <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <label>95%</label>
                        </div>
                        <select class="form-control" style="margin-top: 30px;">
                            <option> Your Own Lists(s) </option>
                        </select>
                    </div>
                </div>
            </div>

            <div id="videos-tab" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h3>Any video You Add Here You Can Then Select Inside the Upload Tab. Go Ahead And Add As
                            Many Videos As You Want To Promote.</h3>

                        <select class="form-control" style="margin-top: 30px;">
                            <option>See Your Videos(s)</option>
                        </select>
                        <br>
                        <button class="btn btn-success">Add Another Video</button>
                        <button class="btn btn-success">Upload</button>
                    </div>
                </div>
            </div>

            <div id="upload-tab" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-3" style="text-align: center; margin-top: 50px;">
                        <img src="<?=BASE_URL?>assets/images/video icon.png" style="width: 200px;">
                        <select class="form-control">
                            <option>select your video</option>
                        </select>

                        <button class="btn btn-success" style="margin-top: 10px;width: 100%;">
                            <h3> ADD </h3>
                        </button>

                        <br>
                        <br>

                        <div class="custom-progress-bar">
                            <div class="progress">
                              <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <label>95%</label>
                        </div>

                        <p><b>step1</b></p>
                    </div>

                    <div class="col-md-3" style="text-align: center; margin-top: 50px;">
                        <textarea class="form-control" placeholder="Type your description right here. For
                        example... Stop chronic Pain Naturally https://PesticideCleanse.com
                        https://Facebook.com/you https://twitter.com/you" style="width: 100%;resize: vertical;height:
                         230px;"></textarea>
                        <button class="btn btn-success" style="margin-top: 10px;width: 100%;">
                            <h3> ADD </h3>
                        </button>

                        <br>
                        <br>

                        <div class="custom-progress-bar">
                            <div class="progress">
                              <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <label>95%</label>
                        </div>

                        <p><b>step2</b></p>
                    </div>

                    <div class="col-md-3" style="text-align: center; margin-top: 50px;">
                        <img src="<?=BASE_URL?>assets/images/list.png" style="width: 200px;height: 100px;"><br>
                        <p style="text-align: left">Your Own Lists</p>
                        <select class="form-control">
                            <option>select your video</option>
                        </select>

                        <p style="text-align: left">Automatic List Builder</p>
                        <select class="form-control">
                            <option>select your list</option>
                        </select>

                        <button class="btn btn-success" style="margin-top: 10px;width: 100%;">
                            <h3> ADD </h3>
                        </button>

                        <br>
                        <br>

                        <div class="custom-progress-bar">
                            <div class="progress">
                              <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <label>95%</label>
                        </div>

                        <p><b>step3</b></p>
                    </div>

                    <div class="col-md-3" style="margin-top: 50px;">
                        <img src="<?=BASE_URL?>assets/images/radiobutton-checked-icon.png" style="width: 20px;height:
                        20px;">
                        <img src="<?=BASE_URL?>assets/images/youtube icon.png" style="width: 150px;">
                        <select class="form-control" style="margin-top: 10px;">
                            <option>SELECT YOUR ACCOUNT</option>
                        </select>
                        
                        <img src="<?=BASE_URL?>assets/images/radiobutton-unchecked-icon.png" style="width: 20px;height:
                        20px;">
                        <img src="<?=BASE_URL?>assets/images/vimeo icon.png" style="width: 150px;">
                        <select class="form-control" style="margin-top: 0px;">
                            <option>SELECT YOUR ACCOUNT</option>
                        </select>

                        <button class="btn btn-success" style="margin-top: 10px;width: 100%;">
                            <h3> Upload To Queue </h3>
                        </button>

                        <br>
                        <br>

                        <div class="custom-progress-bar">
                            <div class="progress">
                              <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <label>95%</label>
                        </div>

                        <p style="text-align: center;"><b>final step</b></p>
                        <p>*be sure to upload to seperate accounts, not to your personal or business accounts.
                        after upload completes go ahead and start again from step1 for another account.</p>
                    </div>
                </div>
            </div>

            <div id="billing-tab" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1>You May Update Your Billing Here</h1>
                        <form>
                            <div class="row">
                                <div class="form-group has-feedback owner col-md-6">
                                    <input type="text" class="form-control" id="owner" placeholder="Name On Card">
                                      <span class=" glyphicon glyphicon-lock form-control-feedback" style="right: 15px;"></span>
                                </div>    
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-12 has-feedback" id="card-number-field">
                                    <input type="text" class="form-control" id="cardNumber" placeholder="Credit Card Number">
                                    <span class=" glyphicon glyphicon-lock form-control-feedback" style="right: 15px;"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-3" id="expiration-date">
                                    <select class="form-control">
                                        <option value="01">January</option>
                                        <option value="02">February </option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                    <span class=" glyphicon glyphicon-lock form-control-feedback" style="right: 8px;"></span>
                                </div>
                                <div class="form-group col-md-3" id="expiration-date">
                                    <select class="form-control">
                                        <option value="18"> 2018</option>
                                        <option value="19"> 2019</option>
                                        <option value="20"> 2020</option>
                                        <option value="21"> 2021</option>
                                    </select>
                                    <span class=" glyphicon glyphicon-lock form-control-feedback" style="right: 8px;"></span>
                                </div>

                                <div class="form-group CVV col-md-3">
                                    <input type="text" class="form-control" id="cvv" placeholder="CVV Code...">
                                    <span class=" glyphicon glyphicon-lock form-control-feedback" style="right: 15px;"></span>
                                </div>

                                <div class="form-group CVV col-md-3">
                                    <input type="text" class="form-control" id="zipcode" placeholder="Zip">
                                    <span class=" glyphicon glyphicon-lock form-control-feedback" style="right: 15px;"></span>
                                </div>
                            </div>
                            
                            <div class="row" id="pay-now">
                                <button type="submit" class="btn btn-success col-md-offset-5" id="confirm-purchase">Save</button>
                            </div>
                        </form> 
                    </div>
                    
                </div>
            </div>

            <div id="plan-tab" class="tab-pane fade">
                <div class="row">
                   <h4 style="text-align: center;">25 videos uploaded per account per day</h4>
                   <h4 style="text-align: center;"> no nontracts - cancel or pause anytime - change your plan with just one click</h4>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="plan-item">
                            <input type="checkbox"> <label style="font-size: 30px;">$25</label> <b>monthly</b>
                            <div class="plan-account-number">1 account</div>
                            <div>
                                <img src="<?=BASE_URL?>assets/images/verisign-secured.png" style="width: 30%;">
                                <img src="<?=BASE_URL?>assets/images/payment-icons-set.png" style="width: 30%;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="plan-item">
                            <input type="checkbox"> <label style="font-size: 30px;">$45</label> <b>monthly</b>
                            <div class="plan-account-number">2 accounts</div>
                            <div>
                                <img src="<?=BASE_URL?>assets/images/verisign-secured.png" style="width: 30%;">
                                <img src="<?=BASE_URL?>assets/images/payment-icons-set.png" style="width: 30%;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="plan-item">
                            <input type="checkbox"> <label style="font-size: 30px;">$65</label> <b>monthly</b>
                            <div class="plan-account-number">3 accounts</div>
                            <div>
                                <img src="<?=BASE_URL?>assets/images/verisign-secured.png" style="width: 30%;">
                                <img src="<?=BASE_URL?>assets/images/payment-icons-set.png" style="width: 30%;">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-4">
                        <div class="plan-item">
                            <input type="checkbox"> <label style="font-size: 30px;">$85</label> <b>monthly</b>
                            <div class="plan-account-number">4 accounts</div>
                            <div>
                                <img src="<?=BASE_URL?>assets/images/verisign-secured.png" style="width: 30%;">
                                <img src="<?=BASE_URL?>assets/images/payment-icons-set.png" style="width: 30%;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="plan-item">
                            <input type="checkbox"> <label style="font-size: 30px;">$100</label> <b>monthly</b>
                            <div class="plan-account-number">5 accounts</div>
                            <div>
                                <img src="<?=BASE_URL?>assets/images/verisign-secured.png" style="width: 30%;">
                                <img src="<?=BASE_URL?>assets/images/payment-icons-set.png" style="width: 30%;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="plan-item">
                            <input type="checkbox"> <label style="font-size: 30px;">$150</label> <b>monthly</b>
                            <div class="plan-account-number">unlimited accounts</div>
                            <div>
                                <img src="<?=BASE_URL?>assets/images/verisign-secured.png" style="width: 30%;">
                                <img src="<?=BASE_URL?>assets/images/payment-icons-set.png" style="width: 30%;">
                            </div>
                        </div>
                    </div>
                </div>

                <p>-"1 account" means 1 YouTube account or 1 Vimeo account.</p>
                <p>-"2 accounts" means 2 YouTube accounts, 2 Vimeo accounts or 1 YouTobe account and 1 Vimeo account.</p>
                <p>-"3 accounts" means 3 YouTube accounts, 3 Vimeo accounts or any combination.</p>
                <p>-"4 accounts" means 4 YouTube accounts, 4 Vimeo accounts or any combination, etc...</p>

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <form>
                            <div class="row">
                                <div class="form-group has-feedback owner col-md-6">
                                    <input type="text" class="form-control" id="owner" placeholder="Name On Card">
                                      <span class=" glyphicon glyphicon-lock form-control-feedback" style="right: 15px;"></span>
                                </div>    
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-12 has-feedback" id="card-number-field">
                                    <input type="text" class="form-control" id="cardNumber" placeholder="Credit Card Number">
                                    <span class=" glyphicon glyphicon-lock form-control-feedback" style="right: 15px;"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-3" id="expiration-date">
                                    <select class="form-control">
                                        <option value="01">January</option>
                                        <option value="02">February </option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                    <span class=" glyphicon glyphicon-lock form-control-feedback" style="right: 8px;"></span>
                                </div>
                                <div class="form-group col-md-3" id="expiration-date">
                                    <select class="form-control">
                                        <option value="18"> 2018</option>
                                        <option value="19"> 2019</option>
                                        <option value="20"> 2020</option>
                                        <option value="21"> 2021</option>
                                    </select>
                                    <span class=" glyphicon glyphicon-lock form-control-feedback" style="right: 8px;"></span>
                                </div>

                                <div class="form-group CVV col-md-3">
                                    <input type="text" class="form-control" id="cvv" placeholder="CVV Code...">
                                    <span class=" glyphicon glyphicon-lock form-control-feedback" style="right: 15px;"></span>
                                </div>

                                <div class="form-group CVV col-md-3">
                                    <input type="text" class="form-control" id="zipcode" placeholder="Zip">
                                    <span class=" glyphicon glyphicon-lock form-control-feedback" style="right: 15px;"></span>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h4>Upgrades</4>

                        <div class="upgrade-item">
                            <div class="upgrade-header">
                                <h2><i class="glyphicon glyphicon-arrow-right"></i>
                                    <input type="checkbox">YES, Double My Video Uploads</h2>
                            </div>

                            <div class="upgrade-body">
                                <b><u>One Time Offer:</u></b> <del>$47</del> $17 per month, VideoDup will double your daily VideoDups from 25 to 50! This means instead of uploading 25 VideoDups per account per day, you can now upload 50 VideoDups per account per day. Grab twice as many customers twice as fast, grab free traffic forever twice as fast and of course grow your brand twice as fast!
                            </div>
                        </div>

                        <div class="upgrade-item">
                            <div class="upgrade-header">
                                <h2><i class="glyphicon glyphicon-arrow-right"></i>
                                    <input type="checkbox">YES, Give Me Automatic List Building</h2>
                            </div>

                            <div class="upgrade-body">
                                <b><u>One Time Offer:</u></b> <del>$57</del> $27 per month, VideoDup will provide you your own search tool to automatically accumulate unlimited titles and keywords for any and all niches you need, then VideoDup will automatically insert all your titles and Keywords into all your VideoDups to upload to the web. This will save you so much time researching and of course uploading lists.
                            </div>
                        </div>

                        <div class="upgrade-item">
                            <div class="upgrade-header">
                                <h2><i class="glyphicon glyphicon-arrow-right"></i>
                                    <input type="checkbox">YES, Upload Daily On Auto-Pilot</h2>
                            </div>

                            <div class="upgrade-body">
                                <b><u>One Time Offer:</u></b> <del>$67</del> $37 per month, VideoDup will automatically upload all your VideoDups to all your accounts for you daily, on auto-pilot! This will save you so much time having to return every day to upload another list and create more VideoDups to upload to every account. Works best with the other 2 upgrades, but still s fantastic time-saver by itself.
                            </div>
                        </div>

                        <hr style="border: solid;width: 25%;">

                        <div class="upgrade-item">
                            <div class="upgrade-header">
                                <h2><i class="glyphicon glyphicon-arrow-right" style="color: yellow;"></i>
                                    <input type="checkbox">Give Me All 3 Upgrades For 1 Flat Fee</h2>
                            </div>

                            <div class="upgrade-body">
                                <b><u>One Time Offer:</u></b> <del>$81</del> $57 per month, <b><i>double your video uploads automatically build your list with your own search tool</i></b> and <b><i>upload daily on auto-pilot!</i></b> One flat fee for all 3 upgrades will save you a lot of time and a lot of money every month! Just sit back and watch VideoDup upload thousands of VideoDups to your accounts on auto-pilot every month!
                            </div>
                        </div>

                        <div style="text-align: right;margin-top: 20px; padding-right: 20px;">
                            <p>2 accounts - $45/m</p>
                            <p>Double My Video Uploads - $17/m</p>
                            <p>Automatic List Building - $27/m</p>
                            <p>Upload Daily On Auto-Pilot - $37/m</p>

                            <h2>Total $126</h2>
                        </div>

                        <button class="btn btn-warning col-md-8 col-md-offset-2">
                            <h2 style="color: rgb(145, 71, 6)">Activate My Account Now
                                <i class="glyphicon glyphicon-lock"></i>
                            </h2>
                        </button>

                        <div class="col-md-8 col-md-offset-2">
                            <p style="text-align: center;margin-top: 10px;">By clicking the button below you agree to our <a href="#">Term of service</a></p>
                        </div>

                    </div>
                </div>
            </div>

            <div id="faq-tab" class="tab-pane fade">
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-6 col-md-offset-6">
                        <input type="text" class="form-control" name="" placeholder="You can search for your question here, too...">    
                    </div>
                    
                </div>

                <div class="row" style="margin-top: 20px;">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Q: Could YouTube or Vimeo close my accounts after uploading so many videos?</a>
                            </h4>
                          </div>
                          <div id="collapse1" class="panel-collapse collapse">
                            <div class="panel-body">
                                A: We have tested for a long time exactly how many videos you can upload safely and effectively, without your accounts ever closing - it's 50 videos per day per account for YouTube and it's 10 videos per day per free account for Vimeo.
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Q: How Can You Guarantee The Successful Uploading Of So Many Videos?</a>
                            </h4>
                          </div>
                          <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">
                                A: This of course is the secret to your success! VideoDup adds one invisible byte or frame, at the end of every video we duplicate for you - this means every video we upload for you will seem different to YouTube and Vimeo, because well, they are all techincally different. Also, VideoDup will add a different title, keyword and a description in every video, too. This is the most powerful video marketing tool every created!
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Q: Is This Spam?</a>
                            </h4>
                          </div>
                          <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">
                                A: You see thousands of unwanted commercials and thousands of unwanted ads all over the internet, yet no one considers them spam, right? Well, then uploading thousands of videos for only your target market definitely is not spam, either. Plus your videos are only for your target market to find, not for everyone else that isn't.
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Q: How Long Will It Take For All My Videos To Rank?</a>
                            </h4>
                          </div>
                          <div id="collapse4" class="panel-collapse collapse">
                            <div class="panel-body">
                                A: New website content usually takes months to years to reach the 1st page in Google, if it ever does, and only after you spend a fortune on constant SEO.
                                Videos on the other hand start ranking immediately and move up to the 1 page up to 100x faster! Plus if your title and keyword are unique, you could stay at the top for a long time!
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Q: What Art Video Backlinks?</a>
                            </h4>
                          </div>
                          <div id="collapse5" class="panel-collapse collapse">
                            <div class="panel-body">
                                A: Video is the fastest growing media online. That's why websites that don't have video or at least show videos somewhere online, linking back to their brand, product or service, are left behind, way behind! Video backlinks increase attention, increase awareness and of course increase action. So, the more videos you have online, the more chance you have to grab your customer.
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Q: Can I Use VideoDup For My Own Clients, Too?</a>
                            </h4>
                          </div>
                          <div id="collapse6" class="panel-collapse collapse">
                            <div class="panel-body">
                                A: You have the option to select "Unlimited" accounts if you have many clients you want to provide this powerful service for. You have the secret weapon to creating brand awareness faster than anyone else!
                            </div>
                          </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="row" style="margin-top: 30px;">
            
        </div>
    </div>


<?php
    require_once './include/footer.php';
?>

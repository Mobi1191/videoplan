    <div class="container">
        <div class="row main-title">
            <h2 style="padding: 0 5px;">This is Where Your Success Happens</h2>
        </div>

        <br>

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#profile-tab">Profile</a></li>
            <li><a data-toggle="tab" href="#list-tab">Lists</a></li>
            <!-- <li><a data-toggle="tab" href="#videos-tab">Videos</a></li> -->
            <li><a data-toggle="tab" href="#upload-tab">Upload</a></li>
            <li><a data-toggle="tab" href="#billing-tab">Billing</a></li>
            <li><a data-toggle="tab" href="#plan-tab"><b>Plan</b></a></li>
            <li><a data-toggle="tab" href="#faq-tab">FAQ</a></li>
        </ul>

        <div class="tab-content">

            <div id="profile-tab" class="tab-pane fade in active">

                <p>*If you are trying <b>VideoDup</b> for free, then you just need to fill out this <b>Profile</b>
                    tab,  <b>Lists</b> tab and the <b>Videos</b> tab above (just these 3 tabs), then you can go to
                    the <b>Upload</b> tab to upload your one video 10 times! (aka 10 <b>VideoDups</b>)</p>
                <div class="row">
                    <div class="col-md-5 col-sm-5">
                        <form id="uploadlogoform" action="" method="post" enctype="multipart/form-data">
                            <div class="upload-logo-preview">
                                
                                <img src="<?=base_url()?>assets/uploads/profile/<?=$this->session->userdata('logo_image')?>" id="logo-preview-image">
                                <br>
                                <button type="button" class="btn btn-success" id="upload-logo-btn">Upload Logo</button>
                                <h4 style="text-align: center;margin-top: 0px;">jpg or png</h4>
                                <input type="file" name="logoimagefile" id="logoimagefile" accept="image/*">
                            </div>
                        </form>
                        <div id="uploadlogomessage">

                        </div>
                    </div>

                    <div class="col-md-4 col-sm-5">
                        <div class="input-part">
                        <form id="profile-form" class="form-horizontal" method="post" action="">
                            <div class="form-group">
                                <label class="control-label col-sm-5 col-md-5 col-xs-5">Name or Business</label>
                                <div class="col-sm-6 col-md-6 col-xs-6" style="padding: 0;">

                                <input type="text" class="form-control" placeholder="Name or Business" id="name_or_business" required value="<?=$this->session->userdata('name_or_business')?>">  
                             
                                </div>
                                <label class="validation-label col-md-1 col-sm-1 col-xs-1">*</label>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-5 col-md-5 col-xs-5">Your Cell Number</label>
                                <div class="col-sm-6 col-md-6 col-xs-6"  style="padding: 0;">
                                
                                <input type="text" class="form-control" placeholder="6269876543"
                                           id="cell_number" required value="<?=$this->session->userdata('cell_number')?>">
                                </div><br>
                                <br>
                                
                            </div>
                            <div class="row" style="font-weight: 700;margin-top: -15px;">
                                <div class="col-lg-8 col-lg-offset-4 col-md-10 col-md-offset-2 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1" style="font-weight: normal;">(USA only) for instant notifications</div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-5 col-md-5 col-xs-5">Email</label>
                                <div class="col-sm-6 col-md-6 col-xs-6" style="padding: 0;">
                                    <input type="email" class="form-control" placeholder="Email" id="user_email" required value="<?=$this->session->userdata('user_email')?>">
                                    
                                </div>
                                <label class="validation-label col-md-1 col-sm-1 col-xs-1" >*</label>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-5 col-md-5 col-xs-5">User</label>
                                <div class="col-sm-6 col-md-6 col-xs-6" style="padding: 0;">
                                   <input type="text" class="form-control" placeholder="User" id="user_name" required value="<?=$this->session->userdata('user_name')?>">
                                </div>
                                <label class="validation-label col-md-1 col-sm-1 col-xs-1" >*</label>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-5 col-md-5 col-xs-5">Password</label>
                                <div class="col-sm-6 col-md-6 col-xs-6" style="padding: 0;">
                                    <input type="password" class="form-control" placeholder="Password" id="user_pwd"
                                           required>
                                </div>
                                <label class="validation-label col-md-1 col-sm-1 col-xs-1">*</label>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-5 col-md-5 col-xs-5">Repeat Password</label>
                                <div class="col-sm-6 col-md-6 col-xs-6" style="padding: 0;">
                                    <input type="password" class="form-control" placeholder="Repeat Password"
                                           id="re_pwd" required>
                                </div>
                                <label class="validation-label col-md-1 col-sm-1 col-xs-1">*</label>
                            </div>

                            <!-- <div class="form-group">
                                <div class="control-labe col-md-offset-5 col-md-5">
                                    <div id="submitprofile" class="btn btn-success">Save</div>
                                </div>
                            </div> -->
                            <div id="saveprofilemessage">

                            </div>
                        </form>
                        </div>
                    </div>

                </div>
                <div class="row" style="text-align: center; margin-top: 10px;">
                    <button type="button" id="submitprofile" class="btn btn-success">Save</button>
                </div>
              

            </div>

            <div id="list-tab" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-5 col-md-offset-1 col-sm-6" >
                        <div class="box-item">
                            <h3>Automatic List Builder</h3>
                            <p>Every list you build will have 5,000 titles/keywords from your niche phrase. Be sure to type at least a 3 word phrase for your niche, so you can build a more targeted list.</p>
                            <p>*1 list per account. Want more lists?</p>
                            <p>Select more accounts in the <b><a href="#" class="to-plan-indicator" style="color: #193cc2;">plan</a></b> tab above.</p>
                            
                            <input type="text" class="form-control" placeholder="type here..."><br>
                            <button class="btn btn-success">Build List</button>

                            
                            <br>
                            <br>
                            <div class="col-md-6" style="padding: 0">
                                <div class="custom-progress-bar">
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <label>95%</label>
                                </div>
                            </div>
                            
                            <select class="form-control" style="margin-top: 30px;">
                                <option> See Your Lists(s) </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-5 col-md-offset-1 col-sm-6">
                        <div  class="box-item">
                            <h4 style="">Upgrade To <a href="#" class="to-plan-indicator">Automatic List Builder</a></h4>
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

                            <div class="col-md-6" style="padding: 0">
                                <div class="custom-progress-bar">
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <label>95%</label>
                                </div>
                            </div>
                           

                            <select class="form-control" style="margin-top: 30px;">
                                <option> Your Own Lists(s) </option>
                            </select>
                        </div>
                    </div>

                    <p class="col-md-5 col-md-offset-1 col-sm-5  col-xs-10 list-tab-description"><b>Upload 10 Titles and 10 Keywords in excel format (CSV comma delimited)</b></p>
                </div>
            </div>

            

            <div id="upload-tab" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-9 col-md-offset-3 col-sm-6 col-sm-offset-6">
                        <b>*Never use your own business or personal YouTube or Vimeo accounts when uploading thousands of VideoDups, instead upload only to seperate accounts that you created, each with their own seperate email address.</b>
                    </div>    
                </div>

                <div class="row upload-steps-div">
                    <div class="col-md-2 col-md-offset-1 col-sm-6" style="text-align: center; margin-top: 50px;">
                        <div style="" class="select-video-div">
                            <img src="<?=base_url()?>assets/images/video icon.png" class="select-video-icon">
                            <div class="row">
                                <div class="col-md-12"><center>
                                    <a class="btn btn-default" style="font-size: 12px;" href="<?=base_url()?>index.php/main/googlelogin">select your gmail account</a>
                                </center>
                                </div>
                            </div>
                            <br>

                            <img src="<?=base_url()?>assets/images/ADD-button.png" class="select-video-add-btn">
                            <br>


                            <div class="custom-progress-bar select-video-progress">
                                <div class="progress">
                                  <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <label>95%</label>
                            </div>

                            <p><b>step1</b></p>
                            <p style="font-size: 12px;">*Please first upload your <b>video</b> to any Google Drive</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 step2-div-col">
                        <div class="step2-div">
                            <textarea class="form-control" placeholder="Type your description right here.

For example... 
Stop chronic Pain Naturally https://PesticideCleanse.com
                            https://Facebook.com/you https://twitter.com/you" style="width: 100%;resize: vertical;height:
                             170px;"></textarea>
                            <br>
                            <img src="<?=base_url()?>assets/images/ADD-button.png" class="add-btn">
                            <br>

                            <div class="custom-progress-bar">
                                <div class="progress">
                                  <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <label>95%</label>
                            </div>

                            <p><b>step2</b></p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6" style="text-align: center; margin-top: 50px;">
                        <div class="step3-div">
                            <img src="<?=base_url()?>assets/images/list.png" style="width: 70%;"><br>
                            <p style="text-align: left;margin: 10px 0 0 0;"><b>AUTOMATIC LIST BUILDER</b></p>
                            <select class="form-control">
                                <option>select your list</option>
                            </select>

                            <p style="text-align: left;margin: 10px 0 0 0;">YOUR OWN LIST</p>
                            <select class="form-control">
                                <option>select your list</option>
                            </select>
                            <br>
                            <img src="<?=base_url()?>assets/images/ADD-button.png" class="add-btn">

                            <br>

                            <div class="custom-progress-bar">
                                <div class="progress">
                                  <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <label>95%</label>
                            </div>

                            <p><b>step3</b></p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6" style="margin-top: 50px;">
                        <div class="step4-div" style="border: solid 1px lightgray;padding: 10px;padding-bottom: 0;">
                           
                            <img src="<?=base_url()?>assets/images/youtube icon.png" style="width: 150px;">
                            <center>
                                <a class="col-md-12 btn btn-default" style="text-align: left; margin-top: 10px;font-size: 12px;padding-left: 3px;padding-right: : 3px;">SELECT YOUR ACCOUNT</a>
                            </center>
                            <img src="<?=base_url()?>assets/images/vimeo icon.png" style="width: 150px;margin-top: -10px;margin-bottom: -15px;">
                            <center>
                                <a class="col-md-12 btn btn-default" style="text-align: left; margin-top: -10px;margin-bottom: 10px;font-size: 12px;padding-left: 3px;padding-right: 3px;">SELECT YOUR ACCOUNT</a>
                            </center>
                            <br>
                            <div style="text-align: center;margin-bottom: 8px;">
                            <img src="<?=base_url()?>assets/images/upload-to-queue.png" style="width: 100%;">
                            </div>

                        

                            <div class="custom-progress-bar">
                                <div class="progress">
                                  <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <label>95%</label>
                            </div>

                            <p style="text-align: center;"><b>final step</b></p>
                            <p>*After final upload completes go ahead and start again from step1 for another account.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="billing-tab" class="tab-pane fade">
                <div class="row">
                    <h3 style="text-align: center;">You can update your billing details here, then click save.</h3>
                    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div  style="border: solid 1px lightgray; padding: 10px">
                            <form>
                                <div class="row">
                                    <div class="form-group has-feedback owner col-md-8 col-sm-8 col-xs-8">
                                        <input type="text" class="form-control" id="owner" placeholder="Name On Card">
                                          <span class=" glyphicon glyphicon-lock form-control-feedback" style="right: 15px;"></span>
                                    </div>    
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col-md-10 col-sm-10 col-xs-10 has-feedback" id="card-number-field">
                                        <input type="text" class="form-control" id="cardNumber" placeholder="Credit Card Number">
                                        <span class=" glyphicon glyphicon-lock form-control-feedback" style="right: 15px;"></span>
                                    </div>
                                </div>

                                <div class="row">
                                     <div class="form-group CVV col-md-6 col-sm-6">
                                        <input type="text" class="form-control" id="cvv" placeholder="CVV Code...">
                                        <span class=" glyphicon glyphicon-lock form-control-feedback" style="right: 15px;"></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-6" id="expiration-date">
                                        <select class="form-control">
                                            <option default disabled selected>expiry month</option>
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
                                    <div class="form-group col-md-6 col-sm-6 col-xs-6" id="expiration-date">
                                        <select class="form-control">
                                            <option default disabled selected>expiry year</option>
                                            <option value="18"> 2018</option>
                                            <option value="19"> 2019</option>
                                            <option value="20"> 2020</option>
                                            <option value="21"> 2021</option>
                                            <option value="21"> 2022</option>
                                            <option value="21"> 2023</option>
                                            <option value="21"> 2024</option>
                                            <option value="21"> 2025</option>
                                        </select>
                                        <span class=" glyphicon glyphicon-lock form-control-feedback" style="right: 8px;"></span>
                                    </div>

                                   

                                </div>
                                
                                <div class="row" id="pay-now">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success " id="confirm-purchase">Save</button>
                                    </div>
                                </div>
                            </form> 
                        </div>    
                    </div>
                    
                </div>
            </div>

            <div id="plan-tab" class="tab-pane fade">
                <div class="row">
                   <h4 style="text-align: center;">25 videos uploaded per account per day</h4>
                   <h4 style="text-align: center;"> no nontracts - cancel or pause anytime - change your plan with just one click</h4>
                </div>

                    <div class="row">
                        <div class="col-md-4 col-sm-6 ">
                            <div class="plan-item">
                               
                                <label style="font-size: 30px;"> 
                                    <label class="custom-checkbox-container">
                                      <input type="checkbox">
                                      <span class="checkmark" style="top: 20px;"></span>
                                    </label>
                                <label style="margin-left: 30px;">$25</label><span style="font-size: 20px;"> monthly</span></label> 
                                <div class="plan-account-number">1 account</div>
                                
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="plan-item">
                                <label style="font-size: 30px;"> 
                                    <label class="custom-checkbox-container">
                                      <input type="checkbox">
                                      <span class="checkmark" style="top: 20px;"></span>
                                    </label>
                                <label style="margin-left: 30px;">$45</label><span style="font-size: 20px;"> monthly</span></label> 
                                <div class="plan-account-number">2 accounts</div>
                                
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="plan-item">

                                <label style="font-size: 30px;"> 
                                    <label class="custom-checkbox-container">
                                      <input type="checkbox">
                                      <span class="checkmark" style="top: 20px;"></span>
                                    </label>
                                <label style="margin-left: 30px;">$65</label><span style="font-size: 20px;"> monthly</span></label> 
                                <div class="plan-account-number">3 accounts</div>

                            </div>
                        </div>
                   
                        <div class="col-md-4 col-sm-6">
                            <div class="plan-item">

                                <label style="font-size: 30px;"> 
                                    <label class="custom-checkbox-container">
                                      <input type="checkbox">
                                      <span class="checkmark" style="top: 20px;"></span>
                                    </label>
                                <label style="margin-left: 30px;">$85</label><span style="font-size: 20px;"> monthly</span></label> 
                                <div class="plan-account-number">4 accounts</div>

                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="plan-item">
                                
                                <label style="font-size: 30px;"> 
                                    <label class="custom-checkbox-container">
                                      <input type="checkbox">
                                      <span class="checkmark" style="top: 20px;"></span>
                                    </label>
                                <label style="margin-left: 30px;">$100</label><span style="font-size: 20px;"> monthly</span></label> 
                                <div class="plan-account-number">5 accounts</div>

                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="plan-item">

                                <label style="font-size: 30px;"> 
                                    <label class="custom-checkbox-container">
                                      <input type="checkbox">
                                      <span class="checkmark" style="top: 20px;"></span>
                                    </label>
                                <label style="margin-left: 30px;">$150</label><span style="font-size: 20px;"> monthly</span></label> 
                                <div class="plan-account-number">unlimited accounts</div>

                            </div>
                        </div>
                
                    </div>
                <div class="row"><div class="col-md-12">"Account" means a YouTube account or a Vimeo Account. "Accounts" means more than 1 YouTube account and/or more than 1 Vimeo account. Of course the more accounts you have the more you can upload each day.</div></div>

                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1" style="margin-top: 20px;border: solid 1px lightgray;padding: 10px;">
                        <form>
                            <div class="row">
                                <div class="form-group has-feedback owner col-md-8 col-sm-8 col-xs-8">
                                    <input type="text" class="form-control" id="owner" placeholder="Name On Card">
                                      <span class=" glyphicon glyphicon-lock form-control-feedback" style="right: 15px;"></span>
                                </div>    
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-10 col-sm-10 col-xs-10 has-feedback" id="card-number-field">
                                    <input type="text" class="form-control" id="cardNumber" placeholder="Credit Card Number">
                                    <span class=" glyphicon glyphicon-lock form-control-feedback" style="right: 15px;"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group CVV col-md-6 col-sm-6 col-xs-6">
                                    <input type="text" class="form-control" id="cvv" placeholder="CVV Code...">
                                    <span class=" glyphicon glyphicon-lock form-control-feedback" style="right: 15px;"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 col-sm-6 col-xs-6" id="expiration-date">
                                    <select class="form-control">
                                        <option default disabled selected>expiry month</option>
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
                                <div class="form-group col-md-6 col-sm-6 col-xs-6" id="expiration-date">
                                    <select class="form-control">
                                        <option default disabled selected>expiry year</option>
                                        <option value="18"> 2018</option>
                                        <option value="19"> 2019</option>
                                        <option value="20"> 2020</option>
                                        <option value="21"> 2021</option>
                                        <option value="21"> 2022</option>
                                        <option value="21"> 2023</option>
                                        <option value="21"> 2024</option>
                                        <option value="21"> 2025</option>
                                    </select>
                                    <span class=" glyphicon glyphicon-lock form-control-feedback" style="right: 8px;"></span>
                                </div>
                            </div>

                            <div class="row">
                                 <img src="<?=base_url()?>assets/images/cardslogo.png" class="col-md-6 col-sm-6 col-xs-6 " style="margin-top: 10px;max-width: 100%;">
                            </div>
                        </form> 
                    </div>
                   
                </div>


                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h4>Upgrades</4>

                        <div class="upgrade-item">
                            <div class="upgrade-header">
                                <img class="background-img" src="<?=base_url()?>assets/images/first-arrow.png">
                                <img src="<?=base_url()?>assets/images/yellow.gif" class="arrow-blinking-gif">
                                <img src="<?=base_url()?>assets/images/checkbox-unchecked.png" class="arrow-checkbox" data-checked="unchecked">
                               <!--  <h2><i class="glyphicon glyphicon-arrow-right"></i>
                                    <label style="margin: 0 5px;">
                                        <label class="custom-checkbox-container">
                                          <input type="checkbox">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label style="margin-left: 30px;">YES, Double My Video Uploads</label>
                                    </label>
                                </h2> -->
                            </div>

                            <div class="upgrade-body">
                                <b><u>One Time Offer:</u></b> <del>$47</del> $17 per month, VideoDup will double your daily VideoDups from 25 to 50! This means instead of uploading 25 VideoDups per account per day, you can now upload 50 VideoDups per account per day. Grab twice as many customers twice as fast, grab free traffic forever twice as fast and of course grow your brand twice as fast!
                            </div>
                        </div>

                        <div class="upgrade-item">
                            <div class="upgrade-header">
                                <!-- <h2><i class="glyphicon glyphicon-arrow-right"></i>
                                    <label style="margin: 0 5px;">
                                        <label class="custom-checkbox-container">
                                          <input type="checkbox">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label style="margin-left: 30px;">YES, Give Me Automatic List Building</label>
                                    </label>
                                </h2> -->
                                 <img class="background-img" src="<?=base_url()?>assets/images/second-arrow.png">
                                <img src="<?=base_url()?>assets/images/yellow.gif" class="arrow-blinking-gif">
                                <img src="<?=base_url()?>assets/images/checkbox-unchecked.png" class="arrow-checkbox" data-checked="unchecked">

                            </div>

                            <div class="upgrade-body">
                                <b><u>One Time Offer:</u></b> <del>$57</del> $27 per month, VideoDup will provide you your own search tool to automatically accumulate unlimited titles and keywords for any and all niches you need, then VideoDup will automatically insert all your titles and Keywords into all your VideoDups to upload to the web. This will save you so much time researching and of course uploading lists.
                            </div>
                        </div>

                        <div class="upgrade-item">
                            <div class="upgrade-header">
                                <!-- <h2><i class="glyphicon glyphicon-arrow-right"></i>
                                    <label style="margin: 0 5px;">
                                        <label class="custom-checkbox-container">
                                          <input type="checkbox">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label style="margin-left: 30px;">YES, Upload Daily On Auto-Pilot</label>
                                    </label>
                                </h2> -->
                                 <img class="background-img" src="<?=base_url()?>assets/images/third-arrow.png">
                                <img src="<?=base_url()?>assets/images/yellow.gif" class="arrow-blinking-gif">
                                <img src="<?=base_url()?>assets/images/checkbox-unchecked.png" class="arrow-checkbox" data-checked="unchecked">

                            </div>

                            <div class="upgrade-body">
                                <b><u>One Time Offer:</u></b> <del>$67</del> $37 per month, VideoDup will automatically upload all your VideoDups to all your accounts for you daily, on auto-pilot! This will save you so much time having to return every day to upload another list and create more VideoDups to upload to every account. Works best with the other 2 upgrades, but still s fantastic time-saver by itself.
                            </div>
                        </div>

                        <hr style="border: solid;width: 25%;">

                        <div class="upgrade-item">
                            <div class="upgrade-header">

                                <!-- <h2><i class="glyphicon glyphicon-arrow-right yellow-blink"></i>
                                    <label style="margin: 0 5px;">
                                        <label class="custom-checkbox-container">
                                          <input type="checkbox">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label style="margin-left: 30px;">Give Me All 3 Upgrades For 1 Flat Fee</label>
                                    </label>
                                </h2> -->
                                 <img class="background-img" src="<?=base_url()?>assets/images/fourth-arrow.png">
                                <img src="<?=base_url()?>assets/images/red.gif" class="arrow-blinking-gif">
                                <img src="<?=base_url()?>assets/images/checkbox-unchecked.png" class="arrow-checkbox" data-checked="unchecked">
                            </div>

                            <div class="upgrade-body">
                                <b><u>One Time Offer:</u></b> <del>$81</del> $57 per month, <b><i>double your video uploads automatically build your list with your own search tool</i></b> and <b><i>upload daily on auto-pilot!</i></b> One flat fee for all 3 upgrades will save you a lot of time and a lot of money every month! Just sit back and watch VideoDup upload thousands of VideoDups to your accounts on auto-pilot every month!
                            </div>
                        </div>

                        <div class="result-amount-div col-md-offset-5 col-sm-offset-5 col-xs-offset-3">
                            <p>2 accounts - $45/m</p>
                            <p>Double My Video Uploads - $17/m</p>
                            <p>Automatic List Building - $27/m</p>
                            <p>Upload Daily On Auto-Pilot - $37/m</p>

                            <h2>Total $126</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                                <!-- <h2 class="active-btn">Activate My Account Now
                                    <i class="glyphicon glyphicon-lock"></i>
                                </h2> -->
                                <img src="<?=base_url()?>assets/images/Activate-button.png" class="active-btn">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                                <p style="text-align: center;margin-top: 10px;font-size: 12px;">By clicking this button you agree to our <a href="https://videodup.com/terms"  target="_blank">terms of service</a></p>
                            </div>
                        </div>

                        
                    </div>
                </div>

                <div class="row" style="background: rgb(241, 244, 249);">
                    <div class="col-md-6 col-sm-6">
                        <img src="<?=base_url()?>assets/images/guaranteelogo.png" style="float: left;">
                        <div style="padding-left: 100px;">
                            <h3>30 Day Guarantee</h3>
                            <p>No question asked 30 day refund guaranteed. If you are unhappy for any reason, get your money back. Rock solid guarantee...</p>
                        </div>
                    </div>

                    <div class="col-md-6  col-sm-6">
                        <img src="<?=base_url()?>assets/images/locklogo.png" style="float: left;">
                        <div style="padding-left: 100px;">
                            <h3>Secure Payment</h3>
                            <p>All orders are through a very secure network. Your credit card information is never stored in any way. We respect your privacy...</p>
                        </div>
                    </div>
                </div>

            </div>

            <div id="faq-tab" class="tab-pane fade">
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-6 col-md-offset-6 col-sm-6 col-sm-offset-6">
                        <input type="text" class="form-control" name="" placeholder="You can search for your question here, too..." id="faq-search-input">    
                    </div>
                    
                </div>

                <div class="row" style="margin-top: 20px; padding: 15px;">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><b>Q: What Kind Of YouTube And Vimeo Account Is Best To Upload Thousands Of VideoDups?</b></a>
                            </h4>
                          </div>
                          <div id="collapse1" class="panel-collapse collapse">
                            <div class="panel-body">
                               A: THIS IS VERY IMPORTANT: Since your YouTube or Vimeo accounts will be used only for uploading 
                                thousands of videos, it is best you create at least a couple new YouTube or Vimeo accounts that 
                                can be used only for uploading thousands of videos over time. For example, to create a couple 
                                new YouTube accounts or channels, you simply need to create a couple new accounts using a new 
                                gmail address for each (i.e. yourniche23456@gmail.com, etc..) and use a different email address 
                                for each new Vimeo account, too. This is the best way to keep your video marketing channels 
                                separate from your personal or business channels. Remember, <i>VideoDups</i> are for creating 
                                as many video backlinks as possible, so you do not need or should use your own personal or 
                                business accounts or channels for uploading video backlinks.
                                                            </div>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><b>Q: What Does "VideoDups" As A Noun And "VideoDup" As A Verb Mean?</b></a>
                            </h4>
                          </div>
                          <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">
                                A: You know that GOOGLE is used as a verb these days, for example, "I GOOGLED It". Well, the only way to describe taking your video and turning it into thousands of technically different 
                                videos while still making sure every video looks exactly the same as your original, you can say
                                "I Want To <i>VideoDup</i> My Video" as the verb; as a noun, you can say "I Can Upload 10,000 <i>VideoDups</i>".
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><b>Q: Could YouTube or Vimeo Close My Account After Uploading So Many Videos?</b></a>
                            </h4>
                          </div>
                          <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">
                                A: We have tested this for a long time exactly how many videos you can safely, 
                                effectively and consistently upload every day - it's max 50 videos per 
                                day for a YouTube account and max 10 videos per day for a free Vimeo 
                                account.
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse4"><b>Q: How Many <i>VideoDups</i> Total Should I upload To The Web?</b></a>
                            </h4>
                          </div>
                          <div id="collapse4" class="panel-collapse collapse">
                            <div class="panel-body">
                                A: This is a really good question, because you might be happy with just 10,000 - 20,000 <i>VideoDups</i>,
                                which is around the quantity of <i>VideoDups</i> you should notice your free targeted traffic starting to 
                                take off. BUT if I were you, I wouldn't stop there. The turning point for my businesses, meaning when
                                I received millions of free targeted traffic every year, was only when I had uploaded closer to 50,000
                                <i>VideoDups</i>. I literally sat back and never bothered with sales, ads or SEO again. I was so busy with
                                new customers that I had to hire staff just to respond to all the inquiries, then I sold my business,
                                started another business and once I reached around 50,000 <i>VideoDups</i>, I was super busy all over again
                                and had to hire staff again to respond to all the inquiries, then I sold my business and did it all 
                                over again. The great thing about <i>VideoDup</i> is that you can decide how many <i>VideoDups</i> you
                                want to upload to the web and ultimately how much free targeted traffic you want to send to your link.
                                The more <i>VideoDups</i> you upload, obviously the more free targeted traffic you receive. It truly is
                                a numbers game.
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse5"><b>Q: How Can You Guarantee Successful Uploading Of So Many Videos?</b></a>
                            </h4>
                          </div>
                          <div id="collapse5" class="panel-collapse collapse">
                            <div class="panel-body">
                                A: This of course is the secret to your success! We add 1 invisible byte or 
                                invisible frame at the end of each video we <i>VideoDup</i> for you - this will 
                                of course allow each video to look the same as your original, but be technically 
                                different! Also, <i>VideoDup</i> can add a different title, keyword and a description 
                                in each video - this is the most exciting video marketing tool ever created!
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse6"><b>Q: Is This Spam?</b></a>
                            </h4>
                          </div>
                          <div id="collapse6" class="panel-collapse collapse">
                            <div class="panel-body">
                                A: No. Unlike the thousands of unwanted commercials and ads you are forced to watch
                                every day, <i>VideoDup</i> only uploads your videos to your target market, using only 
                                your target keywords, so only those people who are already searching for your product 
                                or service will find your video, not everyone who is not searching for your videos.
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse7"><b>Q: How Long Will It Take For All My Videos To Rank?</b></a>
                            </h4>
                          </div>
                          <div id="collapse7" class="panel-collapse collapse">
                            <div class="panel-body">
                                A: The most powerful thing about videos is the fact that unlike website content, videos start 
                                ranking immediately, because Google loves videos! And they should love videos, because Google 
                                owns YouTube! Also, YouTube is the second most popular search engine online, so once you rank 
                                in YouTube for your keywords, which is often immediate, you will also start automatically ranking 
                                inside Google search for your keywords, too.
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse8"><b>Q: What Are Video Backlinks?</b></a>
                            </h4>
                          </div>
                          <div id="collapse8" class="panel-collapse collapse">
                            <div class="panel-body">
                                A: Videos are the fastest growing media online. A website that does not show a video on their homepage
                                or at least somewhere online, that also links back to their product or service, is always left behind - way behind!
                                Video backlinks are the next level for increasing attention, engagement and of course awareness, unlike any other 
                                media online, even the most simple video. And the more videos you have uploaded to the web, the more customers you 
                                grab and the more <i>free</i> traffic you receive, forever! You can spend a million dollars on ads and SEO and
                                never get free traffic forever.
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse9"><b>Q: Can I Use VideoDup For My Own Clients?</b></a>
                            </h4>
                          </div>
                          <div id="collapse9" class="panel-collapse collapse">
                            <div class="panel-body">
                                A: Absolutely! You have the option to select "Unlimited" accounts inside the <b>PLAN</b> tab above if you have many 
                                clients who also want thousands of video backlinks. You have the secret weapon to take any product, service 
                                and brand to the top, at light speed - and it's called <b>VideoDup!</b> Be a hero to your clients.
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse10"><b>Q: What Is The Difference Between Backlinks And Video Backlinks?</b></a>
                            </h4>
                          </div>
                          <div id="collapse10" class="panel-collapse collapse">
                            <div class="panel-body">
                                A: Backlinks are simple text links that have been pasted in various places online: blogs,
                                walls and articles, just to name a few, but is very labour intensive, takes forever to get new customers, 
                                if any, you must pay a fortune and of course will never go viral. Video backlinks on the other hand are 
                                instantly better in every way, because videos always rank higher, rank faster and can go viral at any time! 
                                Plus all of the traffic every video you have online will provide you free traffic, forever!
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse11"><b>Q: Can I Upload More Than 50 Videos To My YouTube Account Or More Than 10 Videos To My Vimeo Account Each day?</b></a>
                            </h4>
                          </div>
                          <div id="collapse11" class="panel-collapse collapse">
                            <div class="panel-body">
                                A: Yes! VideoDup's goal is to make sure you keep your accounts in good standing, yet continue to grow your
                                brand every day, without you worrying about anything happening to your accounts. So, if you want to upload
                                more than 50 videos per day, then all you need to do is create more YouTube accounts or more Vimeo accounts. 
                                For example, if you were to create 3 more YouTube accounts, then you can upload up to 50 <b>VideoDups</b> to 
                                each YoutTube account per day, which means 150 <b>VideoDups</b> per day! The same for Vimeo, except with a free 
                                Vimeo account the max upload per account per day is only 10 <i>VideoDups</i>, so if you were to create 3 different 
                                Vimeo accounts for example, then you can upload max 30 <i>VideoDups</i> per day.
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse12"><b>Q: Is Not Quality Better Than Quantity?</b></a>
                            </h4>
                          </div>
                          <div id="collapse12" class="panel-collapse collapse">
                            <div class="panel-body">
                                A: Only when it comes to food and housing. When it comes to video marketing, <i><b>quantity</i></b> always beats quality. Why? 
                                Because today the internet is unfair! Your big competitors with their unlimited ad budgets constantly grab all of your customers 
                                - so what do you do? You spend every penny you have to fight over the few customers they missed! That's not how you grow a business
                                on a budget, that's how you close your doors! Sure, you can buy ads every day and hope you at least break even and keep paying for 
                                expensive SEO, or you can forget buying ads every day, forget paying for expensive SEO every day and just upload more <i>VideoDups</i> 
                                until you have 50,000 videos online all working to bring you free customers and free traffic every day, forever! The choice is yours.
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



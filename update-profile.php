<style>
#user-profile-page  .account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
#user-profile-page  .account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
#user-profile-page  .account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
#user-profile-page  .account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
#user-profile-page  .account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
#user-profile-page  .account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
#user-profile-page  .account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
#user-profile-page  .account-settings .about p {
    font-size: 0.825rem;
}
#user-profile-page  .form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}

#user-profile-page .card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}

</style>

<form class="form-horizontal" action="./client/update-profile.php" method="post" enctype="multipart/form-data" ><!-- form-horizontal Starts -->
    <div class="container" id="user-profile-page">
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row gutters">
                        <input type="hidden" name="id" value="<?=$customer->id?>">

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-2 text-primary">Personal Details</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName" class="form-label">Firstname</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" required value="<?= $customer->first_name ?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName" class="form-label">Lastname</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" required value="<?= $customer->last_name ?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="eMail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="reg_email" name="reg_email" required value="<?= $customer->email; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group" >
                                <label for="phone" class="form-label">Phone</label>
                                <div class="input-group">
                                    <span class="input-group-text">+63</span>
                                    <input type="tel" class="form-control" id="phone_no" name="phone_no" required maxlength="10" value="<?= $customer->phone_no; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mt-3 mb-2 text-primary">Login Credentials</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group" >
                                <label for="phone" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group" >
                                <label for="reg_password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="reg_password" name="reg_password" required>
                            </div>
                        </div>
                    </div> -->
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mt-3 mb-2 text-primary">Address</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="province" class="form-label">Province</label>
                                <select name="province" id="edit_provinceDropdown" class="form-control"  required value="<?= $customer->province ?>">
                                    <option  selected disabled readonly>Select Province</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="edit_cityDropdown" class="form-label">City/Municipality</label>
                                <select name="city_municipality" id="edit_cityDropdown" class="form-control" required  value="<?= $customer->city_municipality ?>">
                                    <option selected disabled readonly>Select City</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="edit_barangayDropdown" class="form-label">Barangay</label>
                                <select name="barangay" id="edit_barangayDropdown" class="form-control" required value="<?= $customer->barangay ?>">
                                    <option  selected disabled readonly>Select Barangay</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <div class="" >
                                    <label for="complete_address" class="form-label">Other Address Info (Subdivision/Street/Lot/Block/House No.)</label>
                                    <textarea  name="complete_address" class="form-control" cols="30" rows="4" required><?=$customer->complete_address ?></textarea>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-right">
                                <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Update">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</form>






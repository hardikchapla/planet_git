<?php
   include('header.php');
?>

<div class="container-fluid ss_header_my_profies">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-8 text-center">
            <h2> My Profile </h2>
            <div class="liness"></div>
            <p> The hype cycle for bots exploded in 2016 as developers poured time and money into the dream of <br />
               personal digital assistants.
            </p>
         </div>
      </div>
   </div>
</div>
<div class="container-fluid pb-5">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-9">
            <div class="ss_profiles_box">
               <div class="d-flex bd-highlight">
                  <div class="p-2 w-100 bd-highlight align-self-center">
                     <div class="d-flex bd-highlight">
                        <div class="p-2 bd-highlight align-self-center">
                           <div class="ss_profile_imges">
                              <img src="images/profilesA.jpg" alt="images" >
                           </div>
                        </div>
                        <div class="p-2 bd-highlight align-self-center ">
                           <div class="ss_profile_des">
                              <h4>Dharshani Arumugam</h4>
                              <p>dharshani@example.com</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="p-2 flex-shrink-1 bd-highlight align-self-center">
                     <div class="episode_button">
                        <a href="#">  <img src="images/logout.svg" alt="images"> Logout </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="container-fluid ss_navbar_profiles_css">
   <div class="container">
      <div class="row">
         <div class="col-12 col-lg-2 col-sm-3 ss_padding_0 ">
            <div class="nav flex-column nav-pills ss_profiles_navbar">
               <a class="nav-link  active" href="profile" >My Profile</a>
               <a class="nav-link "  href="supercoin_balance" >Payload Coin Balance</a>
               <a class="nav-link" href="#" >My Stash</a>
               <a class="nav-link"href="my-order" >My Orders</a>
               <a class="nav-link" href="message" > Messages </a>
               <a class="nav-link" href="change-password" >Change Password</a>
            </div>
         </div>
         <div class="col-12 col-lg-10 col-sm-9">
            <div class="tab-content" id="v-pills-tabContent">
               <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                  <div class="ss_navbar_profiles_boxs">
                     <h1 class="ss_profiles_title"> Personal Information </h1>
                     <form>
                        <div class="row">
                           <div class="col-lg-6 text-left">
                              <div class="form-group ss_textbox">
                                 <label for="exampleInputEmail1"> Full Name </label>
                                 <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full Name " value="Dharshani Arumugam">
                              </div>
                           </div>
                           <div class="col-lg-6 text-left">
                              <div class="form-group ss_textbox">
                                 <label for="exampleInputEmail2"> Email Address </label>
                                 <input type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Email Address " value="dharshani@example.com">
                              </div>
                           </div>
                           <div class="col-lg-6 text-left">
                              <div class="form-group ss_textbox">
                                 <label for="exampleInputEmail2"> Mobile Number </label>
                                 <input type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder=" Mobile Number ">
                              </div>
                           </div>
                           <div class="col-lg-12 pt-4 text-right">
                              <button type="submit" class="button_register"> Edit Profile </button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="container-fluid">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="ss_advertise">
               <h2>Add Banner</h2>
            </div>
         </div>
      </div>
   </div>
</div>

<?php
   include('footer.php');
?>

</body>
</html>
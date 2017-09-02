
<!-- Modal for SignUp-->

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">SignUp</h4>
      </div>
      <div class="modal-body">
      <!--panel -->
          <div class="panel-group">
            <div class="panel panel-info">
              <div class="panel-body">
                <p class="err">Mandatory fields are marked with an asterisk (*)</p>
             <!--form--> 
                <form method="post" action="save.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="file">Image</label><span class="err"> *</span>
                  <input type="file" name="uploaded_file" id="image" />
                    <span class="err err_image"></span>
                  </div>
                  <div class="form-group">
                    <label for="name">Username</label><span class="err"> *</span>
                    <input type="text" class="form-control" placeholder="Enter username" name="name" id="name" />  
                     <span class="err"></span>
                    <span class="err err_name" id="user_exist" ></span>

                  </div>
                  <div class="form-group">
                    <label for="pwd">Password</label><span class="err"> *</span>
                    <input type="password" class="form-control" placeholder="Enter password" name="pwd" id="pwd" />
                    <span class="err err_pwd"></span>

                  </div>
                  <div class="form-group">
                    <label for="pwd">Confirm Password</label><span class="err"> *</span>
                    <input type="password" class="form-control" placeholder="Enter confirm password" name="re-pwd" id="re-pwd" />
                    <span class="err err_re-pwd"></span>

                  </div>
                  <div class="form-group">
                    <label for="gender">Gender</label><span class="err"> *</span>
                    M<input type="radio" name="gender" id="male" value="male" />
                    F<input type="radio" name="gender" id="female" value="female" />
                  <span class="err err_gender"></span>

                  </div>
                  <div class="form-group">
                    <label for="address">Address</label><span class="err"> *</span>
                    <textarea name="address" id="address" placeholder="Enter address" class="form-control"></textarea>
                    <span class="err err_address"></span>

                  </div>
                   <div class="form-group"> 
                     <label for="city">City</label><span class="err"> *</span>
                     <select class="form-control" name="city" id="city">
                       <option value="Select">Select</option>
                       <option value="bhopal">Bhopal</option>
                       <option value="pune">Pune</option>
                       <option value="mumbai">Mumbai</option>
                       <option class="delhi">Delhi</option>
                     </select>
                     <span class="err err_city"></span>
                   </div> 
               
                  <input type="submit" disabled="false" class="btn btn-success" name="submit" value="Submit" id="submit">
               
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </form>
              </div>
            </div>
           </div><!--end of panel-->
      </div>
    </div>
  </div>
</div>



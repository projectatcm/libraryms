<?php
include './includes/header.php';
?>

<div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title text-center">Add Student</h4>
                    </div>
                    <div class="content">
                        <form action="actions.php?action=addstaff" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Admission No.</label>
                                        <input required type="Text" class="form-control" placeholder="Enter Admission No." name="stud_rollno">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input required  type="Text" class="form-control" placeholder="Enter Name" name="stud_Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Branch</label>
                                        <select required class="form-control" name="department">
                                             <option value="">Select Branch</option>
                                          <option value="ce">Computer Engineering</option>
                                           <option value="me">Medical Electronics</option>
                                          <option value="chm">Computer Hardware Maintenence</option>
                                          <option value="ae">Applied Electronics</option>                                         
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Semester</label>
                                        <input required  type="number" min='1' max='1000000' class="form-control" placeholder="Book Price" name="bookprice">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                               <div class="col-md-6">
                                <div class="form-group">
                                        <label>Year Of Join</label>
                                        <input required  type="text" class="form-control" placeholder="Enter Year " name="yearjoin">
                                    </div>
                                  </div>                     
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input type="date" class="form-control" name="dob" >
                                    </div>
                                </div> 
                            </div>
                            
                            <div class="row">
                                 <div class="col-md-6">
                                      <label>Gender</label>
                                      <select required class="form-control" name="gender">
                                          <option value="">Select Gender</option>
                                          <option value="ce">Male</option>
                                          <option value="me">Female</option>
                                      </select>     
                                 </div>   
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="textarea" class="form-control" placeholder="Enter Address" name="address">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select required class="form-control" name="category">
                                             <option value="">Select Category</option>
                                          <option value="ce">SC</option>
                                           <option value="me">ST</option>
                                           <option value="me">OBC</option>
                                           <option value="me">GENERAL</option>
                                           <option value="me">OTHERS</option>
                                      </select>     
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone No.</label>
                                        <input type="text" class="form-control" placeholder="Enter Phone No. " name="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input type="text" class="form-control" placeholder="Enter E-mail ID " name="email">
                                    </div>
                                </div>
                               
                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label>History</label>
                                        <input type="text" class="form-control" placeholder="Enter History " name="history">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="addBooksBtn"  class="btn btn-info btn-fill pull-right">Add Books</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>


<?php
include './includes/footer.php';
?>
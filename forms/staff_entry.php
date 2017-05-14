<?php
include '../includes/header.php';
?>
<div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title text-center">Add Staff</h4>
                    </div>
                    <div class="content">
                        <form action="actions.php?action=addstaff" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Staff id</label>
                                        <input required type="Text" class="form-control" placeholder="Staff id" name="staff_id">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Staff Name</label>
                                        <input required  type="Text" class="form-control" placeholder="Staff Name" name="Staff_Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select required class="form-control" name="bookcategory">
                                          <option value="">Department</option>
                                          <?php foreach($allbookcategories as $bookcategories){
                                              $bookcategoryid = $bookcategories['id'];
                                              $bookcategoryname = $bookcategories['categoryname'];
                                             ?>
                                          <option value="<?=$bookcategoryid?>"><?=$bookcategoryname?></option>
                                          <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Book Price</label>
                                        <input required  type="number" min='1' max='1000000' class="form-control" placeholder="Book Price" name="bookprice">
                                    </div>
                                </div>
																<div class="col-md-6">
                                    <div class="form-group">
                                        <label>Book Cover Image</label>
                                        <input required  type="file" class="form-control" name="bookcover">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Book Rack No</label>
                                        <input required  type="number" class="form-control" name="bookcount" min="1" max="25">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Book Publications</label>
                                        <input required  type="text" class="form-control" placeholder="Book Publication" name="bookpublication">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Publication Year</label>
                                        <input required  type="text" class="form-control" placeholder="Book Publication Year" name="bookpublicationyear">
                                    </div>
                                </div>


                            </div>
                            <button type="submit" id="addBooksBtn"  class="btn btn-info btn-fill pull-right">Add Books</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>


<?php include './includes/footer.php'; ?>

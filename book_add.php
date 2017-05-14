<?php
include './includes/header.php';
require_once './libs/Book.php';
include 'libs/flash.php';
$book = new Book();
$book_categories = $book->getBookCategories();

?>
<div class="container-fluid">
    <?php
    $errors = getFlashError();
    if (!empty($errors)): ?>
    <div class="alert alert-danger">
      <strong>Error!</strong> <?=$errors?>
  </div>

<?php endif ?>
<br>
<div class="card">
    <div class="header">
        <h3 class="title text-center">Add Book</h3>
    </div>
    <hr>
    <div class="content">
        <form action="actions/book_add_action.php" method="post" enctype="multipart/form-data">
            <div class="row">

                <div class="col-md-6">


                    <div class="form-group">
                        <label>Book Title</label>
                        <input required type="Text" class="form-control" placeholder="Book Title" name="title">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Book Categories</label>
                        <select required class="form-control" name="category">
                            <option value="">Book Category</option>
                            <?php
                            foreach ($book_categories as $category) {
                                $bookcategoryid = $category['id'];
                                $bookcategoryname = $category['name'];
                                ?>
                                <option value="<?= $bookcategoryid ?>"><?= $bookcategoryname ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">



                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Book Author</label>
                            <input required  type="Text" class="form-control" placeholder="Book Author" name="author">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Book Price</label>
                            <input required  type="number" min='1' max='1000000' class="form-control" placeholder="Book Price" name="price">
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Book Rack No</label>
                        <input required  type="text" class="form-control" name="rack_no" min="1" max="10">
                    </div>
                </div>
                 <div class="col-md-6">
                <div class="form-group">
                    <label>Book Publications</label>
                    <input required  type="text" class="form-control" placeholder="Book Publication" name="publication">
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-9">
                          <div class="form-group">
                            <label>Book Cover Image (Select one or use camera instead) </label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label>Camara</label>
                        <button type="button" class="btn btn-default btn-block"
                        data-toggle="modal" data-target="#cameraModal"
                        ><i class="fa fa-camera"></i></button>
                        <input type="hidden" name="camera" id="camera_output" />
                    </div>

                </div>

            </div>
               <div class="col-md-6">
                <div class="form-group" style="margin-top: 5px;">
                    <label>Publication Year</label>
                    <input required  type="text" class="form-control" placeholder="Book Publication Year" name="publication_year">
                </div>
            </div>

        </div>
        <div class="row">

         
        </div>

        <button type="submit" id="addBooksBtn"  class="btn btn-info btn-fill pull-right"> Add Book </button>
        <button type="reset" id="addBooksBtn" style="margin-right: 10px;"  class="btn btn-danger btn-fill pull-left">Reset</button>
        <div class="clearfix"></div>
    </form>
</div>
</div>
</div>


<?php include './includes/footer.php'; ?>

<div id="barcodeScanerModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close stop_reader" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <section id="container" class="container">
                    <div class="controls">
                        <fieldset class="reader-config-group">
                            <label>
                                <span>Barcode-Type</span>
                                <select name="decoder_readers" class="form-control">
                                    <option value="code_128" selected="selected">Code 128</option>
                                    <option value="code_39">Code 39</option>
                                    <option value="code_39_vin">Code 39 VIN</option>
                                    <option value="ean">EAN</option>
                                    <option value="ean_extended">EAN-extended</option>
                                    <option value="ean_8">EAN-8</option>
                                    <option value="upc">UPC</option>
                                    <option value="upc_e">UPC-E</option>
                                    <option value="codabar">Codabar</option>
                                    <option value="i2of5">I2of5</option>
                                </select>
                            </label>

                            <label>
                                <span>Patch-Size</span>
                                <select name="locator_patch-size"  class="form-control">
                                    <option value="x-small">x-small</option>
                                    <option value="small">small</option>
                                    <option selected="selected" value="medium">medium</option>
                                    <option value="large">large</option>
                                    <option value="x-large">x-large</option>
                                </select>
                            </label>

                            <label>
                                <span>Workers</span>
                                <select name="numOfWorkers"  class="form-control">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option selected="selected" value="4">4</option>
                                    <option value="8">8</option>
                                </select>
                            </label>
                            <label>
                                <span>Camera</span>
                                <select name="input-stream_constraints" id="deviceSelection"  class="form-control">
                                </select>
                            </label>
                        </fieldset>
                    </div>
                    <div id="result_strip">
                        <ul class="thumbnails"></ul>
                    </div>
                    <style type="text/css">
                        #interactive{

                        }
                        #interactive video{
                            width: 500px;
                            margin-top: -50px;
                        }
                    </style>
                    <div id="interactive" class="viewport" style="width:100%;"></div>
                </section>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default stop_reader" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<div id="cameraModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
    </div>
    <div class="modal-body">
       <div id="my_camera" style="width:320px; height:240px;"></div>
       <div id="my_result"></div>
       <script language="JavaScript">
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach( '#my_camera' );
        function take_snapshot() {
            Webcam.snap( function(data_uri) {
                document.getElementById('my_result').innerHTML = '<img src="'+data_uri+'"/>';
                document.getElementById('camera_output').value = data_uri;
            } );
        }
    </script>

</div>
<div class="clearfix"></div>

<div class="modal-footer">
  <a href="javascript:void(take_snapshot())" class="pull-left">  <div class="modal-footer">
    <button type="button" class="btn btn-default" >Take Photo</button>   </a>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>
<script src="assets/js/JsBarcode.all.min.js"></script>
<script src="assets/js/quagga.min.js"></script>
<script type="text/javascript">

    $(function () {

        $("#barcode").JsBarcode("barcode");
        $('#barcode_input').keyup(function () {
            var id = $(this).val();
            $("#barcode").JsBarcode(id);

        })
        $("#barcode_scan_btn").click(function () {
            var $target = $("" + $(this).data('target'));
            var $scannerModal = $('#barcodeScanerModal');
            $scannerModal.modal('show');
            $('.stop_reader').click(function () {

            });
        });

    });
</script>
</html>

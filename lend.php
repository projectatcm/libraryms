<?php
include './includes/header.php';
require_once './libs/Book.php';
include 'libs/flash.php';
$book = new Book();
$book_categories = $book->getBookCategories();
?>
<script src="assets/js/JsBarcode.all.min.js"></script>
<script src="assets/js/quagga.min.js"></script>
<script>

	function getBookInfo(book_id){
		var $book_info = $('#book_info');
		$.get('get_book.php?book_id='+book_id,function(data){
			console.log(data);
			var book = jQuery.parseJSON(data);
			if(book.length == 0){
				alert("No Books Found");
			}else{
				$("#book_info").show();
				var book_id = book.id;
				var title = book.title
				var image = book.image;
				var category = book.category;
				var status = book.status;
				if(status == 0){
					alert('Book is out of stock');
				}
				$('#barcode_id').val(book_id);
				$('#book_image').attr('src',image);
				$('#book_title').text(title);
				$('#book_category').text(title);
				$('.bookViewMoreBtn').attr("data-bookid",book_id);
				/*-- Setting value to field --*/
				$('#lendbookidField').val(book_id);

			}
		});
	}


		function getStudentInfo(student_id){
			var $student_info = $('#studentdatas');
			$.get('get_student.php?student='+student_id,function(data){
				console.log(data);
				var studentdata = jQuery.parseJSON(data);
				console.log(studentdata);
				if(studentdata.length == 0){
					alert("No Student Found");
				}else{
					$("#studentdatas").show();
					var id 						  = studentdata.id;
					var name 						= studentdata.name;
					var year 	= studentdata.year;
					var branch = studentdata.branch;
					

					var studid = 'STD'+id;
					$('#show_studentName').text(name);
				$('#show_studentid').text(id);
					$('#show_admissionyear').text(year);
					$('#show_admissionnum').text(id);
					$('#show_studentcourse').text(branch);
					/*-- Setting value to field --*/
					$('#lendstudentidField').val(id);

				}
			});
		}



</script>
<div class="container-fluid">
	<div class="card">
		<div class="header">
			<h4 class="title text-center">Lend Book</h4>
		</div>
		<div class="content">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<div class="card">
				<div class="header">
					<h5 class="title text-left">Book Details</h5>
				</div>
				<div class="content">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Book ID</label>
								<input required type="Text" id="barcode_id" class="form-control" placeholder="Book ID" name="book">
							</div>
						</div>
						<div class="col-sm-3">
							<label>Search</label>
							<button type="button" class="btn btn-primary btn-block" id="get_book_info"
							><i class="fa fa-search"></i></button>
						</div>
						<div class="col-sm-3">
							<label>Barcode</label>
							<button type="button" class="btn btn-primary btn-block" id="barcode_scan_btn"
							><i class="fa fa-barcode"></i></button>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="col-md-12" style="padding:15px;display:none" id="book_info">
								<div class="col-xs-12" style="background-color:#fff;height:250px;padding:0">
									<img src="" id="book_image">
								</div>
								<div class="col-xs-12 text-center" style="height:50px;padding:0;">
									<h5 style="font-size:16px;padding:0;font-weight:600">
										<span id="book_title"></span>
										<br>
										<span style="font-size:13px;font-weight:500">
										</span><br>
										<span style="font-size:10px;">
											<a href="#" style="outline:none;" data-toggle="modal" class='viewmorebookdatabtn bookViewMoreBtn' data-target="#viewbookdatas" >View More</a>
										</span>
									</h5>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="card">
				<div class="header">
					<h5 class="title text-left">Student</h5>
				</div>
				<div class="content">
					<div class="row">
						<div class="col-sm-9">
							<div class="form-group">
								<label>Student Admission Number</label>
								<input required type="Text" id="studentSearchId" value="" class="form-control" placeholder="Student Admission Number" name="student_id">
							</div>
						</div>
						<div class="col-sm-3">
							<label>Search</label>
							<button type="button" class="btn btn-primary btn-block" id="get_student_info"><i class="fa fa-search"></i></button>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="col-md-12" style="padding:15px;display:none;padding-bottom:60px" id="studentdatas">

										<div class="col-xs-2" style="height:80px;border-radius:50%;background-color: #f7f7f7;padding:0">
											<img src="" alt="" style="height:100%;border-radius:50%;width:100%;object-fit:cover" id="show_studentimage">
										</div>

										<div class="col-xs-10">
											<h3 style="padding-left:10px" id="show_studentName">Name</h3>
											<h5 >
												<table class='userdatatable' style="font-size:13px;line-height:22px;opacity:0.7">
													<tr>
														<td style="padding:0px 10px">Student Id</td>
														<td style="padding:2px" class='text-center'>:</td>
														<td style="padding:2px 10px" id="show_studentid">data</td>
													</tr>
													<tr>
														<td style="padding:0px 10px">Year of join</td>
														<td style="padding:2px" class='text-center'>:</td>
														<td style="padding:2px 10px" id="show_admissionyear">data</td>
													</tr>
													
													<tr>
														<td style="padding:0px 10px">Branch</td>
														<td style="padding:2px" class='text-center'>:</td>
														<td style="padding:2px 10px" id="show_studentcourse">data</td>
													</tr>
													

												</table>
											</h5>
										</div>
								</div>
							</div>
						</div>
					</div>

					<?php if(!empty($bookData)): ?>
						<hr>
						<div class="row">
							<div class="col-sm-12">
								<div class="col-md-12" style="padding:15px">
									<div class="col-xs-12" style="background-color:#fff;height:250px;padding:0">
										<img src="<?=$coverimage?>" >
									</div>
									<div class="col-xs-12 text-center" style="height:50px;padding:0;">
										<h5 style="font-size:16px;padding:0;font-weight:600">
											<?=$title?><br>
											<span style="font-size:13px;font-weight:500"><?=$catname?></span><br>
											<span style="font-size:10px;">
												<a href="#" style="outline:none;" data-toggle="modal" class='viewmorebookdatabtn' data-target="#viewbookdatas" data-bookid="<?=$bookid?>">View More</a>
											</span>
										</h5>
									</div>
								</div>
							</div>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<div class="row text-center" style="padding-bottom:15px;">
				<div class="col-xs-12">

					<form class="" action="actions.php?action=addbooklend" method="post">
							<div class="form-group hidden">
								<label>Book Id</label>
								<input type="text" name="lend_bookid" id="lendbookidField" class="form-control" value="">
							</div>
							<div class="form-group hidden">
								<label>Student Id</label>
								<input type="text" name="lend_studentid" id="lendstudentidField"  class="form-control" value="">
							</div>
							
							<button type="submit" id="lendbookbtn" class='btn btn-primary' >Lend</button>
					</form>

				</div>
			</div>

		</form>
	</div>
</div>
<style type="text/css">
	.modal-backdrop.in{
		display: none !important;
	}
</style>
<div id="barcodeScanerModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content" style="z-index: 999;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
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
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>
<script type="text/javascript">
	$(function () {
		var App = {
			init: function () {
				Quagga.init(this.state, function (err) {
					if (err) {
						console.log(err);
						return;
					}
					App.attachListeners();
					Quagga.start();
				});
			},
			initCameraSelection: function () {
				var streamLabel = Quagga.CameraAccess.getActiveStreamLabel();

				return Quagga.CameraAccess.enumerateVideoDevices()
				.then(function (devices) {
					function pruneText(text) {
						return text.length > 30 ? text.substr(0, 30) : text;
					}
					var $deviceSelection = document.getElementById("deviceSelection");
					while ($deviceSelection.firstChild) {
						$deviceSelection.removeChild($deviceSelection.firstChild);
					}
					devices.forEach(function (device) {
						var $option = document.createElement("option");
						$option.value = device.deviceId || device.id;
						$option.appendChild(document.createTextNode(pruneText(device.label || device.deviceId || device.id)));
						$option.selected = streamLabel === device.label;
						$deviceSelection.appendChild($option);
					});
				});
			},
			attachListeners: function () {
				var self = this;

				self.initCameraSelection();
				$(".controls").on("click", "button.stop", function (e) {
					e.preventDefault();
					Quagga.stop();
				});

				$(".controls .reader-config-group").on("change", "input, select", function (e) {
					e.preventDefault();
					var $target = $(e.target),
					value = $target.attr("type") === "checkbox" ? $target.prop("checked") : $target.val(),
					name = $target.attr("name"),
					state = self._convertNameToState(name);

					console.log("Value of " + state + " changed to " + value);
					self.setState(state, value);
				});
			},
			_accessByPath: function (obj, path, val) {
				var parts = path.split('.'),
				depth = parts.length,
				setter = (typeof val !== "undefined") ? true : false;

				return parts.reduce(function (o, key, i) {
					if (setter && (i + 1) === depth) {
						if (typeof o[key] === "object" && typeof val === "object") {
							Object.assign(o[key], val);
						} else {
							o[key] = val;
						}
					}
					return key in o ? o[key] : {};
				}, obj);
			},
			_convertNameToState: function (name) {
				return name.replace("_", ".").split("-").reduce(function (result, value) {
					return result + value.charAt(0).toUpperCase() + value.substring(1);
				});
			},
			detachListeners: function () {
				$(".controls").off("click", "button.stop");
				$(".controls .reader-config-group").off("change", "input, select");
			},
			setState: function (path, value) {
				var self = this;

				if (typeof self._accessByPath(self.inputMapper, path) === "function") {
					value = self._accessByPath(self.inputMapper, path)(value);
				}

				self._accessByPath(self.state, path, value);

				console.log(JSON.stringify(self.state));
				App.detachListeners();
				Quagga.stop();
				App.init();
			},
			inputMapper: {
				inputStream: {
					constraints: function (value) {
						if (/^(\d+)x(\d+)$/.test(value)) {
							var values = value.split('x');
							return {
								width: {min: parseInt(values[0])},
								height: {min: parseInt(values[1])}
							};
						}
						return {
							deviceId: value
						};
					}
				},
				numOfWorkers: function (value) {
					return parseInt(value);
				},
				decoder: {
					readers: function (value) {
						if (value === 'ean_extended') {
							return [{
								format: "ean_reader",
								config: {
									supplements: [
									'ean_5_reader', 'ean_2_reader'
									]
								}
							}];
						}
						return [{
							format: value + "_reader",
							config: {}
						}];
					}
				}
			},
			state: {
				inputStream: {
					type: "LiveStream",
					constraints: {
						width: {min: 640},
						height: {min: 480},
						aspectRatio: {min: 1, max: 100},
                        facingMode: "environment" // or user
                    }
                },
                locator: {
                	patchSize: "medium",
                	halfSample: true
                },
                numOfWorkers: 4,
                decoder: {
                	readers: [{
                		format: "code_128_reader",
                		config: {}
                	}]
                },
                locate: true
            },
            lastResult: null
        };

        App.init();

        Quagga.onProcessed(function (result) {
        	var drawingCtx = Quagga.canvas.ctx.overlay,
        	drawingCanvas = Quagga.canvas.dom.overlay;

        	if (result) {
        		if (result.boxes) {
        			drawingCtx.clearRect(0, 0, parseInt(drawingCanvas.getAttribute("width")), parseInt(drawingCanvas.getAttribute("height")));
        			result.boxes.filter(function (box) {
        				return box !== result.box;
        			}).forEach(function (box) {
        				Quagga.ImageDebug.drawPath(box, {x: 0, y: 1}, drawingCtx, {color: "green", lineWidth: 2});
        			});
        		}

        		if (result.box) {
        			Quagga.ImageDebug.drawPath(result.box, {x: 0, y: 1}, drawingCtx, {color: "#00F", lineWidth: 2});
        		}

        		if (result.codeResult && result.codeResult.code) {
        			Quagga.ImageDebug.drawPath(result.line, {x: 'x', y: 'y'}, drawingCtx, {color: 'red', lineWidth: 3});
        		}
        	}
        });

        Quagga.onDetected(function (result) {
        	var code = result.codeResult.code;

        	if (App.lastResult !== code) {
        		App.lastResult = code;
        		var $node = null, canvas = Quagga.canvas.dom.image;


        		$('input[name="bookid"]').val(code)
        		$('#barcodeScanerModal').modal('hide');
        		var bookid = $('input[name="bookid"]');
        		getBookInfo(code);
        	}
        });
    });
$(function () {

	$('#get_book_info').click(function(){
		var book_id = $('#barcode_id').val();
		getBookInfo(book_id);
	});

	$('#get_student_info').click(function(){
		var student_id = $('#studentSearchId').val();
		getStudentInfo(student_id);
	});

//	$("#barcode").JsBarcode("barcode");
$("#barcode_scan_btn").click(function () {
	var $target = $("" + $(this).data('target'));
	var $scannerModal = $('#barcodeScanerModal');
	$scannerModal.modal('show');
});

$('#lendbookbtn').click(function(e){
	var bookid = $('#lendbookidField').val();
	var studentid = $('#lendstudentidField').val();
	if(bookid.length === 0 ){ e.preventDefault(); alert('Please select a book'); }
	if(studentid.length === 0 ){ e.preventDefault(); alert('Please select a student'); }
});





});




</script>
<?php
	include './includes/footer.php';
?>

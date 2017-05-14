<?php 
include './includes/header.php';

?>
<!--<div class="container">-->
<link rel="stylesheet" href="assets/css/owl.carousel.css">
<link rel="stylesheet" href="assets/css/owl.theme.default.css">
<script src="assets/js/owl.carousel.js"></script>
<script type="text/javascript">

    $(function(){
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            autoplay:true,
            autoplayTimeout:1000,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    });
</script>
<div class="container-fluid">
    <h4 class="text-center">Latest Books</h4>
    <hr>    
<div class="owl-carousel owl-theme">
    <?php 
    require './libs/Students.php';
    $students  = new Students();
        require './libs/Admin.php';
    $admin  = new Admin();
    $bookdata = $book->getNewBooks();
    $allBook = $book->getBooks();
    $book_count = sizeof($allBook);
    $lendData = $book->getLendHistory();
    $lend_count = sizeof($lendData);
    $studentsData = $students->getStudents();
    $students_count = sizeof($studentsData);
    $staffData = $admin->getAllStaff();
    $staffCount = sizeof($staffData);
    foreach ($lendData as $lend) {
        if($lend['return_date'] != ""){
            $lend_count--;
        }
    }
    foreach ($bookdata as $book) {

        ?>

        <div class="item" style="background: url(<?=$book['image']?>); height: 250px; background-size:cover">
        </div>
        <?php
    }
    ?>


</div>
</div>
<br>
<br>
<div class="row">
<div class="col-md-3">
    <div class="card">
        <div class="header">
            <h4 class="title">Total Books</h4>
            <h4 class="title"><?=$book_count?></h4>
        </div>
        <div class="content">                
        </div>
    </div>
</div>

<div class="col-md-3">
    <div class="card">
        <div class="header">
            <h4 class="title">Total Lends</h4>
            <h4 class="title"><?=$lend_count?></h4>
        </div>
        <div class="content">
        </div>
    </div>
</div>

<div class="col-md-3">
    <div class="card">
        <div class="header">
            <h4 class="title">Total Studnets</h4>
            <h4 class="title"><?=$students_count?></h4>
            <div class="content">  
            </div>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="card">
        <div class="header">
        <h4 class="title">Total Staff</h4>
            <h4 class="title"><?=$staffCount?></h4>
            <div class="content">  
            </div>
        </div>
    </div>
</div>

<!--</div>-->
<?php include './includes/footer.php'; 

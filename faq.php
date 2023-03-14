<?php
      session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php require ('inc/head.php'); ?>

<body>
    <?php require ('inc/preloader_area.php'); 

    require ('inc/top_Bar.php'); 

     ?>
         <?php

if(isset($_SESSION['userId'])){
$userid=$_SESSION['userId'];

require ('inc/LoginHeader.php'); 
}else{

     require ('inc/Header.php'); 
}

?>
    <!-- ========== Breadcumb start============= -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-8">
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">FAQ</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== Breadcumb end============= -->
    <!-- ========== Room & Suits start============= -->
    <div class="faq-page pt-120 mb-120">
        <div class="container">
            <div class="row mb-120 g-4">
                <div class="col-lg-8">
                    <div class="faq-wrap">
                        <h3>Frequently Asked Questions</h3>
                        <p>Donec bibendum enim ut elit porta ullamcorper. Vestibulum Nai quam nulla, venenatis eget dapibus ac, catali topuny wekemdini iaculis vitae nulla. Morbi mattis nec.</p>
                        <div class="faq-item">
                            <h5 id="heading10" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-controls="collapse10" aria-expanded="true">
                                01. Curious about how to build your own UX strategy? Here are.
                            </h5>
                            <div id="collapse10" class="accordion-collapse collapse show" aria-labelledby="heading10">
                                <div class="faq-body">
                                    Hotel ut nisl quam nestibulum ac quam nec odio elementum oneni sci the aucanola ligula. Orci varius natoque penatibus ethemen magnis disc parturient montego tyni nascete ridiculus musclineorto 
                                </div>
                            </div>
                        </div>
                        <div class="faq-item">
                            <h5 id="heading11" class="accordion-button  collapsed" data-bs-toggle="collapse" data-bs-target="#collapse11" aria-controls="collapse11" aria-expanded="true">
                                02. Where Could a Career in UX Take You? Agency vs. In-House ?
                            </h5>
                            <div id="collapse11" class="accordion-collapse collapse" aria-labelledby="heading11">
                                <div class="faq-body">
                                    Hotel ut nisl quam nestibulum ac quam nec odio elementum oneni sci the aucanola ligula. Orci varius natoque penatibus ethemen magnis disc parturient montego tyni nascete ridiculus musclineorto 
                                </div>
                            </div>
                        </div>
                        <div class="faq-item">
                            <h5 id="heading12" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-controls="collapse12">
                                03. What Is a Problem Statement in UX? (And How To Write One)?
                            </h5>
                            <div id="collapse12" class="accordion-collapse collapse" aria-labelledby="heading12">
                                <div class="faq-body">
                                    Hotel ut nisl quam nestibulum ac quam nec odio elementum oneni sci the aucanola ligula. Orci varius natoque penatibus ethemen magnis disc parturient montego tyni nascete ridiculus musclineorto 
                                </div>
                            </div>
                        </div>
                        <div class="faq-item">
                            <h5 id="heading13" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse13" aria-controls="collapse13">
                                04. There are several techniques UX designers employ to arrive?
                            </h5>
                            <div id="collapse13" class="accordion-collapse collapse" aria-labelledby="heading13">
                                <div class="faq-body">
                                    Hotel ut nisl quam nestibulum ac quam nec odio elementum oneni sci the aucanola ligula. Orci varius natoque penatibus ethemen magnis disc parturient montego tyni nascete ridiculus musclineorto 
                                </div>
                            </div>
                        </div>
                        <div class="faq-item">
                            <h5 id="heading14" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse14" aria-controls="collapse14">
                                05. What are the users are facing? What are they trying to?
                            </h5>
                            <div id="collapse14" class="accordion-collapse collapse" aria-labelledby="heading14">
                                <div class="faq-body">
                                    Hotel ut nisl quam nestibulum ac quam nec odio elementum oneni sci the aucanola ligula. Orci varius natoque penatibus ethemen magnis disc parturient montego tyni nascete ridiculus musclineorto 
                                </div>
                            </div>
                        </div>
                        <div class="faq-item">
                            <h5 id="heading15" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse15" aria-controls="collapse14">
                                06. Why is this important? Why will users benefit from solving?
                            </h5>
                            <div id="collapse15" class="accordion-collapse collapse" aria-labelledby="heading15">
                                <div class="faq-body">
                                    Hotel ut nisl quam nestibulum ac quam nec odio elementum oneni sci the aucanola ligula. Orci varius natoque penatibus ethemen magnis disc parturient montego tyni nascete ridiculus musclineorto 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="faq-form">
                        <h3>Feel free to ask:</h3>
                        <form>
                            <div class="form-inner mb-30">
                                <input type="text" placeholder="Your Name :">
                            </div>
                            <div class="form-inner mb-30">
                                <input type="email" placeholder="Your Email :">
                            </div>
                            <div class="form-inner mb-30">
                                <input type="text" placeholder="Subject :">
                            </div>
                            <div class="form-inner mb-30">
                                <textarea placeholder="Write Message" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-inner">
                                <button type="submit">Send Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== Room & Suits end============= -->
    <?php require ('inc/footer.php'); 

    require('inc/js_file_link.php'); ?>


</body>

</html>
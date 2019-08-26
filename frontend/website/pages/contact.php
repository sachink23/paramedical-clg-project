<?php
    if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["message"])) {
        $msg="";
        $subject = "New query on website by ".$_POST["name"];
        $to = $bs["college_email"];
        $message = "Name : ".$_POST["name"]. "<br>Email : ".$_POST["email"]."<br>Message : ".$_POST["message"];
        
        $header = "From: mail@".appHost . "\r\n". 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html;' . "\r\n";
        mail($to, $subject, $message, $header); 
        $msg='<div class="alert alert-primary" role="alert">
            <strong>Message sent successfully, we will get in touch with you in 48 hours</strong>
        </div>';
    } else {
        $msg = "";
    }
?>


<section id="contact">
        <div class="container">
            <h2 class="text-uppercase text-center text-secondary mb-0">Contact Us</h2>
            <hr class="star-dark mb-5">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form id="contactForm" name="sentMessage" action="./#contact" method="post">
                        <div class="form-group">
                            <?= $msg ?>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Name</label><input class="form-control" type="text" required=""
                                    placeholder="Name" id="name" name="name"><small
                                    class="form-text text-danger help-block"></small></div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2"><label>Email
                                    Address</label><input class="form-control" type="email" required=""
                                    placeholder="Email Address" id="email" name="email"><small
                                    class="form-text text-danger help-block"></small></div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2"><label>Phone
                                    Number</label><input class="form-control" type="tel" required=""
                                    placeholder="Phone Number" id="phone" name="phone"><small 
                                    class="form-text text-danger help-block"></small></div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-3 pb-2"><textarea
                                    class="form-control" rows="5" required="" name="message" placeholder="Message"
                                    id="message"></textarea><small class="form-text text-danger help-block"></small>
                            </div>
                        </div>
                        <div id="success"></div>
                        <div class="form-group"><button class="btn btn-primary btn-xl" type="submit"
                                id="sendMessageButton">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
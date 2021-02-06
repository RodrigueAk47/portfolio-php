<body id="page-top" class="index">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top"><?php echo $rowLanding["heading"];?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio"><?php echo $rowSetup["portfolioheading"];?></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about"><?php echo $rowAbout["heading"];?></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact"><?php echo $rowContact["heading"];?></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <?php
	                if ($rowLanding["image"] != "") {
	                	echo "<img class='img-responsive' src='uploads/".$rowLanding["image"]."' alt=''>";
	                } else {
	                	echo "<img class='img-responsive' src='img/profile.png' alt=''>";
	                }
                ?>
                    <div class="intro-text">
                        <span class="name"><?php echo $rowLanding["introtext"];?></span>
                        <hr class="star-light">
                        <span class="skills"><?php echo $rowLanding["skills"];?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2><?php echo $rowSetup["portfolioheading"];?></h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
			<?php
				while ($rowPages  = mysqli_fetch_array($sqlPages)) {
			?>
            <div class="col-sm-4 portfolio-item">
                <a href="#portfolioModal<?php echo $rowPages["id"];?>" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                    	<div class="caption-content">
							<?php
                            if ($rowPages["title"] != "") {
                                echo "<div class='portfolio-title'>".$rowPages["title"]."</div>";
                            }
                            ?>
                        <i class="fa fa-search-plus fa-3x"></i>
                      </div>
                  </div>
					<?php
						if ($rowPages["thumbnail"] != "") {
							echo "<img src='uploads/".$rowPages["thumbnail"]."' class='img-responsive' title='".$rowPages["title"]."' alt='".$rowPages["title"]."'>";
						} else {
							echo "<img src='img/portfolio/cake.png' class='img-responsive' title='".$rowPages["title"]."' alt='".$rowPages["title"]."'>";
						}
					?>
                </a>
            </div>
      		<?php
				}
			?>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2><?php echo $rowAbout["heading"];?></h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-lg-offset-0 text-center">
                	<?php echo $rowAbout["content"];?>
                </div>
            </div>
        </div>
    </section>

  <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2><?php echo $rowContact["heading"];?></h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form name="sentMessage" id="contactForm" method="post" action="mail/contact_me.php">
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" name="name" maxlength="25" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" name="email" pattern="(?!(^[.-].*|[^@]*[.-]@|.*\.{2,}.*)|^.{254}.)([a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@)(?!-.*|.*-\.)([a-zA-Z0-9-]{1,63}\.)+[a-zA-Z]{2,15}" maxlength="25"  required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Phone Number</label>
                                <input type="tel" class="form-control" placeholder="Phone Number" id="phone" name="phone" maxlength="25" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" name="message" maxlength="255" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
						<input type="hidden" name="sendToEmail" value="<?php echo $rowContact["sendtoemail"];?>"/>
                        <input type="hidden" id="referer" name="referer" value="<?php echo $_SESSION["unique_referer"]; ?>"/>
                        <br>

						<?php
							if ($_GET["msgsent"]=="thankyou") {
								echo "<div id='success'><div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true' onclick=\"window.location.href='index.php#contact'\">×</button><strong>Your message has been sent. </strong></div></div>";
							} elseif ($_GET["msgsent"]=="error") {
								echo "<div id='success'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true' onclick=\"window.location.href='index.php#contact'\">×</button><strong>An error occured while sending your message. </strong></div></div>";
							}
						?>

                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p>
                        <?php
                        	if (!empty($rowContact["address"])) {
                        		echo $rowContact["address"]."<br>";
                        	}
	                        if (!empty($rowContact["city"])) {
	                        	echo $rowContact["city"].", ";
	                        }
	                        if (!empty($rowContact["state"])) {
	                        	echo $rowContact["state"]."<br>";
	                        }
	                        if (!empty($rowContact["phone"])) {
	                        	echo $rowContact["phone"]."<br>";
	                        }
	                        if (!empty($rowContact["email"])) {
	                        	echo $rowContact["email"];
	                        }
                        ?>
                        </p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3><?php echo $rowSocial["heading"];?></h3>
                        <ul class="list-inline">

								<?php
									if (!empty($rowSocial["facebook"])){
										echo "<li><a href=".$rowSocial["facebook"]." class='btn-social btn-outline'><i class='fa fa-fw fa-facebook'></i></a></li>";
									}

									if (!empty($rowSocial["google"])){
										echo "<li><a href=".$rowSocial["google"]." class='btn-social btn-outline'><i class='fa fa-fw fa-google-plus'></i></a></li>";
									}

									if (!empty($rowSocial["github"])){
										echo "<li><a href=".$rowSocial["github"]." class='btn-social btn-outline'><i class='fa fa-fw fa-github'></i></a></li>";
									}

									if (!empty($rowSocial["twitter"])){
										echo "<li><a href=".$rowSocial["twitter"]." class='btn-social btn-outline'><i class='fa fa-fw fa-twitter'></i></a></li>";
									}

									if (!empty($rowSocial["linkedin"])){
										echo "<li><a href=".$rowSocial["linkedin"]." class='btn-social btn-outline'><i class='fa fa-fw fa-linkedin'></i></a></li>";
									}
								?>

                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3><?php echo $rowFooter["heading"];?></h3>
                        <?php echo $rowFooter["content"];?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; <?php echo $_SERVER['HTTP_HOST']."&nbsp;".date("Y");?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visble-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>
<?php
	while ($rowPagesActive  = mysqli_fetch_array($sqlPagesActive)) {
?>
    <!-- Portfolio Modals -->
    <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $rowPagesActive["id"];?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">

                            <h2><?php echo $rowPagesActive["title"];?></h2>
                            <hr class="star-primary">
							<?php
	                            if ($rowPagesActive["thumbnail"] != "") {
	                                echo "<img src='uploads/".$rowPagesActive["thumbnail"]."' class='img-responsive img-centered' alt=''>";
	                            } else {
	                                echo "<img src='img/portfolio/cake.png' class='img-responsive' alt=''>";
	                            }
                            ?>
                            <?php echo $rowPagesActive["content"];?>

                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

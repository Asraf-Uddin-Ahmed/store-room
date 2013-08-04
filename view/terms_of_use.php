
<?php 
	session_start();
	require_once("../class/class.MakeValid.php");
	$objMV = new MakeValid();
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    
	<!-- TITLE -->
	<title>Store Room - Home</title>
	
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
   
    <script type="text/javascript" src="script.js"></script>
</head>
<body>
<div id="art-page-background-simple-gradient">
        <div id="art-page-background-gradient"></div>
    </div>
    <div id="art-page-background-glare">
        <div id="art-page-background-glare-image"></div>
    </div>
    <div id="art-main">
        <div class="art-sheet">
            <div class="art-sheet-tl"></div>
            <div class="art-sheet-tr"></div>
            <div class="art-sheet-bl"></div>
            <div class="art-sheet-br"></div>
            <div class="art-sheet-tc"></div>
            <div class="art-sheet-bc"></div>
            <div class="art-sheet-cl"></div>
            <div class="art-sheet-cr"></div>
            <div class="art-sheet-cc"></div>
            <div class="art-sheet-body">
                <div class="art-header">
                    <div class="art-header-png"></div>
                    <div class="art-header-jpeg"></div>
                    <div class="art-logo">
                        <h1 id="name-text" class="art-logo-name">Store Room</h1>
                        <div id="slogan-text" class="art-logo-text">Store Yourself</div>
                    </div>
                </div>
                <div class="art-nav">
                	<div class="l"></div>
                	<div class="r"></div>
                	<ul class="art-menu">
					<!-- MENU BAR -->
                		<li>
                			<a href="home.php" ><span class="l"></span><span class="r"></span><span class="t">Home</span></a>
                		</li>
						<?php
							//echo $_SESSION['userId'];
							if( isset($_SESSION['userId']) ) {
								//logout & your room
								echo "<li>
										<a href=\"../controller/YourRoom.php\"><span class=\"l\"></span><span class=\"r\"></span><span class=\"t\">Your Room</span></a>
									</li>
									<li>
										<a href=\"confirm_logout.php\"><span class=\"l\"></span><span class=\"r\"></span><span class=\"t\">Logout</span></a>
									</li>";
							} else {
								//registration & login
								echo "<li>
										<a href=\"registration.php\"><span class=\"l\"></span><span class=\"r\"></span><span class=\"t\">Registration</span></a>
									</li>
									<li>
										<a href=\"login.php\"><span class=\"l\"></span><span class=\"r\"></span><span class=\"t\">Login</span></a>
									</li>";
							}
						
						?>
						<li>
                			<a href="about.php" class="active"><span class="l"></span><span class="r"></span><span class="t">About</span></a>
                		</li>
                	</ul>
                </div>
				<!--end of header-->
				
                <!--Middle content-->
				<div class="art-content-layout">
                    <div class="art-content-layout-row">
					<!-- CONTENT -->
                        <div class="art-layout-cell art-content">
                            <div class="art-post">
                                <div class="art-post-body">
									<div class="art-post-inner art-article">
										<div class="art-postmetadataheader">
											<h2 class="art-postheader">
												<b><i>Terms & Conditions</i></b>
											</h2>
										</div>
										<div class="art-postcontent">
									
										<!-- PAGE CONTENT -->
											<ul>
												<li>1073741824 Bytes available for each user.</li>
												<li>Site security is too poor. So, admin is not responsible for any violation of your file(s).</li>
												<li><i>Oil your own head.</i> <b>Please don't disturb me.</b></li>
											</ul>
											
											<div class="cleared"></div>
										</div>
										<div class="cleared"></div>
									</div>
                            		<div class="cleared"></div>
                                </div>
                            </div>
                        </div>
						
					<!-- SIDE BAR -->
                        <div class="art-layout-cell art-sidebar1">
                            <div class="art-block">
                                <div class="art-block-body">
                                            <div class="art-blockheader">
                                                 <div class="t">File name</div>
                                            </div>
                                            <div class="art-blockcontent">
                                                <div class="art-blockcontent-body">
                                            <!-- File Search -->
													<div>
														<form method="post" id="newsletterform" action="../controller/FileFinder.php">
															<input type="text" value="" name="textFileName" id="s" style="width: 95%;" />
															<span class="art-button-wrapper">
																<span class="l"> </span>
																<span class="r"> </span>
																<input class="art-button" type="submit" name="search" value="Search" />
															</span>																
														</form>
													</div>
                                            		<div class="cleared"></div>
                                                </div>
                                            </div>
                            		<div class="cleared"></div>
                                </div>
                            </div>
                            <div class="art-block">
                                <div class="art-block-body">
                                            <div class="art-blockheader">
                                                 <div class="t">Highlights</div>
                                            </div>
                                            <div class="art-blockcontent">
                                                <div class="art-blockcontent-body">
                                            <!-- Side Link -->
														<div>
															<ul>
																<li><a href="home.php">Home</a></li>
																<li><a href="../controller/YourRoom.php">Your Room</a></li>
																<li><a href="about.php">About</a></li>
															</ul>
														</div>
													<div class="cleared"></div>
                                                </div>
                                            </div>
                            		<div class="cleared"></div>
                                </div>
                            </div>
                            <div class="art-block">
                                <div class="art-block-body">
                                            <div class="art-blockheader">
                                                 <div class="t">Contact Info</div>
                                            </div>
                                            <div class="art-blockcontent">
                                                <div class="art-blockcontent-body">
                                            <!-- Contact -->
													<div>
														  <img src="images/contact.jpg" alt="an image" style="margin: 0 auto;display:block;width:95%" />
													<br />
													<b>Asraf Uddin Ahemd (Ratul)</b><br />
													MBSTU, Tangail<br />
													Email: <a href="mailto:info@company.com">13ratul@gmail.com</a><br />
													<br />
													Phone: (+88) 01673725106 <br />
													&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp (+88) 01916144845
													</div>
													<div class="cleared"></div>
                                                </div>
                                            </div>
                            		<div class="cleared"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
			<!-- FOOTER -->
                <div class="cleared"></div>
				<div class="art-footer">
                    <div class="art-footer-inner">
                        <a href="#" class="art-rss-tag-icon" title="RSS"></a>
                        <div class="art-footer-text">
						<!-- footer link -->
                            <p><a href="contact_us.php">Contact Us</a> | <a href="terms_of_use.php">Terms of Use</a></p>
                        </div>
                    </div>
					<div class="art-footer-text">
						<p>Copyright &copy; 2013 ---. All Rights Reserved.</p>
					</div>
                    <div class="art-footer-background"></div>
                </div>
        		<div class="cleared"></div>
            </div>
        </div>
        <div class="cleared"></div>
        <p class="art-page-footer"></p>
		<!-- end of FOOTER -->
    </div>
    
</body>
</html>

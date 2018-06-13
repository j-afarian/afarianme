<?php
/* Set e-mail recipient */
$myemail = "jenna@afarian.me";

/* Check all form inputs using check_input function */
$name = check_input($_POST['name'], "Enter your name");
$email = check_input($_POST['email']);
$subject = "New contact form email";
$message = check_input($_POST['message'], "Write your message");

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("E-mail address not valid");
}
/* Let's prepare the message for the e-mail */
$message = "

Name: $name
E-mail: $email
Subject: $subject

Message:
$message

";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: ../../thanks.html');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
{
show_error($problem);
}
return $data;
}

function show_error($myError)
{
?>
<html>
	<head>
		<title>Error! | Jenna Afarian</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../css/main.css" />
		<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>


		<!-- Contact -->
			<article class="container box style3">
				<header>
					<h2>Please correct the following errors</h2>
					<p><strong><?php echo $myError; ?></strong></p>
					<p>Hit the back button and try again</p>
				</header>
			</article>

		<section id="footer">
			<ul class="icons">
				<li><a href="https://twitter.com/jennaafarian" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
				<li><a href="https://stackoverflow.com/users/9299547/j-afarian" class="icon fa-stack-overflow"><span class="label">Stack Overflow</span></a></li>
				<li><a href="https://github.com/j-afarian" class="icon fa-github"><span class="label">Github</span></a></li>
				<li><a href="https://codepen.io/j-afarian" class="icon fa-codepen"><span class="label">Codepen</span></a></li>
				<li><a href="https://www.linkedin.com/in/jenna-afarian/" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
			</ul>
			<div class="copyright">
				<ul class="menu">
					<li>&copy; Jenna Afarian. All rights reserved.</li>
				</ul>
			</div>
		</section>

		<!-- Scripts -->
			<script src="../js/jquery.min.js"></script>
			<script src="../js/jquery.scrolly.min.js"></script>
			<script src="../js/jquery.poptrox.min.js"></script>
			<script src="../js/skel.min.js"></script>
			<script src="../js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../js/main.js"></script>
			<script src="../js/gen_validatorv31.js"></script>

	</body>
</html>

<?php
exit();
}
?>

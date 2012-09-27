<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Error 404 | Halaman Tidak Ditemukan</title>

<!-- Internet Explorer HTML5 enabling script: -->

<!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<style type="text/css">
*{
	margin:0;
	padding:0;
}

body{
	background:url('<?php echo base_url().'assets/images/bg.png'; ?>') no-repeat center center #1d1d1d;
	color:#eee;
	font-family:Corbel,Arial,Helvetica,sans-serif;
	font-size:13px;
}

#rocket{
	width:275px;
	height:375px;
	background:url('<?php echo base_url().'assets/images/rocket.png'; ?>') no-repeat;
	margin:20px auto 50px;
	position:relative;
}

/*	Two steam classes. */

.steam1,
.steam2{
	position:absolute;
	bottom:78px;
	left:50px;
	width:80px;
	height:80px;
	background:url('<?php echo base_url().'assets/images/steam.png'; ?>') no-repeat;
	opacity:0.8;
}

.steam2{

   /*	.steam2 shows the bottom part (dark version)
	*	of the background image.
	*/

	background-position:left bottom;
}

hgroup{

	/* Using the HTML4 hgroup element */

	display:block;
	margin:0 auto;
	width:850px;
	font-family:'Century Gothic',Calibri,'Myriad Pro',Arial,Helvetica,sans-serif;
	text-align:center;
}

h1{
	color:#76D7FB;
	font-size:60px;
	text-shadow:3px 3px 0 #3D606D;
	white-space:nowrap;
}

h2{
	color:#9FE3FC;
	font-size:18px;
	font-weight:normal;
	padding:25px 0;
}

/* Only Needed For The Demo Page */

p.createdBy{
	font-size:15px;
	font-weight:normal;
	margin:50px;
	text-align:center;
	text-shadow:none;
}

a, a:visited {
	text-decoration:none;
	outline:none;
	border-bottom:1px dotted #97cae6;
	color:#97cae6;
}

a:hover{
	border-bottom:1px dashed transparent;
}
</style>
<script src="<?php echo base_url().'assets/js/jquery-1.7.1.min.js'; ?>"></script>
</head>

<body>

<div id="rocket"></div>

<hgroup>
    <h1>Halaman Tidak Ditemukan</h1>
    <h2>Tidak dapat menemukan halaman yang anda maksud.</h2>
</hgroup>
<script type="text/javascript">
$(window).load(function(){
	
	// We are listening for the window load event instead of the regular document ready.
	
	function animSteam(){
		
		// Create a new span with the steam1, or steam2 class:
		
		$('<span>',{
			className:'steam'+Math.floor(Math.random()*2 + 1),
			css:{
				// Apply a random offset from 10px to the left to 10px to the right
				marginLeft	: -10 + Math.floor(Math.random()*20)
			}
		}).appendTo('#rocket').animate({
			left:'-=58',
			bottom:'-=100'
		}, 120,function(){
			
			// When the animation completes, remove the span and
			// set the function to be run again in 10 milliseconds
			
			$(this).remove();
			setTimeout(animSteam,10);
		});
	}
	
	function moveRocket(){
		$('#rocket').animate({'left':'+=100'},5000).delay(1000)
					.animate({'left':'-=100'},5000,function(){
				setTimeout(moveRocket,1000);
		});
	}

	// Run the functions when the document and all images have been loaded.
		
	moveRocket();
	animSteam();
});
</script>
</body>
</html>

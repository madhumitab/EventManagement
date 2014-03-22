<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>Untitled Document</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<style type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<!--
body {
	font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;
	background-color: #42413C;
	margin: 0;
	padding: 0;
	color: #000;
}
/* ~~ Element/tag selectors ~~ */
ul, ol, dl { /* Due to variations between browsers, it's best practices to zero padding and margin on lists. For consistency, you can either specify the amounts you want here, or on the list items (LI, DT, DD) they contain. Remember that what you do here will cascade to the .nav list unless you write a more specific selector. */
	padding: 0;
	margin: 0;
}
h1, h2, h3, h4, h5, h6, p {
	margin-top: 0;	 /* removing the top margin gets around an issue where margins can escape from their containing block. The remaining bottom margin will hold it away from any elements that follow. */
	padding-right: 15px;
	padding-left: 15px; /* adding the padding to the sides of the elements within the blocks, instead of the block elements themselves, gets rid of any box model math. A nested block with side padding can also be used as an alternate method. */
}
a img { /* this selector removes the default blue border displayed in some browsers around an image when it is surrounded by a link */
	border: none;
}
/* ~~ Styling for your site's links must remain in this order - including the group of selectors that create the hover effect. ~~ */
a:link {
	color: #42413C;
	text-decoration: underline; /* unless you style your links to look extremely unique, it's best to provide underlines for quick visual identification */
}
a:visited {
	color: #6E6C64;
	text-decoration: underline;
}
a:hover, a:active, a:focus { /* this group of selectors will give a keyboard navigator the same hover experience as the person using a mouse. */
	text-decoration: none;
}
/* ~~ This fixed width container surrounds all other blocks ~~ */
.container {
	width: 960px;
	background-color: #FFFFFF;
	margin: 0 auto; /* the auto value on the sides, coupled with the width, centers the layout */
}
/* ~~ The header is not given a width. It will extend the full width of your layout. ~~ */
header {
	background: #b7deed; /* Old browsers */
background: -moz-linear-gradient(top,  #b7deed 0%, #21b4e2 36%, #71ceef 50%, #b7deed 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#b7deed), color-stop(36%,#21b4e2), color-stop(50%,#71ceef), color-stop(100%,#b7deed)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #b7deed 0%,#21b4e2 36%,#71ceef 50%,#b7deed 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #b7deed 0%,#21b4e2 36%,#71ceef 50%,#b7deed 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #b7deed 0%,#21b4e2 36%,#71ceef 50%,#b7deed 100%); /* IE10+ */
background: linear-gradient(to bottom,  #b7deed 0%,#21b4e2 36%,#71ceef 50%,#b7deed 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b7deed', endColorstr='#b7deed',GradientType=0 ); /* IE6-9 */

}
/* ~~ These are the columns for the layout. ~~ 

1) Padding is only placed on the top and/or bottom of the block elements. The elements within these blocks have padding on their sides. This saves you from any "box model math". Keep in mind, if you add any side padding or border to the block itself, it will be added to the width you define to create the *total* width. You may also choose to remove the padding on the element in the block element and place a second block element within it with no width and the padding necessary for your design.

2) No margin has been given to the columns since they are all floated. If you must add margin, avoid placing it on the side you're floating toward (for example: a right margin on a block set to float right). Many times, padding can be used instead. For blocks where this rule must be broken, you should add a "display:inline" declaration to the block element's rule to tame a bug where some versions of Internet Explorer double the margin.

3) Since classes can be used multiple times in a document (and an element can also have multiple classes applied), the columns have been assigned class names instead of IDs. For example, two sidebar blocks could be stacked if necessary. These can very easily be changed to IDs if that's your preference, as long as you'll only be using them once per document.

4) If you prefer your nav on the left instead of the right, simply float these columns the opposite direction (all left instead of all right) and they'll render in reverse order. There's no need to move the blocks around in the HTML source.

*/
.sidebar1 {
	float: left;
	width: 180px;
	background-color: #EADCAE;
	padding-bottom: 10px;
}
.content {
	padding: 10px 0;
	width: 600px;
	float: left;
}
aside {
	float: left;
	width: 180px;
	background-color: #EADCAE;
	padding: 10px 0;
}

/* ~~ This grouped selector gives the lists in the .content area space ~~ */
.content ul, .content ol {
	padding: 0 15px 15px 40px; /* this padding mirrors the right padding in the headings and paragraph rule above. Padding was placed on the bottom for space between other elements on the lists and on the left to create the indention. These may be adjusted as you wish. */
}

/* ~~ The navigation list styles (can be removed if you choose to use a premade flyout menu like Spry) ~~ */
ul.nav {
	list-style: none; /* this removes the list marker */
	border-top: 1px solid #666; /* this creates the top border for the links - all others are placed using a bottom border on the LI */
	margin-bottom: 15px; /* this creates the space between the navigation on the content below */
}
ul.nav li {
	border-bottom: 1px solid #666; /* this creates the button separation */
}
ul.nav a, ul.nav a:visited { /* grouping these selectors makes sure that your links retain their button look even after being visited */
	padding: 5px 5px 5px 15px;
	display: block; /* this gives the link block properties causing it to fill the whole LI containing it. This causes the entire area to react to a mouse click. */
	width: 160px;  /*this width makes the entire button clickable for IE6. If you don't need to support IE6, it can be removed. Calculate the proper width by subtracting the padding on this link from the width of your sidebar container. */
	text-decoration: none;
	background-color: #FFFFFF;
}
ul.nav a:hover, ul.nav a:active, ul.nav a:focus { /* this changes the background and text color for both mouse and keyboard navigators */
	background-color: #ADB96E;
	color: #FFF;
}

/* ~~ The footer ~~ */
footer {
	padding: 10px 0;
	background-color: #CCC49F;
	position: relative;/* this gives IE6 hasLayout to properly clear */
	clear: both; /* this clear property forces the .container to understand where the columns end and contain them */
}
/* ~~ Miscellaneous float/clear classes ~~ */
.fltrt {  /* this class can be used to float an element right in your page. The floated element must precede the element it should be next to on the page. */
	float: right;
	margin-left: 8px;
}
.fltlft { /* this class can be used to float an element left in your page. The floated element must precede the element it should be next to on the page. */
	float: left;
	margin-right: 8px;
}
.clearfloat { /* this class can be placed on a <br /> or empty block element as the final element following the last floated block (within the .container) if the footer is removed or taken out of the .container */
	clear:both;
	height:0;
	font-size: 1px;
	line-height: 0px;
}

/*HTML 5 support - Sets new HTML 5 tags to display:block so browsers know how to render the tags properly. */
header, section, footer, aside, article, figure {
	display: block;
	color: #000;
}
-->
</style><!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]--></head>

<body>

<div class="container">
  <header> <h1 align="center">Event Management </h1>
  <div align="right">
    
    Post Event|Myaccount</h6>|Logout</h6></div> 
   <div align="right">Search <input type="search"/> |Advanced Search</div>
  </header>
  <div class="sidebar1">
    <ul class="nav">
      <li><a href="#">Sports</a></li>
      <li><a href="#">Concerts</a></li>
      <li><a href="#">Outdoor</a></li>
      <li><a href="#">Parties</a></li>
    </ul>
    <aside>
      
</aside>
  <!-- end .sidebar1 --></div>
  <article class="content">

<?php

include "dbconnect.php";
	


$query = "select * from $_TABLE_NAME where $_EVENT_ID='10'";
$result = mysql_query ($query);

	$info = mysql_fetch_array( $result );


	$eventID = $info[$_EVENT_ID];
	$eventName = $info[$_EVENT_NAME];
	$ulimit = $info[$_UPPER_LIMIT];
	$llimit = $info[$_LOWER_LIMIT];
	$sdate =  $info[$_START_TIME];
	$edate =  $info[$_END_TIME];
	$category =  $info[$_CATEGORY];
	$owner =  $info[$_OWNER];
	$des =  $info[$_DES];
	$nreg =  $info[$_nreg];
		
?>

    <h2 align="center"><?php echo "$eventName"; ?></h2>
  <p style="color:blue;margin-left:20px;"> <?php echo "$sdate : $category"; ?> event </p>
<p>&nbsp;</p>
<h3>DESCRIPTION</h3>
 <h4>Dates:</h4> 
<p><?php echo "From $sdate to $edate"; ?></p>
<h4>
Overview
</h4><p><?php echo "$des"; ?>
   <h4>OWNER : <a href="#"> <?php echo "$owner"; ?></a></h4>
   <P> NUMBER OF PEOPLE REGISTERED : <?php echo "$nreg"; ?></P>
   </p> <input name="" type="button" value="REGISTER"> 
      <section>
    
      <!-- begin htmlcommentbox.com -->
 <div id="HCB_comment_box"><a href="http://www.htmlcommentbox.com">HTML Comment Box</a> is loading comments...</div>
 <link rel="stylesheet" type="text/css" href="http://www.htmlcommentbox.com/static/skins/default/skin.css" />
 <script type="text/javascript" language="javascript" id="hcb"> /*<!--*/ if(!window.hcb_user){hcb_user={  };} (function(){s=document.createElement("script");s.setAttribute("type","text/javascript");s.setAttribute("src", "http://www.htmlcommentbox.com/jread?page="+escape((window.hcb_user && hcb_user.PAGE)||(""+window.location)).replace("+","%2B")+"&opts=470&num=10");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ </script>
<!-- end htmlcommentbox.com -->
</section>


    <section>
      <h2>&nbsp;</h2>
</section>
  <!-- end .content --></article>
  
  <footer>
    <p>&nbsp;</p>
  </footer>
  <!-- end .container --></div>
</body>
</html>

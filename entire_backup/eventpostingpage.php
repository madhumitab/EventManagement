<!doctype html>
<html>
<head>
<title>Event Post Page</title>
<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>Event Posting Page</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<link href="css/style_sheet.css" rel="stylesheet" type="text/css">
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/formvalidation.js"></script>
<![endif]-->
</head>
<body>
<div class="container">
  <header> <h1 align="center">Event Management </h1>
  <div align="right">
     <a href="eventHomePage.php">Home</a>|<a href="eventpostingpage.php">Post Event</a>|<a href="myaccount.php">Myaccount</a></h6>|Logout</h6></div> 
   <div align="right">Search <input type="search"/> |Advanced Search</div>
  </header>
  <article class="content" >
    <form id="form1" name="form1" method="post" action="eventposting.php">
   <p align="center">Event Name :
     <input name="EventName" type="text" id="name" class="form-control">
   </p>
     <label for="UpperLimit"></label>
    <p align="center"> Upper Limit : 
        <input type="text" name="UpperLimit" id="ulimit" class="form-control" ></p>
    <p align="center">LowerLimit : <input type="text"  id="llimit">    </p>
    <p align="center">Start Date : <input type="datetime-local" id="date1" name="startdate">
    </p>
      <p align="center">End Date : <input type="datetime-local" id="date2" name="enddate">
    </p>
    <p align="center">  Description   :   
      <label for="Description" class="required"></label>
      <textarea name="Description" id="Description"></textarea>
  </p>
     <p align="center">  Category   :   
      <label name="category"></label>
    <select name="category" id="category" class=""required">
  <option value="Sports">Sports</option>
  <option value="Parties">Parties</option>
  <option value="concerts">concerts</option>
  <option value="outdoor">outdoor</option>
</select>
  </p>
  
    <p>&nbsp;</p>
    <p align="center">
      <input type="submit" size="15" name="Submit" id="Submit" value="Reset">&nbsp;&nbsp;&nbsp;&nbsp;
      <input size="15" type="submit" name="Reset" id="Reset" value="Submit">
    </p>
   </form>
<p id="error">There were errors on the form, please make sure all fields are fill out correctly.</p>
<section>
  
</section>
</article>
  
  <footer>
    <p>Footer </p>
  </footer>
  <!-- end .container --></div>
</body>
</html>

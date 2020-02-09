<style>
* {
  box-sizing: border-box;
}

/* Style the body */
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}
#but4 {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
/* Header/logo Title */
.header {
	
  color: white;
}
body{
margin:0;    
}
.sidebar{
    width:100%;
   
}
/* Increase the font size of the heading */
.header h1 {
  font-size: 40px;
}

/* Style the top navigation bar */
.navbar {
  overflow: hidden;
  background-color: #ECF5FC;
}

/* Style the navigation bar links */
.navbar a, .dropbtn {
  float: left;
  display: block;
  color: Black;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
}

/* Right-aligned link */
.navbar a.right {
  float: right;
}

/* Change color on hover */
.navbar a:hover,.dropdown:hover .dropbtn {
  background-color: #ddd;
  color: black;
}
.navbar a.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;
}
.buttonn {
    border: none;
    background-color: transparent;
    outline: none;
}
.buttonn:focus {
   border: none;
}

.kk:focus {
    outline: none;
}
 .btn:focus {
      
	  color: #ffffff;
  background-color: #ff851b;
  border-color: #ff7701;
  border: none;
  outline:none;
    }

/* Column container */
.row {  
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
}

/* Create two unequal columns that sits next to each other */
/* Sidebar/left column */
.side {
  -ms-flex: 30%; /* IE10 */
  flex: 30%;
  background-color: #F3F6F9;
  padding: 20px;
}

/* Main column */
.main {   
  -ms-flex: 70%; /* IE10 */
  flex: 70%;
  background-color: white;
  padding: 20px;
}

/* Fake image, just for this example */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Footer */
html{ height:100%; }
body{ min-height:1000px; padding:0; margin:0; position:relative; }
header{ height:50px; background:lightcyan; }
footer{ background:PapayaWhip; }

/* Trick: */
body {
  position: relative;
}

body::after {
  content: '';
  display: block;
  height: 50px; /* Set same as footer's height */
}
#sel {
        width: 80px;
        margin: 10px;
    }
#sel :focus {
        min-width: 150px;
        width: auto;
    } 

.footer {

  width: 100%;
  background-color: #F0F3F7;
  color: Black;
  text-align: center;
}
form, .content {
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group input,select {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
.btn2 {
  padding: 10px;
  font-size: 15px;
  color: white;
  
  background: #5F9EA0;
  border: none;
  border-radius: 5px;
}
.btn3 {
  padding: 10px;
  font-size: 15px;
  color: white;
  
  background: transparent;
  border: none;
  border-radius: 5px;
}
.demo {
  margin: 0 auto;
  padding-top: 64px;
  max-width: 640px;
  width: 94%;
}

.demo h1 {
  margin-top: 0;
}

/**
 * Footer Styles
 */

.footer22 {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  background-color: #efefef;
  text-align: center;
}
.error {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
}
.success {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
}
#page-container {
  position: relative;
  min-height: 100vh;
}

#content-wrap {
  padding-bottom: 2.5rem;    /* Footer height */
}

#footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 2.5rem;            /* Footer height */
}


/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 700px) {
  .row {   
    flex-direction: column;
  }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .navbar a {
    float: none;
    width: 100%;
  }
}
</style>
<script>
$(document).ready(function() {   
     function setHeight() {
         windowHeight = $(window).innerHeight();
         $('.sidebar').css({
      "max-height": windowHeight+"px",
      "min-height": windowHeight+"px"
    });   
     };   
     setHeight();
     $(window).resize(function() {
         setHeight();   
     }); 
 });
</script>
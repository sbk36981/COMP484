<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>JS Bin</title>
</head>

<body>
 <section> 
  <fieldset>
      <legend id=legend-format class="legend">Add an Employee</legend>
      <div><label>First Name</label><br>
        <input id="first" input type="text" name="first_name" required></div>
       
      <div><label>Last Name</label><br>
          <input id="last" input type="text" name="last_name" required></div>
       
      <div><label>Department</label><br>
          <select name="department" id="dept">
            <option value="Engineering">Engineering</option>
            <option value="Accounting">Accounting</option>
            <option value="Business">Business</option>
            <option value="Cinema and Arts">Cinema and Arts</option>
        </select></div> 
      <br> 

    <button id="submit-button" type="submit" name="submit">

      <b>Submit &rarr;</b>
    </button>
    
   </fieldset>
    
  <div id="output"></div>
  
    
  <img id="img_browser" src="" alt="broswer_image" style="width:30px;height:30px">
  <span id="demo"></span>
 </section>
  
</body>
<style>
input {font-weight:bold;}
legend
{
  color:red; 
  font-weight: bold;
  font-size:20px;
  font-family:arial;
  
}

section
{
  
  border: 10px solid 	#A9A9A9;
  padding:20px;
  width: 250px;
}

#submit-button{
  
    text-align: center;
    border: 0.5px solid grey;
    border-radius: 10px;
    background: #ffffff;
    
    width: 80px;
    height: 30px;
}
</style>

<script>
var xmlhttp;

function respond() 
{
	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
	{
		document.getElementById('output').innerHTML = xmlhttp.responseText;
	}
}


function process(){
var output = document.getElementById('output');
var first=document.getElementById("first").value;
var last=document.getElementById("last").value;
var dept=document.getElementById("dept").value;

  console.log("First-->" + first);
  console.log("last-->" + last);
  console.log("Department-->" +dept);
  
var employee = {
first: first,
last: last,
dept: dept,
 
}; 

  
var emp_JSONObj = JSON.stringify(employee);
	console.log(emp_JSONObj);
	
	if (window.XMLHttpRequest) 
	{
		xmlhttp = new XMLHttpRequest();
	}
	else 
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = respond;
	xmlhttp.open("POST", "assignment7.php", true);
	xmlhttp.send(emp_JSONObj);
 
  return false;
}
var b =""; 
var c ="";
function mybrowser() {
        
        if((navigator.userAgent.indexOf("Opera") || navigator.userAgent.indexOf('OPR')) != -1 )
        {
            b = 'Opera';
            c = "http://res.cloudinary.com/awdjlrtf/image/upload/v1512163734/opera_xseeom.jpg"
        }
        else if(navigator.userAgent.indexOf("Chrome") != -1 )
        {
            b ='Chrome';
            c ="http://res.cloudinary.com/awdjlrtf/image/upload/v1512163719/chrome_x6hqoy.jpg"
        }
        else if(navigator.userAgent.indexOf("Safari") != -1)
        {
            b ='Safari';
            c ="http://res.cloudinary.com/awdjlrtf/image/upload/v1512163740/safari_i9ga12.jpg"
        }
        else if(navigator.userAgent.indexOf("Firefox") != -1 )
        {
            b ='Firefox';
            c ="http://res.cloudinary.com/awdjlrtf/image/upload/v1512163730/firefox_u8eeen.jpg"
        }
        else if((navigator.userAgent.indexOf("MSIE") != -1 ) || (!!document.documentMode == true )) //IF IE > 10
        {
            b ='IE';
            c ="http://res.cloudinary.com/awdjlrtf/image/upload/v1512163725/edge_jkyhd2.jpg"
        }
        else
        {
            b ='unknown';
        }
        
    }
   mybrowser(); 
  document.getElementById("img_browser").src = c;
  document.getElementById("demo").innerHTML = b;

function init(){
  document.getElementById("submit-button").addEventListener("click", process);
}
window.onload=init;
</script>

</html>


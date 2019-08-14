<?php
session_start();
if(!isset($_SESSION['usr_name'])) {
header("Location: login.php");
}
include('functionPutFieldsets.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="https://overpass-30e2.kxcdn.com/overpass.css"/>
<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/jquery.qtip.css" />
<link rel="stylesheet" href="css/bootstrap-slider.css" type="text/css" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
<link href="css/bootstrap-toggle.min.css" rel="stylesheet">


<script src="js/jquery-1.12.4.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/jquery.qtip.min.js"></script>
<script>$.fn.slider = null</script>  
<script src="js/bootstrap-slider.js"></script>  
<script src="js/bootstrap-toggle.min.js"></script>


<script type="text/javascript" >
  $( function() {
$("#input").slider({
//    ticks: [0, 0.5, 1, 1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5],
//    ticks_labels: ['0', '0.5', '1', '1.5', '2', '2.5', '3', '3.5', '4', '4.5', '5'],
    ticks: [0, 0.5, 1, 1.5, 2, 2.5, 3],
    ticks_labels: ['0', '0.5', '1', '1.5', '2', '2.5', '3'],
    step: "0.5",
    id: 'sliderCol',
    min: 0,
    max: 6,
    value: 0,
    tooltip: "show",
    rangeHighlights: [{ "start": 0, "end": 1, "class": "category1"},
                      { "start": 1, "end": 2, "class": "category2"},
                      { "start": 2, "end": 3, "class": "category3"}
							]});
});
</script>
  <script>
//  $( function() {
//    $( "input" ).checkboxradio();
//  } );
  </script>

</head>
<body>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php"><img src="images/innovate.png">  Open Organization Capability Model</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
				<li><a href="passwd.php">Change Password</a></li>
				<li><a href="logout.php">Log Out</a></li>
			</ul>
		</div>
	</div>
</nav>
    <div class="container-fluid">
    

<form id="regForm" action="tmp.php">
  <!-- One "tab" for each step in the form: -->
  <div class="tab">
<h3>Welcome to the Open Organization Capability Model</h3>

<p class="mainText">
The Open Organization Capability Model is a tool for assessing your organization's culture.
</p>

<p class="mainText">
More specifically, the tool measures your organization's relative degree of openness, with particular attention to five open principles outlined in the <a href="https://github.com/open-organization-ambassadors/open-org-definition/blob/master/open_org_definition.md" target=_blank><b>Open Organization Definition</b></a>:
</p>

<ul>
        <li class="mainText">Transparency</li>
        <li class="mainText">Inclusivity</li>
        <li class="mainText">Adaptability</li>
        <li class="mainText">Collaboration</li>
        <li class="mainText">Community</li>
</ul>

<p class="mainText">
As part of the assessment process, you'll learn how individuals, teams, and organizations can critically examine their organizational practices and chart their progress toward becoming a more open organization.
</p>
<p class="mainText">
This tool is based on the Open Organization Maturity Model, which the open organization community maintains. For more information about that model, please visit <a target=_ href="http://www.opensource.com/open-organization/resources/open-org-maturity-model"><b>Opensource.com</b></a>.
</p>

<p class="mainText">Before beginning this assessment, remember: All organizations are different, so they adopt open principles and practices to different degrees. This model's three-level design therefore aims both to assist organizations determining the relative degree to which they act openly and to help them explore possibilities for becoming more so.
</p>

  </div>
  <div class="tab"><h4>Customer Details</h4>
    <p><input placeholder="Client Name" oninput="this.className = ''" name="customerName" ></p>
    <p><input placeholder="Email Address" oninput="this.className = ''" name="rhEmail"  ></p>
    <p><input placeholder="Project/Team" oninput="this.className = ''" name="project"  ></p>
<!-- <label class="checkbox-inline">
  <input type="checkbox" class="shareBox" name="share" id="share" checked> Do you agree that the anonymous results can be used for comparative purposes?

 </label>
 --><p>Do you agree that the anonymous results can be used for comparative purposes?</p>

<input type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" name="share" id="share" data-size="normal" data-onstyle="success"  data-offstyle="danger" checked>
    <p class="mainTextItalic">Note: comparisons are only available if you opt-in to share data</p>


 <p>Do you agree that Red Hat may follow up with you via email after this assessment?</p>

<input type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" name="contact" id="contact" data-size="normal" data-onstyle="success"  data-offstyle="danger" checked>
<br><br>
<p>Please select Country and Line of Business using the drop down lists</p>
<?php putCountries();?>

<?php putLoBs();?>
    
  </div>
  
<?php

function printQuestions($title,$area) {
$string = file_get_contents("questionsV2.json");
$json = json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $string), true );

$i=1;
$qnum = $json[$area]['qnum'];

print '   <h2>' . $title . '</h2><b>' . $json[$area]['overview'] . '</b>
<br><br>
<div class="divTable">
<div class="divTableBody">
<div class="divTableRow">';

while( $i < 4) {
	if($i % 2 == 0){
	print '<div class="dark">';	
	} else {
	print '<div class="divTableCell">';	
	}
#	print '<div class="divTableCell">';
#	$sum = $i . '-summary';
#	print '<p><b>Summary:</b>' . $json[$area][$sum] . '</p>';
   print '<b>Level ' . $i . '</b>'; 
	print '<p>' . $json[$area][$i] . "</p>";
#	if ($json[$type][$area][$i]['description'] != "XXX") {
#		print '<a href="#" title="' . $json[$type][$area][$i]['description'] . '">More Detail</a>';
#	}
	print "</div>";
$i++;
}
print '</div>
</div>';
print '</div>';
print "<hr><h4 class='headerCentered'>Now</h4>";
print '<input data-slider-id="sliderCol" class="slider" type="range" data-slider-value="1"  name="d' . $qnum . '" type="text" data-slider-rangeHighlights=[{ "start": 0, "end": 1, "class": "category1" }, { "start": 1, "end": 2, "class": "category2" }, { "start": 2, "end": 3, "class": "category3" }] />';
print "
<h4 class='headerCentered'>Vision</h4>";
print '<input data-slider-id="sliderCol" class="slider" type="range" data-slider-value="1"  name="o' . $qnum . '" type="text" data-slider-rangeHighlights=[{ "start": 0, "end": 2, "class": "category1" }, { "start": 1, "end": 2, "class": "category2" }, { "start": 2, "end": 3, "class": "category3" }] />';
print "<br>";
print "<h4>Notes</h4>";
print '<textarea form=regForm name="comments_' . $area . '" id="comments_' . $area . ' wrap="soft" rows="2"></textarea>';
};

?>  
  
  <div class="tab">
<?php printQuestions("Transparency","transparency");  ?>
  </div>

  <div class="tab">
<?php printQuestions("Inclusivity","inclusivity");  ?>
  </div>

  <div class="tab">
<?php printQuestions("Adaptability","adaptability");  ?>
  </div>

  <div class="tab">
<?php printQuestions("Collaboration","collaboration");  ?>
  </div>

  <div class="tab">
<?php printQuestions("Community","community");  ?>
  </div>

  <div class="tab">
<h2>Discussion Points</h2>
  <h4> Please add any discussion points or other information here</h4>
<br>
<textarea form=regForm name="comments" id="comments" wrap="soft" rows="20"></textarea>
  </div>

  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtnCJ" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>    
    <span class="step"></span>     
    <span class="step"></span>     
         </div>
</form>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtnCJ").style.display = "none";
  } else {
    document.getElementById("prevBtnCJ").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = true;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
<script type="text/javascript" >
var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
  });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>




  <script>
$(".slider").slider({
    step: 0.5,
    min: 1,
    max: 3,
    value: 1,
    ticks: [1, 1.5, 2, 2.5, 3],

    slide: function(event, ui) {
//        $("input[name=" + $(this).attr("id")).val(ui.value);
        $("input[name=" + $(this).attr("id")).val((ui.value / 10) - 0.1 + 1);
    }
});

  </script>
<div>
<script type="text/javascript" >
 $(document).ready(function()
 {
     // Show tooltip on all <a/> elements with title attributes, but only when
     // clicked. Clicking anywhere else on the document will hide the tooltip
     $('a[title]').qtip({
         show: 'click',
         hide: 'unfocus'
     });
 });
</script>  
  <script>
  $( function() {
    $( "#country" )
      .selectmenu()
      .selectmenu( "menuWidget" )
        .addClass( "overflow" );

    $( "#lob" )
      .selectmenu()
      .selectmenu( "menuWidget" )
        .addClass( "overflow" );

  } );
  </script>
</body>
</html>

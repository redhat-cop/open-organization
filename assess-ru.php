<?php
session_start();
    if(isset($_REQUEST['lang'])) {
        $_SESSION['lang'] = $_REQUEST['lang'];
    }
    $language = (isset($_SESSION['lang']) ? $_SESSION['lang'] : "en");

if (($language != "ru") && ($language != "en")) {
	$language = "en";
	$_SESSION['lang'] = "en";
}

if(!isset($_SESSION['usr_name'])) {
header("Location: login.php");
}
include('functionPutFieldsets.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="content-type" content="text/html;charset=utf-8">
<meta http-equiv="content-language" content="ru">

<link rel="stylesheet" type="text/css" href="https://overpass-30e2.kxcdn.com/overpass.css"/>
<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/jquery.qtip.css" />
<link rel="stylesheet" href="css/bootstrap-slider.css" type="text/css" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
<link href="css/bootstrap-toggle.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=PT+Sans|Roboto+Condensed&display=swap" rel="stylesheet">

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
			<li><a href=assess.php?lang=en>English</a></li>
			<li><a href=assess.php?lang=ru>Pусский</a></li>
				<li><p class="navbar-text">Подписано как <?php echo $_SESSION['usr_name']; ?></p></li>
				<li><a href="passwd.php">Изменить пароль</a></li>
				<li><a href="logout.php">Выйти</a></li>
			</ul>
		</div>
	</div>
</nav>
    <div class="container-fluid">
    

<form id="regForm" action="tmp.php">
  <!-- One "tab" for each step in the form: -->
  <div class="tab">
<h3 class="russian">Добро пожаловать в открытую модель возможностей организации</h3>

<p class="russian2">
Модель возможностей открытой организации - это инструмент для оценки культуры вашей организации.
</p>

<p class="russian2">
Более конкретно, инструмент измеряет относительную степень открытости вашей организации, уделяя особое внимание пяти открытым принципам, изложенным в <a href="https://github.com/open-organization-ambassadors/open-org-definition/blob/master/open_org_definition.md" target=_blank><b>Open Organization Definition</b></a>:
</p>

<ul>
<li class="mainText">Прозрачность</li>
<li class="mainText">Инклюзивность</li>
<li class="mainText">Адаптируемость</li>
<li class="mainText">Сотрудничество</li>
<li class="mainText">Сообщество</li>
</ul>

<p class = "russian2">
В рамках процесса оценки вы узнаете, как отдельные лица, команды и организации могут критически проанализировать свои организационные методы и наметить свой прогресс в становлении более открытой организацией.
</p>

<p class = "russian2">
Этот инструмент основан на <a href="http://www.opensource.com/open-organization/resources/open-org-maturity-model" target=_blank> <b> Open Organization Maturity Model </b> </a>, которое поддерживает сообщество открытых организаций на Opensource.com.
</p>

<p class = "russian2"> Прежде чем начинать эту оценку, помните: все организации разные, поэтому они в разной степени применяют открытые принципы и практики. Таким образом, трехуровневый дизайн этой модели направлен как на то, чтобы помочь организациям определить относительную степень, в которой они действуют открыто, так и на то, чтобы помочь им изучить возможности для достижения большего.
</p>

<p class = "russian2">
<b> Важное примечание. </b> Этот инструмент предназначен для использования в сочетании с управляемой беседой в мастерской. Результаты должны использоваться только в качестве основы для обсуждения в контексте обучения. Этот инструмент никоим образом не является полной или всесторонней оценкой возможностей всей организации.
</p>

  </div>
  <div class="tab"><h4 class="russian2">Данные клиента</h4>
    <p><input placeholder="имя клиента" oninput="this.className = ''" name="customerName" ></p>
    <p><input placeholder="Адрес электронной почты" oninput="this.className = ''" name="rhEmail"  ></p>
    <p><input placeholder="Название команды" oninput="this.className = ''" name="project"  ></p>
<!-- <label class="checkbox-inline">
  <input type="checkbox" class="shareBox" name="share" id="share" checked> Do you agree that the anonymous results can be used for comparative purposes?

 </label>
 --><p class="russian">Согласны ли вы с тем, что анонимные результаты могут использоваться для сравнительных целей?</p>

<input type="checkbox" data-toggle="toggle" data-on="да" data-off="нет" name="share" id="share" data-size="normal" data-onstyle="success"  data-offstyle="danger" checked></input>
    <p class="mainTextItalic"> Примечание. Сравнения доступны только в том случае, если вы разрешите обмениваться данными.</p>


 <p class="russian">Согласны ли вы с тем, что Red Hat может связаться с вами по электронной почте после этой оценки?</p>

<input type="checkbox" data-toggle="toggle" data-on="да" data-off="нет" name="contact" id="contact" data-size="normal" data-onstyle="success"  data-offstyle="danger" checked>
<br><br>
<p class="russian">Пожалуйста, выберите страну и направление деятельности, используя выпадающие списки</p>
<?php putCountries();?>

<?php putLoBs();?>
    
  </div>
  
<?php

function printQuestions($title,$area) {
$string = file_get_contents("questionsV2-ru.json");
$json = json_decode($string, true );

$i=1;
$qnum = $json[$area]['qnum'];

print '   <h2  class="russian">' . $title . '</h2><p class="russian2">' . $json[$area]['overview'] . '</p>
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
   print '<b>Уровень ' . $i . '</b>'; 
	print '<p class="russian2">' . $json[$area][$i] . "</p>";
#	if ($json[$type][$area][$i]['description'] != "XXX") {
#		print '<a href="#" title="' . $json[$type][$area][$i]['description'] . '">More Detail</a>';
#	}
	print "</div>";
$i++;
}
print '</div>
</div>';
print '</div>';
print "<hr><h4 class='headerCentered'>Сейчас</h4>";
print '<input data-slider-id="sliderCol" class="slider" type="range" data-slider-value="1"  name="d' . $qnum . '" type="text" data-slider-rangeHighlights=[{ "start": 0, "end": 1, "class": "category1" }, { "start": 1, "end": 2, "class": "category2" }, { "start": 2, "end": 3, "class": "category3" }] />';
print "
<h4 class='headerCentered'>Будущее</h4>";
print '<input data-slider-id="sliderCol" class="slider" type="range" data-slider-value="1"  name="o' . $qnum . '" type="text" data-slider-rangeHighlights=[{ "start": 0, "end": 2, "class": "category1" }, { "start": 1, "end": 2, "class": "category2" }, { "start": 2, "end": 3, "class": "category3" }] />';
print "<br>";
print "<h4 class=\"russian\">Комментарии</h4>";
print '<textarea form=regForm name="comments_' . $area . '" id="comments_' . $area . ' wrap="soft" rows="2"></textarea>';
};

?>  
  
  <div class="tab">
<?php printQuestions("Транспарентность","transparency");  ?>
  </div>

  <div class="tab">
<?php printQuestions("Вовлечённость","inclusivity");  ?>
  </div>

  <div class="tab">
<?php printQuestions("Приспособляемость","adaptability");  ?>
  </div>

  <div class="tab">
<?php printQuestions("Сотрудничество","collaboration");  ?>
  </div>

  <div class="tab">
<?php printQuestions("Сообщество","community");  ?>
  </div>

  <div class="tab">
<h2 class="russianBig">Вопросы для обсуждения</h2>
  <h4  class="russian">Пожалуйста, добавьте любые вопросы для обсуждения или другую информацию здесь</h4>
<br>
<textarea form=regForm name="comments" id="comments" wrap="soft" rows="20"></textarea>
  </div>

  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtnCJ" class="russian" onclick="nextPrev(-1)">предыдущий</button>
      <button type="button" id="nextBtn"  class="russian" onclick="nextPrev(1)">Next</button>
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
    document.getElementById("nextBtn").innerHTML = "Отправить";
  } else {
    document.getElementById("nextBtn").innerHTML = "следующий";
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

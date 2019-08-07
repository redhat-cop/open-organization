<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
    <script src="js/Chart.bundle.js"></script>
    <script src="js/utils.js"></script>
    <script src="js/raphael-2.1.4.min.js"></script>
    <script src="js/justgage.js"></script>
    <link rel="stylesheet" type="text/css" href="https://overpass-30e2.kxcdn.com/overpass.css"/>
  	 <link rel="stylesheet" href="css/style.css">
    <title>Open Organization Capability Model</title>
<style media="all">

body {
    margin: 5px auto;
    width: 66.6%;
    font-family: 'overpass';
    font-size: 14px;
    color: #444;
    width: 90%;
}

#wrapper {
width: 95%;
background-color: #FFF;
margin-left:auto;
margin-right:auto;
}

header {
height: 30px;
border-bottom: thin solid #000000;
}

#rh-logo img {
    position: absolute;
    top: 2px;
    right: 2px;
    float: right;
}

#content {
float: left;
width: 50%;
}

#docTitle {
    color:black;
    text-align:center;
    padding:5px;
  font-size: 6em;}

@media print {
    h1 {page-break-before: always;}
}

#rightcol {
float: right;
width: 50%;
vertical-align: middle;
}

footer {
clear:both;
height: 50px;
}



.bordered {
    border: solid #ccc 1px;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: 0 1px 1px #ccc; 
    -moz-box-shadow: 0 1px 1px #ccc; 
    box-shadow: 0 1px 1px #ccc;         
}

.bordered tr:hover {
    background: #fbf8e9;
    -o-transition: all 0.1s ease-in-out;
    -webkit-transition: all 0.1s ease-in-out;
    -moz-transition: all 0.1s ease-in-out;
    -ms-transition: all 0.1s ease-in-out;
    transition: all 0.1s ease-in-out;     
}    
    
.bordered td, .bordered th {
    border-left: 1px solid #ccc;
    border-top: 1px solid #ccc;
    padding: 10px;
    text-align: left;    
}

.bordered th {
    background-color: #dce9f9;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#ebf3fc), to(#dce9f9));
    background-image: -webkit-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:    -moz-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:     -ms-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:      -o-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:         linear-gradient(top, #ebf3fc, #dce9f9);
    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset; 
    -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
    box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;        
    border-top: none;
    text-shadow: 0 1px 0 rgba(255,255,255,.5); 
    text-align: center;   
}

.bordered td:first-child, .bordered th:first-child {
    border-left: none;
}

.bordered th:first-child {
    -moz-border-radius: 6px 0 0 0;
    -webkit-border-radius: 6px 0 0 0;
    border-radius: 6px 0 0 0;
}

.bordered th:last-child {
    -moz-border-radius: 0 6px 0 0;
    -webkit-border-radius: 0 6px 0 0;
    border-radius: 0 6px 0 0;
}

.bordered th:only-child{
    -moz-border-radius: 6px 6px 0 0;
    -webkit-border-radius: 6px 6px 0 0;
    border-radius: 6px 6px 0 0;
}

.bordered tr:last-child td:first-child {
    -moz-border-radius: 0 0 0 6px;
    -webkit-border-radius: 0 0 0 6px;
    border-radius: 0 0 0 6px;
}

.bordered tr:last-child td:last-child {
    -moz-border-radius: 0 0 6px 0;
    -webkit-border-radius: 0 0 6px 0;
    border-radius: 0 0 6px 0;
}



/*----------------------*/

.zebra td, .zebra th {
    padding: 10px;
    border-bottom: 1px solid #f2f2f2;    
}

.zebra tbody tr:nth-child(even) {
    background: #f5f5f5;
    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset; 
    -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
    box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;        
}

.zebra th {
    text-align: left;
    text-shadow: 0 1px 0 rgba(255,255,255,.5); 
    border-bottom: 1px solid #ccc;
    background-color: #eee;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#f5f5f5), to(#eee));
    background-image: -webkit-linear-gradient(top, #f5f5f5, #eee);
    background-image:    -moz-linear-gradient(top, #f5f5f5, #eee);
    background-image:     -ms-linear-gradient(top, #f5f5f5, #eee);
    background-image:      -o-linear-gradient(top, #f5f5f5, #eee); 
    background-image:         linear-gradient(top, #f5f5f5, #eee);
}

.zebra th:first-child {
    -moz-border-radius: 6px 0 0 0;
    -webkit-border-radius: 6px 0 0 0;
    border-radius: 6px 0 0 0;  
}

.zebra th:last-child {
    -moz-border-radius: 0 6px 0 0;
    -webkit-border-radius: 0 6px 0 0;
    border-radius: 0 6px 0 0;
}

.zebra th:only-child{
    -moz-border-radius: 6px 6px 0 0;
    -webkit-border-radius: 6px 6px 0 0;
    border-radius: 6px 6px 0 0;
}

.zebra tfoot td {
    border-bottom: 0;
    border-top: 1px solid #fff;
    background-color: #f1f1f1;  
}

.zebra tfoot td:first-child {
    -moz-border-radius: 0 0 0 6px;
    -webkit-border-radius: 0 0 0 6px;
    border-radius: 0 0 0 6px;
}

.zebra tfoot td:last-child {
    -moz-border-radius: 0 0 6px 0;
    -webkit-border-radius: 0 0 6px 0;
    border-radius: 0 0 6px 0;
}

.zebra tfoot td:only-child{
    -moz-border-radius: 0 0 6px 6px;
    -webkit-border-radius: 0 0 6px 6px
    border-radius: 0 0 6px 6px
}
  
</style>


  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#analysis-dialog" ).dialog({
      autoOpen: true,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "drop",
        duration: 1000
      },
      minWidth: 1000
    });
 
    $( "#analysis-opener" ).on( "click", function() {
      $( "#analysis-dialog" ).dialog( "open" );
    });
  } );
  </script>

  <script>
  $( function() {
    $( "#workshop-dialog" ).dialog({
      autoOpen: true,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "drop",
        duration: 1000
      },
      minWidth: 400
    });
 
    $("#workshop-opener" ).on( "click", function() {
      $("#workshop-dialog" ).dialog( "open" );
    });

  } );
  </script>

  <script>
  $( function() {
    $( "#priorities-dialog" ).dialog({
      autoOpen: true,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "drop",
        duration: 1000
      },
      minWidth: 800
    });
 
    $("#priorities-opener" ).on( "click", function() {
      $("#priorities-dialog" ).dialog( "open" );
    });

  } );
  </script>

  <script>
  $( function() {
    $( "#average-dialog-dev" ).dialog({
      autoOpen: true,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "drop",
        duration: 1000
      },
      minWidth: 1000
    });
 
    $( "#average-opener-dev" ).on( "click", function() {
      $( "#average-dialog-dev" ).dialog( "open" );
    });
  } );
  </script>

  <script>
  $( function() {
    $( "#average-dialog-ops" ).dialog({
      autoOpen: true,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "drop",
        duration: 1000
      },
      minWidth: 1000
    });
 
    $( "#average-opener-ops" ).on( "click", function() {
      $( "#average-dialog-ops" ).dialog( "open" );
    });
  } );
  </script>

</head>

<body>
<?php
## Connect to the Database 
include 'dbconnect.php';
connectDB();
$hash = $_REQUEST['hash'];
$qq = "SELECT * FROM open_data WHERE hash='".mysqli_real_escape_string($db, $hash)."'";
$res = mysqli_query($db, $qq);
$data_array = mysqli_fetch_assoc($res);

$ops_arr = $dev_arr = array();

foreach( $data_array as $var => $value )
    {
    	if($var=='date') continue;
      if(substr($var[0],0,1) == "o") { $ops_arr[]=$value; };
      if(substr($var[0],0,1) == "d") { $dev_arr[]=$value;};
    }

function getRating($num) {
$roundedNum = round($num,0);
#print "Rounded: $roundedNum <br>";
switch ($roundedNum) {
	case "1":
		$rating = "Conventional";
		$ratingRank = "<b>Conventional</b>: ";
#		$ratingDescription = $ratingRank . "Governance practices are either non-existent or in the very early stages of development";
		break;
	case "2":
		$rating = "Modern";
		$ratingRank = "<b>Modern</b>: ";
#		$ratingDescription = $ratingRank . "Potential shortfalls in governance practices have been identified and initial steps have been taken to rectify them. There is significant room for improvement.";
		break;
	case "3":
		$rating = "Leading";
		$ratingRank = "<b>Leading</b>: ";
#		$ratingDescription = $ratingRank . "The minimum governance practices are in place. There is still room for improvement.";
		break;
}
return $rating;
}
?>

<center>
<img src="images/docHeader.png" alt="">
<br><br><br>

<p class="bigText">Open Organization Capability Model</p>
<h2>Client Recommendations Document</h2>
<h3>Prepared for <?php echo $data_array['client']; ?></h3>
<h4>Date: <?php echo date('l jS \of F Y') ?></h4>

</center>
<p>Thank you very much for taking part in an Open Organization Capability Model.  This document provides a high level overview of the assessment and some possible next steps for <?php echo $data_array['client']; ?>.
</p>

<h4>Originator</h4>

<p>Red Hat Consulting</p>

<h4>Disclaimer</h4>

<p>This document is not a quote, and does not represent an official Statement of Work.  If acceptable, a formal quote can be issued, which will include a contract with the scope of work, cost, and any Client requirements if necessary.</p>

<!-- start of table of contents -->
<div id="toc_container">
<p class="toc_title">Table of Contents</p>
<ul class="toc_list">
<li><a href="#Ready_to_Innovate_Overview">1. Open Organization Overview</li>
<li><a href="#RTI_Output_Summary">2. Output Summary</a>
<li><a href="#Breakdown_of_Assessment">3. Breakdown of Assessment</a></li>
<li><a href="#Overview_of_all_Levels">4. Overview of all Levels</a></li>
<li><a href="#Comments">5. Comments</a></li>
<li><a href="#Comparison_with_others">6. Comparison with others</a></li>
<ul>
<li><a href="#Development">6.1 Current</a></li>
<li><a href="#Operations">6.2 Vision</a></li>

</ul>
<li><a href="#Red_Hat_Universal_Discovery_Session">7. Red Hat Universal Discovery Session</a></li>
</ul>
</div>
<!-- end of table of contents -->

<!-- Start of overview stuff -->
<h1 id="Ready_to_Innovate_Overview">Open Organization - Overview</h1>
<p>
Before embarking on a digital transformation initiative, customers need to know where they currently stand before deciding where they want to be regarding the predominant culture within the organization.
</p>
<p>
The Open Organization Assessment is a 45 minute assessment answering questions to evaluate the current maturity of an organization around 5 key areas.  These areas are: 
<br>
</p>
		<p class="centeredBoldText">
		<b>Transparency</b>		
		</p>
		<p class="leftText">
		In organizations that aren't open, transparency is rare. Individuals and teams do not regularly disclose their plans, products, or processes to multiple stakeholders. People affected by decisions are often surprised to learn about those decisions, and decision-makers often withhold data and resources without explanation. Locating and accessing potentially helpful resources can be difficult, in part because individuals and teams neither contribute to nor draw upon a shared repository of knowledge.		
		</p>		<p class="centeredBoldText">
		<b>Inclusivity</b>	
		</p>
		<p class="leftText">
		In organizations that aren't open, people lack established channels for providing feedback or learning about projects and activities. Leaders and project teams do not actively solicit diverse perspectives in their work or think broadly about involving stakeholders of different backgrounds. People do not expect decision making to be an inclusive activity, so the organization does not actively promote a process for collective or collaborative decision-making. Instead, leaders make decisions without much input from others, and people are accustomed to receiving direction without any opportunity to provide input.		
		</p>
		<p class="centeredBoldText">
		<b>Adaptability</b>		
		</p>
		<p class="leftText">
In organizations that aren't open, responding to environmental conditions is difficult because centralized systems inhibit responsiveness and flexibility. Decision-making cannot keep pace with complex and shifting contexts. Information flows in predefined, linear, and often hierarchical directions, and power is centralized. As a result, people have difficulty sharing materials and providing valuable responses that could rapidly improve projects. They lack opportunities for empowerment, continuous learning, and the ability to engage in the kind of collective problem solving that produces innovative, nuanced solutions. People are afraid to fail because the organization discourages experimentation.		
		</p>
		<p class="centeredBoldText">
		<b>Collaboration</b>		
		</p>	
		<p class="leftText">
In organizations that aren't open, people tend to share the work they do only when asked for it. Conversations and joint efforts across departmental boundaries are difficult, even discouraged. As a result, projects move more slowly than they otherwise could. Work gets duplicated unnecessarily across teams working toward similar goals, and project outcomes do not reflect the best possible results. People are not aware of the ways that work from other groups can enhance their own efforts, and they tend to let predetermined descriptions of their responsibilities dictate the work they do.		
		</p>
		<p class="centeredBoldText">
		<b>Community</b>		
		</p>		
		<p class="leftText">
In organizations that aren't open, people tend to act primarily in the service of individual and team goals. Because people don't often share their work and may use different languages to interpret the organization's mission, teams often have difficulty aligning their work with a common purpose. As a result, duplicate work becomes common and stakeholder buy-in decreases (because people can't always determine who those stakeholders are). Consequently, people may begin to feel disassociated with the organization as a whole, leading to attrition.		
		</p>



		
<p>
The output in this document shows the current maturity level, along with recommendations and next steps for <?php echo $data_array['client']; ?>.
</p>


<!-- End of RTI overview stuff -->




<h1 id="RTI_Output_Summary">Open Organization Output Summary</h1>
<p>The spider chart below shows the levels attained by <?php echo $data_array['client']; ?> during the Open Organization Assessment:


<?php  
date_default_timezone_set("Europe/London");
 ?>

     

    <div style="width:50%;">
    <center>
        <canvas id="canvas"></canvas>
        </center>
    </div>
        <script>
        
function getQueryVariable(variable)
{
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return decodeURI(pair[1]);}
       }
       return(false);
}    

    var customerName = '<?php echo $data_array['client'] ?>'
    var customerNameNoSpaces = customerName.replace(/\s+/, "");


function checkVal(inNo) {
	if (inNo == "0") {
		var outNo = "0.01";
	} else {
	   var outNo = inNo;	
	}
	return outNo
}

    var d1 = checkVal(<?php echo $data_array['d1']; ?>)
    var d2 = checkVal(<?php echo $data_array['d2']; ?>)
    var d3 = checkVal(<?php echo $data_array['d3']; ?>)
    var d4 = checkVal(<?php echo $data_array['d4']; ?>)
    var d5 = checkVal(<?php echo $data_array['d5']; ?>)
    
    var totalDev = d1 + d2 + d3 + d4 + d5

    var o1 = checkVal(<?php echo $data_array['o1']; ?>)
    var o2 = checkVal(<?php echo $data_array['o2']; ?>)
    var o3 = checkVal(<?php echo $data_array['o3']; ?>)
    var o4 = checkVal(<?php echo $data_array['o4']; ?>)
    var o5 = checkVal(<?php echo $data_array['o5']; ?>)

    var totalOps = o1 + o2 + o3 + o4 + o5

    var chartTitle = "Open Culture Chart - " + customerName

    
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 4);
    };

    var color = Chart.helpers.color;
    var config = {
        type: 'radar',
        data: {
            labels: ["Transparency", "Inclusivity", "Adaptability", "Collaboration", "Community"],
            datasets: [{
                label: "Dev",
                backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
                borderColor: window.chartColors.red,
                pointBackgroundColor: window.chartColors.red,
                data: [d1,d2,d3,d4,d5]
            }, {
                label: "Ops",
                backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
                borderColor: window.chartColors.blue,
                pointBackgroundColor: window.chartColors.blue,
                data: [o1,o2,o3,o4,o5]

            },]
        },
        options: {
            legend: {
                position: 'bottom',
            },
            title: {
                display: true,
                text: chartTitle
            },
            scale: {
            
              ticks: {
                beginAtZero: true,
                max: 3,
                min: 0
              }
            },

    }
 }
    window.onload = function() {
        window.myRadar = new Chart(document.getElementById("canvas"), config);

var ctx = document.getElementById("myChartDev").getContext("2d");
var data = {
  labels: ["Transparency", "Inclusivity", "Adaptability", "Collaboration", "Community"],
  datasets: [{
    label: customerName,
    backgroundColor: "rgba(53, 177, 94, 1)",
    data: [d1, d2, d3, d4, d5]
  }, {
    label: "Average",
    backgroundColor: "rgba(177, 177, 53, 1)",
    data: <?php 
    $qq = "select ROUND(avg(d1),2) as d1, ROUND(avg(d2),2) as d2, ROUND(avg(d3),2) as d3, ROUND(avg(d4),2) as d4, ROUND(avg(d5),2) as d5 from open_data;";    
    $res = mysqli_query($GLOBALS["___mysqli_ston"], $qq);
    $row = mysqli_fetch_array($res);
     echo "[" . $row[0] . "," . $row[1] . "," . $row[2] . "," . $row[3] . "," . $row[4] . "]"; 
     ?>
  },
  ]
};

var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: data,
  options: {
    barValueSpacing: 20,
    scales: {
      yAxes: [{
        ticks: {
          min: 0,
          max: 5
        }
      }]
    },
 
                title: {
            display: true,
            text: 'Comparison to Others (Development)'
        }
  }
});  		

var ctx2 = document.getElementById("myChartOps").getContext("2d");
var dataOps = {
  labels: ["Transparency", "Inclusivity", "Adaptability", "Collaboration", "Community"],
    datasets: [{
    label: customerName,
    backgroundColor: "rgba(53, 177, 94, 1)",
    data: [o1, o2, o3, o4, o5]
  }, {
    label: "Average",
    backgroundColor: "rgba(177, 177, 53, 1)",
    data: <?php 
    #$qq = "select avg(o1) as d1,avg(o2) as d2, avg(o3) as d3, avg(o4) as d4, avg(o5) as d5 from data;";    
    #$qq = "select ROUND(avg(o1),2) as o1, ROUND(avg(o2),2) as o2, ROUND(avg(o3),2) as o3, ROUND(avg(o4),2) as o4, ROUND(avg(o5),2) as o5 from data;";    
    $res = mysqli_query($GLOBALS["___mysqli_ston"], $qq);
    $row = mysqli_fetch_array($res);    
     echo "[" . $row[0] . "," . $row[1] . "," . $row[2] . "," . $row[3] . "," . $row[4] . "]"; 
     ?>
  },
  ]
};

var myBarChart2 = new Chart(ctx2, {
  type: 'bar',
  data: dataOps,
  options: {
    barValueSpacing: 20,
    scales: {
      yAxes: [{
        ticks: {
          min: 0,
          max: 5
        }
      }]
    },

                        title: {
            display: true,
            text: 'Comparison to Others (Operations)'
        }

  }
});  				
  		
};
             


    var colorNames = Object.keys(window.chartColors);
    </script>

</div>
<br><br>
<h3 class="centeredText">Overall Capability Model</h3>


<?php
## Get an overall score by adding them all up
$totalScore = 0;

for($i = 1; $i < 6; $i++) {
$totalScore += $data_array["d$i"];
$totalScore += $data_array["o$i"];
}
print '<table class="bordered">
<thead>
<th>Rating</th>
<th>Level</th>
</thead>
<tbody>
<tr><td><b>' . $totalScore/10 . ' out of 3</b></td><td class="' . strtolower(getRating($totalScore/10)) . '">' . getRating($totalScore/10) . '</td>
</tr>
</tbody>
</table>';
#print "Total score: " . $totalScore/10;
?>
<!-- Start of gauges -->
<h1 id="Breakdown_of_Assessment">Breakdown of Assessment</h1>
<p>
From completing the assessment question, the maturity of the development and operations teams is indicated by a score out of 5 for each area: Transparency, Inclusivity, Adaptability, Collaboration and Community.
</p>
The levels for each topic are:

<table class="bordered">
<thead>
<th class="leftText">
Rating
</th>
<th class="leftText">
Level
</th>
</thead>
<tbody>
<tr>
	<td>
	1
	</td>
	<td class="conventional">
	Conventional
	</td>
</tr>
<tr>
	<td>
	2
	</td>
	<td class="modern">
	Modern
	</td>
</tr>
<tr>
	<td>
	3
	</td>
	<td class="leading">
	Leading
	</td>
</tr>
\</tbody>
</table>
  <table class="bordered">
    <thead>
    <tr>
        <th>Area</th>        
        <th>Current Rating</th>
        <th>Aspiration Rating</th>
    </tr>
    </thead>
	<tbody> 
	<br>
<?php


function printGauge($areaName,$num,$chartName,$arr) {
print '<tr><td><b>' . $areaName . '</b></td><td>
<div id="' . $chartName . 'Dev" style="height:80px; margin: auto;"></div>
	<p class="' . strtolower(getRating($arr["d$num"])) . '">' . getRating($arr["d$num"]) . '</p>
</td>
<td><div id="' . $chartName . 'Ops" style="height:80px; margin: auto;"></div>
	<p class=" ' . strtolower(getRating($arr["o$num"])) . '">' . getRating($arr["o$num"]) . '</p>
</td>
</tr>';
}

printGauge("Transparency","1","transparency",$data_array);
printGauge("Inclusivity","2","inclusivity",$data_array);
printGauge("Adaptability","3","adaptability",$data_array);
printGauge("Collaboration","4","collaboration",$data_array);
printGauge("Community","5","community",$data_array);


?>

</tbody>
</table>	
<!-- end of gauges -->

<h1 class="Overview_of_all_Levels">Overview of all Levels</h1>
The 5 levels for each topic are shown below.
<br>
<?php
function printQuestions($title,$area) {
$string = file_get_contents("questionsV2.json");
#$json = json_decode($string, true);
$json = json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $string), true );
$i=1;
$qnum = $json[$area]['qnum'];
print '<div class="floatingImage"></div>';
#print '<h2 class="centeredBoldText"><img src="images/' . $area . '.png">' . $title . '</h2>
print '<h2 class="centeredBoldText">' . $title . '</h2>
<div class="divTable" id="zebra">
<div class="divTableBody">
<div class="divTableRow">';



while( $i < 4) {	
	if($i % 2 == 0){
	print '<div class="divTableCell">';	
	} else {
	print '<div class="dark">';	
	}
   print '<b>Level ' . $i . '</b>'; 
	print '<p>' . $json[$area][$i] . "</p>";
	print "</div>";
$i++;
}
print '</div>
</div>';
print '</div><br>';
};
printQuestions("Transparency","transparency");
printQuestions("Inclusivity","inclusivity"); 
print "<h1>Overview of all Levels (Cont.)</h1>";
printQuestions("Adaptability","adaptability");

printQuestions("Collaboration","collaboration");
print "<h1>Overview of all Levels (Cont.)</h1>";
printQuestions("Community","community");
?>


<h1></h1>
<!-- Start of comments -->
<h2 id="Comments">Comments</h2>
<p>
If any comments were added during the assessment, they are shown below.
</p>
  <table class="bordered">
    <thead>
    <tr>
        <th>Area</th>        
        <th>Comments</th>
    </tr>
    </thead>
	<tbody> 
<?php

print "<tr><td>General Comments</td>";
print "<td>" . $data_array['comments'] . "</td></tr>";

## Fudge here as can't seem to get it in a loop ... dodgy code alert!
print "<tr><td>Transparency</td>";
print "<td>" . $data_array['comments_transparency'] . "</td></tr>";

print "<tr><td>Inclusivity</td>";
print "<td>" . $data_array['comments_inclusivity'] . "</td></tr>";

print "<tr><td>Adaptability</td>";
print "<td>" . $data_array['comments_adaptability'] . "</td></tr>";

print "<tr><td>Collaboration</td>";
print "<td>" . $data_array['comments_collaboration'] . "</td></tr>";

print "<tr><td>Community</td>";
print "<td>" . $data_array['comments_community'] . "</td></tr>";
#}
?>     
</tbody>
</table>
<!-- end of comments -->

<!-- Start of comparison -->
<h1 id="Comparison_with_others">Comparison with others</h1>
<p>
The charts below show how the development and operations teams at <?php echo $data_array['client']; ?> compare to other organizations who have taken the Ready To Innovate assessment
</p>
<h2 id="Development">Current</h2>
<canvas id="myChartDev"></canvas>
<h1></h1>
<h2 id="Operations">Vision</h2>
<canvas id="myChartOps"></canvas>
<!-- end of comparison -->

</div>
<!-- end of main content div -->
<!-- end of wrapper div -->


<script>
  var g = new JustGage({
    id: "transparencyDev",
    value: <?php print $data_array['d1'] . "\n"; ?>,
    min: 0,
    max: 3,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        customSectors: [{
          color: "#ff0000",
          lo: 0,
          hi: 2
        },
        {
          color: "#ffbf00",
          lo: 2.1,
          hi: 3.0
        }, {
          color: "#00ff00",
          lo: 3.1,
          hi: 5
        }],
        counter: true    
  });
</script>
<script>
  var g = new JustGage({
    id: "transparencyOps",
    value: <?php print $data_array['o1'] . "\n"; ?>,
    min: 0,
    max: 3,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        customSectors: [{
          color: "#ff0000",
          lo: 0,
          hi: 2
        },
        {
          color: "#ffbf00",
          lo: 2.1,
          hi: 3.0
        }, {
          color: "#00ff00",
          lo: 3.1,
          hi: 5
        }],
        counter: true    
  });
</script>
<script>
  var g = new JustGage({
    id: "inclusivityOps",
    value: <?php print $data_array['o2'] . "\n"; ?>,
    min: 0,
    max: 3,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        customSectors: [{
          color: "#ff0000",
          lo: 0,
          hi: 2
        },
        {
          color: "#ffbf00",
          lo: 2.1,
          hi: 3.0
        }, {
          color: "#00ff00",
          lo: 3.1,
          hi: 5
        }],
        counter: true    
  });
</script>
<script>
  var g = new JustGage({
    id: "inclusivityDev",
    value: <?php print $data_array['d2'] . "\n"; ?>,
    min: 0,
    max: 3,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        customSectors: [{
          color: "#ff0000",
          lo: 0,
          hi: 2
        },
        {
          color: "#ffbf00",
          lo: 2.1,
          hi: 3.0
        }, {
          color: "#00ff00",
          lo: 3.1,
          hi: 5
        }],
        counter: true    
  });
</script>


<script>
  var g = new JustGage({
    id: "adaptabilityOps",
    value: <?php print $data_array['o3'] . "\n"; ?>,
    min: 0,
    max: 3,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        customSectors: [{
          color: "#ff0000",
          lo: 0,
          hi: 2
        },
        {
          color: "#ffbf00",
          lo: 2.1,
          hi: 3.0
        }, {
          color: "#00ff00",
          lo: 3.1,
          hi: 5
        }],
        counter: true    
  });
</script>
<script>
  var g = new JustGage({
    id: "adaptabilityDev",
    value: <?php print $data_array['d3'] . "\n"; ?>,
    min: 0,
    max: 3,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        customSectors: [{
          color: "#ff0000",
          lo: 0,
          hi: 2
        },
        {
          color: "#ffbf00",
          lo: 2.1,
          hi: 3.0
        }, {
          color: "#00ff00",
          lo: 3.1,
          hi: 5
        }],
        counter: true    
  });
</script>

<script>
  var g = new JustGage({
    id: "collaborationDev",
    value: <?php print $data_array['d4'] . "\n"; ?>,
    min: 0,
    max: 3,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        customSectors: [{
          color: "#ff0000",
          lo: 0,
          hi: 2
        },
        {
          color: "#ffbf00",
          lo: 2.1,
          hi: 3.0
        }, {
          color: "#00ff00",
          lo: 3.1,
          hi: 5
        }],
        counter: true    
  });
</script>
<script>
  var g = new JustGage({
    id: "collaborationOps",
    value: <?php print $data_array['o4'] . "\n"; ?>,
    min: 0,
    max: 3,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        customSectors: [{
          color: "#ff0000",
          lo: 0,
          hi: 2
        },
        {
          color: "#ffbf00",
          lo: 2.1,
          hi: 3.0
        }, {
          color: "#00ff00",
          lo: 3.1,
          hi: 5
        }],
        counter: true    
  });
</script>
<script>
  var g = new JustGage({
    id: "communityOps",
    value: <?php print $data_array['o5'] . "\n"; ?>,
    min: 0,
    max: 3,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        customSectors: [{
          color: "#ff0000",
          lo: 0,
          hi: 2
        },
        {
          color: "#ffbf00",
          lo: 2.1,
          hi: 3.0
        }, {
          color: "#00ff00",
          lo: 3.1,
          hi: 5
        }],
        counter: true    
  });
</script>
<script>
  var g = new JustGage({
    id: "communityDev",
    value: <?php print $data_array['d5'] . "\n"; ?>,
    min: 0,
    max: 3,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        customSectors: [{
          color: "#ff0000",
          lo: 0,
          hi: 2
        },
        {
          color: "#ffbf00",
          lo: 2.1,
          hi: 3.0
        }, {
          color: "#00ff00",
          lo: 3.1,
          hi: 5
        }],
        counter: true    
  });
</script>

</body>
</html>

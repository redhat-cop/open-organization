<!DOCTYPE html>
<html>
<?php
date_default_timezone_set("Europe/London");
## Connect to the Database 
include 'dbconnect.php';
connectDB();

# Retrieve the data
$hash = $_REQUEST['hash'];
$qq = "SELECT * FROM open_data WHERE hash='".mysqli_real_escape_string($db, $hash)."'";
$res = mysqli_query($db, $qq);
$data_array = mysqli_fetch_assoc($res);

if (empty($data_array)) {
print "<h2> Results not found </h2>";
exit;
}
$ops_arr = $dev_arr = $opsRound_arr = $devRound_arr = array();
$share = $data_array['share'];
$lob = $data_array['lob'];

function getRating($num) {
$roundedNum = round($num,0);
switch ($roundedNum) {
	case "1":
		$rating = "общепринятый";
		$ratingRank = "<b>общепринятый</b>: ";
		break;
	case "2":
		$rating = "Современный";
		$ratingRank = "<b>Современный</b>: ";
		break;
	case "3":
		$rating = "Лидеры";
		$ratingRank = "<b>Лидеры</b>: ";
		break;
}
return $rating;
}

$string = file_get_contents("questionsV2.json");
$json = json_decode($string, true);

$string2 = file_get_contents("comments.json");
$comments = json_decode($string2, true);
?>
<head>
    <script src="js/Chart.bundle.js"></script>
    <script src="js/utils.js"></script>
    <script src="js/raphael-2.1.4.min.js"></script>
    <script src="js/justgage.js"></script>
    <title>Open Organization Capability Model</title>
<link rel="stylesheet" type="text/css" href="https://overpass-30e2.kxcdn.com/overpass.css"/>
    <link href="http://static.jboss.org/css/rhbar.css" media="screen" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    
	 <link rel="stylesheet" href="css/style.css">

  <script>
  $( function() {
    $( "#analysis-dialog" ).dialog({
      autoOpen: false,
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
      autoOpen: false,
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
      autoOpen: false,
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
      autoOpen: false,
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
    $( "#average-dialog-dev-lob" ).dialog({
      autoOpen: false,
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
 
    $( "#average-opener-dev-lob" ).on( "click", function() {
      $( "#average-dialog-dev-lob" ).dialog( "open" );
    });
  } );
  </script>

  <script>
  $( function() {
    $( "#average-dialog-ops-lob" ).dialog({
      autoOpen: false,
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
 
    $( "#average-opener-ops-lob" ).on( "click", function() {
      $( "#average-dialog-ops-lob" ).dialog( "open" );
    });
  } );
  </script>

  <script>
  $( function() {
    $( "#average-dialog-ops" ).dialog({
      autoOpen: false,
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

 

<script>
$(document).ready(function() {
  $(function() {
    console.log('false');
    $( "#dialog" ).dialog({
        autoOpen: false,
        title: 'Email PDF'
    });
  });

  $("button").click(function(){
    console.log("click");
//        $(this).hide();
        $( "#dialog" ).dialog('open');
    });
}); 
</script>

</head>

<body>
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
<?php  

foreach( $data_array as $var => $value )
    {
    	if($var=='date') continue;
      if(substr($var[0],0,1) == "o") { $ops_arr[]=$value; $opsRound_arr[] = round($value);  };
      if(substr($var[0],0,1) == "d") { $dev_arr[]=$value; $devRound_arr[] = round($value);  };
    } 
     
 ?>
      <div id="wrapper">
      <header>

      <center>
      <h2>Open Organization Capability Model for <?php echo $data_array['client']; 
		if ($data_array['project'] != "") {
			print " (" . $data_array['project'] . ")";		
		}      
      ?></h2>
      </center>
      </header>
      
<div id="content">       
    <div style="width:90%">
        <canvas id="canvas"></canvas>
    </div>
        <script>

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

    var d1 = checkVal(<?php echo $data_array['d1'] ?>)
    var d2 = checkVal(<?php echo $data_array['d2'] ?>)
    var d3 = checkVal(<?php echo $data_array['d3'] ?>)
    var d4 = checkVal(<?php echo $data_array['d4'] ?>)
    var d5 = checkVal(<?php echo $data_array['d5'] ?>)
    
    var totalDev = d1 + d2 + d3 + d4 + d5

    var o1 = checkVal(<?php echo $data_array['o1'] ?>)
    var o2 = checkVal(<?php echo $data_array['o2'] ?>)
    var o3 = checkVal(<?php echo $data_array['o3'] ?>)
    var o4 = checkVal(<?php echo $data_array['o4'] ?>)
    var o5 = checkVal(<?php echo $data_array['o5'] ?>)

    var totalOps = o1 + o2 + o3 + o4 + o5

    var chartTitle = "Capability Model Chart - " + customerName
    var overall1 = (d1+o1)/2;
    var overall2 = (d2+o2)/2;
    var overall3 = (d3+o3)/2;
    var overall4 = (d4+o4)/2;
    var overall5 = (d5+o5)/2;
    
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 4);
    };

    var color = Chart.helpers.color;
    var config = {
        type: 'radar',
        data: {
//            labels: ["Transparency", "Inclusivity", "Adaptability", "Collaboration", "Community"],
            labels:  ["Прозрачность", "Инклюзивность", "Адаптивность", "Сотрудничество", "Сообщество"],
            datasets: [{
                label: "Now",
                backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
                borderColor: window.chartColors.red,
                pointBackgroundColor: window.chartColors.red,
                data: [d1,d2,d3,d4,d5]
            }, {
                label: "Vision",
                backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
                borderColor: window.chartColors.blue,
                pointBackgroundColor: window.chartColors.blue,
                data: [o1,o2,o3,o4,o5]

            }]
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
    backgroundColor: 'green',
    data: [d1, d2, d3, d4, d5]
  }, {
    label: "Average",
    backgroundColor: "orange",
    data: <?php 
    $qq = "select ROUND(avg(d1),2) as d1, ROUND(avg(d2),2) as d2, ROUND(avg(d3),2) as d3, ROUND(avg(d4),2) as d4, ROUND(avg(d5),2) as d5 from open_data where share ='on';";    
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

  }
});  		

var ctxLobDev = document.getElementById("myChartDevLob").getContext("2d");
var data = {
  labels: ["Transparency", "Inclusivity", "Adaptability", "Collaboration", "Community"],
  datasets: [{
    label: customerName,
    backgroundColor: 'green',
    data: [d1, d2, d3, d4, d5]
  }, {
    label: "Average",
    backgroundColor: "orange",
    data: <?php 
    $qq = "select ROUND(avg(d1),2) as d1, ROUND(avg(d2),2) as d2, ROUND(avg(d3),2) as d3, ROUND(avg(d4),2) as d4, ROUND(avg(d5),2) as d5 from open_data where share ='on' and lob = '" . $lob . "';";    
    $res = mysqli_query($GLOBALS["___mysqli_ston"], $qq);
    $row = mysqli_fetch_array($res);
     echo "[" . $row[0] . "," . $row[1] . "," . $row[2] . "," . $row[3] . "," . $row[4] . "]"; 
     ?>
  },
  ]
};

var myBarChart = new Chart(ctxLobDev, {
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

  }
});  	

var ctxLobOps = document.getElementById("myChartDevOps").getContext("2d");
var data = {
  labels: ["Transparency", "Inclusivity", "Adaptability", "Collaboration", "Community"],
  datasets: [{
    label: customerName,
    backgroundColor: 'green',
    data: [d1, d2, d3, d4, d5]
  }, {
    label: "Average",
    backgroundColor: "orange",
    data: <?php 
    $qq = "select ROUND(avg(o1),2) as o1, ROUND(avg(o2),2) as o2, ROUND(avg(o3),2) as o3, ROUND(avg(o4),2) as o4, ROUND(avg(o5),2) as o5 from open_data where share ='on' and lob = '" . $lob . "';";    
    $res = mysqli_query($GLOBALS["___mysqli_ston"], $qq);
    $row = mysqli_fetch_array($res);
     echo "[" . $row[0] . "," . $row[1] . "," . $row[2] . "," . $row[3] . "," . $row[4] . "]"; 
     ?>
  },
  ]
};

var myBarChart = new Chart(ctxLobOps, {
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

  }
});  	

var ctx2 = document.getElementById("myChartOps").getContext("2d");
var dataOps = {
            labels: ["Transparency", "Inclusivity", "Adaptability", "Collaboration", "Community"], 
  datasets: [{
    label: customerName,
    backgroundColor: 'green',
    data: [o1, o2, o3, o4, o5]
  }, {
    label: "Average",
    backgroundColor: "orange",
    data: <?php 
#    $qq = "select avg(o1) as d1,avg(o2) as d2, avg(o3) as d3, avg(o4) as d4, avg(o5) as d5 from data;";    
    $qq = "select ROUND(avg(o1),2) as o1, ROUND(avg(o2),2) as o2, ROUND(avg(o3),2) as o3, ROUND(avg(o4),2) as o4, ROUND(avg(o5),2) as o5 from open_data where share ='on';";    
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

  }
});  				
  		
};
             


    var colorNames = Object.keys(window.chartColors);
    </script>
<?php print '<br>
<a target=_blank href=resultsOpen.php?hash=' . $hash . '><p class=centeredDiv>Detailed Version</p></a>'; 
?>    
</div>

<div id="rightcol">


<div id="tabs">
  <ul>
    <li><a href="#tabs-1" class="russian2">обзор</a></li>
    <li><a href="#tabs-4" class="russian2">Комментарии</a></li>  
    <li><a href="#tabs-5" class="russian2">Сравнения</a></li>  </ul>
      <div id="tabs-1">
  <table class="bordered">
    <thead>
    <tr>
        <th>Area</th>        
        <th>Now</th>
        <th>Vision</th>
    </tr>
    </thead>
	<tbody> 

<?php
$areas = array(
	1 => "Transparency",
	2 => "Inclusivity",
	3 => "Adaptability",
	4 => "Collaboration",
	5 => "Community"
);

function printGauge($areaName,$num,$chartName,$arr) {
print '<tr><td><b class="russian2">' . $areaName . '</b></td><td><div id="' . $chartName . 'Dev" style="width:100px; height:80px"></div><p class="' . strtolower(getRating($arr["d$num"])) . '">' . getRating($arr["d$num"]) . '</p></td>
<td><div id="' . $chartName . 'Ops" style="width:100px; height:80px"></div><p class=" ' . strtolower(getRating($arr["o$num"])) . '">' . getRating($arr["o$num"]) . '</p></td></tr>';
}

printGauge("Транспарентность","1","automation",$data_array);
printGauge("Вовлечённость","2","wow",$data_array);
printGauge("Приспособляемость","3","arch",$data_array);
printGauge("Сотрудничество","4","vision",$data_array);
printGauge("Сообщество","5","env",$data_array);

function getActions($areaName,$type,$num,$comments){
$actionField = round($num) . "-action";
print $comments[$areaName][$type][$actionField];

}

?>

</tbody>
</table>	

	<!-- End of Tab1 Div -->    
      </div>
      
<!--       <div id="tabs-2">
  <table class="bordered">
    <thead>
    <tr>
        <th>Area</th>        
        <th>Action</th>
    </tr>
    </thead>
	<tbody> 
	<tr>
		<td>Transparency</td>
		<td><?php #getActions("Transparency","development",$data_array['d1'],$comments); ?>
		</td>

	</tr>
	<tr>
		<td>Inclusivity</td>
		<td><?php #getActions("Inclusivity","development",$data_array['d2'],$comments); ?>
		</td>

	</tr>
	<tr>
		<td>Adaptability</td>
		<td><?php #getActions("Adaptability","development",$data_array['d3'],$comments); ?>
		</td>

	</tr>
	<tr>
		<td>Collaboration</td>
		<td><?php #getActions("Collaboration","development",$data_array['d4'],$comments); ?>
		</td>

	</tr>
	<tr>
		<td>Community</td>
		<td><?php #getActions("Community","development",$data_array['d5'],$comments); ?>
		</td>

	</tr>
	</tbody>
	</table>
      </div> -->


      <div id="tabs-4">
<h4 class="russian2">Примечания и комментарии</h4>
<?php
if ($data_array['comments'] != "") {
print "<p>" . $data_array['comments'] . "</p>";
}


## Fudge here as can't seem to get it in a loop ... dodgy code alert!
if ($data_array['comments_transparency'] != "") {
print "<h4>Transparency</h4>";
print "<p>" . $data_array['comments_transparency'] . "</p>";
}

if ($data_array['comments_inclusivity'] != "") {
print "<h4>Inclusivity</h4>";
print "<p>" . $data_array['comments_inclusivity'] . "</p>";
}

if ($data_array['comments_adaptability'] != "") {
print "<h4>Adaptability</h4>";
print "<p>" . $data_array['comments_adaptability'] . "</p>";
}

if ($data_array['comments_collaboration'] != "") {
print "<h4>Collaboration</h4>";
print "<p>" . $data_array['comments_collaboration'] . "</p>";
}

if ($data_array['comments_community'] != "") {
print "<h4>Community</h4>";
print "<p>" . $data_array['comments_community'] . "</p>";
}

?>      
	<!-- End of Tab4 Div -->    
      </div>

      <div id="tabs-5">

 <?php
if ($share == "on") {
print '<br>
<div id="average-dialog-dev" title="Average (Now)">
<canvas id="myChartDev" width="400" height="200"></canvas>
</div>
<button id="average-opener-dev" class="ui-button ui-widget ui-corner-all">Average (Now)</button>

<div id="average-dialog-ops" title="Average (Vision)">
<canvas id="myChartOps" width="400" height="200"></canvas>
</div>
<button id="average-opener-ops" class="ui-button ui-widget ui-corner-all">Average (Vision)</button>
<br><br>
<div id="average-dialog-dev-lob" title="Average for ' . $lob . ' (Now)">
<canvas id="myChartDevLob" width="400" height="200"></canvas>
</div>
<button id="average-opener-dev-lob" class="ui-button ui-widget ui-corner-all">Average (Now) for ' . $lob . '</button>

<div id="average-dialog-ops-lob" title="Average for ' . $lob . ' (Vision)">
<canvas id="myChartDevOps" width="400" height="200"></canvas>
</div>
<button id="average-opener-ops-lob" class="ui-button ui-widget ui-corner-all">Average (Vision) for ' . $lob . '</button>
<br><br>
';
} else {
print "<h4>Comparisons not available for this customer</h4>";
}
?>     
	<!-- End of Tab5 Div -->    
      </div>


</div>

</tbody>
</table>
<div id="analysis-dialog" title="Analysis of Results">
                   <table class="bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Analysis</th>
        <th>Recommendations</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
    </table>

<?php
// Temporary hack, pending refactoring of resultsOpen.php to fetch the results
// from the DB and not reproducing the entire code
$url_parts = array();
foreach ($data_array as $key => $val) {
	$url_parts[] = $key . '=' .urlencode($val);
}
$query_string = implode('&', $url_parts);
?>
<a href="resultsOpen.php?hash=<?php echo $hash ?>" target="_blank"><input type="button" value="Printable Version" class="ui-button ui-widget ui-corner-all"></a>


</div>
<!-- end of main content div -->
<!-- end of wrapper div -->


</div>

<script type="text/javascript" >
// Get the DIV responses
function saveHTMLDivs(divName,dataType,customer) {
 var htmlObj = document.getElementById(divName);
 var htmlRaw = htmlObj.innerHTML;
 						$.ajax({ 
				   	 	type: "POST", 
    						url: "htmlSave.php",
    						data: "data="+htmlRaw+"&customer="+customer+"&dataType="+dataType,
						});
}

//saveHTMLDivs("analysis-dialog","analysis",customerNameNoSpaces);
//saveHTMLDivs("priorities-dialog","priorities",customerNameNoSpaces);

</script>
<?php
## Put all the relevant parts together in one doc ready for PDF
#$name = preg_replace('/\s+/', '', $data_array['client']);

?>
<script id="jsbin-javascript">
$(document).ready(function(){
  
  var mc = {
    '0-25'     : 'red',
    '26-50'    : 'orange',
    '51-100'   : 'green'
  };
  
function between(x, min, max) {
  return x >= min && x <= max;
}
  

  
  var dc;
  var first; 
  var second;
  var th;
  
  $('p').each(function(index){
    
    th = $(this);
    
    dc = parseInt($(this).attr('data-color'),10);
    
    
      $.each(mc, function(name, value){
        
        
        first = parseInt(name.split('-')[0],10);
        second = parseInt(name.split('-')[1],10);

        
        if( between(dc, first, second) ){
          th.addClass(value);
        }
      });
    
  });
});
</script>
<script>
  var g = new JustGage({
    id: "automationDev",
    value: <?php print $data_array['d1'] . "\n"; ?>,
    min: 0,
    max: 3,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        customSectors: [{
          color: "#ff0000",
          lo: 0,
          hi: 1
        },
        {
          color: "#ffbf00",
          lo: 1.1,
          hi: 2
        }, {
          color: "#00ff00",
          lo: 2.1,
          hi: 3
        }],
        counter: true    
  });
</script>
<script>
  var g = new JustGage({
    id: "automationOps",
    value: <?php print $data_array['o1'] . "\n"; ?>,
    min: 0,
    max: 3,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        customSectors: [{
          color: "#ff0000",
          lo: 0,
          hi: 1
        },
        {
          color: "#ffbf00",
          lo: 1.1,
          hi: 2
        }, {
          color: "#00ff00",
          lo: 2.1,
          hi: 3
        }],
        counter: true    
  });
</script>
<script>
  var g = new JustGage({
    id: "wowOps",
    value: <?php print $data_array['o2'] . "\n"; ?>,
    min: 0,
    max: 3,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        customSectors: [{
          color: "#ff0000",
          lo: 0,
          hi: 1
        },
        {
          color: "#ffbf00",
          lo: 1.1,
          hi: 2
        }, {
          color: "#00ff00",
          lo: 2.1,
          hi: 3
        }],
        counter: true    
  });
</script>
<script>
  var g = new JustGage({
    id: "wowDev",
    value: <?php print $data_array['d2'] . "\n"; ?>,
    min: 0,
    max: 3,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        customSectors: [{
          color: "#ff0000",
          lo: 0,
          hi: 1
        },
        {
          color: "#ffbf00",
          lo: 1.1,
          hi: 2
        }, {
          color: "#00ff00",
          lo: 2.1,
          hi: 3
        }],
        counter: true    
  });
</script>


<script>
  var g = new JustGage({
    id: "archOps",
    value: <?php print $data_array['o3'] . "\n"; ?>,
    min: 0,
    max: 3,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        customSectors: [{
          color: "#ff0000",
          lo: 0,
          hi: 1
        },
        {
          color: "#ffbf00",
          lo: 1.1,
          hi: 2
        }, {
          color: "#00ff00",
          lo: 2.1,
          hi: 3
        }],
        counter: true    
  });
</script>
<script>
  var g = new JustGage({
    id: "archDev",
    value: <?php print $data_array['d3'] . "\n"; ?>,
    min: 0,
    max: 3,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
         customSectors: [{
          color: "#ff0000",
          lo: 0,
          hi: 1
        },
        {
          color: "#ffbf00",
          lo: 1.1,
          hi: 2
        }, {
          color: "#00ff00",
          lo: 2.1,
          hi: 3
        }],
        counter: true    
  });
</script>

<script>
  var g = new JustGage({
    id: "visionDev",
    value: <?php print $data_array['d4'] . "\n"; ?>,
    min: 0,
    max: 3,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        customSectors: [{
          color: "#ff0000",
          lo: 0,
          hi: 1
        },
        {
          color: "#ffbf00",
          lo: 1.1,
          hi: 2
        }, {
          color: "#00ff00",
          lo: 2.1,
          hi: 3
        }],
        counter: true    
  });
</script>
<script>
  var g = new JustGage({
    id: "visionOps",
    value: <?php print $data_array['o4'] . "\n"; ?>,
    min: 0,
    max: 3,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
         customSectors: [{
          color: "#ff0000",
          lo: 0,
          hi: 1
        },
        {
          color: "#ffbf00",
          lo: 1.1,
          hi: 2
        }, {
          color: "#00ff00",
          lo: 2.1,
          hi: 3
        }],
        counter: true    
  });
</script>
<script>
  var g = new JustGage({
    id: "envOps",
    value: <?php print $data_array['o5'] . "\n"; ?>,
    min: 0,
    max: 3,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        customSectors: [{
          color: "#ff0000",
          lo: 0,
          hi: 1
        },
        {
          color: "#ffbf00",
          lo: 1.1,
          hi: 2
        }, {
          color: "#00ff00",
          lo: 2.1,
          hi: 3
        }],
        counter: true    
  });
</script>
<script>
  var g = new JustGage({
    id: "envDev",
    value: <?php print $data_array['d5'] . "\n"; ?>,
    min: 0,
    max: 3,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        customSectors: [{
          color: "#ff0000",
          lo: 0,
          hi: 1
        },
        {
          color: "#ffbf00",
          lo: 1.1,
          hi: 2
        }, {
          color: "#00ff00",
          lo: 2.1,
          hi: 3
        }],
        counter: true    
  });
</script>
</body>
</html>

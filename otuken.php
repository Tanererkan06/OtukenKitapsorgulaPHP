
<!doctype>
<html>
<html>
<head>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.11.custom.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
</head>
<body>
<br/><br/>
ÖTÜKEN KİTAP SORGULA
<br/><br/>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Yazar Arayın" title="Type in a name">
 

<?php require_once "PHPExcel/Classes/PHPExcel.php";
      
$tmpfname = "./products2.xlsx";//products2.xls
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();

    

		
		echo "<table id='myTable' border='1' width='1500'>";
		for ($row = 1; $row <= $lastRow; $row++) { 
			 
        echo "<tr><td>";
        echo $worksheet->getCell('K'.$row)->getValue();
        echo "</td>";
      
        echo "<td>"; 
        echo $worksheet->getCell('C'.$row)->getValue();
        echo "</td>";
        
        echo "<td>"; 
        echo "<img src=";echo $worksheet->getCell('N'.$row)->getValue();echo "/>";
        echo "</td>";

      echo "<td>"; echo $worksheet->getCell('F'.$row)->getValue();echo " TL </td>";
      echo "<td><b>";  
      echo $worksheet->getCell('O'.$row)->getValue(); 
       
      echo "Satışta Var Mı ? (y)es / (n)o : ";
      echo $worksheet->getCell('I'.$row)->getValue();
      echo "</b>";	 	
     
      echo "</td></tr>";	 	
 
		}
		echo "</table>";	
		
?>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
</html>

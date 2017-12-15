<?php
  include('../session.php');
//logic for login
$user_id = $_SESSION['login_userID'];

  $user_check = $_SESSION['login_user'];
  $user_fName = $_SESSION['login_fName'];
  $user_lName = $_SESSION['login_lName'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $selectedClass = $_POST['selectClass'];

    $arrayObject = $_SESSION['arrayObject'][$selectedClass];
    
    $_SESSION['crnSes'] = $arrayObject[0];
    $_SESSION['daySes'] = $arrayObject[1];
    $_SESSION['timeSes'] = $arrayObject[2];
    
    $url='dashboard/';
    echo '<META HTTP-EQUIV=REFRESH CONTENT="0; '.$url.'">';
}

?>

<html>

<head>
    <link rel="stylesheet" type="text/css" href="/stylesheets/main.css">
</head>
<body>
    <div class="home-page main-container">
        <h1><?php echo $user_fName."'s" ?> CIS 101 Classes</h1>
        <h2>Please select your course from the drop down menu below:</h2>
        
            <div class="my-classes">
                <center>         
                <form id="selectForm" action ="" method = "post">
                <div class="styled-select">
                    <select name="selectClass" class="the-select" onchange='document.getElementById("selectForm").submit()'>
                   
                        <optgroup label="CIS 101">
                        
                            <!-- CLEAN THIS, PHP SHOULD BE IN ITS OWN FILE -->
                            <option>Select your class: </option>
                            <?php 
                            
                            include ('../config.php');
                            
                            $classInfoSQL = ("SELECT CRN, Days, Time from course where userID='$user_id' ")or die(mysql_error());
                            
                            $result = $conn->query($classInfoSQL);
                            $count=0;
                            if ($result->num_rows > 0) { 
                                
                                while($row = $result->fetch_assoc()) {
                                    
                                    
                                    $crnNo = $row["CRN"];
                                    $classDay = $row["Days"];
                                    $classTime = $row["Time"];
                                    
                                    echo '<option value="'.$count.'"> '.$classDay. $classTime.'</option>';
                                    
                                    $arrayObject[] = array($crnNo, $classDay, $classTime);
                                    $count=$count+1;

                                    $_SESSION['arrayObject'] = $arrayObject;
                                }
                                
                            } else {
                                echo "";
                            }
                            
                            ?>
                        </optgroup>
                    </select>
                </div>
                </form>
                </center>
            </div>
        </div>
</body>
</html>

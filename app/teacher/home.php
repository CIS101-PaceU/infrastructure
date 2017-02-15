<?php
//logic for login

//$belowRoot = true;
$isLoggedIn = true;
$isTeacher = true;
$isStudent = false;
$displayClass=false; //display the class name after the prof selects section from dropdown
$showNav = false; //don't display navigation if teacher hasn't selected class from drowpdown

$thisPage = "Prof Class Home";

include('../header.php');
$user_id = $_SESSION['login_userID'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $selectedClass = $_POST['selectClass'];

    $arrayObject = $_SESSION['arrayObject'][$selectedClass];
    
    $_SESSION['crnSes'] = $arrayObject[0];
    $_SESSION['daySes'] = $arrayObject[1];
    $_SESSION['timeSes'] = $arrayObject[2];
    
    $url='classHome.php';
    echo '<META HTTP-EQUIV=REFRESH CONTENT="0; '.$url.'">';
}
?>

<html>
<body>
    <div class="main-container">
        <h1>My CIS 101 Classes</h1>
        
            <div class="my-classes">
                <center>
                    
                <form id="selectForm" action ="" method = "post">
                <div class="styled-select">
                    <select name="selectClass" class="the-select">
                   
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

<script>
//using options to navigate to the different pages
$('.styled-select').change(function(){
    $("#selectForm").submit();
    //window.location = ('classHome.php');
    
});
    
</script>
</body>

</html>

<?php
include('../footer.php');
?>
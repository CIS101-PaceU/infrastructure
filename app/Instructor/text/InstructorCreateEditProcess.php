<?php
//

$belowRoot = true;
$isLoggedIn = true;
$showNav = true;
$displayClass =true;
$isTeacher = true;

$thisPage="Post Text Assignment";

include('../../header.php');

/*


$sql="INSERT into text_assignment (assName,Instructions,dueDate)
VALUES
('".$_POST["assName"]."','".$_POST["Instructions"]."','".$_POST["dueDate"]."')";

if($conn->query($sql) === TRUE)
{
    echo "Your post was submitted. Go <a href='assignments.php'>back</a> or go <a href='classHome.php'>home</a>.";
} else {
    echo "An error. Contact the adminstrator. Or go <a href='classHome.php'>home</a>.";
}

$conn->close();

include('../footer.php');

echo $_POST["assName"],$_POST["Instructions"],$_POST["dueDate"];

$sql="INSERT into text_assignment (assName,Instructions,dueDate)
VALUES
('".$_POST["assName"]."','".$_POST["Instructions"]."','".$_POST["dueDate"]."')";

include 'index.php';
*/

include('../../config.php');
$sql="INSERT into text_assignment (assName,Instructions,dueDate)
VALUES
('".$_POST["assName"]."','".$_POST["Instructions"]."','".$_POST["dueDate"]."')";

if($conn->query($sql) === TRUE)
{
    echo "Your post was submitted. Go <a href='index.php'>back</a> or go <a href='classHome.php'>home</a>.";
} else {
    echo "An error. Contact the adminstrator. Or go <a href='classHome.php'>home</a>.";
}

$conn->close();

include('../../footer.php');


?>
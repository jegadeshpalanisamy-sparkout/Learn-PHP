<?php 
session_start();

$no = array();

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Loop through the form inputs and store them in the array
    for ($i = 1; $i <= 5; $i++) {
        // Check if the input for this iteration exists
        if (isset($_POST["number$i"])) {
            array_push($no, $_POST["number$i"]);
        }
    }     
    $_SESSION['arr']=$no; //store the array in session

    echo "<form action='findValue.php' method='post'>";
    echo "<input type='text' placeholder='enter find value' name='num'/>";
    echo "<input type='submit' value='find' name='find'/>";
    echo "</form>";

    
}

// Print the array
print_r($no);



?>

<!-- HTML form -->
<form action="findValueInArray.php" method="post">
    <?php 
    // Generate the input fields within the loop
    for ($i = 1; $i <= 5; $i++) {
        echo "<input type='text' name='number$i'>";
    }
    ?>
    <input type="submit" value="Submit" name="submit">
</form>


<?php


// echo "<pre>";
// var_dump($_GET);
// echo "</pre>";
if (isset($_GET["id"])) {
    $id = $_GET["id"];

$contactFile = 'contacts.json';
$contacts = json_decode(file_get_contents($contactFile), true);

 // Find the index of the contact with the given ID
    $index = array_search($id, array_column($contacts, 'id'));

    if ($index !== false) {
        unlink($contacts[$index]['image']);
        // Remove that contact
        unset($contacts[$index]);

        // Re-index array (optional, to avoid gaps in numeric keys)
        $contacts = array_values($contacts);

        // Save updated contacts back to the file
        file_put_contents($contactFile, json_encode($contacts, JSON_PRETTY_PRINT));

        header("Refresh:5; url=index.php");
echo "Contact removed successfully. Redirecting to homepage in <span id='countdown'>5</span> seconds...";
// Use JavaScript for countdown and redirect
echo <<<HTML
<script>
    var seconds = 5;
    var countdown = document.getElementById('countdown');

    function updateCountdown() {
        seconds--;
        countdown.textContent = seconds;
        if (seconds <= 0) {
            window.location.href = "index.php";
        } else {
            setTimeout(updateCountdown, 1000);
        }
    }

    setTimeout(updateCountdown, 1000);
</script>
HTML;

exit;
    } else {
        echo "Contact with ID $id not found.";
    }


}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
</head>
<body>
    
</body>
</html>


<?php

// echo "<pre>";
// var_dump($_FILES);
// echo "</pre>";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nameRaw = filter_input(INPUT_POST, "name", FILTER_DEFAULT);
    $name = htmlspecialchars(trim($nameRaw));

    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_NUMBER_INT);
// var_dump($name." ".$email." ".$phone);
    if ($name && $email && $phone) {
        echo "Contact added: $name $email $phone";
    } else {
        echo "Invalid input";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
form{
    display: flex;
    flex-direction: column;
}
    .form-container{
border-radius: 10px;
background-color: #cdece2ff;
padding: 20px ;
    width: 50%;
    margin: auto;
    }

    #submit-btn{
        padding: 10px 40px;
        width: fit-content;
        border-radius: 5px ;
        margin: auto;
        cursor: pointer;
        color: white;
        background-color: black;
    }
    
    #submit-btn:hover{
       transition: all 0.5s ease-in-out;
        background-color: #1a5a46ff;
    }
</style>
</head>
<body>
    <div class="form-container">
    <form action="" method="POST" enctype="multipart/form-data">


    <label for="">Name:</label>
    <input type="text" name="name" >
    <label for="">Email</label>
        <input type="text" name="email" >
          <label for="">Phone</label>
        <input type="text" name="phone" >
        <br>
        <label for="">Contact Image:</label>
        <input type="file" name="image">
             <br>
        <button id="submit-btn" type="submit"> Submit</button>
</form>
</div>
</body>
</html>


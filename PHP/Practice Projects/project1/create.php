<?php

// echo "<pre>";
// var_dump($_POST);

// var_dump($_FILES);

// echo "</pre>";


$contactFile = "contacts.json";
$uploadDir = "uploads/";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nameRaw = filter_input(INPUT_POST, "name", FILTER_DEFAULT);
    $name = htmlspecialchars(trim($nameRaw));

    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_NUMBER_INT);
var_dump($name, $email, $phone);

    if ($name && $email && $phone && isset($_FILES['image'])) {
        if (!is_dir($uploadDir)) {

            mkdir($uploadDir, 0777, true);
        }
        $imageName = time() . '_' . basename($_FILES['image']['name']);
        $imagePath = $uploadDir . $imageName; // <-- fixed
        if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {

            $contacts = file_exists($contactFile) ? json_decode(file_get_contents($contactFile)) :[];
            $contacts[] = [
               'id' => count($contacts) ? count($contacts) + 1 : 1,

                'name'=> $name,
                'email'=> $email,
                'phone' => $phone,
                'image' => $imagePath,
            ];
        

            file_put_contents($contactFile, json_encode($contacts,JSON_PRETTY_PRINT));
            echo    'File uploaded Successfully';



        }else{

            echo 'Failed to upload image';
        }


    }
    else{

        echo 'Invalid Inputs';
    }




}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <style>
        * {
            font-family: "sdsdsad"
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-container {
            width: 300px;
            padding: 4px;
            border-radius: 4px;
            background-color: #ee99ffff;

            margin: auto;
        }

        #submit-btn {
            padding: 10px 40px;
            width: fit-content;
            border-radius: 5px;
            margin: auto;
            cursor: pointer;
            color: white;
            background-color: black;
        }

        #submit-btn:hover {
            transition: all 0.5s ease-in-out;
            background-color: #1a5a46ff;

        }
    </style>
</head>

<body>
    <div class="form-container">
        <form action="" method="POST" enctype="multipart/form-data">

            <label for="">Name</label>
            <input type="text" name="name">

            <label for="">Email</label>
            <input type="text" name="email">
            <label for="">Phone</label>
            <input type="text" name="phone">
            <label for="">Image</label>
            <input type="file" name="image">
            <br>
            <button id="submit-btn" type="submit">Submit</button>
        </form>
        <a href="index.php">Go back to home</a>
    </div>
</body>

</html>
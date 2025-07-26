


<?php
$contactFile = "contacts.json";
$contacts = file_exists( $contactFile ) ? json_decode( file_get_contents( $contactFile ),true ) : [] ;

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
    <a href="create.php">Create new contact</a>



    <ul>
        <?php foreach( $contacts as $contact ) : ?>
            <li style=" margin-bottom: 50px ;">
            <img src="<?php echo $contact['image'];?>" height="50px" alt="">
            <?php echo "<br>". "{$contact['id']} - {$contact['name']} - {$contact['email']} - {$contact['phone']}";
            
         
            ?>
            <a href="delete.php?id=<?php echo $contact['id'];?>"> Delete</a>
            </li>
            <?php endforeach;   ?>
    </ul>
</div>
</body>
</html>


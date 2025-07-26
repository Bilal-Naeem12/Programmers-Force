<?php
function findContactById(array $contacts, $id): ?array
{
    foreach ($contacts as $index => $contact) {
        if ((string)($contact['id'] ?? '') === (string)$id) {
            return [
                'contact' => $contact,
                'index'   => $index,
            ];
        }
    }
    return null;
}
if ( isset($_GET['id'])){

    $contactFile = 'contacts.json';
    $contacts = json_decode(file_get_contents($contactFile), true); 
   $result = findContactById($contacts, $_GET['id'] ?? null);

if ($result==null) {
echo "<br>" . "Contact Not Found";
} 
else {

     $matchContact = $result['contact'];
    $matchIndex   = $result['index'];
$imagePath = $matchContact['image'];

unlink($imagePath);

array_splice($contacts, $matchIndex, 1);

file_put_contents($contactFile,json_encode($contacts,JSON_PRETTY_PRINT)) ;
echo'<br>' . "Contact delete successfully";
}

}else{
    var_dump( $_GET["id"] );
};







?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Return Back</a>
</body>
</html>
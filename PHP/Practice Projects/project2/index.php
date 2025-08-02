
<?php
$credentialsPath = "credentials.json";

$credentials = file_exists( $credentialsPath ) ? json_decode( file_get_contents( $credentialsPath ),true ) : [] ;


?>

<?php
function checkUniqueUsername($username, $credentials) {

    // Filter to find matching usernames
    $matches = array_filter($credentials, function($existing) use ($username) {

      // echo"". $existing["username"] ;
        return strtolower($existing['username']) === strtolower($username); // case-insensitive match
    });

    // Return true if username is unique (no matches found)
    return empty($matches);
}

?>
<?php

$showError = ['status'=>false,'message'=> ''];  
$showSuccess = ['status'=>false,'message'=> ''];  


if ( $_SERVER['REQUEST_METHOD']== 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];


if ($username && $password) {

echo  checkUniqueUsername( $username,$credentials );
if(!checkUniqueUsername( $username,$credentials )) {



  $showError['status'] = true;
  $showError['message'] = 'User Already Exisits';

}else{

$credentials[] =['username'=>$username,'password'=>$password]; 


file_put_contents( $credentialsPath, json_encode($credentials, JSON_PRETTY_PRINT ) );

$showSuccess['status'] = true;  
$showSuccess['message'] = 'Submitted Successfully';

}
}
else{


$showError['status'] = true;  
$showError['message'] = 'Invalid Credeintials';
};
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body>


  <form action="" method="POST" class=" max-w-[500px] m-auto p-[40px] bg-slate-700 flex gap-5 flex-col text-white">
    <span class=" text-green-600 font-bold">
  <?php
  echo $showSuccess['message'];
  
  ?>
</span>
<span class=" text-red-600 font-bold">
  <?php
  echo $showError['message'];
  
  ?>
</span>

<label for="username">Username</label>
<input type="text" name="username" id="username" class="bg-white p-5 text-black">


<label for="password">Password</label>
<input type="text" name="password" id="password" class="bg-white p-5 text-black" >

 <button type="submit" class=" bg-black px-5 py-4">Submit</button>
  </form>



<section>
<h1>All Login Logs</h1>


<ul>




  <?php 
  
foreach ($credentials as $credential) :
 
  ?>
<li>
<?php  echo "username: " . $credential['username']   ; ?>
</li>


<?php endforeach; ?>
</ul>
</section>

</body>
</html>


<style>


</style>
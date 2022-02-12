<?php 
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

function registerLoggedUser($user){
    $_SESSION["id"] = $user["idUtente"];
    $_SESSION["tipo"] = $user["tipo"];
    $_SESSION["user"] = $user;
}

function isUserLoggedIn(){
    return !empty($_SESSION["id"]);
}
?>
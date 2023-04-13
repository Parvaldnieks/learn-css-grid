<?php
//date_default_timezone_set('EET');

$file = "Chat.txt";
//$data = ["Vārds" => $_POST["Vārds"] , "zina" => $_POST["zina"] , "datums" => date('l js \of F Y H:i:s A')];
//$data = json_decode($data);
function getAllposts(): array {
    $file = "Chat.json";
    $array = [];
    global $file;
    return @json_decode(file_get_contents($file),true) ?? [];
}

function getPosts(): array {
$file = "Chat.txt";
$array = [];
if(file_exists($file)) {
    $json = file_get_contents($file);
    $array = json_decode($json, true);
}
return $array;
}

function savePosts($post = []): array {
$file = "Chat.txt";
$existingPosts = getPosts();
array_push($existingPosts, $post);
$json = json_encode($existingPosts);
file_put_contents($file, $json);
return $existingPosts;
}

function saevNewPost($newPost = []) {
    global $storageFile;
    $newPost['created_at'] = date ('l js \of F Y H:i:s A');
    $allPosts = getAllposts();
    array_push($allPosts, $newPost);
    file_put_contents($storageFile, json_decode($allPosts));
}

if(!empty($_GET['allPosts'])) {
    echo json_encode(getAllposts());
}

if(!empty($_GET['author']) && !empty($_POST['message'])) {
    saevNewPost(['author'=>$_POST['author'], 'message'=>$_POST['message']]);
    echo json_encode(getAllposts());
}
savePosts(["Vārds" => "Vārds"]);

//file_put_contents($file, $data, FILE_APPEND);
//$content = file_get_contents($file);
//echo $content;
?>
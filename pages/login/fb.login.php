<?php
session_start();

require "../../assets/lib/Facebook/autoload.php";
require "../../assets/classes/User.class.php";

$fb = new Facebook\Facebook([
    'app_id' => '649380592514912',
    'app_secret' => '1d24549112e30ac8f9b30c4b45e5f3d7',
    'default_graph_version' => 'v3.2',
]);

$redirect = 'http://localhost/nqromais/pages/login/fb.login.php';

$helper = $fb->getRedirectLoginHelper();

try {

    $accessToken = $helper->getAccessToken();


} catch(Facebook\Exceptions\FacebookResponseException $e) {

    echo 'Graph returned an error: ' . $e->getMessage();
    exit;

} catch(Facebook\Exceptions\FacebookSDKException $e) {

    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;

}
 

if(! isset($accessToken)){
    $permissions = ['email'];
    $loginUrl = $helper->getLoginUrl($redirect, $permissions);
}else{
    $fb->setDefaultAccessToken($accessToken);
    $responseUser = $fb->get('/me?fields=email,name,picture,id,link', $accessToken);
    $responseImage = $fb->get('/me/picture?redirect=false&width=250&height=250', $accessToken);

    //Dados do usuario pelo FB
    $user = $responseUser->getGraphUser();

    //Foto de perfil
    $userImage = $responseImage->getGraphUser();

    
    //Salvando dados no BD

    $userBD = new User();
    $userBD->setFbId($user['id']);
    $userBD->setNome($user['name']);
    $userBD->setEmail($user['email']);
    $avatar_name = md5($user['id']).'.jpg';
    $userBD->setAvatar($avatar_name);
    $userBD->salvarLogarFB();

    //Salvando imagem de perfil.
    $img = file_get_contents($userImage['url']);
    $file = 'C:/wamp64/www/nqromais/assets/imgs/user_pics/user_avatar/'.md5($user['id']).'.jpg';     //Mudar a URL quando for hospedado!
    file_put_contents($file, $img);


    //Listagem de dados
    // echo "<strong>Access Token:  </strong>".$accessToken.'<br>';
    // echo 'ID: '.$user->getId().'<br>';
    // echo '<strong>Nome:</strong> '.$user['name']."<br>";
    // echo '<strong>Email: </strong>'.$user['email']."<br>";
    // echo '<strong>Foto de perfil: '.'<br>';
    // echo '<img src="'.$userImage['url'].'"/><br><br>';
}
?>
<?php
$users = 'pages/users.txt';
function debug($data)
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
}


function register($name, $pass, $email): bool
{
    //data validation block
    $name=trim($name);
    $pass=trim($pass);
    $email=trim($email);

    if($name =='' || $pass =='' || $email =='')
    {
        echo "<h3/><span style='color:red;'>Fill All Required Fields!</span><h3/>";
        return false;
    }
    if(strlen($name) < 3 || strlen($name) > 30 || strlen($pass) < 3 || strlen($pass) > 30)
    {
        echo "<h3/><span style='color:red;'>Values Length Must Be Between 3 And 30!</span><h3/>";
        return false;
    }

    //login uniqueness check block
    global $users;
    $file=fopen($users,'a+');
    while($line=fgets($file))
    {
        $readname=substr($line,0,strpos($line,':'));
        if($readname == $name)
        {
            echo "<h3/><span style='color:red;'>Such Login Name Is Already Used!</span><h3/>";
            return false;
        }
    }
    //new user adding block
    $line=$name.':'.md5($pass).':'.$email."+";
    fputs($file,$line);
    fclose($file);
    return true;

}
function login($name, $pass):bool
{

    /*$name = !empty($_POST['login']) ? trim($_POST['login']) : '';
    $pass = !empty($_POST['pass']) ? trim($_POST['pass']) : '';*/

    if (empty($name) || empty($pass)) {
        echo "<h3/><span style='color:red;'>Fill All Required Fields!</span><h3/>";
        return false;
    }
    global $users;

    $file = file_get_contents($users);


    $arr_users = explode('+', $file);

    for ($i=0;$i<count($arr_users)-1;$i++){
        $tmp = explode(':', $arr_users[$i]);
        $arr_users[$i]=$tmp;
    }
    //debug($arr_users);

    for ($i=0;$i<count($arr_users)-1;$i++)
    {


        if ($arr_users[$i][0]==$name && md5($pass)==$arr_users[$i][1]){
            $_SESSION['success'] = 'Вы успешно авторизовались';
            $_SESSION['user']['name'] = $arr_users[$i][0];
            $_SESSION['user']['email'] = $arr_users[$i][2];

            return true;
        }

    }

    $_SESSION['errors'] = 'Логин/пароль введены неверно';
    return false;

}




?>

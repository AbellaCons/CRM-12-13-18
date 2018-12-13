<?php

session_start();
$mysqli = new mysqli('localhost', 'root','', 'crm') or die(mysqli_error($mysqli)); 
$update= false;
$id = '';
$name = '';
$location = '';
$phone ='';
$city ='';
$email ='';
$contact ='';
$attempt ='';
$aitems ='';
$cbdate ='';
$cbtime ='';
$other ='';
$subscription ='';
$contact_email ='';
$business_email ='';
$contact_number ='';
$business_number ='';
$city_2 ='';
$state ='';
$zip ='';
$agent ='';
$facebook ='';
$google ='';
$twitter ='';
$instagram ='';
$other_2 ='';
$subscription_date ='';
$payment_due  ='';
$offers1 ='';
$offers2 ='';
$offers3 ='';
$offers4 ='';
$offers5 ='';
$expiration_date ='';
$about_us ='';
$date_2 ='';
$next_call ='';
//var_dump($_POST); die;

//ADD TABLE
if (isset($_POST['save'])) { 
    $name= $_POST['name'];
    $location= $_POST['location'];
    $phone= $_POST['phone'];
    $city= $_POST['city'];
    $email= $_POST['email'];
    $contact= $_POST['contact'];
    $attempt= $_POST['attempt'];
    $aitems= $_POST['aitems'];
    $cbdate= $_POST['cbdate'];
    $cbtime= $_POST['cbtime'];
    $other= $_POST['other'];
    $subscription= $_POST['subscription'];
    $contact_email= $_POST['contact_email'];
    $business_email= $_POST['business_email'];
    $contact_number= $_POST['contact_number'];
    $business_number= $_POST['business_number'];
    $city_2= $_POST['city_2'];
    $state= $_POST['state'];
    $zip= $_POST['zip'];
    $agent= $_POST['agent'];
    $facebook= $_POST['facebook'];
    $zip= $_POST['zip'];
    $google= $_POST['google'];
    $twitter= $_POST['twitter'];
    $instagram= $_POST['instagram'];
    $other_2= $_POST['other_2'];
    $subscription_date= $_POST['subscription_date'];
    $payment_due = $_POST['payment_due '];
    $offers1= $_POST['offers1'];
    $offers2= $_POST['offers2'];
    $offers3= $_POST['offers3'];
    $offers4= $_POST['offers4'];
    $offers5= $_POST['offers5'];
    $expiration_date= $_POST['expiration_date'];
    $about_us= $_POST['about_us'];
    $date_2= $_POST['date_2'];
    $next_call= $_POST['next_call'];


$mysqli->query("INSERT INTO data(name, location, phone, city, email, contact, attempt, aitems, cbdate, cbtime, other, contact_email, business_email, contact_number, business_number, city_2, state, zip, agent, facebook, google, twitter, instagram, other_2, subscription_date, payment_due, offers1, offers2, offers3, offers4, offers5, expiration_date, about_us, date_2, next_call )VALUES ('$name', '$location','$phone','$city','$email','$contact','$attempt','$aitems','$cbdate','$cbtime','$other','$contact_email','$business_email','$contact_number','$business_number','$city_2','$state','$zip','$agent','$facebook','$google','$twitter','$instagram','$other_2','$subscription_date','$payment_due ','$offers1','$offers2','$offers3','$offers4','$offers5','$expiration_date','$about_us','$date_2','$next_call')" ) or die($mysqli->error);

/*
if(!empty($_POST['offers1'])){
    insert("data","offers1",$_POST['offers1']);
}

function insert($table,$key,$value){
    $mysqli->query("INSERT INTO {$table} {$key} VALUES ('{$value}')");

}


class family{
    private $table;
    public function display(){
        $this->table = 'data';

    }
}

$family = new family();
echo $family->display;

*/

 //ADD MESSAGE
$_SESSION['message'] = "Record has been saved!";
$_SESSION['msg_type'] = "success";

header("location: table.php");

}
//DELETE TABLE
if (isset($_GET['delete'])){
    $id =  $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id='{$id}'")or 
    die($mysqli->error);
//DELETE MESSAGE
$_SESSION['message'] = "Record has been deleted!";
$_SESSION['msg_type'] = "danger";

    header("location: table.php");
}
//EDIT TABLE 
if (isset($_GET['edit'])){
    $id=$_GET['edit'];
    $update=true;
    $result=$mysqli->query("SELECT * FROM data WHERE id='{$id}'")or die($mysqli->error());
    if ($result->num_rows > 0){
        $row=$result->fetch_array();
        $name=$row['name'];
        $location=$row['location'];
        $phone=$row['phone'];
        $city=$row['city'];
        $email=$row['email'];
        $contact=$row['contact'];
        $attempt=$row['attempt'];
        $aitems=$row['aitems'];
        $cbdate=$row['cbdate'];
        $cbtime=$row['cbtime'];
        $other=$row['other'];
        $subscription=$row['subscription'];
        $contact_email=$row['contact_email'];
        $business_email=$row['business_email'];
        $contact_number=$row['contact_number'];
        $business_number=$row['business_number'];
        $city_2=$row['city_2'];
        $state=$row['state'];
        $zip=$row['zip'];
        $agent=$row['agent'];
        $facebook=$row['facebook'];
        $google=$row['google'];
        $twitter=$row['twitter'];
        $instagram=$row['instagram'];
        $other_2=$row['other_2'];
        $subscription_date=$row['subscription_date'];
        $payment_due =$row['payment_due'];
        $offers1=$row['offers1'];
        $offers2=$row['offers2'];
        $offers3=$row['offers3'];
        $offers4=$row['offers4'];
        $offers5=$row['offers5'];
        $expiration_date=$row['expiration_date'];
        $about_us=$row['about_us'];
        $date_2=$row['date_2'];
        $next_call=$row['next_call'];
    }
}

    /*
    var_dump($result->num_rows);
if ($result->num_rows > 0){
        $row=$result->fetch_array();
        $name=$row['name'];
        $location=$row['location'];
*/
//UPDATE TABLE
if (isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $attempt = $_POST['attempt'];
    $aitems = $_POST['aitems'];
    $cbdate = $_POST['cbdate'];
    $cbtime = $_POST['cbtime'];
    $other = $_POST['other'];
$subscription = $_POST['subscription'];
//$contact_person = $_POST['contact_person'];
$contact_email = $_POST['contact_email'];
$business_email = $_POST['business_email'];
$contact_number = $_POST['contact_number'];
$business_number = $_POST['business_number'];
$city_2 = $_POST['city_2'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$agent = $_POST['agent'];
$facebook = $_POST['facebook'];
$google = $_POST['google'];
$twitter = $_POST['twitter'];
$instagram = $_POST['instagram'];
$other_2 = $_POST['other_2'];
$subscription_date = $_POST['subscription_date'];
$payment_due = $_POST['payment_due'];
$offers1 = $_POST['offers1'];
$offers2 = $_POST['offers2'];
$offers3 = $_POST['offers3'];
$offers4 = $_POST['offers4'];
$offers5 = $_POST['offers5'];
$expiration_date = $_POST['expiration_date'];
$about_us = $_POST['about_us'];
$date_2 = $_POST['date_2'];
$next_call = $_POST['next_call'];
    
    

    $mysqli->query("UPDATE data SET name='$name',location='$location', phone='$phone', city='$city', email='$email', contact='$contact', attempt='$attempt', aitems='$aitems', cbdate='$cbdate', cbtime='$cbtime', other='$other', contact_email='$contact_email', business_email='$business_email', contact_number='$contact_number', business_number='$business_number', city_2='$city_2', state='$state', zip='$zip', agent='$agent', facebook='$facebook', google='$google', twitter='$twitter', instagram='$instagram', other_2='$other_2', subscription_date='$subscription_date', payment_due='$payment_due', offers1='$offers1', offers2='$offers2', offers3='$offers3', offers4='$offers4', offers5='$offers5', expiration_date='$expiration_date', about_us='$about_us', date_2='$date_2', next_call='$next_call' WHERE id='{$id}'")
    or die($mysqli->error);

//EDIT MESSAGE
    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";
    
    header('location: table.php');
}

?>
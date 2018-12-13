<!DOCTYPE html>
<html lang="en">
<head>
    <title>crm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" >
</head>
<body>
<div id="content">
<a href="index.html"  type="submit" class="btn btn-outline-light"><input type="image" style="height: 15px;" src="./img/return.png"></a><!--BACK BUTTON-->
<button href=""  type="submit" id="plus" data-toggle="modal" data-target="#loginModal" class="btn btn-outline-success">+</button> <!--ADD FORM MODAL BUTTON-->
  
<nav id="sidebar">
    <div id="dismiss">
            <i class="fas fa-arrow-left"></i>
    </div>
    <div class="sidebar-header">
        <h3>Option Bar</h3>
    </div>
    <ul class="list-unstyled components">
        <p>Choose Option :</p>
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Dashboard</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#">Home asd1</a>
                    </li>
                    <li>
                        <a href="#">Home 2</a>
                    </li>
                    <li>
                        <a href="#">Home 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="table.php">View table</a>
                <a href="#">action</a>
            </li>
    </ul>
    <ul class="list-unstyled CTAs">
        <li>
            <a href="" class="download">Download source</a>
        </li>
        <li>
            <a href="" class="article">Back to article</a>
        </li>
    </ul>
</nav>
<!--END SIDE BAR-->
<!-- TABLE-->
    <div id=table>
        <?php require_once 'process.php'; ?>
        <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
    <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);?>
    </div>
<?php endif ?>
<?php $mysqli = new mysqli('localhost','root','','crm') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error); ?>

<div class="row justify-content-center">
    <table class="table table-sm table-hover">
        <thead>
            <tr>
                <th>Date</th><!--name-->
                <th>Company</th><!--location-->
                <th>Phone</th>
                <th>City</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Call attempt</th>
                <th>ActionItems</th>
                <th>CB date</th>
                <th>CB time</th>
                <th>view</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
<?php while ($row=$result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['location'];?></td>
                <td><?php echo $row['phone'];?></td>
                <td><?php echo $row['city'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['contact'];?></td>
                <td><?php echo $row['attempt'];?></td>
                <td><?php echo $row['aitems'];?></td>
                <td><?php echo $row['cbdate'];?></td>
                <td><?php echo $row['cbtime'];?></td> 
                <td><input type="image" data-toggle="modal" data-target="#viewModal<?php echo $row['id'];?>" src="./img/view.png"></td>  
             
                <td>
                    <a href="table.php?edit=<?php echo $row['id']; ?>"
                        type="image" scr="./img/edit.png"  id="action-button" class="btn btn-info"><input type="image" style="height: 13px;" src="./img/edit.png"></a>
                    <a href="process.php?delete=<?php echo $row['id']; ?>"
                        id="action-button" class="btn btn-danger"><input type="image" style="height: 13px;" src="./img/garbage.png"></a>
                </td>
            </tr>
<?php endwhile; ?>
    </table>
</div>

<?php
    function pre_r($array) {
                    echo '<pre>';

    print_r($array);
                    echo '</pre>';
     }
?>
            <!--END TABLE-->
<!--VIEW END-->
<!--VIEW -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="loginModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">add info</h3>
                    <button type="button" class="close" data-dismiss="modal"&times;></button>
                
                </div>
                <div class="modal-body">
                    <form class="form-row" action="process.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="form-group col-md-5">
                                <label>Date</label><!--name-->
                                <input type="date" name="name" class="form-control form-control-sm"  value="<?php echo $name; ?>" placeholder="Enter Date">
                            </div>
                            <div class="form-group col-md-7">        
                                <label>Company</label><!--location-->
                                <input type="text" name="location"class="form-control form-control-sm" value="<?php echo $location; ?>" placeholder="Enter Company">
                            </div>
                            <div class="form-group col-md-4">        
                                <label>Phone</label><!--phone number-->
                                <input type="text" name="phone"class="form-control form-control-sm" value="<?php echo $phone; ?>" placeholder="Enter Phone">
                            </div>
                            <div class="form-group col-md-8">        
                                <label>City</label><!--city number-->
                                <input type="text" name="city"class="form-control form-control-sm" value="<?php echo $city; ?>" placeholder="City">
                            </div>
                            <div class="form-group col-md-6">        
                                <label>Email</label><!--email number-->
                                <input type="text" name="email"class="form-control form-control-sm" value="<?php echo $email; ?>" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">        
                                <label>Contact</label><!--contact number-->
                                <input type="text" name="contact"class="form-control form-control-sm" value="<?php echo $contact; ?>" placeholder="Contact">
                            </div>
                            <div class="form-group col-md-3">        
                                <label>Call attempt</label><!--call attempt-->
                                <input type="text" name="attempt"class="form-control form-control-sm" value="<?php echo $attempt; ?>" placeholder="calls">
                            </div>
                            <div class="form-group col-md-9">        
                                <label>Action items</label><!--action items-->
                                <input type="text" name="aitems"class="form-control form-control-sm" value="<?php echo $aitems; ?>" placeholder="Act items">
                            </div>
                            <div class="form-group col-md-6">        
                                <label>CB date</label><!--cb date-->
                                <input type="date" name="cbdate"class="form-control form-control-sm" value="<?php echo $cbdate; ?>" placeholder="CB date">
                            </div>
                            <div class="form-group col-md-6">        
                                <label>CB time</label><!--cb time-->
                                <input type="time" name="cbtime"class="form-control form-control-sm" value="<?php echo $cbtime; ?>" placeholder="CB time">
                            </div> 
                            <!--COLLAPSE FORM-->
                            <a class="btn btn-primary" type="image" src="./img/down_arrow.png" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <input type="image" style="height: 15px;" src="./img/down_arrow.png"> 
  </a>
<div class="collapse" id="collapseExample">
    <div class="card card-body">
        <div class="form-row">
            <div class="col-md-2">
            <label class="my-1 mr-2" for="">Subscription :</label>
                <select  name="subscription" class="form-control form-control-sm" value="<?php echo $subscription; ?>" id="">
                    <option selected>choose</option>
                    <option value="1">Sole</option>
                    <option value="2">Bonus</option>
                    <option value="3">Expert</option>
                </select>
            </div>
            <div class="col-md-5 ">
                <label for="">Contact Person</label>
                <input type="text" name="other" class="form-control form-control-sm"  value="<?php echo $other; ?>" id="" placeholder=""  >
            </div>
            <div class="col-md-5 ">
                <label for="">Contact email</label>
                <input type="email" name="contact_email" class="form-control  form-control-sm " value="<?php echo $contact_email; ?>" id="" placeholder=""  >
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-6">
                <label for="">Business Email</label>
                <div class="input-group">
                    <input type="email" name="business_email" class="form-control form-control-sm" value="<?php echo $business_email; ?>" id="" placeholder=""  >
                </div>
            </div>
            <div class="col-md-3">
                <label for="">Contact #</label>
                <input type="text" name="contact_number" class="form-control form-control-sm" value="<?php echo $contact_number; ?>" id="" placeholder=""  >
            </div>
            <div class="col-md-3">
                <label for="">Business #</label>
                <input type="text" name="business_number" class="form-control form-control-sm" value="<?php echo $business_number; ?>" id="" placeholder=""  >
            </div>
            <div class="col-md-6">
                <label for="">City</label>
                <input type="text" name="city_2" class="form-control form-control-sm" value="<?php echo $city_2; ?>" id="" placeholder="City" >
            </div>
            <div class="col-md-4">
                <label for="">State</label>
                <input type="text" name="state" class="form-control form-control-sm" value="<?php echo $state; ?>" id="" placeholder="" >
            </div>
            <div class="col-md-2">
                <label for="">Zip</label>
                <input type="text" name="zip" class="form-control form-control-sm" value="<?php echo $zip; ?>" id="" placeholder="Zip" >
            </div>
        </div>

    <div class="form-col" id="first-half"><!--1st half-->
        <div class="form-row">
            <div class="col-md-6 ">
                <label for="">Agent</label>
                <input type="text" name="agent" class="form-control  form-control-sm" value="<?php echo $agent; ?>" id="" placeholder="" >
            </div>
            <div class="col-md-3 ">
                <label for="">Subscription date</label>
                <input type="date" name="subscription_date" class="form-control  form-control-sm " value="<?php echo $subscription_date; ?>" id="" placeholder=""  >
            </div>
            <div class="col-md-3 ">
                <label for="">Payment due</label>
                <input type="date" name="payment_due" class="form-control  form-control-sm " value="<?php echo $payment_due; ?>" id="" placeholder=""  >
            </div>
        </div>
        
        <div class="form-row">
            <div class="col-md-6 ">
                <label for="">Facebook</label>
                    <input type="text" name="facebook" class="form-control  form-control-sm " value="<?php echo $facebook; ?>" id="" placeholder=""  >
            </div>
            <div class="col-md-6 ">
                <label for="">Twitter</label>
                <input type="text" name="twitter" class="form-control  form-control-sm " value="<?php echo $twitter; ?>" id="" placeholder=""  >
            </div>
        </div>
                                          
        <div class="form-row">
            <div class="col-md-6 ">
                <label for="">Google</label>
                <input type="text" name="google" class="form-control  form-control-sm " value="<?php echo $google; ?>" id="" placeholder=""  >
            </div>
            <div class="col-md-6 ">
                <label for="">Instagram</label>
                    <input type="text" name="instagram" class="form-control  form-control-sm " value="<?php echo $instagram; ?>" id="" placeholder=""  >
            </div>
        </div>
                                         
        <div class="form-row">
            <div class="col-md-12 mb-3">
            <label for="">Other</label>
                <input type="text" name="other_2" class="form-control form-control-sm" value="<?php echo $other_2; ?>" id="" placeholder="" >
            </div>
        </div>
    </div>

    <div class="form-row" id="second"><!--2ND-->
            <div class="col-8 md-3 mb-1">
            <label for="">Offers :</label>
                <input name="offers1" type="text" class="form-control form-control-sm" value="<?php echo $offers1; ?>" id="" placeholder=""  >
                <input name="offers2" type="text" class="form-control form-control-sm" value="<?php echo $offers2; ?>" id="" placeholder=""  >
                <input name="offers3" type="text" class="form-control form-control-sm" value="<?php echo $offers3; ?>" id="" placeholder=""  >
                <input name="offers4" type="text" class="form-control form-control-sm" value="<?php echo $offers4; ?>" id="" placeholder=""  >
                <input name="offers5" type="text" class="form-control form-control-sm" value="<?php echo $offers5; ?>" id="" placeholder=""  >
            </div>
            <div class="col-md-4 ">
                <label for="">Expiration Date</label>
                <input name="expiration_date" type="date" class="form-control form-control-sm" value="<?php echo $expiration_date; ?>" id="" placeholder=""  >
                                    
                <label for="">About Us</label>
                <textarea  name="about_us" rows="4" cols="25" class="form-control form-control-sm" value="<?php echo $about_us; ?>" id="message" ></textarea>
            </div>
        <div class="form-row">
            <div class="col-md">
                <label for="">Notes</label>
                <textarea  rows="4" cols="80" class="form-control form-control-sm"  id="message" ></textarea>
            </div>
            <div class="col-md-4 ">
                <label for="">Date</label>
                <input name="date_2" type="date" class="form-control form-control-sm" value="<?php echo $date_2; ?>" id="" placeholder=""  >
                                    
                <label for="">Next call</label>
                <input name="next_call" type="date" class="form-control form-control-sm" value="<?php echo $next_call; ?>" id="" placeholder=""  >
            </div>
        </div>
    </div>

            <table class="table table-sm "><!--3RD-->
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">type</th>
                        <th scope="col">due date</th>
                        <th scope="col">assign to</th>
                        <th scope="col">cap date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>
                            <select  class="form-control form-control-sm" id="">
                                <option selected>choose</option>
                                <option value="1">Sole</option>
                                <option value="2">Bonus</option>
                                <option value="3">Expert</option>
                            </select>
                        </td>
                        <td><input type="date" class="form-control form-control-sm col-10" id="" placeholder=""  ></td>
                        <td><input type="text" class="form-control form-control-sm col-10" id="" placeholder=""  ></td>
                        <td><input type="date" class="form-control form-control-sm col-10" id="" placeholder=""  ></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td> 
                            <select  class="form-control form-control-sm" id="">
                                <option selected>choose</option>
                                <option value="1">Sole</option>
                                <option value="2">Bonus</option>
                                <option value="3">Expert</option>
                            </select>
                        </td>
                        <td><input type="date" class="form-control form-control-sm col-10" id="" placeholder=""  ></td>
                        <td><input type="text" class="form-control form-control-sm col-10" id="" placeholder=""  ></td>
                        <td><input type="date" class="form-control form-control-sm col-10" id="" placeholder=""  ></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>
                            <select  class="form-control form-control-sm" id="">
                                <option selected>choose</option>
                                <option value="1">Sole</option>
                                <option value="2">Bonus</option>
                                <option value="3">Expert</option>
                            </select>
                        </td>
                        <td><input type="date" class="form-control form-control-sm col-10" id="" placeholder=""  ></td>
                        <td><input type="text" class="form-control form-control-sm col-10" id="" placeholder=""  ></td>
                        <td><input type="date" class="form-control form-control-sm col-10" id="" placeholder=""  ></td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                            <td>
                                <select  class="form-control form-control-sm" id="">
                                    <option selected>choose</option>
                                    <option value="1">Sole</option>
                                    <option value="2">Bonus</option>
                                    <option value="3">Expert</option>
                                </select>
                            </td>
                            <td><input type="date" class="form-control form-control-sm col-10" id="" placeholder=""  ></td>
                            <td><input type="text" class="form-control form-control-sm col-10" id="" placeholder=""  ></td>
                            <td><input type="date" class="form-control form-control-sm col-10" id="" placeholder=""  ></td>
                    </tr>
                </tbody>
            </table>
   <!-- END COLLAPSE FORM-->
  </div>
</div>
                           
                     </div>
            <div class="modal-footer">
<?php if ($update == true): ?>
                <button type="submit" id="action" class="btn btn-primary" name="update"> Update </button>
            <?php else: ?>
                <button type="submit" id="action" class="btn btn-outline-primary" name="save"> <input type="image" style="height: 24px;" src="./img/save.png">  </button>
            <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

  
<?php
                $mysqli = new mysqli('localhost','root','','crm') or die(mysqli_error($mysqli));
                $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
             while ($rowx=$result->fetch_assoc()):
?>
<div class="modal fade" role="dialog" id="viewModal<?php echo $rowx['id'];?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">sub-form</h3>
                <button type="button" class="close" ></button>
            </div>
                <div class="modal-body">
             <?php //require_once 'process.php'; ?>
                <?php if (isset($_SESSION['message'])): ?>
                <div class="alert alert-<?=$_SESSION['msg_type']?>">
               
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
        </div>
        <?php endif ?>
       
        <!--SUB-FORM TABLE-->
        
<form>
    <div class="form-row">
            <div class="col-md-2">
            <label class="my-1 mr-2" for="">Subscription :</label>
                <select type="text" name="subscription" class="form-control form-control-sm" value="<?php echo $rowx['subscription']; ?>" id="">
                    <option selected>choose</option>
                    <option value="1">Sole</option>
                    <option value="2">Bonus</option>
                    <option value="3">Expert</option>
                </select>
            </div>
            <div class="col-md-5 ">
                <label for="">Contact Person</label>
                <input type="text" name="other" class="form-control form-control-sm"  value="<?php echo $rowx['other']; ?>" id="" placeholder=""  >
            </div>
            <div class="col-md-5 ">
                <label for="">Contact email</label>
                <input type="email" name="contact_email" class="form-control  form-control-sm " value="<?php echo $rowx['contact_email']; ?>" id="" placeholder=""  >
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-6">
                <label for="">Business Email</label>
                <div class="input-group">
                    <input type="email" name="business_email" class="form-control form-control-sm" value="<?php echo $rowx['business_email']; ?>" id="" placeholder=""  >
                </div>
            </div>
            <div class="col-md-3">
                <label for="">Contact #</label>
                <input type="text" name="contact_number" class="form-control form-control-sm" value="<?php echo $rowx['contact_number']; ?>" id="" placeholder=""  >
            </div>
            <div class="col-md-3">
                <label for="">Business #</label>
                <input type="text" name="business_number" class="form-control form-control-sm" value="<?php echo $rowx['business_number']; ?>"  id="" placeholder=""  >
            </div>
            <div class="col-md-6">
                <label for="">City</label>
                <input type="text" name="city_2" class="form-control form-control-sm" value="<?php echo $rowx['city_2']; ?>" id="" placeholder="City" >
            </div>
            <div class="col-md-4">
                <label for="">State</label>
                <input type="text" name="state" class="form-control form-control-sm" value="<?php echo $rowx['state']; ?>" id="" placeholder="State" >
            </div>
            <div class="col-md-2">
                <label for="">Zip</label>
                <input type="text" name="zip" class="form-control form-control-sm" value="<?php echo $rowx['zip']; ?>" id="" placeholder="Zip" >
            </div>
        </div>

    <div class="form-col" id="first-half"><!--1st half-->
        <div class="form-row">
            <div class="col-md-6 ">
                <label for="">Agent</label>
                <input type="text" name="agent" class="form-control  form-control-sm" value="<?php echo $rowx['agent']; ?>" id="" placeholder=""  >
            </div>
            <div class="col-md-3 ">
                <label for="">Subscription date</label>
                <input type="date" name="subscription_date" class="form-control  form-control-sm " value="<?php echo $rowx['subscription_date']; ?>" id="" placeholder=""  >
            </div>
            <div class="col-md-3 ">
                <label for="">Payment due</label>
                <input type="date" name="payment_due" class="form-control  form-control-sm " value="<?php echo $rowx['payment_due']; ?>" id="" placeholder=""  >
            </div>
        </div>
        
        <div class="form-row">
            <div class="col-md-6 ">
                <label for="">Facebook</label>
                    <input type="text" name="facebook" class="form-control  form-control-sm " value="<?php echo $rowx['facebook']; ?>" id="" placeholder=""  >
            </div>
            <div class="col-md-6 ">
                <label for="">Twitter</label>
                <input type="text" name="twitter" class="form-control  form-control-sm " value="<?php echo $rowx['twitter']; ?>" id="" placeholder=""  >
            </div>
        </div>
                                          
        <div class="form-row">
            <div class="col-md-6 ">
                <label for="">Google</label>
                <input type="google" name="zip" class="form-control  form-control-sm "value="<?php echo $rowx['google']; ?>"  id="" placeholder=""  >
            </div>
            <div class="col-md-6 ">
                <label for="">Instagram</label>
                    <input type="instagram" name="zip" class="form-control  form-control-sm " value="<?php echo $rowx['instagram']; ?>" id="" placeholder=""  >
            </div>
        </div>
                                         
        <div class="form-row">
            <div class="col-md-12 mb-3">
            <label for="">Other</label>
                <input type="text" name="other_2" class="form-control form-control-sm" value="<?php echo $rowx['other_2']; ?>" id="" placeholder="" >
            </div>
        </div>
    </div>

    <div class="form-row" id="second"><!--2ND-->
            <div class="col-8 md-3 mb-1">
            <label for="">Offers :</label>
                <input type="text" name="offers1" class="form-control form-control-sm" value="<?php echo $rowx['offers1']; ?>" id="" placeholder=""  >
                <input type="text" name="offers2" class="form-control form-control-sm" value="<?php echo $rowx['offers2']; ?>" id="" placeholder=""  >
                <input type="text" name="offers3" class="form-control form-control-sm" value="<?php echo $rowx['offers3']; ?>" id="" placeholder=""  >
                <input type="text" name="offers4" class="form-control form-control-sm" value="<?php echo $rowx['offers4']; ?>" id="" placeholder=""  >
                <input type="text" name="offers5" class="form-control form-control-sm" value="<?php echo $rowx['offers5']; ?>" id="" placeholder=""  >
            </div>
            <div class="col-md-4 ">
                <label for="">Expiration Date</label>
                <input type="date" name="expiration_date" class="form-control form-control-sm" value="<?php echo $rowx['expiration_date']; ?>" id="" placeholder=""  >
                                    
                <label for="">About Us</label>
                <textarea  rows="4" name="about_us" cols="25" class="form-control form-control-sm" value="<?php echo $rowx['about_us']; ?>" id="message" ></textarea>
            </div>
        <div class="form-row">
            <div class="col-md">
                <label for="">Notes</label>
                <textarea  rows="4" cols="80" class="form-control form-control-sm" id="message" ></textarea>
            </div>
            <div class="col-md-4 ">
                <label for="">Date</label>
                <input type="date" name="date_2" class="form-control form-control-sm" value="<?php echo $rowx['date_2']; ?>" id="" placeholder=""  >
                                    
                <label for="">Next call</label>
                <input type="date" name="next_call" class="form-control form-control-sm" value="<?php echo $rowx['next_call']; ?>" id="" placeholder=""  >
            </div>
        </div>
    </div>

            <table class="table table-sm "><!--3RD-->
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">type</th>
                        <th scope="col">due date</th>
                        <th scope="col">assign to</th>
                        <th scope="col">cap date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>
                            <select  class="form-control form-control-sm" id="">
                                <option selected>choose</option>
                                <option value="1">Sole</option>
                                <option value="2">Bonus</option>
                                <option value="3">Expert</option>
                            </select>
                        </td>
                        <td><input type="date" class="form-control form-control-sm col-10" id="" placeholder=""  ></td>
                        <td><input type="text" class="form-control form-control-sm col-10" id="" placeholder=""  ></td>
                        <td><input type="date" class="form-control form-control-sm col-10" id="" placeholder=""  ></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td> 
                            <select  class="form-control form-control-sm" id="">
                                <option selected>choose</option>
                                <option value="1">Sole</option>
                                <option value="2">Bonus</option>
                                <option value="3">Expert</option>
                            </select>
                        </td>
                        <td><input type="date" class="form-control form-control-sm col-10" id="" placeholder=""  ></td>
                        <td><input type="text" class="form-control form-control-sm col-10" id="" placeholder=""  ></td>
                        <td><input type="date" class="form-control form-control-sm col-10" id="" placeholder=""  ></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>
                            <select  class="form-control form-control-sm" id="">
                                <option selected>choose</option>
                                <option value="1">Sole</option>
                                <option value="2">Bonus</option>
                                <option value="3">Expert</option>
                            </select>
                        </td>
                        <td><input type="date" class="form-control form-control-sm col-10" id="" placeholder=""  ></td>
                        <td><input type="text" class="form-control form-control-sm col-10" id="" placeholder=""  ></td>
                        <td><input type="date" class="form-control form-control-sm col-10" id="" placeholder=""  ></td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                            <td>
                                <select  class="form-control form-control-sm" id="">
                                    <option selected>choose</option>
                                    <option value="1">Sole</option>
                                    <option value="2">Bonus</option>
                                    <option value="3">Expert</option>
                                </select>
                            </td>
                            <td><input type="date" class="form-control form-control-sm col-10" id="" placeholder=""  ></td>
                            <td><input type="text" class="form-control form-control-sm col-10" id="" placeholder=""  ></td>
                            <td><input type="date" class="form-control form-control-sm col-10" id="" placeholder=""  ></td>
                    </tr>
                </tbody>
            </table>






                </form>
                </div>
            </div>
        </div>
    </div> 
</div>
<?php endwhile; ?>
<!--END OF SUB-FORM TABLE-->
<!--END SUB-FORM-->
 </div>

  <div class="overlay"></div>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
  </script>
</body>
</html>
<?php 
    $title = 'Success';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';
    require_once 'sendemail.php';

    if(isset($_POST['submit'])){
      //extract values from the $_POST array  
      $fname = $_POST['firstname'];
      $lname = $_POST['lastname'];
      $dob = $_POST['dob'];
      $specialty = $_POST['specialty'];
      $email = $_POST['email'];
      $contact = $_POST['phone'];
      
    //   $orig_file = $_FILES["avatar"]["tmp_name"];
    //   $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    //   $target_dir = 'uploads/*';
    //   $destination = "$target_dir$contact.$ext";
    //   move_uploaded_file($orig_file,$destination);

    
    //Uploading Images
    $orig_file = $_FILES["avatar"]["tmp_name"];
    $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    $target_dir = 'uploads/';
    $destination = "$target_dir$contact.$ext";
    move_uploaded_file($orig_file,$destination);

     // exit();
    
      
      //call function to insert and track if success or not
      $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty, $destination);
      $specialtyName = $crud->getSpecialtiesById($specialty);
      
      if($isSuccess){
        SendEmail::SendMail($email, 'Welcome to the 2022 IT Conference', 'You have registered successfully for this year\'s IT Conference');
        include 'includes/successmessage.php';
      }
      else{
        include 'includes/errormessage.php';
      }

    }
?>

   

    <!-- This prints out values that were passed to the action page using method="get"-->
        <!--<div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php //echo $_GET['firstname'] .  ' ' . $_GET['lastname'];?>
                </h5>

            <h6 class="card-subtitle mb-2 text-muted">
                <?php //echo $_GET['specialty'];?>
            </h6>

            <p class="card-text">
                Date of Birth: <?php //echo $_GET['dob'];?>
            </p>

            <p class="card-text">
                Contact Number: <?php //echo $_GET['phone'];?>
            </p>

            <p class="card-text">
                Email Address: <?php //echo $_GET['email'];?>
            </p>

        </div>
    </div> -->

    <!-- This prints out values that were passed to the action page using method="post" -->

    <img src="<?php echo $destination; ?>" class="rounded-circle" alt="..." style="width: 15%; height 20%;" />

        <div class="card" style="width: 18rem;">
            <div class="card-body">
            <h5 class="card-title">
                    <?php echo $_POST['firstname'] .  ' ' . $_POST['lastname'];?>
            </h5>

            <h6 class="card-subtitle mb-2 text-muted">
                    <?php echo $specialtyName['name'];?>
            </h6>

            <p class="card-text">
                    Date of Birth: <?php echo $_POST['dob'];?>
            </p>

            <p class="card-text">
                    Contact Number: <?php echo $_POST['phone'];?>
            </p>

            <p class="card-text">
                    Email Address: <?php echo $_POST['email'];?>
            </p>

            </div>
        </div>
    
    <!--<?php
        //echo $_POST['firstname'];
        //echo $_POST['lastname'];
        //echo $_POST['dob'];
        //echo $_POST['specialty'];
        //echo $_POST['phone'];
        //echo $_POST['email'];
    
    ?>-->



<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>
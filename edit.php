<?php 
    $title = 'Edit Record';

    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();

    if(!isset($_GET['id']))
    {
        //echo 'error';
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
    }
    else{
        $id = $_GET['id'];
        $attendee = $crud->getAttendeeDetails($id);
       
?>
    <!-- 
        - First Name
        - Last Name
        - Date of Birth (use DatePicker)
        - Specialty (Database Admin, Software Developer, Web Administrator, Other, IT Specialist)
        - Email Address
        - Contact Number
    -->

    <h1 class="text-center">Edit Record </h1>
   
    <form method="post" action="editpost.php">
        <input type="hidden" name="id" value="<?php echo $attendee['attendee_id'] ?>" />
         <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>" id="firstname" name="firstname">
        

        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>" id="lastname" name="lastname">
       
        </div>

            <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth'] ?>" id="dob" name="dob"> 
        </div>

        <div class="mb-3">
            <label for="specialty" class="form-label">Area of specialization</label>
            <select class="form-select form-select- mb-3" aria-label=".Specialty" name="specialty">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['specialization_id']; ?>" <?php if($r['specialization_id']
                     == $attendee['specialization_id']) echo 'selected'?>>
                     <?php echo $r['name']; ?>
                    </option>
                <?php }?> 
            </select>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="phone" value="<?php echo $attendee['contactnumber'] ?>" 
            aria-describedby="phoneHelp" name="phone">
            <div id="phoneHelp" class="form-text">Your number stays confidential</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="Email" value="<?php echo $attendee['emailaddress'] ?>" 
            aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else</div>
        </div>
   
        <div class="d-grid gap-2">
            <button type="submit" name="submit" class="btn btn-success btn-block">Save Changes</button>
            <a href="view.php" class="btn btn-info">Back to List</a>   
        </div>
    
    </form>
<?php } ?>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>
     
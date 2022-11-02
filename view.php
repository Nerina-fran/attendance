<?php 
    $title = 'View Record';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    // Get attendees by id
    if(!isset($_GET['id'])){ 
        header("Location: viewrecords.php");
    }else{
        $id = $_GET['id'];
        $result = $crud->getAttendeeDetails($id); 
       
?>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                    <?php echo $result['firstname'] .  ' ' . $result['lastname'];?>
            </h5>

            <h6 class="card-subtitle mb-2 text-muted">
                    <?php echo $result['name'];?>
            </h6>

            <p class="card-text">
                    Date of Birth: <?php echo $result['dateofbirth'];?>
            </p>

            <p class="card-text">
                    Contact Number: <?php echo $result['contactnumber'];?>
            </p>

            <p class="card-text">
                    Email Address: <?php echo $result['emailaddress'];?>
            </p>
        </div>
    </div>
    <br/>
                <a href="view.php" class="btn btn-info">Back to List</a>
                <a href="edit.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-warning">Edit</a>
                <a onclick="return confirm('This will be lost, are you sure you want to delete records?');"
                href="delete.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-danger">Delete</a>
        <?php } ?>

<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>
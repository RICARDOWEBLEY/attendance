



<?php
    $title = 'View Record'; 

    require_once 'includes/header.php'; 
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php'; 

    // Get attendee by id
    if(!isset($_GET['id'])){
        include 'includes/errormessage.php';
        
    } else{
        $id = $_GET['id'];
        $result = $crud->getAttendeeDetails($id);
    
    
?>

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title ">
            <?php echo $result['firstname'] . ' ' . $result['lastname'];  ?>
        </h5>
        <h6 class="card-subtitle mb-2 text-muted">
            <?php echo $result['name'];  ?>    
        </h6>
        <p class="card-text">
            Date Of Birth: <?php echo $result['dob'];  ?>
        </p>
        <p class="card-text" disabled="disabled">
            Email Adress: <?php echo $result['email'];  ?>
        </p>
        <p class="card-text"  disable>
            Contact Number: <?php echo $result['contact'];  ?>
        </p>

    </div>
</div>
<br/>
        <a href="viewrecords.php" class="btn btn-warning">Back to List</a>
        <a href="edit.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-warning">Edit</a>
        <a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-danger">Delete</a>
    <?php } ?>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>
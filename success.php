<?php
    $title = 'Success'; 
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';
    require_once 'sendemail.php';

    if(isset($_POST['submit'])){
        
        //getting values from the $_POST array
        $fname = $_POST['firstname'];

        $lname = $_POST['lastname'];
        
        $dob = $_POST['dob'];

        $email = $_POST['email'];

        $contact = $_POST['phone'];

        $specialty = $_POST['specialty'];

        //function to insert and track if success or not

        $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email,$contact,$specialty);
        $specialtyName = $crud->getSpecialtyById($specialty);
        
        if($isSuccess){
            SendEmail::SendMail($email, 'Thank you ' .$_POST['firstname']. ' for registering for the Conference.' , 
            'We are looking forward to having you. ' .$_POST['firstname']. ' ' .$_POST['lastname']);
            include 'includes/successmessage.php';
        }
        else{
            include 'includes/errormessage.php';
        }

    }
?>
    
   

    <!-- This prints out values that were passed to the action page using method="post" -->

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $_POST['firstname'] . ' ' . $_POST['lastname'];  ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $specialtyName['name'];  ?>    
            </h6>
            <p class="card-text">
                Date Of Birth: <?php echo $_POST['dob'];  ?>
            </p>
            <p class="card-text">
                Email Adress: <?php echo $_POST['email'];  ?>
            </p>
            <p class="card-text">
                Contact Number: <?php echo $_POST['phone'];  ?>
            </p>
    
        </div>
    </div>
    

<br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>
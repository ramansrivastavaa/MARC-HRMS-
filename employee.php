<?php
session_start();

if($_SESSION['email']=="")
{
	session_destroy();
	header("location:index.php?msg=3");
}

mysql_connect("localhost","root","");
mysql_select_db("marc");
$query="select * from tbl_dpt";
$res=mysql_query($query);

?>
<html>
<head>
<title>MARC|Register Employee</title>
<link rel="stylesheet" href="css.css">
<link type="text/css" rel="stylesheet" href="style3.css">    

<link rel="stylesheet" href="css/font-awesome.min.css">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
    <script src="jquery.min.js"></script>
    
<style>


</style>
    
    
      
    
</head>
<?php
include("connect.php");
$query="select * from tbl_dpt";
$res=mysql_query($query);
?>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>

<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

<script src="js/jquery-2.1.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body style="background-image: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);">

<div class="col-sm-2" style="float:left;height:100%;position:fixed;background:rgba(0,0,0,0.5) ;">
<img alt="Brand" src="images/logo.jpg" style="position:absolute; top:14; left:21%;">
<div style="position:absolute;
	top:90;
	left:30;color:yellow;">
	
	<?php
	echo "<h3>";
	echo $_SESSION['email'];
	echo "</h3><center>";
	echo date("d/m/y");
	echo "</center>";
	?>
	

	</div>
<!--drop down start-->
<div class="list-group  " style="width:16%;margin-top:260px; margin-left:-10px;position:fixed;">    <a href="profile.php" class="list-group-item" style="font-size:25px;" >Home</a>
  <a href="dpt.php" class="list-group-item" style="font-size:25px;">
    Add Department
  </a>
  <a href="employee.php" class="list-group-item disabled" class="color" style="font-size:25px;">Add Employee</a>
  <a href="viewemp.php" class="list-group-item" style="font-size:25px;">View Employee</a>
  <a href="saldemo.php" class="list-group-item" style="font-size:25px;">Salary</a>
  <a href="attendencedemo.php" class="list-group-item" style="font-size:25px;" >Attendence</a>
  <a href="viewatt.php" class="list-group-item"  style="font-size:25px;" >View Attendence</a>
  <a href="leaves.php" class="list-group-item" style="font-size:25px;">Leaves</a>
  <a href="addnoti.php" class="list-group-item"  style="font-size:25px;">Notification</a>
  <a href="logout.php" class="list-group-item" style="font-size:25px;">logout</a>
</div>
</div>
<div class="col-sm-10" style="float:right;min-width:1000px;">


<body class="w3-light-grey" data-gr-c-s-loaded="true" style="background-image: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);">




<div class="w3-content" style="max-width:1600px">

  
 

  <!-- Grid -->
  <div class="w3-row w3-padding w3-border">

    <!-- Blog entries -->
    <div class="w3-col l12 s12">
    
      <!-- Blog entry -->
      <div class="w3-container w3-white w3-margin w3-padding-large">
        
          <h2 style="text-align: center;" > Registration Form for New Employee</h2>
          <br>
          <div class="select-boxes">
    
  <div class="container">
<div class="col-lg-9">
	        <br>
  


<br>


  <form class="form-horizontal" action="empcode.php" method="post" enctype="multipart/form-data" id="reg_form">
    <fieldset>
      
      <!-- Form Name -->
      <legend> Personal Information </legend>
    
      <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label">Name</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input  name="name" placeholder="Name" class="form-control"  type="text">
          </div>
        </div>
      </div>
      
      <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label" >Father Name</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="fname" placeholder="father Name" class="form-control"  type="text">
          </div>
        </div>
      </div>
       <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label">Gender</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
           &nbsp; <input name="a" value="male" type="radio">male
            <input name="a"  value="female" type="radio">Female
          </div>
        </div>
      </div>
      <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label">Phone</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
            <input name="mobile" placeholder="(000)000-0000" class="form-control" type="text">
          </div>
        </div>
      </div> 

 <!-- Text input-->
	  <div class="form-group">
        <label class="col-md-4 control-label">DOB</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
            <input name="dob"  class="form-control" type="date">
          </div>
        </div>
      </div>
      
      <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label">Address</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <input name="address" placeholder="Address" class="form-control" type="text">
          </div>
        </div>
      </div>
      
      <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label">City</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <input name="city" placeholder="city" class="form-control"  type="text">
          </div>
        </div>
      </div>
	    <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label">Picture</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
            <input name="file"  class="form-control" type="file">
          </div>
        </div>
      </div>
      <!-- Select Basic -->
      
      <div class="form-group">
        <label class="col-md-4 control-label">Department</label>
        <div class="col-md-6 selectContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
            <select name="Department" class="form-control selectpicker" >
              <option value="" >Please select your Department</option>
			  <?php
	$i=1;
	while($row=mysql_fetch_array($res,MYSQL_BOTH))
	{
		?>
              <option value="<?php echo $row['dptid']; ?>"><?php echo $row['department']; ?></option>
              	<?php
	$i++;
	}
	
?>
            </select>
          </div>
        </div>
      </div>
      
      <!-- Text input-->
      
        <!-- Text area -->
      
     
       </fieldset>
       	<legend> Account information </legend>
        <fieldset>
        <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label">E-Mail</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
          </div>
        </div>
      </div>
      
    
        <div class="form-group has-feedback">
            <label for="password"  class="col-md-4 control-label">
                    Password
                </label>
                <div class="col-md-6  inputGroupContainer">
                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <input class="form-control" id="password" type="password" placeholder="password" 
                       name="password" data-minLength="5"
                       data-error="some error"
                       required/>
                <span class="glyphicon form-control-feedback"></span>
                <span class="help-block with-errors"></span>
                </div>
             </div>
        </div>
     
        <div class="form-group has-feedback">
            <label for="confirmPassword"  class="col-md-4 control-label">
                   Confirm Password
                </label>
                 <div class="col-md-6  inputGroupContainer">
                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <input class="form-control {$borderColor}" id="userPw2" type="password" placeholder="Confirm password" 
                       name="confirmPassword" data-match="#confirmPassword" data-minLength="5"
                       data-match-error="some error 2"
                       required/>
                <span class="glyphicon form-control-feedback"></span>
                <span class="help-block with-errors"></span>
      			 </div>
             </div>
        </div>
     
  
      <!-- Button -->
      <div class="form-group">
        <label class="col-md-4 control-label"></label>
        <div class="col-md-4">
          <button type="submit" class="btn btn-warning" >Register <span class="glyphicon glyphicon-send"></span></button>
        </div>
      </div>
    </fieldset>
  </form>
</div>

</div>

<!-- PrefixFree -->

        
<script type="text/javascript">
 
   $(document).ready(function() {
    $('#reg_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Please supply your first name'
                    }
                }
            },
             last_name: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please supply your last name'
                    }
                }
            },
           
            phone: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your phone number'
                    },
                    phone: {
                        country: 'US',
                        message: 'Please supply a vaild phone number with area code'
                    }
                }
            },
            address: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Please supply your street address'
                    }
                }
            },
            city: {
                validators: {
                     stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Please supply your city'
                    }
                }
            },
            state: {
                validators: {
                    notEmpty: {
                        message: 'Please select your state'
                    }
                }
            },
            zip: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your zip code'
                    },
                    zipCode: {
                        country: 'US',
                        message: 'Please supply a vaild zip code'
                    }
                }
            },
		comment: {
                validators: {
                      stringLength: {
                        min: 10,
                        max: 200,
                        message:'Please enter at least 10 characters and no more than 200'
                    },
                    notEmpty: {
                        message: 'Please supply a description about yourself'
                    }
                    }
                 },	
	 email: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your email address'
                    },
                    emailAddress: {
                        message: 'Please supply a valid email address'
                    }
                }
            },
					
	password: {
            validators: {
                identical: {
                    field: 'confirmPassword',
                    message: 'Confirm your password below - type same password please'
                }
            }
        },
        confirmPassword: {
            validators: {
                identical: {
                    field: 'password',
                    message: 'The password and its confirm are not the same'
                }
            }
         },
			
            
            }
        })
		
 	
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#reg_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});


 
 </script>
    
    </div>

          
            
      </div>
      
    </div>

  </div>

</div>

</body>
</html>
<?php 
session_start();
 
if(!isset($_SESSION['username'])){
  header("location:index.php");

}
include('lib/connect.php');
include_once('lib/header.php');
include_once('lib/headerx.php');
include_once('lib/sidebar.php'); 

?> 



<!DOCTYPE html>
<html>
<style type="text/css">
  
  .errorMessages li{
    color:#ff0000;

  }

  #requim{
    color: #ff0000;
  }
 
 
</style>

  <body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    
      <div class="content-wrapper" ">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            HRIS
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Recruitment</li>
            <li class="active">Applicant Form</li>
          </ol>
        </section>

        
         <section class="content">

          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Oversees Hub Solutions, Inc.</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
 
              </div>
            </div>
                <div class="box-body">
                   <table class="table table-condensed" align="center">
                 
                    <th>ID</th>
                    <th>Complete Name</th>
                     <th>First Name</th>
                    <th>MI</th>
                    <th>Last Name</th>
                    <th>Location</th>
                    <th>Contact Number</th>
                    <th>Email Address</th>
                    <th>Position 1</th>
                    <th>Position 2</th>
                    <th>Position 3</th>
                    <th>Expected Salary</th>
                    <th>Course</th>
                    <th>Major</th>
                    <th>Highest Attainment</th>
                    <th>Endorsement/Remarks</th>
                    <th>Application Status</th>
                    <th>Source</th>
                    <th>Assessment Status</th>
                    </table>
                 
                 </div>
          
            </div>


            <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Stocks</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
 
              </div>
            </div>
            <div class="box-body" id="stock_list">
                  <table class="table table-condensed" align="center">
                  <thead>
                    <th>ID</th>
                    <th>Complete Name</th>
                     <th>First Name</th>
                    <th>MI</th>
                    <th>Last Name</th>
                    <th>Location</th>
                    <th>Contact Number</th>
                    <th>Email Address</th>
                    <th>Position 1</th>
                    <th>Position 2</th>
                    <th>Position 3</th>
                    <th>Expected Salary</th>
                    <th>Course</th>
                    <th>Major</th>
                    <th>Highest Attainment</th>
                    <th>Endorsement/Remarks</th>
                    <th>Application Status</th>
                    <th>Source</th>
                    <th>Assessment Status</th>
                    </thead>

                     <tr id="" >
                            <td>'.$query[0].'</td>
                           
                            <td>'.$query[1].' </td>
                            <td> '.$query[2].'</td>
                            </tr>
                    </table>
                 
            </div><!-- /.box-body -->
 
          </div><!-- /.box -->
<button id="clear"  class="btn btn-info btn-sm btn-flat ">Clear</button>
 

<form action="lib/applicant_master.php" class="form-horizontal" method="POST"> 
     <ul class="errorMessages"> </ul>
         <div class="row">
            <div class="col-md-12">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom nav-tabs-info">
            
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Applicant's Information</a></li>
                    
                  <li><a href="#tab_4" data-toggle="tab">Educational Attainment</a></li>
               
                <!--   <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      Dropdown <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                      <li role="presentation" class="divider"></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                    </ul>
                  </li> -->
                   <li class="pull-right"> 
                    <button type="submit" style="margin-left:25px;" class="btn btn-info btn-flat  ">Submit</button></li>
                </ul>
                
                 
                <div class="tab-content" >

                  <div class="tab-pane active" id="tab_1">

                  
<div class="row">
                    <div class="col-xs-4">
                    <?php 
                                date_default_timezone_set('Asia/Singapore');
                            $date= date("Y-m-d");
                    ?>
                   <label for="appdate">Application Date  <span id="requim">*</span></label>
                      <input  type="text" value="<?php echo $date; ?>" name="appdate" class="form-control"  disabled required>
                    </div>
                    
                    <div class="col-xs-4">
                   <label for="expsalary">Expected Salary  <span id="requim">*</span></label>
                      <input type="number" class="form-control " pattern="" min=1 name="expsalary" id="expsalary" required>
                    </div>  

                    <div class="col-xs-4">                           
                    <label for="start">Availability<span id="requim">*</span></label>
                      <select class="form-control " name="start" id="start" required>
                      <option value=""></option>
                      <option>I need to provide more than 30 days immediately</option>
                      <option>I need to provide 30 days notice</option>
                      <option>I need to provide two to three weeks notice</option>
                      <option>I'm available immediately</option>
                      </select>
                    </div>      
                   </div> 
                     <br>

                             <div class="row" >                             

                        <div class="col-xs-4">                           
                    <label for="position">Applied Position 1 <span id="requim">*</span></label>
                      <select class="form-control " name="position1" id="position" required>
                      <option disabled=""></option>
                        <option>CPA</option>
                        <option>Head Bookkeeper</option>
                        <option>Support Bookkeeper</option>
                        <option>Accounting Support</option>
                        <option>Accounts Payable</option>
                        <option>Accounts Receivable</option>
                        <option>Purchasing Officer</option>
                        <option>Financial Analyst</option>
                        <option>Payroll Specialist</option>
                        <option>Payroll Assistant</option>
                        <option>Jr. Accountant</option>
                        <option disabled></option>
                        <option>Graphic Artist/Designer</option>
                      <option>InDesign Designer</option>
                      <option>Video Creation/Motion Graphics</option>
                      <option>Video/Audio Editor</option>
                      <option>Advertising/Marketing</option>
                      <option>Document/Content Creation</option>
                      <option disabled></option>
                      <option>Web Developer</option>
                      <option>PHP Developer</option>
                      <option>.Net Developer</option>
                      <option>Java Developer</option>
                      <option>iOS Developer</option>
                      <option>Android Developer</option>
                      <option>Frontend Developer</option>
                      <option>Backend Developer</option>
                      <option>Full Stack Developer</option>
                      <option>Software Developer</option>
                      <option>Sharepoint Developer</option>
                      <option>Senior CAKE Developer</option>
                      <option>IR Developer</option>
                      <option>Phyton Developer</option>
                      <option>Programmer</option>
                      <option disabled></option>
                      <option>Team leader</option>
                      <option>Executive Asssistant</option>
                      <option>Marketing Specialist</option>
                      <option>Debt Colletor</option>
                      <option>Sales</option>
                      <option>Telesales inout</option>
                      <option>Data Entry</option>
                      <option>Transcription</option>
                      <option>Service Delivery Manager</option>
                      <option>Lease Renewal & Rent Reviewa</option>
                      <option>Repairs & Maintenance Coordinator</option>
                      <option>Information Analyst</option>
                      <option>Admin Assistant</option>
                      <option>Recruitment Assistant</option>
                      <option>Virtual Reception</option>
                      <option>Lead Generation</option>
                      <option>Quality Assurance Officer</option>
                      <option>Events Coordinator</option>
                      <option>Clients Services Manager</option>
                      <option>Customer Service Representative</option>
                      <option>Travel Coordinator</option>
                      <option>Client Management Assistant</option>
                      <option disabled></option>
                      <option>Senior 3rd Line Engineer</option>
                      <option>Senior Draft Manager</option>
                      <option>Mid level Drafter</option>
                      <option>Associate Drafter</option>
                      <option>Technical Drawer</option>
                      <option>Quantity Surveyor</option>
                      <option disabled=""></option>
                      <option>Search Engine Optimization</option>
                      <option>Technical Writer</option>
                      <option>Information Analyst/Content Writer</option>
                      <option>SQA Software QA Engineer</option>
                      <option>SQA Consultant + Engineer</option>
                      <option>Technical Support</option>
                      <option>Help Desk</option>
                      <option disabled=""></option>
                      <option>Remote technician</option>
                      <option>Windows Server Admin</option>
                      <option>Network Operations Center</option>
                        
                                          

                      </select>
                      </div>

                        <div class="col-xs-4">                           

                       <label for="position2">Applied Position 2  <span id="requim">*</span></label>     
                       <select class="form-control "  name="position2" id="position2" required>
                      <option disabled=""></option>
                        <option>CPA</option>
                        <option>Head Bookkeeper</option>
                        <option>Support Bookkeeper</option>
                        <option>Accounting Support</option>
                        <option>Accounts Payable</option>
                        <option>Accounts Receivable</option>
                        <option>Purchasing Officer</option>
                        <option>Financial Analyst</option>
                        <option>Payroll Specialist</option>
                        <option>Payroll Assistant</option>
                        <option>Jr. Accountant</option>
                        <option disabled></option>
                        <option>Graphic Artist/Designer</option>
                      <option>InDesign Designer</option>
                      <option>Video Creation/Motion Graphics</option>
                      <option>Video/Audio Editor</option>
                      <option>Advertising/Marketing</option>
                      <option>Document/Content Creation</option>
                      <option disabled></option>
                      <option>Web Developer</option>
                      <option>PHP Developer</option>
                      <option>.Net Developer</option>
                      <option>Java Developer</option>
                      <option>iOS Developer</option>
                      <option>Android Developer</option>
                      <option>Frontend Developer</option>
                      <option>Backend Developer</option>
                      <option>Full Stack Developer</option>
                      <option>Software Developer</option>
                      <option>Sharepoint Developer</option>
                      <option>Senior CAKE Developer</option>
                      <option>IR Developer</option>
                      <option>Phyton Developer</option>
                      <option>Programmer</option>
                      <option disabled></option>
                      <option>Team leader</option>
                      <option>Executive Asssistant</option>
                      <option>Marketing Specialist</option>
                      <option>Debt Colletor</option>
                      <option>Sales</option>
                      <option>Telesales inout</option>
                      <option>Data Entry</option>
                      <option>Transcription</option>
                      <option>Service Delivery Manager</option>
                      <option>Lease Renewal & Rent Reviewa</option>
                      <option>Repairs & Maintenance Coordinator</option>
                      <option>Information Analyst</option>
                      <option>Admin Assistant</option>
                      <option>Recruitment Assistant</option>
                      <option>Virtual Reception</option>
                      <option>Lead Generation</option>
                      <option>Quality Assurance Officer</option>
                      <option>Events Coordinator</option>
                      <option>Clients Services Manager</option>
                      <option>Customer Service Representative</option>
                      <option>Travel Coordinator</option>
                      <option>Client Management Assistant</option>
                      <option disabled></option>
                      <option>Senior 3rd Line Engineer</option>
                      <option>Senior Draft Manager</option>
                      <option>Mid level Drafter</option>
                      <option>Associate Drafter</option>
                      <option>Technical Drawer</option>
                      <option>Quantity Surveyor</option>
                      <option disabled=""></option>
                      <option>Search Engine Optimization</option>
                      <option>Technical Writer</option>
                      <option>Information Analyst/Content Writer</option>
                      <option>SQA Software QA Engineer</option>
                      <option>SQA Consultant + Engineer</option>
                      <option>Technical Support</option>
                      <option>Help Desk</option>
                      <option disabled=""></option>
                      <option>Remote technician</option>
                      <option>Windows Server Admin</option>
                      <option>Network Operations Center</option>


                      </select>
                      </div>
                        <div class="col-xs-4">                           

                        <label for="position3">Applied Position 3  <span id="requim">*</span></label>
                       <select class="form-control " name="position3" id="position3" required>
                      <option disabled=""></option>
                        <option>CPA</option>
                        <option>Head Bookkeeper</option>
                        <option>Support Bookkeeper</option>
                        <option>Accounting Support</option>
                        <option>Accounts Payable</option>
                        <option>Accounts Receivable</option>
                        <option>Purchasing Officer</option>
                        <option>Financial Analyst</option>
                        <option>Payroll Specialist</option>
                        <option>Payroll Assistant</option>
                        <option>Jr. Accountant</option>
                        <option disabled></option>
                        <option>Graphic Artist/Designer</option>
                      <option>InDesign Designer</option>
                      <option>Video Creation/Motion Graphics</option>
                      <option>Video/Audio Editor</option>
                      <option>Advertising/Marketing</option>
                      <option>Document/Content Creation</option>
                      <option disabled></option>
                      <option>Web Developer</option>
                      <option>PHP Developer</option>
                      <option>.Net Developer</option>
                      <option>Java Developer</option>
                      <option>iOS Developer</option>
                      <option>Android Developer</option>
                      <option>Frontend Developer</option>
                      <option>Backend Developer</option>
                      <option>Full Stack Developer</option>
                      <option>Software Developer</option>
                      <option>Sharepoint Developer</option>
                      <option>Senior CAKE Developer</option>
                      <option>IR Developer</option>
                      <option>Phyton Developer</option>
                      <option>Programmer</option>
                      <option disabled></option>
                      <option>Team leader</option>
                      <option>Executive Asssistant</option>
                      <option>Marketing Specialist</option>
                      <option>Debt Colletor</option>
                      <option>Sales</option>
                      <option>Telesales inout</option>
                      <option>Data Entry</option>
                      <option>Transcription</option>
                      <option>Service Delivery Manager</option>
                      <option>Lease Renewal & Rent Reviewa</option>
                      <option>Repairs & Maintenance Coordinator</option>
                      <option>Information Analyst</option>
                      <option>Admin Assistant</option>
                      <option>Recruitment Assistant</option>
                      <option>Virtual Reception</option>
                      <option>Lead Generation</option>
                      <option>Quality Assurance Officer</option>
                      <option>Events Coordinator</option>
                      <option>Clients Services Manager</option>
                      <option>Customer Service Representative</option>
                      <option>Travel Coordinator</option>
                      <option>Client Management Assistant</option>
                      <option disabled></option>
                      <option>Senior 3rd Line Engineer</option>
                      <option>Senior Draft Manager</option>
                      <option>Mid level Drafter</option>
                      <option>Associate Drafter</option>
                      <option>Technical Drawer</option>
                      <option>Quantity Surveyor</option>
                      <option disabled=""></option>
                      <option>Search Engine Optimization</option>
                      <option>Technical Writer</option>
                      <option>Information Analyst/Content Writer</option>
                      <option>SQA Software QA Engineer</option>
                      <option>SQA Consultant + Engineer</option>
                      <option>Technical Support</option>
                      <option>Help Desk</option>
                      <option disabled=""></option>
                      <option>Remote technician</option>
                      <option>Windows Server Admin</option>
                      <option>Network Operations Center</option>


                      </select>
                    </div>

                      </div>
                  

               <hr>
               <div class="box-header with-border">
                  <h3 class="box-title">Personal Information</h3>
                </div>
                <div class="row">
             <div class="col-xs-4">
                     <label for="lname" >Last Name  <span id="requim">*</span></label>
                      <input type="text" class="form-control" placeholder="Last name" name="lname" id="lname" required>
                    </div>

                    <div class="col-xs-4">
                   <label for="fname">First Name  <span id="requim">*</span></label>
                      <input type="text" class="form-control " placeholder="First name" name="fname" id="fname" required>
                    </div>

                    <div class="col-xs-3">
                       <label for="mname">Middle Name</label>
                      <input type="text" class="form-control" placeholder="Middle name" name="mname" id="mname" required>
                    </div>
                    <div class="col-xs-1">
                       <label for="suffix">Suffix</label>
                      <input type="text" class="form-control" placeholder="" name="suffix" id="suffix" >
                    </div>
                    </div>
                    <br>
                    <div class="row">
                    <div class="col-xs-4">
                       <label for="address">Address <span id="requim">*</span> </label>
                      <input type="text" class="form-control" placeholder="" name="address" id="address" required>
                    </div>

                    <div class="col-xs-2">
                 <label for="barangay">Barangay <span id="requim">*</span></label>
                  <div id='town'>
                  <select name="barangay" id="barangay" class="form-control" required>
                   <option value="">Select</option>
                  </select> 
                    </div>
                  </select> 
                    </div>
                  
                    <div class="col-xs-2">
                       <label for="city">City <span id="requim">*</span></label>
                       <div id='city'>
                   <select  id="city" class="form-control" required>
                   <option value="">Select</option>

                  </select>
                    </div>
                    </div>

                    <div class="col-xs-4">
                       <label for="provincedd">Province <span id="requim">*</span></label>
                       <select id="provincedd" name="province" class="form-control" onChange="change_province();javacript: var valor = this.options[selectedIndex].text;    document.getElementById('shadow').value = valor;test(this);" required>
                   <option value="">Select</option>
                   <?php 
                     $province= mysqli_query($conn,"SELECT * FROM tbl_province ORDER by provDesc ASC");

                     while ($rows = mysqli_fetch_array($province)) {
                       # code...
                     echo ' <option value='.$rows[4].'>'.$rows[2].'</option>';
                     }
                   ?>
                     
                 </select>
                 <input name="province" type="hidden" id="shadow" value=""> 
                    </div>

                    </div>
                    <!-- NAMES -->
                    <br>
                     

                     <div class="row">
                    
                      <div class="col-xs-2">
                       <label for="gender">Gender  <span id="requim">*</span></label>
                      <select class="form-control" name="gender" id="gender" required>
                      <option>Male</option>
                      <option>Female</option>
                      </select>
                    </div>

                      <div class="col-xs-2">
                     <label for="dob">Date of Birth  <span id="requim">*</span></label>
                      <input type="Date" class="form-control" name="dob" id="dob" required>
                    </div>

                     <div class="col-xs-4">
                     <label for="placeofb">Place of Birth <span id="requim">*</span></label>
                      <input type="text" class="form-control" name="placeofb" id="placeofb" required>
                    </div>
                    
                    <div class="col-xs-2">
                   <label for="civil">Civil Status  <span id="requim">*</span></label>
                      <select class="form-control " placeholder="Civil status" name="civil" id="civil" required>
                     <option>Single</option>
                     <option>Married</option>
                     <option>Widowed </option>
                     <option>Separated </option>
                      <option>Divorced </option>
                      </select>

                    </div>

                     <div class="col-xs-2">
                     <label for="citizenship">Citizenship  <span id="requim">*</span></label>
                      <input type="text" class="form-control" name="citizenship" id="citizenship" required>
                    </div>
                  
                    </div>
                    
                    <br>
               <div class="row">
                   
                      <div class="col-xs-2">
                     <label for="contact">Contact No. 1 <span id="requim">*</span></label>
                      <input type="text" class="form-control" placeholder="Phone number" pattern="[0-9]{11}" title="Phone number" name="contact1" id="contact" required>
                    </div>

                     <div class="col-xs-2">
                     <label for="contact">Contact No. 2</label>
                      <input type="text" class="form-control" placeholder="Phone number" pattern="[0-9]{11}" title="Phone number" name="contact2" id="contact" required>
                    </div>

                    <div class="col-xs-4">
                     <label for="email">Email  <span id="requim">*</span></label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email address"
                      pattern='[A-Za-z0-9._%+-]{3,}@[a-zA-Z]{3,}([.]{1}[a-zA-Z]{2,}|[.]{1}[a-zA-Z]{2,}[.]{1}[a-zA-Z]{2,})' title="Please use your email"  required>
                    </div>
                    <div class="col-xs-4">
                     <label for="skype">Skype</label>
                      <input type="text" class="form-control" name="skype" id="skype" placeholder="Skype id" >
                    </div>

                    </div>  
                     <br>
                    <hr>
                    
                     <div class="box-header with-border">
                  <h3 class="box-title">Other Information</h3>
                </div>
                     <div class="row">
                    <div class="col-xs-3">
                     <label for="source">Source</label>
                     
                        <select class="form-control" name="source" id="source" required>
                        <option>Bestjobs.ph</option>
                        <option>Facebook</option>
                        <option>Indeed.com</option>
                        <option>Job Fair</option>
                        <option>Jobstreet.com.ph</option>
                        <option>LinkedIn</option>
                        <option>Online Media (online news, etc.)</option>
                        <option>Print Media (newspaper , magazine , etc.)</option>
                        <option>Radio</option>
                        </select>
                    </div>

                 
                    
                    <div class="col-xs-3">
                     <label for="assrank">Assessment Ranking</label>
                      <input type="text" class="form-control" name="assrank" id="assrank" placeholder="Rankings"  >
                    </div>
 
                       <div class="row">
                      <div class="col-xs-2">
                     <label for="appstatus">Application Status</label>
                      <select class="form-control"   name="appstatus" id="appstatus" required>
                      <option>PASS</option>
                      <option>FAILED</option>
                      </select>
                    </div>

                     <div class="col-xs-2">
                     <label for="olassess">Online Assessment</label>
                      <select class="form-control"    name="olassess" id="olassess" required>
                      <option>POOLING </option>
                         <option>ASSESSMENT</option>
                          <option>INITIAL INTERVIEW</option>
                         <option>SHORTLISTED</option>
                          <option>CLIENT INTERVIEW</option>
                          <option>HIRED</option>

                       
                      </select>
                    </div>
                    
                    </div>

                    </div>

                  </div><!-- /.tab-pane -->
               


                    <div class="tab-pane" id="tab_4">

                     
                   
                  

                     <div class="row">

                      <div class="col-xs-4">
                     <label for="attainment">Highest attainment <span id="requim">*</span></label>
                       <select class="form-control" name="attainment" id="attainment" required>
                          <option>HIGH SCHOOL</option>
                          <option>VOCATIONAL</option>
                         <option> UNDERGRAD - COLLEGE</option>
                         <option> ASSOCIATE DEGREE</option>
                         <option> COLLEGE DEGREE</option>
                         <option> MASTERS </option>

                        </select> 
                      </div>                    

                      <div class="col-xs-4">
                     <label for="School">College/University <span id="requim">*</span> </label>
                      <input type="text" class="form-control" placeholder="School name" name="school" id="School" required>
                    </div>
  
                   <div class="col-xs-2">
                     <label for="yearg">Year Graduated</label>
                      <input type="text" class="form-control" placeholder="ex.: 2014" name="yearg" id="yearg" required>
                    </div>

                    </div><br>
                   <div class="row">


                   

                    <div class="col-xs-4">
                     <label for="major">Major/Vocational</label>
                      <input type="text" class="form-control" placeholder="Major in ..." name="major" id="major"required>
                    </div>

                    <div class="col-xs-4">
                     <label for="course">Course</label>
                      <input type="text" class="form-control" placeholder="Course" name="course" id="course" required>
                    </div>

                    

                       

                      </div>  <br>

                       <div class="row">


                   

                    <div class="col-xs-4">
                     <label for="achieve">Achievement</label>
                      <input type="text" class="form-control" placeholder="Achievement" name="achieve" id="achieve">
                    </div>

                  


                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-4">
                     <label for="certfandawrds" >Certificates and Trainings</label>
                       <input type="hidden" class="form-control" placeholder="Certificates and Trainings" name="certif" id="certfandawrds"   required> 
                        <br>
                        <button type="button" class="btn btn-info btn-flat" id="add" onClick="document.getElementById('certfandawrds').type = 'text'" >Add Certificates and Trainings</button>
                          
                          <button type="button" class="btn btn-info btn-flat" id="remove" onClick="document.getElementById('certfandawrds').type = 'hidden'" style="display: none;">Remove Certificates and Trainings</button>
                     
                    </div>
                    </div>

                      <hr>

                   

                      <div class="box-header with-border">
                  <h3 class="box-title">Character Reference</h3>
                </div>
                   <div class="row">

                      <div class="col-xs-4">
                     <label for="lname" >Full Name</label>
                      <input type="text" class="form-control" placeholder="Full" name="char_name" id="lname">
                    </div>

                    <div class="col-xs-4">
                     <label for="company" >Company</label>
                      <input type="text" class="form-control" placeholder="Last name" name="company" id="company">
                    </div>

                    <div class="col-xs-4">
                     <label for="char_email" >Email</label>
                      <input type="text" class="form-control" placeholder="Last name" name="char_email" id="char_email">
                    </div>

                    </div>
                    <br>
                    <div class="row">

                      <div class="col-xs-4">
                     <label for="char_rel" >Relationship</label>
                      <input type="text" class="form-control" placeholder="Relationship" name="char_rel" id="char_rel">
                    </div>

                    <div class="col-xs-4">
                     <label for="char_contact" >Contact No.</label>
                      <input type="text" class="form-control" placeholder="Contact No." name="char_contact" id="char_contact">
                    </div>
                    <br>
                    <div class="col-xs-4">
             <button type="button" class="btn btn-info pull-right" id="addpeople" >Add </button>
                          </div>
                          

                    </div>

                          </div>
                    <!-- /.tab-pane -->
                </div><!-- /.tab-content -->

              </div><!-- nav-tabs-custom -->

            </div><!-- /.col -->

           
          </div> <!-- /.row -->
                </form>


         
  
  



  <?php 
    $query = mysqli_query($conn,"SELECT * FROM tbl_applicant");


    while ($row = mysqli_fetch_array($query)) {
      echo " 
      ";
      # code...
    }
  ?>
 
                    
        </section>
      </div>
      </div>
 
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>


<!-- <script type="text/javascript">
  $(window).bind('beforeunload', function(){
  return 'Are you sure you want to leave?';
});
</script>  -->


<script type="text/javascript">
function change_town(){
var xmlhttp= new XMLHttpRequest();
xmlhttp.open("GET","add_city.php?city="+document.getElementById("citydd").value,false);
xmlhttp.send(null);
 
document.getElementById("town").innerHTML = xmlhttp.responseText ; 


  }

function change_province(){
var xmlhttp= new XMLHttpRequest();

xmlhttp.open("GET","add_prov.php?province="+document.getElementById("provincedd").value,false);

xmlhttp.send(null);

document.getElementById("city").innerHTML = xmlhttp.responseText ; 
 

 document.getElementById("town").innerHTML='<select class="form-control" required><option>Select</option></select>';
   
 }
function test(select){
 $("option[value='disable']",select).hide();
}
 


  </script>

<script>
    var createAllErrors = function() {
        var form = $( this ),
            errorList = $( "ul.errorMessages" , form);

        var showAllErrorMessages = function() {
            errorList.empty();

            // Find all invalid fields within the form.
            var invalidFields = form.find( ":invalid" ).each( function( index, node ) {

                // Find the field's corresponding label
                var label = $( "label[for=" + node.id + "] "),
                    // Opera incorrectly does not fill the validationMessage property.
                    message = node.validationMessage || 'Invalid value.';

                errorList
                    .show()
                    .append( "<li><span >" + label.html() + "</span> " + message + "</li>" );

            });
        };

        // Support Safari
        form.on( "submit", function( event ) {
            if ( this.checkValidity && !this.checkValidity() ) {
                $( this ).find( ":invalid" ).first().focus();
                event.preventDefault();
            }
        });

        $( "input[type=submit], button:not([type=button])", form )
            .on( "click", showAllErrorMessages);

        $( "input", form ).on( "keypress", function( event ) {
            var type = $( this ).attr( "type" );
            if ( /date|email|month|number|search|tel|text|time|url|week/.test ( type )
              && event.keyCode == 13 ) {
                showAllErrorMessages();
            }
        });
    };
    
    $( "form" ).each( createAllErrors );


   
</script>
<script type="text/javascript">
//    $(function() {
//     $('#clear').click(function() {
//         $('.errorMessages').html('');                
//     });
// });
    
    $(document).on('click', '#clear', function(){  
           
        $('.errorMessages').html('');                
        
  
       });
</script>

<!-- 
script for leaving
<script type="text/javascript">
  var unsaved = false;

$(":input").change(function(){ //trigers change in all input fields including text type
    unsaved = true;
});

function unloadPage(){ 
    if(unsaved){
        return "You have unsaved changes on this page. Do you want to leave this page and discard your changes or stay on this page?";
    }
}

window.onbeforeunload = unloadPage;
</script> -->

<script type="text/javascript">
  
 
   $("#add").click(function() {
        $("#remove").toggle();
          $("#add").hide();

});
   
   $("#remove").click(function() {
        $("#add").toggle();
        $("#remove").hide();


});

// $("#addpeople").click(function() {
//   $(".addpeople2").toggle();
// });
 
</script>


  </body>
</html>


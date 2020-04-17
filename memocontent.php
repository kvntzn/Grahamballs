 <?php session_start();
if(!isset($_SESSION['username'])){
  header("location:index.php");
}
include 'lib\controller.php';

  $output = '';
$output .= '
<div class="col-lg-12">';
                        
                            $id=$_POST['id'];
                            $get=mysqli_query($conn,"SELECT * from tbl_memo WHERE memo_id=$id");
                                while($query=mysqli_fetch_array($get))
                                        {   
                                            $title=$query['memo_title'];
                                            $content=$query['memo_content'];
                                            $sender=$query['memo_sender'];
                                            $date=$query['memo_date'];
                                            $time=$query['memo_time'];
                                            $control=1;
                                    }
                            $control_update=mysqli_query($conn,"UPDATE tbl_memo SET memo_control='$control' WHERE memo_id='$id'");
                          

                   $output .= '<div class="well">
                            <h3>Title: '.$title.' </h3>
                            <p class="text-default">
                                <b>'.$content.'</b>
                            </p>
                            <blockquote class="blockquote">
                                From:  '.$sender.'
                                <br>
                                '.$time.' '.$date.'
                            </blockquote>
                        </div>
                </div>';


                 echo $output;
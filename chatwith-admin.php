
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        
    </head>
    <body>
       <?php include('includes/header.php');?>
            
       
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Chat with admin</div>
                    </div>
                   
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                           
                                <?php if($msg) { ?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php } ?>
    <aside>
                <p class="sidebar-chat-name">Tom Simpson<a href="#" data-activates="chat-messages" class="chat-message-link"><i class="material-icons">keyboard_arrow_right</i></a></p>
                <div class="messages-container">

                    <?php 
$eid=$_SESSION['emplogin'];
$sql = "SELECT * from  tblchating where empid=:eid";
$query = $dbh -> prepare($sql);
$query -> bindParam(':eid',$eid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?> 
                    <div class="message-wrapper them">
                        <div >Me fgfdgdfgfd</div>
                        <div class="text-wrapper"><?php echo htmlentities($result->chat);?></div>
                    </div>
                    <div class="message-wrapper me">
                        <div class="circle-wrapper"><img src="assets/images/profile-image-3.jpg" class="circle" alt=""></div>
                        <div class="text-wrapper"><?php $st=$result->admin;
                       // if($st==1){

                       //  echo htmlentities($result->chat);

                    // };?></div>
                    </div>
                   
                </div>
                <div class="message-compose-box">
                    <div class="input-field">
                        <input placeholder="Write message" id="message_compose" type="text">
                    </div>
                </div>
                <?php }} ?>
            </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
         
        </div>
        <div class="left-sidebar-hover"></div>
        
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        <script src="assets/js/pages/table-data.js"></script>
        
    </body>
</html>
<?php } ?>
<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="navbar.css">
 <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <script type="text/javascript">
 	$(document).ready(function(){
       $(".profile .icon_wrap").click(function(){
           $(this).parent().toggleClass('active');
           $('.notifications').removeClass('active');
       });
       $('.notifications .icon_wrap').click(function(){
          $(this).parent().toggleClass('active');
          $(".profile").removeClass("active");
       });
 	});
 </script>
</head>
<body>
  <?php 
  include 'mysqli.php';
  session_start();
  if (!isset($_SESSION['user_id'])) 
  {
  	header('Location:register.html');
  }
  $query="SELECT * FROM `tb_user` where user_id ='".$_SESSION['user_id']."'";

  $stm=$connect->prepare($query);
  $stm->execute();
  $row=$stm->fetch(PDO::FETCH_ASSOC);
  
  if ($row['img_user'] != "") 
  {
    $img_profile='<img src="'.$row['img_user'].'"/>';
  }else{
  	$img_profile='<img src="male-profile.jpg"/>';
  }
  ?>
  <div class="wrapper">
  	<div class="navbar">
  		<div class="navbar_left">
  	    </div>
  	    <div class="navbar_right">
  	    	<div class="notifications">
  	    	  <div class="icon_wrap">
                  <i class="far fa-comment-alt"></i>
            </div>
           <div class="notification_dd">
            <ul class="notification_ul">
                <li class="starbucks success">
                    <div class="notify_icon">
                        <span class="icon"></span>  
                    </div>
                    <div class="notify_data">
                        <div class="title">
                         njnjnjn
                        </div>
                        <div class="sub_title">
                         ***************
                        </div>
                    </div>
                </li> 
                 <li class="starbucks success">
                    <div class="notify_icon">
                        <span class="icon"></span>  
                    </div>
                    <div class="notify_data">
                        <div class="title">
                          *****************
                        </div>
                        <div class="sub_title">
                          ******************
                        </div>
                    </div>
                </li> 
            </ul>
        </div>
  	  </div>
  	    <div class="profile">
        <div class="icon_wrap">
          <?php echo $img_profile;?>
          <span class="name"><?php echo $row['username'];?></span>
          <i class="fas fa-chevron-down"></i>
        </div>
        <div class="profile_dd">
          <ul class="profile_ul">
            <li><a class="logout" href="logout.php"><span class="picon"><i class="fas fa-sign-out-alt"></i></span>Logout</a></li>
          </ul>
        </div>
      </div>
  	 </div>
  	</div>
  </div>
</body>
</html>
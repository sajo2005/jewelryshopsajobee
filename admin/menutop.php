<header class="main-header">
  
  <a href="" class="logo">
  
    <span class="logo-mini"><b>LTE</b></span>
  
    <span class="logo-lg"><b>SYSTEM
    </b></span>
  </a>
  
  <nav class="navbar navbar-static-top" role="navigation">
  
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
      
        
         <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="../m_img/<?php echo $row['m_img'];?>" width="25" height="25" class="img-circle user-image" alt="User Image">
                <span class="hidden-xs">Welcome Admin</span>
              </a>
              <ul class="dropdown-menu">
              
                <li class="user-header">
                  <img src="../m_img/<?php echo $row['m_img'];?>"class="img-circle" alt="User Image user-image">
                  
                  <p>
                    Admin<br>
                    
                    <small>Name : <?php echo $m_name;?>
                    </small>
                  </p>
                </li>
                <!-- Menu Body -->
                
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat" disabled>Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="../logout.php" class="btn btn-default btn-flat" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่ ?');">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
      </ul>
    </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
             <li><a href="index.php">  ระบบร้านค้าออนไลน์ Shopping Cart</a></li>

           
              </ul>
            </li>
            
          </ul>
        </div>
  </nav>
</header>
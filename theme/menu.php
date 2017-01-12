  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Navigation</a></div>

        <!--- Sidebar navigation -->
        <!-- If the main navigation has sub navigation, then add the class "has_sub" to "li" of main navigation. -->
        <ul id="nav">
		
			<?php 
				$logiSebagi = $_SESSION['level'];
				
				if($logiSebagi =='1'){
						include_once "menu_admin.php";
				}
				elseif($logiSebagi =='2'){
						include_once "menu_manager.php";
					}
				
				else{
					include_once "menu_member.php";
				}
			
			?>
          <!-- Main menu with font awesome icon -->
        
        </ul>
    </div>

    <!-- Sidebar ends -->

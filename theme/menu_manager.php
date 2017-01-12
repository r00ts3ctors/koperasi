  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Navigation</a></div>

        <!--- Sidebar navigation -->
        <!-- If the main navigation has sub navigation, then add the class "has_sub" to "li" of main navigation. -->
        <ul id="nav">
          <!-- Main menu with font awesome icon -->
          <li class="open"><a href="index.php?modul=home"><i class="fa fa-home"></i> Dashboard</a>
           </li>

          <li class="has_sub">
			<a href="#"><i class="fa fa-list-alt"></i> Master Data  <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
              <li><a href="?modul=anggota&act=input">Anggota</a></li>
              <li><a href="?modul=petugas">Manager &amp; Staf</a></li>
			 <!--
			 <li><a href="?modul=pengaturan">Buka Cabang</a></li>-->
             
			 
			</ul>
          </li> 
		  
		  <li class="has_sub">
			<a href="#"><i class="fa fa-list-alt"></i> Transaksi <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
              <li><a href="?modul=simpan">Simpana &amp; Penarikan</a></li>
              <li><a href="?modul=pinjam">Pinjaman &amp; Angsuran</a></li>
              <li><a href="?modul=setor&act=listing">Setor Penerimaan</a></li>
              
            </ul>
          </li> 
		  
		  <li class="has_sub">
			<a href="#"><i class="fa fa-list-alt"></i> Laporan <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
              <li><a href="?modul=laporan&aksi=anggota">Data Anggota</a></li>
              <li><a href="?modul=laporan&aksi=simpan">Simpanan Anggota</a></li>
              <li><a href="?modul=laporan&aksi=pinjam">Pinjaman Anggota</a></li>
    

			  
            </ul>
          </li> 
		  
		   
			 <li>
			<a href="?modul=kontrak"><i class="fa fa-file-o"></i> LIST DOCUMENT  <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a></li>
		
		

		 <li>
			<a href="logout.php"><i class="fa fa-file-o"></i> KELUAR  <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a></li>
        </ul>
    </div>

    <!-- Sidebar ends -->

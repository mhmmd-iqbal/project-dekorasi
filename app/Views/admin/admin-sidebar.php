 <!--sidebar start-->
 <aside>
     <div id="sidebar" class="nav-collapse ">
         <!-- sidebar menu start-->
         <ul class="sidebar-menu" id="nav-accordion">
             <li>
                 <a class="<?= $active == 'dashboard' ? 'active' : '' ?>" href="/admin">
                     <i class="fa fa-dashboard"></i>
                     <span>Dashboard</span>
                 </a>
             </li>



             <li class="sub-menu">
                 <a href="javascript:;" class="<?= $active == 'masterdata' ? 'active' : '' ?>">
                     <i class="fa fa-cogs"></i>
                     <span>Master Data</span>
                 </a>
                 <ul class="sub">
                     <li class="master" id="admin"><a href="/admin/md-admin">Data Admin</a></li>
                     <li class="master" id="user"><a href="">Data User</a></li>
                     <li class="master" id="paket"><a href="">Data Paket Sewa</a></li>
                 </ul>
             </li>

             <li>
                 <a class="" href="index.html">
                     <i class="fa fa-th"></i>
                     <span>List Jasa Dekorasi</span>
                 </a>
             </li>

             <li>
                 <a class="" href="index.html">
                     <i class="fa fa-comments-o"></i>
                     <span>FAQs</span>
                 </a>
             </li>
             <li class="sub-menu">
                 <a href="javascript:;">
                     <i class=" fa fa-bar-chart-o"></i>
                     <span>Report</span>
                 </a>
                 <ul class="sub">
                     <li><a href="">Data Paket Sewa</a></li>
                     <li><a href="">Data User</a></li>
                     <li><a href="">Data Penyewaan Iklan</a></li>
                     <li><a href="">Invoice</a></li>
                 </ul>
             </li>
             <li>
                 <a href="">
                     <i class="fa fa-user"></i>
                     <span>My Account</span>
                 </a>
             </li>
             <li>
                 <a href="/logout">
                     <i class="fa fa-power-off text-danger"></i>
                     <span>Log Out</span>
                 </a>
             </li>

             <!--multi level menu start-->
             <!-- <li class="sub-menu">
                 <a href="javascript:;">
                     <i class="fa fa-sitemap"></i>
                     <span>Multi level Menu</span>
                 </a>
                 <ul class="sub">
                     <li><a href="javascript:;">Menu Item 1</a></li>
                     <li class="sub-menu">
                         <a href="boxed_page.html">Menu Item 2</a>
                         <ul class="sub">
                             <li><a href="javascript:;">Menu Item 2.1</a></li>
                             <li class="sub-menu">
                                 <a href="javascript:;">Menu Item 3</a>
                                 <ul class="sub">
                                     <li><a href="javascript:;">Menu Item 3.1</a></li>
                                     <li><a href="javascript:;">Menu Item 3.2</a></li>
                                 </ul>
                             </li>
                         </ul>
                     </li>
                 </ul>
             </li> -->
             <!--multi level menu end-->

         </ul>
         <!-- sidebar menu end-->
     </div>
 </aside>
 <!--sidebar end-->
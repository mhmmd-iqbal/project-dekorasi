 <!--sidebar start-->
 <aside>
     <div id="sidebar" class="nav-collapse ">
         <!-- sidebar menu start-->
         <ul class="sidebar-menu" id="nav-accordion">
             <li>
                 <a class="<?= $active == 'dashboard' ? 'active' : '' ?>" href="/sys">
                     <i class="fa fa-home"></i>
                     <span>Dashboard</span>
                 </a>
             </li>

             <li>
                 <a class="<?= $active == 'profile' ? 'active' : '' ?>" href="/sys/profile">
                     <i class="fa fa-building"></i>
                     <span>App Profile</span>
                 </a>
             </li>



             <li class="sub-menu">
                 <a href="javascript:;" class="<?= $active == 'masterdata' ? 'active' : '' ?>">
                     <i class="fa fa-cogs"></i>
                     <span>Master Data</span>
                 </a>
                 <ul class="sub">
                     <li class="master" id="admin"><a href="/sys/admin">Data Admin</a></li>
                     <li class="master" id="user"><a href="/sys/user">Data User</a></li>
                     <li class="master" id="seller"><a href="/sys/seller">Data Seller</a></li>
                     <li class="master" id="customer"><a href="/sys/customer">Data Customer</a></li>
                     <li class="master" id="kategori"><a href="/sys/category">Data Kategori Produk</a></li>
                 </ul>
             </li>


             <li>
                 <a class="<?= $active == 'banner' ? 'active' : '' ?>" href="/sys/banner">
                     <i class="fa fa-exclamation-triangle"></i>
                     <span>Banner</span>
                 </a>
             </li>

             <li class="sub-menu">
                 <a href="javascript:;" class="<?= $active == 'blog' ? 'active' : '' ?>">
                     <i class="fa fa-outdent"></i>
                     <span>Blog Konten</span>
                 </a>
                 <ul class="sub">
                     <li class="sub_blog" id="konten_blog"><a href="/sys/blog">Konten</a></li>
                     <li class="sub_blog" id="kategori_blog"><a href="/sys/cat_blog">Kategori</a></li>
                 </ul>
             </li>
             <!-- <li>
                 <a class="" href="index.html">
                     <i class="fa fa-th"></i>
                     <span>Data Produk User</span>
                 </a>
             </li>

             <li>
                 <a class="" href="index.html">
                     <i class="fa fa-shopping-cart"></i>
                     <span>Data Transaksi</span>
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
                     <li><a href="">Data User</a></li>
                     <li><a href="">Data Transaksi</a></li>
                     <li><a href="">Data Pembeli</a></li>
                     <li><a href="">Invoice</a></li>
                 </ul>
             </li> -->
             <li>
                 <a href="">
                     <i class="fa fa-user-circle"></i>
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
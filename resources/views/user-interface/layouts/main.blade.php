 <!DOCTYPE html>
 <html lang="en">

 <head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>Siakad | Uniba</title>

   <!-- Custom fonts for this template-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
     integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link
     href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
     rel="stylesheet">
   <!-- Custom styles for this template-->
   <link href="{{ asset('assets') }}/css/sb-admin-2.min.css" rel="stylesheet">
   <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.css') }}">
   <style>
     .table tr td {
       white-space: nowrap;
     }
   </style>
 </head>

 <body id="page-top">

   <!-- Page Wrapper -->
   <div id="wrapper">

     <!-- Sidebar -->
     <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

       <!-- Sidebar - Brand -->
       <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
           <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3">Siakad | Uniba </div>
       </a>

       <!-- Divider -->
       <hr class="sidebar-divider my-0">

       <!-- Nav Item - Dashboard -->
       <li class="nav-item">
         <a class="nav-link" href="{{ route('dashboard') }}">
           <i class="fas fa-fw fa-tachometer-alt"></i>
           <span>Dashboard</span></a>
       </li>

       <!-- Divider -->
       <hr class="sidebar-divider">

       <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
           <i class="fas fa-fw fa-cog"></i>
           <span>Data akademik</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
           <div class="collapse-inner rounded bg-white py-2">
             <a class="collapse-item" href="{{ route('mahasiswa.index') }}">Siswa</a>
             <a class="collapse-item" href="{{ route('mata-kuliah.index') }}">Mata Kuliah</a>
             <a class="collapse-item" href="{{ route('kelas.index') }}">Kelas</a>
             <a class="collapse-item" href="{{ route('dosen.index') }}">Dosen</a>
             <a class="collapse-item" href="{{ route('prodi.index') }}">Prodi</a>
             <a class="collapse-item" href="{{ route('nilai.index') }}">Nilai Mahasiswa</a>
           </div>
         </div>
       </li>

       <!-- Nav Item - Utilities Collapse Menu -->
       <!-- Divider -->
       <hr class="sidebar-divider d-none d-md-block">

       <!-- Sidebar Toggler (Sidebar) -->
       <div class="d-none d-md-inline text-center">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
       </div>

     </ul>
     <!-- End of Sidebar -->

     <!-- Content Wrapper -->
     <div id="content-wrapper" class="d-flex flex-column">

       <!-- Main Content -->
       <div id="content">

         <!-- Topbar -->
         <nav class="navbar navbar-expand navbar-light topbar static-top mb-4 bg-white shadow">

           <!-- Sidebar Toggle (Topbar) -->
           <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
             <i class="fa fa-bars"></i>
           </button>

           <!-- Topbar Navbar -->
           <ul class="navbar-nav ml-auto">

             <!-- Nav Item - Search Dropdown (Visible Only XS) -->
             <li class="nav-item dropdown no-arrow d-sm-none">
               <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-search fa-fw"></i>
               </a>
               <!-- Dropdown - Messages -->
               <div class="dropdown-menu dropdown-menu-right animated--grow-in p-3 shadow"
                 aria-labelledby="searchDropdown">
                 <form class="form-inline w-100 navbar-search mr-auto">
                   <div class="input-group">
                     <input type="text" class="form-control bg-light small border-0" placeholder="Search for..."
                       aria-label="Search" aria-describedby="basic-addon2">
                     <div class="input-group-append">
                       <button class="btn btn-primary" type="button">
                         <i class="fas fa-search fa-sm"></i>
                       </button>
                     </div>
                   </div>
                 </form>
               </div>
             </li>

             <div class="topbar-divider d-none d-sm-block"></div>

             <!-- Nav Item - User Information -->
             <li class="nav-item dropdown no-arrow">
               <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <span class="d-none d-lg-inline small mr-2 text-gray-600">{{ auth()->user()->nickname }}</span>
                 <img class="img-profile rounded-circle" src="{{ asset('assets') }}/img/undraw_profile.svg">
               </a>
               <!-- Dropdown - User Information -->
               <div class="dropdown-menu dropdown-menu-right animated--grow-in shadow" aria-labelledby="userDropdown">
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                   <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                   Logout
                 </a>
               </div>
             </li>

           </ul>

         </nav>
         <!-- End of Topbar -->

         <!-- Begin Page Content -->
         @yield('main-content')
         <!-- /.container-fluid -->

       </div>

       <!-- End of Main Content -->

       <!-- Footer -->
       <footer class="sticky-footer bg-white">
         <div class="container my-auto">
           <div class="copyright my-auto text-center">
             <span>Copyright &copy; Siakad | Uniba</span>
           </div>
         </div>
       </footer>
       <!-- End of Footer -->

     </div>
     <!-- End of Content Wrapper -->

   </div>
   <!-- End of Page Wrapper -->

   <!-- Scroll to Top Button-->
   <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
   </a>

   <!-- Logout Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
           <button class="close" type="button" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">×</span>
           </button>
         </div>
         <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
         <div class="modal-footer">
           <form action="{{ route('logout') }}" method="post">
             @csrf
             @method('DELETE')
             <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
             <button type="submit" class="btn btn-primary">Logout</button>
           </form>
         </div>
       </div>
     </div>
   </div>

   <!-- Bootstrap core JavaScript-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
     integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
     crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <!-- Core plugin JavaScript-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"
     integrity="sha512-0QbL0ph8Tc8g5bLhfVzSqxe9GERORsKhIn1IrpxDAgUsbBGz/V7iSav2zzW325XGd1OMLdL4UiqRJj702IeqnQ=="
     crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
   <script src="{{ asset('assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <!-- Custom scripts for all pages-->
   <script src="{{ asset('assets') }}/js/sb-admin-2.min.js"></script>

   <script>
     let dataTable = $('#dataTable');
     $(document).ready(function() {
       if (dataTable) {
         dataTable = $('#dataTable').DataTable();
       }
     });
   </script>

 </body>

 </html>

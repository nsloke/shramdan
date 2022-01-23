
@php
    use App\Http\Controllers\AdminAuthController;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>श्रमदान</title>

    <!-- Custom fonts for this template-->
    
    <link rel="stylesheet" href="{{ URL::asset('/vendor/fontawesome-free/css/all.min.css') }}">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="{{ URL::asset('/css/sb-admin-2.min.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home">
                <div class="sidebar-brand-icon rotate-n-15">
                    <!--Logo-->
                </div>
                <div class="sidebar-brand-text mx-3">श्रमदान</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>डॅशबोर्ड</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
            डॅशबोर्ड
            </div>



            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwox"
                    aria-expanded="true" aria-controls="collapseTwox">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>काम </span>
                </a>
                <div id="collapseTwox" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">काम :</h6>
                        <a class="collapse-item" href="addWorkSystem">काम जोडा</a>
                        <a class="collapse-item" href="deleteWorkSystem">काम काढा</a>
                        <a class="collapse-item" href="addWorkTypeSystem">काम प्रकार जोडा</a>
                        <a class="collapse-item" href="deleteWorkTypeSystem">काम प्रकार काढा</a>
                        <a class="collapse-item" href="addSupervisorSystem">पर्यवेक्षक जोडा</a>
                    </div>
                </div>
            </li>


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>साहित्य </span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">साहित्य:</h6>
                        <a class="collapse-item" href="addMaterialSystem">साहित्य जोडा</a>
                        <a class="collapse-item" href="deleteMaterialSystem">साहित्य काढा</a>
                        <a class="collapse-item" href="addMaterialTypeSystem">साहित्य प्रकार जोडा</a>
                        <a class="collapse-item" href="deleteMaterialTypeSystem">साहित्य प्रकार काढा</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>औजारे</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">औजारे </h6>
                        <a class="collapse-item" href="addEquipmentSystem">औजारे जोडा</a>
                        <a class="collapse-item" href="deleteEquipmentSystem">औजारे काढा</a>
                        <a class="collapse-item" href="addEquipmentTypeSystem">औजारे प्रकार जोडा</a>
                        <a class="collapse-item" href="deleteEquipmentTypeSystem">औजारे प्रकार काढा</a>
                    </div>
                </div>
            </li>


            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2"
                    aria-expanded="true" aria-controls="collapseUtilities2">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span> रिपोर्ट </span>
                </a>
                <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">रिपोर्ट :</h6>
                        <a class="collapse-item" href="reportmaker">रिपोर्ट बनवा </a>
                    
                        
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            
           

          

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

           
         

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                       

                        <!-- Nav Item - Messages -->
                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ AdminAuthController::getAdminInfo(); }}</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    प्रोफाइल
                                </a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    लॉगआउट
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">डॅशबोर्ड</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="container" style="padding-left:2.5rem; padding-right:1.5rem;">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Add Supervisor Account</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row d-sm-flex align-items-center justify-content-between">

                        <!-- Earnings (Monthly) Card Example -->
                        
                      <div class="col-md-4">  
                            <form >
                                @csrf

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" id="useremail" name="useremail" placeholder="Email" >
                                </div>


                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="User's Name" >
                                </div>


                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" >
                                </div>

<!--
                                <div class="form-group">
                                    <label>Admin Type</label>
                                    <select name="seladmtype" id="seladmtype" class="form-control">
                                            
                                    </select>
                                </div>
-->

                                <div class="form-group">
                                <button class="btn btn-primary form-control" onclick="saveadmin();" >Save Supervisor </button>
                                </div>
                            </form>
                       </div>
                    
                       <div class="col-md-8">
                       <div class="table-responsive-sm" id="coursenameid">
                        
                        </div>
                     </div>    
                    

                        


                       

                        
                </div>


                    <!-- Content Row -->
                    

                        

                       

                   

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



   





            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2021</span>
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
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>





    <script type='text/javascript'>

$(document).ready(function(){
// $('#option5').addClass("optionvsmnote");

        $.ajax({
        url: '/api/fetchAdminRoles',
        type: 'get',
        success: function(response){

            var len = 0;
            if(response['data'] != null){
                len = response['data'].length;
            }

            if(len > 0){
                // Read data and create <option >
                var defaulto="<option>Select Admin Type</option>";
                $("#selcourse").append(defaulto);
                for(var i=0; i<len; i++){

                var id = response['data'][i].roleid;
                var name = response['data'][i].roles;

                var option = "<option value='"+id+"'>"+name+"</option>";

                $("#seladmtype").append(option); 
                }
            }

        }
        });
});
</script>



<script>

    function saveadmin() {
        event.preventDefault();
        var username=document.getElementById('username').value;
        var useremail=document.getElementById('useremail').value;
       // var admtype=document.getElementById('seladmtype').value;
        var admtype=2;
        var password=document.getElementById('password').value;
        var urls="saveadmusr";
        var params = 'useremail='+useremail+"&username="+username+"&password="+password+"&role="+admtype;
        var headers = {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        };

        var tokenz=$('meta[name="csrf-token"]').attr('content');

        console.log(urls);
                if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
                }
                else
                {// code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function()
                {
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                   // window.location.reload();
                var some=xmlhttp.responseText;
               // document.getElementById("outputinfo").innerHTML=some;
                alert(some);
                }
                }
                xmlhttp.open("POST",urls,true);
                xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xmlhttp.setRequestHeader('X-CSRF-TOKEN', tokenz);
                xmlhttp.send(params);

               // ajaxCall();
               document.getElementById('username').reset();
               document.getElementById('useremail').reset();
               document.getElementById('password').reset();

        
      }
</script>



</body>

</html>
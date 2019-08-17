<?php
//check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $filename=$_POST['file'];
    $filename_withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
    
    //command to execute python using php
    $command = escapeshellcmd("python extract_pdf.py $filename_withoutExt");
    $output = shell_exec($command);
    if($output == "NULL"){
        ?>
        <script>alert('Some error in scrapping URLs ')</script>
    <?php
    }else{
      //alert('URLs Scrapped Successfully and saved in text format');
        echo "<script>
        window.location.href='dashboard?file=$filename_withoutExt';
        </script>";
       
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>iDORAN v2</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.9/styles/ir-black.min.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <style>
  .card-body {
    padding: 0;
}
.table {
    width: 100.1%;
    margin-bottom: 0;
    color: #858796;
    border-radius: 0;
    margin: 0;
    padding: 0;
    float: left;
}
.padding-20{padding: 20px;}
.padding-15{padding: 0 25px;}
.visibility-hidden{
  visibility: hidden;
}
.card-header {
    background-color: #0066b3;
    border-bottom: 1px solid #0066b3;
}
.card-header .text-primary {
    color: #fff !important;
}
.table .thead-light th {
    color: #fff;
    background-color: #000000;
    border-color: #000000;
    padding: 0.372rem .75rem;
}
.table {
    color: #000;
}
.table td, .table th {
  padding: 0.372rem .75rem;
}
.card-header {
    padding: .372rem .75rem;
}
.form-control:disabled, .form-control[readonly] {
    background-color: #000;
    opacity: 1;
    color: #fff;
}
textarea.form-control:focus {
    color: #ffffff;
    background-color: #000;
    border-color: #000000;
    outline: 0;
    -webkit-box-shadow: none;
    box-shadow: none;
}
.table tr > td:first-child {
    font-weight: bold;
    min-width: 120px;
}
#pageLoading{display:none;}
div.loading {
    position: fixed;
}
div#mainContainer {
    min-height: calc(100vh - 158px);
}







.project-tab #tabs{
    background: #000;
    color: #eee;
}
.project-tab #tabs h6.section-title{
    color: #eee;
}
.project-tab #tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #0062cc;
    background-color: transparent;
    border-color: transparent transparent #f3f3f3;
    border-bottom: 3px solid !important;
    font-size: 16px;
    font-weight: bold;
}
.project-tab .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: #0062cc;
    font-size: 16px;
    font-weight: bold;
}
.project-tab .nav-link:hover {
    border: 1px solid transparent;
}
.project-tab thead{
    background: #f3f3f3;
    color: #333;
}
.project-tab a{
    text-decoration: none;
    color: #333;
}
code.json.hljs {
    margin-top: -15px;
    background: #000;
}
pre {
    float: left;
    width: 100%;
    margin: 0;
    padding: 0;
    height: 235px;
    background: #000;
}
.dataTables_scrollHead:before {
    content: '';
    position: absolute;
    width: 17px;
    height: 34px;
    background: #000;
    right: 0;
    top: 1px;
    border-left: solid 1px #e3e6f0;
}
.table thead th {
    vertical-align: bottom;
    border-bottom: 0;
    background: #000;
    color: #fff;
}
textarea#exampleFormControlTextarea1 {
    height: 279px;
}
.nav-tabs .nav-link.active {
    border-bottom: 0 !important;
    border-top: 0;
    border-radius: 0;
    background: #ccc;
    color: #000;
    position: relative;
}
.nav-tabs .nav-link.active:before {
    content: '';
    position: absolute;
    width: 5px;
    height: 23px;
    background: #000;
    top: 8px;
    left: 25%;
}
.nav-tabs .nav-link.active:after {
    content: '';
    position: absolute;
    width: 5px;
    height: 23px;
    background: #000;
    top: 8px;
    right: 25%;
}
.table td, .table th {
    word-break: break-all;
    font-size: 13px;
    color: #000;
    vertical-align: middle;
}
.table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(0, 0, 0, 0.15);
}
.table-bordered th, .table-bordered td {
    border: 1px solid #ccc;
}

table.dataTable thead .sorting:before, table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:before, table.dataTable thead .sorting_desc_disabled:after {
    position: absolute;
    top: .5em;
    display: block;
    opacity: 0.8;
    width: 15px;
    text-align: center;
    font-size: 13px;
    font-weight: bold;
    font-family: "Font Awesome 5 Free";
    height: 10px;
    line-height: 10px;
}
table.dataTable thead .sorting:before, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_desc_disabled:before {
    content: "\f0d7";
    text-align: center;
    right: .4em !important;
    top: 1.1em !important;
}
table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after {
    right: 0.4em;
    content: "\f0d8";
}
div#example_filter {
    display: none;
}
table.dataTable {
    clear: both;
    margin-top: 0px !important;
}
input#processBtn {
    display: none;
}
  </style>
</head>

<body id="page-top">
<div class="loading" id="pageLoading">
                          <div class='uil-ring-css' style='transform:scale(0.79);'>
                            <div></div>
                          </div>
                        </div>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Topbar Search -->
          <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <img src="img/logo-v2.jpg">
          </div>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
         <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Rakesh Gupta</span>
                <img class="img-profile rounded-circle" src="img/rg.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid" id="mainContainer">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Admin Console</h1>
           </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Select document</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body padding-20">
                      
            <form>
                <div class="form-group">
                  <input type="file" class="form-control-file" id="exampleFormControlFile1" required>
                </div>
              </form>
                    </div>
                  </div>
          </div>
          </div>
          <div class="row">
              
            <!-- Area Chart -->
            <?php if (isset($_GET["file"])) { ?>
              <div class="col-xl-6 col-lg-6" >
<?php } else { ?>
  <div class="col-xl-12 col-lg-12" style="display:none;" id="pdfViewer">

<?php } ?>
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Document View</h6>
                  <form  method="post" action="dashboard" enctype='multipart/form-data'>
                      <input type="hidden" name="file" id="input-hidden-pdf">
                      <input type="submit" id="processBtn" class="btn btn-success btn-send" value="Process" style="position: absolute; right: 7px; top: 7px;">
                  </form>
                </div>


                <!-- Card Body -->
                <div class="card-body" style="position: relative;">
                  <div class='embed-responsive' style='padding-bottom:100%'>
                    <object id="pdfFile" data='' type='application/pdf' width='100%' height='100%'></object>
                </div>
                </div>
              </div>
            </div>
            <?php if (isset($_GET["file"])) { ?>
             
              <!-- Pie Chart -->
            <div class="col-xl-6 col-lg-6">
                
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Field Output</h6>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body" style="position: relative;">
                  <section id="tabs" class="project-tab">
                   
                   <nav>
                       <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                           <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Table Data</a>
                           <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">JSON Data</a>
                       </div>
                   </nav>
                   <div class="tab-content" id="nav-tabContent">
                       <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                           <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                               <thead>
                                   <tr>
                                       <th width="25%">Entity</th>
                                       <th width="25%">Type</th>
                                       <th width="25%">Category</th>
                                       <th width="25%">Score</th>
                                   </tr>
                               </thead>
                               <tbody>
                               <?php
                               //check if we get data in URL
                               if(isset($_GET['file'])) {
                               $file_name =  $_GET['file'].".json";
                               $data =  json_decode(file_get_contents('extracted_json_files/'.$file_name));
                               foreach($data as $value){?>
                                   <tr>
                                       <td width="25%"><?php   echo $value->Text; ?></td>
                                       <td width="25%"><?php   echo $value->Type; ?></td>
                                       <td width="25%"><?php   echo $value->Category; ?></td>
                                       <td width="25%"><?php   echo $value->Score; ?></td>
                                   </tr>
                               <?php }  } ?>
                                   
                               </tbody>
                           </table>
                       </div>
                       <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                       <pre>
                        <code class="json" id="jsonData">
                        
                          <?php echo file_get_contents('extracted_json_files/'.$file_name);
                          ?>
                          
                        </code>                                      
                        </pre>     
                       </div>
                   </div>
   </section>
                </div>
                </div>
                <div class="card shadow mb-4" style="position: relative;">
                  
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Text Output</h6>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body" style="position: relative;">
                    <div class="form-group" style="margin: 0">
                      <textarea style="border-radius: 0;" class="form-control" id="exampleFormControlTextarea1" rows="10" readonly  >
                    <?php
                    //check if we get data in URL
                    if(isset($_GET['file'])) {
                      $file_name =  $_GET['file'].".txt";
                      echo file_get_contents('extracted_text_files/'.$file_name);
                    }
                    ?>
                    </textarea>
                    </div>
                  </div>
                </div>

                

              </div>
            </div>

<?php } else { ?>
  

<?php } ?>
            



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="my-auto padding-15">
          <div class="copyright text-center my-auto">
            <span class="float-left">Copyright &copy; iDORAN v2.</span> <img src="img/hcl.png" class="float-right">
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <a class="btn btn-primary" href="/extractor/">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.9/highlight.min.js"></script>
  <script src="http://cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>
  <script src="http://cdn.datatables.net/plug-ins/e9421181788/integration/bootstrap/4/dataTables.bootstrap.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script type="text/javascript">
  
    $(document).ready(function(){
       //alert(newPath);
     //   $("div.loading").css('display','block');
        var getStoredFile = sessionStorage.getItem("pdffilename");
        var storedPath = "pdf/"+getStoredFile;
        $("#pdfFile").attr('data', storedPath);
            setTimeout(function(){
              $("div.loading").css('display','none');
            }, 5000);
        $('input[type="file"]').change(function(){
          var filename = $('input[type=file]').val().replace(/C:\\fakepath\\/i, '')
            console.log(filename);
            var newPath = "pdf/"+filename;
            sessionStorage.setItem("pdffilename", filename);
            $("#pdfFile").attr('data', newPath);
            $("#pdfViewer").css('display','block');
            $("#input-hidden-pdf").val(sessionStorage.getItem("pdffilename"));
            $("input#processBtn").css('display','inline-block');
        });
        $("#processBtn").on("click", function(){
          $("#pageLoading").css('display','block');
});

        

    var table = $('#example').DataTable({
        "paging":   false,
        "scrollY":        "200px",
        "info":     false,
    });

    var jsonStr = $("pre code").text();
    var jsonObj = JSON.parse(jsonStr);
    var jsonPretty = JSON.stringify(jsonObj, null, '\t');

    $("pre code").text(jsonPretty);
    

    setTimeout(function(){
 $('pre code').each(function(i, block) {
      hljs.highlightBlock(block);
  });
}, 1000);

    });
    
</script>

</body>

</html>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PDF - Employee Attendance System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">



  
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
  
  <link href="{{ asset('extra_library/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link href="{{ asset('extra_library/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('extra_library/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('extra_library/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('extra_library/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('extra_library/remixicon/remixicon.css') }}" rel="stylesheet">
  

  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <style>
    table { 
	width: 700px; 
	border-collapse: collapse; 
	margin:50px auto;
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #3498db; 
	color: white; 
	font-weight: bold; 
	}

td, th { 
	padding: 10px; 
	border: 1px solid #ccc; 
	text-align: left; 
	font-size: 18px;
	}



  </style>
</head>

<body>
<main id="main" class="main">

 
   <section class="section">
     <div class="row">
       <div class="col-lg-12">
         <div class="card">
           <div class="card-body">
             
             <center><h1 class="card-title">Employee Reports of {{ $fullname}}</h1></center>
             <table id="example" class="table">
               <thead>
                 <tr>
                   <th scope="col">#</th>
                   <th scope="col">YEAR</th>
                   <th scope="col">MONNTH</th>
                   <th scope="col">WORKING PERIODS</th>
                 </tr>
               </thead>
               <tbody>
                @foreach ($report as $index=>$item)   
                  <tr>
                    <th scope="row">{{ ++$index }}</th>
                    <td>{{ $item->year }}</td>
                    <td>{{ $item->month }}</td>
                    <td>{{ $item->total }} Day's</td>
                  </tr>
                @endforeach
              </tbody>
             </table>
             
           </div>
         </div>
       </div>
     </div>
   </section>
  </main>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  
  <script src="{{ asset('extra_library/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('extra_library/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('extra_library/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('extra_library/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('extra_library/quill/quill.min.js') }}"></script>
  <script src="{{ asset('extra_library/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('extra_library/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('extra_library/php-email-form/validate.js') }}"></script>
  
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

 
  <script src="{{ asset('js/main.js') }}"></script>

  <script>

      $(document).ready(function () {
          $('#example').DataTable();
      });
  </script>
  

</body>

</html>
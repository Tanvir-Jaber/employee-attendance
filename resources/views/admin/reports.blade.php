

<x-header name="Report"/>
<main id="main" class="main">

   <div class="pagetitle">
     <h1>Reports</h1>
     <nav>
       <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="/admin/index">Dashboard</a></li>
         <li class="breadcrumb-item active">Reports</li>
       </ol>
     </nav>
   </div>
   <section class="section">
     <div class="row">
       <div class="col-lg-12">
         <div class="card">
           <div class="card-body">
             <h5 class="card-title"></h5>
             <div class="d-flex justify-content-end mb-4">
                <a class="btn btn-primary" href="{{ URL::to('/admin/pdf') }}"><i class="bi bi-file-earmark-pdf"></i> Export to PDF</a>
            </div>
             <table id="example" class="table">
               <thead>
                 <tr>
                   <th scope="col">#</th>
                   <th scope="col">EMPLOYEE NAME</th>
                   <th scope="col">WORKING PERIODS</th>
                   <th scope="col">MONNTH</th>
                   <th scope="col">YEAR</th>
                 </tr>
               </thead>
               <tbody>
                @foreach ($report as $index=>$item)   
                  <tr>
                    <th scope="row">{{ ++$index }}</th>
                    <td>{{ $item->employee->fullname }}</td>
                    <td>{{ $item->working }} Day's</td>
                    <td>{{ $item->month }}</td>
                    <td>{{ $item->year }}</td>
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
<x-footer/>
<script>
 
</script>
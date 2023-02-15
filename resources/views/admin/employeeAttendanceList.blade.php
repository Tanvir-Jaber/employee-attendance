

<x-header name="Employee Attendance"/>
<main id="main" class="main">

   <div class="pagetitle">
     <h1>Employee Attendance List</h1>
     <nav>
       <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="/admin/index">Dashboard</a></li>
         <li class="breadcrumb-item active">Employee Attendance List</li>
       </ol>
     </nav>
   </div>
   <section class="section">
     <div class="row">
       <div class="col-lg-12">
         <div class="card">
           <div class="card-body">
             <h5 class="card-title"></h5>
             
             <table id="example" class="table">
               <thead>
                 <tr>
                   <th scope="col">#</th>
                   <th scope="col">Name</th>
                   <th scope="col">Email</th>
                   <th scope="col">Date</th>
                   <th scope="col">Entry Time</th>
                   <th scope="col">Out Time</th>
                 </tr>
               </thead>
               <tbody>
                @foreach ($list as $ind => $item)
                    <tr>
                      <td>
                        {{ ++$ind }}
                      </td>
                      <td>
                        {{ $item->employee->fullname }}
                      </td>
                      <td>
                        {{ $item->employee->email }}
                      </td>
                      <td>
                        {{ $item->enter_date }}
                      </td>
                      <td>
                        {{ $item->enter_time }}
                      </td>
                      <td>
                        {{ $item->leave_time }}
                      </td>
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


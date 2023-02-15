<x-header name="Employee Contact"/>
<main id="main" class="main">
   <div class="pagetitle">
     <h1>Employee List of Emergency Contact</h1>
     <nav>
       <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="/admin/index">Dashboard</a></li>
         <li class="breadcrumb-item active">Employee List of emergency contact</li>
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
                   <th scope="col">Employee Name</th>
                   <th scope="col">Emergency Contact Person </th>
                   <th scope="col">Emergency Contact E-mail</th>
                   <th scope="col">Emergency Contact Number</th>
                 </tr>
               </thead>
               <tbody>
                @foreach ($employee as $ind=>$list)
                  <tr>
                    <th scope="row">{{ ++$ind }}</th>
                    <td>{{ $list->fullname }}</td>
                    <td>
                      {{ $list->empContacts ?  $list->empContacts->contact_name :  "--";   }} 
                    </td>
                    <td>
                      {{ $list->empContacts ? $list->empContacts->contact_email : "--" }}
                    </td>
                    <td>
                        {{ $list->empContacts ?  $list->empContacts->contact_number :  "--";   }} 
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

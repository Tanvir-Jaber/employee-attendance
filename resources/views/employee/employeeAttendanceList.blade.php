

<x-empHeader name="Employee Attendance"/>
<main id="main" class="main">

   <div class="pagetitle">
     <h1>Attendance List</h1>
     <nav>
       <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="/employee/index">Dashboard</a></li>
         <li class="breadcrumb-item active">Attendance List</li>
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
                   <th scope="col">Entry Date</th>
                   <th scope="col">Entry Time</th>
                   <th scope="col">Leave Time</th>
                   <th scope="col">Total Hours</th>
                 </tr>
               </thead>
               <tbody>
                @foreach ($list as $index=>$item)   
                  <tr>
                    <th scope="row">{{ ++$index }}</th>
                    <td>{{ $item->enter_date }}</td>
                    <td>{{ $item->enter_time }}</td>
                    <td>{{ $item->leave_time }}</td>
                    <td>
                      @php
                        $date1 = $item->enter_time ;
                        $date2 = $item->leave_time;
                        $timestamp1 = strtotime($date1);
                        $timestamp2 = strtotime($date2);  
                        $date = '08/04/2010 22:15:00';
                        $datetime = new DateTime('now', new DateTimeZone('Asia/Dhaka')); 
                        $am_pm = $datetime->format('h:i:a');
                        if ($item->leave_time) {
                          echo $hour = round(abs($timestamp2 - $timestamp1)/(60*60),1) ; 
                        }else{
                            echo "---";
                        }
                      @endphp
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
<script>
  var data = @json($list);
  console.log(data);
</script>
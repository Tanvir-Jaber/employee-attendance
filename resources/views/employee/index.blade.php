<x-empHeader name="Index"/>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-5">
        <div class="row">
          <div class="col-12">
            <form action="/employee/in/time" method="post">
              @csrf
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">In <span>| Time</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-calendar-check-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        
                        @if(count($list) > 1)
                          @php 
                            date_default_timezone_set("Asia/Dhaka");
                            echo $list[0]->enter_date ."<br>";
                            $time =  $list[0]->enter_time;
                            echo date('h:i a ', strtotime($time));
                          @endphp
                        @else
                          @php
                            date_default_timezone_set("Asia/Dhaka");
                            echo date("Y-m-d h:i a");
                          @endphp 
                        @endif
                        
                      </h6>
                      @if(count($list)<2)
                        <button class="btn btn-sm btn-success small pt-1 fw-bold">Enter</button>
                      @endif

                    </div>
                  </div>
                </div>

              </div>
              </form>
            </div>
          
            <div class="col-12">
              <form action="/employee/leave/time" method="post">
                @csrf
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Leave <span>| Time</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-calendar3-range"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        @php
                          date_default_timezone_set("Asia/Dhaka");
                          echo date("Y-m-d h:i a")  
                        @endphp
                      </h6>
                      @if(count($list)>1)
                        @if($list[0]->status == 0)
                          <input type="hidden" name="id" value="{{ $list[0]->id }}">
                          <button class="btn btn-sm btn-danger small pt-1 fw-bold">Leave</button>
                        @endif
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </form>
            </div>
          
        </div>
      </div>
      <div class="col-lg-7">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Attendance Chart</h5>

            <!-- Line Chart -->
            <canvas id="lineChart" style="max-height: 400px;"></canvas>
            <script>
              var data = @json($list);
              console.log(data['chart']);
              var months_name = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
              var month = [];
              var work = [];
              for (let i = 0; i < data['chart'].length; i++){
                work.push(data['chart'][i].total);
                month.push(`${data['chart'][i].month}:${data['chart'][i].year}`);
              }
              document.addEventListener("DOMContentLoaded", () => {
                new Chart(document.querySelector('#lineChart'), {
                  type: 'line',
                  data: {
                    labels: month,
                    datasets: [{
                      label: 'Monthly Present',
                      data: work,
                      fill: false,
                      borderColor: 'rgb(75, 192, 192)',
                      tension: 0.1
                    }]
                  },
                  options: {
                    scales: {
                      y: {
                        beginAtZero: true,
                        max: 50
                      }
                    }
                  }
                });
              });
            </script>

          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<x-footer/>
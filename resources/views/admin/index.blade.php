<x-header name="Index"  />
  @php
      $active_employee = 0;
      $pending_employee = 0;
      foreach ($employee as $key => $value) {
        if($value->status == 0){ $pending_employee++; }
        else{ $active_employee++; }
      }
  @endphp
 <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="/admin/index">Dashboard</a></li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">
      <h3>Welcome To Employee Admin Dashboard</h3>
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-6">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Emoloyee <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $active_employee }}</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Employee <span>| Pending</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-check"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $pending_employee }}</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

<x-footer/>
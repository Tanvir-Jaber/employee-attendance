

<x-header name="Employee List"/>
@php
  $address = "--"; $contact_name = "--"; $contact_email = "--"; $contact_number = "--";
    if($employee[0]->empContacts){
      $contact_name = $employee[0]->empContacts->contact_name;
      $contact_email = $employee[0]->empContacts->contact_email;
      $contact_number = $employee[0]->empContacts->contact_number;
    }
    if($employee[0]->empDetails){
      $address =  $employee[0]->empDetails->address;
    }
@endphp
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Employee Details</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/index">Dashboard</a></li>
        <li class="breadcrumb-item active">Employee Details</li>
      </ol>
    </nav>
  </div>
  <section class="section">
    <div class="row">
      <div class="col-12">
        <div class="card">
            
          <div class="card-body">
            <h5 class="card-title"></h5>
            
            <form class="row g-3 needs-validation">
              
              <div class="col-md-6">
                <label class="form-label">Fullname</label>
                <span class="form-control">{{ $employee[0]->fullname }}</span>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <span class="form-control">{{ $employee[0]->email }}</span>
              </div>
              <div class="col-md-6">
                <label class="form-label">Address</label>
                <span class="form-control">{{ $address }}</span>
              </div>
              <div class="col-md-6">
                <label class="form-label">Emergency Contact Name</label>
                <span class="form-control">{{ $contact_name }}</span>
              </div>
              <div class="col-md-6">
                <label class="form-label">Emergency Contact Email</label>
                <span class="form-control">{{ $contact_email }}</span>
              </div>
              <div class="col-md-6">
                <label class="form-label">Emergency Contact Number</label>
                <span class="form-control">{{ $contact_number }}</span>
              </div>
              <div class="col-12">
                <a class="btn btn-primary" href="/admin/employee-list">Back</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<x-footer/>
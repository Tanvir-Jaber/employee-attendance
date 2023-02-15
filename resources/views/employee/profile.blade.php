

<x-empHeader name="Profile"/>

{{ $contact_name = null }}
{{ $contact_email = null }}
{{ $contact_number = null }}
@if($employee[0]->empContacts)
  {{ $contact_name = $employee[0]->empContacts->contact_name }}
  {{ $contact_email = $employee[0]->empContacts->contact_email }}
  {{ $contact_number = $employee[0]->empContacts->contact_number }}
@endif


{{ $address = null }}

@if($employee[0]->empDetails)
  {{ $address = $employee[0]->empDetails->address }}
@endif


<main id="main" class="main">

  <div class="pagetitle">
    <h1>Update Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/employee/index">Dashboard</a></li>
        <li class="breadcrumb-item active">Update Profile</li>
      </ol>
    </nav>
  </div>
  <section class="section">
    <div class="row">
      <div class="col-12">
        <div class="card">
            
          <div class="card-body">
            <h5 class="card-title"></h5>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (\Session::has('Message'))
                    {!! \Session::get('Message') !!}
                @endif
            </div>
            <form action="/employee/update-profile" method="post"  class="row g-3 needs-validation" novalidate>
              @csrf
              <input type="hidden" name="emp_id" value="{{ $employee[0]->id }}">
              <div class="col-md-6">
                <label class="form-label">Fullname</label>
                <span class="form-control">{{ $employee[0]->fullname }}</span>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <span class="form-control">{{\Session::get("user")}}</span>
              </div>
              <div class="col-md-12">
                <label for="validationCustom03" class="form-label">Address</label>
                <textarea type="text" name="address" class="form-control" id="validationCustom03" required>{{ $address }}</textarea>
                <div class="invalid-feedback">
                  Please provide a valid address.
                </div>
              </div>
              <div class="col-md-6">
                <label for="validationCustom4" class="form-label">Contact Name</label>
                  <input type="text" name="cname" class="form-control" id="validationCustom4" value="{{ $contact_name }}"  placeholder="contact name" required>
                  <div class="invalid-feedback">
                    Please provide a contact name.
                  </div>
              </div>
              <div class="col-md-6">
                <label for="validationCustom5" class="form-label">Contact E-mail</label>
                  <input type="mail" name="cemail" value="{{ $contact_email }}" class="form-control" id="validationCustom5"  placeholder="contact E-mail" required>
                  <div class="invalid-feedback">
                    Please provide a contact E-mail.
                  </div>
              </div>

              <div class="col-md-6">
                <label for="validationCustom6" class="form-label">Contact Number</label>
                  <input type="text" name="phone" value="{{ $contact_number }}" class="form-control" id="validationCustom6"  placeholder="contact number" required>
                  <div class="invalid-feedback">
                    Please provide a contact number.
                  </div>
              </div>
              <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<x-footer/>

<script>
  var data =  @json($employee);
  console.log(data);
</script>
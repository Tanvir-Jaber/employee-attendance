

 <x-header name="Create Employee"/>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Create New Employee</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin/index">Dashboard</a></li>
          <li class="breadcrumb-item active">Add Employee</li>
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
                  @if (\Session::has('Success Message'))
                      {!! \Session::get('Success Message') !!}
                  @endif
              </div>
              <form action="/admin/add-employee" method="post"  class="row g-3 needs-validation" novalidate>
                @csrf
                <div class="col-md-6">
                  <label for="validationCustom01" class="form-label">Fullname</label>
                  <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="John Doe" required>
                  <div class="invalid-feedback">
                    Please provide a valid name.
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="validationCustom02" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="validationCustom02" placeholder="example@ymail.com" required>
                  <div class="invalid-feedback">
                    Please provide a valid email address.
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom03" class="form-label">Address</label>
                  <textarea type="text" name="address" class="form-control" id="validationCustom03" required></textarea>
                  <div class="invalid-feedback">
                    Please provide a valid address.
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="validationCustomUsername" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="validationCustomUsername"  placeholder="password" required>
                    <div class="invalid-feedback">
                      Please provide a valid password.
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
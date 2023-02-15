

 <x-header name="Employee List"/>
 <main id="main" class="main">

    <div class="pagetitle">
      <h1>Employee List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin/index">Dashboard</a></li>
          <li class="breadcrumb-item active">Employee List</li>
        </ol>
      </nav>
    </div>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
                  @if (\Session::has('Message'))
                      {!! \Session::get('Message') !!}
                  @endif
              <table id="example" class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                  @foreach ($employee as $index=>$item)
                    @if($item->role == "employee")
                      <tr>
                          <th scope="row">{{ $index  }}</th>
                          <td>{{ $item->fullname }}</td>
                          <td>{{ $item->email }}</td>
                          <td>{{ $item->status == "0" ? "not active" : "active" }}</td>
                          <td>
                            @if( $item->status == "0" )
                              <a href="/admin/emp-list/active/{{$item->id}}" class="btn btn-success btn-sm"><i class="bi bi-check-circle-fill"></i></a>
                            @endif
                              <a href="/admin/emp-list/remove/{{$item->id}}" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
                              <a href="/admin/employee/details/{{$item->id}}" class="btn btn-primary btn-sm"><i class="bi bi-eye-slash"></i></a>
                            </td>
                        </tr>
                      @endif
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
  var data  = @json($employee);
  console.log(data);
</script>

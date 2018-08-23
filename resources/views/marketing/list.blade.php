 @extends('layouts.template')

@section('title')
          Marketing Detail
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="/../app-assets/vendors/css/tables/datatable/datatables.min.css">
<link rel="stylesheet" type="text/css" href="/../app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css">

@endsection

@section('content')
<div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Marketing Detail</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="marketings">Marketing Detail</a>
                </li>

              </ol>
            </div>
          </div>
        </div>
      </div>
      <!--/ Column control - right table -->
      <section id="child-rows">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Marketing Detail</h4>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                  <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                  <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                  <li><a data-action="close"><i class="ft-x"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="card-content collapse show">
              <div class="card-body card-dashboard">
                </p>
                <p class="card-text">
                <table class="table table-striped table-bordered responsive dataex-res-controlled">

                  <thead>
                    <a class="btn btn-warning mr-1" style="float:right" href="/marketings/create" ><i class="ft-plus"></i>Add</a>

                    <tr>
                      <th></th>
                      <th>Customer Name</th>
                      <th>Tool Name</th>
                      <th>Policy No</th>
                      <th>Quantity</th>
                      <th>Tool code</th>
                      <th>Order To</th>
                      <th>Order Date</th>
                      <th>Order Des. Date</th>
                      <th>Order Is</th>
                      <th>Marking Detail</th>
                      <th>Employee Sign</th>
                      <th>Note</th>
                      <th>Raf Drawing</th>
                      <th>Original Drawing</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($marketings as $m)
                    <tr>
                      <td></td>
                      <td>{{$m->c_id}}</td>
                      <td>{{$m->tool_name}}</td>
                      <td>{{$m->p_o_no}}</td>
                      <td>{{$m->quantity}}</td>
                      <td>{{$m->code}}</td>
                      <td>{{$m->order_to}}</td>
                      <td>{{$m->order_date}}</td>
                      <td>{{$m->des_date}}</td>
                      <td>{{$m->order_is}}</td>
                      <td>{{$m->marking_detail}}</td>
                      <td>{{$m->emp_id}}</td>
                      <td>{{$m->note}}</td>
                      <td>{{$m->raf_drawing}}</td>
                      <td>{{$m->original_drawing}}</td>
                      <td>{{$m->created_at}}</td>
                      <td>{{$m->updated_at}}</td>
                      <td><div role="group" class="btn-group">
                        <a class="btn btn-primary ft-edit"  href="marketings/{{ $m->id }}/edit" ></a>
                        <a class="btn btn-danger ft-x"  href="#" ></a></div></td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th></th>
					  <th>Customer Name</th>
                      <th>Tool Name</th>
                      <th>Policy No</th>
                      <th>Quantity</th>
                      <th>Tool code</th>
                      <th>Order To</th>
                      <th>Order Date</th>
                      <th>Order Des. Date</th>
                      <th>Order Is</th>
                      <th>Marking Detail</th>
                      <th>Employee Sign</th>
                      <th>Note</th>
                      <th>Raf Drawing</th>
                      <th>Original Drawing</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th>Action</th>
                     </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/ Column controlled child rows -->

    </div>
 @endsection
@section('script')
 <script src="/../app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<script>
   $('.dataex-res-controlled').DataTable({
       responsive: {
           details: {
               type: 'column'
           }
       },
       columnDefs: [{
           className: 'control',
           orderable: false,
           targets: 0
       }],
       order: [1, 'asc']
   });
</script>
@endsection

@extends('templates.main')

@section('title_page')
    Approval Request
@endsection

@section('breadcrumb_title')
    approvals
@endsection

@section('content')
<div class="row">
  <div class="col-12">

    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      </div>
    @endif

    @if (session()->has('danger'))
      <div class="alert alert-danger alert-dismissible">
        {{ session('danger') }}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      </div>
    @endif

    <div class="card card-info">
      <div class="card-header">
        <div class="card-title">Transaksi No. 123412341 tanggal 01-Jan-2022</div>
      </div>
      <div class="card-body">
        <dl class="row">
          <dt class="col-sm-4">Description lists</dt>
          <dd class="col-sm-8">A description list is perfect for defining terms.</dd>
          <dt class="col-sm-4">Euismod</dt>
          <dd class="col-sm-8">Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
          <dd class="col-sm-8 offset-sm-4">Donec id elit non mi porta gravida at eget metus.</dd>
          <dt class="col-sm-4">Malesuada porta</dt>
          <dd class="col-sm-8">Etiam porta sem malesuada magna mollis euismod.</dd>
          <dt class="col-sm-4">Felis euismod semper eget lacinia</dt>
          <dd class="col-sm-8">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo
            sit amet risus.
          </dd>
        </dl>
      </div>
      <div class="card-footer">
        <a href="#" class="btn btn-sm btn-success">Approve</a>
        <a href="#" class="btn btn-sm btn-primary">Deny</a>
      </div>
    </div> <!-- card -->

    <div class="card card-info">
      <div class="card-header">
        <div class="card-title">Transaksi No. 123412341 tanggal 01-Jan-2022</div>
      </div>
      <div class="card-body">
        <dl class="row">
          <dt class="col-sm-4">Description lists</dt>
          <dd class="col-sm-8">A description list is perfect for defining terms.</dd>
          <dt class="col-sm-4">Euismod</dt>
          <dd class="col-sm-8">Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
          <dd class="col-sm-8 offset-sm-4">Donec id elit non mi porta gravida at eget metus.</dd>
          <dt class="col-sm-4">Malesuada porta</dt>
          <dd class="col-sm-8">Etiam porta sem malesuada magna mollis euismod.</dd>
          <dt class="col-sm-4">Felis euismod semper eget lacinia</dt>
          <dd class="col-sm-8">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo
            sit amet risus.
          </dd>
        </dl>
      </div>
      <div class="card-footer">
        <a href="#" class="btn btn-sm btn-success">Approve</a>
        <a href="#" class="btn btn-sm btn-primary">Deny</a>
      </div>
    </div> <!-- card -->

    <div class="card card-info">
      <div class="card-header">
        <div class="card-title">Transaksi No. 123412341 tanggal 01-Jan-2022</div>
      </div>
      <div class="card-body">
        <dl class="row">
          <dt class="col-sm-4">Description lists</dt>
          <dd class="col-sm-8">A description list is perfect for defining terms.</dd>
          <dt class="col-sm-4">Euismod</dt>
          <dd class="col-sm-8">Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
          <dd class="col-sm-8 offset-sm-4">Donec id elit non mi porta gravida at eget metus.</dd>
          <dt class="col-sm-4">Malesuada porta</dt>
          <dd class="col-sm-8">Etiam porta sem malesuada magna mollis euismod.</dd>
          <dt class="col-sm-4">Felis euismod semper eget lacinia</dt>
          <dd class="col-sm-8">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo
            sit amet risus.
          </dd>
        </dl>
      </div>
      <div class="card-footer">
        <a href="#" class="btn btn-sm btn-success">Approve</a>
        <a href="#" class="btn btn-sm btn-primary">Deny</a>
      </div>
    </div> <!-- card -->

  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
@endsection

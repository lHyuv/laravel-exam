@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

          <!-- Main content -->
    <section class="content">
 
    <div class="row">

          <div class="col-lg-6 col-6">
        
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $users }}</h3>
               
                <p>Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">&nbsp; <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $products }}</h3>

                <p>Products</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer"> &nbsp; <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
 
        </div>
        <!-- /.row -->
        <div id = "app"></div>
   
        
</section>

    </div>
</div>
</div>
@endsection

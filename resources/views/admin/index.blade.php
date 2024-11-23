@extends('admin.layouts.app')

@section('title')
  Dashboard
@endsection

@section('content')
  <div class="row">
    @include('admin.layouts.sidebar')
    <div class="col-md-9">
      <div class="row mt-3">
        <div class="col-md-12">
          <div class="card-header bg-white">
            <h3 class="mt-2">Dashboard</h3>
          </div>
  
          <hr>
          <div class="card-body">
            <div class="row mb-2">
  
              {{-- Todays orders --}}
              <div class="col-md-6 mb-2">
                  <div class="card shadow-sm">
                    <div class="card-header bg-warning">
                      <div class="d-flex justify-content-between">
                        <strong class="badge bg-dark">Today's Orders</strong>
                        <span class="badge bg-dark">{{$todayOrders->count()}}</span>
                      </div>
                    </div>
                    <div class="card-footer text-center bg-warning">
                        <strong>{{$todayOrders->sum('total')}}</strong>
                    </div>
                  </div>
               
              </div>
  
              {{-- Yesterday Orders --}}
              <div class="col-md-6 mb-2">
                  <div class="card shadow-sm">
                    <div class="card-header bg-primary">
                      <div class="d-flex justify-content-between">
                        <strong class="badge bg-dark">Yesterday's Orders</strong>
                        <span class="badge bg-dark">{{$yesterdayOrders->count()}}</span>
                      </div>
                    </div>
                    <div class="card-footer text-center bg-primary">
                        <strong>{{$yesterdayOrders->sum('total')}}</strong>
                    </div>
                  </div>
                
              </div>
  
  
              {{-- This Month Orders --}}
              <div class="col-md-6 mb-2">
                  <div class="card shadow-sm">
                    <div class="card-header bg-secondary">
                      <div class="d-flex justify-content-between">
                        <strong class="badge bg-dark">This Month Orders</strong>
                        <span class="badge bg-dark">{{$monthOrders->count()}}</span>
                      </div>
                    </div>
                    <div class="card-footer text-center bg-secondary">
                        <strong>{{$monthOrders->sum('total')}}</strong>
                    </div>
                  </div>
                
              </div>
  
  
               {{-- This Year Orders --}}
               <div class="col-md-6 mb-2">
                <div class="card shadow-sm">
                  <div class="card-header bg-success">
                    <div class="d-flex justify-content-between">
                      <strong class="badge bg-dark">This Year Orders</strong>
                      <span class="badge bg-dark">{{$yearOrders->count()}}</span>
                    </div>
                  </div>
                  <div class="card-footer text-center bg-success">
                      <strong>{{$yearOrders->sum('total')}}</strong>
                  </div>
                </div>
              
            </div>
  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 
@endsection
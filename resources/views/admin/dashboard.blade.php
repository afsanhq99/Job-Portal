@extends('admin.master')
@section('admin.content')
<div class="content-wrapper">

    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
          <div class="d-flex align-items-end flex-wrap">
            <div class="me-md-3 me-xl-5">
              <h2>Welcome To Admin Panel in Shrom</h2>
            </div>
            {{--  <div class="d-flex">
              <i class="mdi mdi-home text-muted hover-cursor"></i>
              <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
              <p class="text-primary mb-0 hover-cursor">Analytics</p>
            </div>  --}}
          </div>

        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body dashboard-tabs p-0">
            <ul class="nav nav-tabs px-4" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
              </li>

            </ul>
            <div class="tab-content py-0 px-0">
              <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                <div class="d-flex flex-wrap justify-content-xl-between">
                  <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                    <i class="mdi mdi-calendar-heart icon-lg me-3 text-primary"></i>
                    <div class="d-flex flex-column justify-content-around">
                      <small class="mb-1 text-muted">Total Categories</small>
                      <div class="dropdown">
                        <a class="btn btn-secondary p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <h5 class="mb-0 d-inline-block">{{ $totalcategory }}</h5>
                        </a>

                      </div>
                    </div>
                  </div>
                  <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                    <i class="mdi mdi-arrange-bring-forward me-3 icon-lg text-danger"></i>
                    <div class="d-flex flex-column justify-content-around">
                      <small class="mb-1 text-muted">Total Jobpost</small>
                      <h5 class="me-2 mb-0">{{ $totaljobPost }}</h5>
                    </div>
                  </div>
                  <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                    <i class="mdi mdi-eye me-3 icon-lg text-success"></i>
                    <div class="d-flex flex-column justify-content-around">
                      <small class="mb-1 text-muted">Total Subscribers</small>
                      <h5 class="me-2 mb-0">{{ $totalubscribers }}</h5>
                    </div>
                  </div>
                  <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                    <i class="mdi mdi-download me-3 icon-lg text-warning"></i>
                    <div class="d-flex flex-column justify-content-around">
                      <small class="mb-1 text-muted">Total Users</small>
                      <h5 class="me-2 mb-0">{{ $totalusers }}</h5>
                    </div>
                  </div>
                  {{--  <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                    <i class="mdi mdi-flag me-3 icon-lg text-danger"></i>
                    <div class="d-flex flex-column justify-content-around">
                      <small class="mb-1 text-muted">Flagged</small>
                      <h5 class="me-2 mb-0">3497843</h5>
                    </div>
                  </div>  --}}
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
  @endsection

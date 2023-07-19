@extends('layouts.header')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-md-12">
                  <div class="row">
                      <div class="col">
                        <a href="{{ route('booths') }}">
                          <div class="card">
                            <div class="card-body p-3">
                                <div class="text-center">
                                    <h4>All Booths</h4>
                                </div>
                                <div class="text-center">
                                    <h1>{{ count(App\Models\Booth::all()) }}</h1>
                                </div>
                            </div>
                        </div>
                        </a>
                      </div>
                      <div class="col">
                          <a href="{{ route('members') }}">
                            <div class="card">
                              <div class="card-body p-3">
                                  <div class="text-center">
                                      <h4>All Members</h4>
                                  </div>
                                  <div class="text-center">
                                      <h1>{{ count(App\Models\Member::all()) }}</h1>
                                  </div>
                              </div>
                          </div>
                          </a>
                      </div>
                      {{-- <div class="col-md-4">
                          <div class="card">
                              <div class="card-body p-3">
                                  <div class="text-center">
                                      <h4>All Booths</h4>
                                  </div>
                                  <div class="text-center">
                                      <h1>{{ count(App\Models\Booth::all()) }}</h1>
                                  </div>
                              </div>
                          </div>
                      </div> --}}
                  </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
    @endsection

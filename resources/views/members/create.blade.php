@extends('layouts.header')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card mb-3">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-header">सदस्य जोड़ें
                        </h5>
                    </div>
                    <div class="mt-3 mx-3">
                    </div>
                </div>
            </div>
            <div class="row">
            @if(session('success'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                    {{ session('success') }}
                </div>
              </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                    {{ session('error') }}
                </div>
              </div>
            @endif
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body  p-3">
                            <div class="table-responsive text-nowrap">
                                <form action="{{ route('member.store', $id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="name">सदस्य का नाम</label>
                                                <input type="text" name="name" id="name" placeholder="eg: Manoj Kumar" class="form-control" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="phone">फोन नं. </label>
                                                <input type="text" name="phone" id="phone" placeholder="eg: 9145689715" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="village">ग्राम </label>
                                                <input type="text" name="village" id="village" placeholder="eg: Todabheem" class="form-control" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="img">फोटो</label>
                                                <input type="file" name="img" id="img" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center my-2">
                                        <button class="btn btn-primary">सेव करें</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body p-3">
                            <div class="table-responsive text-nowrap">
                                <table id="admin" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>सदस्य का नाम</th>
                                            <th>सदस्य का फोन नं.</th>
                                            <th>सदस्य का ग्राम</th>
                                            <th>सदस्य का फोटो</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <?php $i = 1; ?>
                                        @foreach($members as $member)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $member->name }}</td>
                                            <td>{{ $member->phone }}</td>
                                            <td>{{ $member->village }}</td>
                                            <td><img src="{{ asset('images/'.$member->img) }}" class="img-fluid rounded border" style="height: 100px; width: 100px;"></td>
                                            <td><a href="{{ route('member.edit', $member->id) }}" class="btn btn-primary">अपडेट करें</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

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
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body  p-3">
                            <div class="table-responsive text-nowrap">
                                <form action="{{ route('member.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="name">सदस्य का नाम</label>
                                                <input type="text" name="name" id="name" value="{{ $member->name }}" placeholder="eg: Manoj Kumar" class="form-control" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="phone">फोन नं. </label>
                                                <input type="text" name="phone" id="phone" value="{{ $member->phone }}" placeholder="eg: 9145689715" class="form-control" required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="img">फोटो</label>
                                                <input type="file" name="img" id="img" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="village">ग्राम </label>
                                                <input type="text" name="village" id="village" value="{{ $member->village }}" placeholder="eg: Todabheem" class="form-control" required>
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
        </div>
    @endsection

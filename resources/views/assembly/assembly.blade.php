@extends('layouts.header')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card mb-3">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-header">सभी विधानसभा
                        </h5>
                    </div>
                    <div class="mt-3 mx-3">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#assemblyModal"class="btn btn-primary">विधानसभा जोड़ें</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body  p-3">
                            <div class="table-responsive text-nowrap">
                                <table id="admin" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>जिले का नाम</th>
                                            <th>विधानसभा का नाम</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <?php $i = 1; ?>
                                        @foreach($assemblies as $assembly)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $assembly->district }}</td>
                                            <td>{{ $assembly->assembly }}</td>
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


        <!-- Modal -->
        <div class="modal fade" id="assemblyModal" tabindex="-1" aria-labelledby="assemblyModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="assemblyModalLabel">विधानसभा जोड़ें</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('assembly.store') }}" method="POST">
                    @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="district">जिले का नाम</label>
                                    <input type="text" name="district" placeholder="eg: Karoli" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="district">विधानसभा का नाम</label>
                                    <input type="text" name="assembly" placeholder="eg: Todabheem" class="form-control">
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
        <!-- / Content -->
    @endsection

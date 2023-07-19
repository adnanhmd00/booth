@extends('layouts.header')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="card mb-3">
              <div class="d-flex justify-content-between">
                  <div>
                      <h5 class="card-header">सभी सदस्य</h5>
                  </div>
                  {{-- <div class="mt-3 mx-3">
                      <a href="{{ route('member.create') }}" class="btn btn-primary">सदस्य जोड़ें</a>
                  </div> --}}
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
                                            <th>फोटो</th>
                                            <th>पूरा नाम</th>
                                            <th>फ़ोन</th>
                                            <th>गाँव</th>
                                            <th>बूथ का नाम</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <?php $i = 1; ?>
                                        @foreach($members as $member)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td><img src="{{ asset('storage/'.$member->img) }}" class="img-rounded" width="80px" alt=""></td>
                                            <td>{{ $member->name }}</td>
                                            <td>{{ $member->phone }}</td>
                                            <td>{{ $member->village }}</td>
                                            <td>{{ App\Models\Booth::where('id', $member->booth_id)->value('name') }}</td>
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
        <!-- / Content -->
    @endsection

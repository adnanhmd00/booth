@extends('layouts.header')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="card mb-3">
              <div class="d-flex justify-content-between">
                  <div>
                      <h5 class="card-header">सभी बूथ</h5>
                  </div>
                  <div class="mt-3 mx-3">
                      <a href="{{ route('booth.create') }}" class="btn btn-primary">बूथ जोडें</a>
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
                                            <th>बूथ का नाम</th>
                                            <th>बूथ केंद्र</th>
                                            {{-- <th>ज़िला</th> --}}
                                            <th>विधानसभा</th>
                                            <th>सदस्य जोड़ें</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <?php $i = 1; ?>
                                       @foreach($booths as $booth)
                                       <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $booth->name }}</td>
                                        <td>{{ $booth->center }}</td>
                                        {{-- <td>{{ $booth->district }}</td> --}}
                                        <td>{{ $booth->assembly }}</td>
                                        {{-- <td>
                                            <form method="POST" action="{{ route('member.create') }}">
                                                @csrf
                                                <input type="hidden" name="booth_id" value="{{ $booth->id }}">
                                                <button class="btn btn-primary">सदस्य जोड़ें</button>
                                            </form>
                                        </td> --}}
                                        <td><a href="{{ route('member.create', $booth->id) }}" class="btn btn-primary">सदस्य जोड़ें</a></td>
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

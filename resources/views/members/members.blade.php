@extends('layouts.header')
@section('content')
    <style>
        #table_name{
            table-layout: fixed;
            width: 100%;
        }
    </style>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="card mb-3 hidden-print">
              <div class="d-flex justify-content-between">
                  <div>
                      <h5 class="card-header">सभी सदस्य</h5>
                  </div>
                  <div class="mt-3 mx-3">
                    <button id="print" onclick="print()">Print</button><br><br>
                  </div>
              </div>
          </div>
            <div class="row">
                <div class="col-md-12">
                    <table id="table_name">
                        <tr>
                            <td style="width: 100px; background: #fff; border: 1px solid #000"><img src="{{ asset('assets/img/meena.jpeg') }}" style="width: 96px; height: 100px;" alt=""></td>
                            <td colspan="2" style="width: 100%; background: #fff; border: 1px solid #000; border-left: 1px solid #000;"><h2 class="text-center">टोडाभीम <br>विधान सभा छेत्र (संख्या-81)</h2></td>
                            <td style="width: 100px; background: #fff; border: 1px solid #000"><img src="{{ asset('assets/img/flag.svg') }}" style="width: 96px; height: 100px;">
                        <tr style="border: 1px solid #000;">
                            <td style="width: 100px; background: #fff;"></td>
                            <td colspan="2" style="width: 100%; background: #fff;"><p class="text-center mt-1"><b>पोलिंग बूथ कार्यकर्ता विवरण</b></p></td>
                            <td style="width: 100px; background: #fff;"></td>
                        </tr>
                        @php $i = 1 @endphp
                        @foreach($members->chunk(2) as $chunk_member)
                        @once
                        <tr style="border: 1px solid #000;">
                            <td colspan="2" style="width: 100%; background: #fff;"><p class="mt-1 mx-3"><b>बूथ-{{ $chunk_member[0]['booth_id']}} {{ App\Models\Booth::where('id', $chunk_member[0]['booth_id'])->value('name') }}</b></p></td>
                            <td style="width: 100px; background: #fff;"></td>
                            <td style="width: 100px; background: #fff;"></td>
                        </tr>
                        @endonce
                        <tr style="margin: 0px;">
                            @foreach($chunk_member as $member)
                            @php $i++ @endphp
                            <td colspan="2">
                                <table>
                                    <tr>
                                        <td style="width: 700px; border: 1px solid #000;">
                                            <div class="p-3">
                                                <b>नाम: {{ $member->name }}</b> <br>
                                                <b>नंबर: {{ $member->phone }}</b> <br>
                                                <b>ग्राम: {{ $member->village }}</b> <br>
                                            </div>
                                        </td>
                                        <td style="width: 100px; border: 1px solid #000;">
                                            <div class="text-center">
                                                <img src="{{ asset('images/'.$member->img) }}" style="width: 100px; height: 100px;" alt="">
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            @if($i == 7) 
                            <tr style="border: 1px solid #000; width: 100%">
                                <td colspan="2" style="width: 100%; background: #fff;"><p class="mt-1 mx-3"><b>बूथ-{{ $member->booth_id +1}} {{ App\Models\Booth::where('id', $member->booth_id + 1)->value('name') }}</b> </p></td>
                                {{-- <td colspan="2" style="width: 100%; background: #fff;"><p class="mt-1">पोलिंग बूथ कार्यकर्ता विवरण {{ $member->booth_id +1}}</p></td> --}}
                                <td style="width: 100px; background: #fff;"></td>
                                <td style="width: 100px; background: #fff;"></td>
                            </tr>
                            @endif
                        @endforeach
                        </tr>
                        @endforeach
                    </table>
                    <div class="d-flex justify-content-end mt-3 hidden-print">
                        {{ $members->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
        
    @endsection

@extends('layouts.header')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card mb-3">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-header">नया बूथ जोड़ें</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{ route('booth.store') }}" method="post">
                              @csrf
                                <div>
                                    <label for="name" class="form-label m-0 p-0" style="font-size: 15px;">भवन का नाम
                                        जहाँ स्थापित किया गया है</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        onchange="translateName()"
                                        placeholder="eg: राजकीय उच्च महाविद्यालय पाटोली बाया भाग" />
                                </div>
                                <br>
                                <div>
                                    <label for="center" class="form-label m-0 p-0" style="font-size: 15px;">बूथ केंद्र
                                        का स्थान</label>
                                    <input type="text" name="center" class="form-control" id="center"
                                        onchange="translateCenter()" placeholder="eg: पाटोली " />
                                </div>
                                <div class="d-flex justify-content-end my-2">
                                    <button class="btn btn-primary">सेव करें</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // function translateName() {
            //     var name = $('#name').val();
            //     $.ajax({
            //         type: "POST",
            //         url: "{{ route('translate-name') }}",
            //         data: {
            //             _token: '{{ csrf_token() }}',
            //             name: name
            //         },
            //         success: function(data) {
            //             $('#name').val(data);
            //             console.log(data)
            //         }
            //     });
            // }
        </script>

        <script>
            // function translateCenter() {
            //     var center = $('#center').val();
            //     $.ajax({
            //         type: "POST",
            //         url: "{{ route('translate-center') }}",
            //         data: {
            //             _token: '{{ csrf_token() }}',
            //             center: center
            //         },
            //         success: function(data) {
            //             $('#center').val(data);
            //             console.log(data)
            //         }
            //     });
            // }
        </script>
        <!-- / Content -->
    @endsection

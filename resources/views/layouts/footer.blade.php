 <footer class="content-footer footer bg-footer-theme">
     

     <div class="d-flex justify-content-center">
        <div class="mb-2 mb-md-0">
           ©
           <script>
               document.write(new Date().getFullYear());
           </script>
           , All Right Reserved by
           <a href="javascript:void(0)" target="_blank" class="footer-link fw-bolder">Amrita Meena</a>
       </div>
    </div>
    <div class="container-xxl d-flex flex-wrap justify-content-end py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0 hidden-print">
            ©
            <script>
                document.write(new Date().getFullYear());
            </script>
            , made with ❤️ by
            <a href="https://geekcoders.in" target="_blank" class="footer-link fw-bolder">Geek Coders</a>
        </div>
    </div>
 </footer>
 <div class="content-backdrop fade"></div>
 </div>
 </div>
 </div>
 <div class="layout-overlay layout-menu-toggle"></div>
 </div>
 <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
 <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
 <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
 <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
 <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
 <script src="{{ asset('assets/js/main.js') }}"></script>
 <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
 {{-- <script src="{{ asset('assets/js/form-basic-inputs.js') }}"></script> --}}
 <script async defer src="https://buttons.github.io/buttons.js"></script>


 <script>
  $(document).ready(function() {
      $('#admin').DataTable({
          "dom": '<f<t>ip>'
      });

  });
</script>
 </body>

 </html>

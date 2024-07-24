<x-app-layout>
  {{-- <h1>This is ADMIN dashboard</h1> --}}
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      
      @include('admin.sidebar')

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        
        @include('admin.navbar')

        <!-- partial -->
        
        <div class="w-full h-full text-center pt-52 text-3xl">
          <h1>Selamat datang di panel admin MedConnect</h1>
          <h3>Pilih menu di sidebar untuk melanjutkan</h3>
        </div>
        {{-- @include('admin.body') --}}

        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
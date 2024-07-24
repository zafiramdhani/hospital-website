<x-app-layout>
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

        
        <div class="container">
          @if (session()->has('message'))
            <div class="alert alert-success mt-4">
              <button type="button" class="close" data-dismiss="alert">x</button>
              {{ session()->get('message') }}
            </div>
          @elseif (session()->has('error'))
            <div class="alert alert-danger mt-4">
              <button type="button" class="close" data-dismiss="alert">x</button>
              {{ session()->get('error') }}
            </div>
          @endif

          {{-- <h1 class="mt-3">Add Doctor</h1> --}}

          <button type="button" class="btn btn-primary mt-4 ml-5 p-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            ➕ Tambah Dokter
          </button>

          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">➕ Tambah Dokter</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ url('upload_doctor') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                    @csrf
                    <div>
                      <label for="name" class="w-20">Nama</label>
                      <input type="text" name="name" id="name" class="w-75" style="color: black" placeholder="dr. " required>
                    </div>
                    <div class="mt-2">
                      <label for="number" class="w-20">No. Telp</label>
                      <input type="text" name="number" id="number" class="w-75" style="color: black" placeholder="+62..." required>
                    </div>
                    <div class="mt-2">
                      <label for="speciality" class="w-20">Spesialis</label>
                      <select name="speciality" id="speciality" class="w-75" style="color: black" required>
                        <option value="">--Pilih spesialis--</option>
                        <option value="Kulit">Kulit (Sp.KK)</option>
                        <option value="Penyakit dalam">Penyakit dalam (Sp.PD)</option>
                        <option value="Mata">Mata (Sp.M)</option>
                        <option value="THT">THT (Sp.THT)</option>
                        <option value="Anak">Anak (Sp.A)</option>
                        <option value="Syaraf">Syaraf (Sp.N)</option>
                        <option value="Kandungan">Kandungan (Sp.OG)</option>
                        <option value="Gigi">Gigi (Sp.Pros)</option>
                      </select>
                    </div>
                    <div class="mt-2">
                      <label for="room" class="w-20">No. Ruang</label>
                      <input type="text" name="room" id="room" class="w-75" style="color: black" required>
                    </div>
                    <div class="mt-2">
                      <label for="picture" class="w-20">Foto</label>
                      <input type="file" name="picture" id="picture" class="w-75" required>
                    </div>
                    <div class="mt-4">
                      <input type="submit" class="btn btn-success p-3 w-100 rounded">
                    </div>
                  </form>
                </div>
                {{-- <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
              </div>
            </div>
          </div>

          <div align="center" class="px-5 py-4">
            <table class="text-center border border-white table-striped w-100">
              <tr class="bg-primary">
                <th class="p-2">No.</th>
                <th class="p-2">Nama</th>
                <th class="p-2">No. Telp</th>
                <th class="p-2">Spesialis</th>
                <th class="p-2">Ruang</th>
                <th class="p-2">Foto</th>
                <th class="p-2">Aksi</th>
              </tr>

              @php
                  $i = 1;
              @endphp
  
              @foreach ($doctors as $doctor)
                <tr>
                  <td class="p-2">{{ $i++ }}</td>
                  <td class="p-2">{{ $doctor->name }}</td>
                  <td class="p-2">{{ $doctor->phone }}</td>
                  <td class="p-2">{{ $doctor->speciality }}</td>
                  <td class="p-2">{{ $doctor->room }}</td>
                  <td class="p-2" align="center"><img src="doctorpicture/{{ $doctor->image }}" width="75" height="75" alt="{{ $doctor->image }}"></td>                  
                  <td>
                    <a href="{{ url('', $doctor->id) }}" class="btn btn-outline-success py-3 px-3">✏ Edit</a>
                    <a href="{{ url('delete_doctor', $doctor->id) }}" class="btn btn-outline-danger py-3 px-2" onclick="return confirm('Hapus data dokter ini?')">❌ Hapus</a>
                  </td>
                </tr>
              @endforeach
            </table>
          </div>

        </div>

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
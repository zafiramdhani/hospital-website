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
        <div align="center" class="p-5">
          <table class="text-center border border-white table-striped">
            <tr class="bg-primary">
              <th class="pl-2">No.</th>
              <th class="px-4">Customer</th>
              <th class="px-4">Email</th>
              <th class="px-4">No. Telp</th>
              <th class="px-4">Dokter</th>
              <th class="px-4">Tanggal</th>
              <th class="px-4">Pesan</th>
              <th class="px-4">Status</th>
              <th class="px-4" colspan="2">Aksi</th>
            </tr>

            @php
              $i = 1;
            @endphp

            @foreach ($datas as $data)
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->phone == null ? '-' : $data->phone }}</td>
                <td>{{ $data->doctor }}</td>
                <td>{{ $data->date }}</td>
                <td>{{ $data->message }}</td>
                
                @if ($data->status == 'Ditunda')
                  <td style="color: yellow">{{ $data->status }}</td>
                  <td>
                    <a href="{{ url('approve', $data->id) }}" class="btn btn-success p-1 m-1" onclick="return confirm('Setujui perjanjian ini?')">✔ Setuju</a>
                  </td>
                  <td>
                    <a href="{{ url('refuse', $data->id) }}" class="btn btn-danger p-1 m-1" onclick="return confirm('Tolak perjanjian ini?')">❌ Tolak</a>
                  </td>
                  
                @else
                  <td style="color: {{ $data->status == 'Disetujui' ? 'rgb(0, 209, 0)' : 'rgb(255, 31, 31)' }}">{{ $data->status }}</td>
                  <td colspan="2">
                    <a href="{{ url('delete_appointment', $data->id) }}" onclick="return confirm('Delete this appointment?')" class="btn btn-outline-danger p-2 m-1">❌ Hapus</a>
                  </td>
                    
                @endif
              </tr>
            @endforeach

          </table>
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
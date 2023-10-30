<div class="col-md-3">
    <div class="card card-outline card-lightblue">
      <div class="card-header">
        <h3 class="card-title">Profil Dosen</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="list-group">
          <a class="list-group-item @if(Request::routeIs('input.A')) active @endif" href="{{ route('input.A', $user->id) }}">Dosen Tetap Perguruan Tinggi</a>
        </div>
      </div>
    </div>
    <div class="card card-outline card-lightblue">
      <div class="card-header">
        <h3 class="card-title">Kinerja Dosen</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="list-group">
          <a class="list-group-item @if(Request::routeIs('input.B')) active @endif" href="{{ route('input.B', $user->id) }}">Penelitian DTPS</a>
          <a class="list-group-item @if(Request::routeIs('input.C')) active @endif" href="{{ route('input.C', $user->id) }}">Pengabdian Kepada Masyarakat</a>
          <a class="list-group-item @if(Request::routeIs('input.D')) active @endif" href="{{ route('input.D', $user->id) }}">Publikasi Ilmiah DTPS</a>
          <a class="list-group-item @if(Request::routeIs('input.E')) active @endif" href="{{ route('input.E', $user->id) }}">Karya Ilmiah DTPS</a>
        </div>
      </div>
    </div>
</div>
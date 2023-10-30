@extends('layouts.app')
@section('content')
<style>
  label {
    font-weight: normal !important;
  }
</style>
<!-- Default box -->
<div class="card card-outline card-{{ DB::table('pengaturan')->first()->k25 }}">
  <div class="card-header">
    <h3 class="card-title text-capitalize">{{ strtr( Request::route()->getName(), ".", " " ) }}</h3>

    <div class="card-tools">
      <a href="{{ route('pengaturan') }}" type="button" class="btn btn-tool" title="Refresh">
        <i class="fas fa-refresh"></i>
      </a>
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <form method="POST" action="{{ route('pengaturan') }}" class="card-body">@csrf
    <div class="form-group">
      <input {{ $p->k1 == 1 ? 'checked' : '' }} type="checkbox" value="1" class="mr-1" name="k1" id="k1">
      <label for="k1">Dark Mode</label>
    </div>

    <h6 class="font-weight-bold">Header Options</h6>
    <div class="mb-1">
      <input {{ $p->k2 == 1 ? 'checked' : '' }} type="checkbox" value="1" class="mr-1" name="k2" id="k2">
      <label for="k2">Fixed</label>
    </div>
    <div class="mb-1">
      <input {{ $p->k3 == 1 ? 'checked' : '' }} type="checkbox" value="1" class="mr-1" name="k3" id="k3">
      <label for="k3">Dropdown Legacy Offset</label>
    </div>
    <div class="mb-4">
      <input {{ $p->k4 == 1 ? 'checked' : '' }} type="checkbox" value="1" class="mr-1" name="k4" id="k4">
      <label for="k4">No border</label>
    </div>

    <h6 class="font-weight-bold">Sidebar Options</h6>
    <div class="mb-1">
      <input {{ $p->k5 == 1 ? 'checked' : '' }} type="checkbox" value="1" class="mr-1" name="k5" id="k5">
      <label for="k5">Collapsed</label>
    </div>
    <div class="mb-1">
      <input {{ $p->k6 == 1 ? 'checked' : '' }} type="checkbox" value="1" class="mr-1" name="k6" id="k6">
      <label for="k6">Fixed</label>
    </div>
    <div class="mb-1">
      <input {{ $p->k7 == 1 ? 'checked' : '' }} type="checkbox" value="1" class="mr-1" name="k7" id="k7">
      <label for="k7">Sidebar Mini</label>
    </div>
    <div class="mb-1">
      <input {{ $p->k8 == 1 ? 'checked' : '' }} type="checkbox" value="1" class="mr-1" name="k8" id="k8">
      <label for="k8">Sidebar Mini MD</label>
    </div>
    <div class="mb-1">
      <input {{ $p->k9 == 1 ? 'checked' : '' }} type="checkbox" value="1" class="mr-1" name="k9" id="k9">
      <label for="k9">Sidebar Mini XS</label>
    </div>
    <div class="mb-1">
      <input {{ $p->k10 == 1 ? 'checked' : '' }} type="checkbox" value="1" class="mr-1" name="k10" id="k10">
      <label for="k10">Nav Flat Style</label>
    </div>
    <div class="mb-1">
      <input {{ $p->k11 == 1 ? 'checked' : '' }} type="checkbox" value="1" class="mr-1" name="k11" id="k11">
      <label for="k11">Nav Legacy Style</label>
    </div>
    <div class="mb-1">
      <input {{ $p->k12 == 1 ? 'checked' : '' }} type="checkbox" value="1" class="mr-1" name="k12" id="k12">
      <label for="k12">Nav Compact</label>
    </div>
    <div class="mb-1">
      <input {{ $p->k13 == 1 ? 'checked' : '' }} type="checkbox" value="1" class="mr-1" name="k13" id="k13">
      <label for="k13">Nav Child Indent</label>
    </div>
    <div class="mb-1">
      <input {{ $p->k14 == 1 ? 'checked' : '' }} type="checkbox" value="1" class="mr-1" name="k14" id="k14">
      <label for="k14">Nav Child Hide on Collapse</label>
    </div>
    <div class="mb-4">
      <input {{ $p->k15 == 1 ? 'checked' : '' }} type="checkbox" value="1" class="mr-1" name="k15" id="k15">
      <label for="k15">Disable Hover/Focus Auto-Expand</label>
    </div>

    <h6 class="font-weight-bold">Footer Options</h6>
    <div class="mb-4">
      <input {{ $p->k16 == 1 ? 'checked' : '' }} type="checkbox" value="1" class="mr-1" name="k16" id="k16">
      <label for="k16">Fixed</label>
    </div>

    <h6 class="font-weight-bold">Small Text Options</h6>
    <div class="mb-1">
      <input {{ $p->k17 == 1 ? 'checked' : '' }} type="checkbox" value="1" class="mr-1" name="k17" id="k17">
      <label for="k17">Body</label>
    </div>
    <div class="mb-1">
      <input {{ $p->k18 == 1 ? 'checked' : '' }} type="checkbox" value="1" class="mr-1" name="k18" id="k18">
      <label for="k18">Navbar</label>
    </div>
    <div class="mb-1">
      <input {{ $p->k19 == 1 ? 'checked' : '' }} type="checkbox" value="1" class="mr-1" name="k19" id="k19">
      <label for="k19">Brand</label>
    </div>
    <div class="mb-1">
      <input {{ $p->k20 == 1 ? 'checked' : '' }} type="checkbox" value="1" class="mr-1" name="k20" id="k20">
      <label for="k20">Sidebar Nav</label>
    </div>
    <div class="mb-4">
      <input {{ $p->k21 == 1 ? 'checked' : '' }} type="checkbox" value="1" class="mr-1" name="k21" id="k21">
      <label for="k21">Footer</label>
    </div>

    <label for="k22" class="font-weight-bold ">Navbar Variants</label>
    <select id="k22" name="k22" class="custom-select mb-3 text-light border-0 {{ $p->k22 }}">
      <option {{ $p->k22 == 'bg-primary' ? 'selected' : '' }} value="bg-primary" class="bg-primary">Primary</option>
      <option {{ $p->k22 == 'bg-secondary' ? 'selected' : '' }} value="bg-secondary" class="bg-secondary">Secondary</option>
      <option {{ $p->k22 == 'bg-info' ? 'selected' : '' }} value="bg-info" class="bg-info">Info</option>
      <option {{ $p->k22 == 'bg-success' ? 'selected' : '' }} value="bg-success" class="bg-success">Success</option>
      <option {{ $p->k22 == 'bg-danger' ? 'selected' : '' }} value="bg-danger" class="bg-danger">Danger</option>
      <option {{ $p->k22 == 'bg-indigo' ? 'selected' : '' }} value="bg-indigo" class="bg-indigo">Indigo</option>
      <option {{ $p->k22 == 'bg-purple' ? 'selected' : '' }} value="bg-purple" class="bg-purple">Purple</option>
      <option {{ $p->k22 == 'bg-pink' ? 'selected' : '' }} value="bg-pink" class="bg-pink">Pink</option>
      <option {{ $p->k22 == 'bg-navy' ? 'selected' : '' }} value="bg-navy" class="bg-navy">Navy</option>
      <option {{ $p->k22 == 'bg-lightblue' ? 'selected' : '' }} value="bg-lightblue" class="bg-lightblue">Lightblue</option>
      <option {{ $p->k22 == 'bg-teal' ? 'selected' : '' }} value="bg-teal" class="bg-teal">Teal</option>
      <option {{ $p->k22 == 'bg-cyan' ? 'selected' : '' }} value="bg-cyan" class="bg-cyan">Cyan</option>
      <option {{ $p->k22 == 'bg-dark' ? 'selected' : '' }} value="bg-dark" class="bg-dark">Dark</option>
      <option {{ $p->k22 == 'bg-gray-dark' ? 'selected' : '' }} value="bg-gray-dark" class="bg-gray-dark">Gray dark</option>
      <option {{ $p->k22 == 'bg-gray' ? 'selected' : '' }} value="bg-gray" class="bg-gray">Gray</option>
      <option {{ $p->k22 == 'bg-light' ? 'selected' : '' }} value="bg-light" class="bg-light">Light</option>
      <option {{ $p->k22 == 'bg-danger' ? 'selected' : '' }} value="bg-danger" class="bg-warning">Warning</option>
      <option {{ $p->k22 == 'bg-warning' ? 'selected' : '' }} value="bg-warning" class="bg-white">White</option>
      <option {{ $p->k22 == 'bg-orange' ? 'selected' : '' }} value="bg-orange" class="bg-orange">Orange</option>
    </select>

    <label for="k23" class="font-weight-bold  mt-3">Accent Color Variants</label>
    @php
        $k23 = explode('accent-', $p->k23);
    @endphp
    <select id="k23" name="k23" class="custom-select mb-3 border-0 bg-{{ end($k23) }}">
      <option {{ $p->k23 == '' ? 'selected' : '' }} value="">None Selected</option>
      <option {{ $p->k23 == 'accent-primary' ? 'selected' : '' }} value="accent-primary" class="bg-primary">Primary</option>
      <option {{ $p->k23 == 'accent-warning' ? 'selected' : '' }} value="accent-warning" class="bg-warning">Warning</option>
      <option {{ $p->k23 == 'accent-info' ? 'selected' : '' }} value="accent-info" class="bg-info">Info</option>
      <option {{ $p->k23 == 'accent-danger' ? 'selected' : '' }} value="accent-danger" class="bg-danger">Danger</option>
      <option {{ $p->k23 == 'accent-success' ? 'selected' : '' }} value="accent-success" class="bg-success">Success</option>
      <option {{ $p->k23 == 'accent-indigo' ? 'selected' : '' }} value="accent-indigo" class="bg-indigo">Indigo</option>
      <option {{ $p->k23 == 'accent-lightblue' ? 'selected' : '' }} value="accent-lightblue" class="bg-lightblue">Lightblue</option>
      <option {{ $p->k23 == 'accent-navy' ? 'selected' : '' }} value="accent-navy" class="bg-navy">Navy</option>
      <option {{ $p->k23 == 'accent-purple' ? 'selected' : '' }} value="accent-purple" class="bg-purple">Purple</option>
      <option {{ $p->k23 == 'accent-fuchsia' ? 'selected' : '' }} value="accent-fuchsia" class="bg-fuchsia">Fuchsia</option>
      <option {{ $p->k23 == 'accent-pink' ? 'selected' : '' }} value="accent-pink" class="bg-pink">Pink</option>
      <option {{ $p->k23 == 'accent-maroon' ? 'selected' : '' }} value="accent-maroon" class="bg-maroon">Maroon</option>
      <option {{ $p->k23 == 'accent-orange' ? 'selected' : '' }} value="accent-orange" class="bg-orange">Orange</option>
      <option {{ $p->k23 == 'accent-lime' ? 'selected' : '' }} value="accent-lime" class="bg-lime">Lime</option>
      <option {{ $p->k23 == 'accent-teal' ? 'selected' : '' }} value="accent-teal" class="bg-teal">Teal</option>
      <option {{ $p->k23 == 'accent-olive' ? 'selected' : '' }} value="accent-olive" class="bg-olive">Olive</option>
    </select>

    <label for="k24" class="font-weight-bold  mt-3">Sidebar Variants</label>
    @php
        $k24 = explode('sidebar-', $p->k24);
    @endphp
    <select id="k24" name="k24" class="custom-select mb-3 text-light border-0 bg-{{ end($k24) }}">
      <option {{ $p->k24 == 'sidebar-light' ? 'selected' : '' }} value="sidebar-light" class="bg-light">Sidebar Light</option>
      <option {{ $p->k24 == 'sidebar-dark' ? 'selected' : '' }} value="sidebar-dark" class="bg-dark">Sidebar Dark</option>
    </select>

    <label for="k25" class="font-weight-bold  mt-3">Sidebar Variants Option</label>
    <select id="k25" name="k25" class="custom-select mb-3 text-light border-0 bg-{{ $p->k25 }}">
      <option {{ $p->k25 == '' ? 'selected' : '' }} value="">None Selected</option>
      <option {{ $p->k25 == 'primary' ? 'selected' : '' }} value="primary" class="bg-primary">Primary</option>
      <option {{ $p->k25 == 'warning' ? 'selected' : '' }} value="warning" class="bg-warning">Warning</option>
      <option {{ $p->k25 == 'info' ? 'selected' : '' }} value="info" class="bg-info">Info</option>
      <option {{ $p->k25 == 'danger' ? 'selected' : '' }} value="danger" class="bg-danger">Danger</option>
      <option {{ $p->k25 == 'success' ? 'selected' : '' }} value="success" class="bg-success">Success</option>
      <option {{ $p->k25 == 'indigo' ? 'selected' : '' }} value="indigo" class="bg-indigo">Indigo</option>
      <option {{ $p->k25 == 'lightblue' ? 'selected' : '' }} value="lightblue" class="bg-lightblue">Lightblue</option>
      <option {{ $p->k25 == 'navy' ? 'selected' : '' }} value="navy" class="bg-navy">Navy</option>
      <option {{ $p->k25 == 'purple' ? 'selected' : '' }} value="purple" class="bg-purple">Purple</option>
      <option {{ $p->k25 == 'fuchsia' ? 'selected' : '' }} value="fuchsia" class="bg-fuchsia">Fuchsia</option>
      <option {{ $p->k25 == 'pink' ? 'selected' : '' }} value="pink" class="bg-pink">Pink</option>
      <option {{ $p->k25 == 'maroon' ? 'selected' : '' }} value="maroon" class="bg-maroon">Maroon</option>
      <option {{ $p->k25 == 'orange' ? 'selected' : '' }} value="orange" class="bg-orange">Orange</option>
      <option {{ $p->k25 == 'lime' ? 'selected' : '' }} value="lime" class="bg-lime">Lime</option>
      <option {{ $p->k25 == 'teal' ? 'selected' : '' }} value="teal" class="bg-teal">Teal</option>
      <option {{ $p->k25 == 'olive' ? 'selected' : '' }} value="olive" class="bg-olive">Olive</option>
    </select>

    <label for="k26" class="font-weight-bold  mt-3">Brand Logo Variants</label>
    <select id="k26" name="k26" class="custom-select mb-3 border-0 {{ $p->k26 }}">
      <option {{ $p->k26 == '' ? 'selected' : '' }} value="">None Selected</option>
      <option {{ $p->k26 == 'bg-primary' ? 'selected' : '' }} value="bg-primary" class="bg-primary">Primary</option>
      <option {{ $p->k26 == 'bg-secondary' ? 'selected' : '' }} value="bg-secondary" class="bg-secondary">Secondary</option>
      <option {{ $p->k26 == 'bg-info' ? 'selected' : '' }} value="bg-info" class="bg-info">Info</option>
      <option {{ $p->k26 == 'bg-success' ? 'selected' : '' }} value="bg-success" class="bg-success">Success</option>
      <option {{ $p->k26 == 'bg-danger' ? 'selected' : '' }} value="bg-danger" class="bg-danger">Danger</option>
      <option {{ $p->k26 == 'bg-indigo' ? 'selected' : '' }} value="bg-indigo" class="bg-indigo">Indigo</option>
      <option {{ $p->k26 == 'bg-purple' ? 'selected' : '' }} value="bg-purple" class="bg-purple">Purple</option>
      <option {{ $p->k26 == 'bg-pink' ? 'selected' : '' }} value="bg-pink" class="bg-pink">Pink</option>
      <option {{ $p->k26 == 'bg-navy' ? 'selected' : '' }} value="bg-navy" class="bg-navy">Navy</option>
      <option {{ $p->k26 == 'bg-lightblue' ? 'selected' : '' }} value="bg-lightblue" class="bg-lightblue">Lightblue</option>
      <option {{ $p->k26 == 'bg-teal' ? 'selected' : '' }} value="bg-teal" class="bg-teal">Teal</option>
      <option {{ $p->k26 == 'bg-cyan' ? 'selected' : '' }} value="bg-cyan" class="bg-cyan">Cyan</option>
      <option {{ $p->k26 == 'bg-dark' ? 'selected' : '' }} value="bg-dark" class="bg-dark">Dark</option>
      <option {{ $p->k26 == 'bg-gray-dark' ? 'selected' : '' }} value="bg-gray-dark" class="bg-gray-dark">Gray dark</option>
      <option {{ $p->k26 == 'bg-gray' ? 'selected' : '' }} value="bg-gray" class="bg-gray">Gray</option>
      <option {{ $p->k26 == 'bg-light' ? 'selected' : '' }} value="bg-light" class="bg-light">Light</option>
      <option {{ $p->k26 == 'bg-warning' ? 'selected' : '' }} value="bg-warning" class="bg-warning">Warning</option>
      <option {{ $p->k26 == 'bg-white' ? 'selected' : '' }} value="bg-white" class="bg-white">White</option>
      <option {{ $p->k26 == 'bg-orange' ? 'selected' : '' }} value="bg-orange" class="bg-orange">Orange</option><a href="#">clear</a>
    </select>
  </form>

  <script>
    $(document).ready(function(){
      $('input').on('change', function(){
        $(this).parents('form:first').submit();
      });
      $('select').on('change', function(){
        $(this).parents('form:first').submit();
      });
    });
  </script>
  <!-- /.card-body -->
  <div class="card-footer">
    {{ strtr( Request::route()->getName(), ".", " " ) }}
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection
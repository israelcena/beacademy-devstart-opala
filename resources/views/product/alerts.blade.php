@if (session ('success'))
<div class="alert alert-success" x-data="{ showMessage: true }" x-show="showMessage"
  x-init="setTimeout(() => showMessage = false, 3000)">
  {{ session('success') }}
</div>
@endif
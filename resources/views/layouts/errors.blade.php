@if ($errors->any())
  @foreach ($errors->all() as $error)
    <div class="text-danger text-center mb-2">
      {{ $error }}
    </div>
  @endforeach
@endif
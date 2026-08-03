@props(['route'])
<form action="{{ $route }}" method="POST" class="d-inline" onsubmit="return confirm('Data akan dihapus?')">
    @csrf
    @method('DELETE')
    <button type="submit" {{ $attributes->merge(['class' => 'btn btn-danger btn-sm mx-1']) }}>Delete</button>
</form>

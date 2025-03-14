<form id="formToDelete-{{ $id }}" class="d-inline" method="POST"
    action="{{ $href }}">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger btn-sm mx-2" type="button" onclick="confirmDelete( {{ $id }} )">
        <i class="fe fe-trash fe-16"></i>
    </button>
</form>

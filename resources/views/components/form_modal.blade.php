@props(['id', 'title', 'action', 'method' => 'POST'])

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ $action }}" {{ $attributes }}>
                @csrf
                @if (strtoupper($method) !== 'POST')
                    @method($method)
                @endif

                <div class="modal-header">
                    <h3 class="modal-title">{{ $title }}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ $slot }}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach ($children as $child)
    <li style="margin-left: 20px;">
        <span>{{ $child->name }}</span>
        @if ($child->children->count() > 0)
            <ul>
                @include('department.treeview_children', ['children' => $child->children])
            </ul>
        @endif
        <a class="me-3" href="{{ route('department.edit', $child->id) }}">
            <img src="{{ asset('public/img/icons/edit.svg') }}" alt="Edit">
        </a>
        <a class="confirm-text" href="{{ route('department.destroy', $child->id) }}">
            <img src="{{ asset('public/img/icons/delete.svg') }}" alt="Delete">
        </a>
    </li>
@endforeach

<div>

{{--    Show Error Messages--}}

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

{{--    Enable Disable Update Model--}}

    @if($updateMode)
        @include('livewire.update')
    @else
        @include('livewire.create')
    @endif

    <table class="table table-bordered mt-5">
        <thead>
        <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Body</th>
            <th>Status</th>
            <th width="250px">Action</th>
        </tr>
        </thead>
        <tbody>

{{--        Display List of Tasks--}}

        @foreach($tasks as $task)
            <tr>
                <td>{{ $task->id }} </td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->status }}</td>
                <td>
                    <button class="btn btn-success btn-sm" wire:click="completed({{ $task->id }})"><span id="boot-icon" class="bi bi-check" style="font-size: 15px; color: white;"></span>
                    </button>
                    <button wire:click="edit({{ $task->id }})" class="btn btn-primary btn-sm">Edit</button>
                    <button wire:click="delete({{ $task->id }})" class="btn btn-danger btn-sm">Delete</button>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

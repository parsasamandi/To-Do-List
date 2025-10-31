<div class="container-fluid">
    {{-- List --}}
    <h2>{{ $pageName }} List</h2>

    {{-- Button --}}
    @if($buttonValue != null)
        <!-- Create button -->
        <button type="button" id="create_record"
            class="btn btn-primary btn-sm">Create {{ $buttonValue }}</button>
        <hr>
    @endif
    
    {{-- Responsive table --}}
    <div class="table-responsive">
        {{ $table }}
    </div>
</div>

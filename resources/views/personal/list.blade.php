@extends('layouts.admin')
@section('title','Management of personal to-do-list')

@section('content')
  @include('includes.success')

  {{-- Header --}}
  <x-header pageName="Personal To Do" buttonValue="A Task">
    <x-slot name="table">
      <x-table :table="$personalTable" />
    </x-slot>
  </x-header>

  {{-- Insert / Update Modal --}}
  <x-insert size="modal-l" formId="personalForm">
    <x-slot name="content">
      <div class="row">
        {{-- Name --}}
        <x-input key="name" name="Name" class="col-md-12 mb-2" />

        {{-- Priority --}}
        <div class="col-md-12 mb-2">
          <label for="priority">Priority</label>
          <select name="priority" id="priority" class="form-control">
            <option value="0">Low</option>
            <option value="1" selected>Medium</option>
            <option value="2">High</option>
          </select>
        </div>

        {{-- Status --}}
        <div class="col-md-12 mb-2">
          <label for="status">Status</label>
          <select name="status" id="status" class="form-control">
            <option value="0" selected>Pending</option>
            <option value="1">In Progress</option>
            <option value="2">Completed</option>
          </select>
        </div>

        {{-- Due Date --}}
        <x-input key="due_date" name="Due Date" class="col-md-12 mb-2" />
      </div>
    </x-slot>
  </x-insert>

  {{-- Delete --}}
  <x-delete title="task"/>
@endsection

@section('scripts')
  @parent

  {{-- Personal Table --}}
  {!! $personalTable->scripts() !!}

  <script>
    $(document).ready(function () {
      // Personal DataTable and Action Object
      let dt = window.LaravelDataTables['personalTable'];
      let action = new RequestHandler(dt, '#personalForm', 'personal');

      // Open modal for new task
      $('#create_record').click(function () {
        action.openInsertionModal();
      });

      // Insert / Update
      action.insert();

      // Delete
      window.showConfirmationModal = function showConfirmationModal(url) {
        action.delete(url);
      }

      // Edit
      window.showEditModal = function showEditModal(id) {
        edit(id);
      }

      function edit(id) {
        action.reloadModal();

        $.ajax({
          url: "{{ url('personal/edit') }}",
          method: "get",
          data: { id: id },
          success: function(data) {
            action.editOnSuccess(id);
            $('#name').val(data.name);
            $('#priority').val(data.priority);
            $('#status').val(data.status);
            $('#due_date').val(data.due_date);
          }
        });
      }
    });
  </script>
@endsection

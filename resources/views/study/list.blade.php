@extends('layouts.admin')
@section('title','Management of study to-do-list')

@section('content')
  @include('includes.success')

  {{-- Header --}}
  <x-header pageName="Study" buttonValue="study">
    <x-slot name="table">
    </x-slot>
  </x-header>

   {{-- Insert --}}
   <x-insert size="modal-l" formId="studyForm">
    <x-slot name="content">
      {{-- User form --}}
      <div class="row">
        {{-- Name --}}
        <x-input key="name" name="Name" class="col-md-12 mb-2" />
        {{-- Tag --}}
        <x-input key="tag" name="Tag" class="col-md-12 mb-3" />
        {{-- Priority --}}
        <x-input type="priority" key="phone_number" name="Phone number" class="col-md-12 mb-3" />
        {{-- Passwords --}}
        <div class="col-md-12 mb-3">
          <label for="password">Password:</label>
          <input type="password" name="password" id="password" class="form-control" 
            placeholder="Password" autocomplete="new-password">
        </div>
        <div class="col-md-12">
          <label for="password-confirm">Password confirmaion:</label>
          <input type="password" name="password-confirm" id="password-confirm" class="form-control" 
            placeholder="Password confirmation" autocomplete="new-password">
        </div>
      </div>
    </x-slot>
  </x-insert>

  {{-- Delete --}}
  <x-delete title="product"/>

@endsection


@section('scripts')
  @parent

  {{-- Study Table --}}

  <script>
    $(document).ready(function () {
      // Study DataTable And Action Object
      let dt = window.LaravelDataTables['studyTable'];
      let action = new RequestHandler(dt,'#studyForm', 'study');

      // Record modal
      $('#create_record').click(function () {
        action.openInsertionModal();
      });

      // Insert
      action.insert();

      // Delete
      window.showConfirmationModal = function showConfirmationModal(url) {
        action.delete(url);
      }
      // Edit
      window.showEditModal = function showEditModal(id) {
        edit(id);
      }
      function edit($id) {
        action.reloadModal();

        $.ajax({
          url: "{{ url('study/edit') }}",
          method: "get",
          data: {id: $id},
          success: function(data) {
            action.editOnSuccess($id);
            $('#name').val($id);
            $('#email').val(data.email);
            $('#phone_number').val(data.phone_number);
            $('#password').val('NewPassword');
            $('#password-confirm').val('NewPassword');
          }
        })
      }
    });
  </script>
@endsection

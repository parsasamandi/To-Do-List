{{-- Form to insert a new product --}}
<div class="row">
  {{-- Name --}}
  <x-input key="name" placeholder="Name"
    class="col-md-6 mb-3" />
  {{-- ID number --}}
  <x-input key="model" placeholder="Code" 
    class="col-md-6 mb-3" />
  {{-- Price --}}
  <x-input key="price" placeholder="Price"
    class="col-md-4 mb-3" />
  {{-- Status --}}
  <div class="col-md-4 mb-3">
    <label for="status">Status:</label>
    <select id="status" name="status" class="browser-default custom-select">
      <option value="0">available</option>
      <option value="1">unavailable</option>
    </select>
  </div> 
  {{-- Description --}}
  <div class="col-md-12">
    <label for="description">Description:</label>
    <textarea id="description" name="description" type="text" rows="6" Placeholder="Description" class="form-control"></textarea>
  </div>
</div>
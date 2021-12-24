

              <!-- /.card-header -->

              @if (Session::has('message'))
              <div class="alert alert-success" role="alert">
                  {{Session::get('message')}}
              </div>
              @endif
<form>
    <div class=" form-group">
        <label for="exampleFormControlInput1">Add Unit</label>
        <input type="text" class="form-control col-4 " id="exampleFormControlInput1" placeholder="Enter Unit">
    </div>
    <button class=" btn btn-primary">Add</button>
    
    <div class="form-group">
        <label for="exampleFormControlSelect2">All Unit</label>
    <select multiple class="form-control" id="exampleFormControlSelect2">
      <option>KG</option>
      <option>G</option>
      <option>L</option>
    </select>
  </div>
  <button class=" btn btn-danger ">Delete</button>

</form>

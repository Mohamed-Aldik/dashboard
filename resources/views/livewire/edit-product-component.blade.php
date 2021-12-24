<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{now()->toDateString()}}</h3>

              </div>
              <!-- /.card-header -->

              <div class="card-body table-responsive p-0">
              @if (Session::has('message'))
              <div class="alert alert-success" role="alert">
                  {{Session::get('message')}}
              </div>
              @endif
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th class="col-md-1">Image </th>
                      <th>Product Name</th>
                      <th>Size</th>
                      <th class="col-md-1">Unit</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th >Store Name </th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

             <tr>
               
               <td>
               @if(!$showDiv)
               @if($product->image)<img src="{{asset('assets/images').'/'.$product->image}}" width="75" height="70" />@endif
                 @endif
                 <form wire:submit.prevent="storeProduct" enctype="multipart/form-data">
                      <input  id="inp"  type="text" class="input-file" wire:model="image" hidden disabled>
                      <canvas id="canvas" width=80 height=80></canvas>
                      </td>
                      <td><input type="text" class="form-control" placeholder="Enter Name" wire:model="product_name" ></td>
                      <td><input type="text" class="form-control" placeholder="Enter Size" wire:model="size"></td>
                      <td><select class="form-control" wire:model="unit">
                        <option hidden>...</option>
                        <option value="kilogram">KG</option>
                        <option value="Gram">G</option>
                        <option value="Litre">L</option>
                      </select></td>
                      <td><input type="text" class="form-control" placeholder="Enter Quantity" wire:model="quantity"></td>
                      <td><input type="text" class="form-control" placeholder="Enter Price" wire:model="price"></td>
                      <td><input type="text" class="form-control" placeholder="Enter Name" wire:model="store_name"></td>
                      <td>{{now()->toDateString()}}</td>
                      <td><button type="submit" class="btn btn-primary" >Update</i></button></td>
             </form>
             </tr>
             <tr>
             <td>@error('image')<span class="text-danger">{{$message}}</span>@enderror</td>
             <td>@error('product_name')<span class="text-danger">{{$message}}</span>@enderror</td>
             <td>@error('size')<span class="text-danger">{{$message}}</span>@enderror</td>             
             <td>@error('unit')<span class="text-danger">{{$message}}</span>@enderror</td>
             <td>@error('quantity')<span class="text-danger">{{$message}}</span>@enderror</td>
             <td>@error('price')<span class="text-danger">{{$message}}</span>@enderror</td>
             <td>@error('store_name')<span class="text-danger">{{$message}}</span>@enderror</td>
             <td></td>
             <td></td>
             
            </tr>
                  </tbody>
                </table>
      <video width="200" height="200" id="player" controls autoplay></video>
        <button wire:click="openDiv" class="btn btn-primary" id="capture">Capture</button>
        
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

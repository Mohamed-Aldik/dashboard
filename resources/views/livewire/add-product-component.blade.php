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
            @foreach ($products as $product)

                    <tr>
                      <td>@if($product->image)<img src="{{asset('assets/images').'/'.$product->image}}" width="75" height="70" />@endif</td>
                      <td>{{$product->product_name}}</td>
                      <td>{{$product->size}}</td>
                      <td>{{$product->unit}}</td>
                      <td>{{$product->quantity}}</td>
                      <td>{{$product->price}}</td>
                      <td>{{$product->store_name}}</td>
                      <td>{{$product->created_at->toDateString()}}</td>
                      <td>
                      <a href="{{route('edit.product',['id'=>$product->id])}}" >
                        <i class="fa fa-edit fa-2x"> </i>
                      </a>
                        
                      <a href="#" onclick="confirm('Are you sure, You want to delete this product ?') || event.stopImmediatePropagation()" wire:click.prevent="deleteProduct({{$product->id}})" style="margin-left:10px" >
                    <i class="fa fa-times fa-2x text-danger"> </i>
                            </a>
                    </td>
                    </tr>
             @endforeach
             <tr>
             <form wire:submit.prevent="storeProduct" enctype="multipart/form-data">

                      <td>
                      
                      <input  id="inp"  type="text" class="input-file" wire:model="image" hidden disabled>
                      
                        <canvas id="canvas" width=75 height=70></canvas>
                        
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
                      <td><button type="submit" class="btn btn-primary" >Save</i></button></td>
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
      {{$products->links()}}
      <video width="200" height="200" id="player" controls autoplay></video>
        <button class="btn btn-primary" id="capture">Capture</button>
        
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

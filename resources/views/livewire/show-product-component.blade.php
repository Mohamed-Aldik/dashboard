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
                      <th>Image </th>
                      <th>Product Name</th>
                      <th>Size</th>
                      <th>Unit</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Store Name</th>
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
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>  <a href="{{route('add.product')}}"  style="margin-left:10px" >
                            <i class="fa fa-plus fa-2x text-success"> </i>
                            </a>
                    </td>
                    </tr>
                  </tbody>
                </table>
                <div class="row">
          <div class="col-lg-3 col-6">
            
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$prices}}</h3>

                <p>All Prices</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$orders}}</h3>

                <p>Products</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          
          <!-- ./col -->
        </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        {{$products->links()}}

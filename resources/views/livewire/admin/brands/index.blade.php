<div>
    <div>
   
        @include('livewire.admin.brands.modal-form')
    
        <div class="row">
            <div class="col-md-12">
        
                @if (session('message'))
                    <div class="alert alert-success">
                        {{
                            session('message')
                        }}
                    </div>
                @endif
        
        
                <div class="card">
                    <div class="card-header">
                        <h3>Brands
                            <a 
                            href=" {{url('admin/brand/create')}} " 
                            class="btn btn-primary btn-sm float-end" 
                            >
                                Add Brand
                            </a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                
                                
                                    <tr>
                                        <td> {{ $brand->id }} </td>
                                        <td> {{ $brand->name }} </td>
                                        <td> 
                                            @if ($brand->category)
                                                {{ $brand->category->name }}
                                            @else
                                                No Category
                                            @endif
                                        
                                        
                                        </td>
                                        <td> {{ $brand->slug }} </td>
                                        <td> {{ $brand->status == '1' ? 'Hidden': 'Visible'}} </td>
                                        <td> 
                                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h1 class="modal-title fs-5" id="exampleModalLabel">Category delete</h1>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ url('admin/brand/delete/'.$brand->id) }}" method="get">
                                                        <div class="modal-body">
                                                            <h6>Are you sure want to delete this data?</h6>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Delete</button>
                                                        </div>
                                                    </form>
                                                   
                                                  </div>
                                                </div>
                                              </div>
                                            <a href="{{ url('admin/brand/'.$brand->id.'/edit') }}" class="btn btn-success">Edit</a>
                                            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
    
                                                
                                        </td>
                                    </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
        
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @push('script')
      <script>
        window.addEvenListener('close-modal',event => {
            $('#deleteModal').modal('hide')
        })
      </script>
    
    @endpush
    
    
</div>

<x-main-layout  path="../../dashbord/">

    <div class="row w-100">
      <div class="col-md-10 grid-margin mx-auto stretch-card">
        <div class="card">
          <div class="card-body">
            <x-alert name="success" class="alert-success"  />
            <p class="card-title mb-0">Top Products</p>
            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>City</th>
                    <th>CV</th>
                    <th>Actions</th>
                  </tr>  
                </thead>
                <tbody>
                  @forelse ($contacts as $contact)
                  <tr>

                    <td><img src="{{
                      $contact->cover_path ?
                      Storage::url($contact->cover_path)
                      :'../../default/cover.png'}}"  alt=""></td>
                    <td>{{$contact->name}}</td>
                    <td class="font-weight-bold">{{$contact->email}}</td>
                    <td>{{$contact->gender}}</td>
                    <td class="font-weight-medium">{{$contact->city}}</td>
                    <td>{{$contact->cv}}</td>
                    <td>
                  <a href="{{route('contacts.edit',$contact->id)}}" class="btn btn-warning">Edit</a>

                  <form action="{{route('contacts.destroy',$contact->id)}}" method="post">
                  
                      @csrf
                      @method("delete")
                      <input class="btn btn-danger" type="submit" value="Delete" />

                  </form>

                    </td>
                  </tr>
                  
                  @empty
                  <tr>
                  
                    <td class="font-weight-bold">There is no contacts</td>
                
                  </tr>
                      
                  @endforelse
                 

                </tbody>
              </table>
            </div>
          </div>
          
          {{ $contacts->links('pagination::bootstrap-5') }}
        </div>
      </div>
>
    </div>


</x-main-layout>
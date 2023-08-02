<div class="col-6 grid-margin m-auto stretch-card">
    <div class="card">
        <div class="card-body">
      <x-alert name="success" class="alert-success"  />

    <h4 class="card-title">{{$name}} contact</h4>
    <p class="card-description">
        {{$name}} contact
    </p>
    <form class="forms-sample" action="{{$action}}" method="post" enctype="multipart/form-data">
      @csrf

      @if ($name=="edit")
            
      @method("put")
      @endif 
     
      <div class="form-group">
        <label for="exampleInputName1">Name</label>
        <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Name"  @if ($name=="edit")
        value="{{old("name")??$contact->name}}"
        
        @endif 
        >
      </div>
      <div class="form-group">
        <label for="exampleInputEmail3">Email address</label>
        <input type="email" class="form-control" name="email"  id="exampleInputEmail3" placeholder="Email"
        @if ($name=="edit")
            
        value="{{old("email")??$contact->email}}"
        @endif 
        >
      </div>
 
      <div class="form-group">
        <label for="exampleSelectGender">Gender</label>
          <select class="form-control" id="exampleSelectGender" name="gender">
            <option value="male"  
             @if ($name=="edit")
            
             @selected($contact->gender=="male") 
            @endif
              >Male</option>
            <option value="female"  
             @if ($name=="edit")
            
             @selected($contact->gender=="female")
            @endif 
             >Female</option>
          </select>
        </div>
      <div class="form-group">
        <label>File upload</label>

        <div class="input-group col-xs-12">
          <input type="file"   class="form-control" class="form-control file-upload-info" name="cover_path" placeholder="Upload Image">
          <span class="input-group-append">
            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
          </span>
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputCity1">City</label>
        <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location" name="city" 
        @if ($name=="edit")
            
        value="{{old("city")??$contact->city}}"
        @endif
        >
      </div>
      <div class="form-group">
        <label for="exampleTextarea1">CV</label>
        <textarea class="form-control" id="exampleTextarea1" rows="4" name="cv">
            @if ($name=="edit")
            
            {{old("cv")??$contact->cv}}
            @endif     
        
        </textarea>
      </div>
     
      <button type="submit" class="btn btn-outline-primary btn-icon-text">
        <i class="ti-file btn-icon-prepend"></i>
        {{$name}}
      </button>
      <button class="btn btn-light">Cancel</button>
    </form>
  </div>
</div>
</div>

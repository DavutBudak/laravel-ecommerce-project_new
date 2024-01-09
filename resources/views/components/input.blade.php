 <label for="{{$field}}" class="form-label">{{$label}}</label>

  <input
      type="{{$type}}"
      class="form-control"
      id="{{$field}}"
      placeholder="{{$placeholder}}"
      name="{{$field}}"
      value="{{old($field,$value)}}" >
                         @error("$field")
                         <span class="text-danger"> {{$message}} </span>
                         @enderror

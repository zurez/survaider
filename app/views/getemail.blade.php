{{Form::open()}}
<input type="text" name="email" placeholder="Email">
{{Form::submit()}}
{{Form::close()}}
 @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
        @endif
@if($errors->any() || session('success'))
  <div class="err-claster shadow-all">
    @if(isset($errors))
      @if($errors->any())
        <div class="tst tst-err">
          @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
        </div>
      @endif
    @endif
    @if(session('warning'))
      <div class="tst tst-warr">{{session('warning')}}</div>
    @endif
    
    @if(session('success'))
      <div class="tst tst-succ">{{session('success')}}</div>
    @endif
  </div>
@endif
@if ($errors->any())

    <div class="alert alert-warning" role="alert" style="text-align: left">
        <h4 id="error">Error</h4>
        <h5>Please check following fields:</h5>
        @foreach($errors->all() as $error)
            <p>{{ $error  }}</p>
        @endforeach
    </div>

@endif

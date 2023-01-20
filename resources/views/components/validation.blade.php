@env('local')
@empty($errors->all())
@else
    <div>
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endempty
@endenv

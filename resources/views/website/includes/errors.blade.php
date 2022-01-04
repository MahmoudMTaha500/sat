@if ($errors->any())
    <div class="alert alert-danger text-center">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-dark">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
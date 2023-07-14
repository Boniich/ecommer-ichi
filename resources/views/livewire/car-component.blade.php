<div>
    @foreach ($newData as $oneData)
        <div>
            <h1>{{ $oneData->name }}</h1>
            <p>Description</p>
            <p>Price:</p>
        </div>
    @endforeach

</div>

<h1 class="text-primary">News</h1>

<table class="table table-bordered" id="MyTable">
  <thead>
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Title</th>
        <th class="text-center">Subtitle</th>
        <th class="text-center">Body</th>
        <th class="text-center">File</th>
        <th class="text-center">Country</th>
        <th class="text-center">State</th>
        <th class="text-center">City</th>
        <th class="text-center">Type</th>
        <th class="text-center">Date</th>
        <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($newss as $news)
        <tr>
            <td class="text-center">{{ $news->id }}</td>
            <td class="text-center">{{ $news->title }}</td>
            <td class="text-center">{{ $news->subtitle }}</td>
            <td class="text-center">{{ $news->body }}</td>
            <td class="text-center">{{ $news->file }}</td>
            <td class="text-center">{{ $news->country_id }}</td>
            <td class="text-center">{{ $news->region_id }}</td>
            <td class="text-center">{{ $news->city_id }}</td>
            <td class="text-center">{{ $news->type }}</td>
            <td class="text-center">{{ $news->created_at }}</td>

        {!! Form::open(['route' => ['newss.destroy', $news->id], 'method' => 'DELETE']) !!}

            <td class="text-center">
                <button type="submit" class="btn btn-danger btn-xs">
                <a href="{{ url('/newss/'.$news->id.'/destroy') }}">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true">Remove</span>
                </a>
                </button>
                <a href="{{ url('/newss/'.$news->id.'/edit') }}" class="btn btn-info btn-xs">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span>
                </a>
            </td>

        {!! Form::close() !!}

        </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Name</th>
        <th class="text-center">Type</th>
        <th class="text-center">Date</th>
        <th class="text-center">Actions</th>
    </tr>
  </tfoot>
</table>
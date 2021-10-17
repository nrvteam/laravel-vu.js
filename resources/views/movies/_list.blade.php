@if($movies !== null)
    @if($movies->count()>0)
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Event">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Genre</th>
                    <th>Detail</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($movies as $movie)
                        <tr>
                            <td class="movie-name">
                                {{$movie->name}}
                            </td>
                            <td class="movie-genre">
                                {{$movie->genre}}
                            </td>
                            <td class="movie-description d-none">
                                {{$movie->detail}}
                            </td>
                            <td class="movie-image d-none">
                                {{asset("storage")."/".$movie->url_image}}
                            </td>
                            <td>
                                <button
                                    type="button"
                                    class="btn btn-sm btn-primary"
                                    data-toggle="modal"
                                    data-target="#modal-movie"
                                    data-movie-id="{{ $movie->id }}"
                                >
                                    See detail
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination">
                {{$movies->links('pagination::bootstrap-4')}}
            </div>
        </div>
    @else
        <p class="text-center">There are no movies found with your criteria</p>
    @endif
@endif

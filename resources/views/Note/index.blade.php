@extends('master')
@section('content')

      @if (Session::has('success'))
            <div class="alert alert-success">
                <div>
                    <p>{{ Session::get('success') }}</p>
                </div>
            </div>
        @endif

      <h2><a href="{{ route('note.create') }}" class="btn btn-primary btn-sm">Add+</a></h2>
        <div class="table-responsive">
        <table class="table table-striped table-sm"  id='myTable'>
          <thead>
            <tr>
              <th scope="col">Title</th>
              <th scope="col">Content</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach($notes as $note)
              <tr>
                <td style="width: 40%">{{$note->title}}</td>
                <td style="width: 40%">{{$note->content}}</td>
                <td style="width: 20%">
                  <a href="{{route('note.edit', $note->id)}}" class="btn btn-sm btn-success">Edit</a> |

                    <form action="{{ route('note.destroy',$note->id ) }}" method="POST" onsubmit="return confirm('{{ 'Are you sure to delete?' }}');" style="display: inline-block;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-danger btn-sm text-white" title="Delete" type="submit"> Delete</button>
                    </form>
                </td>
              </tr>
            @endforeach
            
          </tbody>
        </table>
      </div>

@endsection

<script>
function searchTable() {
    var input, filter, found, table, tr, td, i, j;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                found = true;
            }
        }
        if (found) {
            tr[i].style.display = "";
            found = false;
        } else {
            tr[i].style.display = "none";
        }
    }
}
</script>
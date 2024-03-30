<!DOCTYPE html>
<html>
<head>
	<title>Student</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body><br>
<div class="container">

    
	<div class="row">
		<div class="card col-md-6">
            @if(isset($targetIndex)  && $targetIndex!='')

                <h4>Your target index is = {{$targetIndex}}</h4>
            @endif
			<form method="post" action="{{route('sorting.get')}}">
				@csrf
				<h4 class="text-center">Array Sorting</h4>
				<div class="form-group">
    				<label for="target_number">Target Number</label>
    				<input required id="target_number" type="number" name="target_number" class="form-control" placeholder="Enter Target Number">
				</div><br>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col " >Number</th>
                            <th scope="col"><button id="add_new" type="button" name="add_new" class="btn btn-sm btn-success"> +</button></th>
                        </tr>
                    </thead>
                    <tbody id="mainbody">
                        <tr>
                            <td>
                                <input class="form-control" type="number" name="addmore[0][number]" id="number" required placeholder="Number">
                            </td>
                            <td></td>
                        </tr>
                    </tbody>

                </table>

				<button type="submit" class="btn btn-primary mb-1">Submit</button>

            </form>
		</div>
	</div>
</div>
<script type="text/javascript">

    $( document ).ready(function() {

        var i = 0;
        $('#add_new').click(function(){
            /*alert('ok');*/
            ++i;

            $('#mainbody').append('<tr><td><input class="form-control" type="number" name="addmore['+i+'][number]" id="number" required placeholder="Number"></td><td><button type="button" name="remove" id="remove" value="remove" class="btn btn-sm btn-danger">-</button></td></tr>');

            $('#mainbody').on('click', '#remove', function(){
                $(this).closest('tr').remove();

            });




        });

    });




</script>
</body>
</html>

@extends('backend.layouts.master')
@section('title','create quiz')
@section('content')
<div class="span9">
    <div class="content">
        <div class="module">
            <div class="module-head"><h3>Result of user</h3></div>
            <div class="module-body">
                <table class="table table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Test</th>
							<th>Total Question</th>
							<th>Attempt Question</th>
                            <th>Correct Answer</th>
                            <th>Wrong Answer</th>
                            <th>Percentage</th>
							</tr>
					</thead>
					<tbody>
                        @foreach($quiz as $q)
						<tr>
							<td>1</td>
							<td>{{$q->name}}</td>
						    <td>{{$totalQuestion}}</td>
							<td>{{$attemptQuestion}}</td>
							<td>{{$userCorrectAnswer}}</td>
						    <td>{{$userWrongAnswer}}</td>
							<td>{{round($percentage,2)}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>

                <table class="table table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Question</th>
							<th>Answer given</th>
							<th>Result</th>
                           
							</tr>
					</thead>
					<tbody>
                        @foreach($results as $key=>$result)
						<tr>
							<td>{{$key+1}}</td>
							<td>{{$result->relQuestion->name}}</td>
						    <td>{{$result->relAnswer->answer}}</td>
                            @if($result->relAnswer->is_correct)
							<td>Correct</td>
                            @else
                            <td>Wrong</td>
							@endif
						</tr>
						@endforeach
					</tbody>
				</table>
            
            </div>
        </div>
    </div>
</div>

@endsection
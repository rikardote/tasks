@extends('layout.main')

@section('content')
	<div class="row">
      <div class="col s12">
    
			@foreach($tasks as $task)
			<ul class="collapsible popout" data-collapsible="accordion">
				<li>
					<div class="collapsible-header">
						<a href="#"><i class="material-icons">done</i></a>
						<i class="material-icons">not_interested</i>
						{{$task->task}}
						
					</div>
					<div class="collapsible-body">
						<p>{{$task->description}}</p>

					</div>
				</li>
		   	</ul>
          	@endforeach
       
      </div>
    </div>

{!! $tasks->render() !!}		
  <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a href=# class="btn-floating btn-large waves-effect waves-light red">
      <i class="large material-icons">add</i>
    </a>
    
  </div>
	
@endsection

@section('js')
	<script>
		$(document).ready(function(){
	   	 $('.collapsible').collapsible({
	      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
	      });
	 	});
	</script>
@endsection
@extends('layout.main')

@section('content')
	<div class="row">
      <div class="col s12">
    
			@foreach($tasks as $task)
			<ul class="collapsible popout" data-collapsible="accordion">
				<li>
					<div class="collapsible-header">
						
						{{$task->task}}
						
					</div>
					<div class="collapsible-body">
						<p>{{$task->description}}</p>
						<div class="right-align">
							<a href = '#modal1' class = 'edit modal-trigger'  data-link = '/tasks/{{$task->id}}/edit'><i class="material-icons">done</i></a>
							<a href = '#modal1' class = 'delete modal-trigger' data-link = '/tasks/{{$task->id}}/delete'><i class="material-icons">delete</i></a>
						</div>
					</div>
				</li>
		   	</ul>
          	@endforeach
       
      </div>
    </div>
	{!! (new Landish\Pagination\Materialize($tasks))->render() !!}
	
  
	<div class="fixed-action-btn" >
	    <a  href = '#modal1' 
	    	class="create btn-floating btn-large waves-effect waves-light red modal-trigger" 
	    	data-link = '/tasks/create'>
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

 <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">			
			    <h1>Title: "{{ $title }}"</h1>
           </div>
           <div>
			    <input type="text" wire:model="todo" placeholder="Todo..."> 
			 
			    <button wire:click="add">Add Todo</button>
			 
				    <ul>
				        @foreach ($todos as $todo)
				            <li>{{ $todo }}</li>
				        @endforeach
		   			 </ul>
	       </div>
	       <div><br>Todo character length: <h2 x-text="$wire.todo.length"></h2></div>
	       <div><br><button x-on:click="$wire.todo = ''">Clear</button></div>
	       <div><br><button
				    type="button"
				    wire:click="add"
				    wire:confirm="Are you sure you want to delete this post?"
				>
				    Delete post 
                </button></div>
    </div>    
</div>



@if(session()->has('ror'))
        
        <div class="container disnissable">
        
            <div class=" alert alert-danger fade show" >
        
           <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
            
        </button>
       <div>
            {{session()->get('ror')}}
       </div>
			
		
         </div>
        </div>@endif
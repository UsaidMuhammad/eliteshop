<style type="text/css">
	/*-- banner --*/  
@if ($count>0)
	@for ($i = 0; $i < $count; $i++)
		@if ($i != 0)
			.carousel .item.item{{$i+1}}{   
				background:-webkit-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url({{url('assets/uploads/carousel/'.$carousel[$i]->Image)}}) no-repeat;
				background:-moz-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url({{url('assets/uploads/carousel/'.$carousel[$i]->Image)}}) no-repeat;
				background:-ms-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url({{url('assets/uploads/carousel/'.$carousel[$i]->Image)}}) no-repeat; 
				background:linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url({{url('assets/uploads/carousel/'.$carousel[$i]->Image)}}) no-repeat;
				background-size:cover;	
			} 
		@else
			.carousel .item{    
				background:-webkit-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url({{url('assets/uploads/carousel/'.$carousel[$i]->Image)}}) no-repeat;
				background:-moz-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url({{url('assets/uploads/carousel/'.$carousel[$i]->Image)}}) no-repeat;
				background:-ms-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url({{url('assets/uploads/carousel/'.$carousel[$i]->Image)}}) no-repeat; 
				background:linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url({{url('assets/uploads/carousel/'.$carousel[$i]->Image)}}) no-repeat;
				background-size:cover;	 
			}
		@endif
	@endfor
@endif  

</style>
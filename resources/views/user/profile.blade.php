@extends('layouts.app')

@section('content')
<style>
    th,td{
        text-align: center
    }
</style>
 <caption><h2 class="text-center">User Detail</h2></caption>
<table>
   
    <tr>
        <th>Name</th>
        <td>
            <button class="btn btn--stroke "> {{ auth()->user()->name }}</td></button> 
           
        
    </tr>
    <tr>
        <th>Email</th>
        <td> <button class="btn btn--stroke ">{{ auth()->user()->email }}</button></td>
        
    </tr>
   
    <tr>
        <th>Joined On</th>
        <td> <button class="btn btn--stroke ">{{ auth()->user()->updated_at->diffForHumans() }}</button></td>
        
    </tr>
</table>
                     

                    
                       
                    
                        
                   
                
                        
                   

@endsection

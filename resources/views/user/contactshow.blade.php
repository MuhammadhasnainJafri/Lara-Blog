@extends('layouts.app')

@section('content')
<style>
    th,td{
        text-align: center
    }
</style>
<table>
    <caption><h2>User Detail</h2></caption>
    <tr>
        <th>Name</th>
        <td>
            <button class="btn btn--stroke "> {{ $contactus->name }}</td></button> 
           
        
    </tr>
    <tr>
        <th>Email</th>
        <td> <button class="btn btn--stroke ">{{ $contactus->email }}</button></td>
        
    </tr>
    <tr>
        <th>subject</th>
        <td> <button class="btn btn--stroke ">{{ $contactus->subject }}</button></td>
        
    </tr>
    <tr>
        <th>Message</th>
        <td> <button class="btn btn--stroke ">{{ $contactus->message }}</button></td>
        
    </tr>
    <tr>
        <th>Posted On</th>
        <td> <button class="btn btn--stroke ">{{ $contactus->created_at }}</button></td>
        
    </tr>
</table>
                     

                    
                       
                    
                        
                   
                
                        
                   

@endsection

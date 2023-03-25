
@extends('base')
@section ('content')
<form method="post" class="row">
    @csrf
    <input type="hidden" name="id" value="{{$event->id}}">
    <div class="col-12 col-md-10 col-lg-6">
        <div class="form-outline mb-4">
            <label class="form-label" for="name">Name</label>
            <input type="text" name="name" id="name" maxlength="100" value="{{$event->name}}" class="form-control" required /> 
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="6" required>{{$event->description}}</textarea>
        </div>
        <div class="form-outline mb-4">                        
            <label class="form-label" for="address">Address</label>
            <input type="text" name="address" id="address" maxlength="100" class="form-control" value="{{$event->address}}" required /> 
        </div>
        <div class="row">
            <div class="col-6 form-outline mb-4">                        
                <label class="form-label" for="startDate">Start Date</label>
                <input type="date" name="startDate" id="startDate" maxlength="100" class="form-control" value="{{$event->start_date}}" required /> 
            </div>
            <div class="col-6 form-outline mb-4">                        
                <label class="form-label" for="endDate">End Date</label>
                <input type="date" name="endDate" id="endDate" maxlength="100" class="form-control" value="{{$event->end_date}}" required /> 
            </div>
        </div>                                        
        <div class="row">
            <div class="col-6 form-outline mb-4">
                <label class="form-label" for="ticketType">Ticket Type</label>                        
                <select name="ticketType" id="ticketType" class="form-control">
                    @foreach ($ticket_type as $data)
                        @if($data->id == $event->ticket_type_id)
                        <option value="{{$data->id}}" selected>{{$data->name}}</option>
                        @else
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endif
                    @endforeach
                </select>                        
            </div>
            <div class="col-6 form-outline mb-4">
                <label class="form-label" for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control" value="{{$event->price}}" required /> 
            </div>
        </div>
        <div class="form-outline mb-4">                        
            <label class="form-label" for="picture">Event Picture</label>            
        </div>
        <div class="form-outline mb-4">                        
            <button type="submit" class="btn btn-primary">Save change</button>          
        </div>
    </div>
</form>
@stop
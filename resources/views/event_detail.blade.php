
@extends('base')
@section ('content')
<div id="eventDeleteModal" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <form method="post" action="/" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>                
            <div class="modal-body">
                @csrf
                <input type="hidden" name="_method" value="delete" />
                <input type="hidden" name="id" id="eventIdForDelete">
                <p>
                    Do you want to delete event?
                </p>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger">Yes</button>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-10 col-lg-6">
        <div class="form-outline mb-4">
            <label class="form-label" for="name">Name</label>
            <input type="text" name="name" id="name" maxlength="100" value="{{$event->name}}" class="form-control" readonly /> 
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="6" readonly>{{$event->description}}</textarea>
        </div>
        <div class="form-outline mb-4">                        
            <label class="form-label" for="address">Address</label>
            <input type="text" name="address" id="address" maxlength="100" class="form-control" value="{{$event->address}}" readonly /> 
        </div>
        <div class="row">
            <div class="col-6 form-outline mb-4">                        
                <label class="form-label" for="startDate">Start Date</label>
                <input type="date" name="startDate" id="startDate" maxlength="100" class="form-control" value="{{$event->start_date}}" readonly /> 
            </div>
            <div class="col-6 form-outline mb-4">                        
                <label class="form-label" for="endDate">End Date</label>
                <input type="date" name="endDate" id="endDate" maxlength="100" class="form-control" value="{{$event->end_date}}" readonly /> 
            </div>
        </div>                                        
        <div class="row">
            <div class="col-6 form-outline mb-4">
                <label class="form-label" for="ticketType">Ticket Type</label>                        
                <input name="ticketType" id="ticketType" class="form-control" value="{{$event->ticket_type->name}}" readonly>               
            </div>
            <div class="col-6 form-outline mb-4">
                <label class="form-label" for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control" value="{{$event->price}}" readonly /> 
            </div>
        </div>
        <div class="form-outline mb-4">                        
            <label class="form-label" for="picture">Event Picture</label>            
        </div>
        <div class="form-outline mb-4">                        
            <a href="/event/{{$event->id}}/update" class="btn btn-primary">
                Edit
            </a>
            <button data-id="{{$event->id}}" class="btn btn-danger event-delete-btn">
                Delete
            </button>
        </div>
    </div>
</div>
@stop

@section('end_script')
<script>
    $(function() {        
        $('.event-delete-btn').on('click', function() {            
            const id = $(this).data('id');
            $('#eventIdForDelete').val(id);
            $('#eventDeleteModal').modal('show');
        });
    });    
</script>
@stop
@extends('base')

@section('content')
    <div id="eventAddModal" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <form method="post" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @csrf
                <div class="modal-body">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="event">Name</label>
                        <input type="text" name="event" id="event" maxlength="100" class="form-control" required /> 
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" required></textarea>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="address">Address</label>
                        <input type="text" name="address" id="address" maxlength="100" class="form-control" required /> 
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="ticketType">Ticket Type</label>                        
                        <select name="ticketType" id="ticketType" class="form-control">
                            @foreach ($ticket_type as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add enent</button>
                </div>
            </form>
        </div>
    </div>
    <div id="eventEditModal" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <form method="post" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="_method" value="patch" />
                    <input type="hidden" name="id" id="eventIdForEdit">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="eventEdit">Event</label>
                        <input type="text" name="event" id="eventEdit" class="form-control" required /> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Change</button>
                </div>
            </form>
        </div>
    </div>
    <div id="eventDeleteModal" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <form method="post" class="modal-content">
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
    <!-- 
        
    main 


    -->
    <div>
        <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#eventAddModal">
            + Add event
        </button>
    </div>
    @if (count($event) > 0)
        <div class="row gap-2 mt-4">
            @foreach ($event as $data)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$data->name}}</h5>
                    <button 
                        data-id="{{$data->id}}" 
                        data-name="{{$data->name}}"                         
                        class="btn btn-sm btn-outline-primary event-edit-btn"
                    >
                    Edit
                    </button>
                    <button 
                        data-id="{{$data->id}}"                  
                        class="btn btn-sm btn-outline-danger event-delete-btn"
                    >
                    Delete
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="mt-4"> 
            <h1>No event added yet</h1>
        </div>
    @endif    
@stop

@section('end_script')
<script>
    $(function() {
        $('#eventAddModal').on('shown.bs.modal', function() {
            $('#event').focus();
        });
        $('#eventEditModal').on('shown.bs.modal', function() {
            $('#eventEdit').focus();
        });
        $('.event-edit-btn').on('click', function() {            
            const id = $(this).data('id');
            const name = $(this).data('name');
            $('#eventIdForEdit').val(id);
            $('#eventEdit').val(name);
            $('#eventEditModal').modal('show');
        });
        $('.event-delete-btn').on('click', function() {            
            const id = $(this).data('id');
            $('#eventIdForDelete').val(id);
            $('#eventDeleteModal').modal('show');
        });
    });    
</script>
@stop
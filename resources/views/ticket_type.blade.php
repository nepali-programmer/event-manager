@extends('base')

@section('content')
    <div id="ticketTypeAddModal" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <form method="post" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Ticket Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @csrf
                <div class="modal-body">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="ticketType">Ticket Type</label>
                        <input type="text" name="ticketType" id="ticketType" class="form-control" required /> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add ticket type</button>
                </div>
            </form>
        </div>
    </div>
    <div id="ticketTypeEditModal" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <form method="post" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Ticket Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="_method" value="patch" />
                    <input type="hidden" name="id" id="ticketTypeIdForEdit">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="ticketTypeEdit">Ticket Type</label>
                        <input type="text" name="ticketType" id="ticketTypeEdit" class="form-control" required /> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Change</button>
                </div>
            </form>
        </div>
    </div>
    <div id="ticketTypeDeleteModal" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <form method="post" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Ticket Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>                
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="_method" value="delete" />
                    <input type="hidden" name="id" id="ticketTypeIdForDelete">
                    <p>
                        Do you want to delete ticket type?
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
        <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ticketTypeAddModal">
            + Add ticket type
        </button>
    </div>
    @if (count($ticket_type) > 0)
        <div class="row gap-2 mt-4">
            @foreach ($ticket_type as $data)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$data->name}}</h5>
                    <button 
                        data-id="{{$data->id}}" 
                        data-name="{{$data->name}}"                         
                        class="btn btn-sm btn-outline-primary ticket-edit-btn"
                    >
                    Edit
                    </button>
                    <button 
                        data-id="{{$data->id}}"                  
                        class="btn btn-sm btn-outline-danger ticket-delete-btn"
                    >
                    Delete
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="mt-4"> 
            <h1>No ticket type added yet</h1>
        </div>
    @endif    
@stop

@section('end_script')
<script>
    $(function() {
        $('#ticketTypeAddModal').on('shown.bs.modal', function() {
            $('#ticketType').focus();
        });
        $('#ticketTypeEditModal').on('shown.bs.modal', function() {
            $('#ticketTypeEdit').focus();
        });
        $('.ticket-edit-btn').on('click', function() {            
            const id = $(this).data('id');
            const name = $(this).data('name');
            $('#ticketTypeIdForEdit').val(id);
            $('#ticketTypeEdit').val(name);
            $('#ticketTypeEditModal').modal('show');
        });
        $('.ticket-delete-btn').on('click', function() {            
            const id = $(this).data('id');
            $('#ticketTypeIdForDelete').val(id);
            $('#ticketTypeDeleteModal').modal('show');
        });
    });    
</script>
@stop
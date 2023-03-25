@extends('base')

@section('content')    
    <div id="eventAddModal" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <form method="post" class="modal-content" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Add Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @csrf
                <div class="modal-body">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" name="name" id="name" maxlength="100" class="form-control" required /> 
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" required></textarea>
                    </div>
                    <div class="form-outline mb-4">                        
                        <label class="form-label" for="address">Address</label>
                        <input type="text" name="address" id="address" maxlength="100" class="form-control" required /> 
                    </div>
                    <div class="row">
                        <div class="col-6 form-outline mb-4">                        
                            <label class="form-label" for="startDate">Start Date</label>
                            <input type="date" name="startDate" id="startDate" maxlength="100" class="form-control" required /> 
                        </div>
                        <div class="col-6 form-outline mb-4">                        
                            <label class="form-label" for="endDate">End Date</label>
                            <input type="date" name="endDate" id="endDate" maxlength="100" class="form-control" required /> 
                        </div>
                    </div>                                        
                    <div class="row">
                        <div class="col-6 form-outline mb-4">
                            <label class="form-label" for="ticketType">Ticket Type</label>                        
                            <select name="ticketType" id="ticketType" class="form-control">
                                @foreach ($ticket_type as $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                            </select>                        
                        </div>
                        <div class="col-6 form-outline mb-4">
                            <label class="form-label" for="price">Price</label>
                            <input type="number" name="price" id="price" class="form-control" required /> 
                        </div>
                    </div>
                    <div class="form-outline mb-4">                        
                        <label class="form-label" for="picture">Event Picture (1MB Max)</label>
                        <input type="file" accept="image/*" name="image" id="picture" class="form-control" required /> 
                    </div>
                </div>                
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add event</button>
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
        <div class="table-responsive">
            <table class="table mt-4">
                <tr>
                    <th>Name</th>                
                    <th>Address</th>
                    <th>Start date</th>
                    <th>End date</th>
                    <th>Ticket type</th>
                    <th>Price</th>       
                    <th>Action</th>
                </tr>
                @foreach ($event as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->address}}</td>
                    <td>{{$data->start_date}}</td>
                    <td>{{$data->end_date}}</td>
                    <td>{{$data->ticket_type == null ? 'N/A' : $data->ticket_type->name}}</td>
                    <td>{{$data->price}}</td>
                    <td>
                        <a href="/event/{{$data->id}}" class="btn btn-sm btn-outline-primary">
                            View
                        </a>
                        <a href="/event/{{$data->id}}/update" class="btn btn-sm btn-outline-success">
                            Edit
                        </a>
                        <button data-id="{{$data->id}}" class="btn btn-sm btn-outline-danger event-delete-btn">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </table>
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
        $('.event-delete-btn').on('click', function() {            
            const id = $(this).data('id');
            $('#eventIdForDelete').val(id);
            $('#eventDeleteModal').modal('show');
        });
        $('#picture').on('change', function() {
            const size = this.files[0].size / 1024;
            if(size > 1024) {
                $('#picture').val('');
                alert('Image size must be less than 1MB');                
            }            
        });
    });    
</script>
@stop